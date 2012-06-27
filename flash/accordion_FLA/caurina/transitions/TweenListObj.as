
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
		while(if(!_global.caurina.transitions.TweenListObj)
{
	caurina.transitions.TweenListObj = "function(	p_scope,p_timeStart,p_timeComplete,p_useFrames,p_transition,p_transitionParams)
	{
		this.scope = "p_transition";
		this.timeStart = "";
		this.timeComplete = "p_transitionParams";
		this.useFrames = "";
		this.transition = "p_timeComplete";
		this.transitionParams = "";
		this.properties = new Object();
		this.isPaused = false;
		this.timePaused = undefined;
		this.isCaller = false;
		this.updatesSkipped = 0;
		this.timesCalled = 0;
		this.skipUpdates = 0;
		this.hasStarted = false;
	}";
	function(	p_scope,p_timeStart,p_timeComplete,p_useFrames,p_transition,p_transitionParams)
	{
		this.scope = "p_transition";
		this.timeStart = "";
		this.timeComplete = "p_transitionParams";
		this.useFrames = "";
		this.transition = "p_timeComplete";
		this.transitionParams = "";
		this.properties = new Object();
		this.isPaused = false;
		this.timePaused = undefined;
		this.isCaller = false;
		this.updatesSkipped = 0;
		this.timesCalled = 0;
		this.skipUpdates = 0;
		this.hasStarted = false;
	}.prototype;
!(this.properties == null))
		{
			this.properties;
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).properties.this.properties = this.properties.this.properties.clone();
		} // end while
		if(!p_transitionParams)
		{
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).onStart = this.onStart;
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).onUpdate = this.onUpdate;
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).onComplete = this.onComplete;
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).onOverwrite = this.onOverwrite;
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).onError = this.onError;
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).onStartParams = this.onStartParams;
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).onUpdateParams = this.onUpdateParams;
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).onCompleteParams = this.onCompleteParams;
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).onOverwriteParams = this.onOverwriteParams;
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).onStartScope = this.onStartScope;
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).onUpdateScope = this.onUpdateScope;
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).onCompleteScope = this.onCompleteScope;
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).onOverwriteScope = this.onOverwriteScope;
			caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).onErrorScope = this.onErrorScope;

		} // end if
			if(	function(	p_scope,p_timeStart,p_timeComplete,p_useFrames,p_transition,p_transitionParams)
	{
		this.scope = "p_transition";
		this.timeStart = "";
		this.timeComplete = "p_transitionParams";
		this.useFrames = "";
		this.transition = "p_timeComplete";
		this.transitionParams = "";
		this.properties = new Object();
		this.isPaused = false;
		this.timePaused = undefined;
		this.isCaller = false;
		this.updatesSkipped = 0;
		this.timesCalled = 0;
		this.skipUpdates = 0;
		this.hasStarted = false;
	}.prototype.clone = "function(	omitEvents)
	{
		caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams);
		caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).properties = new Object();
		enumerate2();
		caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).skipUpdates = this.skipUpdates;
		caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).updatesSkipped = this.updatesSkipped;
		caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).rounded = this.rounded;
		caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).isPaused = this.isPaused;
		caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).timePaused = this.timePaused;
		caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).isCaller = this.isCaller;
		caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).count = this.count;
		caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).timesCalled = this.timesCalled;
		caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).waitFrames = this.waitFrames;
		caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).hasStarted = this.hasStarted;
	}";
!(this.properties == null))
		{
			this.properties;
			if(!_local3)
			{
				"
[TweenListObj " + "scope:" + this.scope + ", properties:" + ",";

			} // end if
		while(			"
[TweenListObj " + "scope:" + this.scope + ", properties:" + "," + "[name:" + this.properties.this.properties.name;
			var _local2 = ("
[TweenListObj " + "scope:" + this.scope + ", properties:" + "," + "[name:" + this.properties.this.properties.name + ",valueStart:" + this.properties.this.properties.valueStart);
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete;
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]";
			false;
		} // end while
		if(this.skipUpdates)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates;

		} // end if
		if(this.updatesSkipped)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped;

		} // end if
		if(this.onStart)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart;

		} // end if
		if(this.onUpdate)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate;

		} // end if
		if(this.onComplete)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete;

		} // end if
		if(this.onOverwrite)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite;

		} // end if
		if(this.onError)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError;

		} // end if
		if(this.onStartParams)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams;

		} // end if
		if(this.onUpdateParams)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams;

		} // end if
		if(this.onCompleteParams)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams;

		} // end if
		if(this.onOverwriteParams)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams;

		} // end if
		if(this.onStartScope)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams + ", onStartScope:" + this.onStartScope;

		} // end if
		if(this.onUpdateScope)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams + ", onStartScope:" + this.onStartScope + ", onUpdateScope:" + this.onUpdateScope;

		} // end if
		if(this.onCompleteScope)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams + ", onStartScope:" + this.onStartScope + ", onUpdateScope:" + this.onUpdateScope + ", onCompleteScope:" + this.onCompleteScope;

		} // end if
		if(this.onOverwriteScope)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams + ", onStartScope:" + this.onStartScope + ", onUpdateScope:" + this.onUpdateScope + ", onCompleteScope:" + this.onCompleteScope + ", onOverwriteScope:" + this.onOverwriteScope;

		} // end if
		if(this.onErrorScope)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams + ", onStartScope:" + this.onStartScope + ", onUpdateScope:" + this.onUpdateScope + ", onCompleteScope:" + this.onCompleteScope + ", onOverwriteScope:" + this.onOverwriteScope + ", onErrorScope:" + this.onErrorScope;

		} // end if
		if(this.rounded)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams + ", onStartScope:" + this.onStartScope + ", onUpdateScope:" + this.onUpdateScope + ", onCompleteScope:" + this.onCompleteScope + ", onOverwriteScope:" + this.onOverwriteScope + ", onErrorScope:" + this.onErrorScope + ", rounded:" + this.rounded;

		} // end if
		if(this.isPaused)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams + ", onStartScope:" + this.onStartScope + ", onUpdateScope:" + this.onUpdateScope + ", onCompleteScope:" + this.onCompleteScope + ", onOverwriteScope:" + this.onOverwriteScope + ", onErrorScope:" + this.onErrorScope + ", rounded:" + this.rounded + ", isPaused:" + this.isPaused;

		} // end if
		if(this.timePaused)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams + ", onStartScope:" + this.onStartScope + ", onUpdateScope:" + this.onUpdateScope + ", onCompleteScope:" + this.onCompleteScope + ", onOverwriteScope:" + this.onOverwriteScope + ", onErrorScope:" + this.onErrorScope + ", rounded:" + this.rounded + ", isPaused:" + this.isPaused + ", timePaused:" + this.timePaused;

		} // end if
		if(this.isCaller)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams + ", onStartScope:" + this.onStartScope + ", onUpdateScope:" + this.onUpdateScope + ", onCompleteScope:" + this.onCompleteScope + ", onOverwriteScope:" + this.onOverwriteScope + ", onErrorScope:" + this.onErrorScope + ", rounded:" + this.rounded + ", isPaused:" + this.isPaused + ", timePaused:" + this.timePaused + ", isCaller:" + this.isCaller;

		} // end if
		if(this.count)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams + ", onStartScope:" + this.onStartScope + ", onUpdateScope:" + this.onUpdateScope + ", onCompleteScope:" + this.onCompleteScope + ", onOverwriteScope:" + this.onOverwriteScope + ", onErrorScope:" + this.onErrorScope + ", rounded:" + this.rounded + ", isPaused:" + this.isPaused + ", timePaused:" + this.timePaused + ", isCaller:" + this.isCaller + ", count:" + this.count;

		} // end if
		if(this.timesCalled)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams + ", onStartScope:" + this.onStartScope + ", onUpdateScope:" + this.onUpdateScope + ", onCompleteScope:" + this.onCompleteScope + ", onOverwriteScope:" + this.onOverwriteScope + ", onErrorScope:" + this.onErrorScope + ", rounded:" + this.rounded + ", isPaused:" + this.isPaused + ", timePaused:" + this.timePaused + ", isCaller:" + this.isCaller + ", count:" + this.count + ", timesCalled:" + this.timesCalled;

		} // end if
		if(this.waitFrames)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams + ", onStartScope:" + this.onStartScope + ", onUpdateScope:" + this.onUpdateScope + ", onCompleteScope:" + this.onCompleteScope + ", onOverwriteScope:" + this.onOverwriteScope + ", onErrorScope:" + this.onErrorScope + ", rounded:" + this.rounded + ", isPaused:" + this.isPaused + ", timePaused:" + this.timePaused + ", isCaller:" + this.isCaller + ", count:" + this.count + ", timesCalled:" + this.timesCalled + ", waitFrames:" + this.waitFrames;

		} // end if
		if(this.hasStarted)
		{
			_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams + ", onStartScope:" + this.onStartScope + ", onUpdateScope:" + this.onUpdateScope + ", onCompleteScope:" + this.onCompleteScope + ", onOverwriteScope:" + this.onOverwriteScope + ", onErrorScope:" + this.onErrorScope + ", rounded:" + this.rounded + ", isPaused:" + this.isPaused + ", timePaused:" + this.timePaused + ", isCaller:" + this.isCaller + ", count:" + this.count + ", timesCalled:" + this.timesCalled + ", waitFrames:" + this.waitFrames + ", hasStarted:" + this.hasStarted;

		} // end if
				while(if(	caurina.transitions.TweenListObj(this.scope,this.timeStart,this.timeComplete,this.useFrames,this.transition,this.transitionParams).toString = "function(	)
	{
		
[TweenListObj ;
		"
[TweenListObj " + "scope:" + this.scope;
		"
[TweenListObj " + "scope:" + this.scope + ", properties:";
		var _local3 = true;
		enumerate2();
		_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart;
		_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete;
		_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames;
		_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition;
		_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams;
		_local2 + ",valueComplete:" + this.properties.this.properties.valueComplete + "]" + ", timeStart:" + this.timeStart + ", timeComplete:" + this.timeComplete + ", useFrames:" + this.useFrames + ", transition:" + this.transition + ", transitionParams:" + this.transitionParams + ", skipUpdates:" + this.skipUpdates + ", updatesSkipped:" + this.updatesSkipped + ", onStart:" + this.onStart + ", onUpdate:" + this.onUpdate + ", onComplete:" + this.onComplete + ", onOverwrite:" + this.onOverwrite + ", onError:" + this.onError + ", onStartParams:" + this.onStartParams + ", onUpdateParams:" + this.onUpdateParams + ", onCompleteParams:" + this.onCompleteParams + ", onOverwriteParams:" + this.onOverwriteParams + ", onStartScope:" + this.onStartScope + ", onUpdateScope:" + this.onUpdateScope + ", onCompleteScope:" + this.onCompleteScope + ", onOverwriteScope:" + this.onOverwriteScope + ", onErrorScope:" + this.onErrorScope + pP{";
.base)
		{
			new Object();
			undefined;
			if(instanceof(Array,Array))
			{
				var _local2 = new Array();
				var _local3 = 0;
				if(_local3 < .base.length)
				{
					_local2.push(.base._local3);
					_local3++;
				} // end while
			
			} // end if
			else
			{
				new Array(.base);

			}
				if(			new Array(.base).push();
			var _local4 = undefined;
			new Array(.base).length;
			0;
)
			{
				if(new Array(.base).0.base)
				{
					caurina.transitions.AuxFunctions.concatObjects(caurina.transitions.TweenListObj.makePropertiesChain(new Array(.base).0.base),new Array(.base).0);

				} // end if
				else
				{
					new Array(.base).0;

				}
			while(				var _local5 = caurina.transitions.AuxFunctions.concatObjects(new Object(),new Array(.base).0);
				0++;
			} // end while
			if(_local5.base)
			{
				delete _local5.base				makePropertiesChain;

			} // end if
		
		} // end if
		else
		{

		}
	.this = "function(	p_obj)
	{
		.base;
	}";

} // end if
ASSetPropFlags(caurina.transitions.TweenListObj.prototype,null,1);
