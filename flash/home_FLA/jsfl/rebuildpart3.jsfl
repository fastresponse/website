
fl.outputPanel.clear();
var doc=fl.getDocumentDOM();
var tl=doc.getTimeline();
var lib=doc.library;
var newSel=new Array();
var is,li,ci,pi,tx,r0,nr,cx,cy;

li=lib.items[lib.findItemIndex("sprite16")];
li.linkageExportForRS=true;
li.linkageExportInFirstFrame=true;
li.linkageIdentifier="mcToolTip";
li=lib.items[lib.findItemIndex("sprite21")];
li.linkageExportForRS=true;
li.linkageExportInFirstFrame=true;
li.linkageIdentifier="holder2";
li=lib.items[lib.findItemIndex("sprite22")];
li.linkageExportForRS=true;
li.linkageExportInFirstFrame=true;
li.linkageIdentifier="holder";
li=lib.items[lib.findItemIndex("sprite24")];
li.linkageExportForRS=true;
li.linkageExportInFirstFrame=true;
li.linkageIdentifier="hMaska";
