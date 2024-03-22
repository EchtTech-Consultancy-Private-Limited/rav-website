<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function photoGallery(){
        $galleryCategories = DB::table('gallery_management')->where('type',0)->get();
        $imageWithCategory = [];
        foreach ($galleryCategories as $item) {
            $categoryImageData = DB::table('gallery_details')->where('gallery_id',$item->uid)->first();
            $imageWithCategory[] = [
                'image' => $categoryImageData->public_url,
                'title_name_en' => $item->title_name_en,
                'title_name_hi' => $item->title_name_hi
            ];
        }
        return view('pages.photoGallery',compact('imageWithCategory'));
    }
}
