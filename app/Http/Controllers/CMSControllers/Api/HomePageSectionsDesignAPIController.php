<?php

namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\HomePageSectionsDesign;
use Illuminate\Http\Request;
use App\Http\Traits\PdfImageSizeTrait;
use Ramsey\Uuid\Uuid;
use Validator, DB;
use Carbon\Carbon;

class HomePageSectionsDesignAPIController extends Controller
{
    use PdfImageSizeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('home_page_sections_designs_details as m')
                                    ->select('m.*','sl.title_en as section_name')
                                    ->leftJoin('home_page_sections_list as sl','m.hpsi_id','=','sl.uid')
                                    ->where('m.soft_delete','0')
                                    ->get();
        $totalRecords = DB::table('home_page_sections_designs_details as m')
                                    ->select('m.*','sl.title_en as section_name')
                                    ->leftJoin('home_page_sections_list as sl','m.hpsi_id','=','sl.uid')
                                    ->where('m.soft_delete','0')
                                    ->count();
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
    public function indexNewSections()
    {
        $data= DB::table('home_page_sections_list')->where('soft_delete','0')->get();
        $totalRecords = DB::table('home_page_sections_list')->where('soft_delete','0')->count();
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
        // $exitValue = HomePageSectionsDesign::where([['title_name_en', $request->title_name_en],['soft_delete',0]])->count() > 0;
        // if($exitValue == 'false'){
        //     $notification =[
        //         'status'=>201,
        //         'message'=>'This is duplicate value.'
        //     ];
        // }else{
        //dd($request->file('image'));
        try{
            
            if($request->kt_description_en != "<p><br></p>"){
                $request['kt_description_en'] =$request->kt_description_en;
            }else{
                $request['kt_description_en'] = '';
            }
            $validator=Validator::make($request->all(),
                [

                'kt_description_en' => 'required',
                'section_id'=>'required',
                'sort_order'=>'required',
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
                $result= DB::table('home_page_sections_designs_details')->insert([
                        'uid' => Uuid::uuid4(),
                        'hpsi_id' => $request->section_id,
                        'content_en' => $request->kt_description_en,
                        'content_hi' => $request->kt_description_hi??$request->kt_description_en,
                        'url' => $request->url_link,
                        'sort_order' => $request->sort_order,
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
    //}
        return response()->json($notification);
    }
    public function storeNewSections(Request $request)
        {

            $exitValue = DB::table('home_page_sections_list')->where([['title_en', $request->title_name_en],['soft_delete',0]])->count() > 0;
            
            if($exitValue == false){
                $notification =[
                    'status'=>201,
                    'message'=>'This is duplicate value.'
                ];
            }else{
            //dd($request->file('image'));
            try{
                $validator=Validator::make($request->all(),
                    [
                    'sort_order'=>'required',
                    'section_name_en'=>'required',
                    'section_name_hi'=>'required',
                ]);
                if($validator->fails())
                {
                    $notification =[
                        'status'=>201,
                        'message'=> $validator->errors()
                    ];
                }
                else{
                    $result= DB::table('home_page_sections_list')->insert([
                            'uid' => Uuid::uuid4(),
                            'title_en' => $request->section_name_en,
                            'title_hi' => $request->section_name_hi,
                            'sort_order' => $request->sort_order,
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
        public function updateNewSection(Request $request)
        {
            // $exitValue = DB::table('home_page_sections_list')->where([['title_en', $request->title_name_en],['soft_delete',0]])->count() > 0;
            // if($exitValue == 'false'){
            //     $notification =[
            //         'status'=>201,
            //         'message'=>'This is duplicate value.'
            //     ];
            // }else{
            //dd($request->file('image'));
            try{
                $validator=Validator::make($request->all(),
                    [
                    'sort_order'=>'required',
                    'section_name_en'=>'required',
                    'section_name_hi'=>'required',
                ]);
                if($validator->fails())
                {
                    $notification =[
                        'status'=>201,
                        'message'=> $validator->errors()
                    ];
                }
                else{
                    $result= DB::table('home_page_sections_list')->where('uid',$request->id)->update([
                            'title_en' => $request->section_name_en,
                            'title_hi' => $request->section_name_hi,
                            'sort_order' => $request->sort_order,
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
        //}
            return response()->json($notification);
        }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomePageSectionsDesign  $homePageSectionsDesign
     * @return \Illuminate\Http\Response
     */
    public function show(HomePageSectionsDesign $homePageSectionsDesign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePageSectionsDesign  $homePageSectionsDesign
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePageSectionsDesign $homePageSectionsDesign)
    {
        $data=HomePageSectionsDesign::where('uid',$id)->first();
        if($data)
                {
                    return response()->json(['data'=>$data],200);
                }
                else{
                    return response()->json([
                    'status'=>201,
                    'message'=>'some error accoured.'
                ],201);
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePageSectionsDesign  $homePageSectionsDesign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePageSectionsDesign $homePageSectionsDesign)
    {
        try{
            $request['kt_description_en'] =$request->kt_description_en;
            $validator=Validator::make($request->all(),
                [

                'kt_description_en' => 'required',
                'section_id'=>'required',
                'sort_order'=>'required',
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
                $result= DB::table('home_page_sections_designs_details')->where('uid',$request->id)->update([
                        'hpsi_id' => $request->section_id,
                        'content_en' => $request->kt_description_en,
                        'content_hi' => $request->kt_description_hi??$request->kt_description_en,
                        'url' => $request->url_link,
                        'sort_order' => $request->sort_order,
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
    //}
        return response()->json($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePageSectionsDesign  $homePageSectionsDesign
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePageSectionsDesign $homePageSectionsDesign,$id)
    {
        $data=DB::table('home_page_sections_designs_details')->where('uid',$id)->first();
        if($data)
        {
            DB::table('home_page_sections_designs_details')->where('uid',$id)->update(['soft_delete'=>'1']);
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
    public function destroyNewSection(HomePageSectionsDesign $homePageSectionsDesign, $id)
    {
        $data=DB::table('home_page_sections_list')->where('uid',$id)->first();
        if($data)
        {
            DB::table('home_page_sections_list')->where('uid',$id)->update(['soft_delete'=>'1']);
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
