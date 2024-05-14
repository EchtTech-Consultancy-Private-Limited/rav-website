<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App, Route, DB,Session;
use Exception;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Carbon\Carbon;

// Call Helper

class CommonComposer
{
    protected $request;

    /**
     * Create a new common composer.
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        try {
            $menuData = array('Home', 'Contact US');
            $userLogin = Auth()->user();

            if (isset($userLogin->role_id) && $userLogin->role_id != 1) {
                $modelName = DB::table('roles_and_permissions')->where('role_id', $userLogin->role_id)->orderBy('sort_order', 'asc')->get();
            } else {
                $modelName = DB::table('module_management')->where('soft_delete', '0')->orderBy('sort_order', 'asc')->get();
            }

            $banner = DB::table('home_page_banner_management')->where('soft_delete', 0)->orderBy('sort_order', 'ASC')->get();
            $footerMenu = DB::table('website_menu_management')->whereIn('menu_place', [1, 3])->where('soft_delete', 0)->orderBy('sort_order', 'ASC')->get();
            $menus = DB::table('website_menu_management')->whereIn('menu_place', [0,3])->where('soft_delete', 0)->orderBy('sort_order', 'ASC')->get();
            $menuName = $this->getMenuTree($menus, 0);
            $news_management = DB::table('news_management')->where('soft_delete', 0)->latest('created_at')->take(3)->get();
            $tender_management = DB::table('tender_management')->where('soft_delete', 0)->latest('created_at')->get();
            $social_links = DB::table('social_links')->where('soft_delete', 0)->first();
            $toogleMenu = DB::table('website_menu_management')->where('menu_place','2')->where('soft_delete','0')->orderby('sort_order','Asc')->get();
            $website_core_settings = DB::table('website_core_settings')->where('soft_delete', 0)->first();
            $events_management = DB::table('events_management')->where('status', 3)->where('soft_delete', 0)->latest('created_at')->get();
            
            $popupAdvertisings = DB::table('popup_advertisings')
                                 ->where('start_date', '<=' , date_format(date_create(date('Y-m-d')),"Y-m-d"))
                                 ->where('end_date', '>=', date_format(date_create(date('Y-m-d')),"Y-m-d"))
                                  ->where('status', 3)
                                  ->where('soft_delete', 0)
                                  ->latest('created_at')->first();
                                 
            $dynamic_content_page_metatag = DB::table('dynamic_content_page_metatag')
                    ->where('soft_delete', 0)
                    ->where('status', 3)
                    ->get();
            $organizedData = [];
            if (count($dynamic_content_page_metatag) > 0) {
                foreach ($dynamic_content_page_metatag as $dynamic_content_page_metatags) {
                    $dynamic_content_page_pdf = DB::table('dynamic_content_page_pdf')
                        ->wheredcpm_id($dynamic_content_page_metatags->uid)
                        ->take(10)
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

                    $organizedData[] = [
                        'metatag' => $dynamic_content_page_metatags,
                        'content' => $dynamic_page_content,
                        'pdf' => $dynamic_content_page_pdf,
                        'gallery' => $dynamic_content_page_gallery,
                        'banner' => $dynamic_page_banner,
                    ];
                }

            }


            // quick links
            $quickLinks = DB::table('website_menu_management')
                ->where('menu_place', 4)
                ->whereIn('name_en', [
                    'Courses Under Guru Shishya Parampara',
                    'Vacancy',
                    'Publications of Vidyapeeth'
                ])
                ->get();
            $newsLetter = DB::table('website_menu_management')->where('menu_place',2)
                ->where('url','e-news-letter')->first();


            $dynamicContents = DB::table('website_menu_management')->where('name_en','Alumni Corner')
                                ->join('dynamic_content_page_metatag','dynamic_content_page_metatag.menu_uid','=','website_menu_management.uid')
                                ->join('dynamic_page_content','dynamic_page_content.dcpm_id','=','dynamic_content_page_metatag.uid')
                                ->select('dynamic_page_content.*','dynamic_content_page_metatag.*')->first();

            $thesisContents = DB::table('website_menu_management')->where('name_en','Thesis Submitted by RAV Student')
                ->join('dynamic_content_page_metatag','dynamic_content_page_metatag.menu_uid','=','website_menu_management.uid')
                ->join('dynamic_page_content','dynamic_page_content.dcpm_id','=','dynamic_content_page_metatag.uid')
                ->select('dynamic_page_content.*','dynamic_content_page_metatag.*')->first();

            $rightToInfoContents = DB::table('website_menu_management')->where('url','right-to-information-act-rti')
                ->join('dynamic_content_page_metatag','dynamic_content_page_metatag.menu_uid','=','website_menu_management.uid')
                ->join('dynamic_page_content','dynamic_page_content.dcpm_id','=','dynamic_content_page_metatag.uid')
                ->select('dynamic_page_content.*','dynamic_content_page_metatag.*')->first();
                
            $awardsContents = DB::table('website_menu_management')->where('name_en','Awards')
                ->join('dynamic_content_page_metatag','dynamic_content_page_metatag.menu_uid','=','website_menu_management.uid')
                ->join('dynamic_page_content','dynamic_page_content.dcpm_id','=','dynamic_content_page_metatag.uid')
                ->select('dynamic_page_content.*','dynamic_content_page_metatag.*')->first();
                
            $gyanGanga = DB::table('website_menu_management')->where('url','gyanganga-knowledge-voyage-a-weekly-webinar-series')
                ->join('dynamic_content_page_metatag','dynamic_content_page_metatag.menu_uid','=','website_menu_management.uid')
                ->join('dynamic_page_content','dynamic_page_content.dcpm_id','=','dynamic_content_page_metatag.uid')
                ->select('dynamic_page_content.*','dynamic_content_page_metatag.*','website_menu_management.url')->first();
              

            $ayurAhar = DB::table('website_menu_management')->where('url','promotion-of-ayurvedic-aahar')
                ->join('dynamic_content_page_metatag','dynamic_content_page_metatag.menu_uid','=','website_menu_management.uid')
                ->join('dynamic_page_content','dynamic_page_content.dcpm_id','=','dynamic_content_page_metatag.uid')
                ->select('dynamic_page_content.*','dynamic_content_page_metatag.*','website_menu_management.url')->first();
                // dd($ayurAhar);
                if ($gyanGanga) {
                    $menuUid = $gyanGanga->menu_uid;
                    $parentId = DB::table('website_menu_management')->where('uid',$menuUid)->first(['parent_id']);
                    $parentMenu = DB::table('website_menu_management')->where('uid',$parentId->parent_id)->first(['url']);
                      $gyanGanga->parent_url = $parentMenu->url;
                      $ayurAhar->parent_url = $parentMenu->url;
                  }

                $cravGurusData =  DB::table('website_menu_management')
                ->whereIn('url', [
                    'exploring-the-facts-covid-19',
                    'new-initiative',
                    'conduction-of-training-programs',
                    'thesis-submitted-by-rav-students',
                    'celebration-of-international-yoga-day-2023',
                    'expert-talks-series-on-poshan-nutrition'
                ])
                ->join('dynamic_content_page_metatag', 'dynamic_content_page_metatag.menu_uid', '=', 'website_menu_management.uid')
                ->join('dynamic_page_content', 'dynamic_page_content.dcpm_id', '=', 'dynamic_content_page_metatag.uid')
                ->select('website_menu_management.url', 'dynamic_page_content.*', 'dynamic_content_page_metatag.*','website_menu_management.url')
                ->get();
                

                // visitors
                $visitors = DB::table('visiting_counters')->get();
                if (count($visitors) > 0){
                    $visitors = count($visitors);
                }else{
                    $visitors = 0;
                }


            // dd($gyanGanga);
            $view->with(['modelname' => $modelName, 'menu' => $menuData,
             'headerMenu' => $menuName, 'footerMenu' => $footerMenu,
             'banner' => $banner, 'news_management' => $news_management,
             'tender_management' => $tender_management,'social_links'=>$social_links,
             'alertMessage' =>$this->checkLanguage(),
             'website_core_settings'=>$website_core_settings,
             'toogleMenu'=>$toogleMenu,
             'organizedDatas' => $organizedData,
             'events_managements' => $events_management,
                'quickLinks' => $quickLinks,
                'newsLetter' => $newsLetter,
                'dynamicContents' => $dynamicContents,
                'thesisContents' => $thesisContents,
                'rightToInfoContents' => $rightToInfoContents,
                'awardsContents' => $awardsContents,
                'gyanGanga' => $gyanGanga,
                'ayurAhar' => $ayurAhar,
                'cravGurusData' => $cravGurusData,
                'total_visitors' => $visitors,
                'popupAdvertisings' =>$popupAdvertisings
            ]);
        } catch (Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
        }

    }

    function getMenuTree($menus,$parentId){
        $branch = array();
        foreach ($menus as $menu){
            if($menu->parent_id == $parentId) {
                $children = $this->getMenuTree($menus,$menu->uid);
                if ($children) {
                    $menu->children = $children;
                }
                $branch[] = $menu;
            }
        }
        return $branch;
    }

    function checkLanguage(){
        if (Session::get('locale') == 'hi')
        {
            return 'यह लिंक आपको एक बाहरी वेब साइट पर ले जाएगा।';
        }else{
            return 'This link will take you to an external web site.';
        }
    }

}
