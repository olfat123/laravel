<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\product;
use Illuminate\Http\Request;
use App\DataTables\ProductsDataTable;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\prodct  $prodct
     * @return \Illuminate\Http\Response
     */
    public function show(prodct $prodct)
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
