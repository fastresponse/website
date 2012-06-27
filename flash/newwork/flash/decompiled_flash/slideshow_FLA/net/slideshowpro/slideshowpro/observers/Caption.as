
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
			if(!_global.net.slideshowpro.slideshowpro.observers.Caption)
{
	net.slideshowpro.slideshowpro.observers.Caption = "function(	t,o)
	{
		this._oC = "";
		this._tC = "o";
		this.init();
	}";
	function(	t,o)
	{
		this._oC = "";
		this._tC = "o";
		this.init();
	}.prototype;
	function(	t,o)
	{
		this._oC = "";
		this._tC = "o";
		this.init();
	}.prototype.init = "function(	)
	{
		this.visible(false);
		this._oC.caClass.addObserver(this);
		this.isLive = this._oC.isLivePreview;
		this.c_fmt = new TextFormat();
		this.cT_fmt = new TextFormat();
		this.initListeners();
		this.createChildren();
	}";
	function(	t,o)
	{
		this._oC = "";
		this._tC = "o";
		this.init();
	}.prototype.dimensionUpdate = "function(	d)
	{
		this._dim = "d";
		this.arrange();
	}";
eventObject.data == "over")
			{
				self.rolloverCaption();

			} // end if
			else
			{
				if(eventObject.data == "out")
				{
					self.rolloutCaption();

				} // end if

			}
			if(	d.initListeners = "		new Object().onImageLoad = "function(		eventObject)
		{
			self.afterImageLoad(eventObject.data);
		}";
		eventObject._oC.addEventListener("onImageLoad",new Object());
		new Object().onFullScreenChange = mx.utils.Delegate.create(eventObject,eventObject.afterScreenChange);
		eventObject._oC.addEventListener("onFullScreenChange",new Object());
		new Object().onImageAlign = mx.utils.Delegate.create(eventObject,eventObject.afterImageAlign);
		eventObject._oC.addEventListener("onImageAlign",new Object());
	}";
!this.isHidden())
		{
			if(.data == "opening")
			{
				this.trackClosing = true;
				this.visible(false);

			} // end if
			if(.data == "closing")
			{
				this.visible(false);

			} // end if
					if(!(.data == "closed")||.data == "hidden"&&this.trackClosing)
			{
				this.trackClosing = false;
				if(this.isDrawn)
				{
this.isFixed()&&this.isAvail()&&					if(!this.isTitleAndCapAvail())
					{

					} // end if
									this.visible(true);

				} // end if
			
			} // end if
		
		} // end if
		if(	new Object().afterGalleryStateChange = "function(	o)
	{
		.data;
	}";
	.data.afterTransStart = "function(	)
	{
		this.isTransitioning = true;
		this.hideOverlayCaption();
		this.showCaptionBeforeTrans();
	}";
this.isOverlay())
		{
			this.visible(false);

		} // end if
		if(	.data.afterScreenChange = "function(	)
	{
	}";
this._oC.typefaceEmbed == "Off")
		{
			this.cTitle.embedFonts = false;
			this.cText.embedFonts = false;

		} // end if
		else
		{
			this.cTitle.embedFonts = true;
			this.cText.embedFonts = true;

		}
		if(!this.isLive||this.isDrawn)
		{
			this.redraw();

		} // end if
		else
		{
			this.arrange();

		}
		if(	.data.draw = "function(	)
	{
		this.__w = this._oC.__width;
		this.__h = this._oC.__height;
		this._cApp = this._oC.captionAppearance;
		this._cElements = this._oC.captionElements;
		this._pad = this._oC.captionPadding;
		this.cT_fmt.align = this._oC.captionTextAlignment;
		this.c_fmt.align = this._oC.captionTextAlignment;
		this.cT_fmt.color = this._oC.captionTextColor;
		this.c_fmt.color = this._oC.captionTextColor;
		this.cT_fmt.size = this._oC.captionTextSize;
		this.c_fmt.size = this._oC.captionTextSize;
		this.c_fmt.font = this._oC.typeface;
		this.cT_fmt.font = this._oC.typefaceHead;
		this.cText.htmlText = "";
		this.cTitle.htmlText = "";
		this.capPos = this._oC.captionPosition;
		this.navPos = this._oC.navPosition;
		this.drawCaptionBox();
	}";
this.isLive)
		{
			this.visible(true);

		} // end if
		else
		{
			if(this.isOverlayAuto()&&this.isDrawn)
			{
				this.showOverlayCaption();

			} // end if

		}
		if(	.data.redraw = "function(	)
	{
		this.setCaptionText();
		this.setCaptionBoxWidth();
		this.sizeCaptionText();
		this.posCaptionText();
		this.setCaptionBoxHeight();
		this.arrange();
		this.isDrawn = true;
	}";
!this.isInline()||!this.isFixed()||!(this._oC.transitionLength == 0)||this._oC.transitionStyle == "None")
		{
			this.redraw();

		} // end if
		if(	.data.afterImageLoad = "function(	n)
	{
		this.isAlbumInit = false;
		this.cImg = "n";
		this._oC.dispatchEventData("onCaptionDraw");
	}";
!this.isOverlay()||this.isOverlayAuto())
		{
			this.redraw();
			this.showCaptionAfterTrans();

		} // end if
		if(	n.afterTransEnd = "function(	)
	{
		this.isTransitioning = false;
	}";
this.showHeaderText())
		{
			this.cTitleClip = this._tC.createEmptyMovieClip("cTitle_mc",1);
			this.cTitleClipBG = this.cTitleClip.createEmptyMovieClip("cTitleBG_mc",0);
			this.cTitleClip.attachMovie("captionTitle","cTitle_mc",2);
			this.cTitle = this.cTitleClip.cTitle_mc.cT_txt;
			this.cTitle.html = true;
			this.cTitle.autoSize = true;
			this.cTitle.multiline = true;
			this.cTitle.wordWrap = true;
			this.cTitle.selectable = false;
			this.cT_fmt.bold = true;

		} // end if
		if(this.showCaptionText())
		{
			this.cTextClip = this._tC.createEmptyMovieClip("cText_mc",2);
			this.cTextClip.attachMovie("captionText","cText_mc",1);
			this.cText = this.cTextClip.cText_mc.c_txt;
			this.cText.html = true;
			this.cText.autoSize = true;
			this.cText.multiline = true;
			this.cText.wordWrap = true;
			this.cText.selectable = false;

		} // end if
		if(	n.createChildren = "function(	)
	{
		this.cBGClip = this._tC.createEmptyMovieClip("cBG_mc",0);
	}";
this._oC.dataClass.getImageProp(this.cImg,).length > 1&&!(this._oC.dataClass.getImageProp(this.cImg,) == undefined))
		{

		} // end if
		else
		{

		}
			if(	n.testProp = "function(	prop)
	{
		this._oC.dataClass.getImageProp(this.cImg,);
	}";
!this.isLive)
		{
			var _local3 = (this._oC.p + 1);
			if(this._oC.xmlFileType == "Director")
			{

			} // end if
			else
			{

			}
					var _local4 = this._oC.dataClass.getImageProp(this.cImg,"src");
			net.slideshowpro.slideshowpro.utils.Utils.stringReplace(_local2,"{albumID}",this._oC.dataClass.getCurrentAlbumID());
			var _local2 = net.slideshowpro.slideshowpro.utils.Utils.stringReplace(net.slideshowpro.slideshowpro.utils.Utils.stringReplace(_local2,"{albumID}",this._oC.dataClass.getCurrentAlbumID()),"{albumDescription}",this._oC.dataClass.getAlbumDesc());
			net.slideshowpro.slideshowpro.utils.Utils.stringReplace(_local2,"{albumTitle}",this._oC.dataClass.getAlbumTitle());
			var _local2 = net.slideshowpro.slideshowpro.utils.Utils.stringReplace(net.slideshowpro.slideshowpro.utils.Utils.stringReplace(_local2,"{albumTitle}",this._oC.dataClass.getAlbumTitle()),"{imageCount}",this._oC.dataClass.getCurrentAlbumSize().toString());
			net.slideshowpro.slideshowpro.utils.Utils.stringReplace(_local2,"{imageNumber}",_local3.toString());
			var _local2 = net.slideshowpro.slideshowpro.utils.Utils.stringReplace(net.slideshowpro.slideshowpro.utils.Utils.stringReplace(_local2,"{imageNumber}",_local3.toString()),"{imageTitle}",this._oC.dataClass.getImageProp(this.cImg,"title"));
			net.slideshowpro.slideshowpro.utils.Utils.stringReplace(_local2,"{fileName}",_local4);

		} // end if
		if(!(net.slideshowpro.slideshowpro.utils.Utils.stringReplace(_local2,"{fileName}",_local4) == null)||!(net.slideshowpro.slideshowpro.utils.Utils.stringReplace(_local2,"{fileName}",_local4) == "undefined")||net.slideshowpro.slideshowpro.utils.Utils.stringReplace(_local2,"{fileName}",_local4).length == 0)
		{
			var _local2 = this._oC.textStrings.5;

		} // end if
			if(	createPreviewHeader.this._oC.dataClass.getImageProp(this.cImg,"file") = "function(	)
	{
		var _local2 = this._oC.captionHeaderText;
	}";
!this.isLive)
		{
			if(this.showHeaderText())
			{
				this.cTitleClip._visible = true;

			} // end if
			else
			{
				this.cTitleClip._visible = false;

			}
				if(this.showCaptionText())
			{
				var _local2 = this._oC.dataClass.getImageProp(this.cImg,"caption");
!(_local2 == undefined)||				if(_local2.length == 0)
				{
					var _local3 = this._oC.textStrings.4;

				} // end if
				else
				{
					_local2;

				}
			
			} // end if
		
		} // end if
		else
		{
			This is where each caption will be.;

		}
		if(this.showHeaderText())
		{
			this.cTitle.htmlText = this.createPreviewHeader();
			this.cTitle.setTextFormat(this.cT_fmt);

		} // end if
		if(this.showCaptionText())
		{
			this.cText.htmlText = "This is where each caption will be.";
			this.cText.setTextFormat(this.c_fmt);

		} // end if
		if(	_local2.setCaptionText = "function(	)
	{
		undefined;
		undefined;
	}";
	_local2.nullText = "function(	)
	{
		this.cTitle.htmlText = "&nbsp;";
		this.cText.htmlText = "&nbsp;";
	}";
	_local2.sizeCaptionText = "function(	)
	{
		this.cText._width = this.cBGClip._width - this._pad.1 + this._pad.3;
		this.cTitle._width = this.cText._width;
	}";
this.showHeaderText())
		{
			var _local2 = (this.cTitle.textHeight + 2);
			this.cTitle._y = this._pad.0;
			this.cTitle._x = this._pad.3;
			this.cTitleH = this._pad.0 + this._pad.2 + _local2 + 1;
			this.tHeight = this.cTitleH;

		} // end if
		else
		{
			this.cTitleH = 0;
			0;

		}
			if(this.showCaptionText())
		{
			var _local3 = (this.cText.textHeight + 2);
			if(_local3 > 0)
			{
				this.cText._x = this._pad.3;
				this.cText._y = this.cTitleH + this._pad.0;
				this.tHeight = this.tHeight + this._pad.0 + this._pad.2 + _local3 + 1;

			} // end if
		
		} // end if
			if(	_local2.posCaptionText = "function(	)
	{
		0;
		this.tHeight = 0;
	}";
	0.drawCaptionBox = "function(	)
	{
		net.slideshowpro.slideshowpro.draw.DrawRect.create(this.cBGClip,this.__w,10,this._oC.captionBackgroundColor,this._oC.captionBackgroundAlpha);
		net.slideshowpro.slideshowpro.draw.DrawRect.create(this.cTitleClipBG,this.__w,10,this._oC.captionBackgroundColor,this._oC.captionHeaderBackgroundAlpha);
	}";
!this.isLive)
		{
!this.isOverlay()||			if(this.isOverlayAuto())
			{
				this._oC.thisLoader._width;
				var _local2 = Math.min(this._oC.thisLoader._width,this.__w);
				this.cBGClip._width = _local2;
				this.cTitleClipBG._width = _local2;
				this.sizeCaptionText();

			} // end if
		
		} // end if
		if(	0.setCaptionBoxWidth = "function(	)
	{
		this.__w;
	}";
this.showHeaderText())
		{
			this.cTitleClipBG._height = this.cTitleH;

		} // end if
			if(this.prevTHeight == this.tHeight&&this.isLive)
		{
			this.capBoxH = this.tHeight;
!this.isInline()||			if(this.isFixed())
			{
				this.cBGClip._height = this.capBoxH;
				this.cBGClip._y = 0;

			} // end if
			else
			{
				this.cBGClip._height = this.__h;
				if(this.isTop())
				{
					this.cBGClip._y = -this.cBGClip._height - this.capBoxH;

				} // end if
				else
				{
					this.cBGClip._y = 0;

				}

			}
		
		} // end if
		if(this.isInline())
		{
			this.broadcastCaptionHeight(this.capBoxH);

		} // end if
		else
		{
			this.broadcastCaptionHeight(0);

		}
			if(	_local2.setCaptionBoxHeight = "function(	)
	{
		this.prevTHeight = this.tHeight;
	}";
	_local2.broadcastCaptionHeight = "function(	h)
	{
		this._oC.caClass.setCaptionHeight(h);
	}";
!this.isOverlay()||!this.isOverlayAuto()||this.isHidden())
		{
			if(this.isTop())
			{
				this._tC._y = Math.floor(-this.capBoxH);

			} // end if
			else
			{
				this._tC._y = Math.ceil(this.__h);

			}
		
		} // end if
		else
		{
							if(!this.isInline()||this.isFixed())
			{
				if(this.isTop())
				{
					if(this.navPos == "Top")
					{
						if(this._dim)
						{
!(this._oC.navAppearance == "Always Visible")||							if(this._oC.navAppearance == "Hidden When Gallery Open")
							{
								this._tC._y = this._dim.navHeight;

							} // end if
						
						} // end if
						else
						{
							this._tC._y = Math.floor(-this.capBoxH);

						}
					
					} // end if
					else
					{
						this._tC._y = 0;

					}
				
				} // end if
				else
				{
					if(this.navPos == "Top")
					{
						this._tC._y = this.__h - this.capBoxH;

					} // end if
					else
					{
							if(this._dim)
						{
							this._tC._y = this.__h - this.capBoxH;
!(this._oC.navAppearance == "Always Visible")||							if(this._oC.navAppearance == "Hidden When Gallery Open")
							{
								this._tC._y = this._tC._y - this._dim.navHeight;

							} // end if
						
						} // end if
						else
						{
							this._tC._y = this.__h - this.capBoxH;

						}

					}

				}
			
			} // end if

		}
		if(	h.arrange = "function(	)
	{
		this._tC._y = 0;
	}";
xPos > 0)
		{
			this._tC._x = "xPos";

		} // end if
			if(	h.arrangeX = "function(	xPos)
	{
		this._tC._x = 0;
	}";
this.isAvail())
		{
this._oC.isCapAvail == false&&			if(this._oC.isTitleAvail == false)
			{

			} // end if
		
		} // end if
			if(	xPos.showOverlayCaption = "function(	)
	{
		this.visible(true);
		this.tweenIn = mx.transitions.Tween(this._tC,_y,this._oC.strongTween,this._tC._y,this.getOverlayFinalPos(),1,true);
		this.checkIn = new Object();
		this.checkIn.onMotionStarted = mx.utils.Delegate.create(this,this.tweenInStart);
		this.checkIn.onMotionStopped = mx.utils.Delegate.create(this,this.tweenInStopped);
		this.tweenIn.addListener(this.checkIn);
		this.tweenIn.start();
	}";
this.isAvail())
		{
			if(!this.isTitleAndCapAvail())
			{
				this.visible(false);

			} // end if
		
		} // end if
			if(	xPos.showFixedCaption = "function(	)
	{
		this.visible(true);
	}";
this.isTop())
		{
			if(this.navPos == "Top")
			{
				var _local2 = this._dim.navHeight;

			} // end if
			else
			{
				if(this.navPos == "Bottom")
				{
					0;

				} // end if

			}
		
		} // end if
		else
		{
			if(this.navPos == "Top")
			{
				this.__h - this.capBoxH;

			} // end if
			else
			{
				if(this.navPos == "Bottom")
				{
					this.__h - this.capBoxH - this._dim.navHeight - this._oC.STROKE_WEIGHT;

				} // end if

			}

		}
				if(	xPos.getOverlayFinalPos = "function(	)
	{
		undefined;
	}";
!this.isHidden())
		{
!this.isOverlay()||			if(this.isOverlayAuto())
			{
				var _local2 = undefined;
				if(this.isTop())
				{
					Math.floor(-this.capBoxH);
					this.tweenOut = mx.transitions.Tween(this._tC,_y,this._oC.strongTween,this._tC._y,Math.floor(-this.capBoxH),1,true);

				} // end if
				else
				{
					var _local2 = Math.ceil(this.__h);
					this.tweenOut = mx.transitions.Tween(this._tC,_y,this._oC.strongTween,this._tC._y,_local2,1,true);

				}
							this.checkOut = new Object();
				this.checkOut.onMotionStarted = mx.utils.Delegate.create(this,this.tweenOutStart);
				this.checkOut.onMotionStopped = mx.utils.Delegate.create(this,this.tweenOutStopped);
				this.tweenOut.addListener(this.checkOut);
				this.tweenOut.start();

			} // end if
		
		} // end if
			if(	(this.__h - this.capBoxH - this._dim.navHeight - this._oC.STROKE_WEIGHT).hideOverlayCaption = "function(	)
	{
	}";
!this.isHidden())
		{
			if(this.isInline())
			{
				this.visible(true);

			} // end if
			if(this.isFixed())
			{
				this.showFixedCaption();

			} // end if
		
		} // end if
			if(	_local2.showCaptionBeforeTrans = "function(	)
	{
	}";
!this.isHidden())
		{
!this.isMouseOverImage||			if(this.isOverlayAuto())
			{
				this.showOverlayCaption();

			} // end if
		
		} // end if
			if(	_local2.showCaptionAfterTrans = "function(	)
	{
	}";
!this.isHidden()||!this.isTransitioning||!this.isAlbumInit)
		{
			if(this.isOverlay())
			{
				this.showOverlayCaption();

			} // end if
		
		} // end if
			if(	_local2.rolloverCaption = "function(	)
	{
		this.isMouseOverImage = true;
	}";
!this.isHidden()||!this.isTransitioning||!this.isAlbumInit)
		{
			if(this.isOverlay())
			{
				this.hideOverlayCaption();

			} // end if
		
		} // end if
			if(	_local2.rolloutCaption = "function(	)
	{
		this.isMouseOverImage = false;
	}";
	_local2.afterAlbumData = "function(	)
	{
		this.isAlbumInit = true;
		this.visible(false);
		this.nullText();
	}";
	_local2.tweenInStart = "function(	)
	{
		this.isTweenInStarted = true;
	}";
	_local2.tweenInStopped = "function(	)
	{
		this.isTweenInStarted = false;
		this.tweenIn.removeListener(this.checkIn);
	}";
	_local2.tweenOutStart = "function(	)
	{
		this.isTweenOutStarted = true;
	}";
	_local2.tweenOutStopped = "function(	)
	{
		this.isTweenOutStarted = false;
		this.tweenOut.removeListener(this.checkOut);
	}";
!this.isHidden())
		{
			_local3.data;
!this.isOverlay()||			if(this.isOverlayAuto())
			{
				this.arrangeX(_local3.data.x);
				this.setCaptionBoxWidth(_local3.data.w);

			} // end if
		
		} // end if
		if(	_local2.afterImageAlign = "function(	eventObject)
	{
	}";
	_local3.data.visible = "function(	b)
	{
		this._tC._visible = "b";
	}";
!(this._cApp == "Overlay on Rollover")||this._cApp == "Overlay on Rollover (if Available)")
		{

		} // end if
		if(	b.isOverlay = "function(	)
	{
	}";
!(this._cApp == "Overlay Auto")||this._cApp == "Overlay Auto (if Available)")
		{

		} // end if
		if(	b.isOverlayAuto = "function(	)
	{
	}";
!(this._cApp == "Fixed")||this._cApp == "Fixed (if Available)")
		{

		} // end if
		if(	b.isFixed = "function(	)
	{
	}";
this._cApp == "Inline")
		{

		} // end if
		if(	b.isInline = "function(	)
	{
	}";
this.capPos == "Top")
		{

		} // end if
		if(	b.isTop = "function(	)
	{
	}";
!(this._cApp.indexOf("if Available") == -1))
		{

		} // end if
		if(	b.isAvail = "function(	)
	{
	}";
this._cApp == "Hidden")
		{

		} // end if
		if(	b.isHidden = "function(	)
	{
	}";
this._oC.isCapAvail == false&&this._oC.isTitleAvail == false)
		{

		} // end if
		if(	b.isTitleAndCapAvail = "function(	)
	{
	}";
!(this._cElements == "Caption Only"))
		{

		} // end if
		if(	b.showHeaderText = "function(	)
	{
	}";
!(this._cElements == "Header Only"))
		{

		} // end if
	b.showCaptionText = "function(	)
	{
	}";
	b.cTitleH = 0;
	b.tHeight = 0;
	b.capBoxH = 0;
	b.isDrawn = false;
	b.trackClosing = false;

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.Caption.prototype,null,1);
