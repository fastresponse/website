
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
if(!_global.net.slideshowpro.slideshowpro.draw.DrawGradient)
{
	net.slideshowpro.slideshowpro.draw.DrawGradient = "function(	)
	{
		super.undefined();
	}";
	extends();
	function(	)
	{
		super.undefined();
	}.prototype;
	y. = "function(	mc,w,h,x,y,c,a,r,angle)
	{
		net.slideshowpro.slideshowpro.utils.Utils.toRadians();
		mc.beginGradientFill("linear",,,angle,new Object(net.slideshowpro.slideshowpro.utils.Utils.toRadians(),r,h,h,,w));
		mc.lineTo(,0);
		mc.lineTo(,h);
		mc.lineTo(0,h);
		mc.lineTo(0,0);
		mc.endFill();
	}";

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.draw.DrawGradient.prototype,null,1);
