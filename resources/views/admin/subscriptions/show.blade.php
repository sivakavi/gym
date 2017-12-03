@extends('admin.layouts.admin')

@section('title', 'customer / View')

@section('content')
<div class="page-header clearfix">
    </div>

    <div class="row margin-top-30">
        <div class="col-md-8 col-sm-12 col-xs-12 center-margin">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$customer->name}} <small>Details</small></h2>
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
                            <td>{{$customer->id}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Name</th>
                            <td>{{$customer->name}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Date Of Birth</th>
                            <td>{{$customer->dob}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Mobilenumber</th>
                            <td>{{$customer->mobilenumber}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Date Of Joining</th>
                            <td>{{$customer->doj}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Photo</th>
                            <td><img src="{{ asset('uploads/'.$customer->photo) }}" class="img-responsive" style="width:100px"/></td>
                            </tr>
                            <tr>
                            <th scope="row">Address</th>
                            <td>{{$customer->address}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Email</th>
                            <td>{{$customer->email}}</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
    

    <a class="btn btn-link" href="{{ route('admin.customers.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

@endsection