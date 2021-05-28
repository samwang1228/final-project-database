/* eslint-env jquery */
function apiPageData(callback){ 
    for(let i=0;i<page_amount;i++){
        let page_data;
        if(i===0){
            // page_data =
            //     // the following data for test purpose only
            //     [   
            //         ['北部',['新山水庫','石門水庫','翡翠水庫','寶山水庫','寶山第二水庫']],
            //         ['中部',['永和山水庫','明德水庫','鯉魚潭水庫','德基水庫','石岡壩','霧社水庫','日月潭水庫','湖山水庫']],
            //         ['南部',['仁義潭水庫','蘭潭水庫','白河水庫','烏山頭水庫','曾文水庫','南化水庫','阿公店水庫','牡丹水庫']],
            //         ['東部',['東部沒水庫','想不到吧','ㄏㄏ']]
            //     ]
            
            $.post({
                url:'http://localhost/reservoir_project/back_end/backend.php/',
                data:JSON.stringify({type:'get_reservoir_data'})
                },function(jsonResult){
                    let result = JSON.parse(jsonResult);
                    if(result['sucess']==='true'){
                        console.log(result['data']);
                        page_menu_list[i] = result['data'];
                        callback(true);
                    }
                }
            );
        }
    } 
}