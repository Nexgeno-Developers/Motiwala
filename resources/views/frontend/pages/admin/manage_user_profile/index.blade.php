@extends(Session::has('user_id') ? 'frontend.layouts.app2' : 'frontend.layouts.app')

@section('page.title', 'Motiwala')

@section('page.description', 'Motiwala')

@section('page.type', 'website')

@section('page.content')



    <!-- -------------------- Edit & Manage Profile start ---------------- -->

    <section class="inner_page_banner">
        <img src="/assets/frontend/images/innwe_imagebanner.jpg" class="d-block w-100" alt="...">
    </section>


    <main class="main">
        <section class="openaccount pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" id="page-heading">
                        <h4 class="title_heading text-center black_color pb-3 heading_font">Edit User Profile</h4>
                    </div>

                    <div class="row mb-2">
                        <div class="col-sm-5">
                           <!--<h3>List</h3>-->
                        </div>
                        <div class="col-sm-7">
                           <div class="text-sm-end">
                               <a href="{{ url(route('customer.reset_password')) }}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-2"></i> Reset Password</a>
                           </div>
                        </div>
                        <!-- end col-->
                     </div>


                    <div class="col-md-12" id="user_profile_detail">

                        <div class="p-3 mb-2 text-white" style="background-color:#c0af78;">
                            <h5> Profile Details </h5>
                        </div>

                        <form id="user-panel-info" action="{{ url(route('account.customer.update.profile')) }}" method="post">
                            @csrf

                            <input type="hidden" name="id" value="{{ auth()->user()->id }}">
            
                            <div class="row d-flex">
                                
                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">Name *</label>
                                        <input type="text" class="form-control" name="name" pattern="[A-Za-z]+" minlength="3"
                                        maxlength="6" placeholder="Please Enter Your Name" value="{{ $user->name }}" readonly/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">Mobile Number (Username) </label>
                                        <input type="text" class="form-control" name="nominee_phone" pattern="[0-9]+" minlength="10" maxlength="10" placeholder="Please Enter Your Mobile Number" value="{{ $user->phone }}"  readonly/>
                                    </div>
                                </div>
            
                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">Email *</label>
                                        <input type="eamil" class="form-control" name="email" placeholder="Please Enter Your Email Id" 
                                        value="{{ $user->email }}" required/>
                                    </div>
                                </div>
            
                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">Door No / Flat NO *</label>
                                        <input type="text" class="form-control" name="flat_no" pattern="[0-9A-Za-z]+" placeholder="Please Enter Your Door No / Flat No" 
                                        value="{{ $user_detail->flat_no }}" required/>
                                    </div>
                                </div>
            
                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">Street / Road / Sector / Building *</label>
                                        <input type="text" class="form-control" name="street" pattern="[0-9A-Za-z]+" placeholder="Please Enter Your Street" value="{{ $user_detail->street }}" required/>
                                    </div>
                                </div>
            
                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">Main / Area / Locality / Colony / LandMark *</label>
                                        <input type="text" class="form-control" name="locality" pattern="[0-9A-Za-z]+" placeholder="Please Enter Your Locality"  value="{{ $user_detail->locality }}" required/>
                                    </div>
                                </div>
            
                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">State *</label>
                                        <input type="text" class="form-control" name="state" pattern="[A-Za-z\s]+" minlength="3"
                                        placeholder="Please Enter Your State" value="{{ $user_detail->state }}" required/>
                                    </div>
                                </div>
            
                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">City / Town *</label>
                                        <input type="text" class="form-control" name="city" pattern="[A-Za-z]+" minlength="3"
                                        placeholder="Please Enter Your City" value="{{ $user_detail->city }}" required/>
                                    </div>
                                </div>
            
                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">Pin Code *</label>
                                        <input type="text" class="form-control" name="pincode" pattern="[0-9]+" minlength="3"
                                        placeholder="Please Enter Your Pin Code" value="{{ $user_detail->pincode }}" required/>
                                    </div>
                                </div>
            
                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">Date of Birth * ( As per Aadhar )</label>
                                        <input type="date" class="form-control" name="dob" value="{{ $user_detail->dob }}" required/>
                                    </div>
                                </div>

                                <!------- marital status ---------------------->
                                <div class="row mt-5 mb-3">

                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="marital_status" id="single" value="0" @if($user_detail->marital_status == 0) checked @endif>
                                            <label class="form-check-label" for="single">
                                                Single
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="marital_status" value="1" id="married" @if($user_detail->marital_status == 1) checked @endif>
                                            <label class="form-check-label" for="married">
                                            Married
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div id="marital_info">
                                    <div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group mt-4 adhar_field">
                                                <label class="pb-3">Spouse Name </label>
                                                <input type="text" class="form-control" name="spouse_name" pattern="[A-Za-z]+" minlength="3" placeholder="Please Enter Your Spouse Name"
                                                value="{{ $user_detail->spouse_name }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group mt-4 adhar_field">
                                                <label class="pb-3">Spouse Date Of Birth</label>
                                                <input type="date" class="form-control" name="spouse_dob" value="{{ $user_detail->spouse_dob }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group mt-4 adhar_field">
                                                <label class="pb-3">Marriage Date</label>
                                                <input type="date" class="form-control" name="marriage_date" value="{{ $user_detail->marriage_date }}" />
                                            </div>
                                        </div>


                                    </div>  
                                </div>

                                <!------ marital status ------------------------>

                                </br>
                                <div class="p-3 mt-5 mb-3 text-white" style="background-color:#c0af78;">
                                    <h5> Nominee Details </h5>
                                </div>
                                </br>

                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">Nominee Name </label>
                                        <input type="text" class="form-control" name="nominee_name" pattern="[A-Za-z]+" minlength="3" placeholder="Please Enter Your Nominee Name"
                                        value="{{ $user_detail->nominee_name }}" />
                                    </div>
                                </div>
                    
                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">Nominee Contact Number </label>
                                        <input type="text" class="form-control" name="nominee_phone" pattern="[0-9]+" minlength="10" maxlength="10" placeholder="Please Enter Your Nominee Contact Number" value="{{ $user_detail->nominee_phone }}" />
                                    </div>
                                </div>
                    
                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">Nominee Date Of Birth</label>
                                        <input type="date" class="form-control" name="nominee_dob" value="{{ $user_detail->nominee_dob }}" />
                                    </div>
                                </div>
                    
                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">Nominee Address *</label>
                                        <textarea class="form-control" row="5" name="nominee_address" style="height: 103px;">{{ $user_detail->nominee_address }}</textarea>
                                    </div>
                                </div>
                    
                                <div class="col-md-4">
                                    <div class="form-group mt-4 adhar_field">
                                        <label class="pb-3">Relationship with Account Holder</label>
                                        <input type="text" class="form-control" name="nominee_relation" pattern="[A-Za-z]+" minlength="3"
                                        placeholder="Please Enter Your Relationship with Account Holder" 
                                        value="{{ $user_detail->nominee_relation }}" />
                                    </div>
                                </div>


            
            
                                <div class="form-group">
                                    <div class="buttonclass1 mt60">
                                        <button type="submit">Submit <i class="las la-arrow-right"></i></button>
                                    </div>
                                </div>
            
            
                            </div>
            
                        </form>


                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@section('component.scripts')
    <script>

    /*--------------------- Edit & Manage Profile  ------------------*/ 

        initValidate('#user-panel-info');

        $('#user_profile_detail form').on('submit', function(event){

            var form = $(this);
            if (form.valid()) {
                event.preventDefault();

                var button = $(form).find('button[type="submit"]').html();
                $(form).find('button[type="submit"]').html('please wait...');
                $(form).find('button[type="submit"]').css('pointer-events', 'none');
                
                $.ajax({
                    url: $(form).attr('action'),
                    type: "POST",
                    data: $(form).serialize(),
                    success: function (response) {



                        if(response.response == 'success') {

                            
                            toastr.success(response.message, response.response);

                            setTimeout(function() {
                                location.reload();
                            }, 1500);

                        }else{



                            $(form).find('button[type="submit"]').html(button);
                            $(form).find('button[type="submit"]').css('pointer-events', 'inherit');

                            toastr.error(response.message, response.response);


                        }
                        
                    }
                });
            } else {

                // Get all validation errors and display them in Toastr
                var errors = form.validate().errorMap;
                var errorMessage = '';
                $.each(errors, function(key, value) {
                    errorMessage += value + '<br>';
                });
                toastr.error(errorMessage, 'Validation Error');
                form.find('button[type="submit"]').html(button);
                form.find('button[type="submit"]').css('pointer-events', 'inherit');
            }

        });

    /*--------------------- Edit & Manage Profile  ------------------*/ 

    // Get references to the radio buttons and the marital information container
    const singleRadioButton = document.getElementById('single');
    const marriedRadioButton = document.getElementById('married');
    const maritalInfo = document.getElementById('marital_info');

    // Initially hide the marital information since "Single" is checked by default
    maritalInfo.style.display = 'none';

    // Function to add or remove the required attribute from input fields inside the marital information
    function toggleRequired(isMarried) {
        const inputs = maritalInfo.querySelectorAll('input');
        inputs.forEach(input => {
            if (isMarried) {
                input.setAttribute('required', '');
            } else {
                input.removeAttribute('required');
            }
        });
    }

    // Add event listener to the radio buttons
    singleRadioButton.addEventListener('change', function() {
        if (singleRadioButton.checked) {
            maritalInfo.style.display = 'none'; // Hide marital information
            toggleRequired(false); // Remove required attribute from inputs
        }
    });

    marriedRadioButton.addEventListener('change', function() {
        if (marriedRadioButton.checked) {
            maritalInfo.style.display = 'block'; // Show marital information
            toggleRequired(true); // Add required attribute to inputs
        }
    });

    function check_marital_status(){
        if (singleRadioButton.checked) {
            maritalInfo.style.display = 'none'; // Hide marital information
            toggleRequired(false); // Remove required attribute from inputs
        }

        if (marriedRadioButton.checked) {
            maritalInfo.style.display = 'block'; // Show marital information
            toggleRequired(true); // Add required attribute to inputs
        }
    }

    check_marital_status();

    </script>
@endsection