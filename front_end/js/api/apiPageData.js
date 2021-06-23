/* eslint-env jquery */
function apiPageData(callback){
    if(page_num === 0){ //水庫水情 
        for(let i=0;i<sql_area_list.length;i++){            
            page_menu_list[page_num].push({'area_name':sql_area_list[i],'reservoir':[]});
        }        
        callback(true);

    }else if(page_num===1){ //降雨分析
        $.post({
            url:backend_address,
            data:JSON.stringify({type:'get_city'})
            },function(jsonResult){
                let result = JSON.parse(jsonResult);
                if(result['sucess']==='true'){
                    console.log(result['data']);
                    page_menu_list[page_num] = result['data'];
                    callback(true);
                }
            }
        );
    }
    
}

function apiGetReservoirByArea(click_item,callback){
    area = sql_area_list[click_item];
    $.post({
        url:backend_address,
        data:JSON.stringify({type:'get_reservoir_data_area','area':area})
        },function(jsonResult){
            let result = JSON.parse(jsonResult);
            if(result['sucess']==='true'){                
                page_menu_list[page_num][click_item] = result['data'][0];
                onMenuDataLoad(true,click_item);
                callback(true);
            }            
        }
    );
}

function apiGetRainfallByArea(click_item,callback){
    city_list=[];
    city_list.push(page_menu_list[page_num][click_item]['city_name']);

    $.post({
        url:backend_address,
        data:JSON.stringify({type:'get_rainfall_data_area','city':city_list,'time':'weekly'})
        },function(jsonResult){
            let result = JSON.parse(jsonResult);
            if(result['sucess']==='true'){                
                for(let j=0;j<page_menu_list[page_num].length;j++){
                    if(result['data'][0]['city_name']===page_menu_list[page_num][j]['city_name']){
                        page_menu_list[page_num][j]['rain_station'] = result['data'][0]['rain_station'];
                        break;
                    }
                }
                onMenuDataLoad(true,click_item);
                callback(true);
            }            
        }
    );

}


function onMenuDataLoad(status,page_area){
	if(!status){
		console.log('error');
		return;
	}	
    updateSideCode(0);
	updatePageCode(page_num,page_area);
}

function apiLoadChunkData(clicked_menu,func){
    console.log('Before_ChunkLoad',clicked_menu);
    switch(page_num){
        case 0: //reservoir
            apiGetReservoirByArea(clicked_menu,func);
            break;
        case 1: //rainfall
            apiGetRainfallByArea(clicked_menu,func);
            break;
        case 2: //watercut
            break;
    }
}