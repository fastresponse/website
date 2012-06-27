﻿import flash.geom.ColorTransform;
import flash.geom.*;
import flash.display.BitmapData;
import oxylus.Utils;
import ascb.util.Proxy;
import caurina.transitions.*;
import caurina.transitions.properties.ColorShortcuts;
import caurina.transitions.properties.FilterShortcuts;

import mx.events.EventDispatcher;


class oxylus.hiam.item extends MovieClip 
{
	private var node:XMLNode;
	private var settings:Object;
	private var settingsObj:Object;
	
	public var active:Boolean;
	
	private var loaded:Number = 0;
	private var init:Number = 1;
	private var myInterval:Number;
	
	private var allYPos:Number;
	
	private var currentMaskWidth:Number = 0;
	
	private var defaultWidth:Number;
	private var defaultXPos:Number;
	
	private var smallWidth:Number;
	private var smallXPos:Number;
	
	private var openWidth:Number;
	private var openXPos:Number;
	
	private var defaultColorTransform:ColorTransform;
	private var closedColorTransform:ColorTransform;
	private var openColorTransform:ColorTransform;
	
	private var imageXPosSmall:Number = 0;
	private var imageXPosDefault:Number = 0;
	
	private var mode:Number = 0;
	
	private var mask:MovieClip;
	private var separator:MovieClip;
	private var img:MovieClip;
	private var loader:MovieClip;
	private var bg:MovieClip;
	private var title:MovieClip;
		private var titleTxt:MovieClip;
		private var arrow:MovieClip;
	private var des:MovieClip;	
	
	private var mcl:MovieClipLoader;
	
	public var rank:Number;
	
	public var addEventListener:Function;
    public var removeEventListener:Function;
    public var dispatchEvent:Function;
	
	public function item() {
		EventDispatcher.initialize(this);
		ColorShortcuts.init();
		FilterShortcuts.init(); 

		titleTxt = title["txt"];
		Utils.initMhtf(titleTxt["txt"], false);
		
		arrow = title["arrow"];
		
		des._alpha = 0;
		Utils.initMhtf(des["txt"], false);
		
		loader._visible = false;
		
		this.enabled = false;
		
 
 
		mcl = new MovieClipLoader();
		mcl.addListener(this);
	}
	
	public function setNode(n:XMLNode, settings_:Object) {
		node = n;
		settings = settings_;
		settingsObj = Utils.parseSettingsNode(node);
		
		defaultColorTransform = new ColorTransform(1, 1, 1, 1, settings.defaultColorTransform, settings.defaultColorTransform, settings.defaultColorTransform, 0);
		closedColorTransform = new ColorTransform(1, 1, 1, 1, settings.closedColorTransform, settings.closedColorTransform, settings.closedColorTransform, 0);
		openColorTransform = new ColorTransform(1, 1, 1, 1, 0, 0, 0, 0);
		
		des["txt"]._width = Math.round(openWidth - 12 - 16);
		des["txt"].htmlText = settingsObj.description;
		titleTxt["txt"].htmlText = settingsObj.title;
		
		title._x = Math.round(defaultWidth / 2 - title._width / 2 + settings.titleXPosCorrection);
		
		
		img._alpha = 0;
		
		img.setMask(mask);
		
		separator._height = mask._height = bg._height = settings.totalHeight;
	}
	
	public function startLoad() {
		
		loader._visible = true;
		
		loader._y = Math.round(settings.totalHeight - 34 - 12);
		if (mode == 0) {
			loader._x = Math.round(defaultWidth/2  - 34/2);
		}
		else {
			loader._x = Math.round(smallWidth/2  - 34/2);
		}
		
		mcl.loadClip(settingsObj.image, img["a"]);
	}
	
	private function onLoadInit(mc:MovieClip) {
		var arr:Array = settingsObj.image.split(".");
		if (arr[arr.length - 1] == "swf") {
			
		}
		else {
			Utils.getImage(mc, true);
		}
		

		if (settingsObj.smallImagePos == "right") {
			imageXPosDefault = Math.round( -mc._width + defaultWidth);
			imageXPosSmall = Math.round( -mc._width + smallWidth);
		}
		
		if (settingsObj.smallImagePos == "center") {
			imageXPosDefault = Math.round( defaultWidth / 2 - mc._width / 2);
			imageXPosSmall = Math.round( smallWidth / 2 - mc._width / 2);
		}
		
		allYPos = Math.round(mask._height / 2 - img._height / 2);
		
		var trans:Transform = new Transform(img);
		trans.colorTransform = defaultColorTransform;
		
		Utils.setMcSaturation(img, settings.defaultSaturation);
		Utils.setMcBlur(img, settings.defaultBlurXAmount, settings.defaultBlurYAmount);
		
		loader["spin"].stop();
		Tweener.addTween(loader, { _alpha:0, time: .5, transition: "linear", onComplete:Proxy.create(this, invisLoader) } );
		
		var tt:Number = settings.animationTime;
		var trans:String = settings.animationType;
		
		Tweener.addTween(img, { _x:imageXPosDefault,
								_y:allYPos,
								_saturation:settings.defaultSaturation,
								_Blur_blurX:settings.defaultBlurXAmount, 
								_Blur_blurY:settings.defaultBlurYAmount, 
								_colorTransform:defaultColorTransform, 
								time: tt, transition: trans, rounded:true } );
		
		if (init == 1) {
			init = 0;
			myInterval = setInterval(this, "enableThis", tt * 1000);
		}
		
		loaded = 1;
		
		img._alpha = 0;
		
		dispatchEvent( { target:this, type:"continueLoading", mc:this } );
		
		if (settingsObj.pan == 1) {
			setInterval(this, "detectMouse", 30);
		}
	}
	
	private function onLoadError(mc:MovieClip) {
		loader["spin"].stop();
		Tweener.addTween(loader, { _alpha:0, time: .5, transition: "linear",  onComplete:Proxy.create(this, invisLoader) } );
		
		dispatchEvent( { target:this, type:"continueLoading", mc:this } );
	}
	
	private function invisLoader() {
		loader._visible = false;
	}
	
	public function cancelSeparator() {
		separator._visible = false;
	}
	
	public function onRollOver() {
		dispatchEvent( { target:this, type:"itemOnRollOver", mc:this } );
	}
	
	private function onRollOut() {
		dispatchEvent( { target:this, type:"itemOnRollOut", mc:this } );
	}
	
	public function onPress() {
		getURL(settingsObj.url, settingsObj.target);
	}

	public function goLarge() {
		var tt:Number = settings.animationTime;
		var trans:String = settings.animationType;
		
		currentMaskWidth = openWidth;
		

		if (settingsObj.pan == 1) {
			delete img.onEnterFrame;
		}
		
		Tweener.addTween(this, { _x:openXPos, time: tt, transition: trans, rounded:true } );
		Tweener.addTween(mask, { _width:openWidth, time: tt, transition: trans, rounded:true } );
		Tweener.addTween(img, { _x:0, 
								_y:allYPos,
								_saturation:1, 
								_Blur_blurX:0, 
								_Blur_blurY:0,
								_Blur_quality:0, 
								_colorTransform:openColorTransform, 
								time: tt, transition: trans, rounded:true } );
								
		Tweener.addTween(title, { _alpha:0, time: tt, transition: trans, rounded:true } );
		Tweener.addTween(des, { _alpha:100, time: tt, transition: trans, rounded:true } );
		
	
	}
	
	
	
	
	public function goSmall(correct:Number) {
		
		var tt:Number = settings.animationTime;
		var trans:String = settings.animationType;
		
		
		mode = 1;
		
		currentMaskWidth = smallWidth;
		
		if (correct != 0) {
			correct = openWidth - smallWidth;
		}
		

		if (settingsObj.pan == 1) {
			delete img.onEnterFrame;
		}
		
		Tweener.addTween(this, { _x:smallXPos + correct, time: tt, transition: trans, rounded:true } );
		Tweener.addTween(mask, { _width:smallWidth, time: tt, transition: trans, rounded:true } );
		Tweener.addTween(img, { _x:imageXPosSmall, 
								_y:allYPos,
								_saturation:settings.closedSaturation, 
								_Blur_blurX:settings.closedBlurXAmount, 
								_Blur_blurY:settings.closedBlurYAmount, 
								_Blur_quality:settings.closedBlurQuality,
								_colorTransform:closedColorTransform, 
								time: tt, transition: trans, rounded:true } );
		if (loader._visible == true) {
			Tweener.addTween(loader, { _x:Math.round(smallWidth/2  - 34/2), time: tt, transition: trans, rounded:true } );
		}
		
	
		Tweener.addTween(title, { _x:Math.round(smallWidth / 2 - title._width / 2 + settings.titleXPosCorrection), _alpha:100, time: tt, transition: trans, rounded:true } );
	
		Tweener.addTween(des, { _alpha:0, time: tt, transition: trans, rounded:true } );
	}
	
	
	
	public function goDefault() {
		
		var tt:Number = settings.animationTime;
		var trans:String = settings.animationType;
		
		mode = 0;
		
		currentMaskWidth = defaultWidth;
		
		
		if (settingsObj.pan == 1) {
			delete img.onEnterFrame;
		}
		
		Tweener.addTween(this, { _x:defaultXPos, time: tt, transition: trans, rounded:true } );
		Tweener.addTween(mask, { _width:defaultWidth, time: tt, transition: trans, rounded:true } );
		Tweener.addTween(img, { _x:imageXPosDefault,
								_y:allYPos,
								_saturation:settings.defaultSaturation,
								_Blur_blurX:settings.defaultBlurXAmount, 
								_Blur_blurY:settings.defaultBlurYAmount, 
								_Blur_quality:settings.defaultBlurQuality,
								_colorTransform:defaultColorTransform, 
								time: tt, transition: trans, rounded:true } );
								
		Tweener.addTween(title, { _x:Math.round(defaultWidth / 2 - title._width / 2 + settings.titleXPosCorrection), _alpha:100, time: tt, transition: trans, rounded:true } );
		Tweener.addTween(des, { _alpha:0, time: tt, transition: trans, rounded:true } );
	}
	
	
	
	
	
	
	private function enableThis() {
		this.enabled = true;
		img._alpha = 100;
		clearInterval(myInterval);
	}
	
	public function set defWidth(n:Number) : Void {
		defaultWidth = n;
		mask._width = bg._width = defaultWidth;
	}
	
	public function set defXPos(n:Number) : Void {
		defaultXPos = n;
	}
	
	
	
	public function set smWidth(n:Number) : Void {
		smallWidth = n;
	}
	
	public function set smXPos(n:Number) : Void {
		smallXPos = n;
	}
	
	
	
	public function set opWidth(n:Number) : Void {
		openWidth = n;
	}
	
	public function set opXPos(n:Number) : Void {
		openXPos = n;
	}
	
	public function set ord(n:Number) : Void {
		rank = n;
	}
	
	
	private function pan(mc:MovieClip, msk:MovieClip) {
		
		var ow:Number = mc._width;
		var oh:Number = mc._height;
		var w:Number = msk._width;
		var h:Number = msk._height;
		var t:Number = 6;
			
		if (ow<=w && oh<=h) {
			return;
		}
		
		var xm:Number;
		var ym:Number;
		var xpos:Number;
		var ypos:Number;
		var xdone:Boolean;
		var ydone:Boolean;

		if (ow>w) {
			xm = _xmouse<=t ? 0 : (_xmouse>=w-t ? w-2*t : _xmouse-t);
			xpos = (w-ow)*(xm/(w-2*t));
		} else {
			xpos = mc._x;
		}
		
		if (oh>h) {
			ym = _ymouse<=t ? 0 : (_ymouse>=h-t ? h-2*t : _ymouse-t);
			ypos = (h-oh)*(ym/(h-2*t));
		} else {
			ypos = mc._y;
		}
		
		xdone = ydone= false;
		var s:Number = settingsObj.speed;

		mc.onEnterFrame = function() {
			
			if (xdone && ydone) {
				this._x = xpos;
				this._y = ypos;
				delete this.onEnterFrame;
				return;
			}
			
			if (!xdone) {
				this._x += (xpos-this._x)/s;
			}
			if (!ydone) {
				this._y += (ypos-this._y)/s;
			}
			if (Math.abs(this._x-xpos)<.5) {
				xdone = true;
			}
			if (Math.abs(this._y-ypos)<.5) {
				ydone = true;
			}
		}
	}
	
	/**
	 * this scans for the mouse position and updates the list
	 */
	private function detectMouse() {
		if ((mask._xmouse > 0) && (mask._xmouse < currentMaskWidth) && (mask._ymouse > 0) && (mask._ymouse < settings.totalHeight ) ) {
			if (active == true) {
				pan(img, mask);
			}
		}
		else {
			
		}
	}
}