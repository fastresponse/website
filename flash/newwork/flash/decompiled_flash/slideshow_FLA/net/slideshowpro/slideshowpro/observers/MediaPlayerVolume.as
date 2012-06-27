
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
		if(!_global.net.slideshowpro.slideshowpro.observers.MediaPlayerVolume)
{
	net.slideshowpro.slideshowpro.observers.MediaPlayerVolume = "function(	)
	{
		super.undefined();
	}";
	extends();
	function(	)
	{
		super.undefined();
	}.prototype;
	createVolume.net.slideshowpro.slideshowpro.observers.MediaPlayerVolume = "function(	target_mc,oC)
	{
		caseOp();
		var _local1 = .attachMovie("MediaPlayerVolumeSymbol","mpv_mc",0);
		_local1._oC = "oC";
		_local1._visible = false;
		_local1.init();
	}";
	oC.init = "function(	)
	{
		this.amtDefaultW = this.amt_mc._width;
		this.control_mc.onReleaseOutside = mx.utils.Delegate.create(this,this.onControlRelease);
		this.control_mc.onRelease = mx.utils.Delegate.create(this,this.onControlRelease);
		this.control_mc.onMouseUp = mx.utils.Delegate.create(this,this.onControlRelease);
		this.control_mc.onPress = mx.utils.Delegate.create(this,this.onControlPress);
		this.control_mc.useHandCursor = false;
	}";
	oC.draw = "function(	)
	{
		new Color(this.bg_mc);
		new Color(this.bg_mc).setRGB(this._oC._oC.mediaPlayerVolumeBackgroundColor);
		new Color(this.amt_mc);
		new Color(this.amt_mc).setRGB(this._oC._oC.mediaPlayerVolumeHighlightColor);
	}";
	new Color(this.amt_mc).setSize = "function(	w,h)
	{
		w._height = "h";
	}";
	h.setDefaultAmt = "function(	)
	{
		this.posAmt((this.amtDefaultW * this._oC.getPrefVolume()) / 100);
	}";
	h.onControlPress = "function(	)
	{
		this.isControlPressed = true;
		this.adjustControlVolume();
		this.control_mc.onMouseMove = mx.utils.Delegate.create(this,this.onControlMove);
	}";
this.isControlPressed)
		{
			this.adjustControlVolume();
			updateAfterEvent();

		} // end if
		if(	h.onControlMove = "function(	)
	{
	}";
this.isControlPressed)
		{
			this.isControlPressed = false;
			this.adjustControlVolume();
			this.killControlDrag();

		} // end if
		if(	h.onControlRelease = "function(	)
	{
	}";
!n)
		{
			this.amt_mc._width = this.control_mc._xmouse;

		} // end if
		else
		{
			this.amt_mc._width = "n";

		}
		if(	h.posAmt = "function(	n)
	{
	}";
	n.killControlDrag = "function(	)
	{
		this.control_mc.onMouseUp = null;
		this.control_mc.onMouseMove = null;
	}";
	n.calcMoveVol = "function(	)
	{
		Math.floor((this.control_mc._xmouse * 100) / this.control_mc._width);
	}";
_local2 < 0)
		{
			0;

		} // end if
		if()
		{
			var _local2 = 100;

		} // end if
		if(this.isControlPressed)
		{
			this._oC.setPrefVolume(_local2);

		} // end if
	Math.floor((this.control_mc._xmouse * 100) / this.control_mc._width).adjustControlVolume = "function(	)
	{
		this.posAmt();
		var _local2 = this.calcMoveVol();
		this.adjustVolume(_local2);
	}";
	_local2.adjustVolume = "function(	n)
	{
		this._oC.adjustVolume(n);
	}";
	n.visible = "function(	b)
	{
		this._visible = "b";
	}";

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.MediaPlayerVolume.prototype,null,1);
