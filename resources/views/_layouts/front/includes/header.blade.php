<header class="kopa-header-02">
    <div class="top-header">
        <div class="container">
            <div class="pull-left">
                <div class="kopa-any-question">
                    <p>
                        <i class="fa fa-calendar"></i>
                        {{ \Morilog\Jalali\jDateTime::convertNumbers(jdate()->format('l %d %B %Y')) }}
                        {{--<span>|</span>
                        <a href="mailto:info@gmail.com">info[at]gmail[dot]com</a>--}}
                    </p>
                </div>
            </div>
            <div class="right-top-header">
                @if (Auth::check())
                    <a target="_blank" href="{{ route('admin.home') }}">پنل مدیریت</a>
                    <a href="javascript:void(0);"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">خروج</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                    </form>
                    {{--@else--}}
                    {{--<a href="{{ route('login') }}">ورود</a>--}}
                    {{--<a href="{{ route('register') }}">ثبت نام</a>--}}
                @endif

                <div class="kopa-search">
                    @push('scripts')
                        <script>
                            $(function () {
                                $('#titleSearch').keypress(function (e) {
                                    var key = e.which;
                                    if (key == 13)  // the enter key code
                                    {
//                                        $('#btn_search').click();
//                                        return false;
                                        window.location = "{{ route('search.index') }}/" + $("#titleSearch").val().replace(/ /gi, ",");
                                    }
                                });
                            });
                        </script>
                    @endpush
                    <button type="button">
                        <i class="ti-search"></i>
                    </button>
                    <input id="titleSearch" name="search" type="text" placeholder="جستجو..." class="">
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-header style-02">
        <div class="container">
            <div class="pull-left">
                <h1 class="kopa-logo">
                    <a href="{{ route('home') }}">سایت رسمی دکتر رضا برنجکار</a>
                </h1>
            </div>
            <div class="pull-right">
                <nav class="kopa-main-menu style-02">
                    <ul>
                        <li data-id="home" class="active">
                            <a href="{{ route('home') }}">صفحه اصلی</a>
                        </li>
                        <li data-id="event">
                            <a href="{{ route('event.index') }}">برنامه های آتی</a>
                        </li>
                        <li data-id="meeting">
                            <a href="{{ route('meeting.index') }}">نشست های علمی</a>
                        </li>
                        <li data-id="term">
                            <a href="{{ route('term.index') }}">درس گفتار ها</a>
                        </li>
                        <li data-id="book">
                            <a href="{{ route('book.index') }}">کتابخانه</a>
                        </li>
                        <li data-id="news">
                            <a href="{{ route('news.index') }}">یادداشت و مصاحبه</a>
                        </li>
                        <li data-id="audible">
                            <a href="{{ route('audible.index') }}">کوتاه و شنیدنی</a>
                        </li>
                        <li data-id="about">
                            <a href="{{ route('about.show') }}">درباره استاد</a>
                        </li>
                        <li data-id="contact">
                            <a href="{{ route('contact.show') }}">تماس با ما</a>
                        </li>
                    </ul>

                    @if(!empty($_active_menu_data_id))
                    @push('scripts')
                        <script>
                            $(function () {
                                var li_id = '{{ $_active_menu_data_id }}';
                                $('.kopa-main-menu.style-02 > ul > li').removeClass('active');
                                $('.kopa-main-menu.style-02 > ul > li[data-id="'+li_id+'"]').addClass('active');
                            });
                        </script>
                    @endpush
                    @endif
                </nav>
                <div class="kopa-hamburger-menu">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="kopa-menu-scroll">
    <div class="kopa-close-menu-scroll">
        <span>x بستـــن</span>
    </div>
    <div class="top-menu-scroll">

        <ul class="kopa-menu-click">
            <li>
                <a href="{{ route('home') }}">صفحه اصلی</a>
            </li>
            <li>
                <a href="{{ route('event.index') }}">رویداد ها</a>
            </li>
            <li>
                <a href="{{ route('meeting.index') }}">نشست های علمی</a>
            </li>
            <li>
                <a href="{{ route('term.index') }}">درس گفتار ها</a>
            </li>
            <li>
                <a href="{{ route('book.index') }}">کتابخانه</a>
            </li>
            <li>
                <a href="{{ route('news.index') }}">نوشته ها</a>
            </li>
            <li>
                <a href="{{ route('audible.index') }}">کوتاه و شنیدنی</a>
            </li>
            <li>
                <a href="{{ route('about.show') }}">درباره استاد</a>
            </li>
            <li>
                <a href="{{ route('contact.show') }}">تماس با ما</a>
            </li>
        </ul>
    </div>
    <form>
        <button type="button" class="btn"
                onclick='window.location="{{ route('search.index') }}/" + $("#miniSearch").val().replace(/ /gi,",")'
        ><i class="fa fa-search"></i></button>
        <input type="text" id="miniSearch" placeholder="جستجو...">
    </form>
</div>


