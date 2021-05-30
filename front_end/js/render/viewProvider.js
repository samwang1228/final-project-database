function updateSideCode(page){
    let htmlCode = '';
    for (let i=0; i < page_menu_list[page].length; i++) {      

        htmlCode += '<div onclick="onSideMenuTitleClick(0,'+i+')" class="uiTitle"><i class="fa fa-bars" aria-hidden="true"></i> '+page_menu_list[page][i]['area_name']+'</div>';
        htmlCode += '<ul id="menu-'+i+'" class="hide">';
        for (let j=0; j<page_menu_list[page][i]['reservoir'].length;j++) {
            id = 'item'+i+'-'+j;
            onClick = 'onSideMenuItemClick('+i+','+j+')';
            // htmlCode += '<li id='+id+' onClick='+onClick+'>'+page_menu_list[page][i][1][j]+'</li>';
            htmlCode += '<li id='+id+' onClick='+onClick+'>'+'<a href="#slide'+area_list[i]+j+'">'+page_menu_list[page][i]['reservoir'][j]['reservoir_name']+'</a></li>';
        }
        htmlCode += '</ul>';
    }
    $('.menu-item').append(htmlCode);
}

function updatePageCode(page,clicked_menu){
	let htmlCode = '';

    for (let i=0; i<page_menu_list[page][clicked_menu]['reservoir'].length;i++) {
		// htmlCode += "<section class='slide' id='slide"+area_list[clicked_menu]+(i)+"'>"
		reservoir_id = page_menu_list[page][clicked_menu]['reservoir'][i]['reservoir_id']
        reservoir_name = page_menu_list[page][clicked_menu]['reservoir'][i]['reservoir_name']        
        photoURL = 'url("./img/reservoir/'+reservoir_name+'.jpg")';
        htmlCode += "<section class='slide' style='background-image:"+photoURL+"' id='slide"+area_list[clicked_menu]+(i)+"'>"
        htmlCode += "<div class='container'>";
		htmlCode += "<div class='row'>";
		htmlCode += "<div class='col-md-12 upper text-center'>";
		htmlCode += "<h2 class='reservoir-show-name'>"+reservoir_name+"</h2>"
		htmlCode += "</div>";
		htmlCode += "</div>";
		htmlCode += "</div>";
		htmlCode += "</section>";
	}
	$('.page-container').html(htmlCode);

}
