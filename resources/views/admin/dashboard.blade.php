@extends('admin.layouts.admin')

@section('content')
    <!-- page content -->
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> {{ "Total Customer" }}</span>
            <div class="count green">{{ $customersCount }}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-address-card"></i> {{ "Active Customer" }}</span>
            <div>
                <span class="count green">{{ $active_user }}</span>
                <span class="count"></span>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user-times "></i> {{ "InActive Customer" }}</span>
            <div>
                <span class="count green">{{  $inactive_user }}</span>
                <span class="count"></span>    
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user-times "></i> {{ "To Expire Customer" }}</span>
            <div>
                <span class="count green">{{  $toExpire }}</span>
                <span class="count"></span>    
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user-times "></i> {{ "Expired Customer" }}</span>
            <div>
                <span class="count green">{{  $expired }}</span>
                <span class="count"></span>    
            </div>
        </div>
    </div>
    <h3>UpComing Birthday</h3>
    <div class="row margin-top-30">
        <div class="col-md-8 col-sm-12 col-xs-12 center-margin">
            <div class="x_content margin-top-30">
                <table class="table table-bordered">
                        <tbody>
                            @foreach($upComingBirthday as $customer)
                                <tr>
                                <th scope="row">{{$customer['name']}}</th>
                                <td>{{$customer['dob']}}</td>
                                </tr>
                                <tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
