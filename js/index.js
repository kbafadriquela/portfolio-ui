jQuery(document).ready(function($){
 $('.main-navigation-mobile .menu').hide();
 $('.main-navigation-mobile .sub-menu').hide();
  $(".menu-toggle").click(function(){
    $(".fa-solid").toggleClass("fa-bars");
    $(".main-navigation-mobile .menu").slideToggle("slow");
    $(".main-navigation-mobile .sub-menu").slideToggle("slow");
    $(".fa-solid").toggleClass("fa-x");
  });
});