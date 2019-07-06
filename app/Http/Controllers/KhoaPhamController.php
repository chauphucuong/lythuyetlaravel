<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhoaPham;
use App\Http\Requests\KhoaPhamRequest;
class KhoaPhamController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function them(KhoaPhamRequest $req){
        $img = $req->file('fImages');
        $img_name= $img->getClientOriginalName();
        $khoapham = new KhoaPham;
        $khoapham->monhoc = $req->txtMonHoc;
        $khoapham->giatien =$req->txtGiaTien;
        $khoapham->giangvien =$req->txtGiangVien;
        $khoapham->image= $img_name;
        $khoapham->save();
        $des='upload/image';
        $img->move($des,$img_name);
        return "Thêm thành công";
        // echo "<pre>";
        // echo "Tên hình: ".$req->file('fImages')->getClientOriginalName()."<br/>";
        // echo "Size: ".$req->file('fImages')->getSize() ." KB <br/>";
        // echo "Đường dẫn: ".$req->file('fImages')->getRealPath() ." <br/>";
        // echo "Loại hình: ".$req->file('fImages')->getMimeType() ." <br/>";
        // echo "</pre>";
        
    }
}
