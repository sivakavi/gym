@extends('admin.layouts.admin')

@section('title', 'Bill / View')

@section('content')
<div class="page-header clearfix">
    </div>

    <div class="row margin-top-30">
        <div class="col-md-8 col-sm-12 col-xs-12 center-margin">
                    <div class="x_content margin-top-30">

                        <table class="table table-bordered">
                        <tbody>
                            <tr>
                            <th scope="row">Id</th>
                            <td>{{$bill->id}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Customer Name</th>
                            <td>{{$bill->subscription->customer->name}}</td>
                            </tr>

                            <tr>
                            <th scope="row">Customer Number</th>
                            <td>{{$bill->subscription->customer->mobilenumber}}</td>
                            </tr>

                            <tr>
                            <th scope="row">Customer Address</th>
                            <td>{{$bill->subscription->customer->address}}</td>
                            </tr>

                            <tr>
                            <th scope="row">Start Date</th>
                            <td>{{$bill->subscription->sdate}}</td>
                            </tr>

                            <tr>
                            <th scope="row">End Date</th>
                            <td>{{$bill->subscription->edate}}</td>
                            </tr>

                            <tr>
                            <th scope="row">Subscription Balance</th>
                            <td>{{$bill->subscription->bamt}}</td>
                            </tr>

                            <tr>
                            <th scope="row">End Date</th>
                            <td>{{$bill->amt_paid}}</td>
                            </tr>

                        </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
    

    <a class="btn btn-link" href="{{ route('admin.customers.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

@endsection