
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
if(!_global.net.slideshowpro.slideshowpro.utils)
{
	_global.net.slideshowpro.slideshowpro.utils = new Object();

} // end if
;
if(!_global.net.slideshowpro.slideshowpro.utils.ImageSmoother)
{
	net.slideshowpro.slideshowpro.utils.ImageSmoother = var _local1 = function(	)
	{
};
	_local1.prototype;
	_local1.smoothImage = "function(	target)
	{
		flash.display.BitmapData(target._width,target._height,true);
		target.attachBitmap(flash.display.BitmapData(target._width,target._height,true),0,"auto",true);
		flash.display.BitmapData(target._width,target._height,true).draw(target);
	}";

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.utils.ImageSmoother.prototype,null,1);
