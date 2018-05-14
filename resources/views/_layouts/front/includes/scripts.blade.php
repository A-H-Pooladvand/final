{{--<script src="{{ asset('js/admin.js') }}"></script>--}}

<script src="{{ asset('assets/front/js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/front/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.sliderPro.min.js') }}"></script>
<script src="{{ asset('assets/front/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/front/js/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.mCustomScrollbar.js') }}"></script>
<script src="{{ asset('assets/front/js/viewportchecker.min.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.matchHeight-min.js') }}"></script>
<script src="{{ asset('assets/front/js/base.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>