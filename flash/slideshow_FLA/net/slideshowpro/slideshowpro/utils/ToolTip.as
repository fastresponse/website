
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
if(!_global.net.slideshowpro.slideshowpro.utils)
{
	_global.net.slideshowpro.slideshowpro.utils = new Object();

} // end if
;
		if(!_global.net.slideshowpro.slideshowpro.utils.ToolTip)
{
	net.slideshowpro.slideshowpro.utils.ToolTip = "function(	clip,o)
	{
		clip.undefined();
		super._tC = "o";
		super._tC.enabled = false;
		super._oC = "";
	}";
	extends();
	function(	clip,o)
	{
		clip.undefined();
		super._tC = "o";
		super._tC.enabled = false;
		super._oC = "";
	}.prototype;
this._isTweening)
		{
			this.onComplete();

		} // end if
			if(	function(	clip,o)
	{
		clip.undefined();
		super._tC = "o";
		super._tC.enabled = false;
		super._oC = "";
	}.prototype.show = "function(	clip,copy)
	{
		this._tC._visible = false;
		this._parentObject = "copy";
		this.drawText(o);
		this.setOffset();
		this.drawBG();
		this._tC._x = this._tC._parent._xmouse + this._offSet;
		this._tC._y = this._tC._parent._ymouse - this._tC._height - 3;
		this.follow(this._followMouse);
		this._timer = setInterval(this,timerHandler,this._delay);
		this.__set__drawn(true);
	}";
this.__get__drawn())
		{
			if(!this._fade)
			{
				this.noAnimate(false);

			} // end if
			else
			{
				this.animate(false);

			}
					this.__set__drawn(false);

		} // end if
		if(	copy.destroy = "function(	)
	{
	}";
!this._fade)
		{
			this.noAnimate(true);

		} // end if
		else
		{
			this.animate(true);

		}
		if(this._timeout > 0)
		{
			this._timerout = setInterval(this,afterTimeOut,this._timeout);

		} // end if
		if(	copy.timerHandler = "function(	)
	{
		clearInterval(this._timer);
		this._tC._visible = true;
	}";
	copy.afterTimeOut = "function(	)
	{
		clearInterval(this._timerout);
		this.destroy();
	}";
value)
		{
			this._tC.onEnterFrame = mx.utils.Delegate.create(this,this.position);

		} // end if
		else
		{
			delete this._tC.onEnterFrame			follow;

		}
		if(	MovieClip.copy = "function(	value)
	{
	}";
(this._oC._x + this._defaultWidth + this._tC._parent._xmouse + this._offSet) > Stage.width)
		{
			this.forceRedraw("left");
			Stage.width - this._defaultWidth;

		} // end if
		if((Stage.width - this._defaultWidth) < 0&&(this._oC._x - this._defaultWidth + this._tC._parent._xmouse + this._offSet) < 0)
		{
			this.forceRedraw("right");
			0;

		} // end if
		if((this._tC._parent._ymouse - this._tC._height - 3) < 0)
		{
			var _local3 = 0;

		} // end if
		if(	value.position = "function(	)
	{
		var _local5 = 3;
		this._tC._parent._xmouse + this._offSet;
		this._tC._parent._ymouse - this._tC._height - 3;
		this._defaultWidth + this._tC._parent._xmouse + this._offSet;
		this._tC._x = Math.round(this._tC._x + (-this._tC._x) / _local5);
		this._tC._y = Math.round(this._tC._y + (_local3 - this._tC._y) / _local5);
	}";
!this._hasForcedRedrawn)
		{
			this._tC.clear();
			this.__set__align(newAlign);
			this.setOffset();
			this.drawBG();
			this._hasForcedRedrawn = true;

		} // end if
		if(	0.forceRedraw = "function(	newAlign)
	{
	}";
!this._copyOverride)
		{
			this.initCopyFormat();

		} // end if
		if(	newAlign.drawText = "function(	copy)
	{
		this._tf = this.createField();
		this._tf.setNewTextFormat(this._copyFormat);
		this._tf.text = _local3;
		this._tf._y = this._pad;
		this._tf._x = this._pad;
		this._tf.textWidth + 4 + this._pad * 2;
		this._defaultWidth = this._tf.textWidth + 4 + this._pad * 2;
	}";
	(this._tf.textWidth + 4 + this._pad * 2).createField = "function(	)
	{
		this._tC.createTextField("t_txt",1,0,0,100,20);
		var _local2 = this._tC.t_txt;
		_local2.embedFonts = this._embedType;
		_local2.autoSize = true;
		_local2.selectable = false;
	}";
	_local2.initCopyFormat = "function(	)
	{
		this._copyFormat = new TextFormat();
		this._copyFormat.font = "_sans";
		this._copyFormat.bold = false;
		this._copyFormat.size = 9;
		this._copyFormat.color = 3355443;
		this._copyFormat.align = "center";
	}";
	_local2.drawBG = "function(	)
	{
		this._tC.beginFill(this._bgColor,100);
		0;
		0;
		this._defaultWidth;
		this._tC._height + this._pad * 2;
		this._tC.moveTo(0,0);
		this._tC.lineTo(this._defaultWidth,0);
		this._tC.curveTo(this._defaultWidth,0,this._defaultWidth,0);
		this._tC.lineTo(this._defaultWidth,this._tC._height + this._pad * 2);
		this._tC.curveTo(this._defaultWidth,this._tC._height + this._pad * 2,this._defaultWidth,this._tC._height + this._pad * 2);
		this._tC.lineTo(this._pointerOffset + this._pointerSize,this._tC._height + this._pad * 2);
		this._tC.lineTo(this._pointerOffset,this._tC._height + this._pad * 2 + this._pointerSize);
		this._tC.lineTo(this._pointerOffset - this._pointerSize,this._tC._height + this._pad * 2);
		this._tC.lineTo(0,this._tC._height + this._pad * 2);
		this._tC.curveTo(0,this._tC._height + this._pad * 2,0,this._tC._height + this._pad * 2);
		this._tC.lineTo(0,0);
		this._tC.curveTo(0,0,0,0);
		this._tC.endFill();
	}";
!((this._tC._height + this._pad * 2) == true))
		{

		} // end if
		else
		{

		}
		if(!(this._tC._height + this._pad * 2))
		{
			var _local2 = new Object();
			this._tween.addListener(_local2);
			_local2.onMotionFinished = mx.utils.Delegate.create(this,this.onComplete);
			clearInterval(this._timer);

		} // end if
		if(	animate.0 = "function(	show)
	{
		this._isTweening = true;
		100;
		this._tween = mx.transitions.Tween(this._tC,_alpha,mx.transitions.easing.Strong.easeOut,this._tC._alpha,100,0.3500,true);
	}";
!b)
		{
			this.cleanUp();

		} // end if
		else
		{
			this._alpha = 100;

		}
		if(	_local2.noAnimate = "function(	b)
	{
	}";
	b.onComplete = "function(	)
	{
		this._isTweening = false;
		this.killTween();
		this.cleanUp();
	}";
	b.killTween = "function(	)
	{
		this._tween.stop();
		this._tween = null;
	}";
	0.b = "function(	value)
	{
		this._delay = value * 1000;
		__set__delay;
	}";
	net.slideshowpro.slideshowpro.utils.ToolTip.value = "function(	value)
	{
		this._timeout = value * 1000;
		__set__timeout;
	}";
	.value = "function(	value)
	{
		this._fade = "value";
		__set__fade;
	}";
right left center.indexOf(this._tC._height + this._pad * 2) == -1)
		{
			trace(this + " : Invalid Align Property, options are: 'right', 'left' & 'center'");

		} // end if
		else
		{
			this._align = this._tC._height + this._pad * 2).toLowerCase(;

		}
		if(	.value = "function(	value)
	{
		this._tC._height + this._pad * 2).toLowerCase(;
		right left center;
		__set__align;
	}";
this._copyFormat.font == null)
		{
			this._copyFormat.font = "_sans";

		} // end if
