@extends('admin.layouts.admin')

@section('title','Subscriptions Create' )
<style>
    .help-block{
        color:red;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.subscriptions.store'],'method' => 'post','class'=>'form-horizontal form-label-left','enctype'=>"multipart/form-data"]) }}
                {{ $errors->all() }}
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                        {{ "Customer Name" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="customer_id" id="customer_id" required>
                            <option value="">Select any one Customer...</option>
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has("customer_id"))
                        <span class="parsley-required">{{ $errors->first("customer_id") }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sdate" >
                        {{ "Start Date" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="sdate" type="date" class="form-control col-md-7 col-xs-12 @if($errors->has('sdate')) parsley-error @endif"
                               name="sdate" value="" required>
                        @if($errors->has('sdate'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('sdate') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edate" >
                        {{ "End Date" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="edate" type="date" class="form-control col-md-7 col-xs-12 @if($errors->has('edate')) parsley-error @endif"
                               name="edate" value="" required>
                        @if($errors->has('edate'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('edate') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                        {{ "Category" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="category_id" id="customer_id-field" required>
                            <option value="1 month">1 Month</option>
                            <option value="3 month">3 Months</option>
                            <option value="6 month">6 Months</option>
                            <option value="year">Year</option>
                        </select>
                        @if($errors->has("customer_id"))
                        <span class="parsley-required">{{ $errors->first("customer_id") }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amt">
                        {{ "Amount" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="amt" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('amt')) parsley-error @endif"
                               name="amt" value="" required>
                        @if($errors->has('amt'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('amt') as $error)
                                    <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bamt">
                        {{ "Balance Amount" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="bamt" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('amt')) parsley-error @endif"
                               name="bamt" value="" required>
                        @if($errors->has('bamt'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('bamt') as $error)
                                    <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('views.admin.users.edit.cancel') }}</a>
                        <button type="submit" class="btn btn-success"> {{ __('views.admin.users.edit.save') }}</button>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection