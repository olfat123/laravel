<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\productsCategory;
use Illuminate\Http\Request;
use Up;
use Storage;
class ProductsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.productCategories.index',['title' =>'Categories Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productCategories.create',['title'=> trans('admin.addcategory')]);
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
            [
             'name_ar' => 'required',
             'name_en' => 'required',
             'description' => 'sometimes|nullable|',
             'keyword' => 'sometimes|nullable|',
             'parent' => 'sometimes|nullable|',             
             'icon' => 'sometimes|nullable|'.validate_image(),       

            ],
            [],
            [
             'name_ar' => _('admin.productCategory_name_ar'),
             'name_en' => _('admin.productCategory_name_en'),
             'description' => _('admin.productCategory_mob'),
             'keyword' => _('admin.productCategory_code'),
             'icon' => _('admin.productCategory_icon')
            ]
        );
        if(request()->hasFile('icon')){
            
            $data['icon'] = Up::upload([
                    'new_name' => 'productCategory_icon',
                    'file' => 'icon',
                    'path' => 'productCategory',
                    'upload_type' => 'single',
                    'delete_file' => '',
            ]);
        }

        productsCategory::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect('/admin/productsCategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = productsCategory::find($id);
        $title = _('admin.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
         $data = $this->validate(request(),
            [
             'name_ar' => 'required',
             'name_en' => 'required',
             'description' => 'sometimes|nullable|',
             'keyword' => 'sometimes|nullable|',
             'parent' => 'sometimes|nullable|',             
             'icon' => 'sometimes|nullable|'.validate_image(),       

            ],
            [],
            [
             'name_ar' => _('admin.productCategory_name_ar'),
             'name_en' => _('admin.productCategory_name_en'),
             'description' => _('admin.productCategory_mob'),
             'keyword' => _('admin.productCategory_code'),
             'icon' => _('admin.productCategory_icon')
            ]
        );

        if(request()->hasFile('icon')){
            
            $data['icon'] = Up::upload([

                    'new_name' => 'productCategory_icon',
                    'file' => 'icon',
                    'path' => 'productCategory',
                    'upload_type' => 'single',               

                'delete_file' => productsCategory::find($id)->icon,
            ]);
        }

        productsCategory::where('id', $id)->update($data);
        session()->flash('success', _('admin.update_record'));
        return redirect('/admin/productsCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
    }
}
