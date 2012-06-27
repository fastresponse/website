
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
			if(!_global.net.slideshowpro.slideshowpro.observers.ContentArea)
{
	net.slideshowpro.slideshowpro.observers.ContentArea = "function(	o)
	{
		this.init(o);
	}";
	function(	o)
	{
		this.init(o);
	}.prototype;
	function(	o)
	{
		this.init(o);
	}.prototype.init = "function(	o)
	{
		this._oC = "o";
		this.observers = new Array();
		this.dimObj = new Object();
	}";
	o.draw = "function(	)
	{
		this.setWaitandDelay();
	}";
this._oC.xmlFileType == "Director")
		{
			if(this._oC.captionAppearance == "Inline")
			{
				this.delayInitBroadcast = true;

			} // end if
		
		} // end if
		if(!(this._oC.captionAppearance == "Inline")||this._oC.isLivePreview)
		{
			this.waitForCaptionData = true;

		} // end if
		else
		{
			this.waitForCaptionData = false;

		}
		if(	o.setWaitandDelay = "function(	)
	{
	}";
this._oC.xmlFileType == "Director")
		{
			this.dimObj.apFullWidth = (this.dimObj.caFullWidth - this._oC.galleryPadding) / this._oC.galleryColumns - this._oC.galleryPadding + 1;
			this.dimObj.apFullHeight = this.dimObj.caFullHeight / this._oC.galleryRows - this._oC.galleryRows * this._oC.galleryPadding + this._oC.galleryPadding;
			this.dimObj.apWidth = this.dimObj.apFullWidth;
			this.dimObj.apHeight = this.dimObj.apFullHeight;

		} // end if
		if(this.delayInitBroadcast&&this._oC.isLivePreview)
		{
			this.notifyObservers();

		} // end if
			if(	o.createContentAreaObject = "function(	)
	{
		this.calcContentArea(this._oC.__width,this._oC.__height);
		this.dimObj.caWidth = this.calcContentArea(this._oC.__width,this._oC.__height).caWidth;
		this.dimObj.caHeight = this.calcContentArea(this._oC.__width,this._oC.__height).caHeight;
		this.dimObj.caTopM = this.calcContentArea(this._oC.__width,this._oC.__height).caTopM;
		this.dimObj.caBotM = this.calcContentArea(this._oC.__width,this._oC.__height).caBotM;
		this.dimObj.fsX = System.capabilities.screenResolutionX;
		this.dimObj.fsY = System.capabilities.screenResolutionY;
		var _local2 = this.calcContentArea(this.dimObj.fsX,this.dimObj.fsY);
		this.dimObj.caFullWidth = _local2.caWidth;
		this.dimObj.caFullHeight = _local2.caHeight;
		false;
	}";
!(this._oC.contentScale == "Crop to Fit")||!(this._oC.contentScale == "Crop to Fit All"))
		{
			if(this._oC.contentAreaStrokeAppearance == "Visible")
			{
				new Object().caWidth = new Object().caWidth - 2;
				new Object().caHeight = new Object().caHeight - 2;

			} // end if
			if(this._oC.contentFrameStrokeAppearance == "Visible")
			{
				new Object().caWidth = new Object().caWidth - 2;
				new Object().caHeight = new Object().caHeight - 2;

			} // end if
			if(this._oC.contentFramePadding > 0)
			{
				new Object().caWidth = new Object().caWidth - this._oC.contentFramePadding * 2;
				new Object().caHeight = new Object().caHeight - this._oC.contentFramePadding * 2;

			} // end if
		
		} // end if
				if(this.dimObj.navHeight)
		{
			if(!(this._oC.navAppearance == "Visible on Rollover"))
			{
				new Object().caHeight = new Object().caHeight - this.dimObj.navHeight;
				if(this.navPos == "Bottom")
				{
					new Object().caBotM = this.dimObj.navHeight;

				} // end if
				else
				{
					if(this.navPos == "Top")
					{
						new Object().caTopM = this.dimObj.navHeight;

					} // end if

				}
			
			} // end if
		
		} // end if
				if(this.dimObj.capHeight)
		{
			new Object().caHeight = new Object().caHeight - this.dimObj.capHeight;
			if(this._oC.captionAppearance == "Inline")
			{
				if(this._oC.captionPosition == "Top")
				{
					new Object().caTopM = new Object().caTopM + this.dimObj.capHeight;

				} // end if
				else
				{
					if(this._oC.captionPosition == "Bottom")
					{
						new Object().caBotM = new Object().caBotM + this.dimObj.capHeight;

					} // end if

				}
			
			} // end if
		
		} // end if
			if(	_local2.calcContentArea = "function(	w,h)
	{
		this.navPos = this._oC.navPosition;
		new Object();
		new Object().caWidth = "";
		new Object().caHeight = "w";
		new Object().caTopM = 0;
		new Object().caBotM = 0;
	}";
!isNaN(h))
		{
			this.dimObj.navHeight = "h";
			if(!this.waitForCaptionData)
			{
				this.createContentAreaObject();

			} // end if
		
		} // end if
			if(	new Object().setNavigationHeight = "function(	h)
	{
	}";
!isNaN(h))
		{
			this.dimObj.capHeight = "h";
!this.waitForCaptionData||			if(this.delayInitBroadcast)
			{
				this.delayInitBroadcast = false;
				this.createContentAreaObject();

			} // end if
		
		} // end if
		if(	h.setCaptionHeight = "function(	h)
	{
	}";
!isNaN(w)||!isNaN(h))
		{
			this.dimObj.apWidth = "w";
			this.dimObj.apHeight = "h";

		} // end if
		if(	h.setAlbumPreviewSize = "function(	w,h)
	{
	}";
!(this._oC.contentScale == "Crop to Fit All"))
		{
			new Object().w = this.dimObj.caWidth;
			new Object().h = this.dimObj.caHeight;
			new Object().fw = this.dimObj.caFullWidth;
			new Object().fh = this.dimObj.caFullHeight;

		} // end if
		else
		{
			new Object().w = this._oC.width;
			new Object().h = this._oC.height;
			new Object().fw = this.dimObj.fsX;
			new Object().fh = this.dimObj.fsY;

		}
			if(this._oC.contentScalePercent)
		{
!(this._oC.contentScalePercent > 100)||			if(this._oC.contentScalePercent < 0)
			{
				var _local3 = 100;

			} // end if
		
		} // end if
		if(!isNaN(_local3 / 100))
		{
			new Object().w = Math.floor(new Object().w * (_local3 / 100));
			new Object().h = Math.floor(new Object().h * (_local3 / 100));

		} // end if
			if(!(this._oC.albumPreviewStyle == "Fill")||this._oC.albumPreviewStyle == "Banner")
		{
!(this._oC.albumPreviewScale == "Crop to Fit")||			if(this._oC.albumPreviewScale == "Proportional")
			{
				new Object().apw = this.dimObj.apWidth;
				new Object().aph = this.dimObj.apHeight;

			} // end if
		
		} // end if
				if(	h.getDirectorData = "function(	)
	{
		new Object();
		var _local5 = this._oC.contentFormat;
		false;
		this._oC.contentScalePercent;
		_local3 / 100;
		new Object().apw = this._oC.albumPreviewSize.0;
		new Object().aph = this._oC.albumPreviewSize.1;
		new Object().apfw = this.dimObj.apFullWidth;
		new Object().apfh = this.dimObj.apFullHeight;
		this._oC.dataClass.setDirectorData(new Object());
	}";
	new Object().getDimensions = "function(	)
	{
	}";
!(_local3 == undefined))
		{
			0;
			if()
			{
				if(this.observers.0 == _local3)
				{

				} // end if
			while(				0++;
			} // end while
					this.observers.push(_local3);

		} // end if
		while(if(	new Object().addObserver = "function(	o)
	{
	}";
!((this.observers.slice(0).length - 1) < 0))
		{
			this.observers.slice(0).(this.observers.slice(0).length - 1).dimensionUpdate(this.dimObj);
			this.observers.slice(0).length - 1;
		} // end while
	(0++).notifyObservers = "function(	)
	{
		this.observers.slice(0);
		this.observers.slice(0).length - 1;
	}";
	(this.observers.slice(0).length - 1).delayInitBroadcast = false;

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.ContentArea.prototype,null,1);
