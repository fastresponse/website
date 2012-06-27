
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
if(!_global.net.slideshowpro.slideshowpro.draw)
{
	_global.net.slideshowpro.slideshowpro.draw = new Object();

} // end if
;
if(!_global.net.slideshowpro.slideshowpro.draw.DrawRect)
{
	net.slideshowpro.slideshowpro.draw.DrawRect = "function(	)
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
	}.create = "function(	mc,w,h,c,a)
	{
		mc.clear();
		mc.beginFill(,);
		mc.moveTo(0,0);
		mc.lineTo(a,0);
		mc.lineTo(a,h);
		mc.lineTo(0,h);
		mc.lineTo(0,0);
		mc.endFill();
	}";

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.draw.DrawRect.prototype,null,1);
