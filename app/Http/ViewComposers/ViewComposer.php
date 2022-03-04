<?php

namespace App\Http\ViewComposers;

use App\Models\Zone;
use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use App\Models\CallToAction;

class ViewComposer
{
    public function __construct()
    {
        //
    }

    /**
     * Bind data to the view
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        if (env('APP_NAME') != '') {
            $zones = Zone::get();
            $categories = Category::get();
            $callToActions = CallToAction::get();
            $view->with([
                'zones' => $zones,
                'loadCategories' => $categories,
                'callToActions' => $callToActions,
            ]);
        }
    }
}
