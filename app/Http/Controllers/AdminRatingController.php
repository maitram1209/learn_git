<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;

class AdminRatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
        $data = Rating::paginate(10);
        return view('back-end.rating.index',['data'=>$data]);
    }
    public function getdel($id)
   {
         $rating = Rating::find($id);
         $rating->delete();
         return redirect()->route('admin.get.list.rating')
         ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa !']);
      
   }
}
