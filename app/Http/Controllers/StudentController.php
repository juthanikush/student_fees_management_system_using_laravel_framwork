<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $result['account']=DB::table('accountants')->where(['name'=>$request->post('username')])->get();
        if($encrptpass=Crypt::decryptString($result['account'][0]->password)==$request->post('password'))
        {
            $request->session()->put('ADMIN_ACCOUNT',true);
            $request->session()->put('ACCOUNT_LOGIN',$request->post('username'));
            return redirect('student/studashboard');
        }
        $request->session()->flash('errorr','Place enter correct details');
        return redirect('admin');
        //$result['account'][0]->password
        //$encrptpass=Crypt::decryptString($encrptpass);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_account(Request $request,$id='')
    {
        if($id){
            $arr=Student::where(["id"=>$id])->get();
            $result['id']=$id;
            $result['name']=$arr['0']->name;
            $result['email']=$arr['0']->email;
            $result['gender']=$arr['0']->gender;
            $result['course']=$arr['0']->course;
            $result['fees']=$arr['0']->fees;
            $result['paid']=$arr['0']->paid;
            $result['duefees']=$arr['0']->duefees;
            $result['address']=$arr['0']->address;
            $result['contact_us']=$arr['0']->contact_us;
        }else{
            $result['id']='';
            $result['name']='';
            $result['email']='';
            $result['gender']='';
            $result['course']='';
            $result['fees']='';
            $result['paid']='';
            $result['duefees']='';
            $result['address']='';
            $result['contact_us']='';
        }
        return view('add_student',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        if($request->post('id')>0){
            $model=Student::find($request->post('id'));
            $mes="Student Update";
        }else{
            $model= new Student();
            $mes="Student Add";
        }
        $model->name=$request->post('name');
        $model->email=$request->post('email');
        $model->gender=$request->post('gender');
        $model->course=$request->post('course');
        $model->fees=$request->post('fees');
        $model->paid=$request->post('paid');
        $model->duefees=$request->post('duefees');
        $model->address=$request->post('address');
        $model->contact_us=$request->post('contact_us');
       $model->save();
       $request->session()->flash('message',$mes);
      
       return redirect('student/studashboard');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result['student']=Student::all();
        return view('show_student',$result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $model=Student::find($id);
        $model->delete();
        $request->session()->flash('message','Student Delete');
        return redirect('student/studashboard');
    }
    public function duefees(Request $request)
    {
        $data['student']=DB::table('students')->where('duefees','>',0)->get();
        return view('duefees',$data);
    }

    
    public function search(Request $request)
    {
        $data['student']=DB::table('students')->where('name',$request->post('search'))->get();
        return view('result',$data);
    }
}
