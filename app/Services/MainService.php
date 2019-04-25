<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\BrandRepository;
use App\Repositories\ColorRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SizeRepository;
use \Cache;

class MainService
{
    
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    /**
     * @return array
     */
    public function autocomplete()
    {
        $results = array();
        $search = request()->input('term');
        $queries = $this->product->whereAuto($search);
        foreach ($queries as $product) {
            $results[] = ['value' => $product->name];
        }
        return $results;
    }

    /**
     * Get data and count items for filters page.
     * @param $parent
     * @return mixed
     */
    public function getAll($parent)
    {
        $id = $this->product->getParents($parent);
        $data['brand'] = app(BrandRepository::class)->withCount($parent);
        //No need DI for this classes because they called once.
        $data['color'] = app(ColorRepository::class)->withCount($id);
        $data['size'] = app(SizeRepository::class)->withCount($id);
        return $data;
    }


    /**
     * Get data for Home page.
     * @return mixed
     */
    public function getHome()
    {

            $data['brands'] = app(BrandRepository::class)->all();
            $data['latest'] = $this->product->latest();
            $data['products'] = $this->product->product();

            return $data;
    
    }


    /**
     * Get data for search filters.
     * @param $parent
     * @return array
     */
    public function getFilter($parent)
    {
        $data = $this->prepareFilter($parent);
        $catId = (request()->exists('categ') ? request()->input('categ') : array($parent));
        $data['banner'] = app(CategoryRepository::class)->whereIn('cat_id', $catId);
        $data['properties'] = $this->getAll($parent);
        $data['products'] = $this->pagination($parent);
        return $data;
    }


    /**
     * Get products details data.
     * @param $slug
     * @param $id
     * @return mixed
     */
    public function getProductInfo($slug, $id)
    {
        $data['latest'] = $this->product->latest();;
        $data['products'] = $this->product->product();
        $data['item'] = $this->product->with('category', 'size', 'color')->findOrFail($id);
        return $data;
    }    

    public function getProduct($id)
    {
        $data['latest'] = $this->product->latest();;
        $data['products'] = $this->product->product();
        $data['item'] = $this->product->with('category', 'size', 'color')->findOrFail($id);
        return $data;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function getFrameContent($id)
    {
        $data = $this->product->with('category', 'size', 'color')->findOrFail($id);
        return $data;
    }

    /**
     * @param $parent
     * @return array
     */
    public function prepareFilter($parent)
    {
        $data = array(
            'parent' => $parent,
            'size' => (array)request()->input('size'),
            'color' => (array)request()->input('color'),
            'brand' => (array)request()->input('brand'),
            'category' => (array)request()->input('categ')
        );
        return $data;
    }

    /**
     * Get products details.
     * @param $parent
     * @return array
     */
    public function prepareSearch($parent)
    {
        $search = request()->input('search');
        $data = $this->prepareFilter($parent);
        $data['banner'] = app(CategoryRepository::class)->findBy('cat_id', request()->input('categ'));
        $data['properties'] = $this->getAll($parent);
        $data['products'] = $this->product->whereLike($search);
        return $data;
    }


    /**
     * Paginate product.
     * @param $parent
     * @return mixed
     */
    public function pagination($parent)
    {
        $result = $this->product->paginate($parent);
        return $result;
    }
}