@extends('admin.layouts.admin')

@section('title','Bills Create' )

@section('content')
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.bills.store'],'method' => 'post','class'=>'form-horizontal form-label-left','enctype'=>"multipart/form-data"]) }}

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                        {{ "Phone Number" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="phno" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('phno')) parsley-error @endif"
                               name="phno" value="" required>
                        @if($errors->has('phno'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('phno') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob" >
                        {{ "Subscriptions" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id = "subscription_id" class="form-control" name="subscription_id" required>
                            <option value="">Select any one Subscription...</option>
                        </select>
                        @if($errors->has('subscription_id'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('subscription_id') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobilenumber" >
                        {{ "Amount Paid" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="amt_paid" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('mobilenumber')) parsley-error @endif"
                               name="amt_paid" value="" required>
                        @if($errors->has('amt_paid'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('amt_paid') as $error)
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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
    $(document).ready(function () {
        $("#phno").autocomplete({
            source: "{{ route('admin.bill.phno') }}",
            minLength: 3,
            select:function(e,ui){
                var ajaxUrl = "{{ route('admin.subscription.check') }}";
                var $select = $('#subscription_id');
                $select.find('option').remove();
                if(ui.item.value!=""){
                    $.ajax({
                        url: ajaxUrl,
                        type: 'GET',
                        data: {
                            mobilenumber: ui.item.value
                        },
                        success:function(response) {
                            var $select = $('#subscription_id');
                            $select.find('option').remove();
                            $select.append('<option value=' + '' + '>' + 'Select any one Subscriptions...' + '</option>');
                            $.each(response,function(key, value) 
                            {
                                $select.append('<option value=' + key + '>' + value + '</option>');
                            });
                        }
                    });
                }
            },
	    });
    });			
    </script>
@endsection