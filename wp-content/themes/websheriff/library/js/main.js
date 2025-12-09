jQuery.noConflict();

(function ($) {
    $(document).ready(function () {
        smoothScroll();
        menu();
        accordion();
        headerController();
        stepsSlider();
        postSlider();

        if ($(window).width() > 991) {
            lenis();

            AOS.init({
                offset: 50,
                duration: 1000,
            });
        } else {
            AOS.init({
                offset: 50,
                duration: 600,
            });
        }
    });

    let postSlider = () => {
        let slider = $(".post-archive-intro .slider");

        if (slider && slider.length > 0) {
            slider.slick({
                autoplay: true,
                dots: false,
                arrows: false,
                variableWidth: false,
                infinite: true,
                fade: true,
            });

            $('.post-archive-intro .slider .prev').on('click keydown', function () {
                slider.slick("slickPrev");
            });
            $('.post-archive-intro .slider .next').on('click keydown', function () {
                slider.slick("slickNext");
            });
        }
    };

    let stepsSlider = () => {
        let slider = $(".steps.slider .steps-wrapper");

        if (slider && slider.length > 0) {
            slider.slick({
                autoplay: false,
                dots: true,
                arrows: false,
                variableWidth: true,
                infinite: false,
            });
        }
    };

    let headerController = function () {
        let scrollWrapper = $(window);
        let body = $("body");

        if (scrollWrapper.scrollTop() > 0) {
            body.addClass("scrolled");
        }

        scrollWrapper.scroll(function () {
            if (scrollWrapper.scrollTop() > 10) {
                body.addClass("scrolled");
            } else {
                body.removeClass("scrolled");
            }
        });
    };

    let accordion = () => {
        let list = $(".accordion");

        if (list) {
            list.accordion({
                collapsible: true,
                active: false,
                header: "h4",
                heightStyle: "content",
            });
        }

        $(".accordion .question").click(function () {
            if ($(this).find(".ui-accordion-header").hasClass("ui-state-active")) {
                $(".accordion .question").removeClass("open");
                $(this).addClass("open");
            } else {
                $(".accordion .question").removeClass("open");
            }
        });
    };

    let lenis = () => {
        const lenis = new Lenis();

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }

        requestAnimationFrame(raf);
    };

    let smoothScroll = function () {
        $(document).on("click", "a[href^=\"#\"]", function (event) {
            event.preventDefault();

            $("html, body").animate({
                scrollTop: $($.attr(this, "href")).offset().top - 120,
            }, 500);
        });
    };

    var menu = function () {
        $('.mobile-nav .menu-item-has-children > a').on('click', function (e) {
            e.preventDefault();
            console.log('hold');
            $(this).toggleClass('open');
        });

        $(".hamburger").click(function () {
            $("body").toggleClass("mobile-nav-open");

            setTimeout(function () {
                $("body, html").toggleClass("no-scroll");
            }, 500);
        });
    };
})(jQuery);

