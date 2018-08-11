@extends('layouts.user_app')

@section('content')

<div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> Create User</b></h5>
        </header>
        <hr>
        @if (session('message'))
            <div class="w3-container w3-dark-grey w3-padding-32">
            <div class="w3-row">
            {{session('message')}}
            </div>
            </div>
            <br>
            <br>
        @endif

        <div class="w3-container">
            <form class="form-horizontal" id="create" method="POST" action="{{ route('create') }}">
                {{ csrf_field() }}                

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address  <font color="red">*</font></label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password  <font color="red">*</font></label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password  <font color="red">*</font></label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                    </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">First Name <font color="red">*</font></label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" >

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
                        <input id="last" type="text" class="form-control" name="last" value="{{ old('last') }}" >

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
                        <input id="age" type="text" class="form-control" name="age" value="{{ old('age') }}">

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
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
@endsection
@section('script')
    <script>
    $(document).ready(function(){
        $('#create').validate({ // initialize the plugin
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 200,
                },
                last: {
                    minlength: 5,
                    maxlength: 200,
                },
                age: {
                    number:true,
                    minlength: 0,
                    maxlength: 200,
                },
            }
        });
    });
</script>


@endsection
