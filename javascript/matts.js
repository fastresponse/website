// JavaScript Document

function changeIfMatch(ExCl) { 
						// A little function to make my rollover buttons run smoothly. 
	ArY = new Array();
	ArY[0]=['home', 'home2_over.gif', 'images/home2_off.gif'];
	ArY[1]=['courses', 'courses2_over.gif', 'images/courses2_off.gif'];
	ArY[2]=['company', 'company2_over.gif', 'images/company2_off.gif'];
	ArY[3]=['products', 'products2_over.gif', 'images/products2_off.gif'];
	ArY[4]=['services', 'services2_over.gif', 'images/services2_off.gif'];
	
	for(i=0; i<ArY.length; i++) {
		if(i != ExCl) { 
			var ImG = document.getElementById(ArY[i][0])
			var SrC = ImG.src
			ReGeX = new RegExp(ArY[i][1]);
			if(SrC.match(ReGeX)) { ImG.src=ArY[i][2] }
		}
	}
}