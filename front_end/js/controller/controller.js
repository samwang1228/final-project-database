// setup global variable
initialize();

// loding data
apiPageData(initial_page_content);

// rendering page
function initial_page_content(state){
	if(!state){ //failed fatch data
		console.log('Unable Fatch Data!');
	}
	
	//success fatch data
	updateSideCode(page_num);
	updatePageCode(page_num,0);
}