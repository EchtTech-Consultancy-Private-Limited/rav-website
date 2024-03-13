<?php
namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\NewsManagement;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use DB;

class NewsManagementController extends Controller
{
    use AccessModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $create = 'news-management.news_add';
    protected $edit = 'news-management.news_edit';
    protected $list = 'news-management.news_list';
    
    public function index()
    {
        $crudUrlTemplate = array();
        // xxxx to be replaced with ext_id to create valid endpoint
        if(isset($this->abortIfAccessNotAllowed()['read']) && $this->abortIfAccessNotAllowed()['read'] !=''){
            $crudUrlTemplate['list'] = route('news-list');
        }
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['edit'] = route('news.edit', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['delete']) && $this->abortIfAccessNotAllowed()['delete'] !=''){
            $crudUrlTemplate['delete'] = route('news-delete', ['id' => 'xxxx']);
        }
        if(isset($this->abortIfAccessNotAllowed()['approver']) && $this->abortIfAccessNotAllowed()['approver'] !=''){
            $crudUrlTemplate['approver'] = route('news-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['approver'] = '0';
        }
        if(isset($this->abortIfAccessNotAllowed()['publisher']) && $this->abortIfAccessNotAllowed()['publisher'] !=''){
            $crudUrlTemplate['publisher'] = route('news-approve', ['id' => 'xxxx']);
        }else{
            $crudUrlTemplate['publisher'] = '0';
            
        }
        
        //$crudUrlTemplate['view'] = route('websitecoresetting.websitecoresetting-list');

        return view('cms-view.'.$this->list,
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
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['create']) && $this->abortIfAccessNotAllowed()['create'] !=''){
            $crudUrlTemplate['create_news'] = route('news-save');
        }else{
            $accessPermission = $this->checkAccessMessage();
        }

        return view('cms-view.'.$this->create,
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
     * @param  \App\Models\NewsManagement  $newsManagement
     * @return \Illuminate\Http\Response
     */
    public function show(NewsManagement $newsManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsManagement  $newsManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $crudUrlTemplate = array();
        if(isset($this->abortIfAccessNotAllowed()['update']) && $this->abortIfAccessNotAllowed()['update'] !=''){
            $crudUrlTemplate['update'] = route('news-update');
            $crudUrlTemplate['deletepdfimg'] = route('pdf-delete-news');
        }

        $results = NewsManagement::where('uid', $request->id)->first();
        $pdfimagesData = DB::table('news_details')->where('news_id', $results->uid)->where([['soft_delete','=','0']])->get();
        if($results){
            $result = $results;
        }else{
            abort(404);
        }
        //dd($result);
        return view('cms-view.'.$this->edit,
        ['crudUrlTemplate' =>  json_encode($crudUrlTemplate),
        'data'=> $result,
        'pdfData' => isset($pdfimagesData)?$pdfimagesData:'',
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsManagement  $newsManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsManagement $newsManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsManagement  $newsManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsManagement $newsManagement)
    {
        //
    }
}
