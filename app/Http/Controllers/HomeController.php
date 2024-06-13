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
    public function index()
    {
        $tenders = DB::table('tender_management')
            ->join('tender_details', 'tender_details.tender_id', '=', 'tender_management.uid')
            ->select('tender_management.*', 'tender_details.pdfimage_size as pdf_size', 'tender_details.file_extension', 'tender_details.public_url', 'tender_details.private_url', 'tender_details.tab_type')
            ->get();
        $sectionZero = DB::table('home_page_sections_list as sl')
            ->select('sd.*')
            ->join('home_page_sections_designs_details as sd','sd.hpsi_id','=','sl.uid')
            ->where('sl.sort_order',0)
            ->where('sl.soft_delete', 0)
            ->where('sl.status', 3)
            ->orderBy('sd.sort_order', 'ASC')
            ->get();
        $galleryCategories = DB::table('gallery_management')->where('type', 0)->where('status', 3)->get();
        $imageWithCategory = [];
        foreach ($galleryCategories as $item) {
            $categoryImageData = DB::table('gallery_details')->where('gallery_id', $item->uid)->first();
            $imageWithCategory[] = [
                'image' => $categoryImageData->public_url,
                'title_name_en' => $item->title_name_en,
                'title_name_hi' => $item->title_name_hi
            ];
        }

        $galleryCategories = DB::table('gallery_management')->where('type', 1)->where('status', 3)->get();
        $videosWithCategories = [];
        foreach ($galleryCategories as $item) {
            $videImageData = DB::table('gallery_details')->where('gallery_id', $item->uid)->first();
            if (isset($videImageData)) {
                $videosWithCategories[] = [
                    'video_id' => $videImageData->public_url,
                    'title_name_en' => $item->title_name_en,
                    'title_name_hi' => $item->title_name_hi
                ];
            }
        }


        $cmeScheme = DB::table('dynamic_content_page_metatag')
            ->where('menu_slug', 'cme-scheme')
            ->where('soft_delete', 0)
            ->where('status', 3)
            ->first();

        $cmeSchemeContent = DB::table('dynamic_page_content')
            ->wheredcpm_id($cmeScheme->uid)
            ->where('soft_delete', 0)
            ->first();

        $cmeSchemePdf = DB::table('dynamic_content_page_pdf')
            ->wheredcpm_id($cmeScheme->uid)
            ->where('soft_delete', 0)
            ->get();


        $latestMessage = DB::table('website_menu_management')->where('url', 'message-from-president-g-b')->where('status', 3)->first();
        $latestMessageMetaInfo = DB::table('dynamic_content_page_metatag')->where('menu_uid', $latestMessage->uid)->first();
        $latestMessageContent = DB::table('dynamic_page_content')->where('dcpm_id', $latestMessageMetaInfo->uid)->first();
        $latestMessageData = [];
        if ($latestMessageContent) {
            $latestMessageData = [
                'page_title_en' => $latestMessageMetaInfo->page_title_en,
                'page_title_hi' => $latestMessageMetaInfo->page_title_hi,
                'page_content_en' => $latestMessageContent->page_content_en,
                'page_content_hi' => $latestMessageContent->page_content_hi,
                'url' => $latestMessage->url
            ];
        }


        $department = DB::table('emp_depart_designations')->where('name_en', "Hon'ble Minister of State (Independent Charge)")->where('parent_id', 0)->first();
        if(isset($department->uid) && $department->uid !=''){
            $cabinetMinisterData = DB::table('employee_directories')->where('department_id', $department->uid)->first();
        }else{
            $cabinetMinisterData = '..';
        }


       // $department = DB::table('emp_depart_designations')->where('name_en', "Ministry of AYUSH, Government of India, New Delhi")->where('parent_id', 0)->first();
       // $stateMinister = DB::table('employee_directories')->where('department_id', $department->uid)->where('soft_delete',0)->first();


        //$department = DB::table('emp_depart_designations')->where('name_en', "RAV Director")->where('parent_id', 0)->first();
        //$directorData = DB::table('employee_directories')->where('department_id', $department->uid)->first();


      //  $department = DB::table('emp_depart_designations')->where('name_en', "Ministry of AYUSH, Government of India, New Delhi")->where('parent_id', 0)->first();
       // $secretaryData = DB::table('employee_directories')->where('department_id', $department->uid)->first();


        $ourJournyData = DB::table('form_designs_management')->where('form_name', 'Our Successful Journey')->first();
        if ($ourJournyData) {
            $ourJournyData = DB::table('form_data_management')->where('form_design_id', $ourJournyData->uid)->get(['content']);
        }

        // dd($sectionZero);
        return view('home', compact('ourJournyData',
            // 'secretaryData',
              //'directorData',
             // 'stateMinister', 
              'cabinetMinisterData',
               'latestMessageData', 'tenders',
                'videosWithCategories', 'imageWithCategory',
                 'cmeSchemePdf','sectionZero'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUS()
    {
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
    public function feedbackSubmit(Request $request)
    {
        return view('pages.feedback');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function siteMap(Request $request)
    {
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
    public function SetLang(Request $request)
    {
        session()->put('locale', $request->data);
        $locale = $request->data;
        App::setLocale($locale);
        return response()->json(['data' => $request->data, True]);
    }
    public function getContentAllPages(Request $request, $slug, $middelSlug = null, $lastSlugs = null, $finalSlug = null, $finallastSlug = null)
    {

        $slugsToCheck = [$lastSlugs, $middelSlug, $finalSlug, $finallastSlug];

        if (in_array("set-language", $slugsToCheck)) {
            session()->put('locale', $request->data);
            App::setLocale($request->data);
            return response()->json(['data' => $request->data, 'success' => true]);
        } else {
            // Handle the case when none of the slugs match
        }
        try {
            $footerMenu = DB::table('website_menu_management')->where('menu_place', 1)->get();
            $currentMenuData = DB::table('website_menu_management')->where('url', $slug)->first();
            $isFooter = false;
            if ($currentMenuData->menu_place == 1) {
                $isFooter = true;
            }

            if ($finalSlug != null) {

                $finalUrl = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($slug)->first();
                $lastUrl = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($lastSlugs)->first();
                $middelUrl = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($middelSlug)->first();
                $menus = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($finalSlug)->first();
                if ($menus != '') {
                    $allmenus = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->orderBy('sort_order', 'ASC')->get();
                    $firstParent = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->where('uid', $lastUrl->parent_id)->first();
                    $metaDetails = DB::table('dynamic_content_page_metatag')
                        ->where('soft_delete', 0)
                        ->where('status', 3)
                        ->where('menu_uid', $menus->uid)
                        ->first();
                    if (!empty($firstParent)) {
                        $parentMenut = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->where('uid', optional($firstParent)->parent_id)->first();
                        if (!empty($parentMenut)) {
                            foreach ($allmenus as $menu) {
                                if ($parentMenut && $menu->parent_id == $parentMenut->uid) {
                                    $menu->children = [];
                                    foreach ($allmenus as $childMenu) {
                                        if ($childMenu->parent_id == $menu->uid) {
                                            $childMenu->children = [];
                                            foreach ($allmenus as $grandchildMenu) {
                                                if ($grandchildMenu->parent_id == $childMenu->uid) {
                                                    $childMenu->children[] = $grandchildMenu;
                                                }
                                            }
                                            $menu->children[] = $childMenu;
                                        }
                                    }
                                    $tree[] = $menu;
                                }
                            }
                        } else {
                            $parentMenut = '';
                            $tree = [];
                        }
                    } else {
                        $parentMenut = '';
                        $tree = [];
                    }
                }
                // dd($tree);
            } else if ($lastSlugs != null) {

                $lastUrl = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($slug)->first();
                $middelUrl = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($middelSlug)->first();
                $menus = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($lastSlugs)->first();
                $metaDetails = DB::table('dynamic_content_page_metatag')
                    ->where('soft_delete', 0)
                    ->where('status', 3)
                    ->where('menu_uid', $menus->uid)
                    ->first();
                if ($menus != '') {

                    $allmenus = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->orderBy('sort_order', 'ASC')->get();
                    $firstParent = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->where('uid', $menus->parent_id)->first();
                    if (!empty($firstParent)) {
                        $parentMenut = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->where('uid', optional($firstParent)->parent_id)->first();
                        if (!empty($parentMenut)) {
                            foreach ($allmenus as $menu) {
                                if ($parentMenut && $menu->parent_id == $parentMenut->uid) {
                                    $menu->children = [];
                                    foreach ($allmenus as $childMenu) {
                                        if ($childMenu->parent_id == $menu->uid) {
                                            $childMenu->children = [];
                                            foreach ($allmenus as $grandchildMenu) {
                                                if ($grandchildMenu->parent_id == $childMenu->uid) {
                                                    $childMenu->children[] = $grandchildMenu;
                                                }
                                            }
                                            $menu->children[] = $childMenu;
                                        }
                                    }
                                    $tree[] = $menu;
                                }
                            }
                        } else {
                            $parentMenut = '';
                            $tree = [];
                        }
                    } else {
                        $parentMenut = '';
                        $tree = [];
                    }
                }
            } elseif ($middelSlug != null) {

                $footerMenu = DB::table('website_menu_management')->where('menu_place', 1)->get();

                $middelUrl = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($slug)->first();
                $menus = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($middelSlug)->first();
                $metaDetails = DB::table('dynamic_content_page_metatag')
                    ->where('soft_delete', 0)
                    ->where('status', 3)
                    ->where('menu_uid', $menus->uid)
                    ->first();
                if ($menus != '') {
                    $allmenus = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->orderBy('sort_order', 'ASC')->get();
                    $parentMenut = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->where('uid', $menus->parent_id)->first();
                    if (!empty($parentMenut)) {
                        foreach ($allmenus as $menu) {
                            if ($menu->parent_id == $parentMenut->uid) {
                                $menu->children = [];
                                foreach ($allmenus as $childMenu) {
                                    if ($childMenu->parent_id == $menu->uid) {
                                        $childMenu->children = [];
                                        foreach ($allmenus as $grandchildMenu) {
                                            if ($grandchildMenu->parent_id == $childMenu->uid) {
                                                $childMenu->children[] = $grandchildMenu;
                                            }
                                        }
                                        $menu->children[] = $childMenu;
                                    }
                                }
                                $tree[] = $menu;
                            }
                        }
                    } else {
                        $parentMenut = '';
                        $tree = [];
                    }
                }
            } else {

                $menus = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($slug)->first();
            }
            if ($menus != '') {
                if ($finalSlug != null) {
                    if (Session::get('locale') == 'hi') {
                        $finalBred = $finalUrl->name_hi;
                    } else {
                        $finalBred = $finalUrl->name_en;
                    }
                    if (Session::get('locale') == 'hi') {
                        $lastBred = $middelUrl->name_hi;
                    } else {
                        $lastBred = $middelUrl->name_en;
                    }
                    if (Session::get('locale') == 'hi') {
                        $middelBred = $lastUrl->name_hi;
                    } else {
                        $middelBred = $lastUrl->name_en;
                    }
                    if (Session::get('locale') == 'hi') {
                        $title_name = $menus->name_hi;
                    } else {
                        $title_name = $menus->name_en;
                    }
                } else if ($lastSlugs != null) {
                    if (Session::get('locale') == 'hi') {
                        $lastBred = $lastUrl->name_hi;
                    } else {
                        $lastBred = $lastUrl->name_en;
                    }
                    if (Session::get('locale') == 'hi') {
                        $middelBred = $middelUrl->name_hi;
                    } else {
                        $middelBred = $middelUrl->name_en;
                    }
                    if (Session::get('locale') == 'hi') {
                        $title_name = $menus->name_hi;
                    } else {
                        $title_name = $menus->name_en;
                    }
                } elseif ($middelSlug != null) {
                    if (Session::get('locale') == 'hi') {
                        $middelBred = $middelUrl->name_hi;
                    } else {
                        $middelBred = $middelUrl->name_en;
                        // dd($middelBred);
                    }
                    if (Session::get('locale') == 'hi') {
                        $title_name = $menus->name_hi;
                    } else {
                        $title_name = $menus->name_en;
                    }
                } else {

                    if (Session::get('locale') == 'hi') {
                        $title_name = $menus->name_hi;
                    } else {
                        $title_name = $menus->name_en;
                    }
                }
                $quickLink = DB::table('website_menu_management')->where('menu_place', 4)->where('status', 3)->where('soft_delete', 0)->orderBy('sort_order', 'ASC')->get();
                $dynamic_content_page_metatag = DB::table('dynamic_content_page_metatag')
                    ->where('soft_delete', 0)
                    ->where('status', 3)
                    ->where('menu_uid', $menus->uid)
                    ->orderBy('created_at', 'asc')
                    ->orderBy('sort_order', 'ASC')
                    ->get();
                // dd($dynamic_content_page_metatag);
                if (count($dynamic_content_page_metatag) > 0) {
                    $organizedData = [];
                    foreach ($dynamic_content_page_metatag as $dynamic_content_page_metatags) {
                        $dynamic_content_page_pdf = DB::table('dynamic_content_page_pdf')
                            ->wheredcpm_id($dynamic_content_page_metatags->uid)
                            ->orderBy('created_at', 'asc')
                            ->where('soft_delete', 0)
                            ->get();
                        $dynamic_page_banner = DB::table('dynamic_page_banner')
                            ->where('status', 3)
                            ->where('soft_delete', 0)
                            ->wheredcpm_id($dynamic_content_page_metatags->uid)
                            ->first();
                        $dynamic_content_page_gallery = DB::table('dynamic_content_page_gallery')
                            ->wheredcpm_id($dynamic_content_page_metatags->uid)
                            ->where('status', 3)
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
                    if ($finalSlug != null) {

                        return view('master-page', ['isFooterMenu' => $isFooter,
                                'footerMenu' => $footerMenu, 'finalBred' => $finalBred, 
                                'parentMenut' => $parentMenut, 'tree' => $tree, 'lastBred' => $lastBred,
                                'middelBred' => $middelBred, 'quickLink' => $quickLink,
                                'title_name' => $title_name, 'organizedData' => $organizedData, 
                                'metaDetails' => $metaDetails]);
                    } else if ($lastSlugs != null) {
                        return view('master-page', ['isFooterMenu' => $isFooter,
                                'footerMenu' => $footerMenu, 'parentMenut' => $parentMenut, 
                                'tree' => $tree, 'lastBred' => $lastBred, 'middelBred' => $middelBred,
                                'quickLink' => $quickLink, 'title_name' => $title_name, 
                                'organizedData' => $organizedData, 'metaDetails' => $metaDetails]);
                    } elseif ($middelSlug != null) {

                        $governingBodyDepartments = [];
                        if ($middelSlug == 'governing-body') {
                            $governingBodyDepartments =  DB::table('emp_depart_designations')->where('parent_id', 0)->get();
                        }
                        return view('master-page', ['governingBodyDepartments' => $governingBodyDepartments,
                            'isFooterMenu' => $isFooter, 'footerMenu' => $footerMenu, 
                            'parentMenut' => $parentMenut, 'tree' => $tree,
                            'middelBred' => $middelBred, 'quickLink' => $quickLink, 
                            'title_name' => $title_name, 'organizedData' => $organizedData,
                            'metaDetails' => $metaDetails]);
                    } else {

                        $tree = [];
                        $parentMenut = "";
                        if ($slug == 'about-us') {
                            $middelSlug = 'our-objective';
                            $footerMenu = DB::table('website_menu_management')->where('menu_place', 1)->get();

                            $middelUrl = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($slug)->first();
                            $menus = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($middelSlug)->first();
                            $metaDetails = DB::table('dynamic_content_page_metatag')
                                ->where('soft_delete', 0)
                                ->where('status', 3)
                                ->where('menu_uid', $menus->uid)
                                ->first();
                            if ($menus != '') {
                                $allmenus = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->orderBy('sort_order', 'ASC')->get();
                                $parentMenut = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->where('uid', $menus->parent_id)->first();
                                if (!empty($parentMenut)) {
                                    foreach ($allmenus as $menu) {
                                        if ($menu->parent_id == $parentMenut->uid) {
                                            $menu->children = [];
                                            foreach ($allmenus as $childMenu) {
                                                if ($childMenu->parent_id == $menu->uid) {
                                                    $childMenu->children = [];
                                                    foreach ($allmenus as $grandchildMenu) {
                                                        if ($grandchildMenu->parent_id == $childMenu->uid) {
                                                            $childMenu->children[] = $grandchildMenu;
                                                        }
                                                    }
                                                    $menu->children[] = $childMenu;
                                                }
                                            }
                                            $tree[] = $menu;
                                        }
                                    }
                                } else {
                                    $parentMenut = '';
                                    $tree = [];
                                }
                            }
                        }



                        return view('master-page', ['tree' => $tree,
                         'parentMenut' => $parentMenut, 'isFooterMenu' => $isFooter,
                          'footerMenu' => $footerMenu, 'quickLink' => $quickLink,
                           'title_name' => $title_name, 'organizedData' => $organizedData
                        ]);
                    }
                } elseif ($middelSlug != null && $middelSlug == 'director-desk') {
                    $designation = DB::table('emp_depart_designations')
                        ->where('name_en', 'LIKE', 'Director')
                        ->where('status', 3)
                        ->where('soft_delete', 0)
                        ->orderBy('short_order', 'ASC')
                        ->where('publice_status', 1)
                        ->first();
                    if ($designation != '') {
                        $Director = DB::table('employee_directories')
                            ->where('designation_id', $designation->uid)
                            ->where('status', 3)
                            ->where('soft_delete', 0)
                            ->orderBy('short_order', 'ASC')
                            ->where('publice_status', 1)
                            ->first();
                        return view('master-page', ['isFooterMenu' => $isFooter, 'footerMenu' => $footerMenu, 'parentMenut' => $parentMenut, 'tree' => $tree, 'middelBred' => $middelBred, 'quickLink' => $quickLink, 'title_name' => $title_name, 'Director' => $Director]);
                    }
                } elseif ($middelSlug != null && $middelSlug == 'employee-directory') {
                    $designationData = [];
                    $department = DB::table('emp_depart_designations')
                        ->where('status', 3)
                        ->where('soft_delete', 0)
                        ->orderBy('short_order', 'ASC')
                        ->whereparent_id(0)
                        ->where('publice_status', 1)
                        ->get();
                    if (Count($department) > 0) {
                        foreach ($department as $designation) {
                            $data = DB::table('employee_directories as emp')
                                ->select('emp.*', 'desi.name_en as desi_name_en', 'desi.name_hi as desi_name_hi')
                                ->join('emp_depart_designations as desi', 'emp.designation_id', '=', 'desi.uid')
                                ->where('emp.status', 3)
                                ->where('emp.soft_delete', 0)
                                ->where('department_id', $designation->uid)
                                ->orderBy('emp.short_order', 'ASC')
                                ->where('emp.publice_status', 1)
                                ->get();
                            //  dd( $data);
                            $designationData[] = [
                                'department' => $designation,
                                'data' => $data,
                            ];
                        }
                        $sortedDesignationData = collect($designationData)->sortBy('department.short_order')->values()->all();
                        // return view('pages.employeeDirectory', ['sortedDesignationData' => $sortedDesignationData]);
                        return view('master-page', ['isFooterMenu' => $isFooter, 
                        'footerMenu' => $footerMenu, 'parentMenut' => $parentMenut,
                         'tree' => $tree, 'middelBred' => $middelBred, 
                         'quickLink' => $quickLink, 'title_name' => $title_name,
                          'sortedDesignationData' => $sortedDesignationData
                          ]
                        );
                    }
                } else {

                    if (Session::get('locale') == 'hi') {
                        $content = "जल्द आ रहा है";
                    } else {
                        $content = "<h1>Coming Soon...</h1>";
                    }
                    if ($finalSlug != null) {
                        return view('master-page', ['isFooterMenu' => $isFooter, 'footerMenu' => $footerMenu, 'parentMenut' => $parentMenut, 'tree' => $tree, 'middelBred' => $middelBred, 'quickLink' => $quickLink, 'finalBred' => $finalBred, 'lastBred' => $lastBred, 'content' => $content, 'title_name' => $title_name, 'metaDetails' => $metaDetails]);
                    } else if ($lastSlugs != null) {
                        return view('master-page', ['isFooterMenu' => $isFooter, 'footerMenu' => $footerMenu, 'parentMenut' => $parentMenut, 'tree' => $tree, 'middelBred' => $middelBred, 'quickLink' => $quickLink, 'lastBred' => $lastBred, 'content' => $content, 'middelBred' => $middelBred, 'title_name' => $title_name]);
                    } elseif ($middelSlug != null) {

                        $menuID = $menus->uid;
                        $pageContent = DB::table('form_designs_management')->where('website_menu_uid', $menuID)->first();
                        $formName = "";
                        $dynamicFormData = 0;

                        if ($pageContent) {
                            $formId = $pageContent->uid;
                            $content = DB::table('form_data_management')->where('form_design_id', $formId)->get(['content']);
                            $dynamicFormData = 1;
                            $formName = $pageContent->form_name;
                        }

                        $cabinetMinisterData = "";
                        if ($middelSlug == 'honourable-cabinet-minister') {
                            $department = DB::table('emp_depart_designations')->where('name_en', "Union Cabinet Minister, Ministry of Ayush & Ministry of Ports, Shipping and Waterways")->where('parent_id', 0)->first();
                            $cabinetMinisterData = DB::table('employee_directories')->where('department_id', $department->uid)->first();
                        }

                        $stateMinister = "";

                        if ($middelSlug == 'honourable-minister-of-state') {
                            $department = DB::table('emp_depart_designations')->where('name_en', "Ministry of Ayush and Ministry of Women & Child Development.")->where('parent_id', 0)->first();
                            $stateMinister = DB::table('employee_directories')->where('department_id', $department->uid)->first();
                        }

                        $rsbkDirectoryInstituteWise = 0;
                        if ($middelSlug == 'rsbk-directory-institute-wise') {
                            $rsbkDirectoryInstituteWise = 1;
                        }
                        return view('master-page', [
                            'rsbkDirectoryInstituteWise' => $rsbkDirectoryInstituteWise,
                            'stateMinister' => $stateMinister, 'cabinetMinisterData' => $cabinetMinisterData,
                            'isFooterMenu' => $isFooter, 'footerMenu' => $footerMenu, 'parentMenut' => $parentMenut,
                            'tree' => $tree, 'middelBred' => $middelBred, 'quickLink' => $quickLink,
                            'middelBred' => $middelBred,
                            'content' => $content,
                            'title_name' => $title_name,
                            'dynamicFormData' => $dynamicFormData, 'formName' => $formName]);
                    } else {
                        
                        $formData = DB::table('website_menu_management')
                            ->join('form_designs_management', 'website_menu_management.uid', '=', 'form_designs_management.website_menu_uid')
                            ->where('website_menu_management.url', $slug)
                            ->select('form_designs_management.*')
                            ->first();

                        if ($formData) {
                            $allFormData = DB::table('form_data_management')
                                ->where('form_design_id', $formData->uid)
                                ->get();
                        } else {
                            $allFormData = [];
                        }
                        $middelBred = "";
                        $directorData = "";
                        if ($slug == 'director') {
                            $department = DB::table('emp_depart_designations')->where('name_en', "RAV Director")->where('parent_id', 0)->first();
                            $directorData = DB::table('employee_directories')->where('department_id', $department->uid)->first();
                        }

                        $secretaryData = "";
                        if ($slug == 'honourable-secretary') {
                            $department = DB::table('emp_depart_designations')->where('name_en', "Secretary, Ministry of AYUSH, Government of India, New Delhi")->where('parent_id', 0)->first();
                            $secretaryData = DB::table('employee_directories')->where('department_id', $department->uid)->first();
                        }
                        $tenders = [];
                        if ($slug == "tenders") {
                            $tenders = DB::table('tender_management')
                                ->join('tender_details', 'tender_details.tender_id', '=', 'tender_management.uid')
                                ->select('tender_management.*', 'tender_details.pdfimage_size as pdf_size', 'tender_details.file_extension', 'tender_details.public_url', 'tender_details.private_url', 'tender_details.tab_type')
                                ->get();
                        }

                        $careers = [];
                        if ($slug == "career") {
                            $careers = DB::table('career_management')
                                ->join('career_management_details', 'career_management_details.career_management_id', '=', 'career_management.uid')
                                ->select('career_management.*', 'career_management.start_date as career_start_date', 'career_management.end_date as career_end_date', 'career_management_details.*')
                                ->get();
                        }



                        $states = [
                            'delhi',
                            'goa',
                            'gujarat',
                            'himachal-pradesh',
                            'karnataka',
                            'kerala',
                            'madhya-pradesh',
                            'chhattisgarh',
                            'maharashtra',
                            'odisha',
                            'punjab',
                            'rajasthan',
                            'uttar-pradesh',
                            'uttarakhand',
                        ];

                        $specialSlugs = [
                            'rsbk-directory-from-1951-to-1960',
                            'rsbk-directory-from-1961-to-1970',
                            'rsbk-directory-from-1971-to-1980',
                            'rsbk-directory-from-1981-to-1990',
                            'rsbk-directory-from-1991-to-2000',
                            'rsbk-directory-from-2001-to-2005',
                            'rsbk-directory-from-2006-to-2010',
                            'rsbk-directory-from-2011-to-2015',
                            'rsbk-directory-from-2016-to-2020',
                            'rsbk-directory-from-2021-to-2023',
                        ];

                        $qualificationSlugs = [
                            'm-pharma',
                            'm-d',
                            'p-g',
                            'ph-d',
                        ];

                        $displayRsbkMenu = 0;
                        $lastBred = null;

                        if (in_array($slug, $states)) {
                            if (Session::get('locale') == 'hi') {
                                $lastBred = "आरएसबीके ई-डायरेक्टरी";
                                $middelBred = "आरएसबीके डायरेक्टरी राज्यवार";
                            } else {
                                $lastBred = "Rsbk e-directory";
                                $middelBred = "RSBK Directory State Wise";
                            }


                            $displayRsbkMenu = 1;
                        } elseif (in_array($slug, $specialSlugs)) {

                            $displayRsbkMenu = 1;
                            if (Session::get('locale') == 'hi') {
                                $lastBred = "आरएसबीके ई-डायरेक्टरी";
                                $middelBred = "आरएसबीके डायरेक्टरी वर्षवार";
                            } else {
                                $lastBred = "Rsbk e-directory";
                                $middelBred = "RSBK Directory Year Wise";
                            }
                        } elseif (in_array($slug, $qualificationSlugs)) {

                            $displayRsbkMenu = 1;
                            if (Session::get('locale') == 'hi') {
                                $lastBred = "आरएसबीके ई-डायरेक्टरी";
                                $middelBred = "आरएसबीके डायरेक्टरी योग्यता वार";
                            } else {
                                $lastBred = "Rsbk e-directory";
                                $middelBred = "RSBK Directory Qualification Wise";
                            }
                        } else {
                            $lastBred = "";
                        }

                        $tree = $this->getRsbkDirectoryMenu('rsbk-e-directory', 'rsbk-directory-year-wise');
                        $parentMenut = $this->getRsbkDirectoryMenu('rsbk-e-directory', 'rsbk-directory-year-wise');
                        
                        
                        return view('master-page', ['lastBred' => $lastBred, 'tree' => $tree, 'parentMenut' => $parentMenut,
                         'displayRsbkMenu' => $displayRsbkMenu, 'middelBred' => $middelBred, 
                         'careers' => $careers, 'tenders' => $tenders, 'secretaryData' => $secretaryData, 
                         'directorData' => $directorData, 'allFormData' => $allFormData, 'isFooterMenu' => $isFooter,
                         'footerMenu' => $footerMenu, 'quickLink' => $quickLink, 'title_name' => $title_name, 
                         'content' => $content,]);
                    }
                }
            } else {

                return view('pages.error');
            }
        } catch (\Exception $e) {
            \Log::error('An exception occurred: ' . $e->getMessage());
            return view('pages.error');
        } catch (\PDOException $e) {
            \Log::error('A PDOException occurred: ' . $e->getMessage());
            return view('pages.error');
        } catch (\Throwable $e) {
            // Catch any other types of exceptions that implement the Throwable interface.
            \Log::error('An unexpected exception occurred: ' . $e->getMessage());
            return view('pages.error');
        }
    }

    /** Brijesh Sharma 15-05-1024 */
    public function getAllPageContent(Request $request, $slug1 = null, $slug2 = null, $slug3 = null)
    {
       if($slug1 != null && $slug2 != null && $slug3 != null){
            $slug = $slug3;
       }elseif($slug1 != null && $slug2 != null && $slug3 == null){
            $slug = $slug2;
       }elseif($slug1 != null && $slug2 == null && $slug3 == null){
            $slug = $slug1;
       }else{
            $slug = $slug1;
       }
       
       $breadcum3 = DB::table('website_menu_management')->where('url',$slug3)->where('soft_delete', 0)->where('status', 3)->orderBy('sort_order', 'ASC')->first();
       $breadcum2 = DB::table('website_menu_management')->where('url',$slug2)->where('soft_delete', 0)->where('status', 3)->orderBy('sort_order', 'ASC')->first();
       $breadcum1 = DB::table('website_menu_management')->where('url',$slug1)->where('soft_delete', 0)->where('status', 3)->orderBy('sort_order', 'ASC')->first();
       if(Session::get('locale') == 'hi'){  $breadcums1 =$breadcum1->name_hi ?? ''; } else {  $breadcums1 =$breadcum1->name_en ?? '';  }
       if(Session::get('locale') == 'hi'){  $breadcums2 =$breadcum2->name_hi ?? ''; } else {  $breadcums2 =$breadcum2->name_en ?? '';  }
       if(Session::get('locale') == 'hi'){  $breadcums3 =$breadcum3->name_hi ?? ''; } else {  $breadcums3 =$breadcum3->name_en ?? '';  }
       
       $main_menu_slug = DB::table('website_menu_management')->where('url',$slug1)->where([['soft_delete', 0],['status',3]])->get();
      
       if(count($main_menu_slug)>0){
            foreach($main_menu_slug as $main_men){
                    $menu = new \stdClass;
                    $menu->main_menu =$main_men;
                    $menu->main_menu->sub_menu = DB::table('website_menu_management')->where('parent_id',$main_men->uid)->where('soft_delete', 0)->where('status', 3)->orderBy('sort_order', 'ASC')->get();
                foreach($menu->main_menu->sub_menu as $submenu){
                        $menu->sub_menu =$submenu;
                        $menu->sub_menu->sub_sub_menu = DB::table('website_menu_management')->where('parent_id',$submenu->uid)->where('soft_delete', 0)->where('status', 3)->orderBy('sort_order', 'ASC')->get();
                    }   
                }
            }else{
                return view('pages.error');
            }
        $getForm = '';
        if(Session::get('locale') == 'hi'){  $titleName =config('staticTextLang.comingsoon_hi')?? 'जल्द आ रहा है'; } else {  $titleName =config('staticTextLang.comingsoon_en')?? 'coming soon';  }
        $metaData = DB::table('dynamic_content_page_metatag')->where('menu_slug',$slug)->where([['soft_delete', 0],['status',3]])->first();
        if(isset($metaData) && $metaData != null){
            $pageContent = DB::table('dynamic_page_content')->where('dcpm_id',$metaData->uid)->where([['soft_delete', 0]])->first();
            $pagePdf = DB::table('dynamic_content_page_pdf')->where('dcpm_id',$metaData->uid)
                                ->where([['soft_delete', 0]])->orderBy(DB::raw("DATE_FORMAT(start_date,'%Y-%m-%d')"), 'desc')->get();
            $pageGallery = DB::table('dynamic_content_page_gallery')->where('dcpm_id',$metaData->uid)->where([['soft_delete', 0]])->get();
            $pageBanner = DB::table('dynamic_page_banner')->where('dcpm_id',$metaData->uid)->where([['soft_delete', 0]])->first();
        }       
        elseif($slug){
            
            $single_menu = DB::table('website_menu_management')->where('url',$slug)->where('soft_delete', 0)->where('status', 3)->first();
            if($single_menu !=null){
                $getForm = DB::table('form_designs_management')->where('website_menu_uid',$single_menu->uid)->where('soft_delete', 0)->where('status', 3)->first();
                if(!empty($getForm)){
                    $getFormData = DB::table('form_data_management')->where('form_design_id',$getForm->uid)->where('soft_delete', 0)->where('status', 3)->get();
                }
            }
        }
       if(!empty($getForm)){
        foreach(json_decode($getForm->content) as $tableHead){
                if($tableHead->label != 'Submit' && $tableHead->label != 'submit' && $tableHead->label != 'save' && $tableHead->label != 'Save' && $tableHead->label != 'Button' && $tableHead->label != 'button'){
                    $head[]=$tableHead;
                }
            }
        }
        if(!empty($getFormData)){
            foreach(json_decode($getFormData) as $key=>$formdata){
                $dataForm[]=json_decode($formdata->content);
            }
        }
        $departmentEmployees = '';
        if($slug == 'governing-body'){
            $designationData = [];
            $employees = DB::table('employee_directories')
                ->where('status', 3)
                ->where('soft_delete', 0)
                ->orderByRaw('CASE WHEN short_order IS NULL THEN 1 ELSE 0 END, short_order ASC')
                ->get();
            if ($employees->isNotEmpty()) {
                $departmentIds = $employees->pluck('department_id')->unique();
                $designationIds = $employees->pluck('designation_id')->unique();
                $departments = DB::table('emp_depart_designations')
                    ->whereIn('uid', $departmentIds)
                    ->pluck('name_en', 'uid');
                $designations = DB::table('emp_depart_designations')
                    ->whereIn('uid', $designationIds)
                    ->pluck('name_en','uid'); // Changed from 'parent_id' to 'uid'
                foreach ($employees as $employee) {
                    $departmentName = $departments[$employee->department_id] ?? null;
                    $designationName = $designations[$employee->designation_id] ?? null;

                    $designationData[] = [
                        'data' => $employee,
                        'department' => $departmentName,
                        'designation' => $designationName,
                    ];
                }
                // Define a custom comparison function for sorting by short_order
                usort($designationData, function($a, $b) {
                    $shortOrderA = $a['data']->short_order ?? PHP_INT_MAX;
                    $shortOrderB = $b['data']->short_order ?? PHP_INT_MAX;
                    return $shortOrderA <=> $shortOrderB;
                });

                $departmentEmployees = collect($designationData)
                    ->sortBy(fn($item) => $item['short_order'] ?? PHP_INT_MAX)
                    ->values()
                    ->all();
            }
        }
        if($slug == 'honourable-cabinet-minister'){
            $honourablecabinetminister = DB::table('employee_directories as emp')
                        ->select('emp.*','deprt.name_en as desi_name_en','deprt.name_hi as desi_name_hi',
                            DB::raw("CONCAT(emp.fname_en, ' ',CASE WHEN emp.mname_en IS NOT NULL THEN emp.mname_en ELSE '' END, ' ', emp.lname_en) as name_en"),
                            DB::raw("CONCAT(emp.fname_hi, ' ',CASE WHEN emp.mname_hi IS NOT NULL THEN emp.mname_hi ELSE '' END, ' ', emp.lname_hi) as name_hi"))
                        ->leftjoin('emp_depart_designations as deprt','emp.designation_id','=','deprt.uid')
                        ->where('deprt.uid', '46d1e4ec-209f-4410-9bf0-1bd676253853')
                        ->where('emp.status', 3)
                        ->where('emp.soft_delete', 0)
                        ->first();
        }
        if($slug == 'honourable-minister-of-state'){
            $honourableministerofstate = DB::table('employee_directories as emp')
                        ->select('emp.*','deprt.name_en as desi_name_en','deprt.name_hi as desi_name_hi',
                            DB::raw("CONCAT(emp.fname_en, ' ',CASE WHEN emp.mname_en IS NOT NULL THEN emp.mname_en ELSE '' END, ' ', emp.lname_en) as name_en"),
                            DB::raw("CONCAT(emp.fname_hi, ' ',CASE WHEN emp.mname_hi IS NOT NULL THEN emp.mname_hi ELSE '' END, ' ', emp.lname_hi) as name_hi"))
                        ->leftjoin('emp_depart_designations as deprt','emp.designation_id','=','deprt.uid')
                        ->where('deprt.uid', '3943e904-7730-4774-a2a2-e1b6cacb85f3')
                        ->where('emp.status', 3)
                        ->where('emp.soft_delete', 0)
                        ->first();
        }
        //dd($dataForm);

        $quickLink = DB::table('website_menu_management')->where('menu_place', 4)->where('status', 3)->where('soft_delete', 0)->orderBy('sort_order', 'ASC')->get();
        $data = new \stdClass;
        $data->metaDatas =$metaData??'';
        $data->pageContents =$pageContent??[];
        $data->pagePdfs =$pagePdf??[];
        $data->pageGallerys =$pageGallery??[];
        $data->pageBanners =$pageBanner??'';
        $data->formbuilderdata =$dataForm??[];
        //$data->formDataTableHead =isset($getForm->content)?json_decode($getForm->content):'';
        $data->formDataTableHead =isset($head)?$head:[];
        $data->formDataTableHeadCount =isset($head)?(count($head)):'';
        if(Session::get('locale') == 'hi'){  $titleName =$metaData->page_title_hi ?? 'जल्द आ रहा है'; } else {  $titleName =$metaData->page_title_en ?? 'coming soon';  }
        //dd($slug);
        // dd($data);
        return view('master-page', [
                    'title' => $titleName,
                    'sideMenu'=>$menu??'', 
                    'pageData'=>$data,
                    'slug' =>$slug??'',
                    'breadcum1' => $breadcums1,
                    'breadcum2' => $breadcums2,
                    'breadcum3' => $breadcums3,
                    'quickLink'=>$quickLink,
                    'departmentEmployees' => $departmentEmployees??'',
                    'honourablecabinetminister'=>$honourablecabinetminister??'',
                    'honourableministerofstate'=>$honourableministerofstate??''
                ]);
    }
    /** End 15-05-1024 */




    public function getRsbkDirectoryMenu($slug, $middelSlug)
    {
        $footerMenu = DB::table('website_menu_management')->where('menu_place', 1)->get();

        $middelUrl = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($slug)->first();
        $menus = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($middelSlug)->first();
        $metaDetails = DB::table('dynamic_content_page_metatag')
            ->where('soft_delete', 0)
            ->where('status', 3)
            ->where('menu_uid', $menus->uid)
            ->first();
        if ($menus != '') {
            $allmenus = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->orderBy('sort_order', 'ASC')->get();
            $parentMenut = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->where('uid', $menus->parent_id)->first();
            if (!empty($parentMenut)) {
                foreach ($allmenus as $menu) {
                    if ($menu->parent_id == $parentMenut->uid) {
                        $menu->children = [];
                        foreach ($allmenus as $childMenu) {
                            if ($childMenu->parent_id == $menu->uid) {
                                $childMenu->children = [];
                                foreach ($allmenus as $grandchildMenu) {
                                    if ($grandchildMenu->parent_id == $childMenu->uid) {
                                        $childMenu->children[] = $grandchildMenu;
                                    }
                                }
                                $menu->children[] = $childMenu;
                            }
                        }
                        $tree[] = $menu;
                    }
                }
            } else {
                $parentMenut = '';
                $tree = [];
            }
        }
    }

    public function newsDetails($id)
    {
        $news = DB::table('news_management')->where('uid', $id)->first();
        $quickLink = DB::table('website_menu_management')->where('menu_place', 4)->where('status', 3)->where('soft_delete', 0)->orderBy('sort_order', 'ASC')->get();
        return view('pages.news-details', compact('news', 'quickLink'));
    }

    public function newsAllList(){
        $newsList = DB::table('news_management')->where([['status', 3],['soft_delete',0]])->orderBy('created_at', 'desc')->get();
        //$news_management = DB::table('news_management')->where('soft_delete', 0)->where('status', 3)->latest('created_at')->get();
            
        return view('pages.news-all-list',['news'=>$newsList]);
    }
}
