@foreach ($blog as $row)

<div class="col-lg-4 col-md-6">
    <a href="{{ url(route('blog.detail', ['category' =>'blog','slug' => strtolower(str_replace(' ', '-',$row->slug))] )) }}" class="blog_image_card_wrapper" >
    <div  class="blog_image_card" data-aos="fade-up" data-aos-once="true">
        <img src="{{ asset('storage/' . $row->main_image) }}" alt="{{ $row->alt_main_image }}" class="blog_img" />
        <div class="d-flex align-items-center justify-content-center">
            <button>
                <p>
                    <span><img src="assets/frontend/images/author.png" alt="" /></span>

                    @php
                    //$author = json_decode($row->user_id, true);
                    //$count = count($author);
                    @endphp

                    <span>

                        {{--@php $i = 1; @endphp
                        @foreach ($author as $details)--}}
                        @php 
                        //$author_name = DB::table('users')->where('id', $details)->first();
                        $author_name = DB::table('users')->where('id', $row->user_id)->first();
                        @endphp
                        {{ $author_name->name }}
                        {{--@if($count > $i), @endif
                        @php $i++; @endphp
                        @endforeach--}}

                    </span>
                </p>
                <p>
                    <span><img src="assets/frontend/images/calender.png" alt="" /></span>
                    <span>{{ $row->created_at->format('F j, Y') }}</span>
                </p>
            </button>
        </div>

        <div class="blog_card_content" data-aos="fade-up" data-aos-once="true">
            <h3>{{ $row->title }}</h3>
            <p>
                {{ $row->short_description }}
            </p>
            <hr />
            <div class="blog_link_icon d-flex align-items-center justify-content-between">
                <span
                    >Learn
                    More <img src="assets/frontend/images/right.png" alt="" />
                </span>
              
            </div>
        </div>
    </div>
    </a>
</div>

@endforeach