
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
			if(!_global.net.slideshowpro.slideshowpro.observers.Navigation)
{
	net.slideshowpro.slideshowpro.observers.Navigation = "function(	t,o,f)
	{
		t.undefined();
		super._oC = "";
		super._oF = "";
		super._tC = "f";
		super._pad = super._oC.GLOBAL_PAD;
		super.init();
	}";
	extends();
	function(	t,o,f)
	{
		t.undefined();
		super._oC = "";
		super._oF = "";
		super._tC = "f";
		super._pad = super._oC.GLOBAL_PAD;
		super.init();
	}.prototype;
	function(	t,o,f)
	{
		t.undefined();
		super._oC = "";
		super._oF = "";
		super._tC = "f";
		super._pad = super._oC.GLOBAL_PAD;
		super.init();
	}.prototype.init = "function(	)
	{
		this.isLive = this._oC.isLivePreview;
		this.navNum_fmt = new TextFormat();
		this.navNumHigh_fmt = new TextFormat();
		this.navNumRoll_fmt = new TextFormat();
		this.screenMode = "normal";
		this.initProps();
		this.initListeners();
		this.createChildren();
		this.onUnload = this.nullProps;
	}";
	function(	t,o,f)
	{
		t.undefined();
		super._oC = "";
		super._oF = "";
		super._tC = "f";
		super._pad = super._oC.GLOBAL_PAD;
		super.init();
	}.prototype.initProps = "function(	)
	{
		this.initLinkType = this._oC.navLinkAppearance;
	}";
eventObject.data == "navShown")
			{
				self.enableNav();

			} // end if
			else
			{
				if(eventObject.data == "open")
				{
					self.disableNav();

				} // end if

			}
		if(	function(	t,o,f)
	{
		t.undefined();
		super._oC = "";
		super._oF = "";
		super._tC = "f";
		super._pad = super._oC.GLOBAL_PAD;
		super.init();
	}.prototype.initListeners = "		eventObject.onReqPrevImage = "function(		)
		{
			self.activateCurrentNum(self._oC.p);
		}";
		eventObject._oC.addEventListener("onReqPrevImage",eventObject);
		eventObject.onReqNextImageGroup = mx.utils.Delegate.create(eventObject,eventObject.loadNextImageGroup);
		eventObject._oC.addEventListener("onReqNextImageGroup",eventObject);
		eventObject.onReqPrevImageGroup = mx.utils.Delegate.create(eventObject,eventObject.loadPrevImageGroup);
		eventObject._oC.addEventListener("onReqPrevImageGroup",eventObject);
	}";
this.isGalleryControlIncluded())
		{
			this.navGalleryBttn = this._tC.createEmptyMovieClip("nGalleryBttn_mc",2);
			this.navGalleryBttn.onRelease = mx.utils.Delegate.create(this,this.toggleGallery);
			this.navGalleryBttn.onRollOver = "function(			)
			{
				self.iconRoll(this,0);
			}";
			this.navGalleryBttn.onRollOut = "function(			)
			{
				self.iconRollOut();
			}";

		} // end if
		if(this.isDisplayModeControlIncluded())
		{
			this.navDisplayModeBttn = this._tC.createEmptyMovieClip("navDisplayModeBttn_mc",7);
			this.navPlayBttn = this.navDisplayModeBttn.createEmptyMovieClip("nPC_mc",0);
			this.navPauseBttn = this.navDisplayModeBttn.createEmptyMovieClip("nPB_mc",1);
			this.navPlayBttn.onRelease = mx.utils.Delegate.create(this,this.toggleDisplayMode);
			this.navPauseBttn.onRelease = mx.utils.Delegate.create(this,this.toggleDisplayMode);
			this.navPauseBttn.onRollOver = "function(			)
			{
				self.iconRoll(this,5);
			}";
			this.navPlayBttn.onRollOver = "function(			)
			{
				self.iconRoll(this,6);
			}";
			this.navPauseBttn.onRollOut = "function(			)
			{
				self.iconRollOut();
			}";
			this.navPlayBttn.onRollOut = "function(			)
			{
				self.iconRollOut();
			}";

		} // end if
		if(this.isFullScreenControlIncluded())
		{
			this.navScreenBttn = this._tC.createEmptyMovieClip("navScreen_mc",8);
			this.navFullScreenBttn = this.navScreenBttn.createEmptyMovieClip("sF_mc",0);
			this.navNormScreenBttn = this.navScreenBttn.createEmptyMovieClip("sN_mc",1);
			this.navNormScreenBttn.onRelease = mx.utils.Delegate.create(this,this.screenRelease);
			this.navFullScreenBttn.onRelease = mx.utils.Delegate.create(this,this.screenRelease);
			this.navFullScreenBttn.onRollOver = "function(			)
			{
				self.iconRoll(this,7);
			}";
			this.navNormScreenBttn.onRollOver = "function(			)
			{
				self.iconRoll(this,8);
			}";
			this.navFullScreenBttn.onRollOut = "function(			)
			{
				self.iconRollOut();
			}";
			this.navNormScreenBttn.onRollOut = "function(			)
			{
				self.iconRollOut();
			}";

		} // end if
		if(this._oC.toolAppearanceNav == "Visible")
		{
			this.ttClip = this._tC.createEmptyMovieClip("tt_mc",this._tC.getNextHighestDepth());

		} // end if
		if(!this.isLive)
		{
			this.disableAllButtons();

		} // end if
			if(	eventObject.createChildren = "		this.buttonArray = new Array(this.navGalleryBttn,this.navSkipPrevBttn,this.navPrevBttn,this.navNextBttn,this.navSkipNextBttn,this.navPauseBttn,this.navPlayBttn,null,null,this.navFullScreenBttn,this.navNormScreenBttn);
	}";
this._oC.toolAppearanceNav == "Visible")
		{
			;
			undefined;
			center;
			if( == 9)
			{
				7;

			} // end if
			if(7 == 10)
			{
				var _local2 = 8;

			} // end if
					this._oC.toolLabels._local2;
			this._oC.destroyToolTip();
			this._oC.renderToolTip(,this._oC.toolLabels._local2,"center",this._oC.toolDelayNav,null);

		} // end if
		if(	eventObject.iconRoll = "function(	clip,num)
	{
	}";
this._oC.toolAppearanceNav == "Visible")
		{
			this._oC.destroyToolTip();

		} // end if
		if(	_local2.iconRollOut = "function(	)
	{
	}";
!(this._oC.navAppearance == "Hidden")||this._oC.navAppearance == "Visible on Rollover")
		{
			this.broadcastNavAreaHeight(0);

		} // end if
		if(this._oC.navAppearance == "Hidden")
		{
			this.killThumbnail();
			this._tC._visible = false;

		} // end if
		if(!(this._nTLIA == this._oC.navThumbLinkInactiveAlpha)||!(this._oC.navThumbLinkInactiveAlpha == undefined))
		{
			this._nTLIA = this._oC.navThumbLinkInactiveAlpha;

		} // end if
		if(!(this._nTLW == this._oC.navThumbLinkSize.0)||!(this._oC.navThumbLinkSize.0 == undefined))
		{
			this._nTLW = this._oC.navThumbLinkSize.0;

		} // end if
		if(!(this._nTLH == this._oC.navThumbLinkSize.1)||!(this._oC.navThumbLinkSize.1 == undefined))
		{
			this._nTLH = this._oC.navThumbLinkSize.1;

		} // end if
		if(!(this._nTLSW == this._oC.navThumbLinkStrokeWeight)||!(this._oC.navThumbLinkStrokeWeight == undefined))
		{
			this._nTLSW = this._oC.navThumbLinkStrokeWeight;

		} // end if
		if(!(this._nTLSA == this._oC.navThumbLinkShadowAlpha)||!(this._oC.navThumbLinkShadowAlpha == undefined))
		{
			this._nTLSA = this._oC.navThumbLinkShadowAlpha;

		} // end if
		if(!(this._nTLBC == this._oC.navThumbLinkBackgroundColor)||!(this._oC.navThumbLinkBackgroundColor == undefined))
		{
			this._nTLBC = this._oC.navThumbLinkBackgroundColor;

		} // end if
		if(!(this._nNLC == this._oC.navNumberLinkColor)||!(this._oC.navNumberLinkColor == undefined))
		{
			this._nNLC = this._oC.navNumberLinkColor;

		} // end if
		if(!(this._nNLS == this._oC.navNumberLinkSize)||!(this._oC.navNumberLinkSize == undefined))
		{
			this._nNLS = this._oC.navNumberLinkSize;

		} // end if
		if(!(this._nNLCC == this._oC.navLinkCurrentColor)||!(this._oC.navLinkCurrentColor == undefined))
		{
			this._nNLCC = this._oC.navLinkCurrentColor;

		} // end if
		if(!(this._nLRC == this._oC.navLinkRolloverColor)||!(this._oC.navLinkRolloverColor == undefined))
		{
			this._nLRC = this._oC.navLinkRolloverColor;

		} // end if
		if(!(this._nIC == this._oC.navButtonColor)||!(this._oC.navButtonColor == undefined))
		{
			this._nIC = this._oC.navButtonColor;

		} // end if
		if(!(this._nTLSA > 0))
		{

		} // end if
		else
		{

		}
		if(!(this._oC.navLinkAppearance == "Thumbnails"))
		{
			this._tNav = false;

		} // end if
		else
		{
			this._tNav = true;

		}
		if(this.isLive)
		{
			this.nullProps();
			this.drawContent(true);

		} // end if
		else
		{
			if(this.isInit)
			{
				this.drawContent();

			} // end if

		}
		if(	this.this = "function(	)
	{
		this._tC._visible = true;
		this.__w = this._oC.__width;
		this.__h = this._oC.__height;
		this.navPos = this._oC.navPosition;
		this._nLPW = this._oC.navLinkPreviewSize.0;
		this._nLPH = this._oC.navLinkPreviewSize.1;
		this._nLPS = this._oC.navLinkPreviewScale;
		this._nLPSW = this._oC.navLinkPreviewStrokeWeight;
		this._nLPBC = this._oC.navLinkPreviewBackgroundColor;
		this._iIA = this._oC.navButtonInactiveAlpha;
		this._iSA = this._oC.navButtonShadowAlpha;
		this._gApp = this._oC.navGradientAppearance;
		this._gAlpha = this._oC.navGradientAlpha;
		this._nLS = this._oC.navLinkSpacing;
		tShadWidth.0 = 1;
		_tNav.false = true;
		this.drawIcons();
		this.drawNavBG();
		this.posNavContent();
		this.setDisplayModeBttn();
		this.setScreenBttn(this.screenMode);
	}";
	_local2.nullProps = "function(	)
	{
		this.clearRevealNavTimer();
		this.isNavLoaded = this.__set__isEngaged(false);
		this.isInit = this.__set__isEngaged(false);
		this._tnTick = 0;
	}";
this._oC.toolLabels._local2)
		{
			this.nullProps();
			this.killMovieClipLoaders();
			this.setupMovieClipLoaders();
			this.createNavLinks();
			this.drawNavLinks();

		} // end if
				if(!this.isInit||this.isLive)
		{
			this.killEngagedTimerAndReset();
			if(this.isLive)
			{
				this.centerNav(this.breakArray.0.3);
				this.redrawLinksMask(this.breakArray.0.2);
				if(this._oC.navLinkPreviewAppearance == "Visible")
				{
					Math.floor((this.hiddenArray.length - 1) / 2);
					this.createThumbnailPreview(this.hiddenArray.Math.floor((this.hiddenArray.length - 1) / 2),Math.floor((this.hiddenArray.length - 1) / 2));
					this.showThumbnailPreviewSize();

				} // end if
				else
				{
					this.killThumbnail();

				}
			
			} // end if
		
		} // end if
				if(	_local2.drawContent = "function(	reset)
	{
		this.setNavNumArea();
		this.drawNavLinkMask();
		this.drawNavLinkBackground();
		this.createNavBreaks();
		this.isInit = true;
	}";
	Math.floor((this.hiddenArray.length - 1) / 2).setupMovieClipLoaders = "function(	)
	{
		this.tl_mcl = new MovieClipLoader();
		this.tlL = new Object();
		this.tp_mcl = new MovieClipLoader();
		this.tpL = new Object();
	}";
	Math.floor((this.hiddenArray.length - 1) / 2).killMovieClipLoaders = "function(	)
	{
		this.tl_mcl.removeListener(this.tlL);
		this.tl_mcl = null;
		this.tlL = null;
		this.tp_mcl.removeListener(this.tpL);
		this.tp_mcl = null;
		this.tpL = null;
	}";
_local2 < this.buttonArray.length)
		{
			if(this.buttonArray._local2)
			{
				if(this.isLive)
				{
					net.slideshowpro.slideshowpro.utils.Utils.removeClips(this.buttonArray._local2);

				} // end if
					if(this.areControlsIncluded())
				{
this._oC.navIcons._local2&&					if(this._oC.navIcons._local2 == this._oC._navDefaultIcons._local2)
					{
						true;
						this._oC._navDefaultIcons._local2;

					} // end if
					else
					{
						var _local4 = false;
						this._oC.navIcons._local2;

					}
									net.slideshowpro.slideshowpro.draw.CreateIcon.create(this.buttonArray._local2,this._nIC,this._iSA,this._oC.navIcons._local2,_local4);

				} // end if
			
			} // end if
		while(			_local2++;
		} // end while
			if(	Math.floor((this.hiddenArray.length - 1) / 2).drawIcons = "function(	)
	{
		var _local2 = 0;
		var _local4 = undefined;
		undefined;
	}";
!this._tNav)
		{
			this.setNavAreaHeight(this.floor(this._pad * 2 + this.navSkipPrevBttn._height - 1));
			if(!this.areControlsIncluded())
			{
				this.setNavAreaHeight(this.floor(this._pad * 3 + this._nNLS));

			} // end if
		
		} // end if
		else
		{
			this.setNavAreaHeight(this.floor(this._pad * 2 + this._nTLH + this._nTLSW * 2 + 2));

		}
			if(!(this._gApp == "Hidden"))
		{
			this.gradTop.clear();
			this.gradBot.clear();
			if(isNaN(this._gAlpha))
			{
				this._gAlpha = 35;

			} // end if
				if(			this.getNavAreaHeight();
			this.floor(this.getNavAreaHeight() / 2);
			this.getNavAreaHeight() - this.floor(this.getNavAreaHeight() / 2);
this._gAlpha > 0)
			{
				if(this._gApp == "Glass Dark")
				{
					net.slideshowpro.slideshowpro.draw.DrawGradient.create(this.gradTop,this.__w,this.floor(this.getNavAreaHeight() / 2),0,0,new Array(16777215,16777215),new Array(this._gAlpha / 3,this._gAlpha / 2),new Array(0,255),90);
					net.slideshowpro.slideshowpro.draw.DrawGradient.create(this.gradBot,this.__w,this.getNavAreaHeight() - this.floor(this.getNavAreaHeight() / 2),0,0,new Array(16777215,16777215),new Array(this._gAlpha / 4,this._gAlpha / 3),new Array(0,255),90);
					this.gradBot._y = this.floor(this.getNavAreaHeight() / 2);

				} // end if
				else
				{
					if(this._gApp == "Glass Light")
					{
						net.slideshowpro.slideshowpro.draw.DrawGradient.create(this.gradTop,this.__w,this.floor(this.getNavAreaHeight() / 2),0,0,new Array(0,0),new Array(this._gAlpha / 2,this._gAlpha / 3),new Array(0,255),90);
						net.slideshowpro.slideshowpro.draw.DrawGradient.create(this.gradBot,this.__w,this.getNavAreaHeight() - this.floor(this.getNavAreaHeight() / 2),0,0,new Array(0,0),new Array(this._gAlpha / 1.5000,this._gAlpha / 3),new Array(0,255),90);
						this.gradBot._y = this.floor(this.getNavAreaHeight() / 2);

					} // end if
					else
					{
						if(this._gApp == "Smooth Dark")
						{
							net.slideshowpro.slideshowpro.draw.DrawGradient.create(this.gradTop,this.__w,this.getNavAreaHeight(),0,0,new Array(16777215,16777215),new Array(this._gAlpha,this._gAlpha / 2),new Array(0,255),90);

						} // end if
						else
						{
							if(this._gApp == "Smooth Light")
							{
								net.slideshowpro.slideshowpro.draw.DrawGradient.create(this.gradTop,this.__w,this.getNavAreaHeight(),0,0,new Array(0,0),new Array(this._gAlpha / 2,this._gAlpha),new Array(0,255),90);

							} // end if
							else
							{
								if(this._gApp == "Concave Dark")
								{
									net.slideshowpro.slideshowpro.draw.DrawGradient.create(this.gradTop,this.__w,this.getNavAreaHeight(),0,0,new Array(16777215,16777215),new Array(this._gAlpha / 3,this._gAlpha),new Array(0,255),90);

								} // end if
								else
								{
									if(this._gApp == "Concave Light")
									{
										net.slideshowpro.slideshowpro.draw.DrawGradient.create(this.gradTop,this.__w,this.getNavAreaHeight(),0,0,new Array(0,0),new Array(this._gAlpha,this._gAlpha / 3),new Array(0,255),90);

									} // end if

								}

							}

						}

					}

				}
			
			} // end if
					false;
			false;
			false;
			this.navBGGrad._visible = true;

		} // end if
		else
		{
			this.navBGGrad._visible = false;

		}
			if(	(_local2++).drawNavBG = "		this.navBG.onPress = "function(		)
		{
	}";
		this.navBG.useHandCursor = false;
	}";
this.areControlsIncluded())
		{
			this.navSkipNextBttn._x = this.__w - this.navSkipNextBttn._width - this._pad;
			if(this.isDisplayModeControlIncluded())
			{
				this.navDisplayModeBttn._visible = true;
				this.navDisplayModeBttn._x = this.floor(this.__w - this.navDisplayModeBttn._width - (this.getNavAreaHeight() - this.navDisplayModeBttn._height - 1) / 2);
				this.navSkipNextBttn._x = this.floor(this.navDisplayModeBttn._x - this._pad * 3 - this.navSkipNextBttn._width);

			} // end if
			else
			{
				this.navDisplayModeBttn._visible = false;

			}
				if(this.isFullScreenControlIncluded())
			{
				this.navScreenBttn._visible = true;
				this.navScreenBttn._x = this.floor(this.__w - this.navScreenBttn._width - (this.getNavAreaHeight() - this.navScreenBttn._height - 1) / 2);
				this.navSkipNextBttn._x = this.floor(this.navScreenBttn._x - this._pad * 3 - this.navScreenBttn._width);
				if(this.isDisplayModeControlIncluded())
				{
					this.navDisplayModeBttn._x = this.floor(this.navScreenBttn._x - this._pad * 3 - this.navDisplayModeBttn._width);
					this.navSkipNextBttn._x = this.floor(this.navDisplayModeBttn._x - this._pad * 3 - this.navSkipNextBttn._width);

				} // end if
			
			} // end if
			else
			{
				this.navScreenBttn._visible = false;

			}
			if(			this.navNextBttn._x = this.floor(this.navSkipNextBttn._x - this.navNextBttn._width - 2);
			this.navSkipPrevBttn._x = this._pad + 2;
!(this._oC.galleryAppearance == "Hidden")||this.isGalleryControlIncluded())
			{
				this.navGalleryBttn._visible = true;
				this.navGalleryBttn._x = this.floor(this._oC.STROKE_WEIGHT + (this.getNavAreaHeight() - this.navGalleryBttn._height - 1) / 2);
				this.navSkipPrevBttn._x = this.floor(this.navGalleryBttn._x + this.navGalleryBttn._width + this._pad * 3);

			} // end if
			else
			{
				this.navGalleryBttn._visible = false;

			}
					this.navPrevBttn._x = this.floor(this.navSkipPrevBttn._x + this.navSkipPrevBttn._width + 2);
			var _local2 = (this.getNavAreaHeight() / 2);
			this.navScreenBttn._y = this.floor(_local2 - this.navScreenBttn._height / 2) + 1;
			this.navDisplayModeBttn._y = this.floor(_local2 - this.navDisplayModeBttn._height / 2) + 1;
			this.navSkipNextBttn._y = this.floor(_local2 - this.navSkipNextBttn._height / 2) + 1;
			this.navSkipPrevBttn._y = this.floor(_local2 - this.navSkipPrevBttn._height / 2) + 1;
			this.navPrevBttn._y = this.floor(_local2 - this.navPrevBttn._height / 2) + 1;
			this.navNextBttn._y = this.floor(_local2 - this.navNextBttn._height / 2) + 1;
			this.navGalleryBttn._y = this.floor(_local2 - this.navGalleryBttn._height / 2) + 1;
			this.navNumEndPoint = this.navNextBttn._x - this._pad;

		} // end if
		else
		{
			this.navNumEndPoint = this.__w - this._pad;

		}
		if(	this.getNavAreaHeight().posNavContent = "function(	)
	{
	}";
	_local2.createNavLinks = "function(	)
	{
		this.navNumBox = this._tC.createEmptyMovieClip("navNumBox_mc",21);
		this.navLinks = this.navNumBox.createEmptyMovieClip("navLinks_mc",1);
		this.navLinksMask = this.navNumBox.createEmptyMovieClip("navNumbMask",99);
		this.navLinks.setMask(this.navLinksMask);
	}";
this.areControlsIncluded())
		{
			this.navNumBox._x = this.navNumBox._x + this.floor(this.navPrevBttn._width);

		} // end if
		else
		{
			this.navNumBox._x = this._pad;

		}
		if(	_local2.setNavNumArea = "function(	)
	{
		this.navNumBox._x = this.navPrevBttn._x + this.BOX_RADIUS;
		this.navNumArea = this.navNumEndPoint - this.navNumBox._x;
	}";
!this.isLive)
		{
			this.numImages = this._oC.dataClass.getCurrentAlbumSize();

		} // end if
		else
		{
			this.numImages = 200;

		}
		if(!this._tNav)
		{
			this.navNum_fmt.font = this._oC.typeface;
			this.navNum_fmt.color = this._nNLC;
			this.navNum_fmt.size = this._nNLS;
			this.navNumHigh_fmt.color = this._nNLCC;
			this.navNumRoll_fmt.color = this._nLRC;

		} // end if
				if(_local3 < this.numImages)
		{
			this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3);
			this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).myNum = _local3;
			if(!this._tNav)
			{
				this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).createTextField("num_txt",1,0,0,50,50);
				this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).num_txt.selectable = false;
				if(this._oC.typefaceEmbed == "Off")
				{
					this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).num_txt.embedFonts = false;

				} // end if
				else
				{
					this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).num_txt.embedFonts = true;

				}
				if(				this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).num_txt.autoSize = true;
				this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).num_txt.setNewTextFormat(this.navNum_fmt);
!(_local3 < 9))
				{

				} // end if
				else
				{

				}
							text.(_local3 + 1) = _local3 + 1;

			} // end if
			else
			{
				this._nTLSW * 2;
				if(this._nTLSA > 0)
				{
					this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).createEmptyMovieClip("s_mc",0);
					net.slideshowpro.slideshowpro.draw.DrawRect.create(this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).s_mc,this._nTLW + this._nTLSW * 2 + 1,this._nTLH + this._nTLSW * 2 + 1,0,this._nTLSA);

				} // end if
				if(this._nTLSW > 0)
				{
					this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).createEmptyMovieClip("b_mc",1);
					net.slideshowpro.slideshowpro.draw.DrawRect.create(this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).b_mc,this._nTLW + this._nTLSW * 2,this._nTLH + this._nTLSW * 2,this._nTLBC,100);

				} // end if
				this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).createEmptyMovieClip("t_mc",3);
				this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).t_mc.createEmptyMovieClip("t2_mc",1);
				this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).t_mc.t2_mc._visible = false;
				this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).createEmptyMovieClip("m_mc",4);
				net.slideshowpro.slideshowpro.draw.DrawRect.create(this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).m_mc,this._nTLW,this._nTLH,16763904,100);
				this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).m_mc._x = this._nTLSW;
				this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).t_mc._x = this._nTLSW;
				this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).m_mc._y = this._nTLSW;
				this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).t_mc._y = this._nTLSW;
				this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).t_mc.setMask(this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).m_mc);

			}
					if(self._oC.p == this.myNum&&!self.isImageLoaded)
				{
					if(!self._tNav)
					{
						this.num_txt.setTextFormat(self.navNumRoll_fmt);

					} // end if
					else
					{
						new Color(this.b_mc);
						new Color(this.b_mc).setRGB(self._nLRC);
						mx.transitions.Tween(this.t_mc.t2_mc,_alpha,this._oC.strongTween,this.t_mc.t2_mc._alpha,100,0.2000,true);

					}
									self.createThumbnailPreview(this,this.myNum);

				} // end if
					if(			this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).onRollOver = "function(			)
			{
				self.setEngagedTimer();
				self._oC.playSound("roll");
			}";
self._oC.p == this.myNum&&!self.isImageLoaded)
				{
					if(!self._tNav)
					{
						self.navNum_fmt.color = self._nNLC;
						this.num_txt.setTextFormat(self.navNum_fmt);

					} // end if
					else
					{
						new Color(this.b_mc);
						new Color(this.b_mc).setRGB(self._nTLBC);
						mx.transitions.Tween(this.t_mc.t2_mc,_alpha,this._oC.strongTween,this.t_mc.t2_mc._alpha,self._nTLIA,0.2000,true);

					}
				
				} // end if
				if(			new Color(this.b_mc).onRollOut = "function(			)
			{
				self.killThumbnail();
			}";
self._oC.isGalleryOpen)
				{
					self._oF.closeFooter();

				} // end if
			if(			new Color(this.b_mc).onReleaseOutside = "function(			)
			{
				self._oC.loadImageNumber(this.myNum);
				self.killThumbnail();
				self._oC.playSound("click");
				self.activateCurrentNum(this.myNum);
			}";
			new Color(this.b_mc).onRelease = "function(			)
			{
				self._oC.loadImageNumber(this.myNum);
				self.killThumbnail();
				self._oC.playSound("click");
				self.activateCurrentNum(this.myNum);
			}";
!(_local3 == 0))
			{
				new Color(this.b_mc)._x = this.floor(_local7 + _local5 + this._nLS);

			} // end if
			if(			new Color(this.b_mc)._x;
!this._tNav)
			{
				new Color(this.b_mc).num_txt.textWidth;

			} // end if
			else
			{
				new Color(this.b_mc)._width;

			}
		while(			_local3++;
		} // end while
		if(!this._tNav)
		{
			this.navLinks._y = this.floor(this.getNavAreaHeight() / 2 - this.navLinks.navNum0.num_txt._height / 2);

		} // end if
		else
		{
			if(!this.isLive)
			{
				this.getThumbnailForFill();

			} // end if
			this.navLinks._y = this.floor(this.getNavAreaHeight() / 2 - (this._nTLH + this._nTLSW * 2) / 2);

		}
		if(	drawNavLinks.this.navLinks.createEmptyMovieClip("navNum" + _local3,_local3).num_txt = "	}";
	new Color(this.b_mc).fillThumbnailNav = "		t.tlL.onLoadError = "function(		)
		{
			self.fillThumbnailNavError(t);
		}";
		t.tl_mcl.addListener(t.tlL);
		t.tl_mcl.loadClip(t,targetMC);
	}";
this._oC.smoothing == "On")
		{
			net.slideshowpro.slideshowpro.utils.ImageSmoother.smoothImage(clip);

		} // end if
		if(	new Color(this.b_mc).afterFill = "function(	clip)
	{
		this.cropToFitThumbLink(clip);
		this.tweenInThumbLink(clip);
		this.getThumbnailForFill();
	}";
	clip.fillThumbnailNavError = "function(	t)
	{
		trace("ERROR: No thumbnail image found at: " + t);
		this.getThumbnailForFill();
	}";
this._tnTick < this.numImages&&!(this.numImages == undefined))
		{
			this.fillThumbnailNav(this.getThumbnail(this._tnTick));
			this._tnTick = this._tnTick++;

		} // end if
		if(	t.getThumbnailForFill = "function(	)
	{
	}";
	t.drawNavLinkMask = "function(	)
	{
		net.slideshowpro.slideshowpro.draw.DrawRect.create(this.navLinksMask,this.getMaskWidth(),this.getNavAreaHeight(),12657477,70);
	}";
	t.drawNavLinkBackground = "function(	)
	{
		this.navBack = this._tC.createEmptyMovieClip("navBack_mc",20);
		net.slideshowpro.slideshowpro.draw.DrawRadiusBox();
		net.slideshowpro.slideshowpro.draw.DrawRadiusBox().drawBox(this.navBack,new Array(this._oC.navLinksBackgroundColor),this._oC.navLinksBackgroundAlpha,0,0,this.navNumEndPoint - this.navNumBox._x,this.getNavAreaHeight() - 4,this.BOX_RADIUS);
		this.navBack._x = this.navNumBox._x;
		this.navBack._y = this.getNavAreaHeight() / 2 - this.navBack._height / 2;
	}";
	net.slideshowpro.slideshowpro.draw.DrawRadiusBox().getMaskWidth = "function(	)
	{
	}";
	net.slideshowpro.slideshowpro.draw.DrawRadiusBox().revealNavTimer = "function(	)
	{
		this._revealNavINT = setInterval(this,revealNav,35);
	}";
	net.slideshowpro.slideshowpro.draw.DrawRadiusBox().clearRevealNavTimer = "function(	)
	{
		clearInterval(this._revealNavINT);
		this.nextNum = 0;
	}";
this._tNav)
		{
			this._nTLW + this._nTLSW * 2 + this.tShadWidth + this._nLS;

		} // end if
			if(_local2 < this.numImages)
		{
			false;
			if(!this._tNav)
			{
				this.navLinks.("navNum" + _local2).num_txt.textWidth + this._nLS;

			} // end if
				if(			this.round(this.navLinks.("navNum" + _local2)._x);
			this.navLinks.("navNum" + _local2).num_txt.textWidth + this._nLS;
)
			{
				this.hiddenArray.push(this.navLinks.("navNum" + _local2));
!this.isLive||				if(!this.isInit)
				{
					this.navLinks.("navNum" + _local2)._visible = false;

				} // end if
			
			} // end if
				if(!(this.navLinks.("navNum" + _local2).num_txt.textWidth + this._nLS < this.navNumArea))
			{
				_local4.2 = -this._nLS;
				if(!this._tNav)
				{
					_local4.2 = _local4.2 + 2;

				} // end if
							_local4.3 = this.round(this.navBack._x + this.navNumArea / 2 - _local4.2 / 2);
				0++;
				this.breakArray.(0++) = new Array();
				new Array();
				new Array().push(_local2,this.round(this.navLinks.("navNum" + _local2)._x) * -1,null);
				this.navLinks.("navNum" + _local2).num_txt.textWidth + this._nLS;
				var _local9 = true;

			} // end if
		while(			this.navLinks.("navNum" + _local2).num_txt.textWidth + this._nLS;
			_local2++;
		} // end while
			if(!_local9)
		{
			new Array().2 = this.navNumArea - this.BOX_RADIUS * 2;
			if(this.breakArray.length == 1)
			{
				new Array().3 = this.round(this.navPrevBttn._x + (this.navNumEndPoint - this.navPrevBttn._x + this.navPrevBttn._width / 2 - this.navLinks.("navNum" + _local2).num_txt.textWidth + this._nLS) / 2) + this._nLS;

			} // end if
			else
			{
				new Array().3 = this.round(this.navBack._x + this.BOX_RADIUS * 2);

			}
		
		} // end if
		if(	net.slideshowpro.slideshowpro.draw.DrawRadiusBox().createNavBreaks = "function(	)
	{
		0;
		0;
		var _local10 = 0;
		0;
		this.breakArray = new Array();
		this.hiddenArray = new Array();
		this.breakArray.0 = new Array();
		var _local4 = new Array();
		_local4.push(0,0,null,null);
		var _local2 = 0;
		var _local6 = undefined;
		var _local9 = undefined;
	}";
w > 0)
		{
			this.navLinksMask._width = "w";

		} // end if
		if(	(_local2++).redrawLinksMask = "function(	w)
	{
	}";
!(this.navLinks._x == amt))
		{
			mx.transitions.Tween(this.navLinks,_x,this._oC.strongTween,this.navLinks._x,amt,1,true);

		} // end if
		if(	w.tweenNav = "function(	amt)
	{
	}";
!isNaN(amt))
		{
			this.navNumBox._x = "amt";

		} // end if
		if(	amt.centerNav = "function(	amt)
	{
	}";
this.nextNum == this.hiddenArray.length)
		{
			this.clearRevealNavTimer();

		} // end if
		if(!this._tNav)
		{
			this.navLinks.("navNum" + this.nextNum)._visible = true;

		} // end if
		else
		{
			this.navLinks.("navNum" + this.nextNum)._visible = true;
			this.navLinks.("navNum" + this.nextNum)._alpha = 0;
			mx.transitions.Tween(this.navLinks.("navNum" + this.nextNum),_alpha,this._oC.strongTween,0,100,1,true);

		}
		while(if(	amt.revealNav = "function(	)
	{
		this.nextNum = this.nextNum++;
	}";
this.nextNum < this.hiddenArray.length)
		{
			this.navLinks.("navNum" + this.nextNum)._visible = true;
			this.nextNum = this.nextNum++;
		} // end while
					if(	amt.revealNavNow = "function(	)
	{
	}";
this.isInit)
		{
			var _local4 = this.navLinks.("navNum" + this._oC.p)._x;
			this.breakArray.length;
			undefined;
			0;
			if(this.breakArray.length > 1)
			{
				if()
				{
					if()
					{
						this.refreshNav(0);

					} // end if
					if(					var _local5 = (this.breakArray.1.1 * -1);
!(_local4 < (this.breakArray.0.1 * -1))||_local4 < _local5)
					{
						this.forceRefreshNav(0);

					} // end if
				while(					0++;
				} // end while
			
			} // end if
			else
			{
				this.forceRefreshNav(0);

			}
		
		} // end if
			if(	amt.checkNavView = "function(	)
	{
	}";
	(0++).checkNavHighlight = "function(	)
	{
		this.activateCurrentNum(this._oC.p);
	}";
!this.isLive)
		{
			if(this._oC.p == 0)
			{
				this.disableButton(this.navPrevBttn);
				this._oC.dispatchEventData("onNavButtonDisabled","previous image");

			} // end if
			else
			{
				this.enableButton(this.navPrevBttn);
				this._oC.dispatchEventData("onNavButtonEnabled","previous image");

			}
			if(this._oC.p == (this.numImages - 1))
			{
				this.disableButton(this.navNextBttn);
				this._oC.dispatchEventData("onNavButtonDisabled","next image");

			} // end if
			else
			{
				this.enableButton(this.navNextBttn);
				this._oC.dispatchEventData("onNavButtonEnabled","next image");

			}
			if(i == 0)
			{
				this.disableButton(this.navSkipPrevBttn);
				this._oC.dispatchEventData("onNavButtonDisabled","previous image group");

			} // end if
			else
			{
				this.enableButton(this.navSkipPrevBttn);
				this._oC.dispatchEventData("onNavButtonEnabled","previous image group");

			}
			if(i == (this.breakArray.length - 1))
			{
				this.disableButton(this.navSkipNextBttn);
				this._oC.dispatchEventData("onNavButtonDisabled","next image group");

			} // end if
			else
			{
				this.enableButton(this.navSkipNextBttn);
				this._oC.dispatchEventData("onNavButtonEnabled","next image group");

			}
		
		} // end if
			if(!this.isNavLoaded)
		{
!this.isLive||			if(this.breakGroup > 0)
			{
				this.revealNavNow();

			} // end if
			else
			{
				this.revealNavTimer();

			}
					this.isNavLoaded = true;

		} // end if
		if(	(0++).refreshNav = "function(	i)
	{
		this.centerNav(this.breakArray.i.3);
		this.tweenNav(this.breakArray.i.1);
		this.redrawLinksMask(this.breakArray.i.2);
		this.breakGroup = "i";
		this.forceGroup = this.breakGroup;
	}";
!this.__get__isEngaged())
		{
			this.refreshNav(i);

		} // end if
		if(	i.forceRefreshNav = "function(	i)
	{
	}";
!((this.forceGroup + _local4) < 0)||(this.forceGroup + _local4) < this.breakArray.length)
		{
			this.forceGroup = this.forceGroup + _local4;
			this.refreshNav(this.forceGroup);

		} // end if
		if(	i.moveNavBreak = "function(	dir)
	{
		this._oC.playSound("slide");
		this.forceGroup;
		this.forceGroup + _local4;
	}";
	(this.forceGroup + _local4).activateCurrentNum = "function(	n)
	{
		this.thisHighlight = this.navLinks.("navNum" + n);
		this.removePreviousNumFormat();
		this.addCurrentNumFormat();
		this.lastHighlight = this.thisHighlight;
		this.checkNavView();
	}";
!this._tNav)
		{
			this.lastHighlight.num_txt.setTextFormat(this.navNum_fmt);

		} // end if
		else
		{
			new Color(this.lastHighlight.b_mc);
			new Color(this.lastHighlight.b_mc).setRGB(this._nTLBC);
			if(!(this.lastHighlight.t_mc.t2_mc == undefined))
			{
				mx.transitions.Tween(this.lastHighlight.t_mc.t2_mc,_alpha,this._oC.strongTween,this.lastHighlight.t_mc.t2_mc._alpha,this._nTLIA,3,true);

			} // end if

		}
		if(	n.removePreviousNumFormat = "function(	)
	{
		this.lastHighlight.useHandCursor = true;
	}";
!this._tNav)
		{
			this.thisHighlight.num_txt.setTextFormat(this.navNumHigh_fmt);

		} // end if
		else
		{
			var _local2 = new Color(this.thisHighlight.b_mc);
			_local2.setRGB(this._nNLCC);
			false;
			var _local3 = mx.transitions.Tween(this.thisHighlight.t_mc.t2_mc,_alpha,this._oC.strongTween,this.thisHighlight.t_mc.t2_mc._alpha,100,3,true);

		}
			if(	new Color(this.lastHighlight.b_mc).addCurrentNumFormat = "function(	)
	{
		this.thisHighlight.useHandCursor = false;
	}";
	_local2.toggleGallery = "function(	)
	{
		this._oC.toggleGallery();
	}";
	_local2.toggleDisplayMode = "function(	)
	{
		this._oC.toggleDisplayMode();
	}";
	_local2.screenRelease = "function(	)
	{
		this._oC.dispatchEventData("onScreenBttnEvent");
	}";
	_local2.prevImageRelease = "function(	)
	{
		this._oC.dispatchEventData("onReqPrevImage");
	}";
	_local2.nextImageRelease = "function(	)
	{
		this._oC.dispatchEventData("onReqNextImage");
	}";
	_local2.prevImageGroupRelease = "function(	)
	{
		this._oC.dispatchEventData("onReqPrevImageGroup");
	}";
	_local2.nextImageGroupRelease = "function(	)
	{
		this._oC.dispatchEventData("onReqNextImageGroup");
	}";
	_local2.loadNextImageGroup = "function(	)
	{
		this.moveNavBreak(1);
		this.setEngagedTimer();
	}";
	_local2.loadPrevImageGroup = "function(	)
	{
		this.moveNavBreak(-1);
		this.setEngagedTimer();
	}";
this._oC.dataClass.getImageProp(_local5,"tn"))
		{
			if(!(this._oC.dataClass.getImageProp(_local5,"tn").indexOf("http") == -1))
			{

			} // end if
		
		} // end if
			if(!(this._oC.dataClass.getCurrentAlbumProp("tnpath") == undefined)||this._oC.dataClass.getCurrentAlbumProp("tnpath").length > 0)
		{
!(this._oC.dataClass.getImageProp(_local5,"tn") == undefined)||			if(this._oC.dataClass.getImageProp(_local5,"tn").length > 0)
			{

			} // end if
			else
			{

			}
		
		} // end if
		if(!(this._oC.dataClass.getImageProp(_local5,"tn") == undefined)||this._oC.dataClass.getImageProp(_local5,"tn").length > 0)
		{

		} // end if
			if(	_local2.getThumbnail = "function(	n)
	{
		this._oC.dataClass.getImageProp(_local5,"src");
		this._oC.dataClass.getCurrentAlbumProp("tnpath");
		this._oC.dataClass.getImageProp(_local5,"tn");
		undefined;
	}";
	this._oC.dataClass.getImageProp(_local5,"tn").cropToFitThumbLink = "function(	c)
	{
		c._width;
		c._height;
		var _local3 = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(c._width,c._height,this._nTLW,this._nTLH,true);
		c._height = _local3.newH;
		c._width = _local3.newW;
		c._x = -_local3.oX;
		c._y = -_local3.oY;
	}";
	c.tweenInThumbLink = "function(	c)
	{
		this._tweenFadeInThumbNav = mx.transitions.Tween(c,_alpha,this._oC.strongTween,0,this._nTLIA,0.5000,true);
		c._visible = true;
	}";
this._oC.navLinkPreviewAppearance == "Visible"&&!this._oF.isGalleryOpen)
		{
			undefined;
			if(!this.isLive)
			{
				var _local2 = this.getThumbnail(c._width);

			} // end if
			else
			{
				;

			}
				if("" == undefined&&this.isLive)
			{
				System.security.allowDomain("");
				this.killThumbnail();
				if(this.navPos == "Bottom")
				{
					this.tnPop = this._tC.attachMovie("thumbnailPreviewBottom","tn_mc",100);
					this.tnPop._y = 0;

				} // end if
				else
				{
					if(this.navPos == "Top")
					{
						this.tnPop = this._tC.attachMovie("thumbnailPreviewTop","tn_mc",100);
						this.tnPop._y = this.getNavAreaHeight();

					} // end if

				}
				if(				this.tnPop.tnFrame._alpha = this._oC.navLinkPreviewBackgroundAlpha;
!this.isLive)
				{
					this.tnPop.dim_mc._visible = false;
					this.tnPop._visible = false;

				} // end if
				if(				new Color(this.tnPop.tnFrame);
				new Color(this.tnPop.tnFrame).setRGB(this._nLPBC);
!this._tNav)
				{
					this.tnPop._x = this.navNumBox._x + this.navLinks._x + n._x + n._width / 2;

				} // end if
				else
				{
					this.tnPop._x = this.navNumBox._x + this.navLinks._x + n._x + this.floor(this._nTLW / 2 + this._nTLSW);

				}
				if(				this.tnLoader = this.tnPop.createEmptyMovieClip("tnL",100);
				this.tnLoader._y = -10000;
this._nLPS == "Crop to Fit")
				{
					this.tnPMask = this.tnPop.createEmptyMovieClip("tnP",101);
					this.tnPMask._visible = false;

				} // end if
							this.loadThumbnailPreview("");

			} // end if
		
		} // end if
		if(	c.createThumbnailPreview = "function(	clip,n)
	{
	}";
	.loadThumbnailPreview = "		this.tpL.onLoadInit = "function(		target_mc)
		{
			self.procThumbnailPreview(target_mc);
		}";
		target_mc.tp_mcl.addListener(target_mc.tpL);
		target_mc.tp_mcl.loadClip(thumbPath,target_mc.tnLoader);
	}";
this._oC.smoothing == "On")
		{
			net.slideshowpro.slideshowpro.utils.ImageSmoother.smoothImage(c._width);

		} // end if
		if(this._nLPS == "Crop to Fit")
		{
			net.slideshowpro.slideshowpro.draw.DrawRect.create(this.tnPMask,this._nLPW,this._nLPH,0,50);

		} // end if
		if(!(this._nLPS == "None")||c._width._width == this._nLPW&&c._width._height == this._nLPH)
		{
			this.calcThumbPreview(0,0);

		} // end if
			if(this._nLPS == "Crop to Fit")
		{
c._width._width == this._nLPW&&			if(!(c._width._height == this._nLPH))
			{
				var _local2 = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(c._width._width,c._width._height,this._nLPW,this._nLPH,true);
				this.tnLoader._width = _local2.newW;
				this.tnLoader._height = _local2.newH;
				this.calcThumbPreview(_local2.oX,_local2.oY);

			} // end if
		
		} // end if
		else
		{
				if(this._nLPS == "Proportional")
			{
c._width._width == this._nLPW&&				if(!(c._width._height == this._nLPH))
				{
					net.slideshowpro.slideshowpro.utils.Utils.scaleImage(c._width._width,c._width._height,this._nLPW,this._nLPH,false);
					this.tnLoader._width = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(c._width._width,c._width._height,this._nLPW,this._nLPH,false).newW;
					this.tnLoader._height = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(c._width._width,c._width._height,this._nLPW,this._nLPH,false).newH;
					this.calcThumbPreview(0,0);

				} // end if
			
			} // end if

		}
		if(	thumbPath.procThumbnailPreview = "function(	target)
	{
		this.tnLoader._alpha = 0;
		c._width._width;
		c._width._height;
		undefined;
	}";
	net.slideshowpro.slideshowpro.utils.Utils.scaleImage(c._width._width,c._width._height,this._nLPW,this._nLPH,false).tweenPreview = "function(	)
	{
		this._tweenPreviewImg = mx.transitions.Tween(this.tnLoader,_alpha,this._oC.strongTween,0,100,0.2000,true);
	}";
this._tweenPreviewImg)
		{
			this._tweenPreviewImg.stop();

		} // end if
		if(	net.slideshowpro.slideshowpro.utils.Utils.scaleImage(c._width._width,c._width._height,this._nLPW,this._nLPH,false).killTweenPreview = "function(	)
	{
	}";
!(this._nLPS == "Proportional")||this._nLPS == "None")
		{
			_local2 + this.tnLoader._width;
			var _local3 = (this._nLPSW * 2 + this.tnLoader._height);

		} // end if
		else
		{
			if(this._nLPS == "Crop to Fit")
			{
				_local2 + this.tnLoader._width + this._nLPW;
				_local3 + this._nLPH;

			} // end if

		}
		if(this.navPos == "Bottom")
		{
			this._nLPSW - _local3 + this._nLPH;

		} // end if
		if(this._nLPS == "Crop to Fit")
		{
			this.tnPMask._x = this.tnLoader._x;
			this.tnPMask._y = this.tnLoader._y;
			this.tnLoader._x = this.tnLoader._x - this.round(this.navLinks.("navNum" + _local2)._x);
			this.tnLoader._y = this.tnLoader._y - undefined;
			this.tnLoader.setMask(this.tnPMask);

		} // end if
		if(	net.slideshowpro.slideshowpro.utils.Utils.scaleImage(c._width._width,c._width._height,this._nLPW,this._nLPH,false).calcThumbPreview = "function(	offsetX,offsetY)
	{
		var _local2 = (this._nLPSW * 2);
		this._nLPSW * 2;
		-(_local2 + this.tnLoader._width + this._nLPW) / 2 + this._nLPSW;
		this._nLPSW;
		this.tnLoader._x = -(_local2 + this.tnLoader._width + this._nLPW) / 2 + this._nLPSW;
		this.tnLoader._y = this._nLPSW - _local3 + this._nLPH;
		this.tweenThumbnailWindow(_local2 + this.tnLoader._width + this._nLPW,_local3 + this._nLPH);
	}";
this.tnLoader._width > 0)
		{
			this.tnPop._visible = true;
			this.tnTweenW = mx.transitions.Tween(this.tnPop.tnFrame.tnBox,_width,this._oC.strongTween,18,undefined,0.2000,true);
			this.tnTweenH = mx.transitions.Tween(this.tnPop.tnFrame.tnBox,_height,this._oC.strongTween,10,-(_local2 + this.tnLoader._width + this._nLPW) / 2 + this._nLPSW,0.2000,true);

		} // end if
		else
		{
			this.killThumbnail();

		}
		if(	(_local2 + this.tnLoader._width + this._nLPW).tweenThumbnailWindow = "function(	w,h)
	{
		10;
		18;
		this.thumbTweenDone = new Object();
		this.thumbTweenDone.onMotionFinished = mx.utils.Delegate.create(this,this.showThumbnail);
		this.tnPop.tnFrame.tnBox;
		this.tnTweenH.addListener(this.thumbTweenDone);
	}";
	this.tnPop.tnFrame.tnBox.showThumbnail = "function(	)
	{
		this.tnPMask._visible = true;
		this.tweenPreview();
	}";
	this.tnPop.tnFrame.tnBox.killThumbnail = "function(	)
	{
		this.tp_mcl.removeListener(this.tpL);
		this.tnPop.removeMovieClip();
	}";
this.navPos == "Bottom")
		{
			this.tnPop.dim_mc._y = -this._nLPH + this._nLPH / 2;

		} // end if
		else
		{
			if(this.navPos == "Top")
			{
				this.tnPop.dim_mc._y = this._nLPH - this._nLPH / 2;

			} // end if

		}
		if(	this.tnPop.tnFrame.tnBox.showThumbnailPreviewSize = "function(	)
	{
		this.tnPop.tnFrame.tnBox._width = this._nLPW;
		this.tnPop.tnFrame.tnBox._height = this._nLPH;
		this.tnPop.dim_mc.d_txt.text = this._nLPW + "px / " + this._nLPH + "px";
		this.tnPop.dim_mc._visible = true;
	}";
	_local2.this.tnPop.tnFrame.tnBox = "function(	b)
	{
		this._engaged = "b";
		__set__isEngaged;
	}";
	b.__get__isEngaged = "function(	)
	{
	}";
this._oC.displayMode == "Auto")
		{
			clearInterval(this._engagedINT);
			this._engagedINT = setInterval(this,killEngagedTimerAndReset,5000);
			this.__set__isEngaged(true);

		} // end if
					if(	b.setEngagedTimer = "function(	)
	{
	}";
	b.killEngagedTimerAndReset = "function(	)
	{
		this.killEngagedTimer();
		this.checkNavView();
	}";
	draw.b = "function(	)
	{
		clearInterval(this._engagedINT);
		delete this._engagedINT		killEngagedTimer;
		this.__set__isEngaged(false);
	}";
	b.removeChildren = "function(	)
	{
		this._tC.clear();
		net.slideshowpro.slideshowpro.utils.Utils.removeClips(this._tC);
	}";
	b.getNavAreaHeight = "function(	)
	{
	}";
	b.setNavAreaHeight = "function(	n)
	{
		this.navBoxH = "n";
		this.broadcastNavAreaHeight(n);
	}";
	n.broadcastNavAreaHeight = "function(	h)
	{
		this._oC.caClass.setNavigationHeight(h);
	}";
!(this._oC.displayMode === "Auto"))
		{
			if(!(this._oC.displayMode === "Manual"))
			{
!(this.screenMode == s))
					{
						this.screenMode = "s";

					} // end if
