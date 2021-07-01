<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use DB,Auth,DateTime;
use App\Rating;

class RatingController extends Controller
{
    public function saveRating($id,Request $request){
        if($request -> ajax()){
            Rating::insert([
                'ra_product_id' => $id,
                'ra_number' => $request->number,
                'ra_content' => $request->r_content,
                'ra_user_id' => Auth::user()->id,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]);
            $product = Products::find($id);
            $product->pro_total_rating += 1;
            $product->pro_total_number += $request->number;
            $product->save();
            return response()->json(['code' => '1']);
        }        
    }
}
