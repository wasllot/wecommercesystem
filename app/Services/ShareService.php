<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class ShareService extends BaseService
{

    protected $cat;

    /**
     * ShareService constructor.
     * @param CategoryRepository $cat
     */
    public function __construct(CategoryRepository $cat)
    {
        $this->cat = $cat;
    }

    /**
     * @return array
     */
    public function globalData()
    {
        $cart = $this->setCart();
        $var = $this->setVars();
        $data = array(
            'menu' => $this->navMenu(),
            'cats' => $this->filterCat(),
            'meta' => $var['header'],
            'locale' => $var['locale'],
            'currencies' => $var['currency'],
            'rows' => $cart['rows'],
            'cart' => $cart['cart'],
            'grand_total' => $cart['grandTotal'],
            'currency' => session('currency', config('app.currency')),
        );
        return $data;
    }

    /**
     * Category self recursion
     * @param $parent_id
     * @return array
     */
    public function filterCat($parent_id = 0)
    {
        $categories = array();
        $result = $this->cat->where('parent_id', $parent_id);
        foreach ($result as $parentCategory) {
            $category = array();
            $category['id'] = $parentCategory->cat_id;
            $category['name'] = $parentCategory->cat;
            $category['parent_id'] = $parentCategory->parent_id;
            $category['banner'] = $parentCategory->m_img;
            $category['sub_cat'] = $this->filterCat($category['id']);
            $categories[$parentCategory->cat_id] = $category;
        }
        return $categories;
    }

    /**
     * Get NavMenu
     * @return mixed
     */
    public function navMenu()
    {
        $menu = $this->cat->with('children')->where('parent_id', 0)->get();
        return $menu;
    }
}