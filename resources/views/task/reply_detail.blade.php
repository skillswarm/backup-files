@extends('layouts.employer')

@section('content')
<div class="block less-top">
  <div class="container" style="margin-top: 20px;">
        <div class="row">@include('includes.company_dashboard_menu')
            <div class="col-md-9 col-sm-8">
                <div class="myads">
                    <h3>{{__('Title : ')}}{{$reply->task->title}}</h3>
                    <div class="panel-group">
                        <!-- job start -->
                        @if(isset($reply))
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <p class="text-left">
                                <table>
                                    <tr>
                                        <td>{{__('Dated :')}}  </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$reply->created_at->format('M d,Y')}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{__('From :')}}  </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$reply->user_name}} - <a href="{{url('user-profile/'.$reply->user_id.'#contact_applicant')}}" target="_blank">{{$reply->user_email}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>{{__('Subject :')}}  </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$reply->subject}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{__('Message: ')}}  </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$reply->reply}}</td>
                                    </tr>
                                </table>
                                </p>
                            </div>
                        </div>
                        <!-- job end -->
                        @endif </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
