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
  <div class="block ">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card" style="margin-top: 10px;margin-bottom: 10px;">@include('flash::message')
        	    <div class="card-body">
        	        <div class="row">
                	    <div class="col-md-2">
                          <img src="{{asset('company_logos/'.$post->company->logo)}}" class="img-fluid img-thumbnail" alt="img" style="max-width:100%;">
                	        <!-- <p class="text-secondary text-center">Posted On : {{$post->created_at->format('j F Y')}} </p> -->
                	    </div>
                	    <div class="col-md-10">
                	        <p>
                	            <!-- <a class="float-left" href="{{route('company.detail',$post->company->slug)}}"><strong>{!! $post->company->name !!}</strong></a> -->
                              <h3><a href="{{route('post-details', $post->id)}}" title="{{$post->title}}">{{$post->title}}</a></h3>
                	            <a class="float-left" href="{{route('company.detail',$post->company->slug)}}"><strong> - {!! $post->company->name !!}</strong></a>
                              <p class="text-secondary text-right">On , {{$post->created_at->format('j F Y')}} </p>
                	            <!-- <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                              <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                	            <span class="float-right"><i class="text-warning fa fa-star"></i></span> -->
                	       </p>
                	       <div class="clearfix"></div>
                	        <p style="text-align: justify;line-height: 25px;font-size: 15px;">
                            {!! $post->statement !!}
                          </p>
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
                             <!-- <a class="float-right btn btn-outline-primary ml-2" onclick="UserLikes('{{$post->id}}',0)" id="like-btn_{{$post->id}}_0"></i> Like </a> -->
                             @if( ($post->checkIfLiked($post->id,0)) == 1)
                             <a class="float-right btn text-white btn-danger" onclick="UserLikes('{{$post->id}}',0)" id="like-btn_{{$post->id}}_0"> Unlike </a>
                             @else
                             <a class="float-right btn btn-outline-primary ml-2" onclick="UserLikes('{{$post->id}}',0)" id="like-btn_{{$post->id}}_0"> Like </a>
                             @endif
                         </p>
                	    </div>
        	        </div>
                  <div class="row">
                	    <div class="col-md-2">

                	    </div>
                	    <div class="col-md-10">
                        @foreach( $comments as $comment)
                        <div class="card" style="margin-top: 10px;margin-bottom: 10px;">
                          <div class="card card-body">
                            <div class="row">
                                <div class="col-md-2">
                          	        <img src="{{asset($comment->getImage($comment->user_id,$comment->guard))}}" class="img-fluid img-thumbnail" alt="img" style="max-width:100%;"/>
                          	        <!-- <p class="text-secondary text-center">Posted On : {{$comment->created_at}}</p> -->
                          	    </div>
                                <?php $count = \App\Comment::where('post_id',$post->id)->where('parent_id',$comment->id)->get()->count();?>
                                <div class="col-md-10">
                                    <a class="float-left"><strong>{{ $comment->getName($comment->user_id,$comment->guard) }}</strong></a>
                                    <p class="text-secondary text-right">On , {{$comment->created_at->format('j F Y')}} </p>
                                    <p id="edit_comment_{{$comment->id}}" style="text-align: justify;line-height: 25px;font-size: 15px;"  {{($comment->getUser($comment->user_id,$comment->guard) === 1)? 'contentEditable=true':'contentEditable=false'}}  >
                                      {!! $comment->comment !!}
                                    </p>
                                    <div class="card" style="border: 0px;display:none;" id="comment_box_{{$comment->id}}">
                                      <div class="card-body">
                                        <form method='POST' class="form-group" action="{{route('storeCommentsOnComments',$comment->id)}}">
                                          @csrf
                                          <input name='post_id' type='hidden' value='{{$post->id}}' />
                                          <textarea class="form-control" name='comment_{{$comment->id}}' id='comment_{{$comment->id}}' placeholder="Write comment..." style="min-height: 50px;"></textarea>
                                          <button style="background-color: #4d5891;color: white;height:40px;width:100px;margin: 5px;" class="form-control" type='submit'> Send </button>
                                        </form>
                                      </div>
                                   </div>
                                    <p>
                                        <a class="float-right btn btn-outline-primary ml-2" onclick="checkCommentingUser('{{$comment->id}}');"> <i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
                                        @if( ($comment->checkIfLiked($post->id,$comment->id)) == 1)
                                        <a class="float-right btn text-white btn-danger" onclick="UserLikes('{{$post->id}}',{{$comment->id}})" id="like-btn_{{$post->id}}_{{$comment->id}}"> Unlike </a>
                                        @else
                                        <a class="float-right btn btn-outline-primary ml-2" onclick="UserLikes('{{$post->id}}',{{$comment->id}})" id="like-btn_{{$post->id}}_{{$comment->id}}"> Like </a>
                                        @endif
                                        <a class="float-right btn btn-outline-primary ml-2" data-toggle="collapse" href="#comment_box{{$comment->id}}" role="button" aria-expanded="false" aria-controls="comment_box{{$comment->id}}"> <i class="fa fa-comment" aria-hidden="true"></i>{{$count}} Comments</a>
                                        @if( ($comment->getUser($comment->user_id,$comment->guard)) == 1)
                                        <a class="float-right btn btn-outline-primary ml-2" onclick="SaveComment('{{$comment->id}}')"> Save </a>
                                        @endif
                                  <!-- <a class="btn btn-info btn-circle text-uppercase" onclick="checkCommentingUser('{{$comment->id}}');"> <i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
                                        <a class="btn btn-info btn-circle text-uppercase"> <i class="fa fa-thumbs-up" aria-hidden="true"></i>Like</a>
                                        <a class="btn btn-info btn-circle text-uppercase"> <i class="fa fa-comment" aria-hidden="true"></i>Comments</a> -->
                                     </p>
                                </div>
                            </div>
                            <div class="collapse" id="comment_box{{$comment->id}}">
                              <?php $Comments = \App\Comment::where('post_id',$post->id)->where('parent_id',$comment->id)->get();?>
                              @foreach ($Comments as $Comment)
                              <div class="card" style="margin-top: 10px;margin-bottom: 10px;">
                                <div class="card card-body">
                                  <div class="row">
                                      <div class="col-md-2">
                                         <img src="{{asset($Comment->getImage($Comment->user_id,$Comment->guard))}}" class="img-fluid img-thumbnail" alt="img" style="max-width:100%;"/>
                                     </div>
                                      <div class="col-md-10">
                                          <a class="float-left"><strong>{{ $Comment->getName($Comment->user_id,$Comment->guard)}}</strong></a>
                                          <p class="text-secondary text-right">On , {{$comment->created_at->format('j F Y')}} </p>
                                          <p id="edit_comment_{{$Comment->id}}" style="text-align: justify;line-height: 25px;font-size: 15px;"  {{($Comment->getUser($Comment->user_id,$Comment->guard) === 1)? 'contentEditable=true':'contentEditable=false'}}  >
                                            {!! $Comment->comment !!}
                                          </p>
                                          <p>
                                            @if( ($Comment->checkIfLiked($post->id,$comment->id)) == 1)
                                            <a class="float-right btn text-white btn-danger" onclick="UserLikes('{{$post->id}}',{{$Comment->id}})" id="like-btn_{{$post->id}}_{{$Comment->id}}"> Unlike </a>
                                            @else
                                            <a class="float-right btn btn-outline-primary ml-2" onclick="UserLikes('{{$post->id}}',{{$Comment->id}})" id="like-btn_{{$post->id}}_{{$Comment->id}}"> Like </a>
                                            @endif

                                            @if( ($Comment->getUser($Comment->user_id,$Comment->guard)) == 1)
                                            <a class="float-right btn btn-outline-primary ml-2" onclick="SaveComment('{{$Comment->id}}')"> Save </a>
                                            @endif
                                          </p>
                                      </div>
                                  </div>

                                </div>
                              </div>
                             @endforeach
                            </div>
                          </div>
                        </div>
                        @endforeach
                	    </div>
        	        </div>
        	    </div>
        	</div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
