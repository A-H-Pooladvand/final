@extends('_layouts.front.index')

@section('content')

    @include('_includes.breadcrumb')

    <div id="main-container">
        <div id="main-content">
            <section class="kopa-area kopa-area-16">
                <div class="container">
                    <div class="widget kopa-widget-listcourse">
                        <div class="widget-content module-listcourse-04">

                            @component('tag.front.terms', ['data' => $terms])
                            @endcomponent

                            @component('tag.front.news', ['data' => $news])
                            @endcomponent

                            @component('tag.front.audibles', ['data' => $audibles])
                            @endcomponent

                            @component('tag.front.events', ['data' => $events])
                            @endcomponent

                            @component('tag.front.books', ['data' => $books])
                            @endcomponent

                            @component('tag.front.meetings', ['data' => $meetings])
                            @endcomponent

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop