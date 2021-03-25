<?php

namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardComposer
{
    private $arrayOfRoutes;
    private $currentRoute;

    public function __construct(Request $request)
    {
        $routePath = $request->path();
        $this->arrayOfRoutes = explode('/', $routePath);
        $this->currentRoute = end($this->arrayOfRoutes);
    }

    public function compose(View $view)
    {
        $view->with('arrayOfRoutes', $this->arrayOfRoutes);
        $view->with('currentRoute', $this->currentRoute);
        $view->with('availableLanguages', config('app.languages'));
        $view->with('locale', session('language') ?? config('app.locale'));
    }
}
