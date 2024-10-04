@extends('layouts.app')

@section('content')
<h1>โพสต์ทั้งหมด</h1>

<div class="container">
    <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addPostModal">
        <i class="fas fa-plus-circle me-2"></i>สร้างโพสต์ใหม่
    </button>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ชื่อผู้ใช้</th>
                <th>ชื่อโพสต์</th>
                <th>เนื้อหา</th>
                <th class="text-start">รูปภาพ</th>
                <th class="text-end">การดำเนินการ</th>
            </tr>
        </thead>
        <tbody>
            @if($posts->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">ไม่มีข้อมูล</td> <!-- ข้อความเมื่อไม่มีโพสต์ -->
                </tr>
            @else
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->content, 50) }}</td>
                        <td class="text-start">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" width="100">
                            @else
                                ไม่มีรูป
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">ดู</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">แก้ไข</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('คุณแน่ใจหรือไม่ว่าจะลบโพสต์นี้?');">ลบ</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<!-- Modal สำหรับสร้างโพสต์ใหม่ -->
<div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPostModalLabel">สร้างโพสต์ใหม่</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">ชื่อโพสต์</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">เนื้อหา</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">รูปภาพ</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
