<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProduct;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Facades\Session;
use Request;

class ArticlesController extends Controller
{
   
    public function index()
    {
        $products = Product::with('brands', 'size','category')->get();
        $products = Product::paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data['checkbox'] = Size::all();
        $data['products'] = Product::with('brands', 'size','category')->get();
        return view('product.create', $data);
    }

    /**
     * Store items in database.
     *
     * @param CreateProduct $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateProduct $request)
    {
        $data = $this->proccesData($request);
        $product = Product::create($data);
        $product->size()->attach($data['size_id']);
        Session::flash('flash_message', 'Product successfully added!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $product = Product::with('brands', 'size','category')->find($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */

    public function edit($id)
    {
        $data['checkbox'] = Size::all();
        $data['product'] = Product::with('brands', 'size','category')->find($id);
        return view('product.edit', $data);
    }

    /**
     * Update the specified products.
     *
     * @param $id
     * @param CreateProduct $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, CreateProduct $request)
    {
        $data = $this->proccesData($request);
        $product = Product::find($id);
        $product->update($data);
        $product->size()->sync($data['size_id']);
        Session::flash('flash_message', 'Product successfully updated!');
        return redirect()->back();
    }

    /**
     * Delete the specified products.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id)->delete();
        //Without database OnDdelete Cascade
        //$product->size()->detach($id);
        Session::flash('flash_message', 'Product successfully deleted!');
        return redirect()->back();
    }

    /**
     * Process uploaded images and request data.
     *
     * @param $request
     * @return mixed
     */
    public function proccesData($request)
    {
        $data = $request->except('a_img','size');
        $data['size_id'] = $request->input('size');
        if ($request->hasFile('a_img')) {
            $destinationPath = base_path() . '/public/images/products';
            $fileName = $request->file('a_img')->getClientOriginalName();
            $request->file('a_img')->move($destinationPath, $fileName);
            $data['a_img'] = $request->file('a_img')->getClientOriginalName();
        }
        return $data;
    }

    /**
     * Search Form for tables
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        $search = Request::get('search');
        $products = Product::where('name', 'like', '%' . $search . '%')
            ->orderBy('name')
            ->paginate(5);
        return view('product.index', compact('products'));
    }
}