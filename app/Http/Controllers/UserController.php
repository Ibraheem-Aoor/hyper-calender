<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.user.view',compact('user'));
    }


    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => [
                'email',
                Rule::unique('users')->ignore(Auth::id())
            ]
        ]);
        $user = Auth::user();
        $user->update($request->except('password'));
        Session::flash('success','Profile information updated!');
        return redirect()->back();
    }

    public function password(Request $request)
    {
        $this->validate($request,[
            'password' => 'required|confirmed'
        ]);

        $request['password'] = bcrypt($request->get('password'));

        $user = Auth::user();
        $user->update($request->only('password'));
        Session::flash('success','Profile information updated!');
        return redirect()->back();
    }

    public function avatar(Request $request)
    {
        if($request->hasFile('avatar')){

            $avatar = now().'.'.$request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path().'/assets/img/avatars/', $avatar);
            $data['avatar'] = $avatar;

            try{
                auth()->user()->update($data);
            }catch (\Exception $e){
                dd($e);
            }

        }else{
            Session::flash('error','Please upload a valid image.');
        }

        Session::flash('success','Avatar has been changed.');

        return redirect()->back();
    }

}
