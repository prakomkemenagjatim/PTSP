(function($) {
  'use strict';
  $(function() {
    var sidebar = $('.sidebar');
    var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
   
    $('.nav li a', sidebar).each(function() {
      var $this = $(this);
      if (current === "") {
        //for root url
        if ($this.attr('href').indexOf("index.html") !== -1) {
          $(this).parents('.nav-item').last().addClass('active');
          if ($(this).parents('.sub-menu').length) {
            $(this).closest('.collapse').addClass('show');
            $(this).addClass('active');
          }
        }
      } else {
        //for other url
        if ($this.attr('href').indexOf(current) !== -1) {
        	
        	if ($this.attr('href') == location){
				$(this).parents('.nav-item').last().addClass('active');
				  if ($(this).parents('.sub-menu').length) {
		            $(this).closest('.collapse').addClass('show');
		            $(this).addClass('active');
		          }
			} 
        }
      }
    })

    sidebar.on('show.bs.collapse', '.collapse', function() {
      sidebar.find('.collapse.show').collapse('hide');
    });

    applyStyles();

    function applyStyles() {
      if ($('.scroll-container').length) {
        const ScrollContainer = new PerfectScrollbar('.scroll-container');
      }
    }
    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');


    $(".purchace-popup .popup-dismiss").on("click",function(){
      $(".purchace-popup").slideToggle();
    });
  });
})(jQuery);