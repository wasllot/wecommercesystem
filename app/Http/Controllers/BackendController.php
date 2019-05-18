<?php

namespace App\Http\Controllers;

use Auth;
use App\Repositories\CrudRepository;
use App\Repositories\OrderRepository;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use App\Message;
use Chat;
use Musonza\Chat\Models\Conversation;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Order_details;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Brand;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateProduct;





class BackendController extends Controller
{

    protected $crud;


    /**
     * @param CrudRepository $CrudRepo
     */
    public function __construct(CrudRepository $CrudRepo)
    {
        $this->crud = $CrudRepo;
        ini_set('max_execution_time', 60);
    }

    /**
     * Show the home page to the user.
     *
     * @return Response
     */

    public function dashboard()
    {
        if (auth()->check() && auth()->user()->hasRole('admin')) {
            $title = 'Panel de administrador';
        } else {
            $title = 'Panel de usuario';
        }
        return view('backend/dashboard', compact('title'));
    }


    public function isAdmin(){

        if(auth()->check() && auth()->user()->hasRole('admin')){

            return true;
        }

        return false; 
    }

    /**
     * Show main categories
     * @return View
     */
    public function brand()
    {
        $filter = $this->crud->brandsFilter();
        $grid = $this->crud->brandsGrid($filter);
        $title = $this->crud->getBrandTable();
        return view('backend/content', compact('filter', 'grid', 'title'));
    }

    /**
     * Edit Main Category
     * @return string|View
     */
    public function brandsEdit()
    {
        // if (request()->get('do_delete') == 1) return "not the first";
        $edit = $this->crud->brandsEdit();
        $title = $this->crud->getBrandTable();
        return view('backend/content', compact('edit', 'title'));
    }

    /**
     * Show main categories
     * @return View
     */
    public function category()
    {
        $filter = $this->crud->catFilter();
        $grid = $this->crud->catGrid();
        $title = $this->crud->getCatTable();
        return view('backend/content', compact('filter', 'grid', 'title'));
    }

    /**
     * Edit Main Category
     * @return string|View
     */
    public function categoryEdit()
    {
        if (request()->get('do_delete') == 1) return "not the first";
        $edit = $this->crud->catEdit();
        $title = $this->crud->getCatTable();
        return view('backend/content', compact('edit', 'title'));
    }

    public function questions()
    {
        return view('backend/questions'); 

    }

    public function messages(){

       $conversations = DB::table('mc_conversations')->get();

        return view('backend/messages', ['conversations' => $conversations]); 
    }   

    public function userMessages(){

        return view('backend/orderMessage'); 
    }



    /**
     * Show products
     * @return View
     */
    public function products()
    {

        $data['products'] = Product::with('brands', 'category')->get(); 
        $data['categories'] = Category::all();
        
        return view('backend/products', $data);
    }

    public function addProduct(){
        // $data['products'] = Product::with('brands','category')->get();
        $data['categories'] = Category::all(); 
        $data['brands'] = Brand::all(); 

        return view('backend/addProduct', $data);
    }


    public function storeProduct(CreateProduct $request){

    }

    public function productDetails($product_id){

        $data['product'] = Product::with('brands', 'category')->where('id', $product_id)->get(); 

        return view('backend/productDetails', $data); 
    }

    public function productEdit($productId){

        $data['categories'] = Category::all(); 
        $data['brands'] = Brand::all(); 
        $data['product'] = Product::with('brands', 'category')->where('id', $productId)->get(); 

        return view('backend/editProduct', $data);
    }

    /**
     * Edit Products
     * @return string|View
     */
    public function productsEdit()
    {
        if (request()->get('do_delete') == 1) return "not the first";
        $edit = $this->crud->productsEdit();
        $title = $this->crud->getProductTable();
        return view('backend/content', compact('edit', 'title'));
    }

    /**
     * Show User profile
     * @return View
     */
    public function profile()
    {
        $grid = $this->crud->profileGrid();
        $title = auth()->user()->name;
        return view('backend/content', compact('grid', 'title'));
    }

    /**
     * Edit User Profile
     * @return View
     */
    public function profileEdit()
    {
        $edit = $this->crud->profileEdit();
        $title = auth()->user()->name;
        return view('backend/content', compact('edit', 'title'));
    }

    /**
     * Show all orders to admins
     * @return View
     */
    public function orders(){

        $data['orders'] = Order::with('users','products')->get(); 
        return view('backend/orders', $data);
    }

    /**
     * Edit Orders
     * @return string|View
     */
    public function ordersEdit()
    {
        

        if (request()->get('do_delete') == 1) return "not the first";
        $edit = $this->crud->ordersEdit();
        $title = $this->crud->getOrderTable();
        return view('backend/content', compact('edit', 'title'));
    }

    /**
     * Show customer orders
     * @return View
     */
    public function userOrders()
    {

        $id = Auth::user()->id;

        $data['orders'] = Order::with('products')->where('user_id', $id)->get();

        return view('backend/orders', $data);     
    }

    public function orderDetails($orderId){
        $order = Order::where('id', $orderId)->get();
        $data['order'] = $order;
        $data['product'] = Product::where('id', $order[0]->product_id)->get(); 
        $data['details'] = Order_details::where('order_id', $orderId)->get();
        $data['payment'] = Payment::where('id', $order[0]->payment_id)->get();
        $data['shipping'] = Shipping::where('id', $order[0]->shipping_id)->get();
        $data['total'] = $order[0]->amount + $data['shipping'][0]->rate;

        return view('backend/orderDetails', $data);

    }

    public function deleteOrder($orderId){

        $order = Order::findOrFail($orderId)->delete();
        $order_details = Order_details::where('order_id', $orderId)->get();
        $conversation = Conversation::findOrFail($order_details->conversation_id)->delete();
        Order_details::findOrFail($order_details->id)->delete();  

        Session::flash('flash_message', '¡Orden eliminada satisfactoriamente!');
        return response(null, Response::HTTP_NO_CONTENT);
    }


    /**
     * Edit customer orders
     * @return View
     */
    public function userOrdersEdit(OrderRepository $order, GateContract $gate)
    {

        

        if (request()->has('update')) {

            $result = $order->findBy('id', request()->input('update'));

        } else {

            $result = $order->findOrFail(request()->all());
        }
        //$this->authorize('view-resource', $order);
        //authorize via AuthorizesRequests trait.
        if ($gate->denies('view-resource', $result)) {
            return redirect('backend/profile')
                ->withErrors('Your are not autorized to view resources');
        }
        $edit = $this->crud->UsersOrdersEdit();
        $title = $this->crud->getOrderTable();
        return view('backend/content', compact('edit', 'title'));
    }




    public function getConversations()
    {
        $conversations = Chat::conversation(Chat::conversations()->conversation)
          ->for(auth()->user())
          ->get()
          ->toArray()['data'];

        $conversations = array_pluck($conversations, 'id');

        return view('home', compact('conversations'));
    }

    public function myQuestions(){

        return view('backend/questionsUser');
    }

    public function orderData($product_id){

        return Product::findOrFail($product_id); 

   
    }
}