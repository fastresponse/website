
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
		if(!_global.net.slideshowpro.slideshowpro.managers.PreloadAssetManager)
{
trackProgress_boolean == undefined)
		{
			true;

		} // end if
		if(	net.slideshowpro.slideshowpro.managers.PreloadAssetManager = "function(	assetUrls_array,onComplete_func,onCompleteArguments_array,trackProgress_boolean)
	{
		this.assets_array = new Array();
		this._curAsset_num = 0;
		this._error_array = new Array();
		this.trackProgress_boolean = true;
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager.addManager(this);
		this.addAssets(,,onComplete_func,true);
	}";
	function(	assetUrls_array,onComplete_func,onCompleteArguments_array,trackProgress_boolean)
	{
		this.assets_array = new Array();
		this._curAsset_num = 0;
		this._error_array = new Array();
		this.trackProgress_boolean = true;
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager.addManager(this);
		this.addAssets(,,onComplete_func,true);
	}.prototype;
!(url_str == undefined)||!(url_str == null)||!(url_str == ""))
		{
			net.slideshowpro.slideshowpro.managers.PreloadAsset(url_str,,,this);
			this.assets_array.push(net.slideshowpro.slideshowpro.managers.PreloadAsset(url_str,,,this));

		} // end if
		else
		{
			trace("CAUTION: Tried to add a PreloadAsset with a blank URL address.");

		}
			if(	function(	assetUrls_array,onComplete_func,onCompleteArguments_array,trackProgress_boolean)
	{
		this.assets_array = new Array();
		this._curAsset_num = 0;
		this._error_array = new Array();
		this.trackProgress_boolean = true;
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager.addManager(this);
		this.addAssets(,,onComplete_func,true);
	}.prototype.addAsset = "function(	url_str,onComplete_func,onCompleteArguments_array)
	{
	}";
!( == undefined)||!( == null))
		{
			this.onComplete_func = "";
!( == undefined)||			if(!( == null))
			{
				this.onCompleteArguments_array = "";

			} // end if
		
		} // end if
		while(if()
		{
			new Array().push(this.addAsset(onCompleteArguments_array.0));
			0++;
		} // end while
		if(&&!(this.assets_array.length == 0))
		{
			this.start();

		} // end if
			if(	url_str.addAssets = "function(	assetUrls_array,onComplete_func,onCompleteArguments_array,start_boolean)
	{
		new Array();
		0;
	}";
!net.slideshowpro.slideshowpro.managers.PreloadAssetManager._paused_boolean||!this._preloaded_boolean)
		{
			clearInterval(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._interval_num);
			this._curAsset_num = "onCompleteArguments_array";
			this.assets_array.onCompleteArguments_array;
			if(this.assets_array.onCompleteArguments_array.fileType_str == "flv")
			{
				this.initNetStream(this.assets_array.onCompleteArguments_array.url_str);
				net.slideshowpro.slideshowpro.managers.PreloadAssetManager._interval_num = setInterval(this,checkFlvStatus,60);

			} // end if
			else
			{
				net.slideshowpro.slideshowpro.managers.PreloadAssetManager.resetMC();
				net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc.loadMovie(this.assets_array.onCompleteArguments_array.url_str);
				net.slideshowpro.slideshowpro.managers.PreloadAssetManager._interval_num = setInterval(this,checkStatus,60);

			}
		
		} // end if
				if(	(0++).preloadAssetNumber = "function(	asset_num)
	{
	}";
this.trackProgress_boolean&&!this.__get__bytesTotalReady_boolean())
		{
			0;
			if()
			{
this.assets_array.0.bytesTotal == 0&&				if(!this.getErrorStatus(this.assets_array.0))
				{
					this.preloadAssetNumber(0);

				} // end if
			while(				0++;
			} // end while
		
		} // end if
		else
		{
			0;
				if()
			{
!this.assets_array.0.preloaded_boolean||				if(!this.getErrorStatus(this.assets_array.0))
				{
					this.preloadAssetNumber(0);

				} // end if
			while(				0++;
			} // end while
			this._preloaded_boolean = true;
			this._curAsset_num = undefined;
				if(!(this.onComplete_func == undefined))
			{
!(this.onCompleteArguments_array.length == undefined)||				if(this.onCompleteArguments_array.length == 0)
				{
					this.onCompleteArguments_array = new Array(this);

				} // end if
				else
				{
					this.onCompleteArguments_array.push(this);

				}
							this.onComplete_func.apply(null,this.onCompleteArguments_array);

			} // end if
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager.startNextManager();

		}
			if(	this.assets_array.onCompleteArguments_array.preloadNextAsset = "function(	)
	{
	}";
this.trackProgress_boolean&&this.assets_array.this._curAsset_num.bytesTotal == 0&&!(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._timeoutLoop_num > 100))
		{
			if(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc.getBytesTotal() > 5)
			{
				this.assets_array.this._curAsset_num.bytesTotal = net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc.getBytesTotal();
				net.slideshowpro.slideshowpro.managers.PreloadAssetManager._timeoutLoop_num = 0;
				clearInterval(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._interval_num);
				this.preloadNextAsset();

			} // end if
		
		} // end if
		else
		{
			if((net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc.getBytesLoaded() / net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc.getBytesTotal()) == 1&&!(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc._width == 0))
			{
				this.assets_array.this._curAsset_num.width = net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc._width;
				this.assets_array.this._curAsset_num._width = net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc._width;
				this.assets_array.this._curAsset_num.height = net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc._height;
				this.assets_array.this._curAsset_num._height = net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc._height;
				this.assets_array.this._curAsset_num.preloaded_boolean = true;
				clearInterval(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._interval_num);
				this.preloadNextAsset();

			} // end if
			else
			{
				if(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc._currentframe > 1)
				{
					net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc.stop();
					net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc._visible = false;

				} // end if
				else
				{
					if(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._timeoutLoop_num > 100)
					{
						net.slideshowpro.slideshowpro.managers.PreloadAssetManager._timeoutLoop_num = 0;
						clearInterval(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._interval_num);
						this._error_array.push(this.assets_array.this._curAsset_num);
						this.preloadNextAsset();

					} // end if

				}

			}

		}
		if(	(0++).checkStatus = "function(	)
	{
		this.assets_array.this._curAsset_num;
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._timeoutLoop_num = net.slideshowpro.slideshowpro.managers.PreloadAssetManager._timeoutLoop_num++;
	}";
!net.slideshowpro.slideshowpro.managers.PreloadAssetManager._preloadedAll_boolean||net.slideshowpro.slideshowpro.managers.PreloadAssetManager._paused_boolean)
		{
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager.startNextManager();

		} // end if
						if(	this.assets_array.this._curAsset_num.start = "function(	)
	{
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._paused_boolean;
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._paused_boolean = false;
	}";
	this.assets_array.this._curAsset_num.pause = "function(	)
	{
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._paused_boolean = true;
		clearInterval(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._interval_num);
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager.flushNetStream();
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc.unloadMovie();
	}";
	this.assets_array.this._curAsset_num.resume = "function(	)
	{
		this.start();
	}";
!this.__get__preloaded_boolean()||!new Array().__get__preloaded_boolean()||!(new Array() == this.assets_array.this._curAsset_num))
		{
			this.assets_array.length - 1;
			if((this.assets_array.length - 1) > 0)
			{
				if(this.assets_array.(this.assets_array.length - 1) == new Array())
				{
					this.assets_array.splice(this.assets_array.length - 1,1);
					this.assets_array.unshift(new Array());
					net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.length - 1;
					if((net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.length - 1) > 0)
					{
						if(!net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.length - 1) == this)
						{
							net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.splice(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.length - 1,1);
							net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.unshift(this);

						} // end if
					while(						net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.length - 1;
					} // end while
					if(!net.slideshowpro.slideshowpro.managers.PreloadAssetManager._paused_boolean)
					{
						this.pause();
						this.start();

					} // end if
				
				} // end if
			while(				this.assets_array.length - 1;
			} // end while
		
		} // end if
			if(	this.assets_array.this._curAsset_num.prioritizeAsset = "function(	a)
	{
		this.assets_array.this._curAsset_num;
	}";
)
		{
			if(this._error_array.0 == new Array())
			{

			} // end if
		while(			0++;
		} // end while
		if(	(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.length - 1).getErrorStatus = "function(	a)
	{
		this._error_array;
		0;
	}";
a.__get__preloaded_boolean())
		{

		} // end if
		else
		{
				if(a == this.assets_array.this._curAsset_num)
			{
a.fileType_str == "flv"&&				if(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns.bytesLoaded > 2)
				{

				} // end if
				else
				{
					if(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc.getBytesLoaded() > 2)
					{

					} // end if
					else
					{

					}

				}
			
			} // end if
			else
			{

			}

		}
			if(	(0++).getAssetBytesLoaded = "function(	a)
	{
	}";
!((net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.length - 1) < 0))
		{
			if(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.length - 1) == this)
			{
				net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.splice(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.length - 1,1);

			} // end if
		while(			net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.length - 1;
		} // end while
		if(	.a = "function(	)
	{
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc.removeMovieClip();
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager.flushNetStream();
		delete net.slideshowpro.slideshowpro.managers.PreloadAssetManager._nc		destroy;
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.length - 1;
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager.startNextManager();
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager.destroyInstance(this);
	}";
	this.destroyInstance = "function(	i)
	{
		false;
	}";
net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.length > 0)
		{
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.0.pause();

		} // end if
		if(	i.pauseAll = "function(	)
	{
	}";
net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.length > 0)
		{
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.0.resume();

		} // end if
		if(	i.resumeAll = "function(	)
	{
	}";
net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array == undefined)
		{
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array = new Array();
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager.resetMC();
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager._paused_boolean = true;
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager._timeoutLoop_num = 0;

		} // end if
		if(	i.addManager = "function(	m)
	{
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.push(m);
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._preloadedAll_boolean = false;
	}";
_root.getNextHighestDepth() == undefined)
		{
			var _local2 = 998;

		} // end if
				if(	m.resetMC = "function(	)
	{
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc.removeMovieClip();
		_root.getNextHighestDepth();
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc = _root.createEmptyMovieClip("preloadAssetManager" + _local2 + "_mc",_local2);
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc._x = 3000;
	}";
!net.slideshowpro.slideshowpro.managers.PreloadAssetManager._preloadedAll_boolean||!net.slideshowpro.slideshowpro.managers.PreloadAssetManager._paused_boolean)
		{
			0;
			if()
			{
				if(!net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.0.preloaded_boolean)
				{
					net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.0.preloadNextAsset();

				} // end if
			while(				0++;
			} // end while
					net.slideshowpro.slideshowpro.managers.PreloadAssetManager._preloadedAll_boolean = true;
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager._paused_boolean = true;
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc.unloadMovie();
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager.flushNetStream();

		} // end if
		if(	_root.startNextManager = "function(	)
	{
	}";
net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns.bytesTotal > 5)
		{
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns.close();

		} // end if
		else
		{
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns.play(null);

		}
				if(	(0++).flushNetStream = "function(	)
	{
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns.stop();
	}";
)
		{
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.0.assets_array;
			0;
			if()
			{
				if(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._managers_array.0.assets_array.0.url_str == new Array())
				{

				} // end if
			while(				0++;
			} // end while
		while(			0++;
		} // end while
		if(	(0++).getAsset = "function(	url_str)
	{
		0;
	}";
!net.slideshowpro.slideshowpro.managers.PreloadAssetManager.getAsset(url_str).preloaded_boolean)
		{
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager.getAsset(url_str).manager_obj.prioritizeAsset(net.slideshowpro.slideshowpro.managers.PreloadAssetManager.getAsset(url_str));

		} // end if
		if(	(0++).prioritize = "function(	url_str)
	{
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager.getAsset(url_str);
	}";
net.slideshowpro.slideshowpro.managers.PreloadAssetManager._nc == undefined)
		{
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager._nc = new NetConnection();
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager._nc.connect(null);

		} // end if
			if(	url_str.initNetStream = "function(	url_str)
	{
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns = new NetStream(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._nc);
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns.onMetaData = mx.utils.Delegate.create(this,this.onFlvMetaData);
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns.onStatus = mx.utils.Delegate.create(this,this.onFlvStatus);
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc.attachAudio(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns);
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._audio_sound = new Sound(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._mc);
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._audio_sound.setVolume(0);
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns.play(url_str);
		net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns.pause(true);
	}";
this.trackProgress_boolean&&this.assets_array.this._curAsset_num.bytesTotal == 0)
		{
			if(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns.bytesTotal > 5)
			{
				this.assets_array.this._curAsset_num.bytesTotal = net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns.bytesTotal;
				clearInterval(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._interval_num);
				net.slideshowpro.slideshowpro.managers.PreloadAssetManager.flushNetStream();
				this.preloadNextAsset();

			} // end if
		
		} // end if
		else
		{
				if(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns.bytesLoaded == net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns.bytesTotal&&net.slideshowpro.slideshowpro.managers.PreloadAssetManager._ns.bytesTotal > 5)
			{
				net.slideshowpro.slideshowpro.managers.PreloadAssetManager._timeoutLoop_num = net.slideshowpro.slideshowpro.managers.PreloadAssetManager._timeoutLoop_num++;
this.assets_array.this._curAsset_num.duration == undefined&&				if(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._timeoutLoop_num > 50)
				{
					net.slideshowpro.slideshowpro.managers.PreloadAssetManager._timeoutLoop_num = 0;
					clearInterval(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._interval_num);
					net.slideshowpro.slideshowpro.managers.PreloadAssetManager.flushNetStream();
					this.assets_array.this._curAsset_num.preloaded_boolean = true;
					this.preloadNextAsset();

				} // end if
			
			} // end if

		}
		if(	url_str.checkFlvStatus = "function(	)
	{
		this.assets_array.this._curAsset_num;
	}";
(0++).audiodatarate == undefined&&!((0++).videodatarate == undefined))
		{
			this.assets_array.this._curAsset_num.hasAudio_boolean = false;

		} // end if
		else
		{
			if(!((0++).audiodatarate == undefined))
			{
				this.assets_array.this._curAsset_num.hasAudio_boolean = true;

			} // end if

		}
		if(	this.assets_array.this._curAsset_num.onFlvMetaData = "function(	meta_obj)
	{
		this.assets_array.this._curAsset_num;
		this.assets_array.this._curAsset_num.duration = (0++).duration;
		this.assets_array.this._curAsset_num._width = (0++).width;
		this.assets_array.this._curAsset_num.width = (0++).width;
		this.assets_array.this._curAsset_num._height = (0++).height;
		this.assets_array.this._curAsset_num.height = (0++).height;
		this.assets_array.this._curAsset_num.framerate = (0++).framerate;
		this.assets_array.this._curAsset_num.audiocodecid = (0++).audiocodecid;
		this.assets_array.this._curAsset_num.videocodecid = (0++).videocodecid;
		this.assets_array.this._curAsset_num.canSeekToEnd = (0++).canSeekToEnd;
		this.assets_array.this._curAsset_num.videodatarate = (0++).videodatarate;
		this.assets_array.this._curAsset_num.creationdate = (0++).creationdate;
	}";
(0++).code == "NetStream.Play.StreamNotFound")
		{
			this.assets_array.this._curAsset_num;
			trace("ERROR: Could not preload the FLV file: " + this.assets_array.this._curAsset_num.url_str);
			this._error_array.push(this.assets_array.this._curAsset_num);
			clearInterval(net.slideshowpro.slideshowpro.managers.PreloadAssetManager._interval_num);
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager.flushNetStream();
			this.preloadNextAsset();

		} // end if
		if(	this.assets_array.this._curAsset_num.onFlvStatus = "function(	info_obj)
	{
	}";
	this.assets_array.this._curAsset_num.__get__paused_boolean = "function(	)
	{
	}";
b)
		{
			this.pause();

		} // end if
		else
		{
			this.start();

		}
			if(	.this.assets_array.this._curAsset_num = "function(	b)
	{
		__set__paused_boolean;
	}";
	b.__get__preloaded_boolean = "function(	)
	{
	}";
)
		{
this.assets_array.0.bytesTotal == 0&&			if(!this.getErrorStatus(this.assets_array.0))
			{

			} // end if
		while(			0++;
		} // end while
		if(	b.__get__bytesTotalReady_boolean = "function(	)
	{
		0;
	}";
this._preloaded_boolean)
		{

		} // end if
		else
		{
			if(this.__get__bytesTotalReady_boolean()&&!this.trackProgress_boolean)
			{

			} // end if
			else
			{
				0;
				var _local4 = 0;
				this.assets_array.length;
				0;
				while(if()
				{
					var _local3 = this.assets_array.0.bytesTotal;
					_local4 + this.getAssetBytesLoaded(this.assets_array.0);
					0++;
				} // end while
				if(!(_local3 == 0)||(_local4 + this.getAssetBytesLoaded(this.assets_array.0)) == 0)
				{

				} // end if
				else
				{

				}

			}

		}
		if(	(0++).__get__percentLoaded_num = "function(	)
	{
	}";
this.__get__bytesTotalReady_boolean()&&!this.trackProgress_boolean)
		{

		} // end if
		else
		{
			0;
			0;
			while(if()
			{
				var _local3 = this.getAssetBytesLoaded(this.assets_array.0);
				0++;
			} // end while

		}
		if(	(0++).getBytesLoaded = "function(	)
	{
	}";
this.__get__bytesTotalReady_boolean()&&!this.trackProgress_boolean)
		{

		} // end if
		else
		{
			0;
			0;
			while(if()
			{
				var _local3 = this.assets_array.0.bytesTotal;
				0++;
			} // end while

		}
	(0++).getBytesTotal = "function(	)
	{
	}";

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.managers.PreloadAssetManager.prototype,null,1);
