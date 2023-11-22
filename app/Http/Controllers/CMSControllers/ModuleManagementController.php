<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\ModuleManagement;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;

class ModuleManagementController extends Controller
{
    use AccessModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('module-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('module.edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('module-delete', ['id' => 'xxxx']);
        }
        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');

        return view('cms-view.module-management.module-list',
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create'] = route('module-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }
        
        return view('cms-view.module-management.module-add',
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),    
            'textMessage' =>$accessPermission??''
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModuleManagement  $moduleManagement
     * @return \Illuminate\Http\Response
     */
    public function show(ModuleManagement $moduleManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModuleManagement  $moduleManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update'] = route('module-update');
        }
        
        $results = ModuleManagement::where('uid', $request->id)->first();
        if($results){
            $result = $results;
        }else{
            abort(404);
        }
        return view('cms-view.module-management.module-edit',
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),'data'=> $result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModuleManagement  $moduleManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModuleManagement $moduleManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModuleManagement  $moduleManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModuleManagement $moduleManagement)
    {
        //
    }
}
