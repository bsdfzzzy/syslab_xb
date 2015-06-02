// JScript 文件
function GetObj(objName){
 if(document.getElementById){
  return eval('document.getElementById("' + objName + '")');
 }else if(document.layers){
  return eval("document.layers['" + objName +"']");
 }else{
  return eval('document.all.' + objName);
 }
}
function showDiv(objName, currentnum, totalnum, objSpan)
{

	for(var i=1; i<=totalnum;i++)
	{
		 var obj = GetObj(objName+i);
		 var objSp = GetObj(objSpan+i);

		
		 
		     if(obj!=null && objSp!=null)
		     {
		 	    if(i==currentnum) {
				    obj.style.display = "block";
				    objSp.className = "active";
				   
			    }
			    else {
				    obj.style.display = "none";
				    objSp.className = "nor";
				   
		        }
		     }
		 
	}

}


function sellaycomm(num, n, n1, n2){
    for(var id = 1;id<=n;id++)
    {
        var cc=n1+id;
        var bb=n2+id;
        var objcc = GetObj(cc);
        var objbb = GetObj(bb);
        if(objcc!=null){
            if(id==num)
                objcc.className="active_a";
            else
                objcc.className="";
        }
        if(objbb!=null){
            if(id==num)
                objbb.className="text_aa";
            else
                objbb.className="text_a";
        }
    }
}


window.onload=RollPhoto;
function RollPhoto(){
	var speed=18;
	var tab=document.getElementById("demo");
	var tab1=document.getElementById("demo1");
	var tab2=document.getElementById("demo2");
	tab2.innerHTML=tab1.innerHTML;
	function Marquee(){
		if(tab2.offsetWidth-tab.scrollLeft<=0)
		tab.scrollLeft-=tab1.offsetWidth
		else{
			tab.scrollLeft++;
		}
	}
	var MyMar=setInterval(Marquee,speed);
	tab.onmouseover=function() {clearInterval(MyMar)};
	tab.onmouseout=function() {MyMar=setInterval(Marquee,speed)};
}


/*导航菜单*/

stuHover = function() {
	var cssRule;
	var newSelector;
	for (var i = 0; i < document.styleSheets.length; i++)
		for (var x = 0; x < document.styleSheets[i].rules.length ; x++)
			{
			cssRule = document.styleSheets[i].rules[x];
			if (cssRule.selectorText.indexOf("LI:hover") != -1)
			{
				 newSelector = cssRule.selectorText.replace(/LI:hover/gi, "LI.iehover");
				document.styleSheets[i].addRule(newSelector , cssRule.style.cssText);
			}
		}
	var getElm = document.getElementById("nav").getElementsByTagName("LI");
	for (var i=0; i<getElm.length; i++) {
		getElm[i].onmouseover=function() {
			this.className+=" iehover";
		}
		getElm[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" iehover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", stuHover);