$(function () {
    let $sidebarNavigateCheck = true;

    $('.sidebar__item > li > a').click(function (e) {
        e.preventDefault();
    });
    $('.sidebar__item > li').click(function () {
        let $this = $(this);
        let $icon = $this.find('.sidebar-angles');
        let $sub_menu = $this.find('ul');

        if ($sidebarNavigateCheck) {
            $sidebarNavigateCheck = false;

            if ($sub_menu.hasClass('enabled')) {
                $icon.removeClass('fa-angle-up icon-enabled').addClass('fa-angle-down');
                $sub_menu.slideUp(400, function () {
                    $sidebarNavigateCheck = true;
                }).removeClass('enabled');
            } else {
                $('.sidebar__item .enabled').slideUp().removeClass('enabled');

                $('.sidebar__item .icon-enabled').removeClass('icon-enabled fa-angle-up').addClass('fa-angle-down');
                $icon.removeClass('fa-angle-down').addClass('fa-angle-up icon-enabled');

                $sub_menu.addClass('enabled').slideDown(400, function () {
                    $sidebarNavigateCheck = true;
                });
            }
        }
    });

    // Slide down navigation menu
    $('.sidebar__item > li ul a').click(function () {
        sessionStorage.setItem('active_menu', $(this).closest('.parent-menu').attr('id'));
    });

    document.getElementById(sessionStorage.getItem('active_menu')).click();

    $(window).resize(function () {
        if ($(window).width() >= 992) {
            $('.sidebar').removeClass('active');
            $('#dark-layout').hide();
        }
    });

    // $("a").on("click touchend", function (e) {
    //     let el = $(this);
    //     let link = el.attr("href");
    //     window.location = link;
    // });
});