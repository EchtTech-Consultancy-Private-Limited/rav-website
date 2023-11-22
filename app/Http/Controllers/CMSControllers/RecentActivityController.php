<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\RecentActivity;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;

class RecentActivityController extends Controller
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
            $crudUrlTemplate['list'] = route('recentactivity-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('recentactivity.edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('recentactivity-delete', ['id' => 'xxxx']);
        }
        
        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');
        return view('cms-view.recent-activity.list-ra',
            ['crudUrlTemplate' =>  json_encode($crudUrlTemplate)
    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$data=EmpDepartDesignation::where([['soft_delete','0'],['parent_id','0']])->get(); 
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create'] = route('recentactivity-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }

       return view('cms-view.recent-activity.create-ra',
       ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),   
        'textMessage' =>$accessPermission??''
        //'department'=>$data
    
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
     * @param  \App\Models\RecentActivity  $recentActivity
     * @return \Illuminate\Http\Response
     */
    public function show(RecentActivity $recentActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecentActivity  $recentActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update'] = route('recentactivity-update');
        }
        
        $results = RecentActivity::where('uid', $request->id)->first();
        if($results){
            $result = $results;
        }else{
            abort(404);
        }
        //dd($result);
        return view('cms-view.recent-activity.edit-ra',
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
            'data'=> $result,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecentActivity  $recentActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecentActivity $recentActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecentActivity  $recentActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecentActivity $recentActivity)
    {
        //
    }
}
