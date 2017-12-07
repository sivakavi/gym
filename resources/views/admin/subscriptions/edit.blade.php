@extends('admin.layouts.admin')

@section('title','Subscriptions Edit' )
<style>
    .help-block{
        color:red;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.subscriptions.update', $subscription->id],'method' => 'put','class'=>'form-horizontal form-label-left','enctype'=>"multipart/form-data"]) }}
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                        {{ "Customer Name" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="customer_id" id="customer_id" required>
                            <option value="">Select any one Customer...</option>
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}" @if($subscription->customer->id == $customer->id) {{ "selected" }} @endif>{{$customer->name}}</option>
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
                               name="sdate" value="{{ $subscription->sdate }}" required>
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
                               name="edate" value="{{ $subscription->edate }}" required>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_type" >
                        {{ "Category" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="category_type" id="category_type" required>
                            <option value="1 month" @if($subscription->category_type == "1 month") {{ "selected" }} @endif>1 Month</option>
                            <option value="3 month" @if($subscription->category_type == "3 month") {{ "selected" }} @endif>3 Months</option>
                            <option value="6 month" @if($subscription->category_type == "6 month") {{ "selected" }} @endif>6 Months</option>
                            <option value="year" @if($subscription->category_type == "year") {{ "selected" }} @endif>Year</option>
                        </select>
                        @if($errors->has("category_type"))
                        <span class="parsley-required">{{ $errors->first("category_type") }}</span>
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
                               name="amt" value="{{ $subscription->amt }}" required>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amt">
                        {{ "Balance Amount" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="bamt" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('bamt')) parsley-error @endif"
                               name="bamt" value="{{ $subscription->bamt }}" required>
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