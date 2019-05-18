window.jQuery = window.$ = jQuery;


jQuery(window).on('load', function () {
  //Preloader
  setTimeout("jQuery('#preloader').animate({'opacity' : '0'},300,function(){jQuery('#preloader').hide()})",800);
  setTimeout("jQuery('.preloader_hide, .selector_open').animate({'opacity' : '1'},500)",800);

});

