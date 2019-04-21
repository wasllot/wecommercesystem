<?php

namespace App\Repositories;

use Auth;
use App\User;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Zofe\Rapyd\Facades\DataGrid;
use Zofe\Rapyd\Facades\DataEdit;

class CrudRepository
{
    protected $brand;

    protected $category;

    protected $product;

    protected $order;

    /**
     * @param Brand $brand
     * @param Category $category
     * @param Order $order
     * @param Product $product
     */
    public function __construct
    (
        Brand $brand,
        Category $category,
        Order $order,
        Product $product
    )
    {
        $this->brand = $brand;
        $this->category = $category;
        $this->product = $product;
        $this->order = $order;
    }

    /**
     * Crud for Brand table.
     * @return mixed
     */
    public function brandsFilter()
    {
        $filter = \DataFilter::source(new Brand());
        $filter->add('brand_id', 'ID', 'text');
        $filter->add('brand', 'Marca', 'text');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();
        return $filter;
    }

    /**
     * Crud for Brand table.
     * @return mixed
     */
    public function brandsGrid($brandsFilter)
    {
        $grid = DataGrid::source($brandsFilter);
        $grid->label('Brands');
        $grid->attributes(array("class" => "table table-striped"));
        $grid->add('brand_id', 'ID', true)->style("width:100px");
        $grid->add('brand', 'Marca');
        $grid->edit('/backend/brands/edit');
        $grid->link('/backend/brands/edit', "Nueva marca", "TR");
        $grid->orderBy('brand_id', 'asc');
        $grid->paginate(5);
        return $grid;
    }

    /**
     * Crud for Brand table.
     * @return mixed
     */
    public function brandsEdit()
    {
        $edit = DataEdit::source(new Brand());
        $edit->add('brand', 'Marca', 'text');
        $edit->link('/backend/brands', "Volver", "TR");
        return $edit;
    }

    /**
     * Get table name.
     * @return mixed
     */
    public function getBrandTable()
    {
        return $table = with(new Brand())->getTable();
    }

    /**
     * @return mixed
     */
    public function catFilter()
    {
        $filter = \DataFilter::source(new Category());
        $filter->add('cat_id', 'ID', 'text');
        $filter->add('cat', 'Categoría', 'text');
        $filter->submit('Buscar');
        $filter->reset('Reiniciar');
        $filter->build();
        return $filter;
    }

    /**
     * Crud for Main category table.
     * @return mixed
     */
    public function catGrid()
    {
        if (request()->segment(2) === 'subcategory') {
            $grid = DataGrid::source(Category::with('parent')->where('parent_id','>', 0));
            $grid->label('Subcategory');
            $grid->attributes(array("class" => "table table-striped"));
            $grid->add('cat_id', 'ID', true)->style("width:100px");
            $grid->add('cat', 'Subcategoría');
            $grid->add('{{ $parent->cat }}','Padre', 'cat_id');
            $grid->edit('/backend/subcategory/edit');
            $grid->link('/backend/subcategory/edit', "Nueva subcategoría", "TR");
        } else {
            $grid = DataGrid::source($this->category->where('parent_id', 0));
            $grid->label('Categoría principal');
            $grid->attributes(array("class" => "table table-striped"));
            $grid->add('cat_id', 'ID', true)->style("width:100px");
            $grid->add('cat', 'Categoría');
            $grid->edit('/backend/category/edit');
            $grid->link('/backend/category/edit', "Nueva categoría principal", "TR");
        }
        $grid->orderBy('cat_id', 'asc');
        $grid->paginate(10);
        return $grid;
    }

    /**
     * Edit Main Categories
     * @return mixed
     */
    public function catEdit()
    {
        if(request()->segment(2) === 'subcategory'){
            $edit = DataEdit::source(new Category());
            $edit->label('Editar subcategoría');
            $edit->add('cat_id', 'ID', 'text');
            $edit->add('cat', 'Subcategoría', 'text');
            $edit->add('parent.cat', 'Padre', 'select')->options($this->category->where('parent_id',0)->pluck("cat", "cat_id")->all());
            $edit->link('/backend/subcategory', "Volver", "TR");

        }else{
            $edit = DataEdit::source(new Category());
            $edit->label('Editar categoría principal');
            $edit->add('cat_id', 'ID', 'text');
            $edit->set('parent_id', 0);
            $edit->add('cat', 'Categoría', 'text');
            $edit->link('/backend/category', "Volver", "TR");

        }
        return $edit;
    }

    /**
     * Get name of the table.
     * @return mixed
     */
    public function getCatTable()
    {
        return $table = with(new Category())->getTable();
    }


    /**
     * Search for Product table.
     * @return mixed
     */
    public function productsFilter()
    {
        $filter = \DataFilter::source($this->product->with('brands', 'size', 'color', 'category'));
        $filter->add('product_id', 'ID', 'text');
        $filter->add('name', 'Nombre', 'text');
        $filter->add('brands.brand', 'Marca', 'text');
        $filter->add('category.cat', 'Categoría', 'text');
        $filter->submit('Buscar');
        $filter->reset('Reiniciar');
        $filter->build();
        return $filter;
    }

    /**
     * Crud for Product table.
     * @return mixed
     */
    public function productsGrid($productsFilter)
    {
        $grid = DataGrid::source($productsFilter);
        $grid->label('Lista de productos');
        $grid->attributes(array("class" => "table table-striped"));
        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('slug', 'Tipo');
        $grid->add('name', 'Nombre');
        $grid->add('brands.brand', 'Marca');
        $grid->add('category.cat', 'Categoría');
        $grid->add('category.parent_id','Categoría padre');
        
        $grid->add('<img src="/images/products/{{ $a_img }}" height="25" width="20">', 'Principal');
        $grid->add('<img src="/images/products/{{ $b_img }}"height="25" width="20">', 'Secundaria');
        $grid->add('quantity', 'Cantidad');
        $grid->add('price', 'Precio');
        $grid->edit('/backend/products/edit');
        $grid->link('/backend/products/edit', "Nuevo producto", "TR");
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);
        return $grid;
    }

    /**
     * Crud for Product table.
     * @return mixed
     */
    public function productsEdit()
    {
        $edit = DataEdit::source(new Product());
        $edit->label('Editar producto');
        $edit->add('slug', 'Tipo', 'text')->rule('required|min:3');
        $edit->add('name', 'Nombre', 'text')->rule('required|min:3');
        $edit->add('description', 'Description', 'redactor');
        $edit->add('brand_id', 'Marca', 'select')->options($this->brand->pluck("brand", "brand_id")->all());
        $edit->add('cat_id', 'Subcategoría', 'select')->options($this->category->where('parent_id','>',0)->pluck("cat", "cat_id")->all());
        $edit->add('parent_id', 'Categoría', 'select')->options($this->category->where('parent_id',0)->pluck("cat", "cat_id")->all());;
        // $edit->add('size.size', 'Size', 'tags');
        // $edit->add('color.color', 'Color', 'tags');
        $edit->add('a_img', 'Principal', 'image')->move('images/products/')->fit(370, 507)->preview(120, 80);
        $edit->add('b_img', 'Segundaria', 'image')->move('images/products/')->fit(370, 507)->preview(120, 80);
        $edit->add('quantity', 'Cantidad', 'text');
        $edit->add('price', 'Precio', 'text');
        $edit->link('/backend/products', "Volver", "TR");
        return $edit;
    }

    /**
     * Get name of the table.
     * @return mixed
     */
    public function getProductTable()
    {
        return $table = with(new Product())->getTable();
    }

    /**
     * Profile user
     * @return mixed
     */
    public function profileGrid()
    {
        $id = Auth::user()->id;
        $grid = DataGrid::source(User::where('id', $id));
        $grid->label('Tu perfil');
        $grid->attributes(array("class" => "table table-striped"));
        $grid->add('name', 'Nombre');
        $grid->add('<img src="/images/avatars/{{ $avatar }}" height="25" width="25">', 'Avatar');
        $grid->add('email', 'Email');
        $grid->edit('/backend/profile/edit', 'Editar', 'show|modify');
        $grid->orderBy('id', 'asc');
        return $grid;
    }

    /**
     * Edit Profile
     * @return mixed
     */
    public function profileEdit()
    {
        $edit = DataEdit::source(new User());
        $edit->label('Editar perfil');
        $edit->add('avatar', 'Avatar', 'image')->move('images/avatars/')->fit(240, 160)->preview(120, 80);
        $edit->link('/backend/profile', "Volver", "TR");
        return $edit;
    }

    /**
     * Crud for Order table.
     * @return mixed
     */
    public function ordersFilter()
    {
        $filter = \DataFilter::source($this->order->with('users', 'products'));
        $filter->add('id', 'ID', 'text');
        $filter->add('users.name', 'Usuario', 'text');
        $filter->add('products.name', 'Producto', 'text');
        // $filter->add('size', 'Size', 'text');
        // $filter->add('color', 'Color', 'text');
        $filter->submit('Buscar');
        $filter->reset('Reiniciar');
        $filter->build();
        return $filter;
    }

    /**
     * Crud for Products table.
     * @return mixed
     */
    public function ordersGrid($ordersFilter)
    {
        $grid = DataGrid::source($ordersFilter);
        $grid->label('Pedidos');
        $grid->attributes(array("class" => "table table-striped text-center"));
        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('users.name', 'Usuario');
        $grid->add('order_date', 'Fecha', true);
        // $grid->add('<a href="/backend/products/edit?show={{ $products->product_id }}">{{ $products->name }}</a>', 'Product');
        // $grid->add('size', 'Size');
        $grid->add('<img src="/images/products/{{ $img }}" height="25" width="25">', 'Imagen');
        // $grid->add('color', 'Color');
        $grid->add('quantity', 'Cantidad', true);
        $grid->add('amount', 'Monto', true);
        $grid->edit('/backend/orders/edit');
        // $grid->link('/backend/orders/edit', "Nueva orden", "TR");
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);
        return $grid;
    }

    /**
     * Get table name.
     * @return mixed
     */
    public function getOrderTable()
    {

        return $table = with(new Order())->getTable();
    }

    /**
     * Crud for Order table.
     * @return mixed
     */
    public function ordersEdit()
    {
        $edit = DataEdit::source(new Order());
        $edit->label('Editar pedido');
        $edit->add('users.name', 'Usuario', 'text');
        $edit->add('order_date', 'Fecha', 'text');
        $edit->add('products.name', 'Producto', 'text');
        // $edit->add('size', 'Size', 'text');
        $edit->add('img', 'Imágen', 'image')->move('images/products/')->fit(240, 160)->preview(120, 80);
        // $edit->add('color', 'Color', 'text');
        $edit->add('quantity', 'Cantidad', 'text');
        $edit->add('amount', 'Monto', 'text');
        $edit->link('/backend/orders', "Volver", "TR");
        return $edit;
    }

    /**
     * Crud for user order.
     * @return mixed
     */
    public function UserOrdersGrid()
    {
        $id = Auth::user()->id;
        $grid = DataGrid::source($this->order->with('products')->where('user_id', $id));
        $grid->label('Mis pedidos');
        $grid->attributes(array("class" => "table table-striped"));
        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('order_date', 'Fecha');
        $grid->add('products.name', 'Producto');
        $grid->add('<img src="/images/products/{{ $img }}" height="25" width="25">', 'Imágen');
        $grid->add('quantity', 'Cantidad');
        $grid->add('amount', 'Monto');
        $grid->edit('/backend/user-orders/edit', 'Orden actual', 'show');
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);
        return $grid;
    }

    /**
     * Crud for user order.
     * @return mixed
     */
    public function UsersOrdersEdit()
    {
        $edit = DataEdit::source(new Order());
        $edit->label('View Order');
        $edit->add('users.name', 'Usuario', 'text');
        $edit->add('products.name', 'Producto', 'text');
        // $edit->add('size', 'Size', 'text');
        // $edit->add('color', 'Color', 'text');
        $edit->link('/backend/user-orders', "Volver", "TR");
        return $edit;
    }
}