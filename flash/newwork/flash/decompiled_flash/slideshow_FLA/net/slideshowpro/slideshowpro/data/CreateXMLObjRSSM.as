
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
			if(!_global.net.slideshowpro.slideshowpro.data.CreateXMLObjRSSM)
{
	net.slideshowpro.slideshowpro.data.CreateXMLObjRSSM = var _local1 = function(	)
	{
};
	_local1.prototype;
_local13 < _local18)
		{
			false;
			_local16.channel.0.item._local13;
			var _local6 = _local16.channel.0.item._local13.title.0.value;
			if(_local6 == undefined)
			{
				No title;

			} // end if
			else
			{
				var _local6 = net.slideshowpro.slideshowpro.utils.Utils.stripHTML("No title");

			}
			if(			var _local7 = _local16.channel.0.item._local13.description.0.value;
_local7 == undefined)
			{
				No caption;

			} // end if
			else
			{
				var _local7 = net.slideshowpro.slideshowpro.utils.Utils.stripHTML("No caption");

			}
			if(			var _local11 = _local16.channel.0.item._local13.link.0.value;
_local11 == undefined)
			{
				;

			} // end if
				if(			_local16.channel.0.item._local13.media:content.0.url;
			var _local8 = _local16.channel.0.item._local13.media:content.0.media:thumbnail.0.url;
_local16.channel.0.item._local13.media:content.0.url == undefined)
			{
				var _local14 = _local16.channel.0.item._local13.media:group.0;
				if(!(_local14 == undefined))
				{
					var _local2 = this.getBestImageFromGroup(_local14);

				} // end if
				else
				{
					var _local12 = true;
					trace("ERROR: No media:content found in this RSS feed");

				}
			
			} // end if
				if(_local16.channel.0.generator.0.value == "http://www.flickr.com/")
			{
				var _local15 = _local2.indexOf("_m.jpg");
				if(!(_local15 == -1))
				{
					_local2.slice(0,_local15) + ".jpg";

				} // end if
			
			} // end if
				if(			var _local10 = true;
			var _local3 = 0;
_local3 < _local9.length)
			{
(_local2.slice(0,_local15) + ".jpg").indexOf(_local9._local3) == -1&&				if(!((_local2.slice(0,_local15) + ".jpg").indexOf(_local9._local3.toUpperCase()) == -1))
				{
					false;

				} // end if
				else
				{
					_local3++;
					nextFrame();
					_local1.prototype + "createArray";
					nextFrame();
					toggleQuality();
					0x03();
