
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
		if(!_global.net.slideshowpro.slideshowpro.observers.MediaPlayer)
{
	net.slideshowpro.slideshowpro.observers.MediaPlayer = "function(	)
	{
		super.undefined();
	}";
	extends();
	function(	)
	{
		super.undefined();
	}.prototype;
	create.net.slideshowpro.slideshowpro.observers.MediaPlayer = "function(	target_mc,oC)
	{
		caseOp();
		var _local1 = .attachMovie("MediaPlayerSymbol","mp_mc",0);
		_local1._oC = "oC";
		_local1.init();
	}";
!this._oC.isLivePreview)
		{
			this.initListeners();

		} // end if
		if(	oC.init = "function(	)
	{
		this.isLive = this._oC.isLivePreview;
		this._oC.caClass.addObserver(this);
		this.tempBox._height = 0;
		this.tempBox._width = 0;
		this.tempBox._visible = false;
		this.t_fmt = new TextFormat();
		this.e_fmt = new TextFormat();
		this.pad = this._oC.GLOBAL_PAD;
		this.createChildren();
		this.arrangeOutOfView();
	}";
	oC.initListeners = "		new Object().onVideoPreviewRemove = "function(		)
		{
			self.hasPreview = false;
		}";
		eventObject._oC.addEventListener("onVideoPreviewRemove",new Object());
	}";
this.mpReq)
		{
			this.mpReq.video = null;
			this.mpReq.audio = null;

		} // end if
			if(	new Object().afterAlbumData = "function(	)
	{
		this.halt();
		this.removePlayer();
		this.destroyAudio();
		this.destroyVideo();
		this.nullFormat();
		this.trackMedia = false;
		this.isPauseIntExpired = false;
		this.isForcedStop = false;
		this.isCaptionAndVolumeSetup = false;
	}";
	new Object().afterVideoMetaData = "function(	n)
	{
		this.vidDuration = "n";
		this.updateDuration();
	}";
.data == "opening")
		{
			this._visible = false;
			this.trackClosing = true;
!this.isVideoPlaying||			if(this.isAudioPlaying)
			{
				this.trackMedia = true;
				this.pauseMedia();

			} // end if
		
		} // end if
				if(!(.data == "closed")||.data == "hidden")
		{
			this._visible = true;
			if(this.trackClosing)
			{
				this.trackClosing = false;
				if(this.trackMedia)
				{
					this.trackMedia = false;
					this.startMedia();

				} // end if
			
			} // end if
		
		} // end if
			if(	n.afterGalleryStateChange = "function(	o)
	{
		.data;
	}";
	.data.afterVideoPause = "function(	)
	{
		this.isVideoPlaying = false;
		this.setBttnState("pause");
	}";
	.data.afterVideoResume = "function(	)
	{
		this.isVideoPlaying = true;
		this.setBttnState("play");
	}";
this.mpReq)
		{
!this.mpReq.video||			if(this.mpReq.audio)
			{
				this.initMediaPlayer();
				this.resetControl();

			} // end if
		
		} // end if
			if(	.data.afterImageFormat = "function(	)
	{
	}";
this.mpReq.audio&&this._oC.audioPause == "On")
		{
			if(s == "Auto")
			{
				this.startMedia();

			} // end if
			else
			{
				if(s == "Manual")
				{
					this.pauseMedia();

				} // end if

			}
		
		} // end if
		if(	.data.afterDMChange = "function(	s)
	{
	}";
!this.isLive||this.isInView&&!this.isTweenOutStarted)
		{
			this.arrangeInFinalPos();

		} // end if
		if(!this.isInView)
		{
			this.arrangeOutOfView();

		} // end if
		if(	s.dimensionUpdate = "function(	d)
	{
		this._dim = "d";
	}";
!(this._oC.mediaPlayerAppearance == "Hidden"))
		{
			this.mp = this.createEmptyMovieClip("mp_mc",1);
			this.mpBG = this.mp.createEmptyMovieClip("mpBG_mc",1);
			this.mpContent = this.mp.createEmptyMovieClip("aBC_mc",2);
			this.mpPop = this.mp.createEmptyMovieClip("mpPop_mc",3);
			this.mpVol = this.mp.createEmptyMovieClip("mpVol_mc",4);
			this.mpvClass = net.slideshowpro.slideshowpro.observers.MediaPlayerVolume.createVolume(this.mpVol,this);
			this.mpBG.onPress = "function(			)
			{
		}";
			this.mpBG.useHandCursor = false;
			this.mpContent.createTextField("elapsed_txt",2,0,0,1,1);
			this.mpContent.createTextField("caption_txt",4,0,0,1,18);
			this.mpBttn = this.mpContent.createEmptyMovieClip("bttn_mc",5);
			this.mpPlayBttn = this.mpBttn.createEmptyMovieClip("nPC_mc",0);
			this.mpPauseBttn = this.mpBttn.createEmptyMovieClip("nPB_mc",1);
			this.mpScrubber = this.mpContent.createEmptyMovieClip("sc_mc",6);
			this.mpScrubberUI = this.mpScrubber.createEmptyMovieClip("scui_mc",0);
			this.mp.createTextField("popTime_txt",100,0,0,1,99);
			this.textElapsed = this.mpContent.elapsed_txt;
			this.textCaption = this.mpContent.caption_txt;
			this.textPop = this.mp.popTime_txt;
			this.textElapsed.selectable = false;
			this.textElapsed.autoSize = true;
			this.textCaption.selectable = false;
			this.textCaption.html = true;
			this.textPop.selectable = false;
			this.textPop.autoSize = true;
			this.textPop._visible = false;

		} // end if
		if(	d.createChildren = "	}";
	d.removeChildren = "function(	)
	{
		net.slideshowpro.slideshowpro.utils.Utils.removeClips(this.mpScrubber);
	}";
!this.isInit)
		{
			this.setPrefVolume(this._oC.audioVolume);

		} // end if
			if(!(this._oC.mediaPlayerAppearance == "Hidden"))
		{
			this.showPlayer = true;
			this.mpPos = this._oC.mediaPlayerPosition;
			this.navPos = this._oC.navPosition;
			if(this._oC.typefaceEmbed == "Off")
			{
				this.textPop.embedFonts = false;
				this.textCaption.embedFonts = false;
				this.textElapsed.embedFonts = false;

			} // end if
			else
			{
				this.textPop.embedFonts = true;
				this.textCaption.embedFonts = false;
				this.textElapsed.embedFonts = true;

			}
			if(			this.e_fmt.font = this._oC.typeface;
			this.t_fmt.font = this._oC.typeface;
			this.e_fmt.size = this._oC.mediaPlayerTextSize;
			this.t_fmt.size = this._oC.mediaPlayerTextSize;
			this.t_fmt.color = this._oC.mediaPlayerTextColor;
			this.textElapsed.setNewTextFormat(this.t_fmt);
			this.textCaption.setNewTextFormat(this.t_fmt);
			this.e_fmt.color = this._oC.mediaPlayerElapsedTextColor;
			this.textPop.setNewTextFormat(this.e_fmt);
this.isLive)
			{
				this.nullFormat();
				this.drawUI();
				this.drawPreview();
				this.arrangeCenterX();

			} // end if
			else
			{
				if(this.isInit)
				{
					this.drawUI();
					this.stopAllTweens();
					this.initMediaPlayer();

				} // end if

			}
		
		} // end if
		if(	d.draw = "function(	)
	{
		this.visible(false);
	}";
	d.drawUI = "function(	)
	{
		this.drawIcons();
		this.formatMediaPlayer();
		this.arrangeInitPos();
		this.setOpenTargetY();
		this.setClosedTargetY();
		this.mpvClass.draw();
		this.isInit = true;
	}";
	d.setMediaReq = "function(	o)
	{
		this.mpReq = "o";
		this.invalidate();
	}";
	o.invalidate = "function(	)
	{
		this.onEnterFrame = this.doLaterDispatch;
	}";
	function(	)
	{
		super.undefined();
	}.o = "function(	)
	{
		this.reqChange();
		delete this.onEnterFrame		doLaterDispatch;
	}";
this.mpReq.audio)
		{
			this.isAudioIgnored = this.mpReq.video;

		} // end if
		if(!this.mpReq.video)
		{
			this.destroyVideo();

		} // end if
		if(!this.mpReq.audio||!this.mpReq.video)
		{
			this.destroyAudio();
			this.destroyVideo();
			this.removePlayer();

		} // end if
			if(	o.reqChange = "function(	)
	{
	}";
)
		{
			_local7;
			if(this._oC.navIcons._local7 == this._oC._navDefaultIcons._local7)
			{
				true;
				this._oC._navDefaultIcons._local7;
				_local4.0.y = _local4.0.y + 1;

			} // end if
			else
			{
				var _local6 = false;
				this._oC.navIcons._local7;

			}
		while(			net.slideshowpro.slideshowpro.draw.CreateIcon.create(_local4.0,this._oC.mediaPlayerButtonColor,this._oC.mediaPlayerButtonShadowAlpha,this._oC.navIcons._local7,_local6);
			0++;
		} // end while
		if(	o.drawIcons = "function(	)
	{
		var _local4 = new Array(this.mpPauseBttn,this.mpPlayBttn);
		var _local6 = undefined;
		var _local5 = undefined;
		var _local7 = 7;
		0;
	}";
	(0++).formatMediaPlayer = "function(	)
	{
		this.mpHeight = this.mpContent._height + this.pad;
		this._oC.__width * (this._oC.mediaPlayerScale / 100) - this.pad * 2;
		this.calcScrubberH();
		net.slideshowpro.slideshowpro.draw.DrawRadiusBox();
		net.slideshowpro.slideshowpro.draw.DrawRadiusBox().drawBox(this.mpBG,new Array(this._oC.mediaPlayerBackgroundColor),this._oC.mediaPlayerBackgroundAlpha,0,0,this._oC.__width * (this._oC.mediaPlayerScale / 100) - this.pad * 2,this.mpHeight,this.BOX_RADIUS);
		this.mpBttn._x = this.BOX_RADIUS;
		this.mpBttn._y = this.floor(this.mpHeight / 2 - this.mpBttn._height / 2);
		this.mpvClass._x = this._oC.__width * (this._oC.mediaPlayerScale / 100) - this.pad * 2 - this.mpvClass._width - this.BOX_RADIUS * 2;
		this.textElapsed._x = this.mpvClass._x - this.textElapsed.textWidth - this.BOX_RADIUS * 2 - this.pad;
		this.textElapsed._y = this.floor(this.mpHeight / 2 - this.textElapsed.textHeight / 2 - 2);
		this.textCaption._x = this.mpBttn._x + this.mpBttn._width + this.pad;
		this.textCaption._y = this.textElapsed._y;
		this.textCaption._width = this.textElapsed._x - this.textCaption._x - this.pad;
		this.textCaption._height = this._oC.mediaPlayerTextSize + 8;
		this.mpPlayBttn.onRelease = mx.utils.Delegate.create(this,this.playButtonRelease);
		this.mpPauseBttn.onRelease = mx.utils.Delegate.create(this,this.pauseButtonRelease);
		this.setBttnState("pause");
	}";
	(this._oC.__width * (this._oC.mediaPlayerScale / 100) - this.pad * 2).pauseButtonRelease = "function(	)
	{
		this.isForcedStop = true;
		this.pauseMedia();
	}";
this._oC.displayMode == "Auto"&&this.mpReq.video)
		{
			this._oC.toggleDisplayMode();

		} // end if
		if(	(this._oC.__width * (this._oC.mediaPlayerScale / 100) - this.pad * 2).playButtonRelease = "function(	)
	{
		this.isForcedStop = false;
		this.startMedia();
	}";
	(this._oC.__width * (this._oC.mediaPlayerScale / 100) - this.pad * 2).drawPreview = "function(	)
	{
		this.drawVideoAssets();
		this.mpBuff._width = this.scrubberW * 0.7500;
		this.mpProg._width = this.scrubberW * 0.2500;
		this.nullFormat();
		this.updatePopTime("0:00");
		this.posControl();
		this.drawPop();
		this.posPopText();
		this.initVolume();
		this.arrangeInFinalPos();
		this.visible(true);
	}";
s == "play")
		{
			this.mpPlayBttn._visible = false;
			this.mpPlayBttn.enabled = false;
			this.mpPauseBttn._visible = true;
			this.mpPauseBttn.enabled = true;
			this.bttnState = this._oC.textStrings.6;

		} // end if
		else
		{
			if(s == "pause")
			{
				this.mpPlayBttn._visible = true;
				this.mpPlayBttn.enabled = true;
				this.mpPauseBttn._visible = false;
				this.mpPauseBttn.enabled = false;
				this.bttnState = this._oC.textStrings.7;

			} // end if

		}
		if(this.isAudioPlayerInit)
		{
			this.setCaptionText();

		} // end if
			if(	(this._oC.__width * (this._oC.mediaPlayerScale / 100) - this.pad * 2).setBttnState = "function(	s)
	{
	}";
!this.mpReq.video||this.mpReq.audio)
		{
			if(!this.isInit)
			{
				this.drawUI();

			} // end if
				if(this.showPlayer)
			{
				this.setOpenTargetY();
				this.setClosedTargetY();
				if(!this.isCaptionAndVolumeSetup)
				{
					this.initCaption();
					this.initVolume();
					this.isCaptionAndVolumeSetup = true;

				} // end if
			
			} // end if
				if(this.mpReq.video)
			{
				if(!this.isVideoPlayerInit)
				{
					this.nullFormat();
					this.destroyAudio();
					this.initVideoPlayer();

				} // end if
				else
				{
					this.sizeVideoAssets();

				}
			
			} // end if
			else
			{
					if(this.mpReq.audio)
				{
					if(!this.isAudioPlayerInit)
					{
						this.nullFormat();
						this.destroyVideo();
						this.initAudioPlayer();

					} // end if
				
				} // end if

			}
				if(this.showPlayer)
			{
				if(this._oC.mediaPlayerAppearance == "Always Visible")
				{
					this.tweenInPlayer();

				} // end if
							this.visible(true);

			} // end if
		
		} // end if
		else
		{
			this.onMouseMove = null;

		}
		if(	s.initMediaPlayer = "function(	)
	{
	}";
this.mpReq.audio)
		{
			this.textCaption._visible = true;

		} // end if
		else
		{
			if(this.mpReq.video)
			{
				this.textCaption._visible = false;

			} // end if

		}
		if(	s.initCaption = "function(	)
	{
	}";
	s.arrangeInitPos = "function(	)
	{
		this.arrangeCenterX();
		this.arrangeOutOfView();
	}";
	s.arrangeCenterX = "function(	)
	{
		this.mp._x = this._oC.__width / 2 - this.mpBG._width / 2;
	}";
this.mpPos == "Bottom")
		{
			this.mp._y = this._oC.__height;

		} // end if
		else
		{
			if(this.mpPos == "Top")
			{
				this.mp._y = -this.mpHeight;

			} // end if

		}
		if(	s.arrangeOutOfView = "function(	)
	{
		this.isInView = false;
	}";
!this.mpReq.audio||!this.mpReq.video||this.isLive)
		{
			this.setOpenTargetY();
			this.stopAllTweens();
			this.mp._y = this.openTargetY;
			this.isInView = true;

		} // end if
		if(	s.arrangeInFinalPos = "function(	)
	{
	}";
	s.initVolume = "function(	)
	{
		this.mpvClass.setSize(null,this.scrubberH);
		this.mpvClass._y = this.floor(this.mpHeight / 2 - this.mpvClass._height / 2);
		this.mpvClass.setDefaultAmt();
		this.mpvClass.visible(true);
	}";
	s.setPrefVolume = "function(	n)
	{
		this.prefVolume = "n";
	}";
	n.getPrefVolume = "function(	)
	{
	}";
this.isVideoPlayerInit)
		{
			this._oC.vidObjectLoaded.adjustVolume(n);

		} // end if
		else
		{
			if(this.isAudioPlayerInit)
			{
				this.setAudioVolume();

			} // end if

		}
		if(	n.adjustVolume = "function(	n)
	{
	}";
this.showPlayer)
		{
			this.getCaptionText();
			this.setCaptionText();

		} // end if
		if(this._oC.audioAutoStart == "On")
		{
			this.initAudioPlayback();
			this.startMedia();

		} // end if
		if(	n.initAudioPlayer = "function(	)
	{
	}";
!this.isAudioPlayerInit)
		{
			this.isAudioPlayerInit = true;
			this.initAudioClip();

		} // end if
		if(	n.initAudioPlayback = "function(	)
	{
	}";
	n.initAudioClip = "		this.a_sound.onID3 = "function(		)
		{
			self.setID3("&quot;" + this.id3.songname + "&quot;" + " by " + this.id3.artist);
		}";
		this.a_sound.onSoundComplete = mx.utils.Delegate.create(this,this.audioComplete);
		this.a_sound.loadSound(self.getAudioTrack(),true);
	}";
	n.setAudioVolume = "function(	)
	{
		this.a_sound.setVolume(this.getPrefVolume());
	}";
this.mpReq.audio&&!this.isAudioIgnored)
		{
			this.capt = this._oC.dataClass.getCurrentAlbumProp("audiocaption");

		} // end if
		if(	n.getCaptionText = "function(	)
	{
	}";
!(this.capt == undefined)||this.capt.length > 0)
		{
			this.textCaption.htmlText = this.bttnState + ": " + this.capt;
			this.textCaption.setTextFormat(this.t_fmt);

		} // end if
		if(	n.setCaptionText = "function(	)
	{
	}";
!(this.capt == undefined)||this.capt.length == 0)
		{
			this.capt = "s";
			this.setCaptionText();

		} // end if
		if(	n.setID3 = "function(	s)
	{
	}";
	s.nullFormat = "function(	)
	{
		this.clearElapsedText();
		this.clearCaptionText();
		this.isControlSetup = false;
		this.audioStartPos = 0;
	}";
	s.clearElapsedText = "function(	)
	{
		this.textElapsed.text = "0:00";
		this.textElapsed._visible = true;
	}";
this._oC.audioAutoStart == "Off")
		{
			this.textCaption.text = this._oC.textStrings.8;

		} // end if
		else
		{
			this.textCaption.text = "";

		}
		if(	s.clearCaptionText = "function(	)
	{
	}";
!(this.getAudioTrack() == undefined)||this.getAudioTrack().length > 0)
		{
			this.isAudioEnabled = true;

		} // end if
		else
		{
			this.isAudioEnabled = false;

		}
		if(	s.getAudioEnabled = "function(	)
	{
		this.getAudioTrack();
	}";
	this.getAudioTrack().getAudioTrack = "function(	)
	{
	}";
this._oC.audioLoop == "Off")
		{
			this.stopMedia();

		} // end if
		else
		{
			this.startMedia();

		}
		if(	this.getAudioTrack().audioComplete = "function(	)
	{
		this.audioStartPos = 0;
		this.isAudioPlaying = false;
	}";
	this.getAudioTrack().startPosCheck = "function(	)
	{
		this.audioInt = setInterval(this,setAudioElapsed,1000);
	}";
	this.getAudioTrack().stopPosCheck = "function(	)
	{
		clearInterval(this.audioInt);
	}";
_local2 < 10)
		{
			_local2.toString();

		} // end if
		if(!isNaN(_local3)||!isNaN(_local2))
		{
			this.updateTime(_local3 + ":" + _local2.toString());

		} // end if
		if(	this.getAudioTrack().setAudioElapsed = "function(	)
	{
		Math.round(this.a_sound.position / 1000);
		var _local3 = this.floor(Math.round(this.a_sound.position / 1000) / 60);
		var _local2 = Math.round(Math.round(this.a_sound.position / 1000) - _local3 * 60);
		_local2.toString();
	}";
this.isAudioPlayerInit)
		{
			delete this.a_sound			destroyAudio;
			this.stopPosCheck();
			this.audioStartPos = 0;
			this.isAudioPlayerInit = false;

		} // end if
		if(	MovieClip._local2 = "function(	)
	{
	}";
this.showPlayer)
		{
			this.updateDuration();
			this.drawVideoAssets();
			this.mpScrubber._visible = true;
			this.isVideoPlayerInit = true;

		} // end if
		if(	_local2.initVideoPlayer = "function(	)
	{
	}";
!this.isVideoPlayerInit)
		{
			this.drawScrubberBG();
			this.drawBuffered();
			this.drawProgress();
			this.drawControl();

		} // end if
		if(	_local2.drawVideoAssets = "function(	)
	{
		this.sizeVideoAssets();
	}";
	_local2.sizeVideoAssets = "function(	)
	{
		this.calcScrubberW();
		this.sizeScrubberBG();
		this.sizeBuffered();
		this.sizeProgress();
		this.drawScrubberMask();
		this.posScrubber();
		this.calcDragDimensions();
	}";
	_local2.calcScrubberH = "function(	)
	{
		this.scrubberH = this.floor(this.mpHeight * 0.3500);
	}";
	_local2.calcScrubberW = "function(	)
	{
		this.scrubberW = this.textElapsed._x - this.mpBttn._x + this.mpBttn._width + this.pad * 2;
	}";
	_local2.drawScrubberBG = "function(	)
	{
		this.scrubBG = this.mpScrubberUI.attachMovie("squareSymbol","sBG_mc",0);
		this.scrubBG._alpha = this._oC.mediaPlayerBackgroundAlpha;
	}";
	_local2.sizeScrubberBG = "function(	)
	{
		this.scrubBG._width = this.scrubberW;
		this.scrubBG._height = this.scrubberH;
	}";
	_local2.drawBuffered = "function(	)
	{
		this.mpBuff = this.mpScrubberUI.attachMovie("squareSymbol","sB_mc",10);
		new Color(this.mpBuff);
		new Color(this.mpBuff).setRGB(this._oC.mediaPlayerBufferColor);
	}";
	new Color(this.mpBuff).sizeBuffered = "function(	)
	{
		this.mpBuff._height = this.scrubberH;
		this.mpBuff._width = 0;
	}";
	new Color(this.mpBuff).drawProgress = "function(	)
	{
		this.mpProg = this.mpScrubberUI.attachMovie("squareSymbol","sP_mc",20);
		new Color(this.mpProg);
		new Color(this.mpProg).setRGB(this._oC.mediaPlayerProgressColor);
		this.mpProg.useHandCursor = false;
		this.mpProg.onRelease = mx.utils.Delegate.create(this,this.onProgressRelease);
	}";
	new Color(this.mpProg).sizeProgress = "function(	)
	{
		this.mpProg._height = this.scrubberH;
		this.mpProg._width = 0;
	}";
!this.isLive)
		{
			this.showControl(false);

		} // end if
		if(	new Color(this.mpProg).drawControl = "function(	)
	{
		this.mpControl = this.mpScrubberUI.attachMovie("circleSymbol","sC_mc",30);
		this.mpControl._height = this.scrubberH;
		this.mpControl._width = this.scrubberH;
		this.mpControlHalfW = this.mpControl._width / 2;
		new Color(this.mpControl);
		new Color(this.mpControl).setRGB(this._oC.mediaPlayerControlColor);
	}";
	new Color(this.mpControl).drawScrubberMask = "function(	)
	{
		this.mpScrubber.createEmptyMovieClip("mcMask_mc",10);
		net.slideshowpro.slideshowpro.draw.DrawRadiusBox();
		net.slideshowpro.slideshowpro.draw.DrawRadiusBox().drawBox(this.mpScrubber.createEmptyMovieClip("mcMask_mc",10),new Array(0xFF0000),100,0,0,this.scrubberW,this.scrubberH,this.BOX_RADIUS);
		this.mpScrubberUI.setMask(this.mpScrubber.createEmptyMovieClip("mcMask_mc",10));
	}";
this.hasPreview)
		{
			this.showControl(false);

		} // end if
		if(	this.mpScrubber.createEmptyMovieClip("mcMask_mc",10).resetControl = "function(	)
	{
		this.isVideoComplete = false;
		this.isControlSetup = false;
		this.killControlInt();
		this.mpControl._x = this.mpControlHalfW;
		this.mpProg._width = 0;
		this.mpBuff._width = 0;
	}";
!b)
		{
			this.mpControl._alpha = 0;

		} // end if
		else
		{
			mx.transitions.Tween(this.mpControl,_alpha,this._oC.strongTween,this.mpControl._alpha,100,1,true);

		}
				if(	this.mpScrubber.createEmptyMovieClip("mcMask_mc",10).showControl = "function(	b)
	{
	}";
	b.setupControlEvents = "function(	)
	{
		this.mpControl.onReleaseOutside = mx.utils.Delegate.create(this,this.onControlRelease);
		this.mpControl.onRelease = mx.utils.Delegate.create(this,this.onControlRelease);
		this.mpControl.onMouseUp = mx.utils.Delegate.create(this,this.onControlRelease);
		this.mpControl.onPress = mx.utils.Delegate.create(this,this.onControlPress);
		this.showControl(true);
		this.isControlSetup = true;
	}";
	b.onControlPress = "function(	)
	{
		this.isControlPressed = true;
		this._oC.vidObjectLoaded.pausePlayback(true);
		this.killControlInt();
		this.drawPop();
		this.setupControlDrag();
	}";
	b.onControlDrag = "function(	)
	{
		this.calcMaxDragPoint();
		this.posControl();
		this.posPop();
		this.posPopText();
		this.seekSecondsToControl();
		updateAfterEvent();
	}";
this.isControlPressed)
		{
			this.isControlPressed = false;
			this.killControlDrag();
			this.killPop();
			if(!this.isVideoComplete)
			{
				if(!this.isForcedStop)
				{
					this._oC.vidObjectLoaded.pausePlayback(false);

				} // end if
							this.seekSecondsToControl();
				this.setupControlInt();

			} // end if
		
		} // end if
			if(	b.onControlRelease = "function(	)
	{
	}";
	b.onProgressRelease = "function(	)
	{
		this.seekSecondsToProgressRelease();
	}";
	b.setupControlDrag = "function(	)
	{
		this.mpControl.onMouseMove = mx.utils.Delegate.create(this,this.onControlDrag);
	}";
	b.killControlDrag = "function(	)
	{
		this.mpControl.onMouseUp = null;
		this.mpControl.onMouseMove = null;
	}";
this.isControlPressed)
		{
			var _local3 = this.mpScrubber._xmouse;
			this.minDragPos + this.mpControlHalfW;
			this.maxDragPos - this.mpControlHalfW;
			if(_local3 > (this.maxDragPos - this.mpControlHalfW))
			{
				this.maxDragPos - this.mpControlHalfW;

			} // end if
			else
			{
				if(_local3 < (this.minDragPos + this.mpControlHalfW))
				{
					this.minDragPos + this.mpControlHalfW;

				} // end if
				else
				{
					_local3;

				}

			}
					this.setProgressWidth(_local3);

		} // end if
		else
		{
			this.mpProg._width;
			if(this.mpProg._width < this.mpControlHalfW)
			{
				this.mpControlHalfW;

			} // end if
			else
			{
				if(this.mpProg._width > (this.scrubberW - this.mpControlHalfW))
				{
					this.scrubberW - this.mpControlHalfW;

				} // end if
				else
				{
					this.mpProg._width;

				}

			}

		}
		if(this.mpControl._visible == false)
		{
			this.showControl(true);

		} // end if
			if(	b.posControl = "function(	)
	{
		undefined;
		this.mpControl._x = this.mpProg._width;
		this.mpControl._y = this.scrubberH / 2;
	}";
!this.isControlPressed||this.isLive)
		{
			if(this.mpPos == "Bottom")
			{
				this.mpPopElapsed = this.mpPop.attachMovie("ThumbnailPreviewBottom","pop_mc",50);

			} // end if
			else
			{
				if(this.mpPos == "Top")
				{
					this.mpPopElapsed = this.mpPop.attachMovie("ThumbnailPreviewTop","pop_mc",50);

				} // end if

			}
					this.mpPopElapsed.dim_mc._visible = false;
			new Color(this.mpPopElapsed);
			new Color(this.mpPopElapsed).setRGB(this._oC.mediaPlayerElapsedBackgroundColor);
			this.tweenPop();
			this.posPop();

		} // end if
			if(	this.mpProg._width.drawPop = "function(	)
	{
	}";
!this.isControlPressed||this.isLive)
		{
			var _local6 = 10;
			10;
			this.textPop.textWidth + this.pad * 2;
			this.textPop.textHeight + this.pad * 2;
			this.mpPopElapsed.tnFrame.tnBox;
			if(!this.isLive)
			{
				new Object();
				new Object().onMotionFinished = mx.utils.Delegate.create(this,this.posPopText);
				var _local8 = mx.transitions.Tween(this.mpPopElapsed.tnFrame.tnBox,_width,this._oC.strongTween,10,this.textPop.textWidth + this.pad * 2,0.1500,true);
				mx.transitions.Tween(this.mpPopElapsed.tnFrame.tnBox,_height,this._oC.strongTween,_local6,this.textPop.textHeight + this.pad * 2,0.1500,true);
				_local8.addListener(new Object());

			} // end if
			else
			{
				this.mpPopElapsed.tnFrame.tnBox._width = this.textPop.textWidth + this.pad * 2;
				this.mpPopElapsed.tnFrame.tnBox._height = this.textPop.textHeight + this.pad * 2;
				this.posPopText();

			}
		
		} // end if
			if(	new Color(this.mpPopElapsed).tweenPop = "function(	)
	{
	}";
!this.isControlPressed||this.isLive)
		{
			var _local4 = (this.textPop.textWidth / 2);
			var _local3 = (this.textPop.textHeight / 2);
			this.mpPopElapsed._x - 2 - _local4;
			if((this.mpPopElapsed._x - 2 - _local4) < 0)
			{
				(this.mpPopElapsed._x - 2 - _local4) * -1;

			} // end if
			if(			this.textPop._x = (this.mpPopElapsed._x - 2 - _local4) * -1;
this.mpPos == "Bottom")
			{
				this.textPop._y = this.mpPopElapsed._y - this.mpPopElapsed.tnFrame.tnBox._height / 2 + _local3 + 3;

			} // end if
			else
			{
				if(this.mpPos == "Top")
				{
					this.textPop._y = this.mpPopElapsed._y + this.mpPopElapsed.tnFrame.tnBox._height / 2 - _local3 - 3;

				} // end if

			}
					this.popTextVisible(true);

		} // end if
		if(	this.mpPopElapsed.tnFrame.tnBox.posPopText = "function(	)
	{
	}";
	((this.mpPopElapsed._x - 2 - _local4) * -1).updatePopTime = "function(	s)
	{
		this.textPop.text = "s";
	}";
this.floor(60 %s) < 10)
		{
			this.floor(60 %s).toString();

		} // end if
		if(!isNaN(this.floor(this.vidDuration / 60))||!isNaN(this.floor(60 %s)))
		{
			this.updateTime(this.floor(this.vidDuration / 60) + ":" + this.floor(60 %s).toString());

		} // end if
		if(	s.updateDuration = "function(	)
	{
		this.floor(this.vidDuration / 60);
		this.floor(60 %s);
		this.floor(60 %s).toString();
	}";
	this.floor(60 %s).popTextVisible = "function(	b)
	{
		this.textPop._visible = "b";
	}";
!(this.mpControl._x < 0))
		{

		} // end if
		else
		{

		}
		if(this.mpPos == "Bottom")
		{
			this.mpPopElapsed._y = this.mpScrubber._y - 5;

		} // end if
		else
		{
			if(this.mpPos == "Top")
			{
				this.mpPopElapsed._y = this.mpScrubber._y + this.scrubberH + 5;

			} // end if

		}
		if(	posPop.this.mpPopElapsed = "function(	)
	{
		this.mpControl._x;
		this.mpScrubber._x + this.mpControl._x;
		_x.(this.mpScrubber._x + this.mpControl._x) = this.mpScrubber._x;
	}";
	this.mpControl._x.killPop = "function(	)
	{
		this.mpPopElapsed.removeMovieClip();
		this.popTextVisible(false);
	}";
this.mpControl._x == this.mpControlHalfW)
		{
			0;

		} // end if
		else
		{
			if(this.mpControl._x == (this.scrubberW - this.mpControlHalfW))
			{
				this.vidDuration;

			} // end if
			else
			{
				this.mpControl._x / (this.scrubberW / this.vidDuration);

			}

		}
			if(	this.mpControl._x.seekSecondsToControl = "function(	)
	{
		var _local2 = undefined;
		this.seekSeconds(this.mpControl._x / (this.scrubberW / this.vidDuration));
	}";
	(this.mpControl._x / (this.scrubberW / this.vidDuration)).seekSecondsToProgressRelease = "function(	)
	{
		this.mpScrubber._xmouse / (this.scrubberW / this.vidDuration);
		this.seekSeconds(this.mpScrubber._xmouse / (this.scrubberW / this.vidDuration));
	}";
	(this.mpScrubber._xmouse / (this.scrubberW / this.vidDuration)).seekSeconds = "function(	sec)
	{
		this._oC.vidObjectLoaded.videoSeek(sec);
	}";
	sec.posScrubber = "function(	)
	{
		this.mpScrubber._x = this.mpBttn._x + this.mpBttn._width + this.pad;
		this.mpScrubber._y = Math.round(this.mpHeight / 2 - this.scrubberH / 2);
	}";
	sec.calcDragDimensions = "function(	)
	{
		this.calcMinDragPoint();
		this.calcMaxDragPoint();
	}";
	sec.calcMinDragPoint = "function(	)
	{
		this.minDragPos = 0;
	}";
	sec.calcMaxDragPoint = "function(	)
	{
		this.maxDragPos = this.mpBuff._width;
	}";
this.showPlayer)
		{
!isNaN(n)||			if(!(this.mpBuff._width == this.scrubberW))
			{
				this.mpBuff._width = n * this.scrubberW;

			} // end if
		
		} // end if
		if(	sec.setBufferWidth = "function(	n)
	{
	}";
!isNaN(w))
		{
			this.mpProg._width = "w";

		} // end if
		if(	n.setProgressWidth = "function(	w)
	{
	}";
!this.isControlPressed)
		{
			(this.mpScrubber._x + this.mpControl._x) / this.vidDuration;
			this.setProgressWidth(((this.mpScrubber._x + this.mpControl._x) / this.vidDuration) * this.scrubberW);

		} // end if
			if(	w.updateProgressBar = "function(	n)
	{
	}";
this.mpScrubber._x + this.mpControl._x)
		{
			(this.mpScrubber._x + this.mpControl._x).time;
			this.floor((this.mpScrubber._x + this.mpControl._x).time / 60);
			this.floor(60 %s);
			if(this.floor(60 %s) < 10)
			{
				this.floor(60 %s);

			} // end if
				if(			(this.mpScrubber._x + this.mpControl._x).bytesLoaded / (this.mpScrubber._x + this.mpControl._x).bytesTotal;
			this.updatePopTime(this.floor((this.mpScrubber._x + this.mpControl._x).time / 60) + ":" + this.floor(60 %s));
			this.updateProgressBar((this.mpScrubber._x + this.mpControl._x).time);
			this.setBufferWidth((this.mpScrubber._x + this.mpControl._x).bytesLoaded / (this.mpScrubber._x + this.mpControl._x).bytesTotal);
!this.isControlSetup)
			{
				if(this.showPlayer)
				{
					this.setupControlEvents();
					this.setupControlInt();

				} // end if
			
			} // end if
		
		} // end if
		if(	((this.mpScrubber._x + this.mpControl._x) / this.vidDuration).autoUpdatePlayer = "function(	o)
	{
	}";
	this.floor(60 %s).setupControlInt = "function(	)
	{
		this._controlINT = setInterval(this,posControl,50);
	}";
	this.floor(60 %s).killControlInt = "function(	)
	{
		clearInterval(this._controlINT);
	}";
	this.floor(60 %s).destroyVideo = "function(	)
	{
		this.resetControl();
		this.mpScrubber._visible = false;
		this.isVideoPlayerInit = false;
	}";
	this.floor(60 %s).onVideoEnd = "function(	)
	{
		this.stopMedia();
		this.autoDisplayModeOverride();
	}";
this.mpReq.audio)
		{
			this.a_sound.stop();
			this.stopPosCheck();
			this.isAudioPlaying = false;

		} // end if
		if(	this.floor(60 %s).stopMedia = "function(	)
	{
		this.setBttnState("pause");
	}";
this.mpReq.video)
		{
			this._oC.vidObjectLoaded.pausePlayback(true);
			this.stopMedia();

		} // end if
		if(this.mpReq.audio)
		{
			this.stopMedia();
			this.audioStartPos = this.a_sound.position / 1000;

		} // end if
		if(	this.floor(60 %s).pauseMedia = "function(	)
	{
	}";
this.mpReq.video)
		{
			this._oC.vidObjectLoaded.pausePlayback(false);

		} // end if
					if(this.mpReq.audio)
		{
			if(this.getAudioEnabled())
			{
				if(!this.isAudioPlaying)
				{
					if(!this.isAudioPlayerInit)
					{
						this.initAudioPlayback();

					} // end if
									this.playAudio();

				} // end if
			
			} // end if
		
		} // end if
		if(	this.floor(60 %s).startMedia = "function(	)
	{
	}";
	this.floor(60 %s).playAudio = "function(	)
	{
		this.isAudioPlaying = true;
		this.setAudioVolume();
		this.a_sound.start(this.audioStartPos,0);
		this.startPosCheck();
		this.setBttnState("play");
	}";
	this.floor(60 %s).updateTime = "function(	s)
	{
		this.textElapsed.text = "s";
		this.textElapsed._visible = true;
	}";
this._oC._initDisplayMode == "Auto"&&this._oC.displayMode == "Manual")
		{
			this.onControlRelease();
			this.isVideoComplete = true;
			this._oC.toggleDisplayMode();

		} // end if
		if(	s.autoDisplayModeOverride = "function(	)
	{
	}";
this.isTweenOutStarted)
		{
			this.stopTween(this.tweenOut);
			this.tweenOut.removeListener(this.checkOut);

		} // end if
		if(!this.isTweenInStarted)
		{
			this.tweenIn = mx.transitions.Tween(this.mp,_y,mx.transitions.easing.Regular.easeOut,this.mp._y,this.openTargetY,0.5000,true);
			this.checkIn = new Object();
			this.checkIn.onMotionStarted = mx.utils.Delegate.create(this,this.tweenInStart);
			this.checkIn.onMotionStopped = mx.utils.Delegate.create(this,this.tweenInStopped);
			this.tweenIn.addListener(this.checkIn);
			this.tweenIn.start();

		} // end if
		if(	s.tweenInPlayer = "function(	)
	{
	}";
this.isTweenInStarted)
		{
			this.stopTween(this.tweenIn);
			this.tweenIn.removeListener(this.checkIn);

		} // end if
		if(!this.isTweenOutStarted)
		{
			this.tweenOut = mx.transitions.Tween(this.mp,_y,mx.transitions.easing.Regular.easeOut,this.mp._y,this.closedTargetY,1,true);
			this.checkOut = new Object();
			this.checkOut.onMotionStarted = mx.utils.Delegate.create(this,this.tweenOutStart);
			this.checkOut.onMotionStopped = mx.utils.Delegate.create(this,this.tweenOutStopped);
			this.tweenOut.addListener(this.checkOut);
			this.tweenOut.start();

		} // end if
		if(this.isControlPressed)
		{
			this.onControlRelease();

		} // end if
				if(	s.tweenOutPlayer = "function(	)
	{
	}";
	s.tweenInStart = "function(	)
	{
		this.isInView = true;
		this.isTweenInStarted = true;
	}";
	s.tweenInStopped = "function(	)
	{
		this.isTweenInStarted = false;
		this.tweenIn.removeListener(this.checkIn);
	}";
	s.tweenOutStart = "function(	)
	{
		this.isInView = false;
		this.isTweenOutStarted = true;
	}";
	s.tweenOutStopped = "function(	)
	{
		this.isTweenOutStarted = false;
		this.tweenOut.removeListener(this.checkOut);
	}";
	s.stopTween = "function(	o)
	{
		o.stop();
	}";
	s.stopAllTweens = "function(	)
	{
		this.stopTween(this.tweenIn);
		this.stopTween(this.tweenOut);
	}";
this.mpPos == "Bottom")
		{
			var _local2 = this._dim.caBotM;
			if(this._oC.navAppearance == "Visible on Rollover")
			{
				if(this._oC.navPosition == "Bottom")
				{
					this._dim.navHeight;

				} // end if
			
			} // end if
					this.openTargetY = this._oC.__height - this._dim.navHeight - this.mpHeight - this.pad;

		} // end if
		else
		{
					if(this.mpPos == "Top")
			{
				var _local2 = this._dim.caTopM;
				if(this._oC.navAppearance == "Visible on Rollover")
				{
					if(this.mpPos == this._oC.navPosition)
					{
						this._dim.navHeight;

					} // end if
				
				} // end if
							this.openTargetY = this._dim.navHeight + this.pad;

			} // end if

		}
		if(	s.setOpenTargetY = "function(	)
	{
		undefined;
	}";
this.mpPos == "Bottom")
		{
			this.closedTargetY = this._oC.__height;

		} // end if
		else
		{
			if(this.mpPos == "Top")
			{
				this.closedTargetY = -this.mpHeight;

			} // end if

		}
		if(	this._dim.navHeight.setClosedTargetY = "function(	)
	{
	}";
	this._dim.navHeight.visible = "function(	b)
	{
		this.mp._visible = "b";
	}";
!this.showPlayer||force)
		{
			this.tweenOutPlayer();

		} // end if
					if(	b.removePlayer = "function(	force)
	{
	}";
this._oC.mediaPlayerAppearance == "Visible on Rollover")
		{
			if(this.isInit)
			{
				if(this.mpReq)
				{
!this.mpReq.video||					if(this.mpReq.audio)
					{
						this.tweenInPlayer();

					} // end if
				
				} // end if
			
			} // end if
		
		} // end if
					if(	force.afterTimerStart = "function(	)
	{
	}";
this._oC.mediaPlayerAppearance == "Visible on Rollover")
		{
			if(this.isInit)
			{
				if(this.mpReq)
				{
!this.mpReq.video||					if(this.mpReq.audio)
					{
						this.tweenOutPlayer();

					} // end if
				
				} // end if
			
			} // end if
		
		} // end if
	force.afterTimerEnd = "function(	)
	{
	}";
	force.halt = "function(	)
	{
		this.stopPosCheck();
		this.killControlInt();
	}";
	force.audioStartPos = 0;
	force.BOX_RADIUS = 4;
	force.isAudioEnabled = false;
	force.isAudioPlayerInit = false;
	force.isAudioPlaying = false;
	force.isTweenInStarted = false;
	force.isTweenOutStarted = false;
	force.isAudioIgnored = false;
	force.isVideoPlayerInit = false;
	force.isVideoComplete = false;
	force.isVideoPlaying = false;
	force.isControlPressed = false;
	force.isInit = false;
	force.isPauseIntExpired = false;
	force.isControlSetup = false;
	force.isInView = false;
	force.hasPreview = false;
	force.isCaptionAndVolumeSetup = false;
	force.showPlayer = false;
	force.isLive = false;
	force.floor = Math.floor;

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.MediaPlayer.prototype,null,1);
