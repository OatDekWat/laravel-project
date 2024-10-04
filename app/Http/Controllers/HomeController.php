<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Item;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // ดึงข้อมูลโพสต์ทั้งหมด โดยเรียงตามวันที่สร้างล่าสุด
        $posts = Post::latest()->get();

        // ส่งข้อมูลโพสต์ไปยัง View
        return view('home', compact('posts'));
    }





}
