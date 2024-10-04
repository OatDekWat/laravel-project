<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EditData</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <h2>Edit Member</h2>
            </div>
            <div>
                <a href="{{route('members.index')}}" class="btn btn-primary">Back</a>
            </div>
            @if (Session('status'))
            <div class="alert alert-success">
                {{ session('status')}}
            </div>
            @endif
            <form action="{{route('members.update', $member->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <strong>Member Name</strong>
                            <input type="text" name="name"  value="{{ $member->name}}" class="form-control" placeholder="Member Name">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <strong>Member Address</strong>
                            <input type="text" name="address"  value="{{ $member->address}}" class="form-control" placeholder="Member Address">
                            @error('address')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <strong>Member Tel</strong>
                            <input type="text" name="tel"  value="{{ $member->tel}}" class="form-control" placeholder="Member Tel">
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
</body>
</html>