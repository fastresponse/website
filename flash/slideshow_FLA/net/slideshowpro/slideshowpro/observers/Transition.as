
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
			if(!_global.net.slideshowpro.slideshowpro.observers.Transition)
{
	net.slideshowpro.slideshowpro.observers.Transition = "function(	o)
	{
		this._oC = "o";
		this._oC.caClass.addObserver(this);
		this.init();
	}";
	function(	o)
	{
		this._oC = "o";
		this._oC.caClass.addObserver(this);
		this.init();
	}.prototype;
	function(	o)
	{
		this._oC = "o";
		this._oC.caClass.addObserver(this);
		this.init();
	}.prototype.init = "function(	)
	{
		this.initTransStyle = this._oC.transitionStyle;
		this.initListeners();
	}";
	function(	o)
	{
		this._oC = "o";
		this._oC.caClass.addObserver(this);
		this.init();
	}.prototype.dimensionUpdate = "function(	d)
	{
		this._dim = "d";
	}";
	d.initListeners = "		new Object().onImageAlign = "function(		eventObject)
		{
			self.afterImageAlign(eventObject.data);
		}";
		eventObject._oC.addEventListener("onImageAlign",new Object());
		new Object().onImageFormat = mx.utils.Delegate.create(eventObject,eventObject.startTrans);
		eventObject._oC.addEventListener("onImageFormat",new Object());
	}";
this.isDrawn)
		{
			this.sizeMask();
			if(this.isTransitioning)
			{
				this.fwdAllTweensToEnd();

			} // end if
		
		} // end if
		if(	new Object().draw = "function(	)
	{
		this._w = this._oC.__width;
		this._h = this._oC.__height;
		this._tD = this._oC.transitionDirection;
		this._tS = this._oC.transitionStyle;
		this._tLh = this._oC.transitionLength;
		this._lM = this._oC.imgTransitionMask;
		this._sT = this._oC.strongTween;
		this.isDrawn = true;
	}";
	new Object().afterImageAlign = "function(	o)
	{
		this._fObj = "o";
	}";
this.isTransitioning)
		{
			this.fwdAllTweensToEnd();

		} // end if
			if(this._tLh > 0&&!(this._tS == "None"))
		{
			if(!(this.initTransStyle == this._tS))
			{
				this.reset();
				this.initTransStyle = this._tS;

			} // end if
			if(this._tS == "Blur")
			{
				this.tweenBlur();

			} // end if
			else
			{
				if(this._tS == "Cross Fade")
				{
					this.tweenFade();

				} // end if
				else
				{
						if(this._tS == "Dissolve")
					{
						if(!this.__get__maskDrawn())
						{
							this.drawDissolveMask();

						} // end if
											this.tweenDissolve();

					} // end if
					else
					{
						if(this._tS == "Drop")
						{
							this.tweenDrop();

						} // end if
						else
						{
							if(this._tS == "Fade to Background")
							{
								this.tweenFadeToBackground();

							} // end if
							else
							{
								if(this._tS == "Photo Flash")
								{
									this.tweenFlash();

								} // end if
								else
								{
									if(this._tS == "Push")
									{
										this.tweenPushManager();

									} // end if
									else
									{
											if(this._tS == "Wipe")
										{
											if(!this.__get__maskDrawn())
											{
												this.drawWipeMask();

											} // end if
																					this.tweenWipe();

										} // end if
										else
										{
												if(this._tS == "Wipe and Fade")
											{
												this.extraFade = true;
												if(!this.__get__maskDrawn())
												{
													this.drawWipeMask();

												} // end if
																							this.tweenWipe();

											} // end if
											else
											{
													if(this._tS == "Wipe to Background")
												{
													if(!this.__get__maskDrawn())
													{
														this.drawWipeMask();

													} // end if
																									this.tweenWipeToBG();

												} // end if
												else
												{
														if(this._tS == "Wipe and Fade to Background")
													{
														this.extraFade = true;
														if(!this.__get__maskDrawn())
														{
															this.drawWipeMask();

														} // end if
																											this.tweenWipeToBG();

													} // end if
													else
													{
														if(this._tS == "Lens")
														{
															this.tweenLens();

														} // end if

													}

												}

											}

										}

									}

								}

							}

						}

					}

				}

			}
		
		} // end if
		else
		{
			this.tweenSkip();

		}
		if(	o.pickTrans = "function(	)
	{
		this.killTweenWatcher();
	}";
	o.tweenBlur = "		this._tW2.onMotionChanged = "function(		)
		{
			blur2.blurY = blur2.blurX;
			self._tUL.filters = new Array(blur2);
		}";
		this._tW3 = mx.transitions.Tween(this._tUL,_alpha,this._sT,100,0,this._tLh,true);
		this.setupTweenWatcher(this.afterTrans);
	}";
this.isFirstImg)
		{
			this._tL.setMask(this._lM);

		} // end if
		else
		{
			this._tUL.setMask(this._lM);

		}
			if(this._tD == "Bottom to Top")
		{
			if(this.isFirstImg)
			{
				this._tW1 = mx.transitions.Tween(this._lM,_y,this._sT,this._h,-this.dissolveGradH,this._tLh,true);

			} // end if
			else
			{
				this._tW1 = mx.transitions.Tween(this._lM,_y,this._sT,0,-this._lM._height,this._tLh,true);

			}
		
		} // end if
		else
		{
				if(this._tD == "Top to Bottom")
			{
				if(this.isFirstImg)
				{
					this._tW1 = mx.transitions.Tween(this._lM,_y,this._sT,-this._lM._height,0,this._tLh,true);

				} // end if
				else
				{
					this._tW1 = mx.transitions.Tween(this._lM,_y,this._sT,-this.dissolveGradH,this._h,this._tLh,true);

				}
			
			} // end if
			else
			{
					if(this._tD == "Left to Right")
				{
					if(this.isFirstImg)
					{
						this._tW1 = mx.transitions.Tween(this._lM,_x,this._sT,-this._lM._width,0,this._tLh,true);

					} // end if
					else
					{
						this._tW1 = mx.transitions.Tween(this._lM,_x,this._sT,-this.dissolveGradW,this._w,this._tLh,true);

					}
				
				} // end if
				else
				{
						if(this._tD == "Right to Left")
					{
						if(this.isFirstImg)
						{
							this._tW1 = mx.transitions.Tween(this._lM,_x,this._sT,this._w,-this.dissolveGradW,this._tLh,true);

						} // end if
						else
						{
							this._tW1 = mx.transitions.Tween(this._lM,_x,this._sT,-this.dissolveGradW,-this._lM._width,this._tLh,true);

						}
					
					} // end if

				}

			}

		}
		if(	0.tweenDissolve = "function(	)
	{
		this._tT = this._tL;
		this._tL._alpha = 100;
		this._tUL._alpha = 100;
		this._lM.cacheAsBitmap = true;
		this._tUL.cacheAsBitmap = false;
		this._tL.cacheAsBitmap = true;
		this.isFirstImg;
		this.setupTweenWatcher(this.afterTrans);
	}";
	this.isFirstImg.tweenDrop = "function(	)
	{
		this._tT = this._tL;
		this._tL._y = this._fObj.y;
		this._tL._alpha = 0;
		this._tUL._alpha = 100;
		this._tW1 = mx.transitions.Tween(this._tUL,_y,this._sT,this._tUL._y,this._h,this._tLh,true);
		this._tW2 = mx.transitions.Tween(this._tL,_alpha,this._sT,this._tL._alpha,100,this._tLh,true);
		this.setupTweenWatcher(this.afterTrans);
	}";
	this.isFirstImg.tweenFade = "function(	)
	{
		this._tT = this._tL;
		this._tL._alpha = 0;
		this._tW1 = mx.transitions.Tween(this._tT,_alpha,this._sT,this._tT._alpha,100,this._tLh,true);
		this._tW2 = mx.transitions.Tween(this._tUL,_alpha,this._sT,this._tUL._alpha,0,this._tLh,true);
		this.setupTweenWatcher(this.afterTrans);
	}";
	this.isFirstImg.tweenFadeToBackground = "function(	)
	{
		this._tT = this._tUL;
		this._tL._alpha = 0;
		this._tW1 = mx.transitions.Tween(this._tT,_alpha,this._sT,this._tT._alpha,0,this._tLh / 2,true);
		this.setupTweenWatcher(this.tweenFadeToBackgroundFinish);
	}";
	this.isFirstImg.tweenFadeToBackgroundFinish = "function(	)
	{
		this._tT = this._tL;
		this._tW1 = mx.transitions.Tween(this._tT,_alpha,this._sT,0,100,this._tLh / 2,true);
		this.setupTweenWatcher(this.afterTrans);
	}";
this.isTransitioning)
		{
			this.brightWatch("brightness",0,0,this._tUL);
			this.stopTweenFlash();

		} // end if
		if(	this.isFirstImg.tweenFlash = "function(	)
	{
		this._tT = this._tL;
		this._tUL.unwatch("brightness");
		this._tUL._alpha = 0;
		this._tL._alpha = 100;
		this;
		this._tL.watch("brightness",this.brightWatch,this._tL);
		this._tW1 = mx.transitions.Tween(this._tT,brightness,this._sT,255,0,this._tLh,true);
		this.setupTweenWatcher(this.afterTrans);
	}";
	this.stopTweenFlash = "function(	)
	{
		this._tUL._alpha = 0;
		this._tL._alpha = 0;
		this.brightWatch("brightness",0,0,this._tL);
	}";
!((this._w / this._lM.attachMovie("circleSymbol","l_mc",1)._width) > (this._h / this._lM.attachMovie("circleSymbol","l_mc",1)._height)))
		{

		} // end if
		else
		{

		}
		if(!this._dim.caWidth||!this._dim.caHeight)
		{
			this._w / 2;
			var _local2 = (this._h / 2);

		} // end if
		else
		{
			var _local4 = (this._dim.caWidth / 2);
			this._dim.caHeight / 2 + this._dim.caTopM;

		}
			if(	tweenLens.(150 * (this._h / this._lM.attachMovie("circleSymbol","l_mc",1)._height)) = "function(	)
	{
		this._tT = this._tL;
		this._lM.attachMovie("circleSymbol","l_mc",1);
		this._w / this._lM.attachMovie("circleSymbol","l_mc",1)._width;
		this._h / this._lM.attachMovie("circleSymbol","l_mc",1)._height;
		150 * (this._w / this._lM.attachMovie("circleSymbol","l_mc",1)._width);
		150 * (this._h / this._lM.attachMovie("circleSymbol","l_mc",1)._height);
		var _local5 = undefined;
		150 * (this._w / this._lM.attachMovie("circleSymbol","l_mc",1)._width);
		this._tL._alpha = 100;
		this._lM._yscale = 150 * (this._w / this._lM.attachMovie("circleSymbol","l_mc",1)._width);
		this._lM._xscale = 150 * (this._w / this._lM.attachMovie("circleSymbol","l_mc",1)._width);
		this._tUL.setMask(this._lM);
		this._tW1 = mx.transitions.Tween(this._lM,_xscale,this._sT,this._lM._xscale,0,this._tLh,true);
		this._tW2 = mx.transitions.Tween(this._lM,_yscale,this._sT,this._lM._yscale,0,this._tLh,true);
		var _local4 = undefined;
		undefined;
		this.__set__maskDrawn(true);
		this.arrangeMask(_local4,this._dim.caHeight / 2 + this._dim.caTopM);
		this.setupTweenWatcher(this.afterTrans);
	}";
this._curImg < this._prevImg&&!this.isAlbumEnd)
		{
			if(this._tD == "Left to Right")
			{
				Right to Left;

			} // end if
			else
			{
				if(this._tD == "Right to Left")
				{
					var _local2 = Left to Right;

				} // end if
				else
				{
					if(this._tD == "Top to Bottom")
					{
						Bottom to Top;

					} // end if
					else
					{
						if(this._tD == "Bottom to Top")
						{
							var _local2 = Top to Bottom;

						} // end if

					}

				}

			}
		
		} // end if
			if(	(this._dim.caHeight / 2 + this._dim.caTopM).tweenPushManager = "function(	)
	{
		this._tD;
		this.tweenPush(_local2);
		this.isAlbumEnd = false;
	}";
_local4 == "Bottom to Top")
		{
			this._h;
			if(!(this._oC.contentScale == "Crop to Fit All"))
			{
				this._h - this._dim.caBotM;

			} // end if
			if(this.prevTargetY < 0)
			{
				var _local3 = (this._h - this._dim.caBotM + this.prevTargetY * -1);

			} // end if
			if(this._fObj.y < 0)
			{
				var _local2 = (this._fObj.y - this._tUL._height);

			} // end if
			else
			{
				-this._tUL._height;
				if(!(this.prevTargetY < 0))
				{
					-this._tUL._height - this.prevTargetY;

				} // end if

			}
					this._tL._y = _local3;
			this._tW1 = mx.transitions.Tween(this._tL,_y,this._sT,this._tL._y,this._fObj.y,this._tLh,true);
			this._tW2 = mx.transitions.Tween(this._tUL,_y,this._sT,this._tUL._y,-this._tUL._height - this.prevTargetY,this._tLh,true);

		} // end if
		else
		{
				if(_local4 == "Left to Right")
			{
				if(this.prevTargetX < 0)
				{
					this.prevTargetX - this._tL._width;

				} // end if
				else
				{
					var _local3 = (-this._tL._width);

				}
				if(				this._w;
this._fObj.x < 0)
				{
					this._w + this._fObj.x * -1;

				} // end if
				else
				{
					if(!(this.prevTargetX < 0))
					{
						this._w + this._fObj.x * -1 + this.prevTargetX;

					} // end if

				}
							this._tL._x = _local3;
				this._tW1 = mx.transitions.Tween(this._tL,_x,this._sT,this._tL._x,this._fObj.x,this._tLh,true);
				this._tW2 = mx.transitions.Tween(this._tUL,_x,this._sT,this._tUL._x,this._w + this._fObj.x * -1 + this.prevTargetX,this._tLh,true);

			} // end if
			else
			{
					if(_local4 == "Right to Left")
				{
					this._w;
					if(this.prevTargetX < 0)
					{
						this._w + this.prevTargetX * -1;

					} // end if
					if(this._fObj.x < 0)
					{
						this._fObj.targetX - this._tUL._width;

					} // end if
					else
					{
						var _local2 = (-this._tUL._width);
						if(!(this.prevTargetX < 0))
						{
							_local2 - this.prevTargetX;

						} // end if

					}
									this._tL._x = this._w + this.prevTargetX * -1;
					this._tW1 = mx.transitions.Tween(this._tL,_x,this._sT,this._tL._x,this._fObj.x,this._tLh,true);
					this._tW2 = mx.transitions.Tween(this._tUL,_x,this._sT,this._tUL._x,_local2 - this.prevTargetX,this._tLh,true);

				} // end if
				else
				{
						if(_local4 == "Top to Bottom")
					{
						if(this.prevTargetY < 0)
						{
							var _local3 = (this.prevTargetY - this._tL._height);

						} // end if
						else
						{
							-this._tL._height;

						}
						if(						this._h - this._dim.caBotM;
this._fObj.y < 0)
						{
							var _local2 = (this._h - this._dim.caBotM + this._fObj.y * -1);

						} // end if
						else
						{
							if(!(this.prevTargetY < 0))
							{
								_local2 + this.prevTargetY;

							} // end if

						}
											this._tL._y = -this._tL._height;
						this._tW1 = mx.transitions.Tween(this._tL,_y,this._sT,this._tL._y,this._fObj.y,this._tLh,true);
						this._tW2 = mx.transitions.Tween(this._tUL,_y,this._sT,this._tUL._y,_local2 + this.prevTargetY,this._tLh,true);

					} // end if

				}

			}

		}
		if(	_local2.tweenPush = "function(	dir)
	{
		this._tT = this._tL;
		this._tL._alpha = 100;
		this._tUL._alpha = 100;
		this._tUL.cacheAsBitmap = true;
		this._tL.cacheAsBitmap = true;
		undefined;
		undefined;
		undefined;
		this.prevTargetX = this._fObj.x;
		this.prevTargetY = this._fObj.y;
		this.setupTweenWatcher(this.afterTrans);
	}";
this.isFirstImg)
		{
			this._tL.setMask(this._lM);

		} // end if
		else
		{
			this._tUL.setMask(this._lM);

		}
			if(this._tD == "Bottom to Top")
		{
			if(this.isFirstImg)
			{
				this._tW1 = mx.transitions.Tween(this._lM,_y,this._sT,this._h,0,this._tLh,true);

			} // end if
			else
			{
				this._tW1 = mx.transitions.Tween(this._lM,_y,this._sT,this._lM._y,-this._h,this._tLh,true);

			}
		
		} // end if
		else
		{
				if(this._tD == "Left to Right")
			{
				if(this.isFirstImg)
				{
					this._lM._x = -this._w;
					this._tW1 = mx.transitions.Tween(this._lM,_x,this._sT,this._lM._x,0,this._tLh,true);

				} // end if
				else
				{
					this._tW1 = mx.transitions.Tween(this._lM,_x,this._sT,this._lM._x,this._w,this._tLh,true);

				}
			
			} // end if
			else
			{
					if(this._tD == "Right to Left")
				{
					if(this.isFirstImg)
					{
						this._lM._x = this._w;
						this._tW1 = mx.transitions.Tween(this._lM,_x,this._sT,this._lM._x,0,this._tLh,true);

					} // end if
					else
					{
						this._tW1 = mx.transitions.Tween(this._lM,_x,this._sT,this._lM._y,-this._w,this._tLh,true);

					}
				
				} // end if
				else
				{
						if(this._tD == "Top to Bottom")
					{
						if(this.isFirstImg)
						{
							this._lM._y = -this._h;
							this._tW1 = mx.transitions.Tween(this._lM,_y,this._sT,this._lM._y,0,this._tLh,true);

						} // end if
						else
						{
							this._tW1 = mx.transitions.Tween(this._lM,_y,this._sT,this._lM._y,this._h,this._tLh,true);

						}
					
					} // end if

				}

			}

		}
			if(this.extraFade)
		{
			if(this.isFirstImg)
			{
				this._tW2 = mx.transitions.Tween(this._tL,_alpha,this._sT,0,100,this._tLh,true);

			} // end if
			else
			{
				this._tW2 = mx.transitions.Tween(this._tUL,_alpha,this._sT,this._tUL._alpha,0,this._tLh,true);

			}
		
		} // end if
		if(	(_local2 + this.prevTargetY).tweenWipe = "function(	)
	{
		this._tT = this._tL;
		this._tL._alpha = 100;
		this._tUL._alpha = 100;
		this.arrangeMask(0,0);
		this.isFirstImg;
		this.setupTweenWatcher(this.afterTrans);
	}";
this.isFirstImg)
		{
			this.tweenWipeToBGFinish();

		} // end if
		if(this._tD == "Bottom to Top")
		{
			this._tW1 = mx.transitions.Tween(this._lM,_y,this._sT,this._lM._y,this._h,this._tLh / 2,true);

		} // end if
		else
		{
			if(this._tD == "Left to Right")
			{
				this._tW1 = mx.transitions.Tween(this._lM,_x,this._sT,this._lM._x,-this._w,this._tLh / 2,true);

			} // end if
			else
			{
				if(this._tD == "Right to Left")
				{
					this._tW1 = mx.transitions.Tween(this._lM,_x,this._sT,this._lM._x,this._w,this._tLh / 2,true);

				} // end if
				else
				{
					if(this._tD == "Top to Bottom")
					{
						this._tW1 = mx.transitions.Tween(this._lM,_y,this._sT,this._lM._y,-this._h,this._tLh / 2,true);

					} // end if

				}

			}

		}
		if(this.extraFade)
		{
			this._tW2 = mx.transitions.Tween(this._tUL,_alpha,this._sT,this._tUL._alpha,0,this._tLh / 2,true);

		} // end if
			if(	this.isFirstImg.tweenWipeToBG = "function(	)
	{
		this._tT = this._tUL;
		this._tL._alpha = 0;
		this._tUL._alpha = 100;
		this._tUL.setMask(this._lM);
		this.setupTweenWatcher(this.tweenWipeToBGFinish);
	}";
this._tD == "Bottom to Top")
		{
			if(this.isFirstImg)
			{
				this._lM._y = this._h;

			} // end if
					this._tW1 = mx.transitions.Tween(this._lM,_y,this._sT,this._lM._y,0,this._tLh / 2,true);

		} // end if
		else
		{
				if(this._tD == "Left to Right")
			{
				if(this.isFirstImg)
				{
					this._lM._x = -this._w;

				} // end if
							this._tW1 = mx.transitions.Tween(this._lM,_x,this._sT,this._lM._x,0,this._tLh / 2,true);

			} // end if
			else
			{
					if(this._tD == "Right to Left")
				{
					if(this.isFirstImg)
					{
						this._lM._x = this._w;

					} // end if
									this._tW1 = mx.transitions.Tween(this._lM,_x,this._sT,this._lM._x,0,this._tLh / 2,true);

				} // end if
				else
				{
						if(this._tD == "Top to Bottom")
					{
						if(this.isFirstImg)
						{
							this._lM._y = -this._h;

						} // end if
											this._tW1 = mx.transitions.Tween(this._lM,_y,this._sT,this._lM._y,0,this._tLh / 2,true);

					} // end if

				}

			}

		}
		if(this.extraFade)
		{
			this._tW2 = mx.transitions.Tween(this._tL,_alpha,this._sT,0,100,this._tLh / 2,true);

		} // end if
			if(	this.isFirstImg.tweenWipeToBGFinish = "function(	)
	{
		this._tT = this._tL;
		this._tL._alpha = 100;
		this._tUL._alpha = 0;
		this._tL.setMask(this._lM);
		this.isFirstImg;
		this.setupTweenWatcher(this.afterTrans);
	}";
	this.isFirstImg.tweenSkip = "function(	)
	{
		this._tT = this._tL;
		this._tUL._alpha = 0;
		this._tL._alpha = 100;
		this.afterTrans();
	}";
	this.isFirstImg.drawWipeMask = "function(	)
	{
		net.slideshowpro.slideshowpro.draw.DrawRect.create(this._lM,this._w,this._h,16711680,50);
		this._lM._visible = true;
		this.__set__maskDrawn(true);
	}";
this.isFirstImg)
		{
			this._mP = this._lM.createEmptyMovieClip("mP_mc",1);
			this._m1 = this._mP.createEmptyMovieClip("m1_mc",1);
			this._m2 = this._mP.createEmptyMovieClip("m2_mc",2);
			this.calcDissolveSize();
			net.slideshowpro.slideshowpro.draw.DrawRect.create(this._m1,this._w,this._h,16763904,100);
			if(this._tD == "Bottom to Top")
			{
				net.slideshowpro.slideshowpro.draw.DrawGradient.create(this._m2,this._w,this.dissolveGradH,0,0,new Array(0,0),new Array(0,100),new Array(0,255),90);

			} // end if
			else
			{
				if(this._tD == "Top to Bottom")
				{
					net.slideshowpro.slideshowpro.draw.DrawGradient.create(this._m2,this._w,this.dissolveGradH,0,0,new Array(0,0),new Array(100,0),new Array(0,255),90);

				} // end if
				else
				{
					if(this._tD == "Left to Right")
					{
						net.slideshowpro.slideshowpro.draw.DrawGradient.create(this._m2,this.dissolveGradW,this._h,0,0,new Array(0,0),new Array(100,0),new Array(0,255),0);

					} // end if
					else
					{
						if(this._tD == "Right to Left")
						{
							net.slideshowpro.slideshowpro.draw.DrawGradient.create(this._m2,this.dissolveGradW,this._h,0,0,new Array(0,0),new Array(0,100),new Array(0,255),0);

						} // end if

					}

				}

			}
					this.posDissolveMaskClips();

		} // end if
		else
		{
			if(!(this._tD == "Bottom to Top")||this._tD == "Top to Bottom")
			{
				this._mP._rotation = -180;

			} // end if
			else
			{
				if(!(this._tD == "Left to Right")||this._tD == "Right to Left")
				{
					this._mP._rotation = 180;

				} // end if

			}
			this.reposDissolveMask();
			this.__set__maskDrawn(true);

		}
		if(	this.isFirstImg.drawDissolveMask = "function(	)
	{
		this._lM._visible = true;
	}";
	this.isFirstImg.reposDissolveMask = "function(	)
	{
		this._mP._x = this._lM._width;
		this._mP._y = this._lM._height;
	}";
this._tD == "Bottom to Top")
		{
			this._m1._y = this._m2._height;

		} // end if
		else
		{
			if(this._tD == "Top to Bottom")
			{
				this._m2._y = this._m1._height;

			} // end if
			else
			{
				if(this._tD == "Left to Right")
				{
					this._m2._x = this._m1._width;

				} // end if
				else
				{
					if(this._tD == "Right to Left")
					{
						this._m1._x = this._m2._width;

					} // end if

				}

			}

		}
		if(	this.isFirstImg.posDissolveMaskClips = "function(	)
	{
	}";
!((this.dissolveGradW + this._w) < this.MAX_SCRN))
		{
			this.dissolveGradW = this.MAX_SCRN - this._w;

		} // end if
		if(!((this.dissolveGradH + this._h) < this.MAX_SCRN))
		{
			this.dissolveGradH = this.MAX_SCRN - this._h;

		} // end if
			if(	this.isFirstImg.calcDissolveSize = "function(	)
	{
		this.dissolveGradW = Math.floor(this._w / this.DISSOLVE_R);
		this.dissolveGradH = Math.floor(this._h / this.DISSOLVE_R);
	}";
this._tS == "Dissolve")
		{
			this.calcDissolveSize();
!(this._tD == "Left to Right")||			if(this._tD == "Right to Left")
			{
				this._m1._width = this._w;
				this._m2._width = this.dissolveGradW;
				this._m2._height = this._h;
				this._m1._height = this._h;

			} // end if
			else
			{
				this._m1._height = this._h;
				this._m2._height = this.dissolveGradH;
				this._m2._width = this._w;
				this._m1._width = this._w;

			}
					this.posDissolveMaskClips();
			this.reposDissolveMask();

		} // end if
	this.isFirstImg.sizeMask = "function(	)
	{
		this._lM._width = this._w;
		this._lM._height = this._h;
	}";
	this.this.isFirstImg = "function(	b)
	{
		this.isMaskDrawn = "b";
		__set__maskDrawn;
	}";
	b.__get__maskDrawn = "function(	)
	{
	}";
	b.startTrans = "function(	)
	{
		this._oC.dispatchEventData("onTransStart");
		this._tL = this._oC.thisLoader;
		this._tUL = this._oC.thisUnLoader;
		this.pickTrans();
		this.isFirstImg = false;
	}";
	b.arrangeMask = "function(	w,h)
	{
		this._lM._x = -this._tL._height;
		this._lM._y = "h";
	}";
	h.afterImageLoad = "function(	eventObject)
	{
		this._prevImg = this._curImg;
		this._curImg = eventObject.data;
	}";
	eventObject.onAlbumEnd = "function(	)
	{
		this.isAlbumEnd = true;
	}";
	eventObject.setupTweenWatcher = "function(	o)
	{
		this.isTransitioning = true;
		this.onMotionFinished = mx.utils.Delegate.create(this,o);
		this._tW1.removeListener(this);
		this._tW1.addListener(this);
	}";
	o.killTweenWatcher = "function(	)
	{
		this.isTransitioning = false;
		this.onMotionFinished = null;
		this._tW1.stop();
		this._tW1.removeListener(this);
		this._tW2.stop();
		this._tW3.stop();
		this._tW3 = null;
		this._tW2 = null;
		this._tW1 = null;
	}";
	gb. = "function(	prop,oldVal,newVal,target_mc)
	{
		new Color();
		;
		new Object(,ab,100,aa,,bb,100,ba);
		new Color().setTransform(new Object(,ab,100,aa,,bb,100,ba));
	}";
	new Color().blurWatch = "function(	prop,oldVal,newVal,target_mc)
	{
		this.t_txt.text = this.t_txt.text + oldVal.BLUR_QUAL;
		flash.filters.BlurFilter(undefined,undefined,oldVal.BLUR_QUAL);
		new Array();
		new Array().push(flash.filters.BlurFilter(undefined,undefined,oldVal.BLUR_QUAL));
		(this._w / this._lM.attachMovie("circleSymbol","l_mc",1)._width).filters = new Array();
	}";
	this.afterTrans = "function(	)
	{
		this._tUL._alpha = 0;
		this._tL.setMask(null);
		this._tUL.setMask(null);
		this._lM._visible = false;
		this.killTweenWatcher();
		this.isTransitioning = false;
		this._oC.dispatchEventData("onTransEnd");
	}";
	this.fwdTweenToEnd = "function(	tweenObj)
	{
		tweenObj.fforward();
	}";
	this.fwdAllTweensToEnd = "function(	)
	{
		this._tW1.fforward();
		this._tW2.fforward();
		this._tW3.fforward();
	}";
	this.onAlbumSwitch = "function(	)
	{
		this.isFirstImg = true;
		this.__set__maskDrawn(false);
		this.killTweenWatcher();
	}";
	this.reset = "function(	)
	{
		this._tUL.setMask(null);
		this._tL.setMask(null);
		this._lM.clear();
		net.slideshowpro.slideshowpro.utils.Utils.removeClips(this._lM);
		this.__set__maskDrawn(false);
	}";
	this.BLUR_QUAL = 3;
	this.DISSOLVE_R = 4;
	this.prevTargetX = 0;
	this.prevTargetY = 0;
	this.MAX_SCRN = 2879;
	this._prevImg = 0;
	this._curImg = 0;
	this.isFirstImg = true;
	this.isMaskDrawn = false;
	this.isTransitioning = false;
	this.isDrawn = false;
	this.extraFade = false;
	this.isAlbumEnd = false;

} // end if
ASSetPropFlags(net.slideshowpro.slideshowpro.observers.Transition.prototype,null,1);
