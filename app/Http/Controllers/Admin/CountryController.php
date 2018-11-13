<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Country;
use Illuminate\Http\Request;
use App\DataTables\CountriesDataTable;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CountriesDataTable $country)
    {
        return $country->render('admin.countries.index',['title' =>'countries Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/countries.create',['title'=> _('admin.addcountry')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(),
            ['country_name_ar' => 'required',
             'country_name_en' => 'required',
             'mob' => 'required',
             'code' => 'required',
             'logo' => 'sometimes|nullable|'.validate_image(),            

            ],
            [],
            [
             'country_name_ar' => _('admin.country_name_ar'),
             'country_name_en' => _('admin.country_name_en'),
             'mob' => 'admin.country_mob',
             'code' => 'admin.country_code',
             'logo' => 'country_logo'
            ]
        );
        if(request()->hasFile('logo')){
            
            $data['logo'] = Up::upload([
                    'new_name' => 'country_flag',
                    'file' => 'logo',
                    'path' => 'countries',
                    'upload_type' => 'single',
                    'delete_file' => '',
            ]);
        }

        Country::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect('/admin/countries');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::find($id);
        $title = _('admin.edit');
        return view('admin.countries.edit', compact('country','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r,  $id)
    {
        $data = $this->validate(request(),
            [
             'country_name_ar' => 'required',
             'country_name_en' => 'required',
             'mob' => 'required',
             'code' => 'required',
             'logo' => 'required|'.validate_image(),            

            ],
            [],
            [
             'country_name_ar' => _('admin.country_name_ar'),
             'country_name_en' => _('admin.country_name_en'),
             'mob' => _('admin.country_mob'),
             'code' => _('admin.country_code'),
             'logo' => _('country_logo'),
            ]
        );

        if(request()->hasFile('logo')){
            
            $data['logo'] = Up::upload([
<<<<<<< HEAD
                    'new_name' => 'country_flag',
                    'file' => 'logo',
                    'path' => 'countries',
                    'upload_type' => 'single',
=======
                'new_name' => '',
                'file' => 'logo',
                'path' => 'countries',
                'upload_type' => 'single',
>>>>>>> b9ea63f6a83990312e4c7450fee810364f04a37f
                'delete_file' => Country::find($id)->logo,
            ]);
        }

        Country::where('id', $id)->update($data);
        session()->flash('success', _('admin.update_record'));
        return redirect('/admin/countries');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countries = Country::find($id);
        Storage::delete($countries->logo);
        $countries->delete();
        session()->flash('success', _('admin.deleted_record'));
        return redirect('/admin/countries');
    }

    public function multi_delete() {
        if(is_array(request('item'))){
            foreach (request('item') as $id) {
                $countries = Country::find($id);
                Storage::delete($countries->logo);
                $countries->delete();
            }
        }else{
                $countries = Country::find(request('item'));
                Storage::delete($countries->logo);
                $countries->delete();
        }
        session()->flash('success', _('admin.deleted_record'));
        return redirect('/admin/countries');
    }
}
