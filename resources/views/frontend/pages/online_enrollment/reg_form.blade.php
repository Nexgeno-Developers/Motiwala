


@if(!Session::has('step') || Session::get('step') == 1) 

<!--------------------------------------------------------- add phone ----------------------------------->

    <div id="add-phone">

        @php
            session()->forget('step');
            session()->forget('otp_timestamp');
            session()->forget('phone');
            session()->forget('temp_user_id');
            session()->forget('otp'); 
            Session()->put('step', 1); 
        @endphp

        <form id="phone-verification" action="{{ url(route('account.create', ['param' =>'phone-verification'])) }}" method="post">
            @csrf

            <div class="form-group mt-2">
                <input type="checkbox" name="accept_term" id="agree" value="yes" required/>
                <label for="agree">I accept <a href="{{ url(route('terms')) }}">“Terms and conditions”</a> of Motiwala &
                    Sons Golden Harvest.</label>
            </div>


            <div class="d-flex">
                <div class="form-group mt-4 adhar_field">
                    <label class="pb-3">Mobile Number* (As per Aadhaar)</label>
                    <input type="text" class="form-control" name="phone"
                        placeholder="Please Enter Mobile Number" pattern="[0-9]+" minlength="10"
                        maxlength="10" placeholder="Please Enter Mobile Number" required/>
                </div>

                <div class="form-group">
                    <div class="buttonclass1 mt60">
                        <button type="submit">Proceed <i class="las la-arrow-right"></i></button>
                    </div>
                </div>
            </div>

        </form>

    </div>

<!--------------------------------------------- add phone --------------------------------->    

@endif






@if(Session::has('step') && Session::get('step') == 2)

<!--------------------------------------------- verify otp --------------------------------->

    <div id="otp">

        <div class="row">
            <form class="col-md-9" id="verify-otp" action="{{ url(route('account.create', ['param' =>'verify-otp'])) }}" method="post">
                @csrf

                <div class="d-flex">

                    <div class="form-group mt-4 adhar_field">
                        <label class="pb-3">Mobile Number</label>
                        <input type="text" class="form-control" value="{{ Session::get('phone') }}" disabled/>
                    </div>

                    <div class="form-group mt-4 adhar_field">
                        <label class="pb-3">Verify OTP *</label>
                        <input type="text" class="form-control" name="otp" pattern="[0-9]+" minlength="6"
                        maxlength="6" placeholder="Please Enter OTP" required/>
                    </div>


                    <div class="form-group">
                        <div class="buttonclass1 mt60">
                            <button type="submit">Submit <i class="las la-arrow-right"></i></button>
                        </div>
                    </div>


                    
                    <div class="form-group mx-2">
                        <div class="buttonclass1 mt60">
                            <button id="resendOTPButton">Resend OTP<i class="las la-arrow-right"></i></button>
                        </div>
                    </div>

                </div>



            </form>


        </div>

    </div>

<!--------------------------------------------- verify otp --------------------------------->

@endif




@if(Session::has('step') && Session::get('step') == 3)

<!--------------------------------------------- customer detail --------------------------------->

    <div id="customer-detail">

        
        <div class="p-3 mb-2 text-white" style="background-color:#c0af78;">
            <h5> Customer Information </h5>
        </div>

        @if(Session::has('temp_user_id') && !empty(Session::get('temp_user_id')))
            @php 
                $user = DB::table('users')->where('id', Session::get('temp_user_id'))->get(['salutation','name','email','phone'])->first();
                $user_detail = DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->get(['flat_no','street','locality','state','city','pincode','dob'])->first();
            @endphp
        @endif
    
            <form id="customer-info" action="{{ url(route('account.create', ['param' =>'customer-info'])) }}" method="post">
                @csrf

                <div class="row d-flex">
                    
                    
                    <div class="col-md-4">
                        <div class="form-group mt-4 adhar_field">
                            <label class="pb-3">Title *</label>
                            <select class="form-select" aria-label="---Select----" name="title" required>
                                <option value="">---Select---</option>
                                <option value="Mr" @if($user->salutation == "Mr") selected @endif>Mr</option>
                                <option value="Ms" @if($user->salutation == "Ms") selected @endif>Ms</option>
                                <option value="Mrs" @if($user->salutation == "Mrs") selected @endif>Mrs</option>
                                <option value="Dr" @if($user->salutation == "Dr") selected @endif>Dr</option>
                                <option value="CA" @if($user->salutation == "CA") selected @endif>CA</option>
                                <option value="Lawyer" @if($user->salutation == "Lawyer") selected @endif>Lawyer</option>
                                <option value="Minor" @if($user->salutation == "Minor") selected @endif>Minor</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mt-4 adhar_field">
                            <label class="pb-3">Name *</label>
                            <input type="text" class="form-control" name="name" pattern="[A-Za-z]+" minlength="3"
                            maxlength="6" placeholder="Please Enter Your Name" value="{{ $user->name }}" required/>
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


                    <div class="form-group">
                        <div class="buttonclass1 mt60">
                            <button type="submit">Submit <i class="las la-arrow-right"></i></button>
                        </div>
                    </div>


                </div>

            </form>
    

    </div>

<!--------------------------------------------- customer detail --------------------------------->

@endif


@if(Session::has('step') && Session::get('step') == 4)

<!--------------------------------------------- plan detail --------------------------------->    

<div id="plan-detail">
 
    <div class="p-3 mb-2 text-white" style="background-color:#c0af78;">
        <h5> Plan Details </h5>
    </div>

    @php 
        $user = DB::table('users')->where('id', Session::get('temp_user_id'))->get(['plan_id','installment_amount'])->first();
        $user_detail = DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))->get(['nominee_name','nominee_phone','nominee_dob','nominee_address','nominee_relation'])->first();
        $plan = DB::table('plans')->where('status',1)->get(['id','name','minimum_installment_amount']);
    @endphp
    
    <form id="plan-info" action="{{ url(route('account.create', ['param' =>'plan-info'])) }}" method="post">
        @csrf

        <div class="row d-flex">

            <div class="col-md-4">
                <div class="form-group mt-4 adhar_field">
                    <label class="pb-3">Select Plan *</label>
                    <select class="form-select" aria-label="---Select----" name="plan_id" id="plan_id" required>
                        <option data-minium="2000" value="">---Select---</option>
                        {{--@foreach($plan as $row)
                            <option data-minium="{{ $row->minimum_installment_amount }}" value="{{ $row->id }}" @if($user->plan_id == $row->id) selected @endif>
                                {{ ucfirst($row->name) }}
                            </option>
                        @endforeach --}}
                        @foreach($plan as $row)
                            <option data-minium="{{ $row->minimum_installment_amount }}" value="{{ $row->id }}">
                                {{ ucfirst($row->name) }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group mt-4 adhar_field">
                    <label class="pb-3">Installment Amount *</label>
                    {{--<input type="text" class="form-control" name="installment_amount" pattern="[0-9]+" placeholder="Please Enter Your Installment Amount" value="{{ $user->installment_amount }}" required/>--}}
                    <input type="text" class="form-control" name="installment_amount" pattern="[0-9]+" placeholder="Please Enter Your Installment Amount" required/>
                    
                    <span id="installmentAmount" style="display: none; color: red;">Minimum Installment Amount : 2000.00</span>

                </div>
            </div>

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

<!--------------------------------------------- plan detail --------------------------------->

@endif


@if(Session::has('step') && Session::get('step') == 5)

<!--------------------------------------------- preview info --------------------------------->    

<div id="preview-info">

    @php 
        $user = DB::table('users')->where('id', Session::get('temp_user_id'))
            ->get(['plan_id','installment_amount','name','email','phone'])->first();

        $user_detail = DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))
            ->get(['nominee_name','nominee_phone','nominee_dob','nominee_address','nominee_relation','flat_no','street','locality','state','city','pincode','dob'])->first();

        $plan_name = DB::table('plans')->where('id', $user->plan_id)->value('name');
    @endphp
 
    <div class="p-3 mb-2 text-white" style="background-color:#c0af78;">
        <h5> Preview Info </h5>
    </div>

    <div class="row d-flex">

        <div class="col-md-6">

            <div class="card col-md-12 my-5 mx-2" style="width: 40rem;">
                <div class="card-header">
                  Plan Details
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Plan Type : </strong>{{ $plan_name }}</p>
                    <p class="card-text"><strong>Installment Amount (in Rs) : </strong>{{ $user->installment_amount}}</p>
                </div>
              </div>

              <div class="card col-md-12 my-5 mx-2" style="width: 40rem;">
                <div class="card-header">
                  Verification Details
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>eKYC Status : </strong>Not Started</p>
                    <p class="card-text"><strong>eSign Status : </strong>Not Started</p>
                </div>
              </div>

        </div>

        <div class="col-md-6">

            <div class="card col-md-12 my-5 mx-2" style="width: 39rem;">
                <div class="card-header">
                  Customer Details
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Name : </strong>{{ $user->name }}</p>
                    <p class="card-text"><strong>Address : </strong>
                    @php 
                        echo $user_detail->flat_no . ",\n";
                        echo $user_detail->street . ",\n";
                        echo $user_detail->locality . ",\n";
                        echo $user_detail->city . ",\n";
                        echo $user_detail->state . ",\n";
                        echo $user_detail->pincode;
                    @endphp
                    </p>
                    <p class="card-text"><strong>Email : </strong>{{ $user->email }}</p>
                    <p class="card-text"><strong>Birthday : </strong>{{ date('d/m/Y', strtotime($user_detail->dob)) }}</p>
                    <p class="card-text"><strong>Mobile : </strong>{{ $user->phone }}</p>
                    <p class="card-text"><strong>ULP ID : </strong>NA</p>
                    <p class="card-text"><strong>Nominee Name : </strong>{{ !empty($user_detail->nominee_name) ? $user_detail->nominee_name : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee Phone No : </strong>{{ !empty($user_detail->nominee_phone) ? $user_detail->nominee_phone : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee DOB : </strong>{{ !empty($user_detail->nominee_dob) ? date('d/m/Y', strtotime($user_detail->nominee_dob)) : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee Address : </strong>{{ !empty($user_detail->nominee_address) ? $user_detail->nominee_address : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee Relation : </strong>{{ !empty($user_detail->nominee_relation) ? $user_detail->nominee_relation : 'NA' }}</p>
                </div>
              </div>


        </div>


    </div>

    <div class="p-3 mb-2 text-white" style="background-color:#c0af78;">
        <h5> eKYC Process </h5>
    </div>

    <div>
        <div class="steps-title mx-2 my-2">
            <span style="color: var(--primary-text); font-size: var(--primary-font-size-heading);">Terms and Conditions
            </span><br /><label style="color: var(--ternary-text); font-size: var(--tertiary-font-size); padding: 5px;"><br />
                By clicking on proceed button below, you are hereby acknowledging that you are providing your Aadhaar related
                details voluntarily to   Motiwala & Sons Private Limited to retrieve your Aadhaar Paperless-XML from the UIDAI Portal
                on your behalf based on the process detailed below. It is not mandatory for you to provide your Aadhaar details.
                If you do not wish to continue with providing the same, request you to cancel the transactions. I understand
                that   Motiwala & Sons Private Limited will be able to access my photograph through XML file being parsed from the
                database of Unique Identification Authority of India, to further share the same with the service provider. If
                you do not agree for us to access the same, request you to not click on Proceed. <br /><br />By accepting the <a
                    style="color: var(--secondary-text);">Terms &amp; Conditions</a> you are expressly providing your consent to
                the collection of your information for the purpose of providing access of the same by   Motiwala & Sons to enable
                (&ldquo;Client&rdquo;) to initiate your on boarding to avail the Client&rsquo;s services. The information you
                provide may be used to help improve and train our products and assist in the development of any technologies and
                in addition   Motiwala & Sons may use the above information to fulfil any other lawful purpose.   Motiwala & Sons shall be
                redacting and collecting your Aadhaar number. The first 8 digits of the Aadhaar number will be blacked out when
                you insert the same on to the webpage. You shall be prompted to insert the Aadhaar number twice, in order to
                ensure its correctness and the Aadhaar number will be encrypted and transferred/ accessed. </label><br />
            <div style="color: var(--ternary-text); font-size: var(--tertiary-font-size); padding: 5px; word-spacing: normal;">
                The following screens will capture your Aadhaar number / VID and other relevant details required to download
                Paperless-XML from UIDAI Portal <a style="color: var(--secondary-text); cursor: pointer;"
                    href="https://myaadhaar.uidai.gov.in/" target="_blank" rel="noreferrer">https://myaadhaar.uidai.gov.in/</a>
                instead of forwarding you to UIDAI portal. We will be doing the video ID KYC process including the following
                steps:</div>
            <br />
            <div style="color: var(--ternary-text); font-size: var(--tertiary-font-size); padding: 5px;">1. Connecting to UIDAI
                portal and fetching XML.</div>
            <div style="color: var(--ternary-text); font-size: var(--tertiary-font-size); padding: 5px;">2. Capturing OTP/TOTP
                and Validating it using UIDAI portal.</div>
            <div style="color: var(--ternary-text); font-size: var(--tertiary-font-size); padding: 5px;">3. Sending request to
                UIDAI portal and get response HTML.</div>
            <div style="color: var(--ternary-text); font-size: var(--tertiary-font-size); padding: 5px;">4. Parsing HTML and
                populate fields in the UI.</div>
            <div style="color: var(--ternary-text); font-size: var(--tertiary-font-size); padding: 5px;">5. Sending request to
                offline Aadhaar portal to download the ZIP file protected with Share code.</div>
            <div style="color: var(--ternary-text); font-size: var(--tertiary-font-size); padding: 5px;">6. Application fetches
                ZIP XML response from Offline Aadhaar in memory.</div>
            <div style="color: var(--ternary-text); font-size: var(--tertiary-font-size); padding: 5px;">7. ZIP XML File and
                Share code is shared with requesting agency for consuming KYC data.</div>
        </div>
    </div>

    <form id="ekyc-verify" action="{{ url(route('account.create', ['param' =>'ekyc-varification'])) }}" method="post">
        @csrf

        <div class="form-group mt-2">
            <input type="checkbox" name="accept_term" id="agree" value="yes" required/>
            <label for="agree">I accept <a href="{{ url(route('terms')) }}">“Terms and conditions”</a> of Motiwala &
                Sons Golden Harvest.</label>
        </div>


        <div class="form-group">
            <div class="buttonclass1 mt60">
                <button type="submit">Proceed <i class="las la-arrow-right"></i></button>
            </div>
        </div>

    </form>

</div>

<!--------------------------------------------- preview info --------------------------------->

@endif



@if(Session::has('step') && Session::get('step') == 6)

<!--------------------------------------------- ekyc Aadhar verify --------------------------------->

    <div id="ekyc">

        <div class="row">
            <form class="col-md-5" id="aadhar-verify-request-otp" action="{{ url(route('account.create', ['param' =>'aadhar-verify-request-otp'])) }}" method="post">
                @csrf

                <div class="d-flex">
                    <div class="form-group mt-4 adhar_field">
                        <label class="pb-3">Aadhaar *</label>
                        <input type="text" class="form-control" name="aadhar" pattern="[0-9]+" minlength="12"
                        maxlength="12" placeholder="Please Enter Aadhar No" required/>
                    </div>

                    <div class="form-group mt-4 adhar_field">
                        <label class="pb-3">Conform Aadhaar *</label>
                        <input type="text" class="form-control" name="aadhar_conform" pattern="[0-9]+" minlength="12"
                        maxlength="12" placeholder="Please Enter Aadhar No" required/>
                    </div>

                </div>

                <div class="form-group">
                    <div class="buttonclass1 mt60">
                        <button type="submit">Verify <i class="las la-arrow-right"></i></button>
                    </div>
                </div>

            </form>

        </div>

    </div>

<!--------------------------------------------- ekyc Aadhar verify --------------------------------->

@endif


@if(Session::has('step') && Session::get('step') == 7)

<!--------------------------------------------- ekyc Aadhar verify --------------------------------->

    <div id="ekyc-aadhar-otp-verify">

        <div class="row">
            <form class="col-md-5" id="aadhar-otp-verify" action="{{ url(route('account.create', ['param' =>'aadhar-otp-verify'])) }}" method="post">
                @csrf

                <div class="d-flex">
                    <div class="form-group mt-4 adhar_field">
                        <label class="pb-3">Verify OTP *</label>
                        <input type="text" class="form-control" name="otp" pattern="[0-9]+" minlength="6"
                        maxlength="6" placeholder="Please Enter OTP" required/>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="buttonclass1 mt60">
                            <button type="submit">Submit <i class="las la-arrow-right"></i></button>
                        </div>
                    </div>


                </div>

            </form>

            <div class="form-group col-md-6 d-none" id="ReSubmit">
                <div class="buttonclass1 mt60">
                    <button>ReSubmit <i class="las la-arrow-right"></i></button>
                </div>
            </div>

        </div>

    </div>



<script>
    // Reload the page after 5 seconds
    setTimeout(function() {
        var ReSubmitBtn = document.getElementById("ReSubmit");
        ReSubmitBtn.classList.remove("d-none"); // Remove the "d-none" class to display the button

        // Add event listener to the button
        ReSubmitBtn.addEventListener("click", function() {
            // Create an XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Specify the URL to hit using the route name
            var url = '{{ route("resubmit-aadhar-otp") }}';

            // Send a GET request to the URL asynchronously
            xhr.open('GET', url, true);
            xhr.send();

            // Reload the page after hitting the route
            location.reload();
        });

    }, 60000); // 5000 milliseconds = 5 seconds
</script>


<!--------------------------------------------- ekyc Aadhar verify --------------------------------->

@endif



@if(Session::has('step') && Session::get('step') == 8)

<!--------------------------------------------- ekyc Aadhar verify --------------------------------->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the elements by their IDs
            var pageHeading = document.getElementById("page-heading");
            var pageContain = document.getElementById("page-contain");

            // Set the display style to 'block' to make them visible
            pageHeading.style.display = "none";
            pageContain.style.display = "none";
        });


        // Reload the page after 3 seconds
        setTimeout(function() {
            
            // Create an XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Specify the URL to hit using the route name
            var url = '{{ route("update-session") }}';

            // Send a GET request to the URL asynchronously
            xhr.open('GET', url, true);
            xhr.send();


            location.reload();
        }, 5000); // 3000 milliseconds = 3 seconds

    </script>


    <div id="aadhar-preview">

        @php 

            $customer_detail = Session::get('customer_detail');

            $profileImage = $customer_detail['profileImage'];
            $fullName = $customer_detail['name'];
            $address = $customer_detail['address'];
            $zip = $customer_detail['zip'];
            $dob = $customer_detail['dob'];
            $care_of = $customer_detail['care_of'];
            $mobile = $customer_detail['mobile'];

        @endphp

        <div class="row d-flex justify-content-center">

            <div class="card col-md-12 my-5 mx-2" style="width: 40rem;">
                <div class="card-header">
                  Final KYC Reault
                </div>

                <div class="d-flex justify-content-center">
                    <img src="data:image/png;base64,{{$profileImage}}" class="card-img-top thum" alt="profile-image" 
                    style="width: 250px;">
                </div>

                <div class="card-body">
                    <p class="card-text"><strong>Name : </strong>{{ $fullName }}</p>
                    <p class="card-text"><strong>DOB : </strong>{{ $dob }}</p>
                    <p class="card-text"><strong>Mobile : </strong>{{ $mobile }}</p>
                    <p class="card-text"><strong>Address : </strong>
                    {{ $care_of }}
                    @php 
                        echo $address->house . ",\n";
                        echo $address->loc . ",\n";
                        echo $address->landmark . ",\n";
                        echo $address->street . ",\n";
                        echo $address->vtc . ",\n";
                        echo $address->subdist . ",\n";
                        echo $address->dist . ",\n";
                        echo $address->state . ",\n";
                        echo $address->country;
                    @endphp
                    {{ $zip }}
                    </p>
                </div>
            </div>

        </div>

    </div>

<!--------------------------------------------- ekyc Aadhar verify --------------------------------->

{{--@php Session()->put('step', 9); @endphp --}}

@endif



@if(Session::has('step') && Session::get('step') == 9)

<!--------------------------------------------- After aadhar preview info --------------------------------->    

<div id="preview-info">

    @php 
        $user = DB::table('users')->where('id', Session::get('temp_user_id'))
            ->get(['plan_id','installment_amount','name','email','phone','ulp_id'])->first();

        $user_detail = DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))
            ->get(['nominee_name','nominee_phone','nominee_dob','nominee_address','nominee_relation','flat_no','street','locality','state','city','pincode','dob'])->first();

        $plan_name = DB::table('plans')->where('id', $user->plan_id)->value('name');
    @endphp
 
    <div class="p-3 mb-2 text-white" style="background-color:#c0af78;">
        <h5> Preview Info </h5>
    </div>

    <div class="row d-flex">

        <div class="col-md-6">

            <div class="card col-md-12 my-5 mx-2" style="width: 40rem;">
                <div class="card-header">
                  Plan Details
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Plan Type : </strong>{{ $plan_name }}</p>
                    <p class="card-text"><strong>Installment Amount (in Rs) : </strong>{{ $user->installment_amount}}</p>
                </div>
              </div>

              <div class="card col-md-12 my-5 mx-2" style="width: 40rem;">
                <div class="card-header">
                  Verification Details
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>eKYC Status : </strong>Completed</p>
                    <p class="card-text"><strong>eSign Status : </strong>Not Started</p>
                </div>
              </div>

        </div>

        <div class="col-md-6">

            <div class="card col-md-12 my-5 mx-2" style="width: 39rem;">
                <div class="card-header">
                  Customer Details
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Name : </strong>{{ $user->name }}</p>
                    <p class="card-text"><strong>Address : </strong>
                    @php 
                        echo $user_detail->flat_no . ",\n";
                        echo $user_detail->street . ",\n";
                        echo $user_detail->locality . ",\n";
                        echo $user_detail->city . ",\n";
                        echo $user_detail->state . ",\n";
                        echo $user_detail->pincode;
                    @endphp
                    </p>
                    <p class="card-text"><strong>Email : </strong>{{ $user->email }}</p>
                    <p class="card-text"><strong>Birthday : </strong>{{ date('d/m/Y', strtotime($user_detail->dob)) }}</p>
                    <p class="card-text"><strong>Mobile : </strong>{{ $user->phone }}</p>
                    <p class="card-text"><strong>ULP ID : </strong>{{ $user->ulp_id }}</p>
                    <p class="card-text"><strong>Nominee Name : </strong>{{ !empty($user_detail->nominee_name) ? $user_detail->nominee_name : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee Phone No : </strong>{{ !empty($user_detail->nominee_phone) ? $user_detail->nominee_phone : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee DOB : </strong>{{ !empty($user_detail->nominee_dob) ? date('d/m/Y', strtotime($user_detail->nominee_dob)) : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee Address : </strong>{{ !empty($user_detail->nominee_address) ? $user_detail->nominee_address : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee Relation : </strong>{{ !empty($user_detail->nominee_relation) ? $user_detail->nominee_relation : 'NA' }}</p>
                </div>
              </div>


        </div>


    </div>

    <div class="p-3 mb-2 text-white" style="background-color:#c0af78;">
        <h5> eSign Process </h5>
    </div>

    <div>
        <div class="steps-title mx-2 my-2">
            <span style="color: var(--primary-text); font-size: var(--primary-font-size-heading);">Terms and Conditions
            </span><br /><label style="color: var(--ternary-text); font-size: var(--tertiary-font-size); padding: 5px;"><br />
                You are about to be redirected to www.xyz.com, a third party website. The information you provide on the third party website is subject to the terms and conditions, privacy policies and practices of the third party website and we are not responsible for the security and privacy of any information that you may provide on the third party website. </label><br />
        </div>
    </div>

    <form id="ekyc-verify" action="{{ url(route('account.create', ['param' =>'esign-varification'])) }}" method="post">
        @csrf

        <div class="form-group mt-2">
            <input type="checkbox" name="accept_term" id="agree" value="yes" required/>
            <label for="agree">I accept <a href="{{ url(route('terms')) }}">“Terms and conditions”</a> of Motiwala &
                Sons Golden Harvest.</label>
        </div>


        <div class="form-group">
            <div class="buttonclass1 mt60">
                <button type="submit">Proceed <i class="las la-arrow-right"></i></button>
            </div>
        </div>

    </form>

</div>

<!--------------------------------------------- After aadhar preview info --------------------------------->

@endif




@if(Session::has('step') && Session::get('step') == 10)

<!--------------------------------------------- eSign Aadhar verify --------------------------------->

    <div id="ekyc">

        <div class="row">
            <form class="col-md-5" id="aadhar-verify-request-otp" action="{{ url(route('account.create', ['param' =>'esign-aadhar-verify-request-otp'])) }}" method="post">
                @csrf

                <div class="d-flex">
                    <div class="form-group mt-4 adhar_field">
                        <label class="pb-3">Aadhaar *</label>
                        <input type="text" class="form-control" name="aadhar" pattern="[0-9]+" minlength="12"
                        maxlength="12" placeholder="Please Enter Aadhar No" required/>
                    </div>

                </div>

                <div class="form-group">
                    <div class="buttonclass1 mt60">
                        <button type="submit">Verify <i class="las la-arrow-right"></i></button>
                    </div>
                </div>

            </form>

        </div>

    </div>

<!--------------------------------------------- eSign Aadhar verify --------------------------------->

@endif


@if(Session::has('step') && Session::get('step') == 11)

<!--------------------------------------------- eSign Aadhar verify --------------------------------->

    <div id="ekyc-aadhar-otp-verify">

        <div class="row">
            <form class="col-md-5" id="aadhar-otp-verify" action="{{ url(route('account.create', ['param' =>'eSign-aadhar-otp-verify'])) }}" method="post">
                @csrf

                <div class="d-flex">
                    <div class="form-group mt-4 adhar_field">
                        <label class="pb-3">Verify OTP *</label>
                        <input type="text" class="form-control" name="otp" pattern="[0-9]+" minlength="6"
                        maxlength="6" placeholder="Please Enter OTP" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="buttonclass1 mt60">
                        <button type="submit">Submit <i class="las la-arrow-right"></i></button>
                    </div>
                </div>

            </form>

        </div>

    </div>

<!--------------------------------------------- eSign Aadhar verify --------------------------------->

@endif


@if(Session::has('step') && Session::get('step') == 12)

<!--------------------------------------------- After esign preview info --------------------------------->    

<div id="last-preview-info">

    @php 
        $user = DB::table('users')->where('id', Session::get('temp_user_id'))
            ->get(['plan_id','installment_amount','name','email','phone','ulp_id'])->first();

        $user_detail = DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))
            ->get(['nominee_name','nominee_phone','nominee_dob','nominee_address','nominee_relation','flat_no','street','locality','state','city','pincode','dob'])->first();

        $plan_name = DB::table('plans')->where('id', $user->plan_id)->value('name');
    @endphp
 
    <div class="p-3 mb-2 text-white" style="background-color:#c0af78;">
        <h5> Preview Info </h5>
    </div>

    <div class="row d-flex">

        <div class="col-md-6">

            <div class="card col-md-12 my-5 mx-2" style="width: 40rem;">
                <div class="card-header">
                  Plan Details
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Plan Type : </strong>{{ $plan_name }}</p>
                    <p class="card-text"><strong>Installment Amount (in Rs) : </strong>{{ $user->installment_amount}}</p>
                </div>
              </div>

              <div class="card col-md-12 my-5 mx-2" style="width: 40rem;">
                <div class="card-header">
                  Verification Details
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>eKYC Status : </strong>Completed</p>
                    <p class="card-text"><strong>eSign Status : </strong>Completed</p>
                </div>
              </div>

        </div>

        <div class="col-md-6">

            <div class="card col-md-12 my-5 mx-2" style="width: 39rem;">
                <div class="card-header">
                  Customer Details
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Name : </strong>{{ $user->name }}</p>
                    <p class="card-text"><strong>Address : </strong>
                    @php 
                        echo $user_detail->flat_no . ",\n";
                        echo $user_detail->street . ",\n";
                        echo $user_detail->locality . ",\n";
                        echo $user_detail->city . ",\n";
                        echo $user_detail->state . ",\n";
                        echo $user_detail->pincode;
                    @endphp
                    </p>
                    <p class="card-text"><strong>Email : </strong>{{ $user->email }}</p>
                    <p class="card-text"><strong>Birthday : </strong>{{ date('d/m/Y', strtotime($user_detail->dob)) }}</p>
                    <p class="card-text"><strong>Mobile : </strong>{{ $user->phone }}</p>
                    <p class="card-text"><strong>ULP ID : </strong>{{ $user->ulp_id }}</p>
                    <p class="card-text"><strong>Nominee Name : </strong>{{ !empty($user_detail->nominee_name) ? $user_detail->nominee_name : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee Phone No : </strong>{{ !empty($user_detail->nominee_phone) ? $user_detail->nominee_phone : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee DOB : </strong>{{ !empty($user_detail->nominee_dob) ? date('d/m/Y', strtotime($user_detail->nominee_dob)) : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee Address : </strong>{{ !empty($user_detail->nominee_address) ? $user_detail->nominee_address : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee Relation : </strong>{{ !empty($user_detail->nominee_relation) ? $user_detail->nominee_relation : 'NA' }}</p>
                </div>
              </div>


        </div>


    </div>

    <div class="p-3 mb-2 text-white" style="background-color:#c0af78;">
        <h5> Payment Details </h5>
    </div>

    <div>
    </div>

    <form id="payment-gateway" action="{{ url(route('account.create', ['param' =>'payment-gateway'])) }}" method="post">
        @csrf

        <div class="form-group">
            <div class="buttonclass1 mt60">
                <button type="submit">Proceed Payment <i class="las la-arrow-right"></i></button>
            </div>
        </div>

    </form>

</div>

<!--------------------------------------------- After esign preview info --------------------------------->

@endif


@if(Session::has('payment') && Session::get('payment') == 1)

<!--------------------------------------------- After Payment preview info --------------------------------->    

<div id="last-preview-info">

    @php 

        $user = DB::table('users')->where('id', Session::get('temp_user_id'))
            ->get(['plan_id','installment_amount','name','email','phone','ulp_id'])->first();

        $user_detail = DB::table('userdetails')->where('user_id', Session::get('temp_user_id'))
            ->get(['nominee_name','nominee_phone','nominee_dob','nominee_address','nominee_relation','flat_no','street','locality','state','city','pincode','dob'])->first();

        $plan_name = DB::table('plans')->where('id', $user->plan_id)->value('name');
    @endphp
 
    <div class="p-3 mb-2 text-white" style="background-color:#c0af78;">
        <h5> Preview Info </h5>
    </div>

    <div class="row d-flex">

        <div class="col-md-6">

            <div class="card col-md-12 my-5 mx-2" style="width: 40rem;">
                <div class="card-header">
                  Plan Details
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Plan Type : </strong>{{ $plan_name }}</p>
                    <p class="card-text"><strong>Installment Amount (in Rs) : </strong>{{ $user->installment_amount}}</p>
                </div>
              </div>

              <div class="card col-md-12 my-5 mx-2" style="width: 40rem;">
                <div class="card-header">
                  Verification Details
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>eKYC Status : </strong>Completed</p>
                    <p class="card-text"><strong>eSign Status : </strong>Completed</p>

                    <p class="card-text"><strong>Payment Status : </strong>Completed</p>
                </div>
              </div>

        </div>

        <div class="col-md-6">

            <div class="card col-md-12 my-5 mx-2" style="width: 39rem;">
                <div class="card-header">
                  Customer Details
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Name : </strong>{{ $user->name }}</p>
                    <p class="card-text"><strong>Address : </strong>
                    @php 
                        echo $user_detail->flat_no . ",\n";
                        echo $user_detail->street . ",\n";
                        echo $user_detail->locality . ",\n";
                        echo $user_detail->city . ",\n";
                        echo $user_detail->state . ",\n";
                        echo $user_detail->pincode;
                    @endphp
                    </p>
                    <p class="card-text"><strong>Email : </strong>{{ $user->email }}</p>
                    <p class="card-text"><strong>Birthday : </strong>{{ date('d/m/Y', strtotime($user_detail->dob)) }}</p>
                    <p class="card-text"><strong>Mobile : </strong>{{ $user->phone }}</p>
                    <p class="card-text"><strong>ULP ID : </strong>{{ $user->ulp_id }}</p>
                    <p class="card-text"><strong>Nominee Name : </strong>{{ !empty($user_detail->nominee_name) ? $user_detail->nominee_name : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee Phone No : </strong>{{ !empty($user_detail->nominee_phone) ? $user_detail->nominee_phone : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee DOB : </strong>{{ !empty($user_detail->nominee_dob) ? date('d/m/Y', strtotime($user_detail->nominee_dob)) : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee Address : </strong>{{ !empty($user_detail->nominee_address) ? $user_detail->nominee_address : 'NA' }}</p>
                    <p class="card-text"><strong>Nominee Relation : </strong>{{ !empty($user_detail->nominee_relation) ? $user_detail->nominee_relation : 'NA' }}</p>
                </div>
              </div>


        </div>


    </div>

    <div class="p-3 mb-2 text-white" style="background-color:#c0af78;">
        <h5> Login </h5>
    </div>

    <div>
    </div>


    <div class="form-group">
        <div class="buttonclass1 mt60">
            <button id="login_page">Proceed to login <i class="las la-arrow-right"></i></button>
        </div>
    </div>



</div>




<script>

    var LoginBtn = document.getElementById("login_page");
   
    // Add event listener to the button
    LoginBtn.addEventListener("click", function() {

        // Create an XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Specify the URL to hit using the route name
        var url = '{{ route("redirect-login") }}';

        // Send a GET request to the URL asynchronously
        xhr.open('GET', url, true);
        xhr.send();

        window.location.href = "{{ url(route('index')) }}/#sign";

    });


</script>

<!--------------------------------------------- After Payment preview info --------------------------------->

@endif


