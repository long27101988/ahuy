var general = {
  initBoxServiceCarousel: function(){
    $('.box-service-carousel').owlCarousel({
      loop:true,
      margin: 0,
      nav:true,
      items: 1,
      dots: false
    })
  },
  showAndHideShoppingCart: function(){
    $('.shopping-cart-button').hover(function(){
      $(this).children('.shopping-cart').fadeIn('fast');
    }, function () {
      $(this).children('.shopping-cart').fadeOut('fast');
    });
  },
  showAndHideBoxSearch: function(){
    $(function () {
      var mobileCheck = function () {
        var check = false;
        (function (a) {
          if (/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)))check = true
        })(navigator.userAgent || navigator.vendor || window.opera);
        return check;
      };

      var button = $('.btn-search'),
        eventType = mobileCheck() ? 'touchstart' : 'click',
        body = $('body');

      $(document).on(eventType, function (event) {
        if (!$(event.target).hasClass('search') && $('.search').has(event.target).length === 0) {
          setTimeout(function () {
            body.removeClass('search-open');
          }, 300);
        }
      });

      button.on(eventType, function (event) {
        event.stopPropagation();
        event.preventDefault();
        body.addClass('search-open');
        console.log('???');
      });
    });
  },
  hideBoxSearch: function(){
    $('.search .close').click(function(){
      setTimeout(function () {
        $('body').removeClass('search-open');
      }, 300);
      return false;
    })
  }
};

var home = {
  initHomeCarousel: function(){
    $('.home-carousel').owlCarousel({
      loop:true,
      margin: 0,
      nav:false,
      items: 1,
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true
    })
  },
  initHomeInfoCarousel: function(){
    $('.home-info-carousel').owlCarousel({
      loop:true,
      margin: 0,
      nav:true,
      items: 1,
      dots: false
    })
  },
  initHomeServiceCarousel: function(){
    $('.home-service-carousel').owlCarousel({
      loop:true,
      margin: 30,
      nav:false,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      responsive:{
        0:{
          items:1
        },
        480:{
          items:2
        },
        768:{
          items:3
        },
        1024:{
          items:4
        }
      }
    })
  },
  initHomeProjectCarousel: function(){
    $('.home-project-carousel').owlCarousel({
      loop:true,
      margin: 15,
      nav:true,
      dots: false,
      center: true,
      responsive:{
        0:{
          items:1,
          nav:false,
          dots: true
        },
        480:{
          items:2,
          nav:false,
          dots: true
        },
        768:{
          items:3,
          nav:false,
          dots: true
        },
        1024:{
          items:3
        }
      }
    })
  },
  initHomePartnerCarousel: function(){
    $('.home-partner-carousel').owlCarousel({
      loop:true,
      margin: 0,
      nav:true,
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true,
      dots: false,
      responsive:{
        0:{
          items:1,
          nav:false,
          dots: true
        },
        480:{
          items:2,
          nav:false,
          dots: true
        },
        768:{
          items:3,
          nav:false,
          dots: true
        },
        1024:{
          items:4
        }
      }
    });
  }
};

var product = {
  initImages: function(){
    var sync1 = $(".slider");
    var sync2 = $(".thumbnails");

    sync1.owlCarousel_1({
      singleItem : true,
      slideSpeed : 1000,
      navigation: true,
      pagination:false,
      afterAction : syncPosition,
      responsiveRefreshRate : 200,
    });

    sync2.owlCarousel_1({
      items : 4,
      itemsDesktop      : [1199,4],
      itemsDesktopSmall     : [979,4],
      itemsTablet       : [768,4],
      itemsMobile       : [479,4],
      pagination:false,
      responsiveRefreshRate : 100,
      afterInit : function(el){
        el.find(".owl-item").eq(0).addClass("synced");
      }
    });

    function syncPosition(el){
      var current = this.currentItem;
      $(".thumbnails")
        .find(".owl-item")
        .removeClass("synced")
        .eq(current)
        .addClass("synced")
      if($(".thumbnails").data("owlCarousel_1") !== undefined){
        center(current)
      }
    }

    $(".thumbnails").on("click", ".owl-item", function(e){
      e.preventDefault();
      var number = $(this).data("owlItem");
      sync1.trigger("owl.goTo",number);
    });

    function center(number){
      var sync2visible = sync2.data("owlCarousel_1").owl.visibleItems;
      var num = number;
      var found = false;
      for(var i in sync2visible){
        if(num === sync2visible[i]){
          var found = true;
        }
      }

      if(found===false){
        if(num>sync2visible[sync2visible.length-1]){
          sync2.trigger("owl.goTo", num - sync2visible.length+2)
        }else{
          if(num - 1 === -1){
            num = 0;
          }
          sync2.trigger("owl.goTo", num);
        }
      } else if(num === sync2visible[sync2visible.length-1]){
        sync2.trigger("owl.goTo", sync2visible[1])
      } else if(num === sync2visible[0]){
        sync2.trigger("owl.goTo", num-1)
      }
    }
  },
  scrollCompany: function(){
    (function($){
      $(window).on("load",function(){
        $(".company").mCustomScrollbar();
      });
    })(jQuery);
  },
  initSliderPrice: function(){
    // Slider with fixed minimum
    $("#slider-price").slider({
        range: true,
        step: 500000,
        value: 0,
        min: 0,
        max: 15000000,
        values: [0, 5000000],
        slide: function(event, ui) {
          $("#min-price").text(ui.values[0] + " đ");
          $("#max-price").text(ui.values[1] + " đ");
        }
    });

    $("#min-price").text($("#slider-price").slider("values", 0) + " đ");
    $("#max-price").text($("#slider-price").slider("values", 1) + " đ");
  },
  initSliderPH: function(){
    // Slider with fixed minimum
    $("#slider-ph").slider({
        range: true,
        value: 0,
        step: 1,
        min: 1,
        max: 5,
        values: [1, 2],
        slide: function(event, ui) {
          $("#min-ph").text(ui.values[0] + " PH");
          $("#max-ph").text(ui.values[1] + " PH");
        }
    });

    $("#min-ph").text($("#slider-ph").slider("values", 0) + " PH");
    $("#max-ph").text($("#slider-ph").slider("values", 1) + " PH");
  },
  collapseTitle: function(){
    $('.title-collapse').click(function(){
      if(!$(this).next('.box-content').is(':visible')){
        $(this).next('.box-content').slideDown('fast');
        $(this).parents('.sidebar-box').css('border-bottom', '1px solid #ddd');
        $(this).children('i').removeClass('fa-caret-down');
        $(this).children('i').addClass('fa-caret-up');
      }else{
        $(this).next('.box-content').slideUp('fast');
        $(this).parents('.sidebar-box').css('border-bottom', '0px solid #ddd');
        $(this).children('i').removeClass('fa-caret-up');
        $(this).children('i').addClass('fa-caret-down');
      }
      return false;
    });
  }
};

var product_details = {
  initImages: function(){
    var sync1 = $("#sync1");
    var sync2 = $("#sync2");

    sync1.owlCarousel_1({
      singleItem : true,
      slideSpeed : 1000,
      navigation: true,
      pagination:false,
      afterAction : syncPosition,
      responsiveRefreshRate : 200,
    });

    sync2.owlCarousel_1({
      items : 4,
      itemsDesktop      : [1199,4],
      itemsDesktopSmall     : [979,4],
      itemsTablet       : [768,4],
      itemsMobile       : [479,4],
      pagination:false,
      responsiveRefreshRate : 100,
      afterInit : function(el){
        el.find(".owl-item").eq(0).addClass("synced");
      }
    });

    function syncPosition(el){
      var current = this.currentItem;
      $("#sync2")
        .find(".owl-item")
        .removeClass("synced")
        .eq(current)
        .addClass("synced")
      if($("#sync2").data("owlCarousel_1") !== undefined){
        center(current)
      }
    }

    $("#sync2").on("click", ".owl-item", function(e){
      e.preventDefault();
      var number = $(this).data("owlItem");
      sync1.trigger("owl.goTo",number);
    });

    function center(number){
      var sync2visible = sync2.data("owlCarousel_1").owl.visibleItems;
      var num = number;
      var found = false;
      for(var i in sync2visible){
        if(num === sync2visible[i]){
          var found = true;
        }
      }

      if(found===false){
        if(num>sync2visible[sync2visible.length-1]){
          sync2.trigger("owl.goTo", num - sync2visible.length+2)
        }else{
          if(num - 1 === -1){
            num = 0;
          }
          sync2.trigger("owl.goTo", num);
        }
      } else if(num === sync2visible[sync2visible.length-1]){
        sync2.trigger("owl.goTo", sync2visible[1])
      } else if(num === sync2visible[0]){
        sync2.trigger("owl.goTo", num-1)
      }
    }
  },
  initOtherProductsCarousel: function(){
    $('.other-products-carousel').owlCarousel({
      loop:true,
      margin: 30,
      nav:false,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      responsive:{
        0:{
          items:1,
          nav:false,
          dots: true
        },
        480:{
          items:2,
          nav:false,
          dots: true
        },
        768:{
          items:3,
          nav:false,
          dots: true
        },
        1024:{
          items:3
        }
      }
    })
  },
  showProductText: function(){
    $('.btnToggleText').click(function(){
      if(!$('.product-text-c').is(':visible')){
        $('.product-text-c').slideDown();
        $(this).html('THU GỌN <i class="fa fa-caret-up" aria-hidden="true"></i>');
        $('html, body').animate({ scrollTop: $('.product-text-c').offset().top - 50}, 700);
      } else {
        $('.product-text-c').slideUp();
        $(this).html('GIỚI THIỆU TÍNH NĂNG SẢN PHẨM <i class="fa fa-caret-down" aria-hidden="true"></i>');
      }
      return false;
    });
  },
  fixedProductFeature: function(){
    $('.pc-product-feature').sticky({topSpacing:0});
  }
}

var project_details = {
  initImages: function(){
    var sync1 = $("#project-sync1");
    var sync2 = $("#project-sync2");

    sync1.owlCarousel_1({
      singleItem : true,
      slideSpeed : 1000,
      navigation: false,
      pagination:false,
      afterAction : syncPosition,
      responsiveRefreshRate : 200,
    });

    sync2.owlCarousel_1({
      items : 4,
      itemsDesktop      : [1199,4],
      itemsDesktopSmall     : [979,4],
      itemsTablet       : [768,4],
      itemsMobile       : [479,3],
      navigation: true,
      pagination:false,
      responsiveRefreshRate : 100,
      afterInit : function(el){
        el.find(".owl-item").eq(0).addClass("synced");
      }
    });

    function syncPosition(el){
      var current = this.currentItem;
      $("#project-sync2")
        .find(".owl-item")
        .removeClass("synced")
        .eq(current)
        .addClass("synced")
      if($("#project-sync2").data("owlCarousel_1") !== undefined){
        center(current)
      }
    }

    $("#project-sync2").on("click", ".owl-item", function(e){
      e.preventDefault();
      var number = $(this).data("owlItem");
      sync1.trigger("owl.goTo",number);
    });

    function center(number){
      var sync2visible = sync2.data("owlCarousel_1").owl.visibleItems;
      var num = number;
      var found = false;
      for(var i in sync2visible){
        if(num === sync2visible[i]){
          var found = true;
        }
      }

      if(found===false){
        if(num>sync2visible[sync2visible.length-1]){
          sync2.trigger("owl.goTo", num - sync2visible.length+2)
        }else{
          if(num - 1 === -1){
            num = 0;
          }
          sync2.trigger("owl.goTo", num);
        }
      } else if(num === sync2visible[sync2visible.length-1]){
        sync2.trigger("owl.goTo", sync2visible[1])
      } else if(num === sync2visible[0]){
        sync2.trigger("owl.goTo", num-1)
      }
    }
  },
}

$(document).ready(function() {

  general.initBoxServiceCarousel();
  general.showAndHideShoppingCart();
  general.showAndHideBoxSearch();
  general.hideBoxSearch();

  home.initHomeCarousel();
  home.initHomeInfoCarousel();
  home.initHomeServiceCarousel();
  home.initHomeProjectCarousel();
  home.initHomePartnerCarousel();

  product.initImages();
  product.scrollCompany();
  product.initSliderPrice();
  product.initSliderPH();
  product.collapseTitle();

  product_details.initImages();
  product_details.initOtherProductsCarousel();
  product_details.showProductText();
  product_details.fixedProductFeature();

  project_details.initImages();

});