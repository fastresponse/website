
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
if(!_global.net.slideshowpro.slideshowpro.managers)
{
	_global.net.slideshowpro.slideshowpro.managers = new Object();

} // end if
;
		if(!_global.net.slideshowpro.slideshowpro.managers.ScreenManager)
{
	net.slideshowpro.slideshowpro.managers.ScreenManager = "function(	o)
	{
		this.init(o);
	}";
	function(	o)
	{
		this.init(o);
	}.prototype;
net.slideshowpro.slideshowpro.utils.Utils.isFlashPlayerNine())
		{
			this.initListeners();

		} // end if
		if(	function(	o)
	{
		this.init(o);
	}.prototype.init = "function(	o)
	{
		this._oC = "o";
	}";
	o.initListeners = "		new Object().onScreenBttnEvent = "function(		eventObject)
		{
			self.toggleDisplayState();
		}";
		this._oC.addEventListener("onScreenBttnEvent",new Object());
	}";
	new Object().setDisplayState = "function(	s)
	{
		Stage.displayState = "s";
	}";
Stage.displayState == "fullScreen")
		{
			this.setDisplayState("normal");

		} // end if
		else
		{
			this.setDisplayState("fullScreen");

		}
			if(	new Object().toggleDisplayState = "function(	)
	{
	}";
	new Object().dispatchScreenChange = "function(	s)
	{
		this._oC.dispatchEventData("onFullScreenChange",s);
	}";
this._oC.fullScreenTakeOver == "On")
		{
			if(Stage.displayState == "fullScreen")
			{
				this.goFullScreen();

			} // end if
			else
			{
				if(Stage.displayState == "normal")
				{
					this.exitFullScreen();

				} // end if

			}
		
		} // end if
	s.resize = "function(	)
	{
		Stage.displayState;
		this.dispatchScreenChange(Stage.displayState);
	}";
	Stage.displayState.recordOrigInfo = "function(	)
	{
		this.origX = this._oC._x;
		this.origY = this._oC._y;
		this.origWidth = this._oC.__width;
		this.origHeight = this._oC.__height;
		this.origStageAlign = Stage.align;
		this.origStageScale = Stage.scaleMode;
	}";
	Stage.displayState.goFullScreen = "function(	)
	{
		this.recordOrigInfo();
		Stage.align = "TL";
		Stage.scaleMode = "noScale";
		this._oC._y = 0;
		this._oC._x = 0;
		this._oC.setSize(Stage.width,Stage.height);
	}";
	Stage.displayState.exitFullScreen = "function(	)
	{
		Stage.align = this.origStageAlign;
		Stage.scaleMode = this.origStageScale;
		this._oC._x = this.origX;
		this._oC._y = this.origY;
		this._oC.setSize(this.origWidth,this.origHeight);
	}";

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.managers.ScreenManager.prototype,null,1);
