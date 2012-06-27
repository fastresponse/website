
// frame 1 (DOINITACTION)
if(!_global.caurina)
{
	_global.caurina = new Object();

} // end if
;
if(!_global.caurina.transitions)
{
	_global.caurina.transitions = new Object();

} // end if
;
if(!_global.caurina.transitions.properties)
{
	_global.caurina.transitions.properties = new Object();

} // end if
;
		if(cialProperty("_tintBrightness",caurina.transitions.properties.ColorShortcuts._brightness_get,caurina.transitions.properties.ColorShortcuts._brightness_set,new Array(true));
		caurina.transitions.Tweener.registerSpecialProperty("_contrast",caurina.transitions.properties.ColorShortcuts._contrast_get,caurina.transitions.properties.ColorShortcuts._contrast_set);
		caurina.transitions.Tweener.registerSpecialProperty("_hue",caurina.transitions.properties.ColorShortcuts._hue_get,caurina.transitions.properties.ColorShortcuts._hue_set);
		caurina.transitions.Tweener.registerSpecialProperty("_saturation",caurina.transitions.properties.ColorShortcuts._saturation_get,caurina.transitions.properties.ColorShortcuts._saturation_set,new Array(false));
		caurina.transitions.Tweener.registerSpecialProperty("_dumbSaturation",caurina.transitions.properties.ColorShortcuts._saturation_get,caurina.transitions.properties.ColorShortcuts._saturation_set,new Array(true));
	}	_local1.init = "function(	)
	{
		caurina.transitions.Tweener.registerSpecialProperty("_color_ra",caurina.transitions.properties.ColorShortcuts._oldColor_property_get,caurina.transitions.properties.ColorShortcuts._oldColor_property_set,new Array(ra));
		caurina.transitions.Tweener.registerSpecialProperty("_color_rb",caurina.transitions.properties.ColorShortcuts._oldColor_property_get,caurina.transitions.properties.ColorShortcuts._oldColor_property_set,new Array(rb));
		caurina.transitions.Tweener.registerSpecialProperty("_color_ga",caurina.transitions.properties.ColorShortcuts._oldColor_property_get,caurina.transitions.properties.ColorShortcuts._oldColor_property_set,new Array(ga));
		caurina.transitions.Tweener.registerSpecialProperty("_color_gb",caurina.transitions.properties.ColorShortcuts._oldColor_property_get,caurina.transitions.properties.ColorShortcuts._oldColor_property_set,new Array(gb));
		caurina.transitions.Tweener.registerSpecialProperty("_color_ba",caurina.transitions.properties.ColorShortcuts._oldColor_property_get,caurina.transitions.properties.ColorShortcuts._oldColor_property_set,new Array(ba));
		caurina.transitions.Tweener.registerSpecialProperty("_color_bb",caurina.transitions.properties.ColorShortcuts._oldColor_property_get,caurina.transitions.properties.ColorShortcuts._oldColor_property_set,new Array(bb));
		caurina.transitions.Tweener.registerSpecialProperty("_color_aa",caurina.transitions.properties.ColorShortcuts._oldColor_property_get,caurina.transitions.properties.ColorShortcuts._oldColor_property_set,new Array(aa));
		caurina.transitions.Tweener.registerSpecialProperty("_color_ab",caurina.transitions.properties.ColorShortcuts._oldColor_property_get,caurina.transitions.properties.ColorShortcuts._oldColor_property_set,new Array(ab));
		caurina.transitions.Tweener.registerSpecialProperty("_color_redMultiplier",caurina.transitions.properties.ColorShortcuts._color_property_get,caurina.transitions.properties.ColorShortcuts._color_property_set,new Array(redMultiplier));
		caurina.transitions.Tweener.registerSpecialProperty("_color_redOffset"";
p_value == null)
		{
			new Array().push(new Object(1,value));
			new Array().push(new Object(0,value));
			new Array().push(new Object(1,value));
			new Array().push(new Object(0,value));
			new Array().push(new Object(1,value));
			new Array().push(new Object(0,value));

		} // end if
		else
		{
			new Array().push(new Object(0,value));
			new Array().push(new Object(caurina.transitions.AuxFunctions.numberToR(p_value),value));
			new Array().push(new Object(0,value));
			new Array().push(new Object(caurina.transitions.AuxFunctions.numberToG(p_value),value));
			new Array().push(new Object(0,value));
			new Array().push(new Object(caurina.transitions.AuxFunctions.numberToB(p_value),value));

		}
		if(	name._color_blueOffset = "function(	p_value,p_parameters)
	{
		new Array();
	}";
"p_parameters" == null)
		{
			new Array().push(new Object(1,value));
			new Array().push(new Object(0,value));
			new Array().push(new Object(1,value));
			new Array().push(new Object(0,value));
			new Array().push(new Object(1,value));
			new Array().push(new Object(0,value));

		} // end if
		else
		{
			if(!(p_parameters.ra == undefined))
			{
				new Array().push(new Object(p_parameters.ra,value));

			} // end if
			if(!(p_parameters.rb == undefined))
			{
				new Array().push(new Object(p_parameters.rb,value));

			} // end if
			if(!(p_parameters.ga == undefined))
			{
				new Array().push(new Object(p_parameters.ba,value));

			} // end if
			if(!(p_parameters.gb == undefined))
			{
				new Array().push(new Object(p_parameters.bb,value));

			} // end if
			if(!(p_parameters.ba == undefined))
			{
				new Array().push(new Object(p_parameters.ga,value));

			} // end if
			if(!(p_parameters.bb == undefined))
			{
				new Array().push(new Object(p_parameters.gb,value));

			} // end if
			if(!(p_parameters.aa == undefined))
			{
				new Array().push(new Object(p_parameters.aa,value));

			} // end if
			if(!(p_parameters.ab == undefined))
			{
				new Array().push(new Object(p_parameters.ab,value));

			} // end if
			if(!(p_parameters.redMultiplier == undefined))
			{
				new Array().push(new Object(p_parameters.redMultiplier,value));

			} // end if
			if(!(p_parameters.redOffset == undefined))
			{
				new Array().push(new Object(p_parameters.redOffset,value));

			} // end if
			if(!(p_parameters.blueMultiplier == undefined))
			{
				new Array().push(new Object(p_parameters.blueMultiplier,value));

			} // end if
			if(!(p_parameters.blueOffset == undefined))
			{
				new Array().push(new Object(p_parameters.blueOffset,value));

			} // end if
			if(!(p_parameters.greenMultiplier == undefined))
			{
				new Array().push(new Object(p_parameters.greenMultiplier,value));

			} // end if
			if(!(p_parameters.greenOffset == undefined))
			{
				new Array().push(new Object(p_parameters.greenOffset,value));

			} // end if
			if(!(p_parameters.alphaMultiplier == undefined))
			{
				new Array().push(new Object(p_parameters.alphaMultiplier,value));

			} // end if
			if(!(p_parameters.alphaOffset == undefined))
			{
				new Array().push(new Object(p_parameters.alphaOffset,value));

			} // end if

		}
			if(	name._color_alphaOffset = "function(	p_value,p_parameters)
	{
		new Array();
	}";
	p_parameters._oldColor_property_get = "function(	p_obj,p_parameters)
	{
	}";
	p_parameters._oldColor_property_set = "function(	p_obj,p_value,p_parameters)
	{
		new Object();
		new Object().p_obj.0 = "p_parameters";
		new Color().setTransform(new Object());
	}";
	new Object()._color_property_get = "function(	p_obj,p_parameters)
	{
	}";
	p_parameters._color_property_set = "function(	p_obj,p_value,p_parameters)
	{
		p_value.transform.colorTransform;
		p_value.transform.colorTransform..0 = p_parameters;
		p_value.transform.colorTransform = p_value.transform.colorTransform;
	}";
.0)
		{
			if(!(((_local1.rb + _local1.gb + _local1.bb) / 3) > 0))
			{

			} // end if
			else
			{

			}
		
		} // end if
		else
		{

		}
			if(	_brightness_get.(-1 - (_local1.ra + _local1.ga + _local1.ba) / 300) = "function(	p_obj,p_parameters)
	{
		.0;
		var _local1 = new Color().getTransform();
		1 - (_local1.ra + _local1.ga + _local1.ba) / 300;
		(_local1.rb + _local1.gb + _local1.bb) / 3;
	}";
.0)
		{
			var _local2 = (1 - Math.abs(1 - (_local1.ra + _local1.ga + _local1.ba) / 300));
			if(!((1 - (_local1.ra + _local1.ga + _local1.ba) / 300) > 0))
			{

			} // end if
			else
			{

			}
					var _local1 = Math.round((1 - (_local1.ra + _local1.ga + _local1.ba) / 300) * 255);

		} // end if
		else
		{
			1;
			Math.round((1 - (_local1.ra + _local1.ga + _local1.ba) / 300) * 100);

		}
		if(	ga.(1 * 100) = "function(	p_obj,p_value,p_parameters)
	{
		.0;
		undefined;
		undefined;
		new Object(Math.round((1 - (_local1.ra + _local1.ga + _local1.ba) / 300) * 100),bb,1 * 100,ba,Math.round((1 - (_local1.ra + _local1.ga + _local1.ba) / 300) * 100),gb);
		new Color().setTransform(new Object(Math.round((1 - (_local1.ra + _local1.ga + _local1.ba) / 300) * 100),bb,1 * 100,ba,Math.round((1 - (_local1.ra + _local1.ga + _local1.ba) / 300) * 100),gb));
	}";
!.0)
		{

		} // end if
		else
		{

		}
		if(!.0)
		{

		} // end if
		else
		{

		}
		if(!.0)
		{

		} // end if
		else
		{

		}
		if(	caurina.transitions.properties.ColorShortcuts.LUMINANCE_G.caurina.transitions.properties.ColorShortcuts.LUMINANCE_B = "function(	p_obj,p_parameters)
	{
		var _local1 = caurina.transitions.properties.ColorShortcuts.getObjectMatrix();
		.0;
		var _local2 = 0.3333;
		0.3333;
		var _local3 = 0.3333;
		var _local6 = (((_local1.0 - _local2) / (1 - _local2) + (_local1.6 - 0.3333) / (1 - 0.3333) + (_local1.12 - _local3) / (1 - _local3)) / 3);
		1 - (_local1.1 / 0.3333 + _local1.2 / _local3 + _local1.5 / _local2 + _local1.7 / _local3 + _local1.10 / _local2 + _local1.11 / 0.3333) / 6;
	}";
!.0)
		{

		} // end if
		else
		{

		}
		if(!.0)
		{

		} // end if
		else
		{

		}
		if(!.0)
		{

		} // end if
		else
		{

		}
		while(if(	caurina.transitions.properties.ColorShortcuts.LUMINANCE_G.caurina.transitions.properties.ColorShortcuts.LUMINANCE_B = "function(	p_obj,p_value,p_parameters)
	{
		.0;
		0.3333;
		var _local10 = 0.3333;
		var _local8 = 0.3333;
		;
		1 - ;
		0.3333 * (1 - );
		_local10 * (1 - );
		_local8 * (1 - );
		var _local9 = new Array(0.3333 * (1 - ) + ,_local10 * (1 - ),_local8 * (1 - ),0,0,0.3333 * (1 - ),_local10 * (1 - ) + ,_local8 * (1 - ),0,0,0.3333 * (1 - ),_local10 * (1 - ),_local8 * (1 - ) + ,0,0,0,0,0,1,0);
		caurina.transitions.properties.ColorShortcuts.setObjectMatrix(,_local9);
	}";
	._contrast_get = "function(	p_obj,p_parameters)
	{
		new Color(_local10 * (1 - )).getTransform();
		undefined;
		undefined;
		var _local3 = ((new Color(_local10 * (1 - )).getTransform().ra + new Color(_local10 * (1 - )).getTransform().ga + new Color(_local10 * (1 - )).getTransform().ba) / 300 - 1);
		var _local2 = (((new Color(_local10 * (1 - )).getTransform().rb + new Color(_local10 * (1 - )).getTransform().gb + new Color(_local10 * (1 - )).getTransform().bb) / 3) / -128);
	}";
	ga.((_local10 * (1 - ) + 1) * 100) = "function(	p_obj,p_value,p_parameters)
	{
		undefined;
		undefined;
		_local10 * (1 - ) + 1;
		var _local1 = Math.round((_local10 * (1 - )) * -128);
		new Object(_local1,bb,(_local10 * (1 - ) + 1) * 100,ba,_local1,gb);
		new Color().setTransform(new Object(_local1,bb,(_local10 * (1 - ) + 1) * 100,ba,_local1,gb));
	}";
)
		{
			new Array().0.distance = caurina.transitions.properties.ColorShortcuts.getHueDistance(caurina.transitions.properties.ColorShortcuts.getObjectMatrix(_local8),new Array().0.matrix);
			0++;
		} // end while
			if()
		{
			if(new Array().0.distance < new Array().1.distance)
			{
				var _local2 = 1;

			} // end if
			else
			{
				0;

			}
		while(			new Array().0.angle = (new Array().0.angle + new Array().1.angle) / 2;
			new Array().0.matrix = caurina.transitions.properties.ColorShortcuts.getHueMatrix(new Array().0.angle);
			new Array().0.distance = caurina.transitions.properties.ColorShortcuts.getHueDistance(caurina.transitions.properties.ColorShortcuts.getObjectMatrix(_local8),new Array().0.matrix);
			0++;
		} // end while
			if(	new Array().1 = "function(	p_obj,p_parameters)
	{
		caurina.transitions.properties.ColorShortcuts.getObjectMatrix(_local8);
		new Array();
		angle.-179.9000 = new Object(caurina.transitions.properties.ColorShortcuts.getHueMatrix(-179.9000),matrix);
		angle.180 = new Object(caurina.transitions.properties.ColorShortcuts.getHueMatrix(180),matrix);
		0;
		15;
		undefined;
		0;
	}";
	new Array()._hue_set = "function(	p_obj,p_value,p_parameters)
	{
		caurina.transitions.properties.ColorShortcuts.setObjectMatrix(p_obj,caurina.transitions.properties.ColorShortcuts.getHueMatrix(p_parameters));
	}";
	p_parameters.getHueDistance = "function(	mtx1,mtx2)
	{
	}";
	mtx2.getHueMatrix = "function(	hue)
	{
		(_local8 * 3.1416) / 180;
		caurina.transitions.properties.ColorShortcuts.LUMINANCE_R;
		caurina.transitions.properties.ColorShortcuts.LUMINANCE_G;
		var _local4 = caurina.transitions.properties.ColorShortcuts.LUMINANCE_B;
		Math.cos((_local8 * 3.1416) / 180);
		Math.sin((_local8 * 3.1416) / 180);
		var _local7 = new Array(caurina.transitions.properties.ColorShortcuts.LUMINANCE_R + Math.cos((_local8 * 3.1416) / 180) * (1 - caurina.transitions.properties.ColorShortcuts.LUMINANCE_R) + Math.sin((_local8 * 3.1416) / 180) * (-caurina.transitions.properties.ColorShortcuts.LUMINANCE_R),caurina.transitions.properties.ColorShortcuts.LUMINANCE_G + Math.cos((_local8 * 3.1416) / 180) * (-caurina.transitions.properties.ColorShortcuts.LUMINANCE_G) + Math.sin((_local8 * 3.1416) / 180) * (-caurina.transitions.properties.ColorShortcuts.LUMINANCE_G),_local4 + Math.cos((_local8 * 3.1416) / 180) * (-_local4) + Math.sin((_local8 * 3.1416) / 180) * (1 - _local4),0,0,caurina.transitions.properties.ColorShortcuts.LUMINANCE_R + Math.cos((_local8 * 3.1416) / 180) * (-caurina.transitions.properties.ColorShortcuts.LUMINANCE_R) + Math.sin((_local8 * 3.1416) / 180) * 0.1430,caurina.transitions.properties.ColorShortcuts.LUMINANCE_G + Math.cos((_local8 * 3.1416) / 180) * (1 - caurina.transitions.properties.ColorShortcuts.LUMINANCE_G) + Math.sin((_local8 * 3.1416) / 180) * 0.1400,_local4 + Math.cos((_local8 * 3.1416) / 180) * (-_local4) + Math.sin((_local8 * 3.1416) / 180) * -0.2830,0,0,caurina.transitions.properties.ColorShortcuts.LUMINANCE_R + Math.cos((_local8 * 3.1416) / 180) * (-caurina.transitions.properties.ColorShortcuts.LUMINANCE_R) + Math.sin((_local8 * 3.1416) / 180) * (-1 - caurina.transitions.properties.ColorShortcuts.LUMINANCE_R),caurina.transitions.properties.ColorShortcuts.LUMINANCE_G + Math.cos((_local8 * 3.1416) / 180) * (-caurina.transitions.properties.ColorShortcuts.LUMINANCE_G) + Math.sin((_local8 * 3.1416) / 180) * caurina.transitions.properties.ColorShortcuts.LUMINANCE_G,_local4 + Math.cos((_local8 * 3.1416) / 180) * (1 - _local4) + MathÍ|";
_local1 < p_obj.filters.length)
		{
			if(instanceof(flash.filters.ColorMatrixFilter,flash.filters.ColorMatrixFilter))
			{

			} // end if
		while(			_local1++;
		} // end while
			if(	Math.cos((_local8 * 3.1416) / 180).getObjectMatrix = "function(	p_obj)
	{
		var _local1 = 0;
	}";
)
		{
			if(instanceof(flash.filters.ColorMatrixFilter,flash.filters.ColorMatrixFilter))
			{
				((_local8 * 3.1416) / 180).filters.concat().0.matrix = p_obj.concat();
				var _local3 = true;

			} // end if
		while(			0++;
		} // end while
		if(!_local3)
		{
			flash.filters.ColorMatrixFilter(p_obj);
			((_local8 * 3.1416) / 180).filters.concat().((_local8 * 3.1416) / 180).filters.concat().length = flash.filters.ColorMatrixFilter(p_obj);

		} // end if
	(_local1++).setObjectMatrix = "function(	p_obj,p_matrix)
	{
		(_local8 * 3.1416) / 180).filters.concat(;
		false;
		0;
		((_local8 * 3.1416) / 180).filters = (_local8 * 3.1416) / 180).filters.concat(;
	}";
	(0++).LUMINANCE_R = 0.2127;
	(0++).LUMINANCE_G = 0.7152;
	(0++).LUMINANCE_B = 0.0722;

} // end if
ASSetPropFlags(caurina.transitions.properties.ColorShortcuts.prototype,null,1);
