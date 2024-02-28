@php
$practice_Area = DB::table('practice_areas')->orderBy('id', 'asc')->get();
@endphp
<!--------=============== Ask Popup Form start ==============------------------>
<div
class="modal fade"
id="ask-modal"
tabindex="-1"
role="dialog"
aria-labelledby="modal-title"
aria-hidden="true"
>
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="d-flex justify-content-end pt-4 pe-4">
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
      ></button>
    </div>

    <div class="popup">
      <div
        class="contact_form_container d-flex align-items-center justify-content-center"
      >
      <form id="ask_popup_form" action="{{url(route('contact.create'))}}" method="post"
      enctype="multipart/form-data">
      @csrf
          <p class="contact_form_logo fs-6 fw-bolder mb-2">
            HAVE ANY QUESTION ?
          </p>
          <h4 class="contact_form_heading fs-2 fw-bolder mb-3">
          Request a Consultation
          </h4>
          <input type="hidden" name="section" value="Popup Form" data-aos-once="true" data-aos="fade-up" />
          <input type="hidden" name="url" value="{{ url()->current() }}" data-aos-once="true" data-aos="fade-up" />
          <div class="mb-3">
            <input type="text" name="name" placeholder="Name" class="form-control" required/>
          </div>
          <div
            class="contact_email_phone d-flex align-items-center gap-3 mb-3"
          >
          <div   >

            <input type="email" name="email" placeholder="Email" class="form-control" required/>
          </div>
          <div>

            <input type="number" name="phone"  placeholder="Phone" class="form-control" required/>
          </div>
          </div>

          <select class="form-select mb-3 select_drp_image" name="services" aria-label="Default select example" required/>
            <option value="">Select the Service</option>
            @foreach ($practice_Area as $row)
                <option value="{{ $row->title }}">{{ $row->title }}</option>
            @endforeach
          </select>

          <textarea name="description" id=""  rows="2"  class="mb-3" placeholder="Description"></textarea>

          <input type="hidden" name="ref_url" value="{{ url()->previous() }}" data-aos-once="true" data-aos="fade-up" />
         
          <button type="submit" class="contact_form_button">Send</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<!--------=============== Ask Popup Form start ==============------------------>
