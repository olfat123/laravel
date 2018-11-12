<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\State;
use App\City;
use Illuminate\Http\Request;
use App\DataTables\StatesDataTable;
use Storage;
use Up;
use Form;
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StatesDataTable $state)
    {
        return $state->render('admin.states.index',['title' =>'states Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->ajax()) {

            if (request()->has('country_id')) {
                $select = request()->has('select')? request('select'):"";
                return Form::select('country_id',City::where('country_id',request('country_id'))->pluck('city_name_'.session('lang'),'id'),'$select',['class'=>'form-control']);
            }
        }
        return view('admin/states.create',['title'=> _('admin.addstate')]);
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
            ['state_name_ar' => 'required',
             'state_name_en' => 'required',
             'country_id'   =>'required|numeric',
             'city_id'      => 'required|numeric'          
            ],
            [],
            [
             'state_name_ar' => _('admin.state_name_ar'),
             'state_name_en' => _('admin.state_name_en'),             
            ]
        );      

        State::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect('/admin/states');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function show(state $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = State::find($id);
        $title = _('admin.edit');
        return view('admin.states.edit', compact('state','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\state  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r,  $id)
    {
        $data = $this->validate(request(),
            [
             'state_name_ar' => 'required',
             'state_name_en' => 'required',
             'country_id'   =>'required|numeric' ,
             'city_id'      => 'required|numeric'
            ],
            [],
            [
             'state_name_ar' => _('admin.state_name_ar'),
             'state_name_en' => _('admin.state_name_en'),             
            ]
        );      

        State::where('id', $id)->update($data);
        session()->flash('success', _('admin.update_record'));
        return redirect('/admin/states');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $states = State::find($id);       
        $states->delete();
        session()->flash('success', _('admin.deleted_record'));
        return redirect('/admin/states');
    }

    public function multi_delete() {
        if(is_array(request('item'))){
            foreach (request('item') as $id) {
                $states = State::find($id);                
                $states->delete();
            }
        }else{
                $states = State::find(request('item'));                
                $states->delete();
        }
        session()->flash('success', _('admin.deleted_record'));
        return redirect('/admin/states');
    }
}
