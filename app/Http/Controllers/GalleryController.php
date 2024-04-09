<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function photoGallery()
    {
        $galleryCategories = DB::table('gallery_management')->where('type', 0)->where('status', 3)->get();
        $imageWithCategory = [];
        foreach ($galleryCategories as $item) {
            $categoryImageData = DB::table('gallery_details')->where('gallery_id', $item->uid)->first();
            $imageWithCategory[] = [
                'uid' => $item->uid,
                'image' => $categoryImageData->public_url,
                'title_name_en' => $item->title_name_en,
                'title_name_hi' => $item->title_name_hi
            ];
        }
        $title_name = 'Photo Gallery';
        return view('pages.photoGallery', compact('imageWithCategory', 'title_name'));
    }

    public function imageCategoryData($id)
    {
        $galleryCategories = DB::table('gallery_management')->where('type', 0)->where('status', 3)->where('uid', $id)->where('soft_delete', 0)->first();
        $imageWithCategory = DB::table('gallery_details')->where('gallery_id', $galleryCategories->uid)->where('soft_delete', 0)->get();
        //    dd($imageWithCategory);
        $title_name = "Photo Gallery";
        return view('pages.photoGalleryDetails', compact('imageWithCategory', 'title_name'));
    }

    public function videoGallery()
    {
        $galleryCategories = DB::table('gallery_management')->where('type', 1)->where('status', 3)->where('soft_delete', 0)->get();
        $videos = [];
        foreach ($galleryCategories as $item) {
            $categoryImageData = DB::table('gallery_details')->where('gallery_id', $item->uid)->where('soft_delete', 0)->first();
            if ($categoryImageData) {
                $videos[] = [
                    'uid' => $item->uid,
                    'video_id' => $categoryImageData->public_url ?? '',
                    'title_name_en' => $item->title_name_en,
                    'title_name_hi' => $item->title_name_hi
                ];
            }
        }
        $title_name = 'Video Gallery';
        return view('pages.videoGallery', compact('videos', 'title_name'));
    }
}
