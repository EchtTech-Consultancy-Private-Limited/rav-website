<?php
namespace App\Http\Controllers\CMSControllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

use App\Models\CMSModels\FormBuilder;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use DB, Validator;
use Carbon\Carbon;

class FormBuilderAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('form_designs_management')->where('soft_delete','0')->get();
        $totalRecords = DB::table('form_designs_management')->where('soft_delete','0')->count();
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

    public function formMappingIndex(){
        $data=DB::table('form_designs_management')->where('soft_delete','0')->get();
        $totalRecords = DB::table('form_designs_management')->where('soft_delete','0')->count();
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
        // $exitValue = DB::table('form_designs_management')->where('form_name', $request->form_name)->count() > 0;
        // if($exitValue == 'false'){
        //     $notification =[
        //         'status'=>201,
        //         'message'=>'This is duplicate value.'
        //     ];
        // }else{
        try{
            $validator=Validator::make($request->all(),
                [
                'form_name'=>'required|string|unique:form_designs_management,form_name',
               // "content.*"    => "required|array",
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
                $result= DB::table('form_designs_management')->insert([
                        'uid' => Uuid::uuid4(),
                        'form_name' => $request->form_name,
                        'content' => $request->content,
                        
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
     * @param  \App\Models\FormBuilder  $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if(!empty($request->get('id'))){
            $item = DB::table('form_designs_management')->where('uid',$request->get('id'))->first();
        }else{
            $item ='No Form';
        }
        
        return $item;
    }
    public function showEdit(Request $request)
    {
        if(!empty($request->get('id'))){
            $item = DB::table('form_designs_management')->where('uid',$request->get('id'))->first();
        }else{
            $item ='No Form';
        }
        
        return $item;
    }
    public function saveFormData(Request $request){

        try{
            $validator=Validator::make($request->all(),
                [
                'form_design_id'=>'required',
                "content"    => "required|array",
                "content.*"    => "required",
            ]);
            if($validator->fails())
            {
                $notification =[
                    'status'=>201,
                    'message'=> $validator->errors()
                ];
            }
            else{
                $result= DB::table('form_data_management')->insert([
                        'uid' => Uuid::uuid4(),
                        'form_design_id' => $request->form_name,
                        'content' => $request->content,
                        
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormBuilder  $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function edit(FormBuilder $formBuilder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormBuilder  $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormBuilder $formBuilder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormBuilder  $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=DB::table('form_designs_management')->where('uid',$id)->first();
        if($data)
        {
         DB::table('form_designs_management')->where('uid',$id)->update(['soft_delete'=>1]);
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
