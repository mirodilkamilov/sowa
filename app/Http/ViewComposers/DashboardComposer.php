<?php

namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardComposer
{
    private array $arrayOfRoutes;
    private ?string $slicedSegment;
    private $currentRoute;
    private $userName;
    private int $numNewMessages;

    public function __construct(Request $request)
    {
        $routePath = $request->path();

        //  remove numbers from url
        $thirdSegmentOfUrl = $request->segment(3);
        $forthSegmentOfUrl = $request->segment(4);
        if ($forthSegmentOfUrl == 'edit') {
            $routePath = str_replace("{$thirdSegmentOfUrl}/", '', $routePath);
            $this->slicedSegment = $thirdSegmentOfUrl;
        }

        $this->arrayOfRoutes = explode('/', $routePath);
        $sizeOfArray = count($this->arrayOfRoutes);
        $isRouteDashboard = $sizeOfArray == 1;

        $this->currentRoute = $isRouteDashboard ? $this->arrayOfRoutes[0] : $this->arrayOfRoutes[1];
        $this->numNewMessages = DB::table('user_contacts')->where('status', 'not reviewed')->where('deleted_at', null)->count('id');
        $this->userName = Auth::user()->name;
    }

    public function compose(View $view)
    {
        $view->with('arrayOfRoutes', $this->arrayOfRoutes);
        if (isset($this->slicedSegment))
            $view->with('slicedSegment', $this->slicedSegment);
        $view->with('currentRoute', $this->currentRoute);
        $view->with('availableLangs', config('app.languages'));
        $view->with('locale', session('language') ?? config('app.locale'));
        $view->with('name', $this->userName);
        $view->with('numNewMessages', $this->numNewMessages);
    }
}
