<?php

namespace App\Http\Composers;

use App\Services\ShareService;
use Illuminate\View\View;

class GlobalComposer
{
    protected $share;

    /**
     * GlobalService constructor.
     * @param CategoryRepository $cat
     */
    public function __construct(ShareService $share)
    {
        $this->share = $share;
    }

    /**
     * Share global data to all views.
     */
    public function compose(View $view)
    {
        $data = $this->share->globalData();
        $view->with($data);
    }
}