jQuery(document).ready(function(){

  $("primary-bg").hide(); 
});

$(function(e) {
  $('#content').css('display','none');
$('.read-more-hide').css('display','none');  
    $('#textModal').on('shown.bs.modal', function (e) {
      $( ".btn-read-more" ).on( "click", function(e) {
        $("#stories-excerpt").toggle();
        $("#content").toggle();
        $(".read-more-hide").show();
         e.preventDefault();
       

        
      });
    })

    $('#textModal').on('shown.bs.modal', function (e) {
      $( ".read-more-hide" ).on( "click", function(e) {
        $("#stories-excerpt").toggle();
        $("#content").toggle();
        $(".read-more-hide").hide();
         e.preventDefault();
       

        
      });
    })
});
$(".modal").on("hidden.bs.modal", function(){
    $(".modal-body1").html("");
});


jQuery(window).on('load', function() { // makes sure the whole site is loaded
  $('#status').fadeOut(); // will first fade out the loading animation
  $('#preloader').delay(200).fadeOut('fast'); // will fade out the white DIV that covers the website.
  $('body').delay(200).css({'overflow':'visible'});
})


jQuery('.modal').on('show.bs.modal', function () {
  jQuery("body").css('overflow', 'hidden');
});

jQuery("body").click(function(){
  jQuery("body").css('overflow', 'auto');
});




$(function(){
    $('.close img').click(function(){      
        $('iframe').attr('src', $('iframe').attr('src'));
    });
});

jQuery(document).ready(function(){
    jQuery('[data-toggle="tooltip"]').tooltip();   
});