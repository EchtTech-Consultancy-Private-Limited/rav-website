<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App, Route, DB,Session;
use Exception;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

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
           // dd($toogleMenu);

            $view->with(['modelname' => $modelName, 'menu' => $menuData,
             'headerMenu' => $menuName, 'footerMenu' => $footerMenu, 
             'banner' => $banner, 'news_management' => $news_management, 
             'tender_management' => $tender_management,'social_links'=>$social_links,
             'alertMessage' =>$this->checkLanguage(),
             'website_core_settings'=>$website_core_settings,
             'toogleMenu'=>$toogleMenu
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
