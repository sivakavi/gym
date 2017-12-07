@extends('admin.layouts.admin')

@section('title','Subscriptions Create' )
<style>
    .help-block{
        color:red;
    }
</style>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.subscriptions.store'],'method' => 'post','class'=>'form-horizontal form-label-left','enctype'=>"multipart/form-data"]) }}
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phno" >
                        {{ "Phone Number" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="phno" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('phno')) parsley-error @endif"
                               name="phno" value="" required>
                        <span id="subscriptioncheck" style="color: green;"> </span>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_type" >
                        {{ "Category" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="category_type" id="category_type" required>
                        <option value=""> Select Category</option>
                        <?php foreach($categories as $category){ ?>
                            <option value="<?php echo $category->id;?>" data-amt="<?php echo $category->amt;?>" data-month="<?php echo $category->month;?>"><?php echo $category->name;?></option>
                        <?php } ?>
                        </select>
                        @if($errors->has("category_type"))
                        <span class="parsley-required">{{ $errors->first("category_type") }}</span>
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
                        <input id="edate" type="date" class="form-control col-md-7 col-xs-12 @if($errors->has('edate')) parsley-error @endif" name="edate" value="" required readonly>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amt">
                        {{ "Amount" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="amt" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('amt')) parsley-error @endif"
                         readonly name="amt" value="" required>
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
    $('#category_type').change(function(e){
        var now = new Date();
        amt = $(this).find(':selected').data('amt');
        $('#amt').val(amt);
        dateChange($('#sdate').val());
    });
    $('#sdate').change(function(e){
        dateChange($(this).val());
    });
    function dateChange(date){
        if(""!=date){
            var now = new Date(date);
            totalmonth = $('#category_type').find(':selected').data('month');
            now.setMonth(now.getMonth()+totalmonth);
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
            $('#edate').val(today);
        }
    }
    $(document).ready(function () {
        $("#phno").autocomplete({
            source: "{{ route('admin.bill.phno') }}",
            minLength: 3,
            select:function(e,ui){
                var ajaxUrl = "{{ route('admin.subscription.check') }}";
                $('#subscriptioncheck').val('');
                if(ui.item.value!=""){
                    $.ajax({
                        url: ajaxUrl,
                        type: 'GET',
                        data: {
                            mobilenumber: ui.item.value
                        },
                        success:function(response) {
                            if(response.date!="")
                           $('#subscriptioncheck').text('Subscription End date '+ response.date);
                        }
                    });
                }
            },
	    });
    });			
    </script>
@endsection