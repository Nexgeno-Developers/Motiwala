@extends(Session::has('user_id') ? 'frontend.layouts.app2' : 'frontend.layouts.app')

@section('page.title', 'Motiwala')

@section('page.description', 'Motiwala')

@section('page.type', 'website')

@section('page.content')



    <!-- -------------------- career banner start ---------------- -->

    <section class="inner_page_banner">
        <img src="/assets/frontend/images/innwe_imagebanner.jpg" class="d-block w-100" alt="...">
    </section>


    <main class="main">
        <section class="openaccount pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" id="page-heading">
                        <h4 class="title_heading text-center black_color pb-3 heading_font">Open New Account</h4>
                    </div>

                    <div class="col-md-12" id="page-contain">
                        <p>Hello, <br> Warm greetings from Motiwala Jewels Gold and Diamonds Pvt Ltd!</p>
                        
                        <p>   We extend our heartfelt gratitude for your interest in initiating a new account with
                           We extend our heartfelt gratitude for your interest in initiating a new account with
                            Motiwala Jewels Golden Treasurer Purchase Plan. Your keenness is truly appreciated.
                            Kindly proceed with the following steps to help us expedite your request.
                        </p>
                            <p>Thank you once again for considering Motiwala Jewels Gold and Diamonds Pvt Ltd for 
                            your Gold and Diamonds Jewellery needs.
                        </p>
                    </div>

                    <div class="col-md-12">

                        @include('frontend.pages.online_enrollment.reg_form')


                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@section('component.scripts')
    <script>
        /*
        window.addEventListener('beforeunload', function() {

            // Create an XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Specify the URL to hit using the route name
            var url = '{{ route("clear-data") }}';

            // Send a GET request to the URL asynchronously
            xhr.open('GET', url, true);
            xhr.send();

        });
        */

        /*------------------- form submit ajax --------------------*/

        function ajax_form_submit(event, form){

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
                        if(response.response_message.response == 'success') {
                            
                            toastr.success(response.response_message.message, response.response_message.response);

                            setTimeout(function() {
                                location.reload();
                            }, 1500);

                        }else{
                            $(form).find('button[type="submit"]').html(button);
                            $(form).find('button[type="submit"]').css('pointer-events', 'inherit');

                            toastr.error(response.response_message.message, response.response_message.response);


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
                toastr.error('Please fill the Mandatory fields ' + errorMessage, 'Error');
                form.find('button[type="submit"]').html(button);
                form.find('button[type="submit"]').css('pointer-events', 'inherit');
            }

        }


    /*------------------- form submit ajax --------------------*/


    
    /*--------------------- add Phone ------------------*/

        initValidate('#phone-verification');

        $('#add-phone form').on('submit', function(event){

            var form = $(this);
            ajax_form_submit(event, form);
        
        });

    /*--------------------- add Phone ------------------*/ 
    
    /*--------------------- verify-otp------------------*/ 

        initValidate('#verify-otp');

        $('#otp form').on('submit', function(event){

            var form = $(this);
            ajax_form_submit(event, form);

        });
    /*--------------------- verify-otp------------------*/    

    /*--------------------- Resend-otp------------------*/    

        $(document).ready(function(){
            $('#resendOTPButton').click(function(e){
                e.preventDefault();

                var csrfToken = '{{ csrf_token() }}';

                $.ajax({
                    url: "{{ route('account.create', ['param' =>'resend-otp']) }}",
                    type: "Post",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        toastr.success(response.response_message.message, response.response_message.response);
                    },
                    error: function(xhr, status, error) {
                        toastr.error(response.response_message.message, response.response_message.response);
                    }
                });
            });
        });

    /*--------------------- Resend-otp------------------*/  
    
    /*--------------------- customer info ------------------*/ 

    initValidate('#customer-info');

    $('#customer-detail form').on('submit', function(event){

        var form = $(this);
        ajax_form_submit(event, form);

    });

    /*--------------------- customer info ------------------*/ 

    /*--------------------- plan info ------------------*/ 

    initValidate('#plan-info');

    $('#plan-detail form').on('submit', function(event){

        var form = $(this);
        ajax_form_submit(event, form);

    });

    /*--------------------- Plan info ------------------*/ 

    /*--------------------- minimum amount ---------------*/

    document.addEventListener('DOMContentLoaded', function() {
        function toggleInstallmentAmount() {
            var selectedOption = document.getElementById('plan_id').querySelector('option:checked');
            var minimumInstallmentAmount = selectedOption.getAttribute('data-minium');
            var installmentAmountElement = document.getElementById('installmentAmount');

            if (selectedOption.value === '') {
                installmentAmountElement.style.display = 'none';
            } else {
                installmentAmountElement.innerHTML = 'Minimum Installment Amount: ' + minimumInstallmentAmount;
                installmentAmountElement.style.display = 'block';
            }
        }

        // Call the function when the select element changes
        document.getElementById('plan_id').addEventListener('change', toggleInstallmentAmount);

        // Call the function on page load
        toggleInstallmentAmount();
    });

    /*--------------------- minimum amount ---------------*/

    /*--------------------- ekyc verify ------------------*/ 

    initValidate('#ekyc-verify');

    $('#preview-info form').on('submit', function(event){

        var form = $(this);
        ajax_form_submit(event, form);

    });

    /*--------------------- ekyc verify ------------------*/

    /*--------------------- aadhar verify ------------------*/ 

    initValidate('#aadhar-verify-request-otp');

    $('#ekyc form').on('submit', function(event){

        var form = $(this);
        ajax_form_submit(event, form);
        
    });

    /*--------------------- aadhar verify ------------------*/

    /*--------------------- aadhar otp verify ------------------*/ 

    initValidate('#aadhar-otp-verify');

    $('#ekyc-aadhar-otp-verify form').on('submit', function(event){

        var form = $(this);
        ajax_form_submit(event, form);
        
    });

    /*--------------------- aadhar otp verify ------------------*/


    /*--------------------- Payment Gateway ------------------*/ 

        initValidate('#payment-gateway');

        $('#last-preview-info form').on('submit', function(event){

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
                        if(response.response_message.response == 'success') {
                            
                            toastr.success(response.response_message.message, response.response_message.response);

                            setTimeout(function() {
                                location.reload();
                                //window.location.href = "{{ url(route('index')) }}";
                            }, 1500);

                        }else{
                            $(form).find('button[type="submit"]').html(button);
                            $(form).find('button[type="submit"]').css('pointer-events', 'inherit');

                            toastr.error(response.response_message.message, response.response_message.response);


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
                toastr.error('Please fill the Mandatory fields' + errorMessage, 'Error');
                form.find('button[type="submit"]').html(button);
                form.find('button[type="submit"]').css('pointer-events', 'inherit');
            }

        });

    /*--------------------- Payment Gateway ------------------*/ 

    

    </script>
@endsection