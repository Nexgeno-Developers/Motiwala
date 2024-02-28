<!-------============================== Services card ===================-------------------->

<section class="home_service">
    <div class="container">
        <div class="row">
            <div class="col-md-12 about mb-5">
            <div class="row" id="counter">
            <div class="col-lg-3 col-6 first_counter">
                <div class="about_counter_container">
                    <div class="about_right_counter" data-aos="fade-up" data-aos-once="true">
                        <div class="about_counter_icon">
                            <div class="about_counter_img">
                                <img loading="lazy" src="{{ asset('/assets/frontend/images/counter_medal.png') }}"
                                    alt="counter 1" class="mb-4" />
                                <img loading="lazy" src="{{ asset('/assets/frontend/images/counter_medal_1.png') }}"
                                    alt="counter 1" class="mb-4" />

                            </div>
                        </div>
                        <div class="about_counter">
                            <p class="about_counter_number">
                                <span class="counter-value" data-count="{{ get_settings('c_exp') }}">0</span>+
                            </p>
                            <p class="about_counter_para">Years of Professional Experience</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 second_counter">
                <div class="about_counter_container">
                    <div class="about_right_counter" data-aos="fade-up" data-aos-once="true">
                        <div class="about_counter_icon">
                            <div class="about_counter_img">
                                <img loading="lazy" src="{{ asset('/assets/frontend/images/counter_hand.png') }}"
                                    alt="counter 2" />
                                <img loading="lazy" src="{{ asset('/assets/frontend/images/counter_hand_1.png') }}"
                                    alt="counter 1" />
                            </div>
                        </div>
                        <div class="about_counter">
                            <p class="about_counter_number">
                                <span class="counter-value" data-count="{{ get_settings('c_client') }}">0</span>k
                            </p>
                            <p class="about_counter_para">Clients Served</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 third_counter">
                <div class="about_counter_container mt-md-0 mt-2">
                    <div class="about_right_counter" data-aos="fade-up" data-aos-once="true">
                        <div class="about_counter_icon">
                            <div class="about_counter_img">
                                <img loading="lazy" src="{{ asset('/assets/frontend/images/counter_doc.png') }}"
                                    alt="counter 3" />
                                <img loading="lazy" src="{{ asset('/assets/frontend/images/counter_doc_1.png') }}"
                                    alt="counter 1" />
                            </div>
                        </div>
                        <div class="about_counter w149">
                            <p class="about_counter_number">
                                <span class="counter-value" data-count="{{ get_settings('c_lic') }}">0</span>+
                            </p>
                            <p class="about_counter_para">Licenses &amp; Registration Done.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="about_counter_container mt-md-0 mt-2">
                    <div class="about_right_counter" data-aos="fade-up" data-aos-once="true">
                        <div class="about_counter_icon">
                            <div class="about_counter_img">
                                <img loading="lazy" src="{{ asset('/assets/frontend/images/counter_man.png') }}"
                                    alt="counter 4" />
                                <img loading="lazy" src="{{ asset('/assets/frontend/images/counter_man_1.png') }}"
                                    alt="counter 1" />
                            </div>
                        </div>
                        <div class="about_counter">
                            <p class="about_counter_number">
                                <span class="counter-value" data-count="{{ get_settings('c_team') }}">0</span>+
                            </p>
                            <p class="about_counter_para">Team of Professional Experts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>

            <div class="col-md-12">
                <h4 class="color_heading text-center mt-5" data-aos="fade-up" data-aos-once="true">Our Services</h4>
                <h2 class="main_heading text-center mb-3" data-aos="fade-up" data-aos-once="true">We are Professionals to your Business</h2>
            </div>

            <div class="col-xl-3  col-lg-4 col-md-6 mt-4">
                <div class="flip_card">
                    <div class="flip_card_front">
                        <div class="inner">
                            <img src="{{ asset('/assets/frontend/images/Start_a_Business.png') }}" alt="">
                            <h5 class="py-3">Start a Business</h5>
                            <!-- <p>A private limited company is India's </p> -->
                        </div>
                    </div>

                    @php
                        $subcate = DB::table('practice_areas')
                            ->where('parent_id', 1)
                            ->where('status', 1)
                            ->orderByDesc('id')
                            ->limit(5)
                            ->get(['title', 'slug', 'status']);
                     @endphp

                    <div class="flip_card_back">
                        <div class="inner">
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
                </div>
            </div>

            <div class="col-xl-3  col-lg-4 col-md-6 mt-4">
                <div class="flip_card">
                    <div class="flip_card_front">
                        <div class="inner">
                            <img src="{{ asset('/assets/frontend/images/License_Registration.png') }}" alt="">
                            <h5 class="py-3">License & Registration </h5>
                            <!-- <p>A private limited company is India's </p> -->
                        </div>
                    </div>
                    @php
                        $subcate = DB::table('practice_areas')
                            ->where('parent_id', 2)
                            ->where('status', 1)
                            ->orderByDesc('id')
                            ->limit(5)
                            ->get(['title', 'slug', 'status']);
                    @endphp
                    <div class="flip_card_back">
                        <div class="inner">
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
                </div>
            </div>
            
            <div class="col-xl-3  col-lg-4 col-md-6 mt-4">
                <div class="flip_card">
                    <div class="flip_card_front">
                        <div class="inner">
                            <img src="{{ asset('/assets/frontend/images/taxation.png') }}" alt="">
                            <h5 class="py-3">Taxation</h5>
                            <!-- <p>A private limited company is India's </p> -->
                        </div>
                    </div>
                    @php
                        $subcate = DB::table('practice_areas')
                            ->where('parent_id', 3)
                            ->where('status', 1)
                            ->orderByDesc('id')
                            ->limit(5)
                            ->get(['title', 'slug', 'status']);
                    @endphp
                    <div class="flip_card_back">
                        <div class="inner">
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
                </div>
            </div>
            <div class="col-xl-3  col-lg-4 col-md-6 mt-4">
                <div class="flip_card">
                    <div class="flip_card_front">
                        <div class="inner">
                            <img src="{{ asset('/assets/frontend/images/IPR_Gaming_Services.png') }}" alt="">
                            <h5 class="py-3">IPR & Gaming Services</h5>
                            <!-- <p>A private limited company is India's </p> -->
                        </div>
                    </div>
                    @php
                        $subcate = DB::table('practice_areas')
                            ->where('parent_id', 4)
                            ->where('status', 1)
                            ->orderByDesc('id')
                            ->limit(5)
                            ->get(['title', 'slug', 'status']);
                    @endphp
                    <div class="flip_card_back">
                        <div class="inner">
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
                </div>
            </div>
            <div class="col-xl-3  col-lg-4 col-md-6 mt-4">
                <div class="flip_card">
                    <div class="flip_card_front">
                        <div class="inner">
                            <img src="{{ asset('/assets/frontend/images/NGO.png') }}" alt="">
                            <h5 class="py-3">NGO Compliances</h5>
                            <!-- <p>A private limited company is India's </p> -->
                        </div>
                    </div>
                    @php
                        $subcate = DB::table('practice_areas')
                            ->where('parent_id', 5)
                            ->where('status', 1)
                            ->orderByDesc('id')
                            ->limit(5)
                            ->get(['title', 'slug', 'status']);
                    @endphp
                    <div class="flip_card_back">
                        <div class="inner">
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
                </div>
            </div>
            <!-- <div class="col-md-12">
                <div class="text-center pt-5 ">
                    <a class="text-decoration-none link" href="#">View All Services</a>
                </div>
            </div> -->
        </div>
    </div>
</section>

<!-------============================== Services card ===================-------------------->