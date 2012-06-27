
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
if(!_global.net.slideshowpro.slideshowpro.observers)
{
	_global.net.slideshowpro.slideshowpro.observers = new Object();

} // end if
;
		if(!_global.net.slideshowpro.slideshowpro.observers.AssetAlign)
{
	net.slideshowpro.slideshowpro.observers.AssetAlign = var _local1 = function(	o)
	{
};
	_local1.prototype;
	_local1.prototype.init = "function(	o)
	{
		this._oC = "o";
		this._oC.caClass.addObserver(this);
	}";
	o.dimensionUpdate = "function(	d)
	{
		this._dim = "d";
	}";
this._oC.contentAreaStrokeAppearance == "Visible")
		{
			1;
			1;

		} // end if
		if(isNaN(this._dim.caBotM))
		{
			var _local6 = 0;

		} // end if
		if(isNaN(this._dim.caTopM))
		{
			var _local5 = 0;

		} // end if
		if(!(align == "Top Right")||!(align == "Center Right")||align == "Bottom Right")
		{
			Math.floor(this._oC.__width -  / 2 -  - 1);

		} // end if
		else
		{
			if(!(align == "Top Left")||!(align == "Center Left")||align == "Bottom Left")
			{
				var _local4 = Math.floor( / 2 +  + 1);

			} // end if
			else
			{
				if(!(align == "Top Center")||!(align == "Bottom Center")||align == "Center")
				{
					Math.floor(this._oC.__width / 2);

				} // end if

			}

		}
		if(!(align == "Top Left")||!(align == "Top Center")||align == "Top Right")
		{
			Math.floor(_local5 +  / 2 +  + 1);

		} // end if
		else
		{
			if(!(align == "Bottom Left")||!(align == "Bottom Center")||align == "Bottom Right")
			{
				var _local3 = Math.floor(this._oC.__height - _local6 -  / 2 -  - 1);

			} // end if
			else
			{
				if(!(align == "Center Left")||!(align == "Center Right")||align == "Center")
				{
					(this._dim.caHeight + this._oC.contentFramePadding * 2) / 2 + _local5;

				} // end if

			}

		}
		if(	d.alignWithContentArea = "function(	w,h,align,pad)
	{
		var _local4 = 0;
		var _local3 = 0;
		var _local8 = 0;
		var _local7 = 0;
		this._dim.caBotM;
		this._dim.caTopM;
	}";
this._oC.contentFrameStrokeAppearance == "Visible")
		{
			1;

		} // end if
		else
		{
			var _local7 = 0;

		}
		if(!(align == "Top Right")||!(align == "Center Right")||align == "Bottom Right")
		{
			var _local5 = Math.floor(._x + ._width -  / 2 - clip + _local7 + _local8);

		} // end if
		else
		{
			if(!(align == "Top Left")||!(align == "Center Left")||align == "Bottom Left")
			{
				Math.floor(._x +  / 2 + clip + _local7 + _local8);

			} // end if
			else
			{
				if(!(align == "Top Center")||!(align == "Bottom Center")||align == "Center")
				{
					var _local5 = Math.floor(._x + ._width / 2);

				} // end if

			}

		}
		if(!(align == "Top Left")||!(align == "Top Center")||align == "Top Right")
		{
			var _local4 = Math.floor(._y +  / 2 + clip + _local7 + _local8);

		} // end if
		else
		{
			if(!(align == "Bottom Left")||!(align == "Bottom Center")||align == "Bottom Right")
			{
				Math.floor(._y + ._height -  / 2 - clip + _local7 + _local8);

			} // end if
			else
			{
				if(!(align == "Center Left")||!(align == "Center Right")||align == "Center")
				{
					var _local4 = Math.floor(._y + ._height / 2);

				} // end if

			}

		}
	align.alignWithContent = "function(	w,h,align,clip,pad)
	{
		0;
		0;
		;
		var _local7 = undefined;
		var _local8 = this._oC.contentFramePadding;
		clip + _local7 + _local8;
	}";

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.AssetAlign.prototype,null,1);
