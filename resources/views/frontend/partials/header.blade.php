<!--------------Header start----------------->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!----=========topbar=========----->

                @include('frontend.partials.topbar')

                <!----=========End topbar=========----->

                <div class="bottom_nav_links d-flex align-items-center gap-4">
                    <ul class="nav_links d-flex align-items-center gap-4 list-unstyled mb-0">
                        <li>
                            @php
                                $subcate = DB::table('practice_areas')
                                    ->where('parent_id', 1)
                                    ->where('status', 1)
                                    ->get(['title', 'slug', 'status']);
                            @endphp
                            <a href=#>
                                <span style="color:#e13333;"> Start a Business</span>

                                @if (count($subcate) > 0)
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                @endif

                            </a>
                            @if (count($subcate) > 0)
                                <ul class="dropdown">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul>
                                                @foreach ($subcate as $iteams)
                                                    <li>
                                                        <a
                                                            href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                                            {{ $iteams->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>


                                    </div>
                                </ul>
                            @endif

                        </li>
                        <li>
                            @php
                                $subcate = DB::table('practice_areas')
                                    ->where('parent_id', 2)
                                    ->where('status', 1)
                                    ->get(['title', 'slug', 'status']);
                            @endphp
                            <a href=#>
                                <span style="color:#e13333;">License & Registration</span>

                                @if (count($subcate) > 0)
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                @endif

                            </a>
                            @if (count($subcate) > 0)
                                <ul class="dropdown">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <ul>

                                                @foreach ($subcate as $iteams)
                                                    <li>
                                                        <a
                                                            href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                                            {{ $iteams->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>


                                        </div>


                                    </div>
                                </ul>
                            @endif

                        </li>
                        <li>
                            @php
                                $subcate = DB::table('practice_areas')
                                    ->where('parent_id', 3)
                                    ->where('status', 1)
                                    ->get(['title', 'slug', 'status']);
                            @endphp
                            <a href=#>
                                <span style="color:#e13333;">Taxation</span>

                                @if (count($subcate) > 0)
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                @endif


                            </a>
                            @if (count($subcate) > 0)
                                <ul class="dropdown">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul>

                                                @foreach ($subcate as $iteams)
                                                    <li>
                                                        <a
                                                            href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                                            {{ $iteams->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>


                                    </div>
                                </ul>
                            @endif

                        </li>
                        <li>
                            @php
                                $subcate = DB::table('practice_areas')
                                    ->where('parent_id', 4)
                                    ->where('status', 1)
                                    ->get(['title', 'slug', 'status']);
                            @endphp
                            <a href=#>
                                <span style="color:#e13333;">IPR & Gaming Services </span>

                                @if (count($subcate) > 0)
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                @endif


                            </a>
                            @if (count($subcate) > 0)
                                <ul class="dropdown">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul>
                                                @foreach ($subcate as $iteams)
                                                    <li>
                                                        <a
                                                            href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                                            {{ $iteams->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>


                                    </div>
                                </ul>
                            @endif

                        </li>
                        <li>
                            @php
                                $subcate = DB::table('practice_areas')
                                    ->where('parent_id', 5)
                                    ->where('status', 1)
                                    ->get(['title', 'slug', 'status']);
                            @endphp
                            <a href=#>
                                <span style="color:#e13333;">NGO Compliances</span>

                                @if (count($subcate) > 0)
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                @endif

                            </a>
                            @if (count($subcate) > 0)
                                <ul class="dropdown">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul>

                                                @foreach ($subcate as $iteams)
                                                    <li>
                                                        <a
                                                            href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                                            {{ $iteams->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>


                                    </div>
                                </ul>
                            @endif

                        </li>


                    </ul>
                    <button class="nav_button" data-bs-toggle="modal" data-bs-target="#ask-modal" type="button">
                        <img src="{{ asset('/assets/frontend/images/nav_btn_icon.png') }}" alt="" />
                        <img src="{{ asset('/assets/frontend/images/ask_hover_btn.png') }}" alt="" />
                        <span>Request a Consultation</span>
                    </button>
                </div>


            </div>
        </div>

        <div class="wrapper">
            <nav>
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('/assets/frontend/images/logo.png') }}" alt="logo" />
                    </a>
                </div>
                <input type="checkbox" id="menu" name="menu" class="m-menu__checkbox" />
                <label class="m-menu__toggle" for="menu">
                    <svg width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#000"
                        stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </label>
                <label class="m-menu__overlay" for="menu"></label>

                <div class="m-menu">
                    <div class="m-menu__header">
                        <div class="logo">
                            <a href="index.php">
                                <img src="{{ asset('/assets/frontend/images/logo.png') }}" alt="logo" />
                            </a>
                        </div>
                        <label class="m-menu__toggle" for="menu">
                            <svg width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#000000"
                                stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </label>
                    </div>
                    <ul>
                        <li>
                            <a href="{{ url(route('index')) }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ url(route('blog')) }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ url(route('contact')) }}">Contact Us</a>
                        </li>


                        <li>
                            <div class="sidebar_item">

                                <a href=# class="sub-btn d-flex align-items-center justify-content-between">Start a
                                    Business
                                    <img src="{{ asset('/assets/frontend/images/down.png') }}"
                                        alt="down Arrow" /></a>

                                <div class="sub-menu">
                                    @php
                                        $subcate = DB::table('practice_areas')
                                            ->where('parent_id', 1)
                                            ->where('status', 1)
                                            ->get(['title', 'slug', 'status']);
                                    @endphp
                                    @foreach ($subcate as $iteams)
                                        <a href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                            {{ $iteams->title }}
                                        </a>
                                    @endforeach

                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="sidebar_item">
                                <a href=# class="sub-btn d-flex align-items-center justify-content-between">
                                    License & Registration <img src="{{ asset('/assets/frontend/images/down.png') }}"
                                        alt="down Arrow" />
                                </a>

                                <div class="sub-menu">
                                    @php
                                        $subcate = DB::table('practice_areas')
                                            ->where('parent_id', 2)
                                            ->where('status', 1)
                                            ->get(['title', 'slug', 'status']);
                                    @endphp
                                    @foreach ($subcate as $iteams)
                                        <a href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                            {{ $iteams->title }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        </li>
                        <li>
                            <div class="sidebar_item">
                                <a href=# class="sub-btn d-flex align-items-center justify-content-between">

                                    Taxation
                                    <img src="{{ asset('/assets/frontend/images/down.png') }}"
                                        alt="down Arrow" />
                                </a>

                                <div class="sub-menu">
                                    @php
                                        $subcate = DB::table('practice_areas')
                                            ->where('parent_id', 3)
                                            ->where('status', 1)
                                            ->get(['title', 'slug', 'status']);
                                    @endphp
                                    @foreach ($subcate as $iteams)
                                        <a href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                            {{ $iteams->title }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        </li>
                        <li>
                            <div class="sidebar_item">
                                <a href=# class="sub-btn d-flex align-items-center justify-content-between">

                                    IPR & Gaming Services
                                    <img src="{{ asset('/assets/frontend/images/down.png') }}"
                                        alt="down Arrow" />
                                </a>

                                <div class="sub-menu">
                                    @php
                                        $subcate = DB::table('practice_areas')
                                            ->where('parent_id', 4)
                                            ->where('status', 1)
                                            ->get(['title', 'slug', 'status']);
                                    @endphp
                                    @foreach ($subcate as $iteams)
                                        <a href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                            {{ $iteams->title }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        </li>
                        <li>
                            <div class="sidebar_item">
                                <a href=# class="sub-btn d-flex align-items-center justify-content-between">

                                    NGO Compliances <img src="{{ asset('/assets/frontend/images/down.png') }}"
                                        alt="down Arrow" />
                                </a>

                                <div class="sub-menu">
                                    @php
                                        $subcate = DB::table('practice_areas')
                                            ->where('parent_id', 5)
                                            ->where('status', 1)
                                            ->get(['title', 'slug', 'status']);
                                    @endphp
                                    @foreach ($subcate as $iteams)
                                        <a href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                            {{ $iteams->title }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <!-- <li>
                            <label class="a-label__chevron" for="item-1">
                                Start a Business
                            </label>
                            <input type="checkbox" id="item-1" name="item-1" class="m-menu__checkbox" />
                            <div class="m-menu">
                                <div class="m-menu__header">
                                    <label class="m-menu__toggle" for="item-1">
                                        <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                                            stroke="#000000" stroke-width="2" stroke-linecap="butt"
                                            stroke-linejoin="arcs">
                                            <path d="M19 12H6M12 5l-7 7 7 7" />
                                        </svg>
                                    </label>
                                    <span>Start a Business</span>
                                </div>
                                @php
                                    $subcate = DB::table('practice_areas')
                                        ->where('parent_id', 1)
                                        ->where('status', 1)
                                        ->get(['title', 'slug', 'status']);
                                @endphp
                                <ul>
                                    @foreach ($subcate as $iteams)
<li>
                                        <a href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                            {{ $iteams->title }}
                                        </a>
                                    </li>
@endforeach
                                </ul>
                            </div>
                        </li>
                        <li>
                            <label class="a-label__chevron" for="item-2">
                                License & Registration
                            </label>
                            <input type="checkbox" id="item-2" name="item-2" class="m-menu__checkbox" />
                            <div class="m-menu">
                                <div class="m-menu__header">
                                    <label class="m-menu__toggle" for="item-2">
                                        <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                                            stroke="#000000" stroke-width="2" stroke-linecap="butt"
                                            stroke-linejoin="arcs">
                                            <path d="M19 12H6M12 5l-7 7 7 7" />
                                        </svg>
                                    </label>
                                    <span>License & Registration</span>
                                </div>
                                @php
                                    $subcate = DB::table('practice_areas')
                                        ->where('parent_id', 2)
                                        ->where('status', 1)
                                        ->get(['title', 'slug', 'status']);
                                @endphp
                                <ul>
                                    
                                    @foreach ($subcate as $iteams)
<li>
                                        <a href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                            {{ $iteams->title }}
                                        </a>
                                    </li>
@endforeach
                                </ul>
                            </div>
                        </li>
                        <li>
                            <label class="a-label__chevron" for="item-3">
                                Taxation
                            </label>
                            <input type="checkbox" id="item-3" name="item-3" class="m-menu__checkbox" />
                            <div class="m-menu">
                                <div class="m-menu__header">
                                    <label class="m-menu__toggle" for="item-3">
                                        <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                                            stroke="#000000" stroke-width="2" stroke-linecap="butt"
                                            stroke-linejoin="arcs">
                                            <path d="M19 12H6M12 5l-7 7 7 7" />
                                        </svg>
                                    </label>
                                    <span>Taxation</span>
                                </div>
                                @php
                                    $subcate = DB::table('practice_areas')
                                        ->where('parent_id', 3)
                                        ->where('status', 1)
                                        ->get(['title', 'slug', 'status']);
                                @endphp
                                <ul>
                                    
                                    @foreach ($subcate as $iteams)
<li>
                                        <a href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                            {{ $iteams->title }}
                                        </a>
                                    </li>
@endforeach
                                </ul>
                            </div>
                        </li>
                        <li>
                            <label class="a-label__chevron" for="item-4">
                                IPR &amp; Gaming Services
                            </label>
                            <input type="checkbox" id="item-4" name="item-4" class="m-menu__checkbox" />
                            <div class="m-menu">
                                <div class="m-menu__header">
                                    <label class="m-menu__toggle" for="item-4">
                                        <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                                            stroke="#000000" stroke-width="2" stroke-linecap="butt"
                                            stroke-linejoin="arcs">
                                            <path d="M19 12H6M12 5l-7 7 7 7" />
                                        </svg>
                                    </label>
                                    <span>IPR &amp; Gaming Services</span>
                                </div>
                                @php
                                    $subcate = DB::table('practice_areas')
                                        ->where('parent_id', 4)
                                        ->where('status', 1)
                                        ->get(['title', 'slug', 'status']);
                                @endphp
                                <ul>
                                    
                                    @foreach ($subcate as $iteams)
<li>
                                        <a href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                            {{ $iteams->title }}
                                        </a>
                                    </li>
@endforeach
                                </ul>
                            </div>
                        </li>
                        <li>
                            <label class="a-label__chevron" for="item-5">
                                NGO Compliances
                            </label>
                            <input type="checkbox" id="item-5" name="item-5" class="m-menu__checkbox" />
                            <div class="m-menu">
                                <div class="m-menu__header">
                                    <label class="m-menu__toggle" for="item-5">
                                        <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                                            stroke="#000000" stroke-width="2" stroke-linecap="butt"
                                            stroke-linejoin="arcs">
                                            <path d="M19 12H6M12 5l-7 7 7 7" />
                                        </svg>
                                    </label>
                                    <span>NGO Compliances</span>
                                </div>
                                @php
                                    $subcate = DB::table('practice_areas')
                                        ->where('parent_id', 5)
                                        ->where('status', 1)
                                        ->get(['title', 'slug', 'status']);
                                @endphp
                                <ul>
                                    
                                    @foreach ($subcate as $iteams)
<li>
                                        <a href="{{ url(route('practicearea-detail', ['slug' => $iteams->slug])) }}">
                                            {{ $iteams->title }}
                                        </a>
                                    </li>
@endforeach
                                </ul>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    </div>
    </div>
</header>





<!--------------header end-------------------->
