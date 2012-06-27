
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
		if(!_global.net.slideshowpro.slideshowpro.observers.VideoObject)
{
	net.slideshowpro.slideshowpro.observers.VideoObject = "function(	)
	{
		super.undefined();
	}";
	extends();
	function(	)
	{
		super.undefined();
	}.prototype;
 == "Off")
		{
			_local1.vidSmooth = false;

		} // end if
		if(	createVideo.net.slideshowpro.slideshowpro.observers.VideoObject = "function(	target_mc,oC,buffer,smooth,vidURL,vidPreviewURL)
	{
		caseOp();
		var _local1 = vidPreviewURL.attachMovie("VideoObjectSymbol","vObj_mc",0);
		_local1._oC = "oC";
		_local1.vidBuff = "";
		_local1.vidPreviewURL = "smooth";
		_local1.vidURL = "";
		_local1.init();
	}";
	oC.init = "function(	)
	{
		this.nc = new NetConnection();
		this.nc.connect(null);
		this.ns = new NetStream(this.nc);
		this.ns.onCuePoint = mx.utils.Delegate.create(this,this.nsCuePoint);
		this.ns.onMetaData = mx.utils.Delegate.create(this,this.nsMetaData);
		this.ns.setBufferTime(this.vidBuff);
		this.vidObj.attachVideo(this.ns);
		this.vidObj.smoothing = this.vidSmooth;
		this.vidObj._visible = false;
		this.videoAudioClip = this.createEmptyMovieClip("videoAudio",100);
		this.videoAudioClip.attachAudio(this.ns);
		this.videoVolume = new Sound(this.videoAudioClip);
		this.adjustVolume(this._oC.mpClass.getPrefVolume());
		this.initVideo();
	}";
!(this._oC.videoAutoStart == "On")||this.isComplete)
		{
			this.playVideo();

		} // end if
		else
		{
			this.p_mcl = new MovieClipLoader();
			this.pL = new Object();
			this.loadPreview();

		}
		if(	oC.initVideo = "function(	)
	{
		this.isComplete = false;
	}";
	oC.restartVideo = "function(	)
	{
		this.videoSeek(0);
		this.initVideo();
	}";
this.isStarting)
		{
			this.ns.play(this.vidURL);
			this.ns.onStatus = mx.utils.Delegate.create(this,this.nsStatus);

		} // end if
			if(	oC.playVideo = "function(	)
	{
		trace("playVideo " + this.isStarting);
		this.pauseNetStream(false);
	}";
!(o == null))
		{
			o;
			if(o == "width")
			{
				this.vidSize.width = o.o;

			} // end if
			if(o == "height")
			{
				this.vidSize.height = o.o;

			} // end if
		while(		} // end while
				if(	oC.nsMetaData = "function(	o)
	{
		this._oC.dispatchEventData("onVideoMetaData",o);
		this.vidSize = new Object();
		enumerate2();
		this.vidDuration = o.duration;
		this.setupProgressInt();
		this.resizeVideo();
		this.initComplete();
	}";
	o.nsCuePoint = "function(	o)
	{
		this._oC.dispatchEventData("onVideoCuePoint",o);
	}";
!(o == null))
		{
			var _local3 = o;
			if(!(o._local3 == "status"))
			{
				if(o._local3 == "NetStream.Play.Start")
				{
					this.onNetStreamStart();

				} // end if
				else
				{
					if(o._local3 == "NetStream.Play.Stop")
					{
						this.onNetStreamStop();

					} // end if
					else
					{
						if(o._local3 == "NetStream.Buffer.Empty")
						{
							this.onBuffer("empty");

						} // end if
						else
						{
							if(o._local3 == "NetStream.Buffer.Full")
							{
								this.onBuffer("full");

							} // end if

						}

					}

				}
			
			} // end if
		while(			this._oC.dispatchEventData("onVideoNetStream",o._local3);
		} // end while
		if(	o.nsStatus = "function(	o)
	{
		enumerate2();
	}";
s == "empty")
		{
			this._oC.dispatchEventData("onVideoBufferEmpty");

		} // end if
		else
		{
			if(s == "full")
			{
				this._oC.dispatchEventData("onVideoBufferFull");

			} // end if

		}
		if(	o.onBuffer = "function(	s)
	{
	}";
!b)
		{
			this._oC.dispatchEventData("onVideoResume");

		} // end if
		else
		{
			this._oC.dispatchEventData("onVideoPause");

		}
		if(	s.pauseNetStream = "function(	b)
	{
		this.ns.pause(b);
	}";
	b.onNetStreamStart = "function(	)
	{
		this.isStarting = false;
		this._oC.dispatchEventData("onVideoStart");
	}";
this.ns.time > 0&&!(this.ns.time < (this.vidDuration - 0.5000))||!this.isComplete)
		{
			this.isComplete = true;
			this._oC.dispatchEventData("onVideoEnd");

		} // end if
		if(	b.onNetStreamStop = "function(	)
	{
	}";
	MovieClip.function(	)
	{
		super.undefined();
	} = "function(	)
	{
		delete this.pL		initComplete;
		delete this.p_mcl		b;
		this._oC.afterImageLoad();
	}";
!(this.vidPreviewURL == undefined)||this.vidPreviewURL.length > 0)
		{
			this.createEmptyMovieClip("p_mc",200);
			this.pL.onLoadInit = mx.utils.Delegate.create(this,this.initComplete);
			this.p_mcl.addListener(this.pL);
			this.p_mcl.loadClip(this.vidPreviewURL,this.p_mc);
			var _local2 = true;

		} // end if
		else
		{
			this.initComplete();

		}
			if(	b.loadPreview = "function(	)
	{
		false;
		this._oC.dispatchEventData("onVideoPreviewLoad",_local2);
		this.pauseNetStream(true);
	}";
	_local2.removePreview = "function(	)
	{
		this.p_mc.removeMovieClip();
		this._oC.dispatchEventData("onVideoPreviewRemove");
	}";
	_local2.resizeVideo = "function(	)
	{
		this.vidObj._width = this.vidSize.width;
		this.vidObj._height = this.vidSize.height;
		this.vidObj._visible = true;
	}";
!b)
		{
			if(this.isComplete)
			{
				this.restartVideo();

			} // end if
			else
			{
				if(this.isStarting)
				{
					this.playVideo();

				} // end if

			}
					this.setupProgressInt();

		} // end if
	_local2.pausePlayback = "function(	b)
	{
		trace("pausePlayback");
		this.removePreview();
		this.pauseNetStream(b);
	}";
	b.videoSeek = "function(	sec)
	{
		this.ns.seek(sec);
	}";
	sec.adjustVolume = "function(	n)
	{
		this.videoVolume.setVolume(n);
	}";
	n.setupProgressInt = "function(	)
	{
		this.clearProgressInt();
		this._timeINT = setInterval(this,checkProgress,50);
	}";
	n.stopAudio = "function(	)
	{
		this.videoVolume.stop();
	}";
	n.clearProgressInt = "function(	)
	{
		clearInterval(this._timeINT);
	}";
	n.checkProgress = "function(	)
	{
		this._oC.mpClass.autoUpdatePlayer(this.ns);
	}";
	n.unloadVideo = "function(	)
	{
		this.clearProgressInt();
		this.stopAudio();
		this.removeNS();
	}";
	n.clear = "function(	)
	{
		this.p_mc.removeMovieClip();
		this.vidObj.clear();
	}";
	net.slideshowpro.slideshowpro.observers.VideoObject.n = "function(	)
	{
		this.ns.close();
		delete this.ns		removeNS;
	}";
	n.vidSmooth = true;
	n.isStarting = true;
	n.isComplete = false;

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.VideoObject.prototype,null,1);
