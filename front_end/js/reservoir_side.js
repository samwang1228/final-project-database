apiReservoirSide();

/* eslint-env jquery */
function apiReservoirSide(){
    reservoir = getReservoirSide();
    htmlCode = generateReservoirSideCode(reservoir);
    $('.menu-item').append(htmlCode);
}

function getReservoirSide(){
    return (
        // the following data for test purpose only
        [   
            ['北部','石門水庫','翡翠水庫','新山水庫'],
            ['中部','1','2','3'],
            ['南部','1','2','3'],
            ['東部','1','2','曾文水庫']
        ]
    );
}

function generateReservoirSideCode(reservoir){
    htmlCode = '';
    for (let i=0; i < reservoir.length; i++) {
        htmlCode += '<div onclick="onSideMenuTitleClick('+i+')" class="uiTitle"><i class="fa fa-bars" aria-hidden="true"></i> '+reservoir[i][0]+'</div>';
        htmlCode += '<ul id="menu-'+i+'" class="hide">';
        for (let j=1; j<reservoir[i].length;j++) {
            id = 'item'+i+'-'+j;
            onClick = 'onSideMenuItemClick('+i+','+j+')';
            htmlCode += '<li id='+id+' onClick='+onClick+'>'+reservoir[i][j]+'</li>';
        }
        htmlCode += '</ul>';
    }
    return htmlCode;
}