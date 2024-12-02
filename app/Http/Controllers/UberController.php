<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UberUser,slider,service_type,order_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;



class UberController extends Controller
{
    public function register(Request $request)
  {
   
  $validator = Validator::make($request->all(), [
    'first_name'=>'required|string|max:20',
    'last_name'=>'required|string|max:20',
    //  'email'=>'string|max:32',
    'mobile'=>'required|string|max:10',
    
    
]);

if ($validator->fails()) {
    return response()->json([
        'success' => false,
        'status' => true,
        'message' => $validator->errors()->first(),
    ], 400);
}
$user=UberUser::insert
  ([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            // 'email'=>$request->email,
            'mobile'=>$request->mobile,
    ]);
  
if($user == true){
  return response()->json ([
        'message' => 'register successfully!',
        'status' => true
  ]);
  }else{
    return response()->json ([
        'message' => 'something went wrong',
        'status' => false
  ]);
  }
}

// login through mobile 
public function login(Request $request)
{
    $validator = Validator::make($request->all(),[
    'mobile'=>'required|',
    ]);
    
    if ($validator->fails()){
        return response()->json
        ([
            'success' => false,
             'status' =>true,
             'message' => $validator->errors()->first(),
        ],400);
    }
    $mobile= $request->mobile;
    
    // method to check mobile no exist in database or not.
   $user = UberUser::where('mobile',$mobile)->first();
   
//   dd($user);
    if($user){
        $id= $user->id;
        return response()->json
        ([
            'success' => true,
            'message' => 'Login Succussfully!',
            'user_id'=> $id,
            'status'=>1,
        ]);
}else {
    return response()->json 
    ([
        'success' => false,
        'message' => 'You are not register , please register first !',
        'status'=> 0
    ]);
   }
}

// slider  api
public function slider(Request $request)
{
   // get the slider image
    // $sliders = DB::select("select * from `sliders`");
    $sliders=DB::table('sliders')
    ->get();
    
    if($sliders)
    {
        return response()-> json
        ([
        'success' => true,
        'message'=>'fetched slider image',
        'data'=>$sliders,
        ]);
    }   else
        {
            return response()->json
            ([
            'status'=>'false',
            'message'=>'no data found'
            ]);
        }
}
public function user_profile($id)
{
    $user=DB::table('uber_users')->where('id', $id)->first();
    if($user){
        return response()->json([
    'success'=>true,
    'message'=>'Data fetch Successfully!',
    'data'=>$user,
        ]);
    }else{
        return response()->json([
            'success'=>false,
            'message'=>'No Data Found '
                    ]); 
    } 
}
public function prof_update(Request $request)
{
    $validateUser=Validator::make($request->all(),[
       'id' => 'required',
       
    ]);
    if ($validateUser->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation Failed',
            'error' => $validateUser->errors()
        ], 200);
    }
    
    $data = [];
    $baseUrl = URL::to('/');
    // Handle profile image update
    $imageData = $request->input('image');
    // echo($imageData); die;
    if ($imageData) {
        $imageName = Str::random(20) . '.png';
        // echo($imageName); die;
        $imagePath = public_path('upload') . '/' . $imageName;
        
        if (file_put_contents($imagePath, base64_decode($imageData))) {
            $image = $baseUrl . '/upload/' . $imageName;
            // echo($data); die;
            // print_r($data);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to save image',
            ], 400);
        }
    }

    // $field is a random variable name 
    $fields = ['image', 'username','email'];
        foreach ($fields as $field) {
            if($request->input('image'))
             {
                $data['image'] = $image;
            }if($request->input($field)){
                $data[$field] = $request->input($field);  
            }
        }
        // print_r($data); die;
        if (!empty($data)) {
           
        DB::table('uber_users')
        ->where('id', $request->input('id'))
        ->update($data);
        }
    
        
        return response()->json([
        'success' => true,
        'message' => 'Updated successfully.'
        ], 200);

    
}
// service_type get api
public function service_type(Request $request)
{
$service=DB::table('service_type')->get();
if(empty($service))
{
    return response()->json([
       'success'=>false,
       'error'=>'Not Found' 
    ],200);
}else{
    return response()->json([
        'success'=>true,
        'message'=>'Succussfull',
      'data'=>$service
     ],200);
}
}

// ride_request 
public function ride_request(Request $request)
{
   $validator= Validator::make($request->all(),
   [
        'userid'=>'required',
        'from_address'=>'required',
        'from_latitude'=>'required',
        'from_longitude'=>'required',
        'to_address'=>'required',
        'to_latitude'=>'required',
        'to_longitude'=>'required',
        'service_id'=>'required',
        'total_amount'=>'required',
   ]);

   if($validator->fails())
   {
       return response()->json([
           'succuss'=> false,
           'status'=> true,
           'message'=>$validator->errors()->first(),
           ],400);
   }

   $user=DB::table('ride_request')->insert
   ([
        'userid'=>$request->input('userid'),
        'from_address'=>$request->input('from_address'),
        'from_latitude'=>$request->input('from_latitude'),
        'from_longitude'=>$request->input('from_longitude'),
        'to_address'=>$request->input('to_address'),
        'to_latitude'=>$request->input('to_latitude'),
        'to_longitude'=>$request->input('to_longitude'),
        'total_amount'=>$request->input('total_amount'),
        
    ]);
   if($user){
   return response()-> json([
    'success'=>true,
    'message'=>'succussfully',
   ],200);
    }else{
    return response()->json([
    'status'=>'false',
    'message'=>'not added'
    ]);
}
}
}



