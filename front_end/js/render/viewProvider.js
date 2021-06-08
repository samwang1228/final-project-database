function updateSideCode(page){
    let htmlCode = '';

    switch(page_num){
        case 0: //reservoir
        htmlCode = updateSideCodeReservoir(htmlCode,page);
        break;
        case 1: //rainfall
        htmlCode = updateSideCodeRainfall(htmlCode,page);
        break;
        case 2: //watercut
        break;
    }

    $('.menu-item').append(htmlCode);
}

function updatePageCode(page,clicked_menu){
	let htmlCode = '';

    switch(page_num){
        case 0: //reservoir
        htmlCode = updatePageCodeReservoir(htmlCode,page,clicked_menu);
        break;            
        case 1: //rainfall
        htmlCode = updatePageCodeRainfall(htmlCode,page,clicked_menu);
        break;
        case 2: //watercut
        break;
    }

    $('.page-container').html(htmlCode);

}

function updateSideCodeReservoir(htmlCode,page){
    for (let i=0; i < page_menu_list[page].length; i++) {      

        htmlCode += '<div onclick="onSideMenuTitleClick('+i+'); setCircleFunction();" class="uiTitle"><i class="fa fa-bars" aria-hidden="true"></i> '+page_menu_list[page][i]['area_name']+'</div>';
        htmlCode += '<ul id="menu-'+i+'" class="hide">';
        for (let j=0; j<page_menu_list[page][i]['reservoir'].length;j++) {
            id = 'item'+i+'-'+j;
            onClick = 'onSideMenuItemClick('+i+','+j+')';
            // htmlCode += '<li id='+id+' onClick='+onClick+'>'+page_menu_list[page][i][1][j]+'</li>';
            htmlCode += '<li id='+id+' onclick='+onClick+'>'+'<a href="#slide'+area_list[i]+j+'"onclick="switchAnimation(); setCircleFunction();">'+page_menu_list[page][i]['reservoir'][j]['reservoir_name']+'</a></li>';
        }
        htmlCode += '</ul>';
    }
    return htmlCode;
}

function updateSideCodeRainfall(htmlCode,page){

}

function updatePageCodeReservoir(htmlCode,page,clicked_menu){
    for (let i=0; i<page_menu_list[page][clicked_menu]['reservoir'].length;i++) {
		// htmlCode += "<section class='slide' id='slide"+area_list[clicked_menu]+(i)+"'>"
		reservoir_id = page_menu_list[page][clicked_menu]['reservoir'][i]['reservoir_id']
        reservoir_name = page_menu_list[page][clicked_menu]['reservoir'][i]['reservoir_name']        
        photoURL = 'url("./img/reservoir/'+reservoir_name+'.jpg")';
        htmlCode += "<section class='section' style='background-image:"+photoURL+"' id='slide"+area_list[clicked_menu]+(i)+"'>"
        htmlCode += "<div class='container'>";
        htmlCode += "<div class='row'>";
        htmlCode += "<div class='col-md-12 upper text-center'>";
        htmlCode += "<h2 class='reservoir-show-name'>"+reservoir_name+"</h2>";
        htmlCode += '<div">';
        htmlCode += '<canvas id="water'+i+'"></canvas>';
        htmlCode += "</div>";
        htmlCode += "</div>";
        htmlCode += "</div>";
        htmlCode += "</div>";
        htmlCode += "</section>";
        // createCircle(clicked_menu,i);
    }
    return htmlCode;
}

function updatePageCodeRainfall(htmlCode,page,clicked_menu){

}
function createCircle(clicked_menu,i){
    for(let j=0;j<8;j++) //resvoir
    {
        // var temp = '#water'+clicked_menu,i;
        // console.log(temp);
       let waterValue = Math.floor(Math.random()*100); //把sql的%數放在這裡
       // console.log(waterValue);
       if(waterValue<=20)
       {
           waterColor='rgb(255,99,71)';
           textColor='rgb(255, 68, 68)';
       }
       if(waterValue>=60)
       {
           waterColor='rgba(25, 139, 201, 1)';
           textColor='rgba(06, 85, 128, 0.8)';
       }
       if(waterValue>20&&waterValue<60)
       {
           waterColor='rgb(255, 160, 119)';
           textColor='rgb(255,99,71)';
       }
       $("#water"+j).waterbubble({
           txt: ('' + waterValue).slice(-3).toString() + " %",
           data: waterValue/100,
           animation: true,
           waterColor:waterColor,
           textColor:textColor
       });
}
}
// setInterval(function(){ createCircle();// this will run after every 1 seconds
// }, 1000);
function setCircleFunction(){
    setTimeout(function(){ createCircle(); }, 1000);
}
setTimeout(function(){ createCircle(); }, 1000);

// window.clearInterval(timeoutID);