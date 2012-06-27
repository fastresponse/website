
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
		if(!_global.net.slideshowpro.slideshowpro.observers.Timer)
{
	net.slideshowpro.slideshowpro.observers.Timer = "function(	)
	{
		super.undefined();
	}";
	extends();
	function(	)
	{
		super.undefined();
	}.prototype;
	create.net.slideshowpro.slideshowpro.observers.Timer = "function(	target_mc,oC)
	{
		caseOp();
		var _local1 = .attachMovie("TimerSymbol","t_mc",0);
		_local1._oC = "oC";
		_local1._visible = false;
		_local1.init();
	}";
!this._oC.isLivePreview)
		{
			this.icons_mc._alpha = 0;
			this.rotator_mc._alpha = 0;
			this.fillRing_mc._alpha = 0;

		} // end if
			if(	oC.init = "function(	)
	{
		this._oC.caClass.addObserver(this);
		this._initScale = Math.floor(this._oC.feedbackScale * 0.7000);
		this.tPos = this._oC.feedbackTimerAlign;
		this._yscale = this._initScale;
		this._xscale = this._initScale;
		this.iconPlay = this.icons_mc.iconPlay_mc;
		this.iconPlaySym = this.icons_mc.iconPlay_mc.icon_mc;
		this.iconPlaySymSh = this.icons_mc.iconPlay_mc.shadow_mc;
		this.iconPause = this.icons_mc.iconPause_mc;
		this.iconPauseSym = this.icons_mc.iconPause_mc.icon_mc;
		this.iconPauseSymSh = this.icons_mc.iconPause_mc.shadow_mc;
		this.iconPlay._visible = false;
		this.iconPause._visible = false;
		this.rotator_mc.rHalf_mc.setMask(this.rotator_mc.rHalfMask_mc);
		this.rotator_mc.lHalf_mc.setMask(this.rotator_mc.lHalfMask_mc);
		this.rMaskRot = this.rotator_mc.rHalfMask_mc._rotation;
		this.lMaskRot = this.rotator_mc.lHalfMask_mc._rotation;
		this.initListeners();
	}";
	oC.dimensionUpdate = "function(	d)
	{
		this._dim = "d";
		this.arrange();
	}";
!self._oC.isInit)
			{
				self.showIcons(eventObject.data);

			} // end if
		if(	d.initListeners = "		new Object().onDisplayModeChange = "function(		eventObject)
		{
		}";
		eventObject._oC.addEventListener("onDisplayModeChange",new Object());
	}";
this._oC.feedbackTimerAppearance == "Hidden")
		{
			this._visible = false;

		} // end if
		if(!(this._initScale == _local2))
		{
			this._yscale = _local2;
			this._xscale = _local2;
			this._initScale = _local2;

		} // end if
		if(this._oC.isLivePreview)
		{
			this.drawLivePreview();

		} // end if
			if(	new Object().draw = "function(	)
	{
		this.prevDisplayMode = this._oC.displayMode;
		this.applyBackColor(this.icons_mc.bg_mc);
		this.applyBackAlpha(this.icons_mc.bg_mc);
		this.applyHighColor(this.fillRing_mc,this.iconPlaySym,this.iconPauseSym,this.rotator_mc.lHalf_mc,this.rotator_mc.rHalf_mc);
		this.iconPlaySymSh._alpha = this._oC.iconShadowAlpha;
		this.iconPauseSymSh._alpha = this._oC.iconShadowAlpha;
		var _local2 = Math.floor(this._oC.feedbackScale * 0.7000);
		this._initHighAlpha = this._oC.feedbackHighlightAlpha;
		this._initBackAlpha = this._oC.feedbackBackgroundAlpha;
		this.arrange();
	}";
	_local2.drawLivePreview = "function(	)
	{
		this.fillRing_mc._alpha = this._initBackAlpha;
		this.rotator_mc.rHalfMask_mc._rotation = 90;
		this.showIcons(this._oC.displayMode);
		this._visible = true;
	}";
this._oC.feedbackTimerPosition == "Inside Content")
		{
this._oC.isTransitioning&&			if(!this.isHidden)
			{
				this.arrange();

			} // end if
		
		} // end if
		if(	_local2.afterImageAlign = "function(	)
	{
		this.setTargetLoader();
	}";
	_local2.setTargetLoader = "function(	)
	{
		this.targetLoader = this._oC.thisLoader;
	}";
!(this._oC.feedbackTimerPosition == "Inside Content Area")||!this._oC.isLivePreview||!(this.targetLoader == null)||!(this._oC.contentScale == "Crop to Fit")||this._oC.contentScale == "Crop to Fit All")
		{
			var _local2 = this._oC.aaClass.alignWithContentArea(_local7,_local6,this._oC.feedbackTimerAlign,this._oC.GLOBAL_PAD * 2);

		} // end if
		else
		{
			if(this._oC.feedbackTimerPosition == "Inside Content")
			{
				this._oC.aaClass.alignWithContent(_local7,_local6,this._oC.feedbackTimerAlign,this.targetLoader,this._oC.GLOBAL_PAD * 2);

			} // end if

		}
		if(!(this._x == this._oC.aaClass.alignWithContent(_local7,_local6,this._oC.feedbackTimerAlign,this.targetLoader,this._oC.GLOBAL_PAD * 2).0))
		{
			this._x = this._oC.aaClass.alignWithContent(_local7,_local6,this._oC.feedbackTimerAlign,this.targetLoader,this._oC.GLOBAL_PAD * 2).0;

		} // end if
		if(!(this._y == this._oC.aaClass.alignWithContent(_local7,_local6,this._oC.feedbackTimerAlign,this.targetLoader,this._oC.GLOBAL_PAD * 2).1))
		{
			this._y = this._oC.aaClass.alignWithContent(_local7,_local6,this._oC.feedbackTimerAlign,this.targetLoader,this._oC.GLOBAL_PAD * 2).1;

		} // end if
			if(	_local2.arrange = "function(	)
	{
		var _local7 = (this.fillRing_mc._width * (this._xscale / 100));
		var _local6 = (this.fillRing_mc._height * (this._yscale / 100));
		new Array();
		this.targetLoader;
		this._oC.aaClass.alignWithContent(_local7,_local6,this._oC.feedbackTimerAlign,this.targetLoader,this._oC.GLOBAL_PAD * 2).0;
		this._oC.aaClass.alignWithContent(_local7,_local6,this._oC.feedbackTimerAlign,this.targetLoader,this._oC.GLOBAL_PAD * 2).1;
	}";
	this._oC.aaClass.alignWithContent(_local7,_local6,this._oC.feedbackTimerAlign,this.targetLoader,this._oC.GLOBAL_PAD * 2).tweenRightMask = "function(	)
	{
		this.checkRight = new Object();
		this.checkRight.onMotionFinished = mx.utils.Delegate.create(this,this.tweenLeftMask);
		this.tweenRight = mx.transitions.Tween(this.rotator_mc.rHalfMask_mc,_rotation,null,0,180,this.pTime / 2,true);
		this.tweenRight.addListener(this.checkRight);
	}";
	this._oC.aaClass.alignWithContent(_local7,_local6,this._oC.feedbackTimerAlign,this.targetLoader,this._oC.GLOBAL_PAD * 2).tweenLeftMask = "function(	)
	{
		this.tweenLeft = mx.transitions.Tween(this.rotator_mc.lHalfMask_mc,_rotation,null,180,360,this.pTime / 2,true);
	}";
	this._oC.aaClass.alignWithContent(_local7,_local6,this._oC.feedbackTimerAlign,this.targetLoader,this._oC.GLOBAL_PAD * 2).resetMasks = "function(	)
	{
		this.rotator_mc.rHalfMask_mc._rotation = this.rMaskRot;
		this.rotator_mc.lHalfMask_mc._rotation = this.lMaskRot;
	}";
	this._oC.aaClass.alignWithContent(_local7,_local6,this._oC.feedbackTimerAlign,this.targetLoader,this._oC.GLOBAL_PAD * 2).endMaskTween = "function(	)
	{
		this.isRotating = false;
		this.hideMasks();
		this.hideFillRing();
		this.tweenRight.stop();
		this.tweenLeft.stop();
		this.rotator_mc.rHalfMask_mc._rotation = 180;
		this.rotator_mc.lHalfMask_mc._rotation = 360;
		this.tweenRight.removeListener(this.checkRight);
	}";
	this._oC.aaClass.alignWithContent(_local7,_local6,this._oC.feedbackTimerAlign,this.targetLoader,this._oC.GLOBAL_PAD * 2).hideMasks = "function(	)
	{
		mx.transitions.Tween(this.rotator_mc,_alpha,this.strongTween,this.rotator_mc._alpha,0,1,true);
	}";
	this._oC.aaClass.alignWithContent(_local7,_local6,this._oC.feedbackTimerAlign,this.targetLoader,this._oC.GLOBAL_PAD * 2).startMaskTween = "function(	p)
	{
		this.resetMasks();
		this.isRotating = true;
		this.arrange();
		this.pTime = "p";
		this.showRotator();
		this.tweenRightMask();
		this._visible = true;
	}";
	p.showRotator = "function(	)
	{
		mx.transitions.Tween(this.rotator_mc,_alpha,this.strongTween,0,this._initHighAlpha,1,true);
		this.showFillRing();
	}";
	p.showFillRing = "function(	)
	{
		this.fillTween = mx.transitions.Tween(this.fillRing_mc,_alpha,this.strongTween,0,this._initBackAlpha,1,true);
	}";
	p.hideFillRing = "function(	)
	{
		this.fillTween = mx.transitions.Tween(this.fillRing_mc,_alpha,this.strongTween,this.fillRing_mc._alpha,0,1,true);
	}";
	p.stopFillRing = "function(	)
	{
		this.fillTween.stop();
	}";
s == this.prevDisplayMode&&this._oC.isLivePreview&&!(this._oC.feedbackTimerAppearance == "Hidden"))
		{
			this.arrange();
			this._visible = true;
			this.icons_mc.gotoAndStop(s);
			if(s == "Manual")
			{
				this.iconPause._visible = true;
				this.iconPlay._visible = false;

			} // end if
			else
			{
				if(s == "Auto")
				{
					this.iconPause._visible = false;
					this.iconPlay._visible = true;

				} // end if

			}
			if(!this._oC.isLivePreview)
			{
				mx.transitions.Tween(this.icons_mc,_alpha,this.strongTween,this.icons_mc._alpha,100,1,true);
				mx.transitions.Tween(this.bg_mc,_alpha,this.strongTween,this.bg_mc._alpha,this._initBackAlpha,1,true);
				this.startIconTimer();

			} // end if
					this.prevDisplayMode = "s";
			this.isHidden = false;

		} // end if
			if(	p.showIcons = "function(	s)
	{
	}";
	s.hideIcons = "function(	)
	{
		this.stopIconTimer();
		mx.transitions.Tween(this.icons_mc,_alpha,this.strongTween,100,0,1,true);
		mx.transitions.Tween(this.bg_mc,_alpha,this.strongTween,this._initBackAlpha,0,1,true);
		this.isHidden = true;
	}";
	s.startIconTimer = "function(	)
	{
		this.stopIconTimer();
		this._iconINT = setInterval(this,hideIcons,2000);
	}";
	s.stopIconTimer = "function(	)
	{
		clearInterval(this._iconINT);
	}";
)
		{
			arguments._oC.feedbackBackgroundColor;
			if(!(arguments._initBackColor == arguments._oC.feedbackBackgroundColor))
			{
				new Color(this.0);
				new Color(this.0).setRGB(arguments._oC.feedbackBackgroundColor);

			} // end if
		while(			0++;
		} // end while
			if(	s.applyBackColor = "function(	)
	{
		0;
		arguments._initBackColor = arguments._oC.feedbackBackgroundColor;
	}";
)
		{
			var _local4 = arguments._oC.feedbackBackgroundAlpha;
			if(!(arguments._initBackAlpha == _local4))
			{
				this.0._alpha = _local4;

			} // end if
		while(			0++;
		} // end while
			if(	this.applyBackAlpha = "function(	)
	{
		0;
		arguments._initBackAlpha = _local4;
	}";
)
		{
			arguments._oC.feedbackHighlightColor;
			if(!(arguments._initHighColor == arguments._oC.feedbackHighlightColor))
			{
				new Color(this.0);
				new Color(this.0).setRGB(arguments._oC.feedbackHighlightColor);

			} // end if
		while(			0++;
		} // end while
			if(	this.applyHighColor = "function(	)
	{
		0;
		arguments._initHighColor = arguments._oC.feedbackHighlightColor;
	}";
)
		{
			var _local4 = arguments._oC.feedbackHighlightAlpha;
			if(!(arguments._initHighAlpha == _local4))
			{
				this.0._alpha = _local4;

			} // end if
		while(			0++;
		} // end while
	this.applyHighAlpha = "function(	)
	{
		0;
		arguments._initHighAlpha = _local4;
	}";
	this.isRotating = false;
	this.isHidden = true;
	this.strongTween = mx.transitions.easing.Strong.easeOut;

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.Timer.prototype,null,1);
