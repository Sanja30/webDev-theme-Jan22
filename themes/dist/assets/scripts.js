!function(e){function t(){let t=e(".animate"),a=e(window).height(),n=e(window).scrollTop(),o=a+n;e.each(t,function(){let t=e(this),a=t.outerHeight(),i=t.offset().top;a+i>=n&&i<=o&&t.addClass("animated")})}function a(){let t=e("#to-top"),a=e(window).scrollTop(),n=e("#page-header");a>n.outerHeight()+n.offset().top?t.addClass("show"):t.removeClass("show")}e(document).ready(function(){e("html").removeClass("no-js").addClass("js"),t(),a(),e("#main-nav .menu-item-has-children > a").each(function(t,a){let n=e(this).parent().attr("id")+"-toggle";e(this).after('<input type="checkbox" id="'+n+'">\n                <label for="'+n+'" class="menu-toggle">\n                    <span class="toggle-icon" aria-hidden="true"></span>\n                    <span class="screen-reader-text">Submenu öffnen/schließen</span>\n                </label>')}),e('#main-nav .current-menu-parent > input[type="checkbox"]').attr("checked","checked"),e.isFunction(e.fn.owlCarousel)&&e(".testimonials .owl-carousel").owlCarousel({items:1,autoplay:!0,loop:!0,autoplaySpeed:1e3,dotsSpeed:800}),e('a[href$=".jpg"],a[href$=".jpeg"],a[href$=".png"]').each(function(t){e(this).attr("data-lightbox","image"+t);let a=e(this).children("img").attr("alt");void 0!==a&&!1!==a&&e(this).attr("data-title",a)}),e(".gallery").each(function(t){e(this).find('a[href$=".jpg"],a[href$=".jpeg"],a[href$=".png"]').attr("data-lightbox","gallery"+t)})}),e(window).scroll(function(){t(),a()}),e(window).resize(function(){t(),a()})}(jQuery);