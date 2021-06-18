// the global file save page_info to loading each page
// remember to load this file at head of the document

// var SERVER_ADDRESS = 'http://localhost/';
// var LOGIN_COOKIE_ADDRESS = 'localhost';

var SERVER_ADDRESS = 'http://ec2-3-92-133-135.compute-1.amazonaws.com/'
var LOGIN_COOKIE_ADDRESS = 'ec2-3-92-133-135.compute-1.amazonaws.com';


var frontend_address = SERVER_ADDRESS + 'reservoir_project/front_end/';
var backend_address = SERVER_ADDRESS + 'reservoir_project/back_end/backend.php';

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
