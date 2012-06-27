
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
		if(!_global.net.slideshowpro.slideshowpro.observers.VideoSpinner)
{
	net.slideshowpro.slideshowpro.observers.VideoSpinner = "function(	t,o)
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
		this._tC._visible = false;
		this._tC._alpha = 0;
		this.initListeners();
	}";
	function(	t,o)
	{
		t.undefined();
		super._oC = "";
		super._tC = "o";
		super.init();
	}.prototype.initListeners = "		new Object().onVideoEnd = "function(		)
		{
			self.afterVideoEnd();
		}";
		eventObject._oC.addEventListener("onVideoEnd",new Object());
	}";
this._tC._width > 0&&this._tC._height > 0)
		{
			this._w = this._tC._width;
			this._h = this._tC._height;

		} // end if
		if(	new Object().drawAsset = "function(	)
	{
		this._tC._yscale = this._oC.feedbackScale;
		this._tC._xscale = this._oC.feedbackScale;
		this.clipcolor = this._oC.feedbackHighlightColor;
		this.hlAlpha = this._oC.feedbackHighlightAlpha;
		this._clip = this._tC.attachMovie("videoSpinner","vp_mc",0);
		this.applyHighlightColor(this._clip.spinner_solo_mc);
		this._tC._visible = false;
	}";
	new Object().anim = "function(	)
	{
		this.arrange();
		this._tC._visible = true;
		mx.transitions.Tween(this._tC,_alpha,this.strongTween,0,100,1.5000,true);
		this._clip.spinner_solo_mc.gotoAndPlay("go");
	}";
	new Object().stopAnim = "function(	)
	{
		this._clip.spinner_solo_mc.gotoAndStop(1);
		this._tC._visible = false;
	}";
!(this._tC._x == this._oC.aaClass.alignWithContentArea(this._w,this._h,this._oC.feedbackPreloaderAlign,this._oC.GLOBAL_PAD).0))
		{
			this._tC._x = Math.floor(this._oC.aaClass.alignWithContentArea(this._w,this._h,this._oC.feedbackPreloaderAlign,this._oC.GLOBAL_PAD).0);

		} // end if
		if(!(this._tC._y == this._oC.aaClass.alignWithContentArea(this._w,this._h,this._oC.feedbackPreloaderAlign,this._oC.GLOBAL_PAD).1))
		{
			this._tC._y = Math.floor(this._oC.aaClass.alignWithContentArea(this._w,this._h,this._oC.feedbackPreloaderAlign,this._oC.GLOBAL_PAD).1);

		} // end if
		if(	new Object().arrange = "function(	)
	{
		0;
		var _local2 = 0;
		var _local4 = new Array();
		this._oC.aaClass.alignWithContentArea(this._w,this._h,this._oC.feedbackPreloaderAlign,this._oC.GLOBAL_PAD);
		this._oC.aaClass.alignWithContentArea(this._w,this._h,this._oC.feedbackPreloaderAlign,this._oC.GLOBAL_PAD).0;
		this._oC.aaClass.alignWithContentArea(this._w,this._h,this._oC.feedbackPreloaderAlign,this._oC.GLOBAL_PAD).1;
	}";
this.isNetStreamAnim)
		{
			this.isNetStreamAnim = false;
			this.stopAnim();

		} // end if
		while(if(	this._oC.aaClass.alignWithContentArea(this._w,this._h,this._oC.feedbackPreloaderAlign,this._oC.GLOBAL_PAD).1.removeSpinner = "function(	)
	{
	}";
)
		{
			new Color(this.0);
			new Color(this.0).setRGB(arguments.clipcolor);
			this.0._alpha = arguments.hlAlpha;
			0++;
		} // end while
				if(	this._oC.aaClass.alignWithContentArea(this._w,this._h,this._oC.feedbackPreloaderAlign,this._oC.GLOBAL_PAD).1.applyHighlightColor = "function(	)
	{
		0;
	}";
!(this._oC.feedbackPreloaderAppearance == "Hidden"))
		{
!(s == "NetStream.Buffer.Empty")||			if(s == "NetStream.Play.Start")
			{
!this.isNetStreamAnim||				if(!this.isVideoComplete)
				{
					this.isNetStreamAnim = true;
					this.drawAsset();
					this.anim();

				} // end if
			
			} // end if
			else
			{
				if(s == "NetStream.Buffer.Full")
				{
					this.removeSpinner();

				} // end if

			}
		
		} // end if
	this.afterNetStream = "function(	s)
	{
	}";
	s.afterPreloadInit = "function(	)
	{
		this.isVideoComplete = false;
		this.removeSpinner();
	}";
	s.afterVideoEnd = "function(	)
	{
		this.isVideoComplete = true;
	}";
	s.strongTween = mx.transitions.easing.Strong.easeOut;
	s.isNetStreamAnim = false;
	s.isVideoComplete = false;

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.VideoSpinner.prototype,null,1);
