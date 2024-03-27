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
            
            $galleryCategories = DB::table('gallery_management')->where('type',0)->where('status',3)->get();
            $imageWithCategory = [];
            foreach ($galleryCategories as $item) {
                $categoryImageData = DB::table('gallery_details')->where('gallery_id',$item->uid)->first();
                $imageWithCategory[] = [
                    'image' => $categoryImageData->public_url,
                    'title_name_en' => $item->title_name_en,
                    'title_name_hi' => $item->title_name_hi
                ];
            }

            $galleryCategories = DB::table('gallery_management')->where('type',1)->where('status',3)->get();
            $videosWithCategories = [];
            foreach ($galleryCategories as $item) {
                $videImageData = DB::table('gallery_details')->where('gallery_id',$item->uid)->first();
               if (isset($videImageData)) {
                $videosWithCategories[] = [
                    'video_id' => $videImageData->public_url,
                    'title_name_en' => $item->title_name_en,
                    'title_name_hi' => $item->title_name_hi
                ];
               }
            }


            $cmeScheme = DB::table('dynamic_content_page_metatag')
            ->where('menu_slug','cme-scheme')
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

            // dd($videosWithCategories);
        return view('home', compact('tenders','videosWithCategories','imageWithCategory','cmeSchemePdf'));
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
            session()->put('Lang', $request->data);
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
                    if (Session::get('Lang') == 'hi') {
                        $finalBred = $finalUrl->name_hi;
                    } else {
                        $finalBred = $finalUrl->name_en;
                    }
                    if (Session::get('Lang') == 'hi') {
                        $lastBred = $middelUrl->name_hi;
                    } else {
                        $lastBred = $middelUrl->name_en;
                    }
                    if (Session::get('Lang') == 'hi') {
                        $middelBred = $lastUrl->name_hi;
                    } else {
                        $middelBred = $lastUrl->name_en;
                    }
                    if (Session::get('Lang') == 'hi') {
                        $title_name = $menus->name_hi;
                    } else {
                        $title_name = $menus->name_en;
                    }
                } else if ($lastSlugs != null) {
                    if (Session::get('Lang') == 'hi') {
                        $lastBred = $lastUrl->name_hi;
                    } else {
                        $lastBred = $lastUrl->name_en;
                    }
                    if (Session::get('Lang') == 'hi') {
                        $middelBred = $middelUrl->name_hi;
                    } else {
                        $middelBred = $middelUrl->name_en;
                    }
                    if (Session::get('Lang') == 'hi') {
                        $title_name = $menus->name_hi;
                    } else {
                        $title_name = $menus->name_en;
                    }
                } elseif ($middelSlug != null) {
                    if (Session::get('Lang') == 'hi') {
                        $middelBred = $middelUrl->name_hi;
                    } else {
                        $middelBred = $middelUrl->name_en;
                        // dd($middelBred);
                    }
                    if (Session::get('Lang') == 'hi') {
                        $title_name = $menus->name_hi;
                    } else {
                        $title_name = $menus->name_en;
                    }
                } else {

                    if (Session::get('Lang') == 'hi') {
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

                        return view('master-page', ['isFooterMenu' => $isFooter, 'footerMenu' => $footerMenu, 'finalBred' => $finalBred, 'parentMenut' => $parentMenut, 'tree' => $tree, 'lastBred' => $lastBred, 'middelBred' => $middelBred, 'quickLink' => $quickLink, 'title_name' => $title_name, 'organizedData' => $organizedData, 'metaDetails' => $metaDetails]);
                    } else if ($lastSlugs != null) {
                        return view('master-page', ['isFooterMenu' => $isFooter, 'footerMenu' => $footerMenu, 'parentMenut' => $parentMenut, 'tree' => $tree, 'lastBred' => $lastBred, 'middelBred' => $middelBred, 'quickLink' => $quickLink, 'title_name' => $title_name, 'organizedData' => $organizedData, 'metaDetails' => $metaDetails]);
                    } elseif ($middelSlug != null) {
                        
                        $governingBodyDepartments = [];
                       if ($middelSlug == 'governing-body') {
                        $governingBodyDepartments =  DB::table('emp_depart_designations')->where('parent_id',0)->get();
                       }
                   
                    //    dd($governingBodyDepartments);

                        return view('master-page', ['governingBodyDepartments'=>$governingBodyDepartments,'isFooterMenu' => $isFooter, 'footerMenu' => $footerMenu, 'parentMenut' => $parentMenut, 'tree' => $tree, 'middelBred' => $middelBred, 'quickLink' => $quickLink, 'title_name' => $title_name, 'organizedData' => $organizedData, 'metaDetails' => $metaDetails]);
                    } else {
                        
                        return view('master-page', ['isFooterMenu' => $isFooter, 'footerMenu' => $footerMenu, 'quickLink' => $quickLink, 'title_name' => $title_name, 'organizedData' => $organizedData]);
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
                        return view('master-page', ['isFooterMenu' => $isFooter, 'footerMenu' => $footerMenu, 'parentMenut' => $parentMenut, 'tree' => $tree, 'middelBred' => $middelBred, 'quickLink' => $quickLink, 'title_name' => $title_name, 'sortedDesignationData' => $sortedDesignationData]);
                    }
                } else {
                    
                    if (Session::get('Lang') == 'hi') {
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

                       
                        return view('master-page', ['isFooterMenu' => $isFooter, 'footerMenu' => $footerMenu, 'parentMenut' => $parentMenut, 'tree' => $tree, 'middelBred' => $middelBred, 'quickLink' => $quickLink, 'middelBred' => $middelBred, 'content' => $content, 'title_name' => $title_name, 'dynamicFormData' => $dynamicFormData, 'formName' => $formName]);
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

                        return view('master-page', ['allFormData' => $allFormData, 'isFooterMenu' => $isFooter, 'footerMenu' => $footerMenu, 'quickLink' => $quickLink, 'title_name' => $title_name, 'content' => $content,]);
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
}
