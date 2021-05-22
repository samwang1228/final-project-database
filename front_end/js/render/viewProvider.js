updateSideCode(0)
updatePageCode(0,0);

function updateSideCode(page){
    let htmlCode = '';
    for (let i=0; i < page_menu_list[page].length; i++) {
        htmlCode += '<div onclick="onSideMenuTitleClick(0,'+i+')" class="uiTitle"><i class="fa fa-bars" aria-hidden="true"></i> '+page_menu_list[page][i][0]+'</div>';
        htmlCode += '<ul id="menu-'+i+'" class="hide">';
        for (let j=0; j<page_menu_list[page][i][1].length;j++) {
            id = 'item'+i+'-'+j;
            onClick = 'onSideMenuItemClick('+i+','+j+')';
            htmlCode += '<li id='+id+' onClick='+onClick+'>'+page_menu_list[page][i][1][j]+'</li>';
        }
        htmlCode += '</ul>';
    }
    $('.menu-item').append(htmlCode);
}

function updatePageCode(page,clicked_menu){
	let htmlCode = '';
    for (let i=0; i<page_menu_list[page][clicked_menu][1].length;i++) {
		htmlCode += "<section class='slide' id='slide"+(i)+"'>"
		htmlCode += "<div class='container'>";
		htmlCode += "<div class='row'>";
		htmlCode += "<div class='col-md-12 upper text-center'>";
		htmlCode += "<h2 class='reservoir-show-name'>"+page_menu_list[page][clicked_menu][1][i]+"</h2>"
		htmlCode += "</div>";
		htmlCode += "</div>";
		htmlCode += "</div>";
		htmlCode += "</section>";
	}
	$('.page-container').html(htmlCode);
}
