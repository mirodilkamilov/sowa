@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>
                    </div>
                </div>
                <div class="content-body">
                    <!-- Collapse start -->
                    <section id="collapsible">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card collapse-icon accordion-icon-rotate">
                                    <div class="card-header">
                                        <h4 class="card-title">Default</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <p>
                                                With basic collapse you can open multiple items at a time. to add
                                                bottom border use <code>.collapse-bordered</code> as a wrapper of
                                                collapse
                                                cards and
                                                for icons on the right of collapse use
                                                <code>.collapse-icon</code> <code>.accordion-icon-rotate</code>
                                            </p>
                                            <div class="default-collapse collapse-bordered collapse-border">
                                                <div class="card collapse-header">
                                                    <div id="headingCollapse1" class="card-header"
                                                         data-toggle="collapse"
                                                         role="button" data-target="#collapse1" aria-expanded="false"
                                                         aria-controls="collapse1">
                                                    <span class="lead collapse-title">
                                                        Collapse Item 1
                                                    </span>
                                                    </div>
                                                    <div id="collapse1" role="tabpanel"
                                                         aria-labelledby="headingCollapse1"
                                                         class="collapse">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                Pie dragée muffin. Donut cake liquorice marzipan carrot
                                                                cake
                                                                topping powder candy. Sugar plum
                                                                brownie brownie cotton candy.

                                                                Tootsie roll cotton candy pudding bonbon chocolate cake
                                                                lemon drops candy. Jelly marshmallow
                                                                chocolate cake carrot cake bear claw ice cream
                                                                chocolate.
                                                                Fruitcake apple pie pudding jelly beans
                                                                pie candy canes candy canes jelly-o. Tiramisu brownie
                                                                gummi
                                                                bears soufflé dessert cake.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card collapse-header">
                                                    <div id="headingCollapse2" class="card-header collapse-header"
                                                         data-toggle="collapse" role="button" data-target="#collapse2"
                                                         aria-expanded="false" aria-controls="collapse2">
                                                    <span class="lead collapse-title">
                                                        Collapse Item 2</span>
                                                    </div>
                                                    <div id="collapse2" role="tabpanel"
                                                         aria-labelledby="headingCollapse2"
                                                         class="collapse" aria-expanded="false">
                                                        <div class="card-content">
                                                            <div class="card-body">

                                                                Jelly-o brownie marshmallow soufflé I love jelly beans
                                                                oat
                                                                cake. I love gummies chocolate bar
                                                                marshmallow sugar plum. Pudding carrot cake sweet roll
                                                                marzipan I love jujubes. Sweet roll tart
                                                                sugar plum halvah donut.

                                                                Cake gingerbread tart. Tootsie roll soufflé danish
                                                                powder
                                                                marshmallow sugar plum halvah sweet
                                                                chocolate bar. Jujubes cupcake I love toffee biscuit.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card collapse-header">
                                                    <div id="headingCollapse3" class="card-header collapse-header"
                                                         data-toggle="collapse" role="button" data-target="#collapse3"
                                                         aria-expanded="false" aria-controls="collapse3">
                                                    <span class="lead collapse-title">
                                                        Collapse Item 3
                                                    </span>
                                                    </div>
                                                    <div id="collapse3" role="tabpanel"
                                                         aria-labelledby="headingCollapse3"
                                                         class="collapse" aria-expanded="false">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                Pudding lollipop dessert chocolate gingerbread. Cake
                                                                cupcake
                                                                bonbon cupcake marshmallow. Gummi
                                                                bears carrot cake bonbon cake.

                                                                Sweet roll fruitcake bear claw soufflé. Apple pie ice
                                                                cream
                                                                liquorice sesame snaps brownie. Donut
                                                                marshmallow donut pudding chupa chups.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card collapse-header">
                                                    <div id="headingCollapse4" class="card-header"
                                                         data-toggle="collapse"
                                                         role="button" data-target="#collapse4" aria-expanded="false"
                                                         aria-controls="collapse4">
                                                    <span class="lead collapse-title">
                                                        Collapse Item 4
                                                    </span>
                                                    </div>
                                                    <div id="collapse4" role="tabpanel"
                                                         aria-labelledby="headingCollapse4"
                                                         class="collapse" aria-expanded="false">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                Brownie sweet carrot cake dragée caramels fruitcake.
                                                                Gummi
                                                                bears tootsie roll croissant
                                                                gingerbread dragée tootsie roll. Cookie caramels tootsie
                                                                roll pie. Sesame snaps cookie cake donut
                                                                wafer.

                                                                Wafer cookie jelly-o candy muffin cake. Marzipan topping
                                                                lollipop. Gummies chocolate sugar plum.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Collapse end -->
                </div>
            </div>
        </div>
    </div>
@endsection
