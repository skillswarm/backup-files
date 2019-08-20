@extends('layouts.candidate')

@section('content')
<div class="block less-top">
  <div class="container" style="margin-top: 20px;">
        <div class="row"> @include('includes.user_dashboard_menu')
            <div class="col-md-9 col-sm-8">
                <div class="myads">
                    <h3>{{__('My Recomendations')}}</h3>
                    <ul class="searchList">
                        <!-- job start -->
                        @if(isset($recommendations) && count($recommendations))
                        @foreach($recommendations as $recommendation)

                        @php
                        $style = (!(bool)$recommendation->is_seen)? 'border: 2px solid #FFB233;':'';
                        @endphp

                        <li style="{{$style}}">
                                <div class="row">
                                  <div class="col-md-12">
                                    <h4><a>Recommendation By : {{ $recommendation->mentor->first_name}}</a></h4>
                                    <input type='hidden' id="mentor_id" value='{{ $recommendation->mentor->id }}'
                                    <p style="text-align:justify;">{!! $recommendation->message !!}</p>
                                  </div>
                                </div>
                                <div style="height: 10px;"></div>
                                @if(isset($recommendation->course->title))
                                <div class="row">
                                    <div class="col-md-8">
                                        <h6><a>{{ $recommendation->course->title}}</a></h6>
                                        <p style="text-align:justify;">{!! $recommendation->course->description !!}</p>
                                    </div>
                                    <div class="col-md-4 text-right">
                                      <div class="companyName" style="margin-left:1%;font-weight: 600;color: #00a8ff;">{{__('Duration : ')}}{{$recommendation->course->duration}}</div>
                                      <div class="companyName" style="margin-left:1%;font-weight: 600;color: #00a8ff;">{{__('Fees  : Rs ')}}{{$recommendation->course->fees}}</div>
                                    </div>
                                </div>
                                @endif
                                <div class="row">
                                  <div class="col-md-12">
                                    <a class="accordion"><i class="fa fa-reply"></i> Reply </a>
                                    <div class="panel" style="display:none;"><br>
                                      <input class="form-control" id="reply_{{$recommendation->id}}"  value="{{(isset($recommendation->reply->message)) ? $recommendation->reply->message :''}}"/>
                                      <button style="background-color: #4d5891;color: white;height: 30px;width: 100px;margin: 5px;" name="sendReply[]" data-id="{{$recommendation->id}}"> Send </button>
                                        <span id="error_{{$recommendation->id}}"></span>
                                    </div>
                                  </div>
                                </div>
                        </li>
                        <!-- job end -->
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('scripts')
    <script type="text/javascript">
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }

    $("button").click(function(){
        var recommendation_id = $(this).attr('data-id');
        var mentor_id = $("#mentor_id").val();
        var reply = $("#reply_"+recommendation_id).val();

        $.ajax({
               type: "POST",
               url: "{{ route('my.messages.reply') }}",
               data:{ recommendation_id : recommendation_id ,reply : reply, mentor_id:mentor_id } ,
               headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
               success: function(data)
               {
                 console.log(data);
                 $("#error_"+recommendation_id).html(data.msg);
                 $("#error_"+recommendation_id).css('color','red');
                 $("#error_"+recommendation_id).fadeOut(1000);
               }
             });
    });

    </script>
    @endpush
