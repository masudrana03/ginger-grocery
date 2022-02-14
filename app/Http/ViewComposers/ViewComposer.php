<?php

namespace App\Http\ViewComposers;

use App\Models\Zone;
use App\Models\Country;
use App\Models\Category;
use App\Models\CallToAction;
use Illuminate\View\View;

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
            $countrys = Country::get();
            $callToActions = CallToAction::get();
            $view->with([
                'zones' => $zones,
                'categories' => $categories,
                'countrys' => $countrys,
                'callToActions' => $callToActions,
            ]);
        }
    }
}
