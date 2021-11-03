jQuery(function($) {

    /* -----------------------------------------
    Navigation
    ----------------------------------------- */
    var primary_menu_toggle = $('#masthead .menu-toggle');
    primary_menu_toggle.click(function() {
        $(this).toggleClass('active');
        $('body').toggleClass('menu-opened');
    });

    /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */
    $(window).on('load resize', function() {
        if ($(window).width() < 992) {
            $('.main-menu').find("li").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        } else {
            $('.main-menu').find("li").unbind('keydown');
            $('li.menu-item-search').find('button').bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('li.menu-item-search').find('#close-btn').focus();
                }
            });
        }
    });

    primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (primary_menu_toggle.hasClass('active')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.main-navigation').toggleClass('toggled');
                primary_menu_toggle.removeClass('active');
            };
        }
    });

    $('#close-btn').on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;
        if ($('body').hasClass('search-open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('#search-overlay').fadeOut();
                $('body').removeClass('search-open');
                $('#search-btn').focus();
            }
        }
    });

    /* -----------------------------------------
    Search
    ----------------------------------------- */
    $('#search-btn').on('click', function(e) {
        e.preventDefault();
        $('#search-overlay').fadeIn();
        $('body').addClass('search-open');
    });
    $('#close-btn').on('click', function(e) {
        e.preventDefault();
        $('#search-overlay').fadeOut();
        $('body').removeClass('search-open');
    });
    $(document).on('keyup', function(e) {
        if (e.keyCode == 27) {
            $('#search-overlay').fadeOut();
        }
    });

    /* -----------------------------------------
    Causes Caraousel
    ----------------------------------------- */
    $('.causes-carousel').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
        arrows: false,
        infinite: true,
        autoplay: true,
        speed: 300,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    /* -----------------------------------------
    Blog Slider
    ----------------------------------------- */
    $('.news-carousel').slick({
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true,
        arrows: false,
        infinite: true,
        autoplay: true,
        adaptiveHeight: true,
        speed: 300,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });

    /* -----------------------------------------
    Counter
    ----------------------------------------- */
    if ($('#counter').length) {
        var counted = 0;
        $(window).scroll(function() {
            var oTop = $('#counter').offset().top - window.innerHeight;
            if (counted == 0 && $(window).scrollTop() > oTop) {
                $('.count').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                        countNum: countTo
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                        }
                    });
                });
                counted = 1;
            }
        });
    }

    /* -----------------------------------------
    Scroll Top
    ----------------------------------------- */
    $("#back-top").hide();

    $(window).scroll(function() {
        if ($(this).scrollTop() > 500) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();

        }
    });

    $('a#back-top').on('click', function(e) {
        e.preventDefault();
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

});