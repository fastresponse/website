
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
		if(!_global.net.slideshowpro.slideshowpro.observers.ContentAreaPreview)
{
	net.slideshowpro.slideshowpro.observers.ContentAreaPreview = "function(	)
	{
		super.undefined();
	}";
	extends();
	function(	)
	{
		super.undefined();
	}.prototype;
	create.net.slideshowpro.slideshowpro.observers.ContentAreaPreview = "function(	target_mc,oC,version)
	{
		caseOp();
		var _local1 = version.attachMovie("ContentAreaPreviewSymbol","pva_mc",1);
		_local1._oC = "oC";
		_local1.version = "";
		_local1.init();
	}";
	oC.init = "function(	)
	{
		this._oC.caClass.addObserver(this);
	}";
	oC.dimensionUpdate = "function(	d)
	{
		this._dim = "d";
		this.draw();
		this.arrange();
	}";
!(this._oC.captionAppearance == "Inline"))
		{
			this.t_txt.text = this._dim.caWidth + "px / " + this._dim.caHeight + "px";

		} // end if
		else
		{
			this.t_txt.text = this._dim.caWidth + "px (minimum) / " + this._dim.caHeight + "px (minimum)";

		}
	d.draw = "function(	)
	{
		this.v_txt.text = this.version;
	}";
	d.arrange = "function(	)
	{
		this._x = this._oC.GLOBAL_PAD;
		this._y = this._dim.caTopM + this._oC.GLOBAL_PAD;
	}";

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.ContentAreaPreview.prototype,null,1);
