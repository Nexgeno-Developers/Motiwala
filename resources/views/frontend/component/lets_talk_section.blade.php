@php
//$ids = [14, 7, 12, 23, 31, 16];
//$practice_Area = DB::table('practice_areas')->whereIn('id', $ids)->get();
@endphp

<!------=================== Awards Practice Area =====================------------------------->

<section class="payment">
    <div class="container">
       <div class="row">
          <div class="col-md-8">
             <h3 class="payment_para fs-5 mb-3 first text-md-start text-center"data-aos="fade-up" data-aos-once="true">
                Let our team of 
                <span style="color: #E13333">legal experts</span> 
             </h3>
             <h2 class="payment_heading text-md-start text-center fw-bolder mb-md-3 mb-0"data-aos="fade-up" data-aos-once="true">
                 help you manage your business more 
                <span style="color: #E13333">effectively at an affordable cost.</span>
             </h2>
   
          </div>
          <div class="col-md-4">
             <div
                class="payment_right_container d-flex align-items-center justify-content-md-end justify-content-center"
                >
                <div class="payment_btn_call">   
                  <a href="{{ url(route('contact')) }}"> 
                     <button class="payment_btn">
                        Let&#39;s Talk Now
                     </button>
                  </a>
                   <a
                   href="tel:+91-7428899959"
                      class="payment_call d-flex align-items-center justify-content-center gap-2 mb-0" data-aos="fade-up" data-aos-once="true"
                      >
                      <img src="{{ asset('/assets/frontend/images/call_white.png') }}" alt="" /><span class="fs-5"
                         >+{{ get_settings('mobile') }}</span
                         >
                   </a>
                </div>
             </div>
          </div>
       </div>
    </div>
   </section>

<!------=================== end Awards Practice Area =====================------------------------->