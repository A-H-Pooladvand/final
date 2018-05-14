{{--
<section class="kopa-area kopa-area-breadcrumb">
    <div class="container">
        <div class="widget kopa-widget-breadcrumb">
            <div class="widget-content">
                @if(!empty($_page_breadcrumb))
                    @if(count($_page_breadcrumb))
                        <h3 class="breadcrumb-title">{{ end($_page_breadcrumb)['title'] }}</h3>

                    @endif
                    <div class="breadcrumb-nav">
                    <span>
                        <a href="{{ route('home') }}">
                            <span>خانه</span>
                        </a>
                    </span>
                        @php
                        unset($_page_breadcrumb[count($_page_breadcrumb)-1]);
                        @endphp
                        @foreach($_page_breadcrumb as $item)
                            @if($loop->last)
                                <span class="current-page">{{$item['title']}}</span>
                            @else
                                <span>
                                    <a href="{{ $item['link'] or 'javascript:void(0);' }}">
                                        <span>{{ $item['title'] }}</span>
                                    </a>
                                </span>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
--}}
<section class="breadcrumb-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    @if(!empty($_page_breadcrumb))
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        @foreach($_page_breadcrumb as $item)
                            @if($loop->last)
                                <li class="breadcrumb-item active">{{$item['title']}}</li>
                            @else
                                <li class="breadcrumb-item">
                                    <a href="{{ $item['link'] or 'javascript:void(0);' }}">
                                        <span>{{ $item['title'] }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>