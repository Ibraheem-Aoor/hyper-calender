<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $info = CompanyInfo::query()->first();
        return view('admin.basic_info.index',compact('info'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'company_name' => 'required|max:255',
            'sys_email' => 'required|max:255',
            'from_email' => 'required|max:255',
            'reg_no' => 'required|max:255'
        ]);

        $info = CompanyInfo::query()->firstOrCreate();
        $info->update($request->all());
        Session::flash('success','Information Saved Successfully!');
        return redirect()->back();
    }
}
