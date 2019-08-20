@extends('layouts.master')

@section('page_content')
<section>
  <div class="block no-padding  gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner2">
            <div class="inner-title2">
              <h3>Solutions</h3>
              <span>Keep up to date with the latest news</span>
            </div>
            <div class="page-breacrumbs">
              <ul class="breadcrumbs">
                <li><a href="#" title="">Home</a></li>
                <li><a href="#" title="">Pages</a></li>
                <li><a href="#" title="">Solutions</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('content')
<section>
<div class="container">
    <div class="card" style="margin-top: 10px;margin-bottom: 10px;">@include('flash::message')
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
      <div class="card-body">
        <form method='POST' class="form-group" action="{{route('storePost')}}">
          @csrf
          <input class="form-control" name='title' id='title' placeholder="Title"  style="margin-bottom: 10px;"/>
          <textarea class="form-control" name='post' id='post' placeholder="Write the post..." style="min-height: 50px;"></textarea>
          <button style="background-color: #4d5891;color: white;height:40px;width: 100px;margin: 5px;" class="form-control" type='submit'> Submit </button>
        </form>
      </div>
    </div>
  @foreach( $posts as $post )
	<div class="card" style="margin-top: 10px;margin-bottom: 10px;">
	    <div class="card-body">
	        <div class="row">
        	    <div class="col-md-2">
                  <img src="{{asset('company_logos/'.$post->company->logo)}}" class="img-fluid img-thumbnail" alt="img" style="max-width:100%;">
        	    </div>
        	    <div class="col-md-10">
        	        <p>
                      <h3><a href="{{route('post-details', $post->id)}}" title="{{$post->title}}">{{$post->title}}</a></h3>
        	            <a class="float-left" href="{{route('company.detail',$post->company->slug)}}"><strong> - {!! $post->company->name !!}</strong></a>
                      <p class="text-secondary text-right">On , {{$post->created_at->format('j F Y')}} </p>
                      <!-- <a class="float-left" href="{{route('post-details', $post->id)}}"><strong>{!! $post->company->name !!}</strong></a> -->
        	            <!-- <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                      <span class="float-right"><i class="text-warning fa fa-star"></i></span>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span> -->

        	       </p>
        	       <div class="clearfix"></div>
        	          <a href="{{route('post-details', $post->id)}}">
                      <p style="text-align: justify;line-height: 25px;font-size: 15px;">{{str_limit(strip_tags($post->statement), 540, '...')}} </p>
                    <a/>

                  <div class="card" style="border: 0px;display:none;" id="comment_box_{{$post->id}}">
                    <div class="card-body">
                      <form method='POST' class="form-group" action="{{route('storeComments',$post->id)}}">
                        @csrf
                        <textarea class="form-control" name='comment_{{$post->id}}' id='comment_{{$post->id}}' placeholder="Write comment..." style="min-height: 50px;"></textarea>
                        <button style="background-color: #4d5891;color: white;height:40px;width:100px;margin: 5px;" class="form-control" type='submit'> Send </button>
                      </form>
                    </div>
                 </div>

        	        <p>
                      <a class="float-right btn btn-outline-primary ml-2" onclick="checkUser('{{$post->id}}');"> <i class="fa fa-reply"></i> Reply</a>
                      <!-- <a class="float-right btn text-white btn-danger" onclick="myFunction('{{$post->id}}')" id="like-btn_{{$post->id}}">Like </a> -->
        	       </p>
        	    </div>
	        </div>
	    </div>
	</div>
  @endforeach
</div>
<div class="container">
  <div class="row">
    <div class="col-md-10"> </div>
       <div class="col-md-2">
<?php echo $posts->links(); ?>
      </div>
  </div>
</div>

</section>
@endsection
