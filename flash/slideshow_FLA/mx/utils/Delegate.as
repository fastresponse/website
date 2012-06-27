
// frame 1 (DOINITACTION)
if(!_global.mx)
{
	_global.mx = new Object();

} // end if
;
if(!_global.mx.utils)
{
	_global.mx.utils = new Object();

} // end if
;
if(!_global.mx.utils.Delegate)
{
	mx.utils.Delegate = "function(	f)
	{
		f.undefined();
		super.func = "";
	}";
	extends();
	function(	f)
	{
		f.undefined();
		super.func = "";
	}.prototype;
	function(	f)
	{
		f.undefined();
		super.func = "";
	}.create = "		var _local2 = function(		)
		{
			arguments.callee.target;
			arguments.callee.func;
		};
		_local2.target = "";
		_local2.func = arguments.callee.func;
	}";
	_local2.createDelegate = "function(	obj)
	{
	}";

} // end if
ASSetPropFlags(mx.utils.Delegate.prototype,null,1);
