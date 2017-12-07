@extends('admin.layouts.admin')

@section('title', 'subscription / View')

@section('content')
<div class="page-header clearfix">
    </div>

    <div class="row margin-top-30">
        <div class="col-md-8 col-sm-12 col-xs-12 center-margin">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$subscription->name}} <small>Details</small></h2>
                        <ul class="nav navbar-right">
                            <li class="cursor-pointer"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content margin-top-30">

                        <table class="table table-bordered">
                        <tbody>
                            <tr>
                            <th scope="row">Id</th>
                            <td>{{$subscription->id}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Customer Name</th>
                            <td>{{$subscription->customer->name}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Start Date</th>
                            <td>{{$subscription->sdate}}</td>
                            </tr>
                            <tr>
                            <th scope="row">End Date</th>
                            <td>{{$subscription->edate}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Category Type</th>
                            <td>{{$subscription->category_type}}</td>
                            </tr>
                            <tr>
                            <tr>
                            <th scope="row">Amount</th>
                            <td>{{$subscription->amt}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Balance Amount</th>
                            <td>{{$subscription->bamt}}</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
    

    <a class="btn btn-link" href="{{ route('admin.subscriptions.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

@endsection