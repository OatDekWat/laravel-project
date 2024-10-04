@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">แก้ไขโพสต์</h3>
                </div>
                <div class="card-body">
                    <!-- การแสดงข้อผิดพลาด -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- การแสดงข้อความสำเร็จ -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- ฟอร์มแก้ไขโพสต์ -->
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- ชื่อผู้ใช้ -->
                        <div class="mb-3">
                            <label for="name" class="form-label">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $post->name) }}" required>
                        </div>

                        <!-- ชื่อโพสต์ -->
                        <div class="mb-3">
                            <label for="title" class="form-label">ชื่อโพสต์</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $post->title) }}" required>
                        </div>

                        <!-- เนื้อหา -->
                        <div class="mb-3">
                            <label for="content" class="form-label">เนื้อหา</label>
                            <textarea name="content" class="form-control" id="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
                        </div>

                        <!-- รูปภาพ -->
                        <div class="mb-3">
                            <label for="image" class="form-label">รูปภาพ</label>
                            @if($post->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid rounded" width="200">
                                </div>
                            @endif
                            <input type="file" name="image" class="form-control-file" id="image">
                        </div>

                        <!-- ปุ่มบันทึกและย้อนกลับ -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
                            <a href="{{ route('home') }}" class="btn btn-secondary">ย้อนกลับ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
