<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Model\City;
use Illuminate\Http\Request;
use App\DataTables\CitiesDataTable;
use Storage;
use Up;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CitiesDataTable $city)
    {
        return $city->render('admin.cities.index',['title' =>'cities Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/cities.create',['title'=> _('admin.addcity')]);
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
            ['city_name_ar' => 'required',
             'city_name_en' => 'required',
             'country_id' =>'required|numeric'          
            ],
            [],
            [
             'city_name_ar' => _('admin.city_name_ar'),
             'city_name_en' => _('admin.city_name_en'),             
            ]
        );      

        City::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect('/admin/cities');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function show(city $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        $title = _('admin.edit');
        return view('admin.cities.edit', compact('city','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\city  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r,  $id)
    {
        $data = $this->validate(request(),
            [
             'city_name_ar' => 'required',
             'city_name_en' => 'required',
             'country_id' =>'required|numeric' 
            ],
            [],
            [
             'city_name_ar' => _('admin.city_name_ar'),
             'city_name_en' => _('admin.city_name_en'),             
            ]
        );      

        City::where('id', $id)->update($data);
        session()->flash('success', _('admin.update_record'));
        return redirect('/admin/cities');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cities = City::find($id);       
        $cities->delete();
        session()->flash('success', _('admin.deleted_record'));
        return redirect('/admin/cities');
    }

    public function multi_delete() {
        if(is_array(request('item'))){
            foreach (request('item') as $id) {
                $cities = City::find($id);                
                $cities->delete();
            }
        }else{
                $cities = City::find(request('item'));                
                $cities->delete();
        }
        session()->flash('success', _('admin.deleted_record'));
        return redirect('/admin/cities');
    }
}
