<?php

namespace App\Http\ViewComposers;

use App\Models\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardComposer
{
    private $arrayOfRoutes;
    private $currentRoute;
    private $userName;
    private $numNewMessages;

    public function __construct(Request $request)
    {
        $routePath = $request->path();
        $this->arrayOfRoutes = explode('/', $routePath);
        $sizeOfArray = count($this->arrayOfRoutes);
        $isRouteDashboard = $sizeOfArray == 1;

        $this->currentRoute = ($isRouteDashboard) ? $this->arrayOfRoutes[0] : $this->arrayOfRoutes[1];
        $this->numNewMessages = DB::table('user_contacts')->where('status', 'not reviewed')->count();
        $this->userName = Auth::user()->name;
    }

    public function compose(View $view)
    {
        $view->with('arrayOfRoutes', $this->arrayOfRoutes);
        $view->with('currentRoute', $this->currentRoute);
        $view->with('availableLangs', config('app.languages'));
        $view->with('locale', session('language') ?? config('app.locale'));
        $view->with('name', $this->userName);
        $view->with('numNewMessages', $this->numNewMessages);
    }
}
