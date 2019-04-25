<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\product;
use Illuminate\Http\Request;
use App\DataTables\ProductsDataTable;
use Up;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDataTable $product)
    {
        return $product->render('admin.products.index',['title' =>'Products Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create',['title'=> _('admin.addproduct')]);
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
        ['Name' => 'required',         
         'Price' => 'required',
         'category_id' => 'required',
         'Image' => 'sometimes|nullable|'.validate_image(),         

        ],
        [],
        [
         'Name' => _('admin.name'),
         'Price' => _('admin.price'),
         'category_id' => _('admin.category'),
         'Image' => _('admin.productimage')
        ]
    );
    if(request()->has('Image')){
        
        $data['Image'] = Up::upload([
                'new_name' => 'product_image',
                'file' => 'Image',
                'path' => 'products',
                'upload_type' => 'single',
                'delete_file' => '',
        ]);
    }
    product::create($data);
    session()->flash('success',trans('admin.record_added'));
    return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\prodct  $prodct
     * @return \Illuminate\Http\Response
     */
    public function edit(prodct $prodct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\prodct  $prodct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prodct $prodct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\prodct  $prodct
     * @return \Illuminate\Http\Response
     */
    public function destroy(prodct $prodct)
    {
        //
    }
}
