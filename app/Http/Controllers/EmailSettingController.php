<?php

namespace App\Http\Controllers;

use \App\Models\EmailSetting;
use Illuminate\Http\Request;

class EmailSettingController extends Controller
{
    public function index()
    {
        $email = collect([
            'MAIL_MAILER' => env('MAIL_MAILER'),
            'MAIL_HOST' => env('MAIL_HOST'),
            'MAIL_PORT' => env('MAIL_PORT'),
            'MAIL_USERNAME' => env('MAIL_USERNAME'),
            'MAIL_PASSWORD' => env('MAIL_PASSWORD'),
            'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION'),
            'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS'),
            'MAIL_FROM_NAME' => env('MAIL_FROM_NAME'),
        ]);

        return view('admin.settings.email_setting',compact('email'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "MAIL_MAILER" => "required",
            "MAIL_HOST" => "required",
            "MAIL_PORT" => "required",
            "MAIL_USERNAME" => "required",
            "MAIL_PASSWORD" => "required",
            "MAIL_ENCRYPTION" => "required",
            "MAIL_FROM_ADDRESS" => "required|email",
            "MAIL_FROM_NAME" => "required",
        ],[
            "MAIL_MAILER.required" => 'Mail driver is required',
            "MAIL_HOST.required" => 'Mail host is required',
            "MAIL_PORT.required" => 'Mail port is required',
            "MAIL_USERNAME.required" => 'Username is required',
            "MAIL_PASSWORD.required" => 'Password is required',
            "MAIL_ENCRYPTION.required" => 'Encryption is required',
            "MAIL_FROM_ADDRESS.required" => 'From address is required',
            "MAIL_FROM_ADDRESS.email" => 'From address should be a valid email address',
            "MAIL_FROM_NAME.required" => 'From name is required',
        ]);

        foreach($request->except('_token') as $key => $value){
            $this->setEnvironmentValue($key,"\"".$value."\"");
        }

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        return EmailSetting::query()->findOrFail($request->id);
    }

    public function update(Request $request)
    {
        $data = EmailSetting::query()->findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('setting.email');
    }

    public function destroy($id)
    {
        $data = EmailSetting::query()->findOrFail($id);
        $data->delete();
        return redirect()->route('setting.email');
    }

    private function setEnvironmentValue($envKey, $envValue)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        $str .= "\n"; // In case the searched variable is in the last line without \n
        $keyPosition = strpos($str, "{$envKey}=");
        $endOfLinePosition = strpos($str, PHP_EOL, $keyPosition);
        $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
        $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
        $str = substr($str, 0, -1);

        $fp = fopen($envFile, 'w');
        fwrite($fp, $str);
        fclose($fp);
    }
}
