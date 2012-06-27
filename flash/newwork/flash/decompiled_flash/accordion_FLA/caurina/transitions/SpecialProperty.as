
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
if(!_global.caurina.transitions.SpecialProperty)
{
	caurina.transitions.SpecialProperty = "function(	p_getFunction,p_setFunction,p_parameters,p_preProcessFunction)
	{
		this.getValue = "p_preProcessFunction";
		this.setValue = "p_setFunction";
		this.parameters = "";
		this.preProcess = "";
	}";
	function(	p_getFunction,p_setFunction,p_parameters,p_preProcessFunction)
	{
		this.getValue = "p_preProcessFunction";
		this.setValue = "p_setFunction";
		this.parameters = "";
		this.preProcess = "";
	}.prototype;
	function(	p_getFunction,p_setFunction,p_parameters,p_preProcessFunction)
	{
		this.getValue = "p_preProcessFunction";
		this.setValue = "p_setFunction";
		this.parameters = "";
		this.preProcess = "";
	}.prototype.toString = "function(	)
	{
		;
		"" + "[SpecialProperty ";
		"" + "[SpecialProperty " + "getValue:" + this.getValue.toString();
		"" + "[SpecialProperty " + "getValue:" + this.getValue.toString() + ", ";
		"" + "[SpecialProperty " + "getValue:" + this.getValue.toString() + ", " + "setValue:" + this.setValue.toString();
		"" + "[SpecialProperty " + "getValue:" + this.getValue.toString() + ", " + "setValue:" + this.setValue.toString() + ", ";
		"" + "[SpecialProperty " + "getValue:" + this.getValue.toString() + ", " + "setValue:" + this.setValue.toString() + ", " + "parameters:" + this.parameters.toString();
		"" + "[SpecialProperty " + "getValue:" + this.getValue.toString() + ", " + "setValue:" + this.setValue.toString() + ", " + "parameters:" + this.parameters.toString() + ", ";
		"" + "[SpecialProperty " + "getValue:" + this.getValue.toString() + ", " + "setValue:" + this.setValue.toString() + ", " + "parameters:" + this.parameters.toString() + ", " + "preProcess:" + this.preProcess.toString();
		"" + "[SpecialProperty " + "getValue:" + this.getValue.toString() + ", " + "setValue:" + this.setValue.toString() + ", " + "parameters:" + this.parameters.toString() + ", " + "preProcess:" + this.preProcess.toString() + "]";
	}";

} // end if
ASSetPropFlags(caurina.transitions.SpecialProperty.prototype,null,1);
