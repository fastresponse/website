import oxylus.Utils;
import ascb.util.Proxy;
import caurina.transitions.*;


class oxylus.hiam.main extends MovieClip 
{
	private var theXml:XML;	
	private var node:XMLNode;
	public var settings:Object;
	private var totals:Number = 0;
	
	private var bg:MovieClip;
	private var holder:MovieClip;
	private var mask:MovieClip;
	
	private var myInterval:Number;
	private var currentIdx:Number = -1;
	
	public function main() {
		
		settings = new Object();
		
		loadMyXml();
	}
	

	/**
	 * this function will load the .xml file
	 */	
	public function loadMyXml() {
		var xmlOb:XML = new XML();
		theXml = xmlOb;
		xmlOb.ignoreWhite = true;
		xmlOb.onLoad = 	Proxy.create(this, continueAfterXmlLoaded);
		xmlOb.load(_global.myXML); // here, you can change the loaded .xml file
	}
	
	
	/**
	 * this function gets executed after the .xml file has loaded
	 */
	private function continueAfterXmlLoaded()
	{
		node = theXml.firstChild.firstChild;
		
		
		settings = Utils.parseSettingsNode(node);
		
		bg._width = settings.totalWidth + 2*settings.bgStrokeSize;
		bg._height = settings.totalHeight + 2*settings.bgStrokeSize;

		mask._width = settings.totalWidth;
		mask._height = settings.totalHeight;
		
		holder.setMask(mask);
		
		holder._x = holder._y = mask._x = mask._y = settings.bgStrokeSize;
	
		var auxNode:XMLNode = node.nextSibling.firstChild;
		var idx:Number = 0;
		
		for (; auxNode != null; auxNode = auxNode.nextSibling) {
			idx++;
		}
		
		totals = idx;
		
		var defaultWidth:Number = Math.round(settings.totalWidth / totals);
		var lastWidth:Number = Math.round(settings.totalWidth - defaultWidth * (totals - 1));
		var smallWidth:Number = Math.round((settings.totalWidth - settings.openWidth) / (totals-1));
		
		auxNode = node.nextSibling.firstChild;
		idx = 0;
		var currentPos:Number = 0;
		for (; auxNode != null; auxNode = auxNode.nextSibling) {
			var currentItem:MovieClip = holder.attachMovie("IDitem", "item_" + idx, holder.getNextHighestDepth());
			
			currentItem.ord = idx;
			
			currentItem.addEventListener("continueLoading", Proxy.create(this, continueLoading));
			currentItem.addEventListener("itemOnRollOver", Proxy.create(this, itemOnRollOver));
			currentItem.addEventListener("itemOnRollOut", Proxy.create(this, itemOnRollOut));
			
			
			if (idx == 0) {
				currentItem.cancelSeparator();
			}
			
			currentItem._x = currentItem.defXPos = currentPos;
			
				
			if (auxNode.nextSibling == null) {
				currentItem.defWidth = lastWidth;
			
				currentItem.opWidth = Math.round(settings.totalWidth - (totals - 1) * smallWidth);
				currentItem.opXPos = Math.round(idx * smallWidth);
			
				currentItem.smWidth = Math.round(settings.totalWidth - (totals - 1) * smallWidth - settings.openWidth + smallWidth);
				
				currentItem.smXPos = Math.round(idx * smallWidth);
			}
			else {
				currentItem.defWidth = defaultWidth;
				
				currentItem.opWidth = settings.openWidth;
				currentItem.opXPos = Math.round(idx * smallWidth);
				
				currentItem.smWidth = smallWidth;
				currentItem.smXPos = Math.round(idx * smallWidth);
			}
			
			currentItem.setNode(auxNode, settings);
			currentPos += defaultWidth;
			
			idx++;
		}
		
		holder["item_" + 0].startLoad();
	}
	
	private function continueLoading(obj:Object) {
		if (holder["item_" + ( obj.mc.rank + 1 )]){
			holder["item_" + ( obj.mc.rank + 1 )].startLoad();
		}
		else {
			if (settings.autoplayTimer > 0) {
				myInterval = setInterval(this, "slide", settings.autoplayTimer * 1000);
				slide();
			}
		}
	}
	
	private function slide() {
		if ((this._xmouse > 0) && (this._xmouse < bg._width) && (this._ymouse > 0) && (this._ymouse < bg._height)) {
			
		}
		else {
			currentIdx++;
			if (!holder["item_" + (currentIdx)]) {
				currentIdx = 0;
			}
			holder["item_" + (currentIdx)].onRollOver();
		}
		
	}
	
	private function itemOnRollOver(obj:Object) {
		for (var idx:Number = 0; idx < totals; idx++) {
			var currentItem:MovieClip = holder["item_" + idx];
			if (idx < obj.mc.rank) {
				currentItem.goSmall(0);
				currentItem.active = false;
			}
			
			if (idx == obj.mc.rank) {
				currentItem.goLarge();
				currentItem.active = true;
			}
			if (idx > obj.mc.rank) {
				currentItem.goSmall(settings.openWidth);
				currentItem.active = false;
			}
		}
		
	}
	
	private function itemOnRollOut(obj:Object) {
		if ((this._xmouse > mask._x) && (this._xmouse < mask._width) && (this._ymouse > mask._y) && (this._ymouse < mask._height)) {
			
		}
		else {
			if (settings.comeBackToDefault == 1) {
				for (var idx:Number = 0; idx < totals; idx++) {
					var currentItem:MovieClip = holder["item_" + idx];
					currentItem.goDefault();
					currentItem.active = false;
				}
			}
			else {
				var currentItem:MovieClip = holder["item_" + obj.mc.rank];
				currentItem.active = false;
			}
		}
	}
	
}