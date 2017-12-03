@extends('admin.layouts.admin')

@section('title','Customers Create' )

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['admin.customers.update', $customer->id],'method' => 'put','class'=>'form-horizontal form-label-left','enctype'=>"multipart/form-data"]) }}

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                        {{ "Name" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('name')) parsley-error @endif"
                               name="name" value="{{ $customer->name }}" required>
                        @if($errors->has('name'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('name') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob" >
                        {{ "Date Of Birth" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="dob" type="date" class="form-control col-md-7 col-xs-12 @if($errors->has('dob')) parsley-error @endif"
                               name="dob" value="{{ $customer->dob }}" required>
                        @if($errors->has('dob'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('dob') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobilenumber" >
                        {{ "Mobile Number" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="mobilenumber" type="number" class="form-control col-md-7 col-xs-12 @if($errors->has('mobilenumber')) parsley-error @endif"
                               name="mobilenumber" value="{{ $customer->mobilenumber }}" required>
                        @if($errors->has('mobilenumber'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('mobilenumber') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="doj" >
                        {{ "Date Of Joining" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="doj" type="date" class="form-control col-md-7 col-xs-12 @if($errors->has('doj')) parsley-error @endif"
                               name="doj" value="{{ $customer->doj }}" required>
                        @if($errors->has('doj'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('doj') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo" >
                        {{ "Photo" }}
                        <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="photo" type="file" class="form-control col-md-7 col-xs-12 @if($errors->has('photo')) parsley-error @endif"
                               name="photo" value="">
                        <img src="{{ asset('uploads/'.$customer->photo) }}" class="img-responsive" style="width:100px"/>
                        @if($errors->has('photo'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('photo') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address" >
                        {{ "Address" }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                               <textarea id="address" class="form-control col-md-7 col-xs-12 @if($errors->has('address')) parsley-error @endif"
                               name="address" required>{{ $customer->address }}</textarea>
                        @if($errors->has('address'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('address') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                        {{ __('views.admin.users.edit.email') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="email" type="email" class="form-control col-md-7 col-xs-12 @if($errors->has('email')) parsley-error @endif"
                               name="email" value="{{ $customer->email }}" required>
                        @if($errors->has('email'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('email') as $error)
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