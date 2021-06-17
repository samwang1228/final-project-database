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
				$('#login_error_message').html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 帳號或密碼錯誤請再輸入一次');
				return;
			}
			// login success
			var myDate = new Date();
			myDate.setMonth(myDate.getMonth() + 12);
			document.cookie = 'user' +"=" + form_username + ";expires=" + myDate 
                  + ";domain="+LOGIN_COOKIE_ADDRESS+";path=/";
			document.location.href="insertreservoir.html";
		}
	);
}

function onRegisterButtonClick(){
	form_username = $("#form_login_username").val();
	form_password = $("#form_login_password").val();

	console.log(form_username,form_password);
	if(form_username=='' || form_password==''){ //帳密不為空
		$('#login_error_message').html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 帳號密碼不可為空值');
		return;
	}
	$.post({
		url:backend_address,
		data:JSON.stringify({type:'register',ID:form_username,password:form_password})
		},function(jsonResult){
			console.log(jsonResult);
			let result = JSON.parse(jsonResult);
			if(result['sucess']==='false'){ // register failed	
				$('#login_error_message').html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 帳號或密碼錯誤請再輸入一次');
				return;
			}
			// register success
			$('#login_error_message').html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 註冊成功 請點擊登入');
			return;
		}
	);	
	
}