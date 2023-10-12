<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentAjaxController extends Controller
{
    //

    public function index()
    {
        $students =Student::all();
        return view('student',compact('students'));
    }

//    public function edit($id){
//         $student= Student::find($id);
//         return view('student',compact('student'));
//     }


    public function add(Request $request)
    {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('student',$filename);
        $add = Student::create([

            'first_name' => $request->first_name,
            'last_name'=> $request->last_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'country' => $request->country,
            'image' => $filename

        ]);
        if($add){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Record created succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Record created failed!'
            ];
            return $response;
        }
    }
    public function update(Request $request)
    {

    }

    public function destroy($id)
    {
        $student =Student::where('id',$id)->delete();
         return response(['status'=>'Deleted Successfully']);
    }
}
