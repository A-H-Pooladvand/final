<!-- Home Slider -->
<div id="home-slider" class="owl-carousel owl-theme">

    @foreach($sliders as $slider)
        <!-- home item -->
        <div class="home-item">

            <!-- Background Image -->
            <div class="bg-img" style="background-image: url('{{ image_url($slider->image, 192,108) }}')"></div>
            <!-- /Background Image -->

            <!-- home content -->
            <div class="home">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-md-offset-1">
                            <div class="home-content">
                                <h2 data-animation="fadeInDown">{{ $slider->title }} {{--<strong
                                                                        class="main-color">طراحی سایت</strong>--}}</h2>
                                <p data-animation="fadeInUp"
                                   class="white-color">{{ $slider->description }}</p>

                                @if(!empty($slider->link))
                                    <a data-animation="fadeInUp" class="btn btn-lg btn-default pull-right"
                                       href="{{ $slider->link }}">بیــــشتر<i
                                                class="fa fa-arrow-circle-left"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /home content -->

        </div>
        <!-- /home item -->
    @endforeach
</div>
<!-- /Home Slider -->
