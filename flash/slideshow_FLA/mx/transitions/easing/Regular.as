
// frame 1 (DOINITACTION)
if(!_global.mx)
{
	_global.mx = new Object();

} // end if
;
if(!_global.mx.transitions)
{
	_global.mx.transitions = new Object();

} // end if
;
if(!_global.mx.transitions.easing)
{
	_global.mx.transitions.easing = new Object();

} // end if
;
		if(!_global.mx.transitions.easing.Regular)
{
	mx.transitions.easing.Regular = var _local1 = function(	)
	{
};
	_local1.prototype;
	_local1.easeIn = "function(	t,b,c,d)
	{
	}";
	(t / d).easeOut = "function(	t,b,c,d)
	{
	}";
(t / ( / 2)) < 1)
		{

		} // end if
	(t / d).easeInOut = "function(	t,b,c,d)
	{
	}";
	(t / ( / 2)).version = "1.1.0.52";

} // end if
ASSetPropFlags(mx.transitions.easing.Regular.prototype,null,1);
