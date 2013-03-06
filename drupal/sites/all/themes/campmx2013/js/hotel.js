jQuery(document).ready(function($){
  /*$(".contacto-nuevo-a").colorbox({inline:true, width:"100%", href:"#block-menu-menu-d-nde-qudarse-"});


  $(".inlinepop").colorbox({inline:true, width:"50%", href:"#login-pop"});*/

 	jQuery(".block-webform").hide();
  //toggle the componenet with class msg_body
  jQuery(".click-contacto").click(function()
  {
    jQuery(".block-webform").slideToggle(500);
  });

	



	/*$(".form-text").click(function(){
	$(this).removeClass("form-text").val("");
	});*/

	$('.form-text').each(function() {

       var default_value = this.value;

       $(this).focus(function(){
               if(this.value == default_value) {
                       this.value = '';
               }
       });

       $(this).blur(function(){
               if(this.value == '') {
                       this.value = default_value;
               }
       });

	});

	

	$("#edit-submitted-comentarios")
  .focus(function() {
        if (this.value === this.defaultValue) {
            this.value = '';
        }
  })
  .blur(function() {
        if (this.value === '') {
            this.value = this.defaultValue;
        }
	});



});