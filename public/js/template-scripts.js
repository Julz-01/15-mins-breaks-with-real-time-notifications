jQuery(document).ready(function($) {
  var theme_slider = $("#owl-demo");
  var owl = $('#owl-demo');
  owl.owlCarousel({
    nav: false,
    dots: true,
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 6000
  });
  var owl = $('#owl-demo2');
  owl.owlCarousel({
    nav: true,
    dots: false,
    items: 1,
    loop: true,
    navText: ["&#xf007","&#xf006"],
    autoplay: true,
    autoplayTimeout: 4000
  });
  
   // Our Team 
  var owl = $('.our-team-carousel');
  owl.owlCarousel({
    nav: true,
    dots: false,
    items: 4,
    responsive: {
      0: {
        items: 1
      },
      481: {
        items: 3
      },
      769: {
        items: 4
      }
    },
    loop: true,
    navText: ["&#xf007","&#xf006"],
    autoplay: false
  });

  // Custom Navigation Events
  $(".next-arrow").click(function() {
      theme_slider.trigger('next.owl');
  })
  $(".prev-arrow").click(function() {
      theme_slider.trigger('prev.owl');
  })
  
  // map
  $('#map').each(function() {
  
    var latitude = $(this).data( "latitude" );
    var longitude = $(this).data( "longitude" );
    var zoom = $(this).data( "zoom" );
    
    var address = 'Custom Address';
    var mapOptions = {
    	zoom: zoom,
    	scrollwheel: false,     
  	  center: new google.maps.LatLng(latitude, longitude),
  	  mapTypeId: google.maps.MapTypeId.ROADMAP,  		
    }   
  	var stylez = [
  		{
  		  featureType: "all",
  		  elementType: "all",
  		  stylers: [
  			{ saturation: -70 } // <-- THIS
  		  ]
  		}
  	];
    var map = new google.maps.Map(document.getElementById('map'),  
  								mapOptions);
    var image = 'img/arrow.png';
    var myLatLng = new google.maps.LatLng(latitude, longitude);
    var beachMarker = new google.maps.Marker({
  	  position: myLatLng,
  	  map: map,
  	  icon: image
    });	
  	var mapType = new google.maps.StyledMapType(stylez, { name:"Grayscale" });    
  	map.mapTypes.set('tehgrayz', mapType);
  	map.setMapTypeId('tehgrayz');   
  });

  
  // Pie Charts 
  $('.chart').bind('inview', function (event, visible) {
    if (visible) {            
      $('.chart').easyPieChart({ 
        barColor: '#00B8D9',
        trackColor: '#205167', 
        size: 150, 
        lineWidth: 2,    
        scaleLength: 0,
        animate: {
    			duration: 2000,
    			enabled: true
        }          
     }); 
   }          
 });
 
 // Lightbox
 $('a[data-rel^=lightcase]').lightcase({
    maxWidth: 1000,
    maxHeight: 'auto',
    transition: 'scrollHorizontal',
    speedIn: 600,
    speedOut: 600,
    video: {
			width: 1000,
			height: 'auto',
			loop: true
		},
 });

  
  // Nav bar to top
  $(window).bind('scroll', function () {
    if ($(window).scrollTop() > 20) {
        $('.fixed').addClass('fixed-top');
    } else {
        $('.fixed').removeClass('fixed-top');
    }
  });

  // One page navigation
  var lastId,
      topMenu = $(".top-nav"),
      topMenuHeight = topMenu.outerHeight() + 15,
      menuItems = topMenu.find("a"),
      scrollItems = menuItems.map(function() {
          var item = $($(this).attr("href"));
          if (item.length) {
              return item;
          }
      });
  menuItems.click(function(e) {
      var href = $(this).attr("href"),
          offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 1;
      $('html, body').stop().animate({
          scrollTop: offsetTop
      }, 300);
      e.preventDefault();
  });
  $(window).scroll(function() {
      var fromTop = $(this).scrollTop() + topMenuHeight;
      var cur = scrollItems.map(function() {
          if ($(this).offset().top < fromTop)
              return this;
      });
      cur = cur[cur.length - 1];
      var id = cur && cur.length ? cur[0].id : "";
  
      if (lastId !== id) {
          lastId = id;
          menuItems
              .parent().removeClass("active-item")
              .end().filter("[href=#" + id + "]").parent().addClass("active-item");
      }
  }); 
});

// Pie charts in view animation
/**
 * author Remy Sharp
 * url http://remysharp.com/2009/01/26/element-in-view-event-plugin/
 */
(function ($) {
    function getViewportHeight() {
        var height = window.innerHeight; // Safari, Opera
        var mode = document.compatMode;

        if ( (mode || !$.support.boxModel) ) { // IE, Gecko
            height = (mode == 'CSS1Compat') ?
            document.documentElement.clientHeight : // Standards
            document.body.clientHeight; // Quirks
        }

        return height;
    }

    $(window).scroll(function () {
        var vpH = getViewportHeight(),
            scrolltop = (document.documentElement.scrollTop ?
                document.documentElement.scrollTop :
                document.body.scrollTop),
            elems = [];
        
        // naughty, but this is how it knows which elements to check for
        $.each($.cache, function () {
            if (this.events && this.events.inview) {
                elems.push(this.handle.elem);
            }
        });

        if (elems.length) {
            $(elems).each(function () {
                var $el = $(this),
                    top = $el.offset().top,
                    height = $el.height(),
                    inview = $el.data('inview') || false;

                if (scrolltop > (top + height) || scrolltop + vpH < top) {
                    if (inview) {
                        $el.data('inview', false);
                        $el.trigger('inview', [ false ]);                        
                    }
                } else if (scrolltop < (top + height)) {
                    if (!inview) {
                        $el.data('inview', true);
                        $el.trigger('inview', [ true ]);
                    }
                }
            });
        }
    });
    
    // kick the event to pick up any elements already in view.
    // note however, this only works if the plugin is included after the elements are bound to 'inview'
    $(function () {
        $(window).scroll();
    });
})(jQuery);