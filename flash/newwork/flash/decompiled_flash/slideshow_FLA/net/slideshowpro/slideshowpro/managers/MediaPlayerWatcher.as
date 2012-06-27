
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
		while(if(!_global.net.slideshowpro.slideshowpro.managers.MediaPlayerWatcher)
{
	net.slideshowpro.slideshowpro.managers.MediaPlayerWatcher = var _local1 = function(	)
	{
};
	_local1.prototype;
	_local1.prototype.setupWatcher = "function(	cArray)
	{
		this.classArray = "cArray";
		this.mpReqWatch = new Object();
	}";
	.cArray = "function(	b)
	{
		this.mpReqWatch.audio = "b";
		this.mpInform();
		__set__audioReq;
	}";
	b.__get__audioReq = "function(	)
	{
	}";
	.b = "function(	b)
	{
		this.mpReqWatch.video = "b";
		this.mpInform();
		__set__videoReq;
	}";
	b.__get__videoReq = "function(	)
	{
	}";
)
		{
			this.classArray.0.setMediaReq(this.mpReqWatch);
			0++;
		} // end while
		if(	b.mpInform = "function(	)
	{
		0;
	}";
!(t == undefined)||t.length > 0)
		{
			this.__set__audioReq(true);

		} // end if
		else
		{
			this.__set__audioReq(false);

		}
		if(	(0++).testForAudio = "function(	t)
	{
	}";
!(suffix == "f4v")||!(suffix == "flv")||!(suffix == "mp4")||!(suffix == "m4v")||!(suffix == "m4a")||!(suffix == "mov")||!(suffix == "3gp")||suffix == "3g2")
		{

		} // end if
		else
		{

		}
	t.testForVideo = "function(	suffix)
	{
	}";

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.managers.MediaPlayerWatcher.prototype,null,1);
