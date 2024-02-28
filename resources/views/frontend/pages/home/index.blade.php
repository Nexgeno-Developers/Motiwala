@extends('frontend.layouts.app')

@section('page.title', 'Seedling Associates: Top Lawyers &amp; Law Firms in Delhi, India')

@section('page.description', 'Seedling & Associates is one of the best law firms in Delhi, India. We provide legal
assistance for startups, FDI, Property law, IP, and more')

@section('page.type', 'website')

@section('page.content')

<!-----===== home content start============---->

<div id="banner" class="noBannerImage noBannerImage">
    <div id="homeAnimation">
        <div class="results_list">
            <div class="current">
                <div class="image">
                    <picture>
                        <source media="(max-width:540px)" srcset="{{ asset('storage/' . get_settings('Banner_1')) }}">
                        <source srcset="{{ asset('storage/' . get_settings('Banner_1')) }}" type="image/webp"
                            sizes="100vw" />
                        <img alt="See Things in a New Way" src="{{ asset('storage/' . get_settings('Banner_1')) }}"
                            srcset="{{ asset('storage/' . get_settings('Banner_1')) }} 2400w" sizes="100vw" />
                    </picture>
                </div>
                <div class="titleGroup">
                    <div class="title">
                        {{ get_settings('b_title1') }}
                    </div>
                    <div class="desc">
                        {{ get_settings('b_desc1') }}
                    </div>
                </div>
                <div class="contentGroup">
                    <div class="teaser"></div>
                    <div class="content"></div>
                </div>
                <div class="animatingSlash"></div>
            </div>
            <div>
                <div class="image">
                    <picture>
                        <source media="(max-width:540px)" srcset="{{ asset('storage/' . get_settings('Banner_2')) }}">
                        <source srcset="{{ asset('storage/' . get_settings('Banner_2')) }}" type="image/webp"
                            sizes="100vw" />
                        <img alt="Effective Partnership" src="{{ asset('storage/' . get_settings('Banner_2')) }}"
                            srcset="{{ asset('storage/' . get_settings('Banner_2')) }} 2400w" sizes="100vw" />
                    </picture>
                </div>
                <div class="contentGroup">
                    <div class="teaser">
                        {{ get_settings('b_title2') }}
                    </div>
                    <div class="content">
                        <p>
                            {{ get_settings('b_desc2') }}
                        </p>
                    </div>
                </div>
                <div class="animatingSlash"></div>
            </div>
            <div>
                <div class="image">
                    <picture>
                        <source media="(max-width:540px)" srcset="{{ asset('storage/' . get_settings('Banner_3')) }}">
                        <source srcset="{{ asset('storage/' . get_settings('Banner_3')) }}" type="image/webp"
                            sizes="100vw" />
                        <img loading="lazy" alt="See Things in a New Way"
                            src="{{ asset('storage/' . get_settings('Banner_3')) }}"
                            srcset="{{ asset('storage/' . get_settings('Banner_3')) }} 2400w" sizes="100vw" />
                    </picture>
                </div>
                <div class="titleGroup">
                    <div class="title">
                        {{ get_settings('b_title1') }}
                    </div>
                    <div class="desc">
                        {{ get_settings('b_desc1') }}
                    </div>
                </div>
                <div class="contentGroup">
                    <div class="teaser"></div>
                    <div class="content"></div>
                </div>
                <div class="animatingSlash"></div>
            </div>
            <div>
                <div class="image">
                    <picture>
                        <source media="(max-width:540px)" srcset="{{ asset('storage/' . get_settings('Banner_4')) }}">
                        <source srcset="{{ asset('storage/' . get_settings('Banner_4')) }}" type="image/webp"
                            sizes="100vw" />
                        <img loading="lazy" alt="Effective Partnership"
                            src="{{ asset('storage/' . get_settings('Banner_4')) }}"
                            srcset="{{ asset('storage/' . get_settings('Banner_4')) }} 2400w" sizes="100vw" />
                    </picture>
                </div>
                <div class="contentGroup">
                    <div class="teaser">
                        {{ get_settings('b_title2') }}
                    </div>
                    <div class="content">
                        <p>
                            {{ get_settings('b_desc2') }}
                        </p>
                    </div>
                </div>
                <div class="animatingSlash"></div>
            </div>
        </div>
    </div>
</div>




<!--Hero End-->
<!--Banner Slider Start-->
<!-- <section class="banner_slider">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="owl-carousel owl-theme" id="banner_slider_carousel">
               <div class="item">
                  <a href="#">
                     <div class="slider_banner_box">
                        <img src="{{ asset('/assets/frontend/images/banner_slider_1.png') }}" alt="" />

                        <span>Start Up India Registration</span>
                     </div>
                  </a>
               </div>
               <div class="item">
                  <a href="#">
                     <div class="slider_banner_box">
                        <img src="{{ asset('/assets/frontend/images/banner_slider_2.png') }}" alt="" />

                        <span>Trademark Filing</span>
                     </div>
                  </a>
               </div>
               <div class="item">
                  <a href="#">
                     <div class="slider_banner_box">
                        <img src="{{ asset('/assets/frontend/images/banner_slider_3.png') }}" alt="" />

                        <span>Gaming Licenses</span>
                     </div>
                  </a>
               </div>
               <div class="item">
                  <a href="#">
                     <div class="slider_banner_box">
                        <img src="{{ asset('/assets/frontend/images/banner_slider_4.png') }}" alt="" />

                        <span>Gambling License</span>
                     </div>
                  </a>
               </div>

            </div>
         </div>
      </div>
   </div>
</section> -->
<!--Banner Slider End-->
<!--About Start-->
<!-- <section class="about">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <h6 class="color_heading  mb-3" data-aos="fade-up" data-aos-once="true">Who We Are</h6>
            <h2 class="main_heading mb-4" data-aos="fade-up" data-aos-once="true">
               {{ get_settings('h_title') }}
            </h2>

            @php
            // Get the full description from the settings
            $fullDescription = get_settings('h_description');

            // Split the description into words
            $words = str_word_count($fullDescription, 1);

            // Define the number of words for the first part
            $numberOfWordsForFirstPart = 45;

            // Slice the array to get the first part
            $firstPartArray = array_slice($words, 0, $numberOfWordsForFirstPart);

            // Join the words to form the first part
            $firstPart = implode(' ', $firstPartArray);

            // The second part is everything after the first part
            $secondPartArray = array_slice($words, $numberOfWordsForFirstPart);
            $secondPart = implode(' ', $secondPartArray);
            @endphp
            <article class="main">
               <p class="desc mb-0 text_justify" data-aos="fade-up" data-aos-once="true">
                  {{ $firstPart }}.
               </p>

               <input id="read-more-check-1" type="checkbox" class="read-more-check" />

               <p class="read-more text_justify">
                  {{ $secondPart }}.
               </p>
               <label for="read-more-check-1" class="read-more-label"></label>
            </article>
            <div class="about_points first">
               <div class="icon_container" data-aos="fade-up" data-aos-once="true">
                  <div class="img_container">
                     <img loading="lazy" src="{{ asset('/assets/frontend/images/check.png') }}" alt="Check Icon" />
                     <img loading="lazy" src="{{ asset('/assets/frontend/images/white_check.png') }}"
                        alt="Check Icon" />
                  </div>
               </div>
               <div>
                  <h4 class="about_point_heading" data-aos="fade-up" data-aos-once="true">Vision</h4>
                  <p class="desc mb-0 text_justify" data-aos="fade-up" data-aos-once="true">
                     {{ get_settings('h_vision') }}
                  </p>
               </div>
            </div>
            <div class="about_points">
               <div class="icon_container">
                  <div class="img_container" data-aos="fade-up" data-aos-once="true">
                     <img loading="lazy" src="{{ asset('/assets/frontend/images/check.png') }}" alt="Check Icon" />
                     <img loading="lazy" src="{{ asset('/assets/frontend/images/white_check.png') }}"
                        alt="Check Icon" />
                  </div>
               </div>
               <div>
                  <h4 class="about_point_heading" data-aos="fade-up" data-aos-once="true">Mission</h4>
                  <p class="desc mb-0 text_justify" data-aos="fade-up" data-aos-once="true">
                     {{ get_settings('h_mission') }}
                  </p>
               </div>
            </div>
         </div>
         <div class="col-lg-6" id="counter">
            <div class="row">
               <div class="col-md-6 col-6 first_counter">
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
               <div class="col-md-6 col-6 second_counter">
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
               <div class="col-md-6 col-6 third_counter">
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
               <div class="col-md-6 col-6">
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
      </div>
   </div>
</section> -->






<!--About End-->








<!-- flip Cart section -->


@include('frontend.component.services_card')


<!-- flip Cart section -->


<!-- progress section -->

<div class="service_steps">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <h2 class="service_steps_heading text-center">
                  progress bar
               </h2> -->
                <div class="service_steps_main_timeline">
                    <div class="conference_center_line"></div>
                    <div class="conference_timeline_content">

                        <div class="timeline_article timeline_article_top">
                            <div class="number_timline">
                                <p>4</p>
                            </div>
                            <div class="meta_date">
                                <img src="assets/frontend/images/p_4.png" alt="">
                            </div>
                            <div class="content_box">
                                <!-- <h3>Title</h3> -->
                                <p>DISCUSS WITH EXPERT <br> PROFESSIONAL</p>
                            </div>
                        </div>
                        <div class="timeline_article timeline_article_bottom">
                            <div class="number_timline">
                                <p>3</p>
                            </div>
                            <div class="meta_date">
                                <img src="/assets/frontend/images/p_3.png" alt="">
                            </div>
                            <div class="content_box">
                                <!-- <h3>Title</h3> -->
                                <p>THE TEAM WILL <br> CALL YOU</p>
                            </div>
                        </div>
                        <div class="timeline_article timeline_article_top">
                            <div class="number_timline">
                                <p>2</p>
                            </div>
                            <div class="meta_date">
                                <img src="/assets/frontend/images/p_2.png" alt="">

                            </div>
                            <div class="content_box">
                                <!-- <h3>Title</h3> -->
                                <p>FILL <br> THE FORM</p>
                            </div>
                        </div>
                        <div class="timeline_article timeline_article_bottom">
                            <div class="number_timline first">
                                <p>1</p>
                            </div>
                            <div class="meta_date">
                                <img src="/assets/frontend/images/p_1.png" alt="">

                            </div>
                            <div class="content_box">
                                <!-- <h3>Title</h3> -->
                                <p>PAY <br> THE FEE</p>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- ------------ Mobile Menu----------------- -->
                <div class="mobile_4_step">
                    <div class="ms-4">
                        <div class="main-timeline">


                            <div class="timeline">
                                <a href="#" class="timeline-content">
                                    <div class="timeline-icon">
                                        <span>1<span>
                                    </div>
                                    <!-- <h5 class="description">
                                         Title
                                      </h5> -->
                                    <p>PAY <br> THE FEE</p>
                                </a>
                            </div>
                            <div class="timeline">
                                <a href="#" class="timeline-content">
                                    <div class="timeline-icon">
                                        <span>2<span>
                                    </div>

                                    <p>FILL <br> THE FORM</p>
                                </a>
                            </div>
                            <div class="timeline">
                                <a href="#" class="timeline-content">
                                    <div class="timeline-icon">
                                        <span>3<span>
                                    </div>

                                    <p>THE TEAM WILL <br> CALL YOU</p>
                                </a>
                            </div>
                            <div class="timeline">
                                <a href="#" class="timeline-content">
                                    <div class="timeline-icon">
                                        <span>4<span>
                                    </div>

                                    <p>DISCUSS WITH EXPERT <br> PROFESSIONAL</p>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>


                <!-- ------------------- Mobile menu---------------------- -->
            </div>
        </div>
    </div>
</div>


<!-- progress section -->





<!--Payment Start-->
{{-- @include('frontend.component.lets_talk_section')--}}
<!--Payment End-->
<!--Blog Start-->
{{--@include('frontend.component.blog')--}}
<!--Blog End-->
<!--Contact Start-->
@include('frontend.component.contact_us_section')
<!--Contact End-->


<!-- home blog -->

@php
$blog = DB::table('blogs')->where('status', 1)->whereJsonContains('blog_category_ids','3')->limit(4)->orderBy('created_at', 'desc')->get();
//->toArray();
//$right_news = DB::table('blogs')->where('status', 1)->whereJsonContains('blog_category_ids','4')->limit(4)->orderBy('created_at', 'desc')->get();
@endphp

@if(count($blog) > 1)

<section class="home_blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="color_heading text-center" data-aos="fade-up" data-aos-once="true">Our Blog</h4>
                <h2 class="main_heading text-center mb-3" data-aos="fade-up" data-aos-once="true">Latest Posts</h2>
            </div>

            @foreach ($blog as $row)



            <div class="col-md-4 mt-3">
                <div class="box">
                    <img src="{{ asset('storage/' .$row->main_image) }}" class="img" alt="">
                    <div class="content">
                        <h4>
                            {{ $row->title }}
                        </h4>
                        <p> {{ $row->short_description }}</p>
                        <div class="text-end">
                            <a
                                href="{{ url(route('blog.detail', ['category' =>'blog', 'slug' => strtolower(str_replace(' ', '-',$row->slug))] )) }}">
                                <img src="{{ asset('/assets/frontend/images/circle_arrow.png') }}" alt="">
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>

@endif


<!-- home blog -->







<!-- Seo Section -->

<section class="seo">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('/assets/frontend/images/seo.jpg') }}" alt="">
                <!-- <h2>Why Choose Seedling Associate for Company and Business Certification?</h2>
                <p>At Seedling Associate, we understand the significance of certifications in establishing trust and credibility for your business. Here's why we stand out:

                </p>
                <ul>
                    <li><strong>Expert Guidance:</strong> Our team of experienced professionals provides expert guidance throughout the certification process, ensuring compliance with all regulatory requirements. </li>
                    <li><strong>Tailored Solutions:</strong> Our team of experienced professionals provides expert guidance throughout the certification process, ensuring compliance with all regulatory requirements. </li>
                    <li><strong>Timely Execution:</strong> Our team of experienced professionals provides expert guidance throughout the certification process, ensuring compliance with all regulatory requirements. </li>
                    <li><strong>Comprehensive Support:</strong> Our team of experienced professionals provides expert guidance throughout the certification process, ensuring compliance with all regulatory requirements. </li>
                    <li><strong>Transparent Communication:</strong> Our team of experienced professionals provides expert guidance throughout the certification process, ensuring compliance with all regulatory requirements. </li>
                </ul> -->
               
            </div>
            <div class="col-md-6 mt-md-0 mt-5">
                <h1 class="seo_title mb-4" >Seedling Associate - Your Trusted Partner for Seamless Company and Business Certification Registration in India</h1>
                <p class=" mb-4" >Seedling Associate is your go-to business ally for seamless registration, licensing, and certification services in India. As a reliable firm, we specialize in simplifying complex processes, ensuring your business is legally compliant and ready for success. Whether it's company registration, license acquisition, certification processes, or filing requirements, we've got you covered.


                </p>
                <p class=" mb-4" >

                Our expert team navigates the intricacies, offering tailored solutions to meet your unique needs. With Seedling Associate, experience a hassle-free journey to establish, grow, and thrive in the business landscape. Trust us to handle the paperwork while you focus on what matters most – building your business.
</p>
                <p>

                Seedling Associate - Simplifying Company and Business Certification in India Are you a company looking for hassle-free certification registration services in India? Look no further than Seedling Associate, your dedicated partner in navigating the complexities of the certification process. With a commitment to excellence, we ensure a smooth and efficient journey towards obtaining the necessary certifications for your business.
</p>
            </div>
        </div>
    </div>
</section>

<!-- Seo Section -->




<!--Social Icons Start-->
@include('frontend.component.testimonials')
<!--Testimonials End-->

<!----------------------- home content end --------------->
@endsection