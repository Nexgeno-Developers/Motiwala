<!---------============== Comment form start ====================---------------------->
<form id="add_comment_form" action="{{url(route('comment.create'))}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-md-12">
            <textarea name="comment" rows="4" name="message" class="form-control" placeholder="Your Comment"></textarea>
        </div>
        <input type="hidden" name="blog_id" value="{{ $detail->id }}"/>
        <input type="hidden" name="status" value="0"/>
        <div class="col-md-4 mb-3">
            <input type="text" name="name" class="form-control" placeholder="Name*" required>
        </div>
        <div class="col-md-4 mb-3 form-check">
            <input type="email" name="email" class="form-control" placeholder="Email*" required>
        </div>
        <div class="col-md-4 mb-3 form-check">
            <input type="tel" name="phone" class="form-control" placeholder="Phone No.*" required>
        </div>
        <div class="col-lg-3 col-md-5 mt-5">
            <button type="submit" class="btn content_btn-4">Post Comment</button>
        </div>
    </div>

</form>
<!---------============== Comment form end ====================---------------------->