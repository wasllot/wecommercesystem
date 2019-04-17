<?php

namespace App\Http\Routes;

use App\Services\ShareService;
use Illuminate\Support\Facades\Schema;
use Route;

class Register
{

    protected $cat;

    /**
     * RouteRegister constructor.
     */
    public function __construct(ShareService $share)
    {
        $this->share = $share;
    }

    /**
     * Build dinamic SEO routes.
     * @return routes
     */
    public function seoRoutes()
    {
        if (Schema::hasTable('categories')) {
            $categories = $this->share->filterCat();
            foreach ($categories as $row) {
                $parent_cat = $row['name'];
                foreach ($row['sub_cat'] as $sub_cat) {
                    $slug = $sub_cat['name'];
                    Route::get('' . $parent_cat . '/{slug}/{id}', 'MainController@filter');
                    Route::get('' . $slug . '/{slug}/{id}', 'MainController@product');
                }
            }
        }
    }
}

