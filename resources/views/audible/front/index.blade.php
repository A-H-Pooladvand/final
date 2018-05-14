@extends('_layouts.front.index')

@section('content')

    <div id="main-content">

        @include('_includes.breadcrumb')

        <section class="kopa-area">
            <div class="container">
                <div class="widget kopa-widget-portfolio">

                    <div class="widget-content">
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="masonry-content row">
                                    @foreach($audibles as $audible)
                                        <div class="list-audibles ms-item show parent-container col-md-6 col-sm-6 col-xs-12"
                                             data-val="2">
                                            <article class="entry-item kopa-ms-item-01">
                                                <div class="entry-thumb">
                                                    <a href={{ route('audible.show', [$audible->id, str_slug_fa($audible->title)]) }}>
                                                        <img src="{{ image_url($audible->image, 60, 34, true) }}"
                                                             alt="{{ $audible->title }}" title="{{ $audible->title }}">
                                                    </a>
                                                </div>
                                                <div class="entry-content">
                                                    <h4 class="entry-title">
                                                        <a href={{ route('audible.show', [$audible->id, str_slug_fa($audible->title)]) }}>{{ $audible->title }}</a>
                                                    </h4>
                                                    <p>{{ str_limit($audible->description, 150) }}</p>
                                                    <ul>
                                                        <a href="{{ route('audible.show', [$audible->id, str_slug_fa($audible->title)]) }}"
                                                           class="btn btn-primary">بیشتر بخوانید</a>
                                                        {{--<li><a href={{ route('audible.show', $audible->id) }} class="fa fa-search"></a></li>--}}
                                                        {{--<li><a href={{ route('audible.show', $audible->id) }} class="fa fa-link"></a></li>--}}
                                                    </ul>
                                                    @if($audible->sound || $audible->sound_link)
                                                    <audio controls>
                                                        <source src="{{ $audible->sound ? asset($audible->sound) : $audible->sound_link }}" type="audio/mpeg">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                    @endif
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">

                            <aside class="sidebar">

                                <section class="widget widget_categories">
                                    <h2 class="widget-title">دسته بندی ها</h2>
                                    <ul>
                                        @component('_components.show_courses_leftside', ['data' => App\Audible::getCategories(), 'module' => 'category'])
                                        @endcomponent
                                    </ul>
                                </section>

                            </aside>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </div>

@stop

