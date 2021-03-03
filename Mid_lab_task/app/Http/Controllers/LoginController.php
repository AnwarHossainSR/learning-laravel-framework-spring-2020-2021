<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|min:8|max:20',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = User::where('email','=',$request->email)->first();

            if ($user->type == 'admin') {
                $request->session()->put('loggedUser',$user->id);
                return \redirect('dashboard/admin');
            } elseif($user->type == 'customer') {
                $request->session()->put('loggedUser',$user->id);
                return \redirect('dashboard/customer');
            }elseif($user->type == 'accountant') {
                $request->session()->put('loggedUser',$user->id);
                return \redirect('dashboard/accountant');
            }elseif($user->type == 'salesman'){
                $request->session()->put('loggedUser',$user->id);
                return \redirect('dashboard/salesman');
            }else if($user->type == 'businesspartner'){
                $request->session()->put('loggedUser',$user->id);
                return \redirect('dashboard/businesspartner');
            }else{
                $request->session()->put('loggedUser',$user->id);
                return \redirect('dashboard/vendor');
            }
        }else{
            return back()->with('error','Email or password is incorrect');
        }

    }

    public function superAdminDashboard()
    {
        $data = User::find(session('loggedUser'));
        return view('superadmin.include.home')->with('data',$data);
    }
    public function customerDashboard()
    {
        $data = User::find(session('loggedUser'));
        return view('customer.dashboard')->with('data',$data);
    }
    public function accountantDashboard()
    {
        $data = User::find(session('loggedUser'));
        return view('accountant.dashboard')->with('data',$data);
    }
    public function salesmanDashboard()
    {
        $data = User::find(session('loggedUser'));
        return view('salesman.dashboard')->with('data',$data);
    }
    public function businesspartnerDashboard()
    {
        $data = User::find(session('loggedUser'));
        return view('businesspartner.dashboard')->with('data',$data);
    }
    public function vendorDashboard()
    {
        $data = User::find(session('loggedUser'));
        return view('vendor.dashboard')->with('data',$data);
    }
}
