<header class="w-100 z-index-1">
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand" href="{{ url(route('index')) }}"><img
                    src="{{ asset('/assets/frontend/images/header_logo.svg') }}" class="width200"></a>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="d-flex align-items-center" id="navbarScroll">
                <ul class="d-flex navbar-nav ms-md-auto my-md-2 my-lg-0 my-0 mx-0 nav_right_menu ">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" href="#loginmodal"><i class="las la-user"></i> Sign In
                        </a>
                    </li>

                     <li class="nav-item">
                        <a class="nav-link" href="{{ url(route('account.new.enrollment.page')) }}"><i
                                class="las la-user-plus"></i> New Account</a>
                    </li>


                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#instant-pay" onclick="instant_pay();"><i class="las la-hand-holding-usd"></i> Instant Pay</a>
                    </li>

                    
                   

                     <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="/golden-treasure"><i class="las la-wallet"></i>  Golden Treasure</a>
                    </li>

                    
                     <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="/golden-fortune"><i class="las la-coins"></i> Golden Fortune </a>
                    </li>

                  

                  {{-- <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="{{ url(route('faq')) }}"><i class="las la-question-circle"></i> FAQs</a>
                  </li> --}}

                  
                  <li>
                    <a class="nav-link d-none d-lg-block" target="_blank" href="https://motiwalajewels.in/"><i class="las la-shopping-bag"></i> Shop Now</a>
                  </li>


                    <li class="nav-item bars d-block d-lg-none">
                      <a id="nav-icon">
                        <span class="fa fa-bars"></span>
                      </a>
                    </li>
                </ul>

                <ul class="menu d-block d-lg-none">
                  <img src="https://demo.creaadesign.com/bandhan-mutual-fund/images/cross2.svg" alt="" class="img-fluid cross_close">
                  <li>
                    <a class="nav-link" href="#instant-pay" onclick="instant_pay();"><i class="las la-hand-holding-usd"></i> Instant Pay</a>
                  </li>
                  
                  {{-- <li>
                    <a class="nav-link" data-bs-toggle="modal" href="#autodebit_modal"><i
                                        class="las la-credit-card"></i> Auto Debit</a>
                  </li> --}}
                  <!-- <li>
                    <a class="nav-link" href="{{ url(route('information')) }}"><i class="las la-exclamation-circle"></i>
                                    Information (Plan)</a>
                  </li> -->

                  <li>
                    <a class="nav-link" href="/golden-treasure"><i class="las la-wallet"></i>
                                    Golden Treasure </a>
                  </li>

                   <li>
                    <a class="nav-link" href="/golden-fortune"> <i class="las la-coins"></i>
                                    Golden Fortune </a>
                  </li>

                  <li>
                    <a class="nav-link" href="{{ url(route('about_us')) }}"><i class="far fa-address-card"></i> About Us</a>
                  </li>
                  
                  <li>
                    <a class="nav-link" href="{{ url(route('contact_us')) }}"><i class="far fa-address-book"></i> Contact Us</a>
                  </li>

                  {{-- <li>
                    <a class="nav-link" href="{{ url(route('faq')) }}"><i class="las la-question-circle"></i> FAQs</a>
                  </li> --}}

                

                  <li>
                    <a class="nav-link" target="_blank" href="https://motiwalajewels.in/"><i class="las la-shopping-bag"></i> Shop Now</a>
                  </li>

                  
                </ul>

            </div>
 
       
        
      </nav>
        </div>
    </nav>
</header>
