/* eslint-env jquery */
function onSideMenuTitleClick(clicked_menu){
	console.log(page_menu_list);
	let menu=document.getElementById("menu-"+clicked_menu);
	menu.classList.toggle("hide");//切換標籤物件 class 的hide設定 功能同等下面 
	//也就是有hide時關掉hide沒有則呼叫
	/*if(menu.style.display=="none")
		menu.style.display="block";//秀出來
	else 
		menu.style.display="none";*/
	updatePageCode(page_num,clicked_menu);
}

function onSideMenuItemClick(i,j){	
	// add some code here, when click, slide to the card
	updatePageCode(page_num,i);
}

function onFormLoginButtomClick(){
	form_username = $("#form_login_username").val();
	form_password = $("#form_login_password").val();

	// remember to encrypt the password before send

	$.post({
		url:backend_address,
		data:JSON.stringify({type:'login',ID:form_username,password:form_password})
		},function(jsonResult){
			let result = JSON.parse(jsonResult);

			if(result['sucess']==='false'){ // login failed
				// think of change text on this php (error message)
				// and no need to redirect page
				// document.location.href="fail.php";

				$('#login_error_message').html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 帳號或密碼錯誤請再輸入一次');
				return;
			}
			// login success
			document.location.href="insertreservoir.html";
		}
	);
}
