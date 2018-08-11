@extends('layouts.user_app')

@section('content')

<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-dashboard"></i> Update user</b></h5>
    </header>
    <hr>    
    <div class="w3-container">
    
        <form class="form-horizontal" method="POST" action="{{ route('update') }}">
        {{ csrf_field() }}
            <input type="hidden" name="email" value="{{$udata->email}}">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">First Name  <font color="red">*</font></label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name')?old('name'):($udata->name?$udata->name:'') }}" required autofocus >

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('last') ? ' has-error' : '' }}">
                <label for="last" class="col-md-4 control-label">Last Name</label>

                <div class="col-md-6">
                    <input id="last" type="text" class="form-control" name="last" value="{{ old('last')?old('last'):($udata->last?$udata->last:'') }}" >

                    @if ($errors->has('last'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                <label for="age" class="col-md-4 control-label">Age</label>

                <div class="col-md-6">
                    <input id="age" type="text" class="form-control" name="age" value="{{ old('age')?old('age'):($udata->age?$udata->age:'') }}" >

                    @if ($errors->has('age'))
                        <span class="help-block">
                            <strong>{{ $errors->first('age') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
