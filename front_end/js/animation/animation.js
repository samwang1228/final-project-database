$(function (){
    setTimeout(1000);  //延遲1.5秒
  })
$( document ).ready(function() {
  var loading = new TimelineMax();
  loading.fromTo(".upper h2",3,{
    autoAlpha:0,
    y:-20
  },{
    autoAlpha:1,
    y:0
  })


  ;
  // console.log(loading);
});

function switchAnimation(){
 let ani = new TimelineMax();
 ani.fromTo(".upper h2",3,{
  autoAlpha:0,
  y:-20
},{
  autoAlpha:1,
  y:0
});
//  console.log(ani);
}

