<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App;
use DB;
use Exception;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUS(){
        return view('pages.contact-us');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function feedbackSubmit(Request $request){
        return view('pages.feedback');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function siteMap(Request $request){
        return view('pages.sitemap');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function screenReaderAccess(Request $request)
    {
        return view('pages.screen-reader-access');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }

    public function SetLang(Request $request){
        session()->put('locale', $request->data);
        $locale = $request->data;
        App::setLocale($locale);
        return response()->json(['data' => $request->data, True]);
    }

    public function getContentAllPages(Request $request, $slug)
    {
        // dd($slug);
        try {
            $menus = DB::table('website_menu_management')->whereurl($slug)->first();

            if($menus != ''){

            if (Session::get('locale') == 'hi'){
                $title_name = $menus->name_hi;    
            }else{
                $title_name = $menus->name_en;    
            }

            $dynamic_content_page_metatag = DB::table('dynamic_content_page_metatag')
                ->where('soft_delete', 0)
                ->where('menu_uid', $menus->uid)
                ->orderBy('sort_order', 'ASC')
                ->get();
              
            if(count($dynamic_content_page_metatag) > 0){   

            $organizedData = [];
            
            foreach ($dynamic_content_page_metatag as $dynamic_content_page_metatags) {
                
                $dynamic_content_page_pdf = DB::table('dynamic_content_page_pdf')
                    ->wheredcpm_id($dynamic_content_page_metatags->uid)
                    ->where('soft_delete', 0)
                    ->get();

                $dynamic_page_banner = DB::table('dynamic_page_banner')
                    ->where('soft_delete', 0)
                    ->wheredcpm_id($dynamic_content_page_metatags->uid)
                    ->first();

                $dynamic_content_page_gallery = DB::table('dynamic_content_page_gallery')
                    ->wheredcpm_id($dynamic_content_page_metatags->uid)
                    ->where('soft_delete', 0)
                    ->get();
    
                $dynamic_page_content = DB::table('dynamic_page_content')
                    ->wheredcpm_id($dynamic_content_page_metatags->uid)
                    ->where('soft_delete', 0)
                    ->first();
                    
                $organizedData = [
                    'metatag' => $dynamic_content_page_metatags,
                    'content' => $dynamic_page_content,
                    'pdf' => $dynamic_content_page_pdf,
                    'gallery' => $dynamic_content_page_gallery,
                    'banner' => $dynamic_page_banner,
                ];
            }
            if($menus?->parent_id != 0 ){
                $sideMenu = DB::table('website_menu_management')->wherename_en($menus->name_en)->first('parent_id');
                $sideMenuParent = DB::table('website_menu_management')->whereuid($sideMenu->parent_id)->where('soft_delete', 0)->orderBy('sort_order', 'ASC')->first();
                $sideMenuChild = DB::table('website_menu_management')->whereparent_id($sideMenuParent->uid)->where('soft_delete', 0)->orderBy('sort_order', 'ASC')->get();
            }else{
                $sideMenuParent = "";
                $sideMenuChild =[];
            }
            $quickLink = DB::table('website_menu_management')->where('menu_place',4)->where('soft_delete',0)->orderBy('sort_order','ASC')->get();
      
            return view('master-page',['quickLink'=>$quickLink,'title_name' => $title_name,'organizedData'=>$organizedData,'sideMenuChild'=>$sideMenuChild,'sideMenuParent'=>$sideMenuParent]);
      
        }else{
          
            if (Session::get('locale') == 'hi'){
                $content = "पेज अभी उपलब्ध नहीं है हम इस पर काम कर रहे हैं";   
            }else{
                $content = "Page is not Available Yet.We are Working on it.";   
            }
          return view('master-page',['content'=>$content,'title_name'=>$title_name]);
        }
        }else{
            return abort(404);
        }
        
        } catch (Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return abort(404);
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return abort(404);
        }
    }
    
}
