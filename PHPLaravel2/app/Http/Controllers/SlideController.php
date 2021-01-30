<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    //
    public function getshow(){
        $slide = Slide::all();
        return view('admin.slide.show',['Slide'=>$slide]);
    }

    public function getadd(){
        return view('admin.slide.add');
    }

    public function postadd(Request $request){
        $this->validate($request,
            [
                'Ten'=>'required|min:1|max:100|unique:loaitin,ten',
                'Noidung'=>'required',
                'Link'=>'required',
            ],
            [
                'Ten.required'=>'Bạn chưa nhập tiêu đề',
                'Ten.min'=>'Tên tiêu đề phải có từ 1-100 ký tự',
                'Ten.max'=>'Tên tiêu đề phải có từ 1-100 ký tự',
                'Ten.unique'=>'Tên tiêu đề đã tồn tại',
                'Noidung.required'=>'Bạn chưa nhập thể loại',
                'Link.required'=>'Bạn chưa nhập loại tin',
            ]
        );
        $slide = new Slide;
        $slide->ten = "$request->Ten";
        $slide->noidung = $request->Noidung;
        $slide->link = $request->Link;
        if ($request->hasFile('Hinhanh')){
            $file = $request->file('Hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect()->route('add.slide')->with('Error','Thêm  hình ảnh thất bại');
            }
            $name = $file->getClientOriginalName();
            $hinhanh = quickRandom(5)."_".$name;
            while (file_exists("image".$hinhanh)){
                $hinhanh = quickRandom(5)."_".$name;
            }
            $file->move("image",$hinhanh);
            $slide->hinh = $hinhanh;
        }else{
            $slide->hinh = "nen.jpg";
        }
        $slide->save();
        return redirect()->route('show.slide')->with('Notification','Thêm slide '."[ $slide->ten ]".' thành công');
    }

    public function getupdate($id){
        $slide = Slide::find($id);
        return view('admin.slide.update',['Slide'=>$slide]);
    }

    public function postupdate(Request $request, $id){
        $this->validate($request,
            [
                'Ten'=>'required|min:1|max:100|unique:loaitin,ten',
                'Noidung'=>'required',
                'Link'=>'required',
            ],
            [
                'Ten.required'=>'Bạn chưa nhập tiêu đề',
                'Ten.min'=>'Tên tiêu đề phải có từ 1-100 ký tự',
                'Ten.max'=>'Tên tiêu đề phải có từ 1-100 ký tự',
                'Ten.unique'=>'Tên tiêu đề đã tồn tại',
                'Noidung.required'=>'Bạn chưa nhập thể loại',
                'Link.required'=>'Bạn chưa nhập loại tin',
            ]
        );
        $slide = Slide::find($id);
        $slide->ten = "$request->Ten";
        $slide->noidung = $request->Noidung;
        $slide->link = $request->Link;
        if ($request->hasFile('Hinhanh')){
            $file = $request->file('Hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect()->route('update.slide',['id'=>$id])->with('Error','Thêm  hình ảnh thất bại');
            }
            $name = $file->getClientOriginalName();
            $hinhanh = quickRandom(5)."_".$name;
            while (file_exists("image".$hinhanh)){
                $hinhanh = quickRandom(5)."_".$name;
            }
            $file->move("image",$hinhanh);
            $slide->hinh = $hinhanh;
        }
        $slide->save();
        return redirect()->route('show.slide')->with('Notification','Sửa slide '."[ $slide->ten ]".' thành công');
    }

    public function getdelete($id){
        $slide = Slide::find($id);
        $slide->delete();
        return redirect()->route('show.slide')->with('Notification','Xóa slide '."[ $slide->ten ]".' thành công');
    }
}
