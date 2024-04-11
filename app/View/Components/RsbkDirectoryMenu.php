<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class RsbkDirectoryMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $slug = "rsbk-e-directory";
        $middleSlug = "rsbk-directory-qualification-wise";

        $footerMenu = DB::table('website_menu_management')->where('menu_place', 1)->get();

        $middelUrl = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($slug)->first();
        $menus = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->whereurl($middleSlug)->first();

        
        if ($menus != '') {
            $metaDetails = DB::table('dynamic_content_page_metatag')
            ->where('soft_delete', 0)
            ->where('status', 3)
            ->where('menu_uid', $menus->uid)
            ->first();
            $allmenus = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->orderBy('sort_order', 'ASC')->get();
            $parentMenu = DB::table('website_menu_management')->where('soft_delete', 0)->where('status', 3)->where('uid', $menus->parent_id)->first();
            if (!empty($parentMenu)) {
                foreach ($allmenus as $menu) {
                    if ($menu->parent_id == $parentMenu->uid) {
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
                $parentMenu = '';
                $tree = [];
            }
        }

        return view('components.rsbk-directory-menu', compact('tree', 'footerMenu', 'middelUrl', 'metaDetails', 'slug', 'middleSlug','parentMenu'));
    }
}
