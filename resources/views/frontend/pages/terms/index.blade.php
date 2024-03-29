    @extends('frontend.layouts.app')

@section('page.title', 'Motiwala')

@section('page.description', 'Motiwala')

@section('page.type', 'website')

@section('page.content')

<!-- -------------------- Terms  start ---------------- -->

<section class="inner_page_banner">
     <img src="/assets/frontend/images/innwe_imagebanner.jpg" class="d-block w-100" alt="...">
</section>


<!-- -------------------- privacy content  start ---------------- -->  

<main class="main">
	<section class="pt-5 terms_section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="title_heading text-center black_color pb-0 heading_font">GOLDEN HARVEST JEWELLERY PURCHASE PLAN</h4>
				   <h5 class="black_color text-center pb-4">TERMS AND CONDITIONS</h5>
                </div>

				<div class="col-md-12">
				    @php echo html_entity_decode(get_settings('terms_content')) @endphp   	
                </div>

		
		
		  </div>
		</div>
	</section>
</main>

    <!-- -------------------- privacy content  end   ---------------- -->

    @endsection
