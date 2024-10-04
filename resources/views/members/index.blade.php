@extends('layouts.app')
<title>memberCRUD</title>
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2>ข้อมูลสมาชิก</h2>
        </div>
        <div>
            <a href="{{ route('members.create') }}" class="btn btn-success mt-3">สร้างสมาชิก</a>
            <a href="{{ route('home') }}" class="btn btn-success mt-3">ย้อนกลับ</a>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>บ้านหลังที่</th>
                    <th>ชื่อเจ้าของ</th>
                    <th>เลขที่บ้าน</th>
                    <th>เบอร์โทรเจ้าของบ้าน</th>
                    {{-- <th>โปรไฟล์เจ้าของบ้าน</th> --}}
                    <th width="280px">การดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->address }}</td>
                        <td>{{ $member->tel }}</td>
                        {{-- <td>
                            {{-- @if ($member->image)
                                <img src="{{ asset('storage/profile_pictures/' . $member->image) }}" alt="Profile Picture" width="100">
                            @else
                                ไม่มีรูป
                            @endif --}}
                        {{-- </td> --}} 
                        <td>
                            <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning">แก้ไข</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบ?');">ลบ</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $members->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection
