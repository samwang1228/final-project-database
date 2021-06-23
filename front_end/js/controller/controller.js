// setup global variable
initialize();

// loding data
apiPageData(initial_page_content);

// rendering page after loading title
function initial_page_content(state){
	if(!state){ //failed fatch data
		console.log('Unable Fatch Data!');
		return;
	}	
	// console.log(page_num,page_menu_list[page_num]);
	apiLoadChunkData(0,function(status){});
}