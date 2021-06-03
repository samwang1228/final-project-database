/* eslint-env jquery */
function apiPageData(callback){
    if(page_num === 0){            
        $.post({
            url:backend_address,
            data:JSON.stringify({type:'get_reservoir_data'})
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