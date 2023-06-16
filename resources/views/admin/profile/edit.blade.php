@extends('layouts.dashboard')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Profile</h4>
                <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf 

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input name="name" class="form-control" type="text" id="example-text-input" value="{{ $editUser->name }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input name="username" class="form-control" type="text" id="example-text-input" value="{{ $editUser->username }}" disabled>
                        </div>
                    </div>                    

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <input name="profile_image" class="form-control" type="file" id="image">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($editUser->profile_image))? url('upload/admin_images/'.$editUser->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });

</script>

@endsection