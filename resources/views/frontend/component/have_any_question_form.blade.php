@php
$practice_Area = DB::table('practice_areas')->orderBy('id', 'asc')->get();
@endphp
<!----------------- Have any Question --------------------->
<form id="have_any_question_form" action="{{url(route('contact.create'))}}" method="post" enctype="multipart/form-data" data-aos="fade-up" data-aos-once="true" >
    @csrf
    <p class="contact_form_logo fs-6 fw-bolder mb-md-2 mb-1"data-aos="fade-up" data-aos-once="true">
       HAVE ANY QUESTION ?
    </p>
    <h5 class="contact_form_heading  fw-bolder mb-md-2 mb-2"data-aos="fade-up" data-aos-once="true">
       Drop Us a Line
    </h5>

    <input type="hidden" name="section" value="Have any Question Form" data-aos-once="true" data-aos="fade-up" />
    <input type="hidden" name="url" value="{{ url()->current() }}" data-aos-once="true" data-aos="fade-up" />

    <input type="text" placeholder="Name" name="name" class="form-control" data-aos="fade-up" data-aos-once="true" required/>
    <div
       class="contact_email_phone d-flex align-items-center justify-content-between gap-3 my-4"
       >
       <div>
       <input
          type="email"
          name="email"
          placeholder="Email"
          class="form-control"
          data-aos="fade-up"
          data-aos-once="true"
          required
          class="w-100"
          />
       </div>
     <div>
     <input
          type="number"
          name="phone"
          placeholder="Phone"
          class="form-control"
          data-aos="fade-up"
          data-aos-once="true"
          required
          class="w-100"
          />
     </div>
      
    </div>
    <select aria-label="Select a service" name="services" class="contact_form_select form-select mb-4 select_drp_image"data-aos="fade-up" data-aos-once="true" required>
      <option value="">Select the Service</option>
      @foreach ($practice_Area as $row)
          <option value="{{ $row->title }}">{{ $row->title }}</option>
      @endforeach
    </select>
    <textarea name="description" placeholder="Description" class="mb-3" rows="1"></textarea>
    <button type="submit" class="contact_form_button"data-aos="fade-up" data-aos-once="true">Send</button>
 </form>
 <!----------------- Have any Question --------------------->
