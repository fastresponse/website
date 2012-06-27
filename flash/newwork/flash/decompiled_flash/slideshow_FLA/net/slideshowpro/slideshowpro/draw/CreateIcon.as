
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
		if(!_global.net.slideshowpro.slideshowpro.draw.CreateIcon)
{
	net.slideshowpro.slideshowpro.draw.CreateIcon = "function(	)
	{
		super.undefined();
	}";
	extends();
	function(	)
	{
		super.undefined();
	}.prototype;
mc < 0)
		{
			mc == 0;

		} // end if
		else
		{
			if(mc > 100)
			{
				100;

			} // end if

		}
			if()
		{
			var _local10 = 13;
			var _local12 = 12;
			embedded.createEmptyMovieClip("hA_mc",0);
			net.slideshowpro.slideshowpro.draw.DrawRect.create(embedded.createEmptyMovieClip("hA_mc",0),_local10 + 4,_local12 + 4,0,100);
			embedded.createEmptyMovieClip("hA_mc",0)._alpha = 0;
			embedded.hitArea = embedded.createEmptyMovieClip("hA_mc",0);
			var _local1 = embedded.createEmptyMovieClip("i_mc",1);
			_local1.attachMovie(,"s_mc",0);
			_local1.s_mc._alpha = 100;
			_local1.s_mc._width;
			var _local5 = _local1.s_mc._height;
			_local1.createEmptyMovieClip("bg_mc",1);
			net.slideshowpro.slideshowpro.draw.DrawRect.create(_local1.createEmptyMovieClip("bg_mc",1),_local1.s_mc._width,_local5,,100);
			if(_local5 > 2)
			{
				net.slideshowpro.slideshowpro.draw.DrawGradient.create(_local1.createEmptyMovieClip("bg_mc",1),_local1.s_mc._width,_local5,0,0,new Array(0,0),new Array(0,100),new Array(0,255),90);

			} // end if
			else
			{
				net.slideshowpro.slideshowpro.draw.DrawGradient.create(_local1.createEmptyMovieClip("bg_mc",1),_local10,8,0,0,new Array(0,0),new Array(0,100),new Array(0,255),90);

			}
			if(			_local1.attachMovie(,"iMask_mc",2);
			_local1.createEmptyMovieClip("bg_mc",1)._y = 2;
			_local1.createEmptyMovieClip("bg_mc",1)._x = 2;
			_local1.iMask_mc._y = 2;
			_local1.iMask_mc._x = 2;
			_local1.s_mc._y = 3;
			_local1.s_mc._x = 3;
			var _local9 = Math.floor(embedded.createEmptyMovieClip("hA_mc",0)._width / 2 - _local1.s_mc._width / 2 - 2);
			Math.floor(embedded.createEmptyMovieClip("hA_mc",0)._height / 2 - _local5 / 2 - 2);
!(_local9 < 0))
			{
				_local1._x = _local9;

			} // end if
			if(!(Math.floor(embedded.createEmptyMovieClip("hA_mc",0)._height / 2 - _local5 / 2 - 2) < 0))
			{
				_local1._y = Math.floor(embedded.createEmptyMovieClip("hA_mc",0)._height / 2 - _local5 / 2 - 2);

			} // end if
					_local1.createEmptyMovieClip("bg_mc",1).setMask(_local1.iMask_mc);

		} // end if
		else
		{
			embedded.attachMovie(,"i_mc",1);

		}
	function(	)
	{
		super.undefined();
	}.create = "function(	mc,iconBGColor,alpha,maskType,embedded)
	{
	}";

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.draw.CreateIcon.prototype,null,1);
