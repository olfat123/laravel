<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Storage;
use Up;

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
        $data = $this->validate(request(),
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
            !empty(setting()->logo) ? Storage::delete(setting()->logo):'';
            $data['logo'] = Up::upload([
                    'new_name' => '',
                    'file' => 'logo',
                    'path' => 'settings',
                    'upload_type' => 'single'
            ]);
        }
        if(request()->hasFile('icon')){
            !empty(setting()->icon) ? Storage::delete(setting()->icon):'';
            $data['icon'] = request()->file('icon')->store('settings');
        }
        Setting::orderBy('id','desc')->update($data);
        session()->flash('success', trans('admin.record_updated'));
        return redirect('/admin/settings');

    }

   
 
}
