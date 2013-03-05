jQuery(document).ready(function($){
  /*$(".contacto-nuevo-a").colorbox({inline:true, width:"100%", href:"#block-menu-menu-d-nde-qudarse-"});


  $(".inlinepop").colorbox({inline:true, width:"50%", href:"#login-pop"});*/

 	jQuery(".block-webform").hide();
  //toggle the componenet with class msg_body
  jQuery(".click-contacto").click(function()
  {
    jQuery(".block-webform").slideToggle(500);
  });
});