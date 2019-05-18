<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\CreateProduct;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Size;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Request;

class ArticlesController extends Controller
{
   
    public function index()
    {
        $products = Product::with('brands','category')->get();
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
        $data['products'] = Product::with('brands','category')->get();
        return view('backend.addProduct', $data);
    }

    /**
     * Store items in database.
     *
     * @param CreateProduct $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateProduct $request)
    {

        $res = $this->proccesData($request);
        $product = Product::create($res);
        $data['product'] = Product::where('id', $product->id)->get(); 
        // $product->size()->attach($data['size_id']);
        Session::flash('flash_message', '¡Producto creado satisfactoriamente! <a href="/backend/products/'.$product->id.'" target="_blank">Mira el producto aquí </a>');

        // return redirect('backend/productDetails', $data);
        return response($data);  
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
        Session::flash('flash_message', '¡Producto actualizado satisfactoriamente! <a href="/backend/products/'.$product->id.'" target="_blank">Mira el producto aquí </a>');
        Session::flash('flash_message', '¡Producto actualizado correctamente!');
        return response($product); 
    }

    public function getRating($productId){

       $rating = Rating::where('product_id', $productId)->get();

       $product_rating = 0;

       if($rating){        

            $count = DB::table('rating')->where('product_id', $productId)->count();
            // $count = Rating::where('product_id', $product_id)->count();
            $data = 0; 

            foreach ($rating as $r) {

                 $data = $data + $r->rating; 

             }

             $product_rating = $data/$count;
       }
  

        return response($product_rating); 
    }

    public function setRating($productId, $rating){

        $rat = Rating::where('product_id', $productId)->get(); 

        foreach ($rat as $r) {

            if($r->user_id == Auth::user()->id){

                return response('Ya has calificado anteriormente'); 
            } 

        }

        $data['user_id'] = Auth::user()->id;
        $data['product_id'] = $productId;    
        $data['rating'] = $rating;    
        
        Rating::create($data); 
    
        return response('¡Gracias por calificarnos!');

        
    }

    public function updatePrice($category, $p){
        $table = 'products'; 
        $n = $p/100; 
        if($category){

         $data = Product::where('cat_id', $category)->update(array('price'=> DB::raw('price + price*'.$n)));

         return response($data); 
        }

        // $data = Product::all()->update

        // return \DB::update("UPDATE `{$table}` SET `price` = `price` + (`price` *`{$p}`) WHERE `cat_id` = `{$category}`");


        // $stats = DB::table("products")->select(DB::raw("price + price*2"))->where("id", "=", $category);

        // return response($stats); 
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
        Session::flash('flash_message', '¡Producto eliminado!');
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
        $data = $request->except('a_img');

        if($request->a_img) $data['a_img'] = $request->a_img[0];
        if($request->b_img) $data['b_img'] = $request->b_img[0];
        if($request->c_img) $data['c_img'] = $request->c_img[0];

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