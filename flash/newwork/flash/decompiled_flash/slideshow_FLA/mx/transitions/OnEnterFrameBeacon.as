
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
		if(!_global.mx.transitions.OnEnterFrameBeacon)
{
	mx.transitions.OnEnterFrameBeacon = var _local1 = function(	)
	{
};
	_local1.prototype;
!_root.__OnEnterFrameBeacon)
		{
			mx.transitions.BroadcasterMX.initialize(_global.MovieClip);
			var _local3 = _root.createEmptyMovieClip("__OnEnterFrameBeacon",9876);
			_local3.onEnterFrame = "function(			)
			{
				_global.MovieClip.broadcastMessage("onEnterFrame");
			}";

		} // end if
	_local1.init = "	}";
	_global.version = "1.1.0.52";

} // end if
ASSetPropFlags(mx.transitions.OnEnterFrameBeacon.prototype,null,1);
