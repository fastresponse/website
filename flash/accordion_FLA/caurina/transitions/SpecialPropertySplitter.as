
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
if(!_global.caurina.transitions.SpecialPropertySplitter)
{
	caurina.transitions.SpecialPropertySplitter = "function(	p_splitFunction,p_parameters)
	{
		this.splitValues = "";
		this.parameters = "p_parameters";
	}";
	function(	p_splitFunction,p_parameters)
	{
		this.splitValues = "";
		this.parameters = "p_parameters";
	}.prototype;
	function(	p_splitFunction,p_parameters)
	{
		this.splitValues = "";
		this.parameters = "p_parameters";
	}.prototype.splitValues = "function(	p_value,p_parameters)
	{
	}";
	function(	p_splitFunction,p_parameters)
	{
		this.splitValues = "";
		this.parameters = "p_parameters";
	}.prototype.toString = "function(	)
	{
		;
		"" + "[SpecialPropertySplitter ";
		"" + "[SpecialPropertySplitter " + "splitValues:" + this.splitValues.toString();
		"" + "[SpecialPropertySplitter " + "splitValues:" + this.splitValues.toString() + ", ";
		"" + "[SpecialPropertySplitter " + "splitValues:" + this.splitValues.toString() + ", " + "parameters:" + this.parameters.toString();
		"" + "[SpecialPropertySplitter " + "splitValues:" + this.splitValues.toString() + ", " + "parameters:" + this.parameters.toString() + "]";
	}";

} // end if
ASSetPropFlags(caurina.transitions.SpecialPropertySplitter.prototype,null,1);
