@extends('layouts.app')

@section('content')
<h1>สร้างโพสต์ใหม่</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required>

    <label for="title">Title</label>
    <input type="text" name="title" id="title" required>

    <label for="content">Content</label>
    <textarea name="content" id="content" required></textarea>

    <label for="image">Image</label>
    <input type="file" name="image" id="image">

    <button type="submit">Submit</button>
</form>
@endsection
