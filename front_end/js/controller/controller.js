
initialize();

apiPageData(initial_page_content);

function initial_page_content(state){
	if(!state){ //failed fatch data
		console.log('Unable Fatch Data!');
	}
	
	//success fatch data
	updateSideCode(0);
	updatePageCode(0,0);
}