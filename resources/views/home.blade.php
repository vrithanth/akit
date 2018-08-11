@extends('layouts.user_app')

@section('content')

<div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
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
            <h5>Countries</h5>
            <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
                <tr>
                    <th>Username</th>
                    <th>action</th>
                </tr>
                @if($users->count()>0)                
                @foreach($users as $user)                
                <tr>
                    <td width="70%">{{ $user->name }}</td>
                    <td>
                        <a href="{{ url('/update?email='.$user->email)}}" class="w3-button w3-dark-grey">Update User &nbsp;</a>                    
                        @if(Auth::user()->id!=$user->id)
                        <a href="{{ url('/delete?email='.$user->email)}}"  class="w3-button w3-dark-grey">Delete User &nbsp;</i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                    <tr>
                        <td col-span="2">No users Found</td>
                        
                    </tr>
                @endif
            </table>
        </div>
        <hr>
        
@endsection
@section('script')

@endsection
