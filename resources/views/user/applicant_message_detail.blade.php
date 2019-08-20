@extends('layouts.candidate')

@section('content')
<div class="block less-top">
  <div class="container" style="margin-top: 20px;">
        <div class="row"> @include('includes.user_dashboard_menu')
            <div class="col-md-9 col-sm-8">
                <div class="myads">
                    <h3>{{__('My Messages')}}</h3>
                    <div class="panel-group">
                        <!-- job start -->
                        @if(isset($message))
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <p class="text-left">
                                <table>
                                    <tr>
                                        <td>{{__('Dated')}} : </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$message->created_at->format('M d,Y')}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{__('From')}} : </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$message->from_name}} - <a href="{{url('company/'.$message->company->slug.'#contact_company')}}" target="_blank">{{$message->from_email}}</a></td>
                                    </tr>
                                    <tr>
                                        <td>{{__('Subject')}} : </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$message->subject}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{__('Message')}} : </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>{{$message->message_txt}}</td>
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
