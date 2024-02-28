@extends('frontend.layouts.app')

@section('page.title', "$detail->meta_title")

@section('page.description', "$detail->meta_description")

@section('page.type', 'practice area')

@section('page.publish_time', "$detail->updated_at")

@section('page.schema')
    <!--------------------------- Page Schema --------------------------------->

    <script type="application/ld+json">
    {
      "@context": "https://schema.org/", 
      "@type": "BreadcrumbList", 
      "itemListElement": [{
        "@type": "ListItem", 
        "position": 1, 
        "name": "Home",
        "item": "{{ url(route('index')) }}"  
      },{
        "@type": "ListItem", 
        "position": 2, 
        "name": "@php echo str_replace('&nbsp;',' ',htmlspecialchars_decode ($detail->title)); @endphp",
        "item": "{{ url()->current() }}"  
      }]
    }
</script>

    <!--------------------------- Page Schema end--------------------------------->
@endsection

@section('page.content')


    <!-------===========practicearea start===================------------>

    <!-- -------------------------- Service banner Start ---------------- -->
    @if ($detail->parent_id == 1)
        <section class="service_banner"style="background-image:url('/assets/frontend/images/start.jpeg')">
        @elseif($detail->parent_id == 2)
            <section class="service_banner"style="background-image:url('/assets/frontend/images/licences.jpeg')">
            @elseif($detail->parent_id == 3)
                <section class="service_banner"style="background-image:url('/assets/frontend/images/taxation.jpeg')">
                @elseif($detail->parent_id == 4)
                    <section class="service_banner"style="background-image:url('/assets/frontend/images/Intellectual.jpeg')">
                    @else
                        <section class="service_banner"style="background-image:url('/assets/frontend/images/NGO.jpeg')">
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="breadcrumb_heading mb-md-3 mb-2">
                    {{ $detail->title }}
                </span>
                <!-- <p class="service_banner_para">
                    {{ $detail->breadcrumb_subtitle }}
                  </p> -->
                <!-- <div
                    class="service_price_btn d-flex flex-md-row flex-column align-items-center gap-md-4 gap-1 justify-content-center"
                  >
                  @php
                      $session_data = json_decode(session('user_ip'), true);
                      if (!isset($session_data['country'])) {
                          $session_data['country'] = 'IN';
                      }
                  @endphp
                    {{-- -
                <h2 class="mb-0">Price Start at 
                  @if ($session_data['country'] == 'IN')
                      Rs {{ number_format($detail->indian_price) }}
                  @else
                      $ {{ number_format($detail->foreign_price) }}
                  @endif
                  /-
              </h2> --}}
                    <!-- <button class="d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#ask-modal">
                      <img src="assets/frontend/images/nav_btn_icon.png" alt="" />
                      <img src="assets/frontend/images/ask_hover_btn.png" alt="" />
                      <span>Request a Consultation</span>
                    </button> -->
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url(route('index')) }}">Home</a></li>
                        <li class="breadcrumb-item " aria-current="page">{{ $detail->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    </div>
    </section>

    <!-- -------------------------- Service banner End ---------------- -->

    @php
        $progress_bar = json_decode($detail->progress_bar, true);
    @endphp

    @if (count($progress_bar) > 0)
        <!-- -------------------------- Service steps Start ---------------- -->
        {{--  
      <div class="service_steps">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="service_steps_heading text-center">
                {{ $detail->progress_bar_title }}
              </h2>
              <div class="service_steps_main_timeline">
                <div class="conference_center_line"></div>
                <div class="conference_timeline_content">
                    
                    @php 
                        $i = 1; 
                        $progress_bar_reversed = array_reverse($progress_bar);
                        $i = count($progress_bar_reversed) + 1;
                    @endphp
                    
                    @foreach ($progress_bar_reversed as $innerArray)
                        @foreach ($innerArray as $title => $description)
                            @php $i--; @endphp 
                            <div class="timeline_article timeline_article_{{ $i % 2 == 0 ? 'bottom' : 'top' }}">
                                <div class="meta_date">{{ $i }}</div>
                                <div class="content_box">
                                    <h3>{{ $title }}</h3>
                                    <p>{{ $description }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                  
                </div>
              </div>
              <!-- ------------ Mobile Menu----------------- -->
           <div class="mobile_4_step" >
               <div class="ms-4">
                        <div class="main-timeline">

                          @php $j = 1; @endphp

                          @foreach ($progress_bar as $innerArray)
                            @foreach ($innerArray as $title => $description)
                              <div class="timeline">
                                  <a href="#" class="timeline-content">
                                      <div class="timeline-icon">
                                          <span>{{ $j++ }}<span>
                                      </div>
                                      <h5 class="description">
                                          {{ $title }}
                                      </h5>
                                      <p>{{ $description }}</p>
                                  </a>
                              </div>
                            @endforeach
                          @endforeach

                        </div>
                    </div>
             </div>
            

                    <!-- ------------------- Mobile menu---------------------- -->
            </div>
          </div>
        </div>
      </div>
--}}
        <!-- -------------------------- Service steps End ---------------- -->
    @endif

    <!-- -------------------------- Service last start ---------------- -->

    <div class="service_last">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <!-- -------------service last header start -------------- -->


                    <div>
                        <h1 class="mb-3 main_heading_pa">{{ ucwords($detail->breadcrumb_title) }} <br>
                            <span class="price_heading mb-4" data-aos="fade-up"data-aos-once="true">
                                @if ($session_data['country'] == 'IN')
                                    (Price Start at Rs {{ $detail->indian_price }} /-)
                                @else
                                    (Price Start at $ {{ $detail->foreign_price }} /-)
                                @endif
                            </span>
                        </h1>
                        {{-- <h3 class="color_heading" data-aos="fade-up"data-aos-once="true" >{{ $detail->Content_title }}</h3>   --}}
                        <div class="service_content"data-aos="fade-up" data-aos-once="true">
                            @php echo html_entity_decode($detail->content) @endphp
                        </div>
                    </div>

                    <!-- -------------service last header End -------------- -->
                    <!-- -------------service last Benefit Start -------------- -->
                    @php
                        $Content_list = json_decode($detail->Content_list);
                    @endphp

                    @if (count($Content_list) > 1)
                        <div class="service_last_benefit">
                            <h2 class="benefits_heading text-center" data-aos="fade-up"data-aos-once="true">
                                {{ $detail->Content_list_title }}
                            </h2>
                            <div class="row">

                                @foreach ($Content_list as $row)
                                    <div class="col-md-4">
                                        <div class="benefit_box" data-aos="fade-up"data-aos-once="true">
                                            {{ $row }}
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif

                    <!-- -------------service last Benefit End -------------- -->

                    @if (!empty($detail->other_content))
                        <div class="service_content" data-aos="fade-up"data-aos-once="true">
                            @php echo html_entity_decode($detail->other_content) @endphp
                        </div>
                    @endif


                    <!--------------- service last Eligibility start ---------------->

                    @if (
                        !empty($detail->Section_title_el) ||
                            !empty($detail->eligibility_title) ||
                            !empty($detail->eligibility_sub_title) ||
                            !empty($detail->eligibility_content))
                        <div class="service_last_eligibility" data-aos="fade-up"data-aos-once="true">
                            @if (!empty($detail->Section_title_el))
                                <h2 class="color_heading" data-aos="fade-up"data-aos-once="true">
                                    {{ $detail->Section_title_el }}</h2>
                            @endif

                            @if (!empty($detail->eligibility_title))
                                <h3 class="heading" data-aos="fade-up"data-aos-once="true">
                                    {{ $detail->eligibility_title }}
                                </h3>
                            @endif

                            @if (!empty($detail->eligibility_sub_title))
                                <p class="desc" data-aos="fade-up"data-aos-once="true">
                                    {{ $detail->eligibility_sub_title }}
                                </p>
                            @endif

                            @php
                                $eligibility_list = json_decode($detail->eligibility_list);
                            @endphp

                            @if (count($eligibility_list) > 1)
                                <ul class="first_list" data-aos="fade-up"data-aos-once="true">

                                    @foreach ($eligibility_list as $row)
                                        <li>{{ $row }}</li>
                                    @endforeach

                                </ul>
                            @endif

                            @if (!empty($detail->eligibility_content))
                                <div class="service_content" data-aos="fade-up"data-aos-once="true">
                                    @php echo html_entity_decode($detail->eligibility_content) @endphp
                                </div>
                            @endif

                        </div>
                    @endif

                    <!-- -------------service last Eligibility End -------------- -->


                    <!-- -------------service last Documents  start -------------- -->
                    @php
                        $doc_list = json_decode($detail->doc_list);
                    @endphp

                    @if (!empty($detail->Section_title_doc) || !empty($detail->doc_title) || !empty($detail->doc_content))
                        <div class="service_last_documents">
                            <h3 class="color_heading" data-aos="fade-up"data-aos-once="true">
                                {{ $detail->Section_title_doc }}</h3>
                            <h3 class="heading mb-4" data-aos="fade-up"data-aos-once="true">
                                {{ $detail->doc_title }}
                            </h3>

                            <!-- <h4 class="list_heading" data-aos="fade-up"data-aos-once="true">Documents Required</h4> -->
                            @if (count($doc_list) > 1)
                                <ul class="first_list" data-aos="fade-up"data-aos-once="true">
                                    @foreach ($doc_list as $row)
                                        <li>
                                            {{ $row }}
                                        </li>
                                    @endforeach

                                </ul>
                            @endif

                            @if (!empty($detail->doc_content))
                                <div class="service_content" data-aos="fade-up"data-aos-once="true">
                                    @php echo html_entity_decode($detail->doc_content) @endphp
                                </div>
                            @endif

                        </div>
                    @endif

                    <!-- -------------service last Documents  End -------------- -->

                    <!-- -------------service last Process  start -------------- -->

                    <div class="service_last_process">
                        @if (!empty($detail->Section_title_pro))
                            <h3 class="color_heading" data-aos="fade-up"data-aos-once="true">
                                {{ $detail->Section_title_pro }}</h3>
                        @endif

                        @if (!empty($detail->process_content))
                            <div class="service_content" data-aos="fade-up"data-aos-once="true">
                                @php echo html_entity_decode($detail->process_content) @endphp
                            </div>
                        @endif

                        @if (!empty($detail->process_list_title))
                            <h3 class="list_heading mb-4" data-aos="fade-up"data-aos-once="true">
                                {{ $detail->process_list_title }}
                            </h3>
                        @endif

                        @php
                            $process_list = json_decode($detail->process_list);
                        @endphp

                        @if (count($process_list) > 1)
                            <ul class="first_list" data-aos="fade-up"data-aos-once="true">
                                @foreach ($process_list as $row)
                                    <li>{{ $row }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if (!empty($detail->other_content_pro))
                            <div class="service_content" data-aos="fade-up"data-aos-once="true">
                                @php echo html_entity_decode($detail->other_content_pro) @endphp
                            </div>
                        @endif

                    </div>

                    <!-- -------------service last Process  End -------------- -->
                    <!-- -------------service last Compliances start -------------- -->
                    @php
                        $compliances = json_decode($detail->compliances, true);
                        $a = 1;
                    @endphp

                    @if (!empty($detail->compliances_content) || count($compliances) > 1 || !empty($detail->other_content_comp))
                        <div class="service_last_compliances">
                            <h3 class="color_heading mb-4" data-aos="fade-up"data-aos-once="true">
                                {{ $detail->Section_title_comp }}</h3>

                            @if (!empty($detail->compliances_content))
                                <div class="service_content" data-aos="fade-up"data-aos-once="true">
                                    @php echo html_entity_decode($detail->compliances_content) @endphp
                                </div>
                            @endif



                            @if (count($compliances) > 0)
                                <div class="row">
                                    <div class="col-12">
                                        {{-- <div class="row">
                        <div class="col-6">
                          <div class="list_head" data-aos="fade-up"data-aos-once="true">Plan amount</div>
                          <ul>
                            <li class="list_box" data-aos="fade-up"data-aos-once="true">DSC</li>
                            <li class="list_box" data-aos="fade-up"data-aos-once="true">DIN</li>
                            <li class="list_box" data-aos="fade-up"data-aos-once="true">Professional Fees</li>
                            <li class="list_box" data-aos="fade-up"data-aos-once="true">Stamp Duty (approx)</li>
                            <li class="list_box" data-aos="fade-up"data-aos-once="true">Notary Fees</li>
                            <li class="list_box" data-aos="fade-up"data-aos-once="true">
                              Government Fees (RUN, PAN, TAN)
                            </li>
                            <li class="list_box" data-aos="fade-up"data-aos-once="true">Goods and Services Tax @18%</li>
                          </ul>
                        </div>
                        <div class="col-6">
                          <div class="list_head" data-aos="fade-up"data-aos-once="true">INR</div>
                          <ul>
                            <li class="list_box" data-aos="fade-up"data-aos-once="true">2000</li>
                            <li class="list_box" data-aos="fade-up"data-aos-once="true">1000</li>
                            <li class="list_box" data-aos="fade-up"data-aos-once="true">3799</li>
                            <li class="list_box" data-aos="fade-up"data-aos-once="true">2000</li>
                            <li class="list_box" data-aos="fade-up"data-aos-once="true">500</li>
                            <li class="list_box" data-aos="fade-up"data-aos-once="true">1200</li>
                            <li class="list_box" data-aos="fade-up"data-aos-once="true">684</li>
                          </ul>
                        </div>
                      </div> --}}
                                        <table style="
                      width: 100%;">
                                            <tbody>
                                                @foreach ($compliances as $innerArray)
                                                    @foreach ($innerArray as $f1 => $v1)
                                                        <tr>
                                                            <td @if ($a == 1) class="thead" @endif>
                                                                {{ $f1 }}</td>
                                                            <td @if ($a == 1) class="thead" @endif>
                                                                {{ $v1 }}</td>
                                                        </tr>

                                                        @php $a = 0; @endphp
                                                    @endforeach
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($detail->other_content_comp))
                                <div class="service_content" data-aos="fade-up"data-aos-once="true">
                                    @php echo html_entity_decode($detail->other_content_comp) @endphp
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- -------------service last Compliances  End -------------- -->
                    <!-- -------------service last  Assistance  start -------------- -->

                    @if (!empty($detail->assistance_content))
                        <div class="service_last_assistance">
                            @if (!empty($detail->Section_title_asst))
                                <h3 class="color_heading " data-aos="fade-up"data-aos-once="true">
                                    {{ $detail->Section_title_asst }}</h3>
                            @endif

                            <div class="service_content" data-aos="fade-up"data-aos-once="true">
                                @php echo html_entity_decode($detail->assistance_content) @endphp
                            </div>

                        </div>
                    @endif

                    @php
                        $faq = json_decode($detail->faq, true);
                        $f = 1;
                    @endphp
                    @if (count($faq) > 0)
                        <div class="service_last_faq">
                            <h3 class="mb-4 " data-aos="fade-up"data-aos-once="true">Most common question about our
                                services</h3>


                            @foreach ($faq as $innerArray)
                                @foreach ($innerArray as $question => $answer)
                                    <div class="pt-2">
                                        <h6>
                                            {{ $question }}
                                        </h6>

                                        <p class="mb-0">
                                            @php echo html_entity_decode($answer) @endphp
                                        </p>

                                    </div>
                                    <hr>






                                    @php $f++; @endphp
                                @endforeach
                            @endforeach
                            
                            @if(count($nav_practice) >= 1)
                              <div class="d-flex align-items-center justify-content-between my-5">

                                @php 

                                  $navPractice = json_decode($nav_practice, true);
                                  $count = count($navPractice);

                                @endphp

                                @if($count == 2)

                                <a class="pagination_link" href="{{ url(route('practicearea-detail', ['slug' => $navPractice['0']['slug']] )) }}">
                                  <div class="d-flex align-items-md-center flex-md-row flex-column gap-2">
                                    
                                      <img src="assets/frontend/images/left_p.png" class="arrow_img" alt="">
                                      <span>
                                        {{ $navPractice['0']['title'] }}
                                      </span>
                                    
                                  </div>
                                </a>

                                <a class="pagination_link" href="{{ url(route('practicearea-detail', ['slug' => $navPractice['1']['slug']] )) }}">
                                  <div
                                   
                                      class="d-flex align-items-md-center align-items-end flex-md-row  flex-column-reverse gap-2">
                                      <span>
                                        {{ $navPractice['1']['title'] }}
                                      </span>
                                      <img src="assets/frontend/images/right_p.png" class="arrow_img" alt="">
                                    
                                  </div>
                                </a>
                                
                                @else

                                <a class="pagination_link" href="{{ url(route('practicearea-detail', ['slug' => $navPractice['0']['slug']] )) }}">
                                  <div
                                    
                                      class="d-flex align-items-md-center align-items-end flex-md-row  flex-column-reverse gap-2">
                                      <span>
                                        {{ $navPractice[0]['title'] }}
                                      </span>
                                      <img src="assets/frontend/images/right_p.png" class="arrow_img" alt="">
                                    
                                  </div>
                                </a>

                                @endif


                              </div>
                            @endif

                        </div>
                    @endif

                    <!-- -------------service last  Assistance  End -------------- -->
                </div>
                <div class="col-lg-3">
                    <div class="service_last_form_container d-flex align-items-center justify-content-center mt-md-0 mt-3 position_sticky"
                        data-aos="fade-up"data-aos-once="true">
                        @include('frontend.component.area_of_practice_form')
                    </div>
                    <div class="service_list_box mt-4">
                        <h5 class="text-center ">Our Registration Services</h5>
                        <ul>
                            <li>
                                Start Up India Registration
                            </li>
                            <li>
                                Angel Tax Excemption (Section 56, IT Act)
                            </li>
                            <li>
                                Start-up tax excemption (Sec 80-IAC)
                            </li>
                            <li>
                                Legal Entity Identifier Registration
                            </li>
                            <li>
                                MSME/UDHYOG Aadhar Registration
                            </li>
                            <li>
                                IEC Registration
                            </li>
                            <li>
                                ESI&PF Registration
                            </li>
                            <li>
                                ISO Registration (Non-Audit)
                            </li>
                            <li>
                                ISBN Registration
                            </li>
                            <li>
                                GST Registration
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-------===========practicearea end===================------------>
@endsection
