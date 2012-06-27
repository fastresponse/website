
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
if(!_global.net.slideshowpro.slideshowpro.data)
{
	_global.net.slideshowpro.slideshowpro.data = new Object();

} // end if
;
		if(!_global.net.slideshowpro.slideshowpro.data.XMLParser)
{
	net.slideshowpro.slideshowpro.data.XMLParser = "function(	o)
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
		this.gData = new Array();
	}";
this._oC.xmlFileType == "Director")
		{
			this.createDirectorURL(x);

		} // end if
			if(	o.loadXML = "function(	x)
	{
		this.i_xml = new XML();
		this.i_xml.ignoreWhite = true;
		this.i_xml.onLoad = mx.utils.Delegate.create(this,this.onLoadXML);
		this.i_xml.load(this.createDirectorURL(x));
		this._oC.dispatchEventData("onPreloadInit",this.i_xml);
	}";
this._oC.directorLargePublishing == "On")
		{
			0;
!(this._oC.contentScale == "Crop to Fit")||			if(this._oC.contentScale == "Crop to Fit All")
			{
				var _local3 = 1;

			} // end if
		
		} // end if
		else
		{
			2;

		}
		if(this._oC.navLinkPreviewScale == "Crop to Fit")
		{
			1;

		} // end if
			if(!(this._oC.albumPreviewStyle == "None"))
		{
!(this._oC.albumPreviewScale == "Crop to Fit")||!(this._oC.albumPreviewStyle == "Banner")||			if(this._oC.albumPreviewStyle == "Fill")
			{
				1;

			} // end if
		
		} // end if
		if(	this.createDirectorURL(x).createDirectorURL = "function(	url)
	{
		;
		var _local2 = this._oC.caClass.getDirectorData();
		var _local3 = 0;
		var _local6 = 0;
		var _local5 = 0;
		 + "&w=" + _local2.w + "&h=" + _local2.h + "&s=" + 2 + "&q=" + this._oC.directorLargeQuality + "&sh=" + this._oC.directorLargeSharpening + "&tw=" + this._oC.navLinkPreviewSize.0 + "&th=" + this._oC.navLinkPreviewSize.1 + "&ts=" + 1 + "&tq=" + this._oC.directorThumbQuality + "&tsh=" + this._oC.directorThumbSharpening + "&pw=" + _local2.apw + "&ph=" + _local2.aph + "&aps=" + 1;
		false;
	}";
success)
		{
			this._oC.dispatchEventData("onXMLData",this.i_xml.toString());
			this.parseData();

		} // end if
		else
		{
			trace("
ERROR!	The XML file " + this._oC.xmlFilePath + " could not be found.
		If you are using SlideShowPro Director, make sure
		XML File Type is set to "Director"
		");

		}
		if(	_local2.onLoadXML = "function(	success)
	{
		this._oC.dispatchEventData("onLoadXML",success);
	}";
!(this._oC.xmlFileType == "Default")||this._oC.xmlFileType == "Director")
		{
			this.gData = this.createXMLDefaultArray(this.i_xml);
			this.done();

		} // end if
		else
		{
			if(this._oC.xmlFileType == "Media RSS")
			{
				this.gData = this.createMediaRSSArray(this.i_xml);
				this.done();

			} // end if
			else
			{
				if(this._oC.xmlFileType == "OPML")
				{
					this.createOPMLArray();

				} // end if

			}

		}
			if(	success.parseData = "function(	)
	{
	}";
	. = "function(	)
	{
		this._oC.afterGalleryDataLoad(this.insertAlbumNum(this.gData));
		delete this.gData		done;
		delete this.i_xml		success;
		delete this.queued_xml		;
		delete this.tempQueueArray		;
	}";
	success.createXMLDefaultArray = "function(	url)
	{
		net.slideshowpro.slideshowpro.data.CreateXMLObj();
		net.slideshowpro.slideshowpro.data.CreateXMLObj().createArray(2);
		false;
	}";
	net.slideshowpro.slideshowpro.data.CreateXMLObj().createArray(2).createMediaRSSArray = "function(	url)
	{
		var _local2 = net.slideshowpro.slideshowpro.data.CreateXMLObjRSSM();
		_local2.createArray( + "&w=" + _local2.w + "&h=" + _local2.h + "&s=" + 2 + "&q=" + this._oC.directorLargeQuality + "&sh=" + this._oC.directorLargeSharpening + "&tw=" + this._oC.navLinkPreviewSize.0 + "&th=" + this._oC.navLinkPreviewSize.1 + "&ts=" + 1 + "&tq=" + this._oC.directorThumbQuality + "&tsh=" + this._oC.directorThumbSharpening + "&pw=" + _local2.apw + "&ph=" + _local2.aph + "&aps=" + 1,this._oC);
		false;
	}";
	_local2.createOPMLArray = "function(	)
	{
		net.slideshowpro.slideshowpro.data.CreateOPMLArray();
		this.opmlArray = new Array();
		this.opmlArray = net.slideshowpro.slideshowpro.data.CreateOPMLArray().createArray(this.i_xml);
		false;
		this.startXMLQueue();
	}";
	net.slideshowpro.slideshowpro.data.CreateOPMLArray().startXMLQueue = "function(	)
	{
		this.tempQueueArray = new Array();
		this.queueXMLLoad(this.queueTick);
	}";
success)
			{
				self.onQueueXML(n);

			} // end if
		if(success.opmlArray.n.0 == "director")
		{
			success.opmlArray.n.1 = success.createDirectorURL(success.opmlArray.n.1);

		} // end if
		if(	net.slideshowpro.slideshowpro.data.CreateOPMLArray().queueXMLLoad = "		n.queued_xml.onLoad = "function(		success)
		{
		}";
		success.queued_xml.load(success.opmlArray.n.1);
		success._oC.dispatchEventData("onPreloadInit",success.queued_xml);
	}";
this.opmlArray.n.0 == "rss")
		{
			this.tempQueueArray.push(this.createMediaRSSArray(this.queued_xml));

		} // end if
		else
		{
			if(!(this.opmlArray.n.0 == "xml")||this.opmlArray.n.0 == "director")
			{
				this.tempQueueArray.push(this.createXMLDefaultArray(this.queued_xml));

			} // end if

		}
		if(this.queueTick < this.opmlArray.length)
		{
			this.queueXMLLoad(this.queueTick);

		} // end if
		else
		{
			this.onQueueComplete();

		}
		while(if(	.net.slideshowpro.slideshowpro.data.CreateOPMLArray() = "function(	n)
	{
		delete this.queued_xml		onQueueXML;
		this.queueTick = this.queueTick++;
	}";
)
		{
			_local3.push(this.tempQueueArray.0.0);
			0++;
		} // end while
		while(if(	n.onQueueComplete = "function(	)
	{
		var _local3 = new Array();
		this.tempQueueArray.length;
		0;
		this.gData = _local3;
		false;
		this.done();
	}";
)
		{
			_local3.0.0.num = 0;
			0++;
		} // end while
	(0++).insertAlbumNum = "function(	a)
	{
		_local3;
		0;
	}";
	_local3.queueTick = 0;

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.data.XMLParser.prototype,null,1);
