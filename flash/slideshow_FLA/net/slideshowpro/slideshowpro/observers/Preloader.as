
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
		if(!_global.net.slideshowpro.slideshowpro.observers.Preloader)
{
	net.slideshowpro.slideshowpro.observers.Preloader = "function(	)
	{
		super.undefined();
	}";
	extends();
	function(	)
	{
		super.undefined();
	}.prototype;
	create.net.slideshowpro.slideshowpro.observers.Preloader = "function(	target_mc,oC)
	{
		caseOp();
		var _local1 = .attachMovie("PreloaderSymbol","pClip",0);
		_local1._oC = "oC";
		_local1.init();
	}";
	oC.init = "function(	)
	{
		this._visible = false;
		this._oC.caClass.addObserver(this);
		this.rMaskRot = this.rHalfMask_mc._rotation;
		this.lMaskRot = this.lHalfMask_mc._rotation;
		this.initListeners();
	}";
	oC.dimensionUpdate = "function(	d)
	{
		this._dim = "d";
		this.arrange();
	}";
	d.initListeners = "		new Object().onImageLoad = "function(		eventObject)
		{
			self.afterImageLoad();
		}";
		eventObject._oC.addEventListener("onImageLoad",new Object());
	}";
!(this._oC.feedbackPreloaderAppearance == "Hidden"))
		{
			this._visible = true;

		} // end if
		else
		{
			this._visible = false;

		}
			if(!(this.style == "Pie")||this.style == "Pie Spinner")
		{
			this.applyHighlightColor(this.lHalf_mc,this.rHalf_mc,this.strokeCircle_mc,this.spinner_mc);
			this.applyBackgroundColor(this.bg_mc);
			this.rHalf_mc.setMask(this.rHalfMask_mc);
			this.lHalf_mc.setMask(this.lHalfMask_mc);
			if(this.style == "Pie Spinner")
			{
				this._yscale = this._oC.feedbackScale * 0.8000;
				this._xscale = this._oC.feedbackScale * 0.8000;

			} // end if
		
		} // end if
		else
		{
			if(!(this.style == "Bar")||this.style == "Line")
			{
				this.applyHighlightColor(this.barGroup_mc.barProgress_mc);
				this.applyBackgroundColor(this.barGroup_mc.barFrame_mc);
				this.barGroup_mc._width = Math.floor(this._oC.__width * 0.3000);
				this.barGroup_mc._x = -this.barGroup_mc._width / 2;
				this.barGroup_mc.barProgress_mc._width = 0;

			} // end if
			else
			{
				if(this.style == "Spinner")
				{
					this.applyHighlightColor(this.spinner_solo_mc);

				} // end if
				else
				{
						if(this.style == "Beam")
					{
						this.applyHighlightColor(this.beamAnim);
						this.applyBackgroundColor(this.beamCircle);
						this.beamTextClip.createTextField("per_txt",99,0,0,50,50);
						this.beamText = this.beamTextClip.per_txt;
						this.per_fmt = new TextFormat();
						this.per_fmt.font = this._oC.typeface;
						this.per_fmt.size = this._oC.feedbackPreloaderTextSize;
						this.per_fmt.color = this.clipcolor;
						this.beamText.autoSize = true;
						if(!(this._oC.typefaceEmbed == "On"))
						{

						} // end if
						else
						{

						}
											embedFonts.false = true;
						this.beamText.setNewTextFormat(this.per_fmt);
						this.beamText.text = "0";
						this.beamText.setTextFormat(this.per_fmt);
						this.beamText._visible = false;
						this.beamText._y = -this.beamText.textHeight / 2 - 3;

					} // end if

				}

			}

		}
		if(this._width > 0&&this._height > 0)
		{
			this._w = this._width;
			this._h = this._height;

		} // end if
		if(this._oC.isLivePreview)
		{
			this.loadProgress(25);

		} // end if
		else
		{
			this._visible = false;
			this._alpha = 0;

		}
		while(if(	draw.this.beamText = "function(	)
	{
		this._yscale = this._oC.feedbackScale;
		this._xscale = this._oC.feedbackScale;
		this.bgcolor = this._oC.feedbackBackgroundColor;
		this.clipcolor = this._oC.feedbackHighlightColor;
		this.bgAlpha = this._oC.feedbackBackgroundAlpha;
		this.hlAlpha = this._oC.feedbackHighlightAlpha;
		this.style = this._oC.feedbackPreloaderAppearance;
		this.gotoAndStop(this.style);
	}";
	new Object().initCheckProgress = "function(	)
	{
		this.killInitTimer();
		this.onEnterFrame = this.checkLoadProgress;
	}";
	new Object().new Object() = "function(	)
	{
		delete this.onEnterFrame		killCheckProgress;
	}";
_local3 < this.length)
		{
			new Color(this._local3);
			new Color(this._local3).setRGB(arguments.clipcolor);
			this._local3._alpha = arguments.hlAlpha;
			_local3++;
		} // end while
		while(if(	new Object().applyHighlightColor = "function(	)
	{
		var _local3 = 0;
	}";
)
		{
			new Color(this.0);
			new Color(this.0).setRGB(arguments.bgcolor);
			this.0._alpha = arguments.bgAlpha;
			0++;
		} // end while
				if(	this.applyBackgroundColor = "function(	)
	{
		0;
	}";
!isNaN(Math.floor((o.sourceClip.getBytesLoaded() / o.sourceClip.getBytesTotal()) * 100)))
		{
o._starting&&			if(!(o.style == "Hidden"))
			{
				o.arrange();
				o._visible = true;
				mx.transitions.Tween(o,_alpha,o.strongTween,0,100,1.5000,true);
				if(o.style == "Pie Spinner")
				{
					o.spinner_mc.gotoAndPlay("go");

				} // end if
				else
				{
					if(o.style == "Spinner")
					{
						o.spinner_solo_mc.gotoAndPlay("go");

					} // end if
					else
					{
						if(o.style == "Beam")
						{
							o.beamAnim.gotoAndPlay("go");
							o._tweenScaleX = mx.transitions.Tween(o,_xscale,mx.transitions.easing.Strong.easeInOut,0,100,0.5000,true);
							o._tweenScaleY = mx.transitions.Tween(o,_yscale,mx.transitions.easing.Strong.easeInOut,0,100,0.5000,true);

						} // end if

					}

				}
							o._starting = false;

			} // end if
			if(!isNaN(Math.floor((o.sourceClip.getBytesLoaded() / o.sourceClip.getBytesTotal()) * 100))||!(Math.floor((o.sourceClip.getBytesLoaded() / o.sourceClip.getBytesTotal()) * 100) == Infinity)||Math.floor((o.sourceClip.getBytesLoaded() / o.sourceClip.getBytesTotal()) * 100) > 0)
			{
				o.loadProgress(Math.floor((o.sourceClip.getBytesLoaded() / o.sourceClip.getBytesTotal()) * 100));

			} // end if
			if(!(Math.floor((o.sourceClip.getBytesLoaded() / o.sourceClip.getBytesTotal()) * 100) == 100)||o.isAssetLoaded)
			{
				o.onPreloadComplete();

			} // end if
		
		} // end if
		if(	this.checkLoadProgress = "function(	o)
	{
		o.sourceClip.getBytesLoaded();
		o.sourceClip.getBytesTotal();
		Math.floor((o.sourceClip.getBytesLoaded() / o.sourceClip.getBytesTotal()) * 100);
	}";
	Math.floor((o.sourceClip.getBytesLoaded() / o.sourceClip.getBytesTotal()) * 100).posBeamText = "function(	)
	{
		this.beamText._x = Math.round(-this.beamText._width / 2);
		this.beamText._y = Math.round(-this.beamText._height / 2);
	}";
!(this.style == "Pie")||this.style == "Pie Spinner")
		{
			this.rHalfMask_mc._rotation = 180;
			this.lHalfMask_mc._rotation = 0;

		} // end if
		else
		{
			if(this.style == "Beam")
			{
				this.beamText._visible = false;

			} // end if

		}
			if(	Math.floor((o.sourceClip.getBytesLoaded() / o.sourceClip.getBytesTotal()) * 100).forceEnd = "function(	)
	{
	}";
	Math.floor((o.sourceClip.getBytesLoaded() / o.sourceClip.getBytesTotal()) * 100).onPreloadComplete = "function(	)
	{
		this.killCheckProgress();
		this.forceEnd();
		this._oC.dispatchEventData("onPreloadEnd",null);
		this.erase();
	}";
!(this.style == "Pie")||this.style == "Pie Spinner")
		{
			if(!(per > 50))
			{
				this.rHalfMask_mc._rotation = 3.6000 * per;

			} // end if
			else
			{
				this.rHalfMask_mc._rotation = 180;
				this.lHalfMask_mc._rotation = 3.6000 * per;

			}
		
		} // end if
		else
		{
			if(!(this.style == "Bar")||this.style == "Line")
			{
				this.barGroup_mc.barProgress_mc._width = this.barGroup_mc.barFrame_mc._width * (per / 100);

			} // end if
			else
			{
				if(this.style == "Beam")
				{
					this.beamText.text = per.toString();
					this.posBeamText();
					this.beamText._visible = true;
					this.beamText.setTextFormat(this.per_fmt);

				} // end if

			}

		}
			if(	Math.floor((o.sourceClip.getBytesLoaded() / o.sourceClip.getBytesTotal()) * 100).loadProgress = "function(	per)
	{
		this._oC.dispatchEventData("onPreloadProgress",per);
	}";
!(this.style == "Hidden"))
		{
			var _local3 = mx.transitions.Tween(this,_alpha,this.strongTween,this._alpha,0,1,true);
			new Object();
			new Object().onMotionFinished = mx.utils.Delegate.create(this,this.eraseComplete);
			_local3.addListener(new Object());
			if(this.style == "Beam")
			{
				this._tweenScaleX = mx.transitions.Tween(this,_xscale,mx.transitions.easing.Strong.easeInOut,this._xscale,0,0.5000,true);
				this._tweenScaleY = mx.transitions.Tween(this,_yscale,mx.transitions.easing.Strong.easeInOut,this._yscale,0,0.5000,true);

			} // end if
			else
			{
				if(!(this.style == "Line")||this.style == "Bar")
				{
					this.barGroup_mc.barProgress_mc._width = 0;

				} // end if

			}
		
		} // end if
		if(	per.erase = "function(	)
	{
	}";
this.style == "Pie Spinner")
		{
			this.spinner_mc.gotoAndStop(1);

		} // end if
		else
		{
			if(this.style == "Spinner")
			{
				this.spinner_solo_mc.gotoAndStop(1);

			} // end if
			else
			{
				if(this.style == "Beam")
				{
					this.beamAnim.gotoAndStop(1);

				} // end if

			}

		}
		if(	new Object().eraseComplete = "function(	)
	{
		this._visible = false;
	}";
	new Object().resetClips = "function(	)
	{
		this.rHalfMask_mc._rotation = this.rMaskRot;
		this.lHalfMask_mc._rotation = this.lMaskRot;
		this.spinner_mc.gotoAndStop(1);
		this.spinner_solo_mc.gotoAndStop(1);
	}";
!(this._oC.feedbackPreloaderPosition == "Inside Content Area")||!this._oC.isLivePreview||this._oC.isFirstImage)
		{
			this._oC.aaClass.alignWithContentArea(this._w,this._h,this._oC.feedbackPreloaderAlign,this._oC.GLOBAL_PAD);

		} // end if
		else
		{
			if(this._oC.feedbackPreloaderPosition == "Inside Content")
			{
				this.targetLoader;
				var _local2 = this._oC.aaClass.alignWithContent(this._w,this._h,this._oC.feedbackPreloaderAlign,this.targetLoader,this._oC.GLOBAL_PAD);

			} // end if

		}
		if(!(this._x == _local2.0))
		{
			this._x = Math.floor(_local2.0);

		} // end if
		if(!(this._y == _local2.1))
		{
			this._y = Math.floor(_local2.1);

		} // end if
		if(	new Object().arrange = "function(	)
	{
		var _local4 = 0;
		0;
		var _local2 = new Array();
		_local2.0;
		_local2.1;
	}";
!(this._oC.feedbackPreloaderAppearance == "Hidden"))
		{
			this.setTargetLoader();
			this.resetClips();
			this._starting = true;

		} // end if
	_local2.initPreload = "function(	o)
	{
		this.isAssetLoaded = false;
		this.sourceClip = "o";
		this.setupInitTimer();
	}";
	o.setupInitTimer = "function(	)
	{
		this._initTimer = setInterval(this,initCheckProgress,250);
	}";
	o.killInitTimer = "function(	)
	{
		clearInterval(this._initTimer);
	}";
	o.afterImageLoad = "function(	)
	{
		this.isAssetLoaded = true;
	}";
	o.setTargetLoader = "function(	)
	{
		this.targetLoader = this._oC.thisUnLoader;
	}";
	o.strongTween = mx.transitions.easing.Strong.easeOut;
	o._starting = true;
	o.isAssetLoaded = false;

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.Preloader.prototype,null,1);
