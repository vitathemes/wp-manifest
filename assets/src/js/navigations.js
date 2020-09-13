jQuery(document).ready(function () {
    jQuery('.c-header__nav-icon').click(function (e) {
        e.preventDefault();
        jQuery(this).toggleClass('js-open');
        jQuery(".js-header").toggleClass('is-nav-open');

        if (jQuery(this).hasClass("js-open")) {

            jQuery(".js-header-primary-nav").fadeIn("fast");

            var scrollTopBody = "-" + window.scrollY.toString() + "px";
            document.body.style.position = 'fixed';
            document.body.style.top = scrollTopBody;
            jQuery("html").addClass('is-nav-open');
        }
        else {
            jQuery(".js-header-primary-nav").fadeOut("fast");

            const scrollY = document.body.style.top;
            document.body.style.top = '';
            document.body.style.position = '';
            window.scrollTo(0, parseInt(scrollY || '0') * -1);
            jQuery("html").removeClass('is-nav-open');
        }
    });

    if (window.matchMedia('(max-width: 1200px)').matches) {
    jQuery('.js-header-primary-nav li a').click(function (e) {
        var menuItem = jQuery(this).offsetTop;
        jQuery('.c-header__nav-icon').toggleClass('js-open');
        jQuery(".js-header").toggleClass('is-nav-open');

        jQuery(".js-header-primary-nav").fadeOut("fast");

        document.body.style.top = '';
        document.body.style.position = '';
        window.scrollTo(0, parseInt(menuItem || '0') * -1);
        jQuery("html").removeClass('is-nav-open');

    });
        }
});

jQuery(document).ready(function () {
// Hide Header on on scroll down
    var didScroll;
    var lastScrollTop = 32;
    var delta = 5;
    var navbarHeight = jQuery('.c-header').outerHeight();
    jQuery('.c-header').removeClass('nav-down').removeClass('nav-up');


    jQuery(window).scroll(function (event) {
        didScroll = true;
    });


    setInterval(function () {
        if (!jQuery(".c-header__nav-icon.js-open").length) {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }
    }, 250);

    function hasScrolled() {
        var st = jQuery(this).scrollTop();

        if (jQuery(this).scrollTop() === 0) {
            jQuery('.c-header').removeClass('nav-down').removeClass('nav-up');
            return;
        } else {

            // Make sure they scroll more than delta
            if (Math.abs(lastScrollTop - st) <= delta)
                return;

            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight) {
                // Scroll Down
                jQuery('.c-header').removeClass('nav-down').addClass('nav-up');
            } else {
                // Scroll Up
                if (st + jQuery(window).height() < jQuery(document).height()) {
                    jQuery('.c-header').removeClass('nav-up').addClass('nav-down');
                }
            }

            lastScrollTop = st;
        }
    }

    if (window.matchMedia('(max-width: 980px)').matches) {
        jQuery('.menu-item-has-children > a').click(function (e) {
            e.preventDefault();
            jQuery(this).parent().children('.sub-menu').toggleClass('is-open');
            jQuery(this).parent().toggleClass('is-submenu-open');
        });
    }
});
