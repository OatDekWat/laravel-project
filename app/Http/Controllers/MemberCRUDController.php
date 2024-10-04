<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MemberCRUDController extends Controller
{
    public function index() {
        $data['members'] = Member::orderBy('id', 'asc')->paginate(5);
        return view('members.index', $data);
    }

    //create
    public function create() {
        return view('members.create');
    }

    //store
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'tel' => 'required',
            'image' => 'image|nullable|max:1999', // ตรวจสอบรูปภาพ
        ]);

        $member = new Member;
        $member->name = $request->name;
        $member->address = $request->address;
        $member->tel = $request->tel;

        // จัดการการอัปโหลดไฟล์
        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $path = $request->file('image')->storeAs('profile_pictures', $fileNameToStore, 'public'); // สโตร์ใน disk public
            $member->image = $fileNameToStore; // บันทึกชื่อไฟล์ในฐานข้อมูล
        }

        $member->save();
        return redirect()->route('members.index')->with('success', 'บันทึกข้อมูลสำเร็จ');
    }

    public function edit(Member $member) {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'tel' => 'required',
            'image' => 'image|nullable|max:1999', // ตรวจสอบรูปภาพ
        ]);

        $member = Member::find($id);
        $member->name = $request->name;
        $member->address = $request->address;
        $member->tel = $request->tel;

        // จัดการการอัปโหลดไฟล์
        if ($request->hasFile('image')) {
            // ถ้ามีภาพใหม่ให้ลบภาพเก่าออก
            if ($member->image) {
                Storage::disk('public')->delete('profile_pictures/' . $member->image);
            }

            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $path = $request->file('image')->storeAs('profile_pictures', $fileNameToStore, 'public'); // สโตร์ใน disk public
            $member->image = $fileNameToStore; // บันทึกชื่อไฟล์ในฐานข้อมูล
        }

        $member->save();
        return redirect()->route('members.index')->with('success', 'ข้อมูลสมาชิกอัพเดทสำเร็จ');
    }

    public function destroy(Member $member) {
        // ตรวจสอบว่ามีรูปภาพในฐานข้อมูลหรือไม่
        if ($member->image) {
            // ลบไฟล์จาก storage
            Storage::disk('public')->delete('profile_pictures/' . $member->image);
        }
    
        $member->delete(); // ลบสมาชิกจากฐานข้อมูล
        return redirect()->route('members.index')->with('success', 'ข้อมูลสมาชิกถูกลบเรียบร้อย');
    }
}
