<form id="area_practice_form" action="{{url(route('contact.create'))}}" method="post"
      enctype="multipart/form-data">
    @csrf
    <h5 class="service_last_form_heading text-center">
      Get Consult Today 
    </h5>
    <input type="hidden" name="section" value="Area of Practice Form" data-aos-once="true" data-aos="fade-up" />
    <input type="hidden" name="url" value="{{ url()->current() }}" data-aos-once="true" data-aos="fade-up" />
    <div class="mb-3" >
      <input type="text" name="name" placeholder="Name" required/>
    </div>
    <div class="mb-3" >
      <input type="email" name="email" placeholder="Email" required/>
    </div>
    <div class="mb-3" >
      <input type="tel" name="phone" placeholder="Phone" required/>
    </div>
    <textarea name="description" id=""  rows="3" placeholder="How we can help"></textarea>
   
    <button type="submit" class="mt-2" >SEND</button>
</form>