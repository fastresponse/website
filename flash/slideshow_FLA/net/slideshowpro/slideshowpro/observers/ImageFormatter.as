
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
		if(!_global.net.slideshowpro.slideshowpro.observers.ImageFormatter)
{
	net.slideshowpro.slideshowpro.observers.ImageFormatter = "function(	o)
	{
		this.init(o);
	}";
	function(	o)
	{
		this.init(o);
	}.prototype;
	function(	o)
	{
		this.init(o);
	}.prototype.init = "function(	o)
	{
		this._oC = "o";
		this._oC.caClass.addObserver(this);
		this.getAssets();
		this.initListeners();
	}";
	o.initListeners = "function(	)
	{
		this;
		new Object();
		new Object().onCaptionDraw = mx.utils.Delegate.create(this,this.afterCaptionDraw);
		this._oC.addEventListener("onCaptionDraw",new Object());
	}";
	new Object().dimensionUpdate = "function(	d)
	{
		this._dim = "d";
	}";
this._oC.contentFrameStrokeAppearance == "Visible")
		{
			this._cSW = 1;

		} // end if
		else
		{
			this._cSW = 0;

		}
		if(this.isFormatted)
		{
			this.formatImage();

		} // end if
		if(	d.draw = "function(	)
	{
		this._sspW = this._oC.__width;
		this._sspH = this._oC.__height;
		this._cM = this._oC.imagesBoxMask;
		this._cBA = this._oC.contentFrameAlpha;
		this._cBC = this._oC.contentFrameColor;
		this._cBP = this._oC.contentFramePadding;
		this._cS = this._oC.contentScale;
		this._cASW = this._oC.STROKE_WEIGHT;
		this._cAlign = this._oC.contentAlign;
		this._wmAlign = this._oC.contentWatermarkAlign;
	}";
	d.afterCaptionDraw = "function(	)
	{
		this.isNewImage = true;
		this.getAssets();
		this.formatImage();
		this._oC.dispatchEventData("onImageFormat");
	}";
this._oC.haveWatermark())
		{
			this.alignWmark();

		} // end if
		if(	d.formatImage = "function(	)
	{
		this.resizeImage();
		this.drawBackgroundAndStroke();
		this.clearCropMask();
		this.alignImage();
		this.isFormatted = true;
	}";
	d.getAssets = "function(	)
	{
		this._wM = this._oC.wmark;
		this._tL = this._oC.thisLoader;
		this._tLB = this._oC.thisLoaderBox;
	}";
this._cS == "Crop to Fit All")
		{
			var _local3 = this._oC.__height;
			this._oC.__width;

		} // end if
		if(this.isNewImage)
		{
			this.initContentW = this._tLB._width;
			this.initContentH = this._tLB._height;
			this.isNewImage = false;

		} // end if
			if(!(this._cS == "Proportional")||this._cS == "Downscale Only")
		{
!(this._oC.__width < this.initContentW)||!(_local3 < this.initContentH)||			if(this._cS == "Proportional")
			{
				_local3 * (this._oC.contentScalePercent / 100);
				var _local4 = (this._oC.__width * (this._oC.contentScalePercent / 100));
				var _local2 = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.initContentW,this.initContentH,_local4,_local3 * (this._oC.contentScalePercent / 100),false);
				this.newH = _local2.newH;
				this.newW = _local2.newW;

			} // end if
		
		} // end if
		else
		{
				if(!(this._cS == "Crop to Fit")||this._cS == "Crop to Fit All")
			{
				net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.initContentW,this.initContentH,_local4,_local3 * (this._oC.contentScalePercent / 100),true);
				this.newH = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.initContentW,this.initContentH,_local4,_local3 * (this._oC.contentScalePercent / 100),true).newH;
				this.newW = net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.initContentW,this.initContentH,_local4,_local3 * (this._oC.contentScalePercent / 100),true).newW;
				this._tL._x = -net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.initContentW,this.initContentH,_local4,_local3 * (this._oC.contentScalePercent / 100),true).oX;
				if(this._cS == "Crop to Fit")
				{
					this._tL._y = this._dim.caTopM - net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.initContentW,this.initContentH,_local4,_local3 * (this._oC.contentScalePercent / 100),true).oY;

				} // end if
				else
				{
					this._tL._y = -net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.initContentW,this.initContentH,_local4,_local3 * (this._oC.contentScalePercent / 100),true).oY;

				}
			
			} // end if

		}
		if(	d.resizeImage = "function(	)
	{
		undefined;
		this._dim.caHeight;
		var _local4 = this._dim.caWidth;
		this.initContentW;
		this.initContentH;
		this.initContentW / this.initContentH;
		this._oC.__width / _local3;
		this.newW = this.initContentW;
		this.newH = this.initContentH;
		this._tLB._height = Math.floor(this.newH);
		this._tLB._width = Math.floor(this.newW);
	}";
this._cSW > 0)
		{
			_local3 + 1;

		} // end if
			if(!(this._cS == "Crop to Fit")||!(this._cS == "Crop to Fit All"))
		{
			if(this._cBP > 0)
			{
				net.slideshowpro.slideshowpro.draw.DrawRect.create(this._tL,this._tLB._width + _local3 + 1,this._tLB._height + _local3 + 1,this._cBC,this._cBA);
				var _local5 = true;

			} // end if
			if(this._cSW > 0)
			{
				this.stroke_mc = this._tL.createEmptyMovieClip("stroke_mc",99);
				net.slideshowpro.slideshowpro.draw.DrawStroke.create(this.stroke_mc,this._tLB._width + _local3 + 1,this._tLB._height + _local3 + 1,this._cSW,this._oC.contentFrameStrokeColor,100);
				var _local4 = true;

			} // end if
		
		} // end if
		if(_local5)
		{
			_local2 + this._cBP;

		} // end if
		if(_local4)
		{
			_local2 + this._cBP + this._cSW;

		} // end if
		if(!(this._tLB._x == (_local2 + this._cBP + this._cSW)))
		{
			this._tLB._x = _local2 + this._cBP + this._cSW;

		} // end if
		if(!(this._tLB._y == (_local2 + this._cBP + this._cSW)))
		{
			this._tLB._y = _local2 + this._cBP + this._cSW;

		} // end if
		if(	net.slideshowpro.slideshowpro.utils.Utils.scaleImage(this.initContentW,this.initContentH,_local4,_local3 * (this._oC.contentScalePercent / 100),true).drawBackgroundAndStroke = "function(	)
	{
		var _local3 = (this._cBP * 2);
		false;
		false;
		var _local2 = 0;
	}";
	(_local2 + this._cBP + this._cSW).createCropMask = "function(	)
	{
		net.slideshowpro.slideshowpro.draw.DrawRect.create(this._cM,this._dim.caWidth,this._dim.caHeight,12657477,50);
		this.setCropMask(this._cM);
		this.prevCropMaskW = this._dim.caWidth;
		this.prevCropMaskH = this._dim.caHeight;
	}";
	(_local2 + this._cBP + this._cSW).setCropMask = "function(	clip)
	{
		this._oC.imagesBox.setMask(clip);
	}";
	clip.clearCropMask = "function(	)
	{
		this._cM.clear();
		this.setCropMask(null);
	}";
this._cS == "Crop to Fit")
		{
			this.createCropMask();
			this._cM._x = 0;
			this._cM._y = this._dim.caTopM;

		} // end if
		if(!(this._cS == "Crop to Fit All"))
		{
			Math.round((this._dim.caWidth - this.newW) / 2) + this._cASW;
			Math.round((this._dim.caHeight - this.newH) / 2) + this._cASW;

		} // end if
		else
		{
			Math.floor((this._oC.__width - this.newW) / 2);
			Math.floor((this._oC.__height - this.newH) / 2);
			var _local3 = true;

		}
			if(this._cAlign == "Center")
		{
			new Object().x = Math.floor((this._oC.__width - this.newW) / 2);
			new Object().y = Math.floor((this._oC.__height - this.newH) / 2);
			if(!_local3)
			{
				new Object().y = new Object().y + this._dim.caTopM;

			} // end if
		
		} // end if
		else
		{
				if(this._cAlign == "Top Left")
			{
				new Object().x = this._cASW;
				new Object().y = this._cASW;
				if(!_local3)
				{
					new Object().y = new Object().y + this._dim.caTopM;

				} // end if
			
			} // end if
			else
			{
					if(this._cAlign == "Top Center")
				{
					new Object().x = Math.floor((this._oC.__width - this.newW) / 2);
					new Object().y = this._cASW;
					if(!_local3)
					{
						new Object().y = new Object().y + this._dim.caTopM;

					} // end if
				
				} // end if
				else
				{
						if(this._cAlign == "Top Right")
					{
						new Object().x = this._sspW - this._tL._width - this._cASW;
						new Object().y = this._cASW;
						if(!_local3)
						{
							new Object().y = new Object().y + this._dim.caTopM;

						} // end if
					
					} // end if
					else
					{
							if(this._cAlign == "Center Right")
						{
							new Object().x = this._sspW - this._tL._width - this._cASW;
							new Object().y = Math.floor((this._oC.__height - this.newH) / 2);
							if(!_local3)
							{
								new Object().y = new Object().y + this._dim.caTopM;

							} // end if
						
						} // end if
						else
						{
								if(this._cAlign == "Bottom Right")
							{
								new Object().x = this._sspW - this._tL._width - this._cASW;
								new Object().y = this._sspH - this._tL._height;
								if(!_local3)
								{
									new Object().y = new Object().y - this._dim.caBotM;

								} // end if
							
							} // end if
							else
							{
									if(this._cAlign == "Bottom Center")
								{
									new Object().x = Math.floor((this._oC.__width - this.newW) / 2);
									new Object().y = this._sspH - this._tL._height;
									if(!_local3)
									{
										new Object().y = new Object().y - this._dim.caBotM;

									} // end if
								
								} // end if
								else
								{
										if(this._cAlign == "Bottom Left")
									{
										new Object().x = this._cASW;
										new Object().y = this._sspH - this._tL._height;
										if(!_local3)
										{
											new Object().y = new Object().y - this._dim.caBotM;

										} // end if
									
									} // end if
									else
									{
											if(this._cAlign == "Center Left")
										{
											new Object().x = this._cASW;
											new Object().y = Math.floor((this._oC.__height - this.newH) / 2);
											if(!_local3)
											{
												new Object().y = new Object().y + this._dim.caTopM;

											} // end if
										
										} // end if

									}

								}

							}

						}

					}

				}

			}

		}
		if(	clip.alignImage = "function(	)
	{
		this._tL._width;
		this._tL._height;
		new Object();
		undefined;
		undefined;
		false;
		this._tL._x = new Object().x;
		this._tL._y = new Object().y;
		new Object();
		new Object().x = this._tL._x;
		new Object().y = this._tL._y;
		new Object().w = this._tL._width;
		new Object().h = this._tL._height;
		this._oC.dispatchEventData("onImageAlign",new Object());
	}";
!(this._cS == "Crop to Fit")||this._cS == "Crop to Fit All")
		{
			this._oC.aaClass.alignWithContentArea(this._wM._width,this._wM._height,this._oC.contentWatermarkAlign,_local5);

		} // end if
		else
		{
			var _local2 = this._oC.aaClass.alignWithContent(this._wM._width,this._wM._height,this._oC.contentWatermarkAlign,this._tL,_local5);

		}
		if(!(this._wM._x == _local2.0))
		{
			this._wM._x = _local2.0;

		} // end if
		if(!(this._wM._y == _local2.1))
		{
			this._wM._y = _local2.1;

		} // end if
	new Object().alignWmark = "function(	)
	{
		var _local5 = this._oC.GLOBAL_PAD;
		var _local2 = new Array();
		_local2.0;
		_local2.1;
		this._wM._visible = true;
	}";
	_local2.isFormatted = false;

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.ImageFormatter.prototype,null,1);
