
// frame 1 (DOINITACTION)
if(!_global.oxylus)
{
	_global.oxylus = new Object();

} // end if
;
if(!_global.oxylus.hiam)
{
	_global.oxylus.hiam = new Object();

} // end if
;
		if(!_global.oxylus.hiam.item)
{
	oxylus.hiam.item = "function(	)
	{
		this.undefined();
		mx.events.EventDispatcher.initialize(super);
		caurina.transitions.properties.ColorShortcuts.init();
		caurina.transitions.properties.FilterShortcuts.init();
		super.titleTxt = super.title.txt;
		oxylus.Utils.initMhtf(super.titleTxt.txt,false);
		super.arrow = super.title.arrow;
		super.des._alpha = 0;
		oxylus.Utils.initMhtf(super.des.txt,false);
		super.loader._visible = false;
		super.enabled = false;
		super.mcl = new MovieClipLoader();
		super.mcl.addListener(super);
	}";
	extends();
	function(	)
	{
		this.undefined();
		mx.events.EventDispatcher.initialize(super);
		caurina.transitions.properties.ColorShortcuts.init();
		caurina.transitions.properties.FilterShortcuts.init();
		super.titleTxt = super.title.txt;
		oxylus.Utils.initMhtf(super.titleTxt.txt,false);
		super.arrow = super.title.arrow;
		super.des._alpha = 0;
		oxylus.Utils.initMhtf(super.des.txt,false);
		super.loader._visible = false;
		super.enabled = false;
		super.mcl = new MovieClipLoader();
		super.mcl.addListener(super);
	}.prototype;
	function(	)
	{
		this.undefined();
		mx.events.EventDispatcher.initialize(super);
		caurina.transitions.properties.ColorShortcuts.init();
		caurina.transitions.properties.FilterShortcuts.init();
		super.titleTxt = super.title.txt;
		oxylus.Utils.initMhtf(super.titleTxt.txt,false);
		super.arrow = super.title.arrow;
		super.des._alpha = 0;
		oxylus.Utils.initMhtf(super.des.txt,false);
		super.loader._visible = false;
		super.enabled = false;
		super.mcl = new MovieClipLoader();
		super.mcl.addListener(super);
	}.prototype.setNode = "function(	n,settings_)
	{
		this.node = "";
		this.settings = "settings_";
		this.settingsObj = oxylus.Utils.parseSettingsNode(this.node);
		this.defaultColorTransform = flash.geom.ColorTransform(1,1,1,1,this.settings.defaultColorTransform,this.settings.defaultColorTransform,this.settings.defaultColorTransform,0);
		this.closedColorTransform = flash.geom.ColorTransform(1,1,1,1,this.settings.closedColorTransform,this.settings.closedColorTransform,this.settings.closedColorTransform,0);
		this.openColorTransform = flash.geom.ColorTransform(1,1,1,1,0,0,0,0);
		this.des.txt._width = Math.round(this.openWidth - 12 - 16);
		this.des.txt.htmlText = this.settingsObj.description;
		this.titleTxt.txt.htmlText = this.settingsObj.title;
		this.title._x = Math.round(this.defaultWidth / 2 - this.title._width / 2 + this.settings.titleXPosCorrection);
		this.titleTxt.txt._y = this.settings.totalHeight - 34;
		this.arrow._y = this.settings.totalHeight - this.arrow._height - 12;
		this.img._alpha = 0;
		this.img.setMask(this.mask);
		this.bg._height = this.settings.totalHeight;
		this.mask._height = this.settings.totalHeight;
		this.separator._height = this.settings.totalHeight;
	}";
this.mode == 0)
		{
			this.loader._x = Math.round(this.defaultWidth / 2 - 17);

		} // end if
		else
		{
			this.loader._x = Math.round(this.smallWidth / 2 - 17);

		}
		if(	settings_.startLoad = "function(	)
	{
		this.loader._visible = true;
		this.loader._y = 6;
		this.mcl.loadClip(this.settingsObj.image,this.img.a);
	}";
this.settingsObj.image.split(".").(this.settingsObj.image.split(".").length - 1) == "swf")
		{

		} // end if
		else
		{
			oxylus.Utils.getImage(,true);

		}
		if(this.settingsObj.smallImagePos == "right")
		{
			this.imageXPosDefault = Math.round(-._width + this.defaultWidth);
			this.imageXPosSmall = Math.round(-._width + this.smallWidth);

		} // end if
		if(this.settingsObj.smallImagePos == "center")
		{
			this.imageXPosDefault = Math.round(this.defaultWidth / 2 - ._width / 2);
			this.imageXPosSmall = Math.round(this.smallWidth / 2 - ._width / 2);

		} // end if
		if(this.init == 1)
		{
			this.init = 0;
			this.myInterval = setInterval(this,enableThis,this.settings.animationTime * 1000);

		} // end if
		if(this.settingsObj.pan == 1)
		{
			setInterval(this,detectMouse,30);

		} // end if
		if(	this.type = "function(	mc)
	{
		this.settingsObj.image.split(".");
		this.allYPos = Math.round(this.mask._height / 2 - this.img._height / 2);
		flash.geom.Transform(this.img);
		flash.geom.Transform(this.img).colorTransform = this.defaultColorTransform;
		oxylus.Utils.setMcSaturation(this.img,this.settings.defaultSaturation);
		oxylus.Utils.setMcBlur(this.img,this.settings.defaultBlurXAmount,this.settings.defaultBlurYAmount);
		this.loader.spin.stop();
		caurina.transitions.Tweener.addTween(this.loader,new Object(ascb.util.Proxy.create(this,this.invisLoader),onComplete,linear,transition));
		this.settings.animationTime;
		this.settings.animationType;
		caurina.transitions.Tweener.addTween(this.img,new Object(true,rounded,this.settings.animationType,transition,this.settings.animationTime,time,this.defaultColorTransform,_colorTransform,this.settings.defaultBlurYAmount));
		this.loaded = 1;
		this.img._alpha = 0;
		this.dispatchEvent(new Object(this,mc,continueLoading));
	}";
	this.type = "function(	mc)
	{
		this.loader.spin.stop();
		caurina.transitions.Tweener.addTween(this.loader,new Object(ascb.util.Proxy.create(this,this.invisLoader),onComplete,linear,transition));
		this.dispatchEvent(new Object(this,mc,continueLoading));
	}";
	mc.invisLoader = "function(	)
	{
		this.loader._visible = false;
	}";
	mc.cancelSeparator = "function(	)
	{
		this.separator._visible = false;
	}";
	this.type = "function(	)
	{
		this.dispatchEvent(new Object(this,mc,itemOnRollOver));
	}";
	this.type = "function(	)
	{
		this.dispatchEvent(new Object(this,mc,itemOnRollOut));
	}";
	mc.onPress = "function(	)
	{
		this.getURL(this.settingsObj.url,this.settingsObj.target);
	}";
this.settingsObj.pan == 1)
		{
			delete this.img.onEnterFrame			goLarge;

		} // end if
		if(	time._local3 = "function(	)
	{
		var _local3 = this.settings.animationTime;
		this.settings.animationType;
		this.currentMaskWidth = this.openWidth;
		caurina.transitions.Tweener.addTween(this,new Object(true,rounded,this.settings.animationType,transition));
		caurina.transitions.Tweener.addTween(this.mask,new Object(true,rounded,this.settings.animationType,transition));
		caurina.transitions.Tweener.addTween(this.img,new Object(true,rounded,this.settings.animationType,transition,_local3,time,this.openColorTransform,_colorTransform,0,_Blur_quality));
		caurina.transitions.Tweener.addTween(this.title,new Object(true,rounded,this.settings.animationType,transition));
		caurina.transitions.Tweener.addTween(this.des,new Object(true,rounded,this.settings.animationType,transition));
	}";
!(this.settings.animationType == 0))
		{
			this.openWidth - this.smallWidth;

		} // end if
		if(this.settingsObj.pan == 1)
		{
			delete this.img.onEnterFrame			goSmall;

		} // end if
		if(this.loader._visible == true)
		{
			caurina.transitions.Tweener.addTween(this.loader,new Object(true,rounded,_local2,transition));

		} // end if
		if(	time.this.settings.animationTime = "function(	correct)
	{
		this.settings.animationTime;
		var _local2 = this.settings.animationType;
		this.mode = 1;
		this.currentMaskWidth = this.smallWidth;
		caurina.transitions.Tweener.addTween(this,new Object(true,rounded,_local2,transition));
		caurina.transitions.Tweener.addTween(this.mask,new Object(true,rounded,_local2,transition));
		caurina.transitions.Tweener.addTween(this.img,new Object(true,rounded,_local2,transition,this.settings.animationTime,time,this.closedColorTransform,_colorTransform,this.settings.closedBlurQuality,_Blur_quality));
		caurina.transitions.Tweener.addTween(this.title,new Object(true,rounded,_local2,transition,this.settings.animationTime));
		caurina.transitions.Tweener.addTween(this.des,new Object(true,rounded,_local2,transition));
	}";
this.settingsObj.pan == 1)
		{
			delete this.img.onEnterFrame			goDefault;

		} // end if
		if(	time._local3 = "function(	)
	{
		var _local3 = this.settings.animationTime;
		this.settings.animationType;
		this.mode = 0;
		this.currentMaskWidth = this.defaultWidth;
		caurina.transitions.Tweener.addTween(this,new Object(true,rounded,this.settings.animationType,transition));
		caurina.transitions.Tweener.addTween(this.mask,new Object(true,rounded,this.settings.animationType,transition));
		caurina.transitions.Tweener.addTween(this.img,new Object(true,rounded,this.settings.animationType,transition,_local3,time,this.defaultColorTransform,_colorTransform,this.settings.defaultBlurQuality,_Blur_quality));
		caurina.transitions.Tweener.addTween(this.title,new Object(true,rounded,this.settings.animationType,transition,_local3));
		caurina.transitions.Tweener.addTween(this.des,new Object(true,rounded,this.settings.animationType,transition));
	}";
	this.settings.animationType.enableThis = "function(	)
	{
		this.enabled = true;
		this.img._alpha = 100;
		clearInterval(this.myInterval);
	}";
	0.this.settings.animationType = "function(	n)
	{
		this.defaultWidth = "n";
		this.bg._width = this.defaultWidth;
		this.mask._width = this.defaultWidth;
		__set__defWidth;
	}";
	_alpha.n = "function(	n)
	{
		this.defaultXPos = "n";
		__set__defXPos;
	}";
	time.n = "function(	n)
	{
		this.smallWidth = "n";
		__set__smWidth;
	}";
	100.n = "function(	n)
	{
		this.smallXPos = "n";
		__set__smXPos;
	}";
	_alpha.n = "function(	n)
	{
		this.openWidth = "n";
		__set__opWidth;
	}";
	Math.round(this.defaultWidth / 2 - this.title._width / 2 + this.settings.titleXPosCorrection).n = "function(	n)
	{
		this.openXPos = "n";
		__set__opXPos;
	}";
	_x.n = "function(	n)
	{
		this.rank = "n";
		__set__ord;
	}";
!(._width > ._width)||!(._height > ._height))
		{

		} // end if
				if(._width > ._width)
		{
			if(this._xmouse > 6)
			{
				if(this._xmouse < (._width - 6))
				{

				} // end if
				else
				{

				}
			
			} // end if
			else
			{

			}
					0;
			xpos = (._width - ._width) * ;

		} // end if
		else
		{
			xpos = ._x;

		}
				if(._height > ._height)
		{
			if(this._ymouse > 6)
			{
				if(this._ymouse < (._height - 6))
				{

				} // end if
				else
				{

				}
			
			} // end if
			else
			{

			}
					0;
			ypos = (._height - ._height) * ;

		} // end if
		else
		{
			ypos = ._y;

		}
			if(xdone&&ydone)
			{
				this._x = xpos;
				this._y = ypos;
				delete this.onEnterFrame				onEnterFrame;

			} // end if
			if(!xdone)
			{
				this._x = this._x + (xpos - this._x) / s;

			} // end if
			if(!ydone)
			{
				this._y = this._y + (ypos - this._y) / s;

			} // end if
			if(Math.abs(this._x - xpos) < 0.5000)
			{
				xdone = true;

			} // end if
			if(Math.abs(this._y - ypos) < 0.5000)
			{
				ydone = true;

			} // end if
			if(	(._width - 2 * 6).(this._ymouse - 6) = "		(._height - 2 * 6). = "function(		)
		{
		}";
	}";
this.mask._xmouse > 0&&this.mask._xmouse < this.currentMaskWidth&&this.mask._ymouse > 0&&this.mask._ymouse < this.settings.totalHeight)
		{
			if(this.active == true)
			{
				this.pan(this.img,this.mask);

			} // end if
		while(		} // end while
	6.detectMouse = "function(	)
	{
	}";
	6.loaded = 0;
	6.init = 1;
	6.currentMaskWidth = 0;
	6.imageXPosSmall = 0;
	6.imageXPosDefault = 0;
	6.mode = 0;

} // end if
ASSetPropFlags(oxylus.hiam.item.prototype,null,1);
