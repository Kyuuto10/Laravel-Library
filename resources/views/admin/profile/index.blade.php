@extends('layouts.dashboard')
@section('content')

@php
$id = Auth::user()->id;
$user = App\Models\User::find($id);
@endphp

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div style="text-align:center">
                <h1 class="mb-0 text-gray-800">Profile</h1>
            </div><br>
            <center>
                <img class="rounded-circle avatar-xl" src="{{ (!empty($user->profile_image))? url('upload/admin_images/'.$user->profile_image):url('upload/no_image.jpg') }}" style="width:200px; height:200px;">
            </center>
                <div class="card-body">
                    <h4 class="card-title">Name     : {{$user->name}}</h4><hr>
                    <h4 class="card-title">Username : {{$user->username}}</h4><hr>
                    <a href="{{route('profile.update')}}" class="btn btn-info btn-rounded waves-effect waves-light">Edit</a>
                </div>
        </div>
    </div>
</div>

@endsection