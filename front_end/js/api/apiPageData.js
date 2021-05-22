apiPageData();

/* eslint-env jquery */
function apiPageData(){ 
    for(let i=0;i<page_amount;i++){
        let page_data;
        if(i===0){
            page_data =
                // the following data for test purpose only
                [   
                    ['北部',['石門水庫','翡翠水庫','新山水庫']],
                    ['中部',['1','2','3']],
                    ['南部',['1','2','3']],
                    ['東部',['1','2','曾文水庫']]
                ]
        }
        page_menu_list[i] = page_data;  
    } 
}