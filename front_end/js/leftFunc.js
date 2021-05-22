function onSideMenuTitleClick(x){
	var menu=document.getElementById("menu-"+x);
	menu.classList.toggle("hide");//切換標籤物件 class 的hide設定 功能同等下面 
	//也就是有hide時關掉hide沒有則呼叫
	/*if(menu.style.display=="none")
		menu.style.display="block";//秀出來
	else 
		menu.style.display="none";*/
}
	

function onSideMenuItemClick(i,j){	
	// $('.reservoir-show-name').html($('#item'+i+'-'+j).html());
	
	// add some code here, when click, slide to the card
}