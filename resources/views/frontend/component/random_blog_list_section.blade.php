@php
$random_blogs = DB::table('blogs')->where('status', 1)->whereJsonContains('blog_category_ids',
'3')->inRandomOrder()->take(4)->get();
@endphp

<!-------==================== Random blog ============------------------>
@if(count($random_blogs) > 0)
    <section class="blogs blog_bg1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2 class="blog_heading fs-2 fw-bolder lh-lg text-center mb-3" data-aos="fade-up" data-aos-once="true">
                        Most Viewed Blogs
                    </h2>
                </div>
            </div>

            <div class="row">

                @foreach ($random_blogs as $row)

                <div class="col-lg-3 col-md-6 mb-lg-0 mb-3">
                    <div class="blog_box">
                        <div class="blog_img_container" data-aos="fade-up" data-aos-once="true">
                            <img src="{{ asset('storage/' . $row->main_image) }}" alt="{{ $row->alt_main_image }}"
                                class="blog_img" />
                        </div>
                        <p class="blog_title" data-aos="fade-up" data-aos-once="true">
                            {{ $row->title }}
                        </p>
                        <a href="{{ url(route('blog.detail', ['category' =>'blog','slug' => strtolower(str_replace(' ', '-',$row->slug))] )) }}"
                            class="blog_link">
                            <span>Learn More </span>
                            <img src="assets/frontend/images/right.png" alt="" />
                        </a>
                    </div>
                </div>

                @endforeach


            </div>
        </div>
    </section>
@endif
<!-------==================== Random blog ============------------------>