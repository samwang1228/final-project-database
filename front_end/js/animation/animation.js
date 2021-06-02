$(function (){
    setTimeout(1500);  //延遲1.5秒
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
  console.log(loading);
});

function switchAnimation(){
 var loading = new TimelineMax();
 loading.fromTo(".upper h2",3,{
  autoAlpha:0,
  y:-20
},{
  autoAlpha:1,
  y:0
});
}