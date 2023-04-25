//Banner Scripts 
$(document).ready(function () { 
    //Banner Variables and Functions 
    var parallaxAttr = $('[data-parallax-value]').attr('data-parallax-value'); 
    var parallax = $('[data-parallax]').attr('data-parallax'); 
    var height = $('[data-height]:not([data-height="-1"])').attr('data-height'); 
    if (height == 'False') { 
        var bannerHeight = $(window).innerHeight() - 150; 
        $('[data-height]').css('height', $(window).innerHeight() - 150); 
    } else if (height > -1) { 
        windowHeight = $(window).innerHeight(); 
        height = height * .01; 
        var bannerHeight = windowHeight * height; 
    } 
    function ObjectFitIt() { 
        $('[data-parallax] .banner-img').each(function () { 
            var imgSrc = $(this).attr('src'); 
            $(this).parent().parent().css({ 
                'background': 'transparent url("' + imgSrc + '") fixed no-repeat center center/cover', 
            }); 
            $(this).css('display', 'none'); 
        }); 
    } 
    //On Load Code 
    if ($(window).outerWidth() > 991) { 
        if (parallaxAttr == 'on') { 
            $('[data-height]').css('height', bannerHeight); 
            $('[data-parallax] .banner-img, [data-parallax] .banner-video video').addClass('parallax-scroll'); 
            $('[data-parallax="True"] .slider-img').each(function () { 
                var imgSrc = $(this).attr('src'); 
                $(this).parent().parent().css({ 
                    'background': 'transparent url("' + imgSrc + '") fixed no-repeat center center/cover', 
                }); 
                $(this).css('display', 'none'); 
                $(this).parent().parent().addClass('parallax-scroll'); 
            }); 
            if ('objectFit' in document.documentElement.style === false) { 
                ObjectFitIt(); 
            } 
        } 
    } 
    if ($(window).outerWidth() > 1200) { 
        if (parallaxAttr == 'on') { 
            $('[data-parallax] iframe').addClass('parallax-scroll'); 
        } 
    } 
    if ($(window).outerWidth() < 1201) { 
        $('[data-parallax] iframe').parent().addClass('embed-responsive embed-responsive-16by9'); 
        $('[data-parallax] iframe').addClass('embeded-responsive-item'); 
        $('[data-parallax] iframe').parent().parent().parent('[data-height]').css('height', 'auto'); 
    } 
    //Resize Banner Code 
    $(window).resize(function () { 
        var windowWidth = $(window).outerWidth(); 
        if (parallaxAttr == 'on') { 
            if (windowWidth < 992) { 
                $('[data-parallax]').attr('data-parallax', 'False'); 
                $('[data-height]').css('height', 'auto'); 
                $('[data-parallax] .banner-img, [data-parallax] .banner-video video').removeClass('parallax-scroll'); 
                $('.slider-img').each(function () { 
                    $(this).css('display', 'block'); 
                    $(this).parent().parent().removeClass('parallax-scroll'); 
                }); 
                if ('objectFit' in document.documentElement.style === false) { 
                    $('[data-parallax] .banner-img').css('display', 'block'); 
                } 
            } else { 
                $('[data-parallax]').attr('data-parallax', 'True'); 
                $('[data-height]').css('height', bannerHeight); 
                $('[data-parallax] .banner-img, [data-parallax] .banner-video video').addClass('parallax-scroll'); 
                $('.slider-img').each(function () { 
                    var imgSrc = $(this).attr('src'); 
                    $(this).parent().parent().css({ 
                        'background': 'transparent url("' + imgSrc + '") fixed no-repeat center center/cover', 
                    }); 
                    $(this).css('display', 'none'); 
                    $(this).parent().parent().addClass('parallax-scroll'); 
                }); 
                if ('objectFit' in document.documentElement.style === false) { 
                    ObjectFitIt(); 
                } 
            } 
            if (windowWidth < 1200) { 
                $('[data-parallax] iframe').removeClass('parallax-scroll'); 
                $('[data-parallax] iframe').parent().addClass('embed-responsive embed-responsive-16by9'); 
                $('[data-parallax] iframe').addClass('embeded-responsive-item'); 
                $('[data-parallax] iframe').parent().parent().parent('[data-height]').css('height', 'auto'); 
            } else { 
                $('[data-parallax] iframe').addClass('parallax-scroll'); 
                $('[data-parallax] iframe').parent().parent().parent('[data-height]').css('height', bannerHeight); 
            } 
        } 
    }); 
    //Parallax Code 
    $(window).on('load scroll', function () { 
        var scrolled = $(this).scrollTop(); 
        var speed = $('[data-parallax-speed]').attr('data-parallax-speed'); 
        $('.parallax-scroll').css('transform', 'translate3d(0, ' + -(scrolled * speed) + 'px, 0)'); 
    }); 
});