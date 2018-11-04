<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Validator;
class Settings extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setting()
    {
        return view('admin.settings',['title'=> _('admin.settings')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_setting()
    {
        $this->validate(request(),
            [
                'logo'=> validate_image(),
                'icon'=>validate_image()
            ],
            [],
            [
                'logo'=>trans('admin.logo'),
                'icon'=>trans('admin.icon')
            ]);
        $data = request()->except(['_token', '_method']);
        if(request()->hasFile('logo')){

        }
        Setting::orderBy('id','desc')->update($data);
        session()->flash('success', trans('admin.record_updated'));
        return redirect('/admin/settings');

    }

   
 
}
