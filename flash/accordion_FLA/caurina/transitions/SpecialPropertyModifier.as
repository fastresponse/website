
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
if(!_global.caurina.transitions.SpecialPropertyModifier)
{
	caurina.transitions.SpecialPropertyModifier = "function(	p_modifyFunction,p_getFunction)
	{
		this.modifyValues = "";
		this.getValue = "p_getFunction";
	}";
	function(	p_modifyFunction,p_getFunction)
	{
		this.modifyValues = "";
		this.getValue = "p_getFunction";
	}.prototype;
	function(	p_modifyFunction,p_getFunction)
	{
		this.modifyValues = "";
		this.getValue = "p_getFunction";
	}.prototype.toString = "function(	)
	{
		;
		"" + "[SpecialPropertyModifier ";
		"" + "[SpecialPropertyModifier " + "modifyValues:" + this.modifyValues.toString();
		"" + "[SpecialPropertyModifier " + "modifyValues:" + this.modifyValues.toString() + ", ";
		"" + "[SpecialPropertyModifier " + "modifyValues:" + this.modifyValues.toString() + ", " + "getValue:" + this.getValue.toString();
		"" + "[SpecialPropertyModifier " + "modifyValues:" + this.modifyValues.toString() + ", " + "getValue:" + this.getValue.toString() + "]";
	}";

} // end if
ASSetPropFlags(caurina.transitions.SpecialPropertyModifier.prototype,null,1);
