
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
		if(!_global.net.slideshowpro.slideshowpro.observers.Album)
{
	net.slideshowpro.slideshowpro.observers.Album = "function(	)
	{
		super.undefined();
	}";
	extends();
	function(	)
	{
		super.undefined();
	}.prototype;
	function(	)
	{
		super.undefined();
	}.prototype.init = "function(	o)
	{
		this.tempBox._visible = false;
		this._oC = "o";
		this.aDefBGColor = this._oC.albumBackgroundColor;
		this.aPScale = this._oC.albumPreviewScale;
		this.aPStyle = this._oC.albumPreviewStyle;
		this.aPSC = this._oC.albumPreviewStrokeColor;
		this.aPSW = this._oC.albumPreviewStrokeWeight;
		this.aSC = this._oC.albumStrokeColor;
		this.tE = this._oC.typefaceEmbed;
		this.aPad = this._oC.albumPadding;
		this.createChildren();
		this.setupListener();
	}";
	o.createChildren = "function(	)
	{
		this.strokeClip = this.createEmptyMovieClip("s_mc",99);
		this.bgClip = this.createEmptyMovieClip("bg_mc",1);
		this.aContent = this.attachMovie("albumContent","aText_mc",2);
		this.thumbBox = this.aContent.albumThumb_mc;
		this.thumbImage = this.thumbBox.createEmptyMovieClip("tClip",10);
		this.thumbMask = this.createEmptyMovieClip("tMask",50);
		this.albumHighlight = new Color(this.bgClip);
	}";
	o.setupListener = "function(	)
	{
		this.tnListener = new Object();
		this.tn_mcl = new MovieClipLoader();
	}";
isNaN(this.aPH))
		{
			this.aPH = 40;

		} // end if
		if(isNaN(this.aPW))
		{
			this.aPW = 50;

		} // end if
		if(this._oC.albumStrokeAppearance == "Visible")
		{
			net.slideshowpro.slideshowpro.draw.DrawStroke.create(this.strokeClip,aH,,1,this.aSC,100);

		} // end if
			if(!(this.aPStyle == "Fill"))
		{
			this.aContent._y = this.aPad;
			new Color(this.thumbBox.b_mc);
			new Color(this.thumbBox.b_mc).setRGB(this.aPSC);
			this.aTitleTC = this._oC.albumTitleColor;
			if(this.tE == "Off")
			{
				this.aContent.desc_txt.embedFonts = false;
				this.aContent.title_txt.embedFonts = false;

			} // end if
			else
			{
				this.aContent.desc_txt.embedFonts = true;
				this.aContent.title_txt.embedFonts = true;

			}
					this.title_fmt = new TextFormat();
			this.title_fmt.font = this._oC.typefaceHead;
			this.title_fmt.size = this._oC.albumTitleSize;
			this.title_fmt.color = this.aTitleTC;
			this.title_fmt.bold = true;
			this.desc_fmt = new TextFormat();
			this.desc_fmt.font = this._oC.typeface;
			this.desc_fmt.size = this._oC.albumDescSize;
			this.desc_fmt.color = this._oC.albumDescColor;
			this.desc_fmt.align = this._oC.albumTextAlignment;
			this.title_fmt.align = this._oC.albumTextAlignment;
			this.aContent.title_txt.html = true;
			this.aContent.desc_txt.html = true;
			this.aContent.title_txt._y = this.aContent.title_txt._y - 3;
			this.defaultTextSize();

		} // end if
		if(!this._oC.isLivePreview)
		{
			this.aContent._visible = false;
			this.thumbBox._visible = false;
			this.thumbBox.b_mc._visible = false;
			this.thumbBox.thumbSize_mc._visible = false;
			this.thumbBox.thumbSize_mc.t_txt._height = 0;
			this.thumbBox.thumbSize_mc.t_txt._width = 0;
			this.thumbBox.thumbSize_mc.d_txt._height = 0;
			this.thumbBox.thumbSize_mc.d_txt._width = 0;

		} // end if
		else
		{
			this.thumbBox._visible = true;
					if(!(this.aPStyle == "Fill"))
			{
				this.thumbBox.thumbSize_mc.d_txt.autoSize = true;
				this.thumbBox.thumbSize_mc.d_txt.multiline = true;
!(this.aPStyle == "Inline Right")||				if(this.aPStyle == "Inline Left")
				{
					this.thumbBox.thumbSize_mc.d_txt._width = this.aPW - 4;
					this.thumbBox.thumbSize_mc.d_txt.text = this.aPW + "px /" + this.aPH + "px";
					this.setSizeThumbBG(this.aPW,this.aPH);
					if(this.aPStyle == "Inline Right")
					{
						this.posThumbBox(aH - this.thumbBox.b_mc._width - this.aPad,0);

					} // end if
					else
					{
						this.posThumbBox(this.aPad,0);

					}
				
				} // end if
				else
				{
					if(this.aPStyle == "Banner")
					{
						this.setSizeThumbBG(aH - this.aPad * 2,this.aPH);
						this.posThumbBox(this.aPad,0);
						this.getSizeThumbBG();
						this.thumbBox.thumbSize_mc.d_txt._width = this.getSizeThumbBG().0;
						this.thumbBox.thumbSize_mc.d_txt.text = this.getSizeThumbBG().0 + "px /" + this.aPH + "px";

					} // end if

				}
							this.aContent.title_txt.htmlText = "Album Title";
				this.aContent.desc_txt.htmlText = "Album Description. Dolore et vel nulla suscipit iriuredolor tation eu, nostrud iusto aliquam aliquip commodo molestie consequatvel erat. Quis esse feugait, duis wisi nostrud molestie luptatum laoreet. Magna eum ex laoreet at, consectetuer praesent esse sed lobortis iriure duis blandit iusto vulputate veniam dignissim, luptatum ut iriuredolor tincidunt in nulla. Facilisis, facilisi consequat suscipit, at velit sed blandit dolore vero ullamcorper accumsan.";
				this.aContent.title_txt.setTextFormat(this.title_fmt);
				this.aContent.desc_txt.setTextFormat(this.desc_fmt);
				this.redraw();

			} // end if
			else
			{
				this.aContent.title_txt._visible = false;
				this.aContent.desc_txt._visible = false;
				this.setSizeThumbBG(aH,);
				this.aContent._y = this.aSW;
				this.aContent._x = this.aSW;
				this.thumbBox.thumbSize_mc.d_txt.text = aH + "px / " +  + "px";

			}

		}
				if(	o.setAlbumFormat = "function(	aW,aH,aPreviewW,aPreviewH,isFS)
	{
		this.instanceNum = this._name.slice(1);
		this.aW = "aH";
		this.aH = "";
		this.isFS = "";
		this.aPH = "";
		this.aPW = "";
		net.slideshowpro.slideshowpro.draw.DrawRect.create(this.bgClip,aH,,this.aDefBGColor,this._oC.albumBackgroundAlpha);
	}";
	aH.onAlbumRollOver = "function(	)
	{
		this.albumHighlight.setRGB(this._oC.albumRolloverColor);
		this._oC.playSound("roll");
	}";
	aH.onAlbumRelease = "function(	)
	{
		this._oC.onAlbumRelease(this.aContentNum);
		this._oC.playSound("click");
	}";
	aH.onAlbumRollOut = "function(	)
	{
		this.albumHighlight.setRGB(this.aDefBGColor);
	}";
num)
		{
			this.bgClip.enabled = true;
			this.aContentNum = "";
			this.aData = "num";
			this.setupLoadInterval();
			if(!(this.aPStyle == "Fill"))
			{
				if(num.title)
				{
					this.aContent.title_txt.htmlText = num.title;
					this.aContent.title_txt.setTextFormat(this.title_fmt);

				} // end if
				if(num.description)
				{
					this.aContent.desc_txt.htmlText = num.description;
					this.aContent.desc_txt.setTextFormat(this.desc_fmt);
					this.setDescriptionField();

				} // end if
			
			} // end if
					this.bgClip.onReleaseOutside = mx.utils.Delegate.create(this,this.onAlbumRelease);
			this.bgClip.onRelease = mx.utils.Delegate.create(this,this.onAlbumRelease);
			this.bgClip.onRollOver = mx.utils.Delegate.create(this,this.onAlbumRollOver);
			this.bgClip.onRollOut = mx.utils.Delegate.create(this,this.onAlbumRollOut);

		} // end if
				if(	aH.setData = "function(	data,num)
	{
		this.aContent._visible = true;
	}";
	num.clearData = "function(	)
	{
		this.clearLoadInterval();
		this.tn_mcl.removeListener(this.tnListener);
		this.tn_mcl.unloadClip(this.currentClip);
		this.currentClip.removeMovieClip();
		this.thumbBox._visible = false;
		this.aContent.title_txt.text = "";
		this.aContent.desc_txt.text = "";
		this.defaultTextSize();
		this.bgClip.enabled = false;
	}";
	num.setDescriptionField = "function(	)
	{
		this.aContent.desc_txt._y = this.aContent.title_txt._y + this.aContent.title_txt.textHeight + 2;
		this.aContent.desc_txt._height = Math.floor(this.aH - this.aContent._y + this.aContent.desc_txt._y);
		this.testTextVisibility(this.aContent.desc_txt);
	}";
	num.setupLoadInterval = "function(	)
	{
		this.apINT = setInterval(this,loadThumbnail,(this.instanceNum / 10 + 0.5000) * 1000);
	}";
	num.clearLoadInterval = "function(	)
	{
		clearInterval(this.apINT);
	}";
this.aPH > 0&&this.aPW > 0)
		{
			this.aData.tn;
!(this.aData.tn == undefined)||			if(this.aData.tn.length > 0)
			{
this.isFS&&				if(this._oC.xmlFileType == "Director")
				{
					var _local3 = this._oC.dataClass.getDirectorData();
					this.aData.tn + "&full=" + _local3.apfw + "," + _local3.apfh;

				} // end if
							this.createThumbnail();
				this;
				this.tnListener.onLoadInit = mx.utils.Delegate.create(this,this.drawThumbnail);
				this.tn_mcl.addListener(this.tnListener);
				this.tn_mcl.loadClip(this.aData.tn + "&full=" + _local3.apfw + "," + _local3.apfh,this.currentClip);

			} // end if
		
		} // end if
		if(	num.loadThumbnail = "function(	)
	{
		this.clearLoadInterval();
	}";
	(this.aData.tn + "&full=" + _local3.apfw + "," + _local3.apfh).createThumbnail = "function(	)
	{
		this.("thumbImageClip" + this.tick) = this.thumbImage.createEmptyMovieClip("tc" + this.tick,this.tick);
		this.currentClip = this.("thumbImageClip" + this.tick);
		this.tick = this.tick++;
	}";
this._oC.smoothing == "On")
		{
			net.slideshowpro.slideshowpro.utils.ImageSmoother.smoothImage(this.currentClip);

		} // end if
				if(!(this.aPStyle == "Inline Left")||this.aPStyle == "Inline Right")
		{
			if(this.aPScale == "Proportional")
			{
this.thumbImage._width == this.aPW&&				if(!(this.thumbImage._height == this.aPH))
				{
					var _local3 = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,false);
					this.thumbImage._width = _local3.newW;
					this.thumbImage._height = _local3.newH;

				} // end if
							this.setSizeThumbBG(this.thumbImage._width + this.aPSW * 2,this.thumbImage._height + this.aPSW * 2);
				this.thumbImage._x = this.aPSW;
				this.thumbImage._y = this.aPSW;
				this.redraw();

			} // end if
			else
			{
					if(this.aPScale == "Crop to Fit")
				{
					this.setSizeThumbBG(this.aPW + this.aPSW * 2,this.aPH + this.aPSW * 2);
this.thumbImage._width == this.aPW&&					if(!(this.thumbImage._height == this.aPH))
					{
						net.slideshowpro.slideshowpro.draw.DrawRect.create(this.thumbMask,this.aPW,this.aPH,16764091,50);
						net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true);
						this.thumbImage._width = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true).newW;
						this.thumbImage._height = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true).newH;
						this.thumbImage._x = this.aPSW - net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true).oX;
						this.thumbImage._y = this.aPSW - net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true).oY;
						this.thumbImage.setMask(this.thumbMask);

					} // end if
					else
					{
						this.thumbImage._y = this.aPSW;
						this.thumbImage._x = this.aPSW;

					}
									this.redraw();

				} // end if
				else
				{
					if(this.aPScale == "None")
					{
						this.setSizeThumbBG(this.thumbImage._width + this.aPSW * 2,this.thumbImage._height + this.aPSW * 2);
						this.thumbImage._x = this.aPSW;
						this.thumbImage._y = this.aPSW;
						this.redraw();

					} // end if

				}

			}
			if(this.aPStyle == "Inline Right")
			{
				this.posThumbBox(this.aW - this.thumbBox.b_mc._width - this.aPad,0);

			} // end if
			else
			{
				this.posThumbBox(this.aPad,0);

			}
					this.posThumbBoxMask(this.thumbBox._x + this.aPSW,this.aPad + this.aPSW);

		} // end if
		else
		{
					if(this.aPStyle == "Fill")
			{
!(this.aPScale == "Crop to Fit")||				if(this.aPScale == "Proportional")
				{
this.thumbImage._width == this.aPW&&					if(!(this.thumbImage._height == this.aPH))
					{
						net.slideshowpro.slideshowpro.draw.DrawRect.create(this.thumbMask,this.aPW,this.aPH,13421772,100);
						var _local3 = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true);
						this.thumbImage._width = _local3.newW;
						this.thumbImage._height = _local3.newH;
						this.thumbImage._x = -_local3.oX;
						this.thumbImage._y = -_local3.oY;
						this.thumbMask._y = 0;
						this.thumbMask._x = 0;
						this.thumbImage.setMask(this.thumbMask);

					} // end if
					else
					{
						this.thumbImage._y = 0;
						this.thumbImage._x = 0;

					}
				
				} // end if
				else
				{
					if(this.aPScale == "None")
					{
						net.slideshowpro.slideshowpro.draw.DrawRect.create(this.thumbMask,this.aPW,this.aPH,13421772,100);
						this.thumbImage._x = 0;
						this.thumbImage._y = 0;
						this.thumbImage.setMask(this.thumbMask);
						this.redraw();

					} // end if

				}
			
			} // end if
			else
			{
						if(this.aPStyle == "Banner")
				{
					this.setSizeThumbBG(this.aPW + this.aPSW * 2,this.aPH + this.aPSW * 2);
!(this.aPScale == "Crop to Fit")||					if(this.aPScale == "Proportional")
					{
this.thumbImage._width == this.aPW&&						if(!(this.thumbImage._height == this.aPH))
						{
							net.slideshowpro.slideshowpro.draw.DrawRect.create(this.thumbMask,this.aPW,this.aPH,16763904,50);
							net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true);
							this.thumbImage._width = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true).newW;
							this.thumbImage._height = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true).newH;
							this.thumbImage._x = -net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true).oX + this.aPSW;
							this.thumbImage._y = -net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true).oY + this.aPSW;
							this.posThumbBoxMask(this.aPad + this.aPSW,this.aPad + this.aPSW);
							this.thumbImage.setMask(this.thumbMask);

						} // end if
						else
						{
							this.thumbImage._y = this.aPSW;
							this.thumbImage._x = this.aPSW;

						}
											this.redraw();

					} // end if
					else
					{
						if(this.aPScale == "None")
						{
							net.slideshowpro.slideshowpro.draw.DrawRect.create(this.thumbMask,this.aPW,this.aPH,13421772,100);
							this.thumbImage._y = this.aPSW;
							this.thumbImage._x = this.aPSW;
							this.posThumbBoxMask(this.aPad + this.aPSW,this.aPad + this.aPSW);
							this.thumbImage.setMask(this.thumbMask);
							this.redraw();

						} // end if

					}
									this.posThumbBox(this.aPad,0);

				} // end if

			}

		}
		if(	(this.aData.tn + "&full=" + _local3.apfw + "," + _local3.apfh).drawThumbnail = "function(	)
	{
		this.thumbImage;
		this.thumbImage._width;
		this.thumbImage._height;
		undefined;
		false;
		this.thumbBox._visible = true;
	}";
net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true) > 0&&h > 0)
		{
			this.thumbBox.b_mc._width = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true);
			this.thumbBox.b_mc._height = "h";

		} // end if
		if(	this.thumbImage.setSizeThumbBG = "function(	w,h)
	{
	}";
	h.getSizeThumbBG = "function(	)
	{
	}";
!(net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true) < 0)||!(y < 0))
		{
			this.thumbBox._x = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true);
			this.thumbBox._y = "y";

		} // end if
		if(	h.posThumbBox = "function(	x,y)
	{
	}";
!(net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true) < 0)||!(y < 0))
		{
			this.thumbMask._x = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.thumbImage._width,this.thumbImage._height,this.aPW,this.aPH,true);
			this.thumbMask._y = "y";

		} // end if
		if(	y.posThumbBoxMask = "function(	x,y)
	{
	}";
	y.defaultTextSize = "function(	)
	{
		this.aContent.desc_txt._x = this.aPad;
		this.aContent.title_txt._x = this.aPad;
		this.aContent.title_txt._y = -3;
		this.aContent.title_txt._width = this.aW - this.aPad * 2;
		this.aContent.desc_txt._width = this.aW - this.aPad * 2;
	}";
!(this.aPStyle == "Inline Left")||this.aPStyle == "Inline Right")
		{
			var _local2 = (this.aW - this.thumbBox.b_mc._width - this.aPad * 2);

		} // end if
		else
		{
			if(this.aPStyle == "Banner")
			{
				this.aW - this.aPad * 2;

			} // end if

		}
		if(this.aPStyle == "Inline Left")
		{
			this.aContent.desc_txt._x = this.aPad + this.thumbBox.b_mc._width + this.EPAD;
			this.aContent.title_txt._x = this.aPad + this.thumbBox.b_mc._width + this.EPAD;

		} // end if
		else
		{
			if(this.aPStyle == "Inline Right")
			{
				this.aContent.desc_txt._x = this.aPad - 2;
				this.aContent.title_txt._x = this.aPad - 2;

			} // end if
			else
			{
				if(this.aPStyle == "Banner")
				{
					this.aContent.desc_txt._x = this.aPad;
					this.aContent.title_txt._x = this.aPad;
					this.aContent.title_txt._y = this.thumbBox.b_mc._height + this.EPAD;

				} // end if

			}

		}
		if(this.aPStyle == "Fill"&&this._oC.isLivePreview)
		{
			this.thumbBox.b_mc._visible = true;

		} // end if
		if(	y.redraw = "function(	)
	{
		undefined;
		this.aContent.desc_txt._width = this.aW - this.aPad * 2;
		this.aContent.title_txt._width = this.aW - this.aPad * 2;
		this.testTextVisibility(this.aContent.title_txt);
		this.setDescriptionField();
	}";
!((t._y + this.aContent._y) > this.aH)||(t._x + this.aContent._x) > this.aW)
		{
			t._visible = false;

		} // end if
	(this.aW - this.aPad * 2).testTextVisibility = "function(	t)
	{
	}";
	t.aSW = 1;
	t.EPAD = 4;
	t.tick = 0;
	t.isFS = false;

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.Album.prototype,null,1);
