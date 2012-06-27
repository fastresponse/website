
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
if(!_global.net.slideshowpro.slideshowpro.managers)
{
	_global.net.slideshowpro.slideshowpro.managers = new Object();

} // end if
;
		if(!_global.net.slideshowpro.slideshowpro.managers.PreloadAsset)
{
manager_obj == undefined)
		{
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager();
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager().assets_array.push(this);
			this._standalone_boolean = true;
			net.slideshowpro.slideshowpro.managers.PreloadAssetManager().start();

		} // end if
		else
		{
			this._standalone_boolean = false;

		}
				if(	net.slideshowpro.slideshowpro.managers.PreloadAsset = "function(	url_str,onComplete_func,onCompleteArguments_array,manager_obj)
	{
		this._preloaded_boolean = false;
		this._onComplete_func = "";
		this._onCompleteArguments_array = "";
		this._url_str = "onCompleteArguments_array";
		this.fileType_str = onCompleteArguments_array.substr(onCompleteArguments_array.length - 3,3).toLowerCase();
		this.bytesTotal = 0;
		this._manager_obj = net.slideshowpro.slideshowpro.managers.PreloadAssetManager();
		this.pause = this._manager_obj.pause;
		this.resume = this._manager_obj.resume;
		this.start = this._manager_obj.start;
	}";
	function(	url_str,onComplete_func,onCompleteArguments_array,manager_obj)
	{
		this._preloaded_boolean = false;
		this._onComplete_func = "";
		this._onCompleteArguments_array = "";
		this._url_str = "onCompleteArguments_array";
		this.fileType_str = onCompleteArguments_array.substr(onCompleteArguments_array.length - 3,3).toLowerCase();
		this.bytesTotal = 0;
		this._manager_obj = net.slideshowpro.slideshowpro.managers.PreloadAssetManager();
		this.pause = this._manager_obj.pause;
		this.resume = this._manager_obj.resume;
		this.start = this._manager_obj.start;
	}.prototype;
	function(	url_str,onComplete_func,onCompleteArguments_array,manager_obj)
	{
		this._preloaded_boolean = false;
		this._onComplete_func = "";
		this._onCompleteArguments_array = "";
		this._url_str = "onCompleteArguments_array";
		this.fileType_str = onCompleteArguments_array.substr(onCompleteArguments_array.length - 3,3).toLowerCase();
		this.bytesTotal = 0;
		this._manager_obj = net.slideshowpro.slideshowpro.managers.PreloadAssetManager();
		this.pause = this._manager_obj.pause;
		this.resume = this._manager_obj.resume;
		this.start = this._manager_obj.start;
	}.prototype.prioritize = "function(	)
	{
		this._manager_obj.prioritizeAsset(this);
	}";
!this._preloaded_boolean||b)
		{
			this._preloaded_boolean = true;
			if(!(this._onComplete_func == undefined))
			{
!(this._onCompleteArguments_array.length == undefined)||				if(this._onCompleteArguments_array.length == 0)
				{
					this._onCompleteArguments_array = new Array(this);

				} // end if
				else
				{
					this._onCompleteArguments_array.push(this);

				}
							this._onComplete_func.apply(null,this._onCompleteArguments_array);

			} // end if
			if(this._standalone_boolean)
			{
				this._manager_obj.destroy();
				delete this._manager_obj				__set__preloaded_boolean;

			} // end if
		
		} // end if
	. = "function(	b)
	{
		function(	url_str,onComplete_func,onCompleteArguments_array,manager_obj)
	{
		this._preloaded_boolean = false;
		this._onComplete_func = "";
		this._onCompleteArguments_array = "";
		this._url_str = "onCompleteArguments_array";
		this.fileType_str = onCompleteArguments_array.substr(onCompleteArguments_array.length - 3,3).toLowerCase();
		this.bytesTotal = 0;
		this._manager_obj = net.slideshowpro.slideshowpro.managers.PreloadAssetManager();
		this.pause = this._manager_obj.pause;
		this.resume = this._manager_obj.resume;
		this.start = this._manager_obj.start;
	}.prototype;
	}";
	b.__get__preloaded_boolean = "function(	)
	{
	}";
	b.__get__url_str = "function(	)
	{
	}";
	b.__get__manager_obj = "function(	)
	{
	}";
	b.__get__bytesLoaded = "function(	)
	{
	}";
	b.getBytesLoaded = "function(	)
	{
	}";
	b.getBytesTotal = "function(	)
	{
	}";

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.managers.PreloadAsset.prototype,null,1);
