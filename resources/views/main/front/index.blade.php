@extends('_layouts.front.index')

@section('content')

    @include('main.front._includes.welcome')


    <div id="main-content">

        @include('main.front._includes.slider')

        {{--@include('main.front._includes.search')--}}

        <section class="kopa-area kopa-area-01">
            <div class="container">
                <div class="widget kopa-widget-features">
                    <div class="row">

                        @include('main.front._includes.meetings')

                        @include('main.front._includes.events')

                    </div>
                </div>
            </div>
        </section>

        @include('main.front._includes.news')

        @include('main.front._includes.course')



        @include('main.front._includes.features')

        @include('main.front._includes.audibles')


        {{--@include('main.front._includes.sidebar-bottom')--}}

    </div>


@stop