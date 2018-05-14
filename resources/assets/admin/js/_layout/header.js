$(function () {
    let $dark_layout = document.getElementById("dark-layout");
    let $sideBar = $('.sidebar');
    let $check = true;

    $('#hamburger').click(function () {
        if ($check) {
            $check = false;
            if ($dark_layout.style.display === 'block') {
                $dark_layout.style.display = 'none';
                $sideBar.animateCss('fadeOutRight', function () {
                    $sideBar.removeClass('active');
                    $check = true;
                });
            } else {
                $sideBar.addClass('active');
                $dark_layout.style.display = 'block';
                $sideBar.animateCss('fadeInRight', function () {
                    $check = true;
                });
            }
        }
    });

    $('#dark-layout').click(function () {
        if ($check) {
            $check = false;
            $dark_layout.style.display = 'none';
            $sideBar.animateCss('fadeOutRight', function () {
                $sideBar.removeClass('active');
                $check = true;
            });
        }
    });
});