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
        htmlCode += '<div onclick="onSideMenuTitleClick('+i+'); setCircleFunction('+i+')" class="uiTitle"><i class="fa fa-bars" aria-hidden="true"></i> '+page_menu_list[page][i]['area_name']+'</div>';
        htmlCode += '<ul id="menu-'+i+'" class="hide">';
        for (let j=0; j<page_menu_list[page][i]['reservoir'].length;j++) {
            id = 'item'+i+'-'+j;
            onClick = 'onSideMenuItemClick('+i+','+j+')';
            // htmlCode += '<li id='+id+' onClick='+onClick+'>'+page_menu_list[page][i][1][j]+'</li>';
            htmlCode += '<li id='+id+' onclick='+onClick+'>'+'<a href="#slide'+area_list[i]+j+'"onclick="switchAnimation(); setCircleFunction('+i+')">'+page_menu_list[page][i]['reservoir'][j]['reservoir_name']+'</a></li>';
        }
        htmlCode += '</ul>';
    }
    return htmlCode;
}

function updateSideCodeRainfall(htmlCode,page){
    for (let i=0; i < page_menu_list[page].length; i++) {
        htmlCode += '<div onclick="onSideMenuTitleClick('+i+'); setRainfall_graph('+i+');" class="uiTitle"><i class="fa fa-bars" aria-hidden="true"></i> '+page_menu_list[page][i]['city_name']+'</div>';
        htmlCode += '<ul id="menu-'+i+'" class="hide">';
        for (let j=0; j<page_menu_list[page][i]['rain_station'].length;j++) {
            id = 'item'+i+'-'+j;
            onClick = 'onSideMenuItemClick('+i+','+j+')';
            // htmlCode += '<li id='+id+' onClick='+onClick+'>'+page_menu_list[page][i][1][j]+'</li>';
            htmlCode += '<li id='+id+' onclick='+onClick+'>'+'<a href="#slide'+area_list[i]+j+'"onclick="switchAnimation(); setRainfall_graph('+i+');">'+page_menu_list[page][i]['rain_station'][j]['rain_station_name']+'</a></li>';
        }
        htmlCode += '</ul>';
    }
    return htmlCode;
}

function updatePageCodeReservoir(htmlCode,page,clicked_menu){
    error="<i class='fa fa-exclamation-triangle' aria-hidden='true' ></i>";
    safe='<i class="fa fa-check" aria-hidden="true" style="color:green"></i>';
    for (let i=0; i<page_menu_list[page][clicked_menu]['reservoir'].length;i++) {
		// htmlCode += "<section class='slide' id='slide"+area_list[clicked_menu]+(i)+"'>"
		reservoir_id = page_menu_list[page][clicked_menu]['reservoir'][i]['reservoir_id'];
        reservoir_name = page_menu_list[page][clicked_menu]['reservoir'][i]['reservoir_name'];     
        reservoir_water_storage = page_menu_list[page][clicked_menu]['reservoir'][i]['effective_water_storage'];
        reservoir_effective_capacity = page_menu_list[page][clicked_menu]['reservoir'][i]['effective_capacity'];
        reservoir_outflow = page_menu_list[page][clicked_menu]['reservoir'][i]['outflow'];
        
        //calculate watercut info
        if(reservoir_outflow==0){reservoir_outflow=1;}
        if((reservoir_water_storage-reservoir_outflow)<0.1*reservoir_effective_capacity){ //明天就沒水
            waterlimit_expect = 0;
            watercut_expect = 0;
        }else if((reservoir_water_storage-reservoir_outflow)<0.2*reservoir_effective_capacity){
            waterlimit_expect = 0;
            watercut_expect = Math.ceil(reservoir_water_storage-0.1*reservoir_effective_capacity/reservoir_outflow);
        }else{
            waterlimit_expect = Math.ceil((reservoir_water_storage-(0.2*reservoir_effective_capacity))/reservoir_outflow);
            watercut_expect = Math.ceil((reservoir_water_storage-(0.1*reservoir_effective_capacity))/reservoir_outflow);
        }
        //是否要考慮一周平均降水
        photoURL = 'url("./img/reservoir/'+reservoir_id+'.jpg")';
        htmlCode += "<section class='section' style='background-image:"+photoURL+" ' id='slide"+area_list[clicked_menu]+(i)+"'>"
        htmlCode += "<div class='container'>";
        htmlCode += "<div class='row'>";
        htmlCode += "<div class='col-md-12 upper text-center'>";
        htmlCode += "<h2 class='reservoir-show-name'>"+reservoir_name+"</h2>";
        htmlCode += '<div">';
        htmlCode += '<canvas id="water'+i+'"></canvas>';
        htmlCode +="<div class='box-2 'style='opacity:0.7'>";
        if(waterlimit_expect<=7)
            htmlCode += '<h2 id="watercut'+i+'" style="color:red" >'+ error+'預測限水日期 : '+waterlimit_expect+'</h2>';
        else if (waterlimit_expect<=40&&waterlimit_expect>7)
            htmlCode += '<h2 id="watercut'+i+'" style="color:yellow">'+error+'預測限水日期 : '+waterlimit_expect+'</h2>';
        else
            htmlCode += '<h2 id="watercut'+i+'"style="color:white">'+ safe+'預測限水日期 : '+watercut_expect+'</h2>';
        htmlCode +='</div>';
        htmlCode +="<div class='box-1' style='opacity:0.7'>";
        if(watercut_expect<=7)
            htmlCode += '<h2 id="watercut'+i+'" style="color:red">'+error+ '預測停水日期 : '+watercut_expect+'</h2>';
        else if(watercut_expect>7&& watercut_expect<=40)
            htmlCode += '<h2 id="watercut'+i+'"style="color:yellow">'+ error+'預測停水日期 : '+watercut_expect+'</h2>';
        else
            htmlCode += '<h2 id="watercut'+i+'"style="color:white">'+ safe+'預測停水日期 : '+watercut_expect+'</h2>';
        htmlCode +='</div>';
        htmlCode +='</div>';
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
   for (let i=0; i<page_menu_list[page][clicked_menu]['rain_station'].length;i++) {
    htmlCode += "<section class='slide' id='slide"+area_list[clicked_menu]+(i)+"'>"
    rain_station_name = page_menu_list[page][clicked_menu]['rain_station'][i]['rain_station_name']
    photoURL = 'url("./css/下雨.gif")';
    htmlCode+= "<section class='section' style='background-image:"+photoURL+"' id='slide"+area_list[clicked_menu]+(i)+"'>"
    htmlCode+='<div class="text-center upper">'
    htmlCode+='<h2>'+rain_station_name+'</h2>';
    htmlCode+='<div>'        
    htmlCode+='<div class="container-fluid">'
    htmlCode+= "<div class='row'>"
    htmlCode+='<div class="col-lg-2 col-md-6 d-none  d-md-block "></div>'
    htmlCode+= '<div class="col-lg-8 col-md-6 infinity-form-container" >'
    htmlCode+='<canvas id="myChart'+i+'" width="900" height="380" ></canvas>';
    htmlCode+= '</div>';
    htmlCode+= '</div>';
    htmlCode+='</div>';
    htmlCode+='</section>'
}
return htmlCode;
}

function createCircle(clicked_menu){
    console.log(clicked_menu);    
    for(let j=0;j<page_menu_list[page][clicked_menu]['reservoir'].length;j++){ //resvoir
        // var temp = '#water'+clicked_menu,i;
        // console.log(temp);

        effective_water_storage = page_menu_list[page][clicked_menu]['reservoir'][j]['effective_water_storage']
        effective_capacity = page_menu_list[page][clicked_menu]['reservoir'][j]['effective_capacity']
        // let waterValue = Math.floor(Math.random()*100); //把sql的%數放在這裡
        let waterValue = Math.ceil(effective_water_storage/effective_capacity*100.0);
        console.log(effective_capacity);

        // console.log(waterValue);
        if(waterValue<=20){
         waterColor='rgb(255,99,71)';
         textColor='rgb(255, 68, 68)';
     }
     if(waterValue>=60){
         waterColor='rgba(25, 139, 201, 1)';
         textColor='rgba(06, 85, 128, 0.8)';
     }
     if(waterValue>20&&waterValue<60){
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

function setCircleFunction(clicked_menu){
    setTimeout(function(clicked_menu){ createCircle(clicked_menu); }, 800,clicked_menu);
}
function setRainfall_graph(clicked_menu){
    setTimeout(function(clicked_menu){ rainfall_graph(clicked_menu); }, 800,clicked_menu);
}

function rainfall_graph(clicked_menu){
    for(let x=0;x<page_menu_list[page][clicked_menu]['rain_station'].length;x++){ //each rain_station
        let day_label=[];
        let rainfall_label=[];
        for(let i=0;i<page_menu_list[page][clicked_menu]['rain_station'][x]['rainfall'].length;i++){ //each day
            day_label.push(page_menu_list[page][clicked_menu]['rain_station'][x]['rainfall'][i]['date']);
            rainfall_label.push(page_menu_list[page][clicked_menu]['rain_station'][x]['rainfall'][i]['today_rainfall']);
        }
        console.log(day_label);
        console.log(rainfall_label);
        console.log(x);
        var ctx = document.getElementById('myChart'+x);
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: day_label,
              datasets: [{
                label: '降雨量(毫米)',
                color:'white',
                data: rainfall_label,
                fill: true,
                borderColor: 'rgb(75, 192, 192)',
            // backgroundColor:'white',
        }]
    },
    options: {
        scales: {
            y: {
                ticks: {
                    color:'white',
                }
            },
            x: {
                ticks: {
                    color:'white',
                }
            },
          

        }
    }
});

    }        
}
var randomScalingFactor = function() { 

    return Math.round(Math.random() * 100) 

}; 

// loading animation
if(page==0){
    setTimeout(function(clicked_menu){ createCircle(clicked_menu); }, 1000,0);
}else if(page==1){
    setTimeout(function(clicked_menu){ rainfall_graph(clicked_menu); }, 1000,0);
}