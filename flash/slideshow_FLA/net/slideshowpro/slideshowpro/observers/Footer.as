
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
		if(!_global.net.slideshowpro.slideshowpro.observers.Footer)
{
	net.slideshowpro.slideshowpro.observers.Footer = "function(	)
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
	}.prototype.init = "function(	o,target)
	{
		this._oC = "";
		this._oC.caClass.addObserver(this);
		this.target_mc = "target";
		this.target_mc._visible = false;
		this.initListeners();
		this.createChildren();
		this.initNavAndGallery();
	}";
!(this._oC.galleryAppearance == "Hidden"))
		{
			this.drawFooterBG();

		} // end if
		if(	target.dimensionUpdate = "function(	d)
	{
		this._dim = "d";
	}";
	d.initListeners = "		new Object().onPermalink = "function(		eventObject)
		{
			self.isPermalinkAvail = eventObject.data;
		}";
		eventObject._oC.addEventListener("onPermalink",new Object());
	}";
	createChildren.this = "function(	)
	{
		bg_mc._visible = this.target_mc.attachMovie("squareSymbol","bg_mc",1,new Object(false));
		this.galleryBox = this.target_mc.createEmptyMovieClip("gBox_mc",2);
		this.navBox = this.target_mc.createEmptyMovieClip("navBox_mc",3);
	}";
!(this._oC.galleryAppearance == "Hidden"))
		{
			this.gBox = net.slideshowpro.slideshowpro.observers.Gallery(this.galleryBox,this._oC,this);

		} // end if
		if(	new Object().initNavAndGallery = "function(	)
	{
		this.nBox = net.slideshowpro.slideshowpro.observers.Navigation(this.navBox,this._oC,this);
	}";
!(this._oC.galleryAppearance == "Hidden"))
		{
			this.gBox.draw(this._dim);

		} // end if
			if(this.isInit&&!this._oC.isLivePreview)
		{
			this.stopTweens(this._tweenToNavHeight,this._tweenHideFooter,this._tweenOpenFooter);
			this.resize();
			if(!(this._oC.galleryAppearance == "Hidden"))
			{
				this.gBox.redraw();

			} // end if
		
		} // end if
		if(!(this._oC.galleryAppearance == "Hidden"))
		{
			this.posGallery();

		} // end if
			if(this._oC.isLivePreview)
		{
			if(!(this._oC.galleryAppearance == "Hidden"))
			{
				this.gBox.formatAlbums();

			} // end if
					this.drawFooterPreview();

		} // end if
		if(	new Object().draw = "function(	)
	{
		this.navPos = this._oC.navPosition;
		this.navApp = this._oC.navAppearance;
		this.nBox.draw();
		this.isInit = true;
	}";
!this.isGalleryOpen)
		{
			this.target_mc._y = this.getFooterAtNavHeightPos();

		} // end if
		else
		{
			this.reposNav();

		}
		if(	new Object().resize = "function(	)
	{
	}";
this.navPos == "Bottom")
		{
			this.target_mc._y = this._oC.__height;

		} // end if
		else
		{
			this.target_mc._y = -this._dim.navHeight;

		}
		if(this._oC.startup == "Open Gallery"&&!this.isPermalinkAvail||!(this._oC.galleryAppearance == "Hidden"))
		{
			this.openFooter();

		} // end if
		else
		{
			if(!(this.navApp == "Visible on Rollover"))
			{
				this.openFooterToNav();

			} // end if
			else
			{
				this.isFooterInit = true;

			}

		}
			if(	new Object().initFooter = "function(	)
	{
		this.target_mc._visible = true;
	}";
this._oC.startup == "Open Gallery"&&this._oC.galleryAppearance == "Visible")
		{
!(this.navApp == "Hidden")||			if(this.navApp == "Hidden When Gallery Open")
			{
				this.navBox._visible = false;
				this.target_mc._y = this.getFooterAtNavUnseenPos();

			} // end if
			else
			{
				this.navBox._visible = true;
				this.target_mc._y = this.getFooterAtNavSeenPos();

			}
		
		} // end if
		else
		{
			this.target_mc._y = this.getFooterAtNavHeightPos();

		}
			if(	new Object().drawFooterPreview = "function(	)
	{
		this.target_mc._visible = true;
		this.target_mc._x = 0;
	}";
this.navApp == "Always Visible")
		{
			if(this.navPos == "Bottom")
			{
				this.target_mc._y = 0;

			} // end if
			else
			{
				if(this.navPos == "Top")
				{
					this.target_mc._y = this._oC.__height - this._dim.navHeight;

				} // end if

			}
		
		} // end if
		else
		{
				if(!(this.navApp == "Hidden")||this.navApp == "Visible on Rollover")
			{
				if(this.navPos == "Bottom")
				{
					this.target_mc._y = this._oC.__height;

				} // end if
				else
				{
					if(this.navPos == "Top")
					{
						this.target_mc._y = -this.target_mc._height;

					} // end if

				}
			
			} // end if
			else
			{
				if(this.navApp == "Hidden When Gallery Open")
				{
					this.target_mc._y = this.getFooterAtNavUnseenPos();

				} // end if

			}

		}
		if(	new Object().reposNav = "function(	)
	{
	}";
	new Object().drawFooterBG = "		this.bg_mc.onPress = "function(		)
		{
	}";
		this.bg_mc.useHandCursor = false;
		this.posFooterBG();
		this.bg_mc._visible = true;
	}";
this.navPos == "Bottom")
		{
			this.bg_mc._y = this._dim.navHeight;

		} // end if
		else
		{
			if(this.navPos == "Top")
			{
				this.bg_mc._y = -this._oC.__height;

			} // end if

		}
		if(	new Color(this.bg_mc).posFooterBG = "function(	)
	{
	}";
this.navPos == "Bottom")
		{
			this.galleryBox._y = this._oC.galleryPadding + this._dim.navHeight;

		} // end if
		else
		{
				if(this.navPos == "Top")
			{
				this.galleryBox._y = -this._oC.__height + this._oC.galleryPadding;
!(this.navApp == "Always Visible")||				if(this.navApp == "Visible on Rollover")
				{
					this.galleryBox._y = this.galleryBox._y + this._dim.navHeight;

				} // end if
			
			} // end if

		}
					if(	new Color(this.bg_mc).posGallery = "function(	)
	{
		this._oC.galleryPadding;
		this.galleryBox._x = this._oC.galleryPadding;
	}";
this.navApp == "Visible on Rollover")
		{
			if(this.isFooterInit)
			{
				if(this.initMouseMove)
				{
					if(!this.isGalleryOpen)
					{
						this.openFooterToNav();

					} // end if
									this.initMouseMove = false;

				} // end if
			
			} // end if
		
		} // end if
			if(	this._oC.galleryPadding.afterTimerStart = "function(	)
	{
	}";
this.navApp == "Visible on Rollover")
		{
			if(!this.isGalleryOpen)
			{
				this.hideFooter();

			} // end if
					this.initMouseMove = true;

		} // end if
		if(	this._oC.galleryPadding.afterTimerEnd = "function(	)
	{
	}";
this.footerInView())
		{
			this.hideFooter();

		} // end if
		else
		{
			this.openFooterToNav();

		}
		if(	this._oC.galleryPadding.toggleNav = "function(	)
	{
	}";
	this._oC.galleryPadding.openFooter = "function(	)
	{
		this.nBox.disableNavButtons();
		this.nBox.disableDisplayButtons();
		this._oC.dispatchEventData("onGalleryState","opening");
		this.setFooterAtOpenPos();
	}";
	this._oC.galleryPadding.openFooterToNav = "function(	)
	{
		this._oC.dispatchEventData("onGalleryState","navShowing");
		this.setFooterAtNavHeight();
	}";
	this._oC.galleryPadding.closeFooter = "function(	)
	{
		this.navBox._visible = true;
		this._oC.dispatchEventData("onGalleryState","closing");
		this.setFooterAtNavHeight();
	}";
	this._oC.galleryPadding.hideFooter = "function(	)
	{
		this.stopTweens(this._tweenToNavHeight);
		this._oC.dispatchEventData("onGalleryState","hiding");
		this.setFooterAtHiddenPos();
	}";
	this._oC.galleryPadding.setFooterAtNavHeight = "function(	)
	{
		var _local2 = new Object();
		this._tweenToNavHeight = mx.transitions.Tween(this.target_mc,_y,this.strongTween,this.target_mc._y,this.getFooterAtNavHeightPos(),0.7000,true);
		this._tweenToNavHeight.addListener(_local2);
		_local2.onMotionFinished = mx.utils.Delegate.create(this,this.afterFooterAtNavHeight);
	}";
!(this.navApp == "Always Visible")||this.navApp == "Visible on Rollover")
		{
			this._tweenOpenFooter = mx.transitions.Tween(this.target_mc,_y,this.strongTween,this.target_mc._y,this.getFooterAtNavSeenPos(),0.5000,true);

		} // end if
		else
		{
			this.navBox._visible = false;
			this._tweenOpenFooter = mx.transitions.Tween(this.target_mc,_y,this.strongTween,this.target_mc._y,this.getFooterAtNavUnseenPos(),0.5000,true);

		}
		if(	_local2.setFooterAtOpenPos = "function(	)
	{
		new Object();
		this._tweenOpenFooter.addListener(new Object());
		new Object().onMotionFinished = mx.utils.Delegate.create(this,this.afterFooterOpen);
	}";
	new Object().setFooterAtHiddenPos = "function(	)
	{
		var _local2 = new Object();
		this._tweenHideFooter = mx.transitions.Tween(this.target_mc,_y,this.strongTween,this.target_mc._y,this.getFooterAtHiddenPos(),0.5000,true);
		this._tweenHideFooter.addListener(_local2);
		_local2.onMotionFinished = mx.utils.Delegate.create(this,this.afterFooterHidden);
	}";
	_local2.afterFooterOpen = "function(	)
	{
		this.isGalleryOpen = true;
		this._oC.dispatchEventData("onGalleryState","open");
		this.isFooterInit = true;
	}";
	_local2.afterFooterHidden = "function(	)
	{
		this.isGalleryOpen = false;
		this.initMouseMove = true;
		this._oC.dispatchEventData("onGalleryState","hidden");
	}";
this.isGalleryOpen)
		{
			this.isGalleryOpen = false;
			this._oC.dispatchEventData("onGalleryState","closed");

		} // end if
		while(if(	_local2.afterFooterAtNavHeight = "function(	)
	{
		this._oC.dispatchEventData("onGalleryState","navShown");
		this.isFooterInit = true;
	}";
)
		{
			arguments.0.stop();
			0++;
		} // end while
		if(	_local2.stopTweens = "function(	)
	{
		0;
	}";
this.navPos == "Bottom")
		{
			var _local2 = Math.floor(this._oC.__height - this._dim.navHeight);

		} // end if
		else
		{
			if(this.navPos == "Top")
			{
				this._oC.STROKE_WEIGHT;

			} // end if

		}
		if(	(0++).getFooterAtNavHeightPos = "function(	)
	{
		undefined;
	}";
this.navPos == "Bottom")
		{
			this._oC.STROKE_WEIGHT;

		} // end if
		else
		{
			if(this.navPos == "Top")
			{
				var _local2 = Math.floor(this._oC.__height - this._dim.navHeight);

			} // end if

		}
		if(	this._oC.STROKE_WEIGHT.getFooterAtNavSeenPos = "function(	)
	{
		var _local2 = undefined;
	}";
this.navPos == "Bottom")
		{
			var _local2 = (-this._dim.navHeight);

		} // end if
		else
		{
			if(this.navPos == "Top")
			{
				this._oC.__height;

			} // end if

		}
		if(	_local2.getFooterAtNavUnseenPos = "function(	)
	{
		undefined;
	}";
this.navPos == "Bottom")
		{
			this._oC.__height;

		} // end if
		else
		{
			if(this.navPos == "Top")
			{
				var _local2 = (-this._dim.navHeight);

			} // end if

		}
		if(	this._oC.__height.getFooterAtHiddenPos = "function(	)
	{
		var _local2 = undefined;
	}";
this.target_mc._y == this.getFooterAtNavHeightPos())
		{

		} // end if
		if(	_local2.footerInView = "function(	)
	{
	}";
!(this._oC.galleryAppearance == "Hidden"))
		{
			this.gBox.setData();

		} // end if
		if(	_local2.setGalleryData = "function(	)
	{
	}";
!(this.navApp == "Hidden"))
		{
			this.nBox.drawContent(true);

		} // end if
			if(	_local2.setNavData = "function(	)
	{
	}";
	_local2.afterImageFormat = "function(	)
	{
		this.nBox.activateArrows();
		this.nBox.checkNavHighlight();
	}";
this.isGalleryOpen)
		{
			if(this.navApp == "Visible on Rollover")
			{
				this.hideFooter();

			} // end if
			else
			{
				this.closeFooter();

			}
		
		} // end if
		if(	_local2.afterAlbumData = "function(	)
	{
		this.setNavData();
	}";
!this.isGalleryOpen)
		{
			this.openFooter();

		} // end if
		else
		{
			if(this.navApp == "Visible on Rollover")
			{
				this.hideFooter();

			} // end if
			else
			{
				this.closeFooter();

			}

		}
	_local2.afterGalleryStateEvent = "function(	)
	{
	}";
	_local2.strongTween = mx.transitions.easing.Strong.easeOut;
	_local2.isGalleryOpen = false;
	_local2.isMouseInside = false;
	_local2.initMouseMove = true;
	_local2.isInit = false;
	_local2.isFooterInit = false;
	_local2.isPermalinkAvail = false;

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.Footer.prototype,null,1);
