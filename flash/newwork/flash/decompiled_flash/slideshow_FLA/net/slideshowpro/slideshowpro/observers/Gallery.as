
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
		if(!_global.net.slideshowpro.slideshowpro.observers.Gallery)
{
	net.slideshowpro.slideshowpro.observers.Gallery = "function(	t,o,f)
	{
		this._tC = "o";
		this._oC = "f";
		this._oF = "";
		this.init();
	}";
	function(	t,o,f)
	{
		this._tC = "o";
		this._oC = "f";
		this._oF = "";
		this.init();
	}.prototype;
	function(	t,o,f)
	{
		this._tC = "o";
		this._oC = "f";
		this._oF = "";
		this.init();
	}.prototype.init = "function(	)
	{
		this.initListeners();
	}";
	function(	t,o,f)
	{
		this._tC = "o";
		this._oC = "f";
		this._oF = "";
		this.init();
	}.prototype.initListeners = "		new Object().onFullScreenChange = "function(		eventObject)
		{
			self.afterScreenEvent(eventObject.data);
		}";
		eventObject._oC.addEventListener("onFullScreenChange",new Object());
	}";
this._numCols == 0)
		{
			this._numCols = 1;

		} // end if
		if(this._numRows == 0)
		{
			this._numRows = 1;

		} // end if
		if(this._oC.galleryNavAppearance == "Hidden")
		{
			this._useNav = false;

		} // end if
		else
		{
			this._useNav = true;

		}
		if(this._oC.isLivePreview)
		{
			this.removeChildren();

		} // end if
		if(	draw.false = "function(	d)
	{
		this._navH = d.navHeight;
		this.Y_GUTTER = this._oC._galleryPadding;
		this.X_GUTTER = this._oC._galleryPadding;
		this._numCols = this._oC.galleryColumns;
		this._numRows = this._oC.galleryRows;
		true;
		this.screenText_fmt = new TextFormat();
		this.screenText_fmt.font = this._oC.typeface;
		this.screenText_fmt.size = this._oC.galleryNavTextSize;
		this.screenText_fmt.color = this._oC.galleryNavTextColor;
		this.drawGallery();
	}";
!(this._oC.galleryNavAppearance == "Hidden"))
		{
			this.drawScreenNav();

		} // end if
		if(	d.redraw = "function(	)
	{
		this.drawScreen();
	}";
!(this._oC.galleryNavAppearance == "Hidden"))
		{
			this.drawScreenNav();

		} // end if
		if(	d.setData = "function(	)
	{
		this.iData = this._oC.dataClass.getData();
		this.calcScreenData();
		this.drawScreen();
	}";
	d.calcNumPerScreen = "function(	)
	{
		this._numPerScreen = this._numCols * this._numRows;
	}";
this.isInit&&this._oC.isLivePreview)
		{
			this.createChildren();

		} // end if
		else
		{
			this.posAlbums();

		}
		if(this.isScreenNavCreated)
		{
			this.destroyScreenNav();

		} // end if
		if(this._useNav)
		{
			this.createScreenNav();

		} // end if
		if(!this._oC.isLivePreview)
		{
			this.isInit = true;

		} // end if
		while(if(	d.drawGallery = "function(	)
	{
		this.calcNumPerScreen();
		this.calcAlbumSize();
		this.calcPreviewSize();
	}";
)
		{
			this.gItems.0.setData(this.iData.this._numPerScreen * this.currentScreen.0,this._numPerScreen * this.currentScreen);
			this.gItems.0._visible = true;
			0++;
		} // end while
			while(if((_local5 - this._numPerScreen) > 0)
		{
			this._numPerScreen;
			if(this._numPerScreen < _local5)
			{
				this.gItems.this._numPerScreen._visible = false;
				this._numPerScreen++;
			} // end while
		
		} // end if
		if(	d.drawScreen = "function(	)
	{
		this.formatAlbums();
		this._numPerScreen * this.currentScreen;
		0;
		var _local5 = this.gItems.length;
		_local5 - this._numPerScreen;
	}";
(this.currentScreen + 1) < this.maxScreens)
		{
			this.enableNextButton();

		} // end if
		else
		{
			this.disableNextButton();

		}
		if((this.currentScreen + 1) > 1)
		{
			this.enablePrevButton();

		} // end if
		else
		{
			this.disablePrevButton();

		}
				while(if(	(0++).drawScreenNav = "function(	)
	{
		this.screenCount.scText_txt.text = this._oC.textStrings.2 + " " + this.currentScreen + 1 + " " + this._oC.textStrings.3 + " " + this.maxScreens;
		this.setTextFields();
		this.currentScreen + 1;
	}";
this._oC.galleryOrder == "Left to Right")
		{
			var _local3 = 0;
			if(_local3 < this._numRows)
			{
				0;
				if()
				{
					0++;
					var _local5 = this._tC.attachMovie(this._clip,"a" + 0++,0).init(this._oC);
					this.gItems.push(_local5);
					0++;
				} // end while
			while(				_local3++;
			} // end while
		
		} // end if
		else
		{
					while(if(this._oC.galleryOrder == "Top to Bottom")
			{
				0;
				if()
				{
					0;
					if()
					{
						(0++)++;
						this._tC.attachMovie(this._clip,"a" + (0++)++,0++).init(this._oC);
						this.gItems.push(this._tC.attachMovie(this._clip,"a" + (0++)++,0++).init(this._oC));
						0++;
					} // end while
				while(					0++;
				} // end while
			
			} // end if

		}
				while(if(	(this.currentScreen + 1).createChildren = "function(	)
	{
		undefined;
		0;
		undefined;
		var _local2 = undefined;
		this.gItems = new Array();
		this.posAlbums();
	}";
this._oC.galleryOrder == "Left to Right")
		{
			var _local2 = 0;
			if(_local2 < this._numRows)
			{
				var _local3 = 0;
				if(_local3 < this._numCols)
				{
					this.gItems.0._x = _local3 * this.albumXSpace;
					this.gItems.0._y = _local2 * this.albumYSpace;
					0++;
					_local3++;
				} // end while
			while(				_local2++;
			} // end while
		
		} // end if
		else
		{
					while(if(this._oC.galleryOrder == "Top to Bottom")
			{
				0;
				if()
				{
					0;
					if()
					{
						this.gItems.(0++)._x = ;
						this.gItems.(0++)._y = ;
						(0++)++;
						0++;
					} // end while
				while(					0++;
				} // end while
			
			} // end if

		}
		if(this._useNav)
		{
			(0++)++;
			this.screenNavY = (0++) * this.albumYSpace;

		} // end if
		while(if(	(0++).posAlbums = "function(	)
	{
		undefined;
		undefined;
		0;
	}";
)
		{
			this.gItems.0.clearData();
			this.gItems.0.setAlbumFormat(this.aW,this.aH,this.aPW,this.aPH,this.isFS);
			0++;
		} // end while
		if(	((0++)++).formatAlbums = "function(	)
	{
		0;
	}";
	(0++).removeChildren = "function(	)
	{
		net.slideshowpro.slideshowpro.utils.Utils.removeClips(this._tC);
	}";
this._oC.typefaceEmbed == "Off")
		{
			this.screenCount.scText_txt.embedFonts = false;

		} // end if
		else
		{
			this.screenCount.scText_txt.embedFonts = true;

		}
		if(this._oC.galleryNavStrokeAppearance == "Visible")
		{
			net.slideshowpro.slideshowpro.draw.DrawStroke.create(this.pBttn.createEmptyMovieClip("stroke_mc",this.pBttn.getNextHighestDepth()),this.screenBttnW,this.SCREEN_NAV_HEIGHT,1,this._oC.galleryNavStrokeColor,100);
			net.slideshowpro.slideshowpro.draw.DrawStroke.create(this.nBttn.createEmptyMovieClip("stroke_mc",this.nBttn.getNextHighestDepth()),this.screenBttnW,this.SCREEN_NAV_HEIGHT,1,this._oC.galleryNavStrokeColor,100);

		} // end if
		if(this._oC.typefaceEmbed == "Off")
		{
			this.pBttnText.embedFonts = false;
			this.nBttnText.embedFonts = false;

		} // end if
		else
		{
			this.pBttnText.embedFonts = true;
			this.nBttnText.embedFonts = true;

		}
		if(!this._oC.isLivePreview)
		{
			this.disableNextButton();

		} // end if
		if(	(0++).createScreenNav = "function(	)
	{
		this.screenNav = this._tC.createEmptyMovieClip("screenNav_mc",500);
		this.screenBttnW = (this.albumXSpace * this._numCols) / 3 - this.X_GUTTER;
		this.screenCountW = this.albumXSpace * this._numCols - this.screenBttnW * 2 - this.X_GUTTER * 3;
		this.screenCount = this.screenNav.createEmptyMovieClip("screenCount_mc",0);
		var _local5 = net.slideshowpro.slideshowpro.draw.DrawRadiusBox();
		_local5.drawBox(this.screenCount,new Array(this._oC.galleryNavInactiveColor),100,0,0,this.screenCountW,this.SCREEN_NAV_HEIGHT,6);
		this.screenCount.createTextField("scText_txt",this.screenCount.getNextHighestDepth(),0,0,this.screenCountW,this.SCREEN_NAV_HEIGHT);
		this.screenCount.scText_txt.selectable = false;
		this.screenCount.scText_txt.setNewTextFormat(this.screenText_fmt);
		this.screenCount.scText_txt.text = this._oC.textStrings.2 + " 1 of 1";
		this.pBttn = this.screenNav.createEmptyMovieClip("pBttn_mc",this.screenNav.getNextHighestDepth());
		this.pBttn.createEmptyMovieClip("pBttnBG_mc",this.pBttn.getNextHighestDepth());
		this.pBttn.createEmptyMovieClip("stroke_mc",this.pBttn.getNextHighestDepth());
		this.nBttn = this.screenNav.createEmptyMovieClip("nBttn_mc",this.screenNav.getNextHighestDepth());
		this.nBttn.createEmptyMovieClip("nBttnBG_mc",this.nBttn.getNextHighestDepth());
		this.nBttn.createEmptyMovieClip("stroke_mc",this.nBttn.getNextHighestDepth());
		net.slideshowpro.slideshowpro.draw.DrawRect.create(this.pBttn.createEmptyMovieClip("pBttnBG_mc",this.pBttn.getNextHighestDepth()),this.screenBttnW,this.SCREEN_NAV_HEIGHT,this._oC.galleryNavActiveColor,100);
		net.slideshowpro.slideshowpro.draw.DrawRect.create(this.nBttn.createEmptyMovieClip("nBttnBG_mc",this.nBttn.getNextHighestDepth()),this.screenBttnW,this.SCREEN_NAV_HEIGHT,this._oC.galleryNavActiveColor,100);
		this.pBttn.createTextField("t_txt",this.pBttn.getNextHighestDepth(),0,0,this.screenBttnW,this.SCREEN_NAV_HEIGHT);
		this.nBttn.createTextField("t_txt",this.nBttn.getNextHighestDepth(),0,0,this.screenBttnW,this.SCREEN_NAV_HEIGHT);
		this.pBttnText = this.pBttn.t_txt;
		tP;`";
	this.nBttn.createEmptyMovieClip("nBttnBG_mc",this.nBttn.getNextHighestDepth()).destroyScreenNav = "function(	)
	{
		this.screenNav.removeMovieClip();
	}";
	this.nBttn.createEmptyMovieClip("nBttnBG_mc",this.nBttn.getNextHighestDepth()).setTextFields = "function(	)
	{
		this.screenCount.scText_txt._x = this.floor(this.screenCountW / 2 - this.screenCount.scText_txt.textWidth / 2);
		this.screenCount.scText_txt._y = this.floor(this.SCREEN_NAV_HEIGHT / 2 - this.screenCount.scText_txt.textHeight / 2 - 1);
		this.nBttnText._x = this.floor(this.screenBttnW / 2 - this.nBttnText.textWidth / 2);
		this.pBttnText._x = this.floor(this.screenBttnW / 2 - this.pBttnText.textWidth / 2);
		this.pBttnText._y = this.floor(this.SCREEN_NAV_HEIGHT / 2 - this.pBttnText.textHeight / 2 - 1);
		this.nBttnText._y = this.floor(this.SCREEN_NAV_HEIGHT / 2 - this.pBttnText.textHeight / 2 - 1);
	}";
this.albumXSpace > (this.ALBUM_MIN_W + this.X_GUTTER))
		{

		} // end if
		if(	this.nBttn.createEmptyMovieClip("nBttnBG_mc",this.nBttn.getNextHighestDepth()).testColumnWidth = "function(	)
	{
	}";
this.albumYSpace > (this.ALBUM_MIN_H + this.Y_GUTTER))
		{

		} // end if
		if(	this.nBttn.createEmptyMovieClip("nBttnBG_mc",this.nBttn.getNextHighestDepth()).testRowHeight = "function(	)
	{
	}";
	this.nBttn.createEmptyMovieClip("nBttnBG_mc",this.nBttn.getNextHighestDepth()).calcItemXSpace = "function(	)
	{
		this.albumXSpace = this.round((this._oC.__width - this.X_GUTTER) / this._numCols);
	}";
this._useNav)
		{
			this.Y_GUTTER * 2;

		} // end if
		else
		{
			0;

		}
		if(this._oC.navAppearance == "Hidden When Gallery Open")
		{
			this._navH = 0;

		} // end if
		if(	this.nBttn.createEmptyMovieClip("nBttnBG_mc",this.nBttn.getNextHighestDepth()).calcItemYSpace = "function(	)
	{
		this.Y_GUTTER;
		this.SCREEN_NAV_HEIGHT;
		this.albumYSpace = this.floor((this._oC.__height - this._navH - 0 - this.Y_GUTTER * 2) / this._numRows);
	}";
	0.calcScreenData = "function(	)
	{
		this.calcNumPerScreen();
		this.calcScreens();
	}";
!(_local2 > this._numCols))
		{
			this._numCols = _local2;

		} // end if
		if(	0.setNumColumns = "function(	)
	{
		var _local2 = this.floor(this._oC.__width / this.ALBUM_MIN_W);
		this.calcScreenData();
	}";
!(this.floor((this._oC.__height - this._navH - this.Y_GUTTER) / this.ALBUM_MIN_H) > this._numRows))
		{
			this._numRows = this.floor((this._oC.__height - this._navH - this.Y_GUTTER) / this.ALBUM_MIN_H);

		} // end if
		if(	_local2.setNumRows = "function(	)
	{
		this.floor((this._oC.__height - this._navH - this.Y_GUTTER) / this.ALBUM_MIN_H);
		this.calcScreenData();
	}";
!this.testColumnWidth())
		{
			this.setNumColumns();
			this.calcItemXSpace();

		} // end if
		if(!this.testRowHeight())
		{
			this.setNumRows();
			this.calcItemYSpace();

		} // end if
					if(	this.floor((this._oC.__height - this._navH - this.Y_GUTTER) / this.ALBUM_MIN_H).calcAlbumSize = "function(	)
	{
		this.calcScreenData();
		this.calcItemXSpace();
		this.calcItemYSpace();
		this.aW = this.albumXSpace - this.X_GUTTER;
		this.aH = this.albumYSpace - this.Y_GUTTER;
	}";
!(this._oC.albumPreviewStyle == "Fill"))
		{
			if(this._oC.albumPreviewStyle == "Banner")
			{
				this.aPW = Math.floor(this.aW - this._oC.albumPadding * 2 - this._oC.albumPreviewStrokeWeight * 2);
				if(!this.isFS)
				{
					this.aPH = this._oC.albumPreviewSize.1;
					if(this._bRatio == undefined)
					{
						this._bRatio = this.aPW / this.aPH;

					} // end if
				
				} // end if
				else
				{
					this.aPH = this.aPW / this._bRatio;

				}
			
			} // end if
			else
			{
				this.aPW = this._oC.albumPreviewSize.0;
				this.aPH = this._oC.albumPreviewSize.1;

			}
		
		} // end if
		else
		{
			this.aPW = this.aW;
			this.aPH = this.aH;

		}
		if(	this.floor((this._oC.__height - this._navH - this.Y_GUTTER) / this.ALBUM_MIN_H).calcPreviewSize = "function(	)
	{
		this.broadcastAlbumPreviewSize(this.aPW,this.aPH);
	}";
	this.floor((this._oC.__height - this._navH - this.Y_GUTTER) / this.ALBUM_MIN_H).broadcastAlbumPreviewSize = "function(	w,h)
	{
		this._oC.caClass.setAlbumPreviewSize(this.Y_GUTTER * 2,h);
	}";
this.maxScreens == 0)
		{
			this.maxScreens = 1;

		} // end if
		if(	h.calcScreens = "function(	)
	{
		this.maxScreens = Math.ceil(this.iData.length / this._numPerScreen);
	}";
this._oC.galleryNavStrokeAppearance == "Visible")
		{
			this.pBttn.stroke_mc.clear();

		} // end if
		if(	h.disablePrevButton = "function(	)
	{
		this.pBttn.enabled = false;
		this.pBttnColor.setRGB(this._oC.galleryNavInactiveColor);
	}";
this._oC.galleryNavStrokeAppearance == "Visible")
		{
			this.nBttn.stroke_mc.clear();

		} // end if
		if(	h.disableNextButton = "function(	)
	{
		this.nBttn.enabled = false;
		this.nBttnColor.setRGB(this._oC.galleryNavInactiveColor);
	}";
this._oC.galleryNavStrokeAppearance == "Visible")
		{
			net.slideshowpro.slideshowpro.draw.DrawStroke.create(this.pBttn.stroke_mc,this.screenBttnW,this.SCREEN_NAV_HEIGHT,1,this._oC.galleryNavStrokeColor,100);

		} // end if
		if(	h.enablePrevButton = "function(	)
	{
		this.pBttn.enabled = true;
		this.pBttnColor.setRGB(this._oC.galleryNavActiveColor);
	}";
this._oC.galleryNavStrokeAppearance == "Visible")
		{
			net.slideshowpro.slideshowpro.draw.DrawStroke.create(this.nBttn.stroke_mc,this.screenBttnW,this.SCREEN_NAV_HEIGHT,1,this._oC.galleryNavStrokeColor,100);

		} // end if
			if(	h.enableNextButton = "function(	)
	{
		this.nBttn.enabled = true;
		this.nBttnColor.setRGB(this._oC.galleryNavActiveColor);
	}";
(this.currentScreen + 1) < this.maxScreens)
		{
			this.currentScreen = this.currentScreen++;
			this.drawScreen();
			if(!(this._oC.galleryNavAppearance == "Hidden"))
			{
				this.drawScreenNav();

			} // end if
		
		} // end if
			if(	h.nextScreen = "function(	)
	{
	}";
(this.currentScreen - 1) > -1)
		{
			this.currentScreen = this.currentScreen;
			this.drawScreen();
			if(!(this._oC.galleryNavAppearance == "Hidden"))
			{
				this.drawScreenNav();

			} // end if
		
		} // end if
			if(	h.prevScreen = "function(	)
	{
	}";
	h.nBttnROver = "function(	)
	{
		this.nBttnColor.setRGB(this._oC.galleryNavRolloverColor);
		this._oC.playSound("roll");
	}";
	h.pBttnROver = "function(	)
	{
		this.pBttnColor.setRGB(this._oC.galleryNavRolloverColor);
		this._oC.playSound("roll");
	}";
	h.nBttnROut = "function(	)
	{
		this.nBttnColor.setRGB(this._oC.galleryNavActiveColor);
	}";
	h.pBttnROut = "function(	)
	{
		this.pBttnColor.setRGB(this._oC.galleryNavActiveColor);
	}";
	h.nBttnRelease = "function(	)
	{
		this._oC.dispatchEventData("onReqNextScreen");
		this._oC.playSound("slide");
	}";
	h.pBttnRelease = "function(	)
	{
		this._oC.dispatchEventData("onReqPrevScreen");
		this._oC.playSound("slide");
	}";
this._oC.fullScreenTakeOver == "On"&&this._oC.fullScreenReformat == "On")
		{
			if(fs == "normal")
			{
				this.isFS = false;

			} // end if
			else
			{
				if(fs == "fullScreen")
				{
					this.isFS = true;

				} // end if

			}
		
		} // end if
	h.afterScreenEvent = "function(	fs)
	{
	}";
	fs._useNav = true;
	fs.isInit = false;
	fs.isScreenNavCreated = false;
	fs.currentScreen = 0;
	fs.ALBUM_MIN_W = 25;
	fs.ALBUM_MIN_H = 25;
	fs.SCREEN_NAV_HEIGHT = 20;
	fs._clip = "AlbumSymbol";
	fs.floor = Math.floor;
	fs.round = Math.round;

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.Gallery.prototype,null,1);
