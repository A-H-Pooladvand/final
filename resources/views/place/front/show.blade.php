@extends('_layouts.front.index')


@section('content')

    <div id="main-content">

        @include('_includes.breadcrumb')

        <section class="kopa-area ">
            <div class="container">

                <div class="row">

                    <div class="col-md-8 col-sm-12 col-xs-12">

                        <div class="single-content">

                            <h1 class="single-post-title">{{ $place->title }}</h1>
                            {{--<div class="entry-meta">
                                <a href="javascript:void(0)">{{ jdate($place->created_at)->format('d %B Y') }}</a>
                            </div>--}}

                            <div class="single-post-img">
                                <img class="img-responsive" src="{{ image_url($place->image,66,37, true) }}" alt="{{ $place->title }}" title="{{ $place->title }}">
                            </div>

                            {{--<div class="single-content-detail">--}}

                            {{--<div class="kopa-social-links style-04">--}}
                            {{--<ul>--}}
                            {{--<li>--}}
                            {{--<span>اشتراک گذاری</span>--}}
                            {{--</li>--}}
                            {{--<li><a href="#" class="fa fa-facebook"></a></li>--}}
                            {{--<li><a href="#" class="fa fa-twitter"></a></li>--}}
                            {{--<li><a href="#" class="fa fa-google-plus"></a></li>--}}
                            {{--<li><a href="#" class="fa fa-pinterest"></a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}


                            {{--</div>--}}

                        </div>

                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">

                        <aside class="sidebar">

                            <section class="widget widget_categories">
                                <h2 class="widget-title">اطلاعات تماس</h2>
                                <ul>
                                    <li class="without-arrow"><i class="fa fa-map-marker"></i>&nbsp;{{ "{$place->province->title}, {$place->province_city->title}" }}</li>

                                    @if(!empty($place->first_phone) || !empty($place->second_phone))
                                    <li class="without-arrow"><i class="fa fa-phone"></i>&nbsp;{{ implode(' | ', [$place->first_phone, $place->second_phone]) }}</li>
                                    @endif

                                    @if(!empty($place->first_address))
                                    <li class="without-arrow"><i class="fa fa-address-book"></i>&nbsp;{{ $place->first_address }}</li>
                                    @endif

                                    @if(!empty($place->second_address))
                                    <li class="without-arrow"><i class="fa fa-address-book"></i> {{ $place->second_address }}</li>
                                    @endif
                                </ul>
                            </section>
                        </aside>

                    </div>


                    {{--<div class="col-xs-12">
                        @include('_components.google_map', ['static_marker' => true])
                        <input type="hidden" name="latitude" id="latitude"
                               value="{{ $place->map_lat or '35.76756'}}">
                        <input type="hidden" name="longitude" id="longitude"
                               value="{{ $place->map_lng or '51.43795'}}">
                    </div>--}}

                </div>

            </div>

        </section>

        <section class="kopa-area kopa-area-nospace white-text-style">
            <div class="widget kopa-widget-contact_map">
                <div class="widget-content module-contact_map-01">
                    <div class="kopa-map-01">
                        @include('_components.google_map', ['static_marker' => true])
                        <input type="hidden" name="latitude" id="latitude"
                               value="{{ $place->map_lat or '35.76756'}}">
                        <input type="hidden" name="longitude" id="longitude"
                               value="{{ $place->map_lng or '51.43795'}}">

                    </div>
                </div>
            </div>
        </section>

    </div>

@stop
