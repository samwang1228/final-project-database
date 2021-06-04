// the global file save page_info to loading each page
// remember to load this file at head of the document

var frontend_address = 'http://localhost/reservoir_project/front_end/'
var backend_address = 'http://localhost/reservoir_project/back_end/backend.php';

var page_amount = 4;
// the following code check which page is loading
let page = document.currentScript.getAttribute('page');
var page_num = parseInt(page,10);
// 0=水庫情形 1=降雨分析 2=停水預警 4=Account

var page_menu_list = [];
var area_list = ['N','S','E','W'];

function initialize(){
    for(let i=0;i<page_amount;i++){
        page_menu_list.push([]);
    }   
}
