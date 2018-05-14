<div class="sidebar">

    <ul class="sidebar__item">
        @foreach($sidebar_menus as $index => $menu)
            @if(request()->user()->can('*-' . $menu['permission']))
                <li id="parent-menu-{{ $index }}" class="parent-menu">
                    <a href="#">
                        <i class="{{ $menu['icon'] }}"></i>
                        <span>{{ $menu['title'] }}</span>
                        <i class="fa fa-angle-down  pull-right sidebar-angles"></i>
                    </a>
                    @if(!empty($menu['sub']))
                        <ul>
                            @foreach($menu['sub'] as $sub)
                                @if(request()->user()->can($sub['permission']))
                                    <li><a target="{{ empty($sub['target']) ? '_self' : $sub['target'] }}" href="{{ $sub['link'] }}">{{ $sub['title'] }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach
    </ul>

</div>