<?php

namespace App\Http\Controllers\CMSControllers\API;


use App\Http\Controllers\Controller;

use App\Models\CMSModels\PrivateGovernmentClients;
use Illuminate\Http\Request;
use App\Http\Traits\AccessModelTrait;
use Ramsey\Uuid\Uuid;
use App\Http\Traits\PdfImageSizeTrait;
use DB, Validator;
use Carbon\Carbon;

class PrivateGovernmentClientsAPIController extends Controller
{
    use PdfImageSizeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=PrivateGovernmentClients::where('soft_delete','0')->get();
        $totalRecords = PrivateGovernmentClients::where('soft_delete','0')->count();
        $resp = new \stdClass;
        $resp->iTotalRecords = $totalRecords;
        $resp->iTotalDisplayRecords = $totalRecords;
        $resp->aaData = $data;
        if($resp)
            {
                return response()->json($resp,200);
            }
            else{
                return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exitValue = PrivateGovernmentClients::where([['title_en', $request->title_name_en],['soft_delete',0]])->count() > 0;
        if($exitValue == 'false'){
            $notification =[
                'status'=>201,
                'message'=>'This is duplicate value.'
            ];
        }else{
        //dd($request->file('image'));
        try{
            $validator=Validator::make($request->all(),
                [
                'tabtype'=>'required',
                'title_name_en'=>'required',
                'logo_url'=>'required',
                'image' => "required|mimes:jpeg,bmp,png,gif,svg|max:2048|dimensions:max_width=230,max_height=80"
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
                if($request->hasFile('image')){    
                    $size = $this->getFileSize($request->file('image')->getSize());
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $file=$request->file('image');
                    $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                    $path=resource_path(env('IMAGE_FILE_FOLDER_CMS').'/clientlogo');
                    $file->move($path,$newname);
                }
                
                $result= PrivateGovernmentClients::insert([
                        'uid' => Uuid::uuid4(),
                        'tab_type' => $request->tabtype,
                        'title_en' => $request->title_name_en,
                        'title_hi' => $request->title_name_hi,
                        'title_alt' => $request->title,
                        'sort_order' => $request->sort_order,
                        "pdfimage_size" => isset($size)?$size:'0',
                        "file_extension" => isset($extension)?$extension:'0',
                        'start_date'=> $request->startdate,	
                        'end_date' => $request->enddate,
                        'public_url' => $newname,
                        'private_url' => $newname,
                        'url' => $request->logo_url,
                    // 'archivel_date' => Carbon::createFromFormat('Y-m-d',$request->enddate)->addDays(env('TENDER_ARCHIVEL')),
                    ]);
                
            if($result == true)
            {
                $notification =[
                    'status'=>200,
                    'message'=>'Added successfully.'
                ];
            }
            else{
                $notification = [
                        'status'=>201,
                        'message'=>'some error accoured.'
                    ];
                } 
            }
       }catch(Throwable $e){report($e);
        return false;
       }
    }
        return response()->json($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrivateGovernmentClients  $PrivateGovernmentClients
     * @return \Illuminate\Http\Response
     */
    public function show(PrivateGovernmentClients $PrivateGovernmentClients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrivateGovernmentClients  $PrivateGovernmentClients
     * @return \Illuminate\Http\Response
     */
    public function edit(PrivateGovernmentClients $PrivateGovernmentClients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrivateGovernmentClients  $PrivateGovernmentClients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrivateGovernmentClients $PrivateGovernmentClients)
    {
        try{
            $validator=Validator::make($request->all(),
                [
                'tabtype'=>'required',
                'title_name_en'=>'required',
                //'image' => "required|mimes:jpeg,bmp,png,gif,svg|max:10000"
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
                if($request->hasFile('image')){    
                    $size = $this->getFileSize($request->file('image')->getSize());
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $file=$request->file('image');
                    $newname=time().rand(10,99).'.'.$file->getClientOriginalExtension();
                    $path=resource_path('uploads/clientlogo');
                    $file->move($path,$newname);
                }else{
                    $newnames = PrivateGovernmentClients::where('uid',$request->id)->first();
                    $newname = $newnames->public_url;
                }
                $result= PrivateGovernmentClients::where('uid',$request->id)->update([
                    'tab_type' => $request->tabtype,
                    'title_en' => $request->title_name_en,
                    'title_hi' => $request->title_name_hi,
                    'title_alt' => $request->title,
                    'sort_order' => $request->sort_order,
                    "pdfimage_size" => isset($size)?$size:'0',
                    "file_extension" => isset($extension)?$extension:'0',
                    'start_date'=> $request->startdate,	
                    'end_date' => $request->enddate,
                    'public_url' => $newname,
                    'private_url' => $newname,
                    'url' => $request->logo_url,
                    'status' => 1,
                    // 'archivel_date' => Carbon::createFromFormat('Y-m-d',$request->enddate)->addDays(env('TENDER_ARCHIVEL')),
                    ]);
                
            if($result == true)
            {
                $notification =[
                    'status'=>200,
                    'message'=>'Added successfully.'
                ];
            }
            else{
                $notification = [
                        'status'=>201,
                        'message'=>'some error accoured.'
                    ];
                } 
            }
       }catch(Throwable $e){report($e);
        return false;
       }
        return response()->json($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrivateGovernmentClients  $PrivateGovernmentClients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=PrivateGovernmentClients::where('uid',$id)->first();
        if($data)
        {
            PrivateGovernmentClients::where('uid',$id)->update(['soft_delete'=>'1']);
            return response()->json([
                'status'=>200,
                'message'=>'deleted successfully.'
            ],200);
        }
        else{
                return response()->json([
                'status'=>201,
                'message'=>'some error accoured.'
            ],201);
        }
    }
}
