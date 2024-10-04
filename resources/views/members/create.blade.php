@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12">
            <h2>Create Member</h2>
        </div>
        <div>
            <a href="{{route('members.index')}}" class="btn btn-primary">Back</a>
        </div>
        @if (Session('status'))
        <div class="alert alert-success">
            {{ session('status')}}
        </div>
        @endif
        <form action="{{route('members.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mt-3">
                        <strong>Member Name</strong>
                        <input type="text" name="name" class="form-control" placeholder="Member Name">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mt-3">
                        <strong>Member Address</strong>
                        <input type="text" name="address" class="form-control" placeholder="Member Address">
                        @error('address')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mt-3">
                        <strong>Member Tel</strong>
                        <input type="text" name="tel" class="form-control" placeholder="Member Tel">
                        @error('tel')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="profile_picture">อัปโหลดรูปโปรไฟล์เจ้าของบ้าน:</label>
                    <input type="file" class="form-control" name="profile_picture">
                </div> --}}
                <div class="col md-12">
                    <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
