<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // แสดงรายการโพสต์ทั้งหมด
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // แสดงฟอร์มสร้างโพสต์ใหม่
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // เพิ่มการ validate ฟิลด์ name
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $post = new Post();
        $post->name = $request->name; // บันทึกฟิลด์ name
        $post->title = $request->title;
        $post->content = $request->content;
    
        // ตรวจสอบว่ามีการอัปโหลดรูปภาพหรือไม่
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image = $imagePath;
        }
    
        $post->save();
    
        return redirect()->route('posts.index')->with('success', 'สร้างโพสต์สำเร็จ');
    }

    // แสดงโพสต์
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    // แสดงฟอร์มแก้ไขโพสต์
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255', // เพิ่มการ validate ฟิลด์ name
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $post = Post::findOrFail($id);
        $post->name = $request->name; // บันทึกฟิลด์ name
        $post->title = $request->title;
        $post->content = $request->content;
    
        // ถ้ามีการอัปโหลดรูปภาพใหม่ ให้อัปเดตภาพ
        if ($request->hasFile('image')) {
            // ลบภาพเก่า
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
    
            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image = $imagePath;
        }
    
        $post->save();
    
        return redirect()->route('posts.index')->with('success', 'อัปเดตโพสต์สำเร็จ');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
    
        // ลบโพสต์
        $post->delete();
    
        // หลังจากลบเสร็จ รีไดเรกต์กลับไปที่หน้า Home พร้อมข้อความแจ้งเตือนความสำเร็จ
        return redirect()->route('home')->with('success', 'โพสต์ถูกลบเรียบร้อยแล้ว');
    }


}
