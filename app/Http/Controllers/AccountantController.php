<?php

namespace App\Http\Controllers;

use App\Models\Accountant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AccountantController extends Controller
{
    
    public function index(Request $request)
    {
        $result['data']=Accountant::all();
        return view('show_account',$result);
    }

   
    public function add_account(Request $request,$id='')
    {
        if($id>0){
            $arr=Accountant::where(["id"=>$id])->get();
            $result['id']=$id;
            $result['name']=$arr['0']->name;
            $result['password']=$encrptpass=Crypt::decryptString($arr['0']->password);
            $result['email']=$arr['0']->email;
            $result['address']=$arr['0']->address;
            $result['contact']=$arr['0']->contact;
        }else{
            $result['id']='';
            $result['name']='';
            $result['password']='';
            $result['email']='';
            $result['address']='';
            $result['contact']='';
        }
        return view('add_accountent',$result);
    }


    public function add(Request $request)
    {
        
        if($request->post('id')>0){
            $model=Accountant::find($request->post('id'));
            $mes="Accountant update";
        }else{
            $model = new Accountant();
            $mes="Accountant Add";
        }
        $model->name=$request->post('name');
        $model->password=Crypt::encryptString($request->post('password'));
        $model->email=$request->post('email');
        $model->address=$request->post('address');
        $model->contact=$request->post('contact');
        $model->save();
        $request->session()->flash('message',$mes);

        return redirect('admin/deshboad');
    }
    public function delete(Request $request,$id)
    {
        $model=Accountant::find($id);
        $model->delete();
        $request->session()->flash('message','Account Delete');
        return redirect('admin/deshboad');
    }
    
}
