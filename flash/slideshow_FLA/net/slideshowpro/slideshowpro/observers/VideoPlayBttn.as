
// frame 1 (DOINITACTION)
if(!_global.net)
{
	_global.net = new Object();

} // end if
;
if(!_global.net.slideshowpro)
{
	_global.net.slideshowpro = new Object();

} // end if
;
if(!_global.net.slideshowpro.slideshowpro)
{
	_global.net.slideshowpro.slideshowpro = new Object();

} // end if
;
if(!_global.net.slideshowpro.slideshowpro.observers)
{
	_global.net.slideshowpro.slideshowpro.observers = new Object();

} // end if
;
		if(!_global.net.slideshowpro.slideshowpro.observers.VideoPlayBttn)
{
	net.slideshowpro.slideshowpro.observers.VideoPlayBttn = "function(	t,o)
	{
		t.undefined();
		super._oC = "";
		super._tC = "o";
		super.init();
	}";
	extends();
	function(	t,o)
	{
		t.undefined();
		super._oC = "";
		super._tC = "o";
		super.init();
	}.prototype;
	function(	t,o)
	{
		t.undefined();
		super._oC = "";
		super._tC = "o";
		super.init();
	}.prototype.init = "function(	)
	{
		this._tC._alpha = 0;
		this.initListeners();
	}";
	function(	t,o)
	{
		t.undefined();
		super._oC = "";
		super._tC = "o";
		super.init();
	}.prototype.initListeners = "		new Object().onVideoPreviewLoad = "function(		eventObject)
		{
			self.onVideoPreviewLoad(eventObject.data);
		}";
		eventObject._oC.addEventListener("onVideoPreviewLoad",new Object());
		new Object().onImageAlign = mx.utils.Delegate.create(eventObject,eventObject.afterImageAlign);
		eventObject._oC.addEventListener("onImageAlign",new Object());
	}";
this._oC.navIcons.11 == this._oC._navDefaultIcons.11)
		{
			this._oC._navDefaultIcons.11;
			var _local3 = true;

		} // end if
		else
		{
			var _local2 = this._oC.navIcons.11;
			false;

		}
		if(false)
		{
			this.iconBG = this.vpClip.icons_mc.bg_mc;
			this.iconPlay = this.vpClip.icons_mc.iconPlay_mc;
			this.iconPlaySym = this.vpClip.icons_mc.iconPlay_mc.icon_mc;
			this.iconPlaySymSh = this.vpClip.icons_mc.iconPlay_mc.shadow_mc;
			this.iconPlay._xscale = this.iconPlay._xscale * 0.8500;
			this.iconPlay._yscale = this.iconPlay._yscale * 0.8500;
			this._tC._yscale = this._oC.feedbackScale * 1.2000;
			this._tC._xscale = this._oC.feedbackScale * 1.2000;
			this.applyBackColor(this.iconBG);
			this.applyBackAlpha(this.iconBG);
			this.applyHighColor(this.iconPlaySym);
			this.iconPlaySymSh._alpha = 40;

		} // end if
		if(	new Object().draw = "function(	)
	{
		undefined;
		var _local2 = undefined;
		this.vpClip = this._tC.attachMovie(_local2,"vp_mc",1);
		this._tC.onRelease = mx.utils.Delegate.create(this,this.onBttnRelease);
		this.invalClip = this._tC.createEmptyMovieClip("tester",99);
	}";
	_local2.setMediaReq = "function(	o)
	{
		this.mpReq = "o";
		this.invalidate();
	}";
	o.invalidate = "function(	)
	{
		this._tC.onEnterFrame = mx.utils.Delegate.create(this,this.doLaterDispatch);
	}";
	MovieClip.o = "function(	)
	{
		this.reqChange();
		delete this._tC.onEnterFrame		doLaterDispatch;
	}";
this.isVideoAvail)
		{
			this.showBttnWithoutImage();

		} // end if
		else
		{
			this.hideBttn();

		}
		if(	o.reqChange = "function(	)
	{
		this.isVideoAvail = this.mpReq.video;
	}";
!this.hasImg||this.isPreviewUsed)
		{
			this.isBttnNeeded = true;
			this.initBttn();

		} // end if
		if(	o.showBttnWithoutImage = "function(	)
	{
	}";
this.isPreviewUsed)
		{
			this.showBttn();

		} // end if
		if(	o.initBttn = "function(	)
	{
	}";
this.isBttnNeeded)
		{
			this.arrange();
			this.tweenIn();
			this._tC._visible = true;

		} // end if
		if(	o.showBttn = "function(	)
	{
	}";
	o.hideBttn = "function(	)
	{
		this.isBttnNeeded = false;
		this._tC._visible = false;
		this._tC._alpha = 0;
	}";
	o.replayBttn = "function(	)
	{
		this.isBttnNeeded = true;
		this.hasImg = true;
		this.showBttn();
	}";
this.hasImg)
		{
			var _local2 = this._oC.aaClass.alignWithContent(this._tC._width,this._tC._height,"Center",this._oC.thisLoader,this._oC.GLOBAL_PAD);

		} // end if
		else
		{
			this._oC.aaClass.alignWithContentArea(this._tC._width,this._tC._height,"Center",this._oC.GLOBAL_PAD);

		}
		if(!(this._tC._x == _local4))
		{
			this._tC._x = _local4;

		} // end if
		if(!(this._tC._y == _local3))
		{
			this._tC._y = _local3;

		} // end if
		if(	o.arrange = "function(	)
	{
		new Array();
		var _local4 = Math.floor(this._oC.aaClass.alignWithContentArea(this._tC._width,this._tC._height,"Center",this._oC.GLOBAL_PAD).0 - this._tC._width / 2);
		var _local3 = Math.floor(this._oC.aaClass.alignWithContentArea(this._tC._width,this._tC._height,"Center",this._oC.GLOBAL_PAD).1 - this._tC._height / 2);
		false;
	}";
_local2 < 100)
		{
			mx.transitions.Tween(this._tC,_alpha,this.strongTween,_local2,100,1,true);

		} // end if
		if(	this._oC.aaClass.alignWithContentArea(this._tC._width,this._tC._height,"Center",this._oC.GLOBAL_PAD).tweenIn = "function(	)
	{
		var _local2 = this._tC._alpha;
	}";
	_local2.onBttnRelease = "function(	)
	{
		this.hideBttn();
		this._oC.dispatchEventData("onVideoPlayBttnRelease");
	}";
!(this._oC._initDisplayMode == "Manual")||this._oC.dataClass.atAlbumEnd(this._oC.p)&&this._oC.autoFinishMode == "Stop")
		{
			this.replayBttn();

		} // end if
		while(if(	_local2.onVideoEnd = "function(	)
	{
	}";
	_local2.afterVideoResume = "function(	)
	{
		this.hideBttn();
	}";
	_local2.onVideoPreviewLoad = "function(	b)
	{
		this.isPreviewUsed = true;
		this.isBttnNeeded = true;
		this.hasImg = "b";
	}";
	b.afterImageAlign = "function(	)
	{
		this.initBttn();
	}";
	b.afterAlbumEnd = "function(	)
	{
}";
)
		{
			arguments._oC.feedbackBackgroundColor;
			new Color(this.0);
			new Color(this.0).setRGB(arguments._oC.feedbackBackgroundColor);
			0++;
		} // end while
		while(if(	b.applyBackColor = "function(	)
	{
		0;
	}";
)
		{
			var _local4 = arguments._oC.feedbackBackgroundAlpha;
			this.0._alpha = _local4;
			0++;
		} // end while
		while(if(	this.applyBackAlpha = "function(	)
	{
		0;
	}";
)
		{
			arguments._oC.feedbackHighlightColor;
			new Color(this.0);
			new Color(this.0).setRGB(arguments._oC.feedbackHighlightColor);
			0++;
		} // end while
	this.applyHighColor = "function(	)
	{
		0;
	}";
	this.isPreviewUsed = false;
	this.isBttnNeeded = false;
	this.strongTween = mx.transitions.easing.Strong.easeOut;

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.VideoPlayBttn.prototype,null,1);
