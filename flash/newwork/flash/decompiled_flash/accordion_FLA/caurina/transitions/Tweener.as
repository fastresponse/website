
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
		if(!_global.caurina.transitions.Tweener)
{
	caurina.transitions.Tweener = var _local1 = function(	)
	{
		trace("Tweener is an static class and should not be instantiated.");
	};
	_local1.prototype;
p_parameters == undefined)
		{

		} // end if
		if(instanceof(Array,Array))
		{
			p_parameters.concat();

		} // end if
		else
		{
			new Array(p_parameters);

		}
		if(!caurina.transitions.Tweener._inited)
		{
			caurina.transitions.Tweener.init();

		} // end if
		if(caurina.transitions.Tweener._engineExists&&_root.caurina.transitions.Tweener.getControllerName() == undefined)
		{
			caurina.transitions.Tweener.startEngine();

		} // end if
		if(!isNaN(_local5.time))
		{

		} // end if
		else
		{

		}
		if(!isNaN(_local5.delay))
		{

		} // end if
		else
		{

		}
							while(if(!(_local5 == null))
		{
			var _local2 = _local5;
			if(!_local24._local2)
			{
				if(!(caurina.transitions.Tweener._specialPropertySplitterList._local2 == undefined))
				{
					var _local8 = caurina.transitions.Tweener._specialPropertySplitterList._local2.splitValues(_local5._local2,caurina.transitions.Tweener._specialPropertySplitterList._local2.parameters);
					0;
					if()
					{
						if(!(caurina.transitions.Tweener._specialPropertySplitterList._local8.0.name == undefined))
						{
							var _local9 = caurina.transitions.Tweener._specialPropertySplitterList._local8.0.name.splitValues(_local8.0.value,caurina.transitions.Tweener._specialPropertySplitterList._local8.0.name.parameters);
							0;
							if()
							{
								valueComplete._local9.0.value = new Object(false,isSpecialProperty,_local9.0.arrayIndex,arrayIndex);
								0++;
							} // end while
						
						} // end if
						else
						{
							valueComplete._local8.0.value = new Object(false,isSpecialProperty,_local8.0.arrayIndex,arrayIndex);

						}
					while(						0++;
					} // end while
				
				} // end if
				else
				{
						while(if(!(caurina.transitions.Tweener._specialPropertyModifierList._local2 == undefined))
					{
						var _local10 = caurina.transitions.Tweener._specialPropertyModifierList._local2.modifyValues(_local5._local2);
						0;
						if()
						{
							modifierParameters._local10.0.parameters = new Object(caurina.transitions.Tweener._specialPropertyModifierList._local2.getValue,modifierFunction);
							0++;
						} // end while
					
					} // end if
					else
					{
						valueStart.undefined = new Object(_local5._local2,valueComplete);

					}

				}
			
			} // end if
		while(		} // end while
			if(!(_local4 == null))
		{
			_local4;
			if(!(caurina.transitions.Tweener._specialPropertyList._local4 == undefined))
			{
				_local4._local4.isSpecialProperty = true;

			} // end if
			else
			{
				if(new Array(p_parameters).0._local4 == undefined)
				{
					caurina.transitions.Tweener.printError("The property '" + _local4 + "' doesn't seem to be a normal object property of " + new Array(p_parameters).0.toString() + " or a registered special property.");

				} // end if

			}
		while(		} // end while
			if(!(new Object() == null))
		{
			var _local2 = new Object();
			if(!(_local4._local2 == undefined))
			{
				_local4._local2.modifierParameters = new Object()._local2.modifierParameters;
				_local4._local2.modifierFunction = new Object()._local2.modifierFunction;

			} // end if
		while(		} // end while
		if(typeof(_local5.transition) == "string")
		{
			var _local26 = _local5.transition.toLowerCase();
			caurina.transitions.Tweener._transitionList._local26;

		} // end if
		else
		{
			_local5.transition;

		}
		if(_local5.transition == undefined)
		{
			caurina.transitions.Tweener._transitionList.easeoutexpo;

		} // end if
			while(if()
		{
			new Object();
			enumerate2();
			if(!(_local4 == null))
			{
				_local4;
				new Object()._local4 = caurina.transitions.PropertyInfoObj(_local4._local4.valueStart,_local4._local4.valueComplete,_local4._local4.valueComplete,_local4._local4.arrayIndex,new Object(),_local4._local4.isSpecialProperty,_local4._local4.modifierFunction,_local4._local4.modifierParameters);
			} // end while
			if(_local5.useFrames == true)
			{
				caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTimeFrame + _local12 / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTimeFrame + (_local12 + _local19) / caurina.transitions.Tweener._timeScale,true,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams);

			} // end if
			else
			{
				caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams);

			}
			if(			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).properties = new Object();
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).onStart = _local5.onStart;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).onUpdate = _local5.onUpdate;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).onComplete = _local5.onComplete;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).onOverwrite = _local5.onOverwrite;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).onError = _local5.onError;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).onStartParams = _local5.onStartParams;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).onUpdateParams = _local5.onUpdateParams;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).onCompleteParams = _local5.onCompleteParams;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).onOverwriteParams = _local5.onOverwriteParams;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).onStartScope = _local5.onStartScope;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).onUpdateScope = _local5.onUpdateScope;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).onCompleteScope = _local5.onCompleteScope;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).onOverwriteScope = _local5.onOverwriteScope;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).onErrorScope = _local5.onErrorScope;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).rounded = _local5.rounded;
			caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).skipUpdates = _local5.skipUpdates;
!_local5.quickAdd)
			{
				caurina.transitions.Tweener.removeTweensByTime(caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).scope,caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).properties,caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).timeStart,caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams).timeComplete);

			} // end if
			if(			caurina.transitions.Tweener._tweenList.push(caurina.transitions.TweenListObj(new Array(p_parameters).0,caurina.transitions.Tweener._currentTime + (_local12 * 1000) / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + (_local12 * 1000 + _local19 * 1000) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local5.transitionParams));
_local19 == 0&&_local12 == 0)
			{
				caurina.transitions.Tweener._tweenList.length - 1;
				caurina.transitions.Tweener.updateTweenByIndex(caurina.transitions.Tweener._tweenList.length - 1);
				caurina.transitions.Tweener.removeTweenByIndex(caurina.transitions.Tweener._tweenList.length - 1);

			} // end if
		while(			0++;
		} // end while
		if(	_local4._local2 = "function(	p_scopes,p_parameters)
	{
		var _local3 = undefined;
		var _local7 = undefined;
		undefined;
		var _local11 = undefined;
		var _local5 = caurina.transitions.TweenListObj.makePropertiesChain();
		var _local19 = 0;
		var _local12 = 0;
		var _local4 = new Object();
		var _local24 = new Object(true,quickAdd,true,onErrorScope,true,onOverwriteScope,true,onCompleteScope,true,onUpdateScope,true,onStartScope,true,onOverwriteParams,true,onCompleteParams,true,onUpdateParams,true,onStartParams,true,rounded);
		new Object();
		enumerate2();
		enumerate2();
		enumerate2();
		var _local21 = undefined;
		var _local14 = undefined;
		var _local6 = undefined;
		var _local20 = undefined;
		0;
	}";
_local10 == undefined)
		{

		} // end if
		if(instanceof(Array,Array))
		{
			var _local6 = _local10.concat();

		} // end if
		else
		{
			new Array(_local10);

		}
		if(!caurina.transitions.Tweener._inited)
		{
			caurina.transitions.Tweener.init();

		} // end if
		if(caurina.transitions.Tweener._engineExists&&_root.caurina.transitions.Tweener.getControllerName() == undefined)
		{
			caurina.transitions.Tweener.startEngine();

		} // end if
		if(!isNaN(_local12.time))
		{

		} // end if
		else
		{

		}
		if(!isNaN(_local12.delay))
		{

		} // end if
		else
		{

		}
		if(typeof(_local12.transition) == "string")
		{
			_local12.transition.toLowerCase();
			caurina.transitions.Tweener._transitionList._local12.transition.toLowerCase();

		} // end if
		else
		{
			_local12.transition;

		}
		if(_local12.transition == undefined)
		{
			caurina.transitions.Tweener._transitionList.easeoutexpo;

		} // end if
			if(_local5 < new Array(_local10).length)
		{
			if(_local12.useFrames == true)
			{
				caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTimeFrame + ,caurina.transitions.Tweener._currentTimeFrame + ,true,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams);

			} // end if
			else
			{
				caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams);

			}
			if(			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).properties = undefined;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).onStart = _local12.onStart;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).onUpdate = _local12.onUpdate;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).onComplete = _local12.onComplete;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).onOverwrite = _local12.onOverwrite;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).onStartParams = _local12.onStartParams;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).onUpdateParams = _local12.onUpdateParams;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).onCompleteParams = _local12.onCompleteParams;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).onOverwriteParams = _local12.onOverwriteParams;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).onStartScope = _local12.onStartScope;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).onUpdateScope = _local12.onUpdateScope;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).onCompleteScope = _local12.onCompleteScope;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).onOverwriteScope = _local12.onOverwriteScope;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).onErrorScope = _local12.onErrorScope;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).isCaller = true;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).count = _local12.count;
			caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams).waitFrames = _local12.waitFrames;
			caurina.transitions.Tweener._tweenList.push(caurina.transitions.TweenListObj(new Array(_local10)._local5,caurina.transitions.Tweener._currentTime +  / caurina.transitions.Tweener._timeScale,caurina.transitions.Tweener._currentTime + ( + ) / caurina.transitions.Tweener._timeScale,false,caurina.transitions.Tweener._transitionList.easeoutexpo,_local12.transitionParams));
&&)
			{
				var _local8 = (caurina.transitions.Tweener._tweenList.length - 1);
				caurina.transitions.Tweener.updateTweenByIndex(_local8);
				caurina.transitions.Tweener.removeTweenByIndex(_local8);

			} // end if
		while(			_local5++;
		} // end while
								if(	_local12.time._local12.delay = "function(	p_scopes,p_parameters)
	{
		undefined;
		undefined;
		_local12;
		0;
		0;
		undefined;
		var _local2 = undefined;
		undefined;
		var _local5 = 0;
	}";
_local1 < _local7)
		{
			if(_local8 == caurina.transitions.Tweener._tweenList._local1.scope)
			{
caurina.transitions.Tweener._transitionList.easeoutexpo > caurina.transitions.Tweener._tweenList._local1.timeStart&&				if(_local10 < caurina.transitions.Tweener._tweenList._local1.timeComplete)
				{
					var _local4 = false;
					enumerate2();
					if(!(caurina.transitions.Tweener._tweenList._local1.properties == null))
					{
						var _local2 = caurina.transitions.Tweener._tweenList._local1.properties;
						if(!(p_timeStart._local2 == undefined))
						{
							if(!(caurina.transitions.Tweener._tweenList._local1.onOverwrite == undefined))
							{
								if(caurina.transitions.Tweener._tweenList._local1.onOverwriteScope == undefined)
								{

								} // end if
								else
								{

								}
