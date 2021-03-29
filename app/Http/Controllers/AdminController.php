<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/deshboad');
        }else{
            return view('login');
        }
        return view('login');

    }

    public function auth(Request $request)
    {
        
        $username=$request->post('aname');
        $password=$request->post('apass');
        $result=admin::where(['username'=>$username])->first();

        if($result){
            $pass=Crypt::decryptString($result['password']);
            if($password==$pass){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_USERNAME',$username);
                return redirect('admin/deshboad');
            }
            else{
                $request->session()->flash('error','Please enter valid login details');
                return redirect('admin');
            }
        }
        $request->session()->flash('error','Please enter valid login details');
        return redirect('admin');
        //encrypting password
        //$model->password=Crypt::encryptString($request->post('apass'));
        

       //$encrptpass=Crypt::decryptString($encrptpass);
    }

    
}
