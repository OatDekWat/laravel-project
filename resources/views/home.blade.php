@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- เริ่มการแสดงโพสต์ -->
            @if(!$posts->isEmpty())
                @foreach ($posts as $post)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">

                            <!-- ส่วนหัวของโพสต์ (ชื่อผู้ใช้และเวลาโพสต์) -->
                            <div class="d-flex align-items-center mb-3">
                                <!-- รูปโปรไฟล์ (สมมติเป็นรูปภาพ placeholder) -->
                                {{-- <img src="{{ asset('storage/default-profile.png') }}" alt="User Image" class="rounded-circle" width="50" height="50"> --}}
                                
                                <div class="ms-3">
                                    <!-- ชื่อผู้โพสต์ -->
                                    <h5 class="mb-0">{{ $post->name }}</h5>
                                    <!-- เวลาโพสต์ -->
                                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                            </div>

                            <!-- ชื่อโพสต์ -->
                            <h6 class="mb-2">{{ $post->title }}</h6>

                            <!-- เนื้อหาโพสต์ -->
                            <p class="mb-3">{{ $post->content }}</p>

                            <!-- รูปภาพโพสต์ (ถ้ามี) -->
                            @if($post->image)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded" alt="Post Image">
                                </div>
                            @endif

                            <!-- ปุ่มการดำเนินการ (แก้ไข, ลบ) -->
                            <div class="d-flex justify-content-end">
                                @if(Auth::check() && Auth::user()->email === 'admin@example.com')

                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm me-2">แก้ไข</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('คุณแน่ใจหรือไม่ว่าจะลบโพสต์นี้?');">ลบ</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- ถ้าไม่มีโพสต์ -->
                <div class="text-center p-5">


                    <img src="https://cdn-icons-png.flaticon.com/512/2748/2748558.png" alt="No Posts" width="100" class="mb-3">
                    <h4 class="mb-3">ยังไม่มีโพสต์ในวันนี้</h4>
                    <p class="text-muted">รอเเอดมินเเจ้งข่าวสารนะครับ</p>
                    {{-- @if(Auth::check() && Auth::user()->email === 'admin@example.com') --}}
                    @if(Auth::check() && Auth::user()->email === 'admin@example.com')
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">สร้างโพสต์ใหม่</a>
                                @endif

                    
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
