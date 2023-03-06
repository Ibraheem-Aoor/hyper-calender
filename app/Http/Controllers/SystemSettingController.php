<?php

namespace App\Http\Controllers;

use App\Models\SystemSetting;
use App\Repositories\SettingsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SystemSettingController extends Controller
{
    /**
     * @var SettingsRepository
     */
    protected $repository;

    /**
     * SystemSettingController constructor.
     * @param SettingsRepository $repository
     */
    public function __construct(SettingsRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $info = SystemSetting::query()->first();
        $repository = $this->repository;
        return view('admin.system_setting.index',compact('info','repository'));
    }

    public function update(Request $request)
    {
        $info = SystemSetting::query()->firstOrCreate();
        $info->update($request->all());

        Session::flash('success','Settings has been updated!');

        return redirect()->back();
    }

    /**
     * Upload favicon to storage
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function favicon(Request $request)
    {
        $this->validate($request,[
            'favicon' => 'required'
        ]);

        if($request->hasFile('favicon')){
            $favicon = time().$request->file('favicon')->getClientOriginalName();
            $request->file('favicon')->move(public_path().'/assets/img/favicon/', $favicon);
            $data['favicon'] = $favicon;
        }

        $info = SystemSetting::query()->firstOrCreate();
        $info->update($data);

        Session::flash('success','Favicon has been uploaded!');

        return redirect()->back();
    }

    /**
     * Upload logo to storage
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logo(Request $request)
    {
        $this->validate($request,[
            'logo' => 'required'
        ]);

        if($request->hasFile('logo')){
            $logo = time().$request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path().'/assets/img/logos/', $logo);
            $data['logo'] = $logo;
        }

        $info = SystemSetting::query()->firstOrCreate();
        $info->update($data);

        Session::flash('success','Logo has been uploaded!');

        return redirect()->back();
    }
}
