<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('settings.index', compact('settings'));
    }


    public function save(Request $request)
    {
        foreach ($request->all() as $key => $value){
            if (in_array($key, Setting::SETTING_KEYS)){
                Setting::updateOrCreate([
                    'key' => strtoupper($key)
                ], [
                    'value' => $value ?? null
                ]);

            }

        }


        return back()->with('success', 'عملیات با موفقیت انجام شد.');
    }
}
