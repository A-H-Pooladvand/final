@extends('_layouts.front.index')

@section('content')

    @include('_includes.breadcrumb')

    <div id="main-container">

        <div id="main-content">

            <section class="kopa-area kopa-area-16">
                <div class="container">

                    <div class="widget kopa-widget-listcourse">
                        <div class="widget-content module-listcourse-04">

                            @component('tag.front.terms')
                                @slot('data'){{ $terms }}@endslot
                            @endcomponent

                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>

@stop


