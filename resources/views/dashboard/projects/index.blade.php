@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes" />

            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-thumb-view" class="data-thumb-view-header">
                    <!-- dataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-thumb-view">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>NAME</th>
                                <th>CATEGORY</th>
                                <th>POPULARITY</th>
                                <th>ORDER STATUS</th>
                                <th>PRICE</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/apple-watch.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Apple Watch series 4 GPS</td>
                                <td class="product-category">Computers</td>
                                <td>
                                    <div class="progress progress-bar-success">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:97%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-warning">
                                        <div class="chip-body">
                                            <div class="chip-text">on hold</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$69.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/magic-mouse.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Beats HeadPhones</td>
                                <td class="product-category">Computers</td>
                                <td>
                                    <div class="progress progress-bar-primary">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:83%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-success">
                                        <div class="chip-body">
                                            <div class="chip-text">Delivered</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$69.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/iphone-x.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Altec Lansing - Bluetooth Speaker</td>
                                <td class="product-category">Audio</td>
                                <td>
                                    <div class="progress progress-bar-warning">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:57%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-danger">
                                        <div class="chip-body">
                                            <div class="chip-text">canceled</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$199.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/ipad-pro.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Aluratek - Bluetooth Audio Receiver</td>
                                <td class="product-category">Computers</td>
                                <td>
                                    <div class="progress progress-bar-warning">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:65%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-warning">
                                        <div class="chip-body">
                                            <div class="chip-text">on hold</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$29.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/jbl-speaker.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Aluratek - Bluetooth Audio Transmitter</td>
                                <td class="product-category">Audio</td>
                                <td>
                                    <div class="progress progress-bar-warning">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:87%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-danger">
                                        <div class="chip-body">
                                            <div class="chip-text">canceled</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$199.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/beats-headphones.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Basis - Peak Fitness and Sleep Tracker</td>
                                <td class="product-category">Fitness</td>
                                <td>
                                    <div class="progress progress-bar-primary">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:47%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-warning">
                                        <div class="chip-body">
                                            <div class="chip-text">on hold</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$199.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/homepod.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Antec - Nano Diamond Thermal Compound</td>
                                <td class="product-category">Fitness</td>
                                <td>
                                    <div class="progress progress-bar-warning">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:55%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-primary">
                                        <div class="chip-body">
                                            <div class="chip-text">pending</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$29.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/macbook-pro.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Antec - SmartBean Bluetooth Adapter</td>
                                <td class="product-category">Computer</td>
                                <td>
                                    <div class="progress progress-bar-warning">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:63%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-danger">
                                        <div class="chip-body">
                                            <div class="chip-text">canceled</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$39.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/beats-headphones.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Beats by Dr. Dre - 3' USB-to-Micro USB Cable</td>
                                <td class="product-category">Computer</td>
                                <td>
                                    <div class="progress progress-bar-warning">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:87%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-success">
                                        <div class="chip-body">
                                            <div class="chip-text">delivered</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$199.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/jbl-speaker.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Beats by Dr. Dre - Bike Mount for Pill Speakers</td>
                                <td class="product-category">Audio</td>
                                <td>
                                    <div class="progress progress-bar-warning">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:40%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-warning">
                                        <div class="chip-body">
                                            <div class="chip-text">delivered</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$49.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/apple-watch.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Bose® - SoundLink® Color Bluetooth Speaker</td>
                                <td class="product-category">Fitness</td>
                                <td>
                                    <div class="progress progress-bar-primary">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:90%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-primary">
                                        <div class="chip-body">
                                            <div class="chip-text">pending</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$129.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/macbook-pro.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">BRAVEN - Portable Bluetooth Speaker</td>
                                <td class="product-category">Fitness</td>
                                <td>
                                    <div class="progress progress-bar-primary">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:87%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-warning">
                                        <div class="chip-body">
                                            <div class="chip-text">on hold</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$199.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/homepod.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Craig - Portable Wireless Speaker</td>
                                <td class="product-category">Computers</td>
                                <td>
                                    <div class="progress progress-bar-danger">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:20%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-danger">
                                        <div class="chip-body">
                                            <div class="chip-text">canceled</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$199.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/apple-watch.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Definitive Technology - Wireless Speaker</td>
                                <td class="product-category">Fitness</td>
                                <td>
                                    <div class="progress progress-bar-primary">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:75%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-primary">
                                        <div class="chip-body">
                                            <div class="chip-text">pending</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$399.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/beats-headphones.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Fitbit - Charge HR Activity Tracker + Heart Rate (Large)</td>
                                <td class="product-category">Audio</td>
                                <td>
                                    <div class="progress progress-bar-warning">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:60%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-primary">
                                        <div class="chip-body">
                                            <div class="chip-text">pending</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$149.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/magic-mouse.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Fitbit - Flex 1" USB Charging Cable</td>
                                <td class="product-category">Fitness</td>
                                <td>
                                    <div class="progress progress-bar-primary">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:87%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-warning">
                                        <div class="chip-body">
                                            <div class="chip-text">on hold</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$14.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/iphone-x.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Fitbit - Activity Tracker</td>
                                <td class="product-category">Fitness</td>
                                <td>
                                    <div class="progress progress-bar-danger">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:35%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-danger">
                                        <div class="chip-body">
                                            <div class="chip-text">canceled</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$99.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/ipad-pro.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Fitbit - Charge Wireless Activity Tracker (Large)</td>
                                <td class="product-category">Computers</td>
                                <td>
                                    <div class="progress progress-bar-primary">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:87%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-primary">
                                        <div class="chip-body">
                                            <div class="chip-text">pending</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$129.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/apple-watch.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Craig - Tower Speaker</td>
                                <td class="product-category">Audio</td>
                                <td>
                                    <div class="progress progress-bar-warning">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:68%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-warning">
                                        <div class="chip-body">
                                            <div class="chip-text">on hold</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$69.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/jbl-speaker.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">BRAVEN - Outdoor Speaker</td>
                                <td class="product-category">Computers</td>
                                <td>
                                    <div class="progress progress-bar-primary">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:97%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-success">
                                        <div class="chip-body">
                                            <div class="chip-text">delivered</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$199.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/homepod.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Bose® - Bluetooth Speaker Travel Bag</td>
                                <td class="product-category">Computers</td>
                                <td>
                                    <div class="progress progress-bar-primary">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:89%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-warning">
                                        <div class="chip-body">
                                            <div class="chip-text">on hold</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$44.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img"><img src="/app-assets/images/elements/beats-headphones.png" alt="Img placeholder">
                                </td>
                                <td class="product-name">Altec Lansing - Mini H2O Bluetooth Speaker</td>
                                <td class="product-category">Fitness</td>
                                <td>
                                    <div class="progress progress-bar-success">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:87%"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="chip chip-success">
                                        <div class="chip-body">
                                            <div class="chip-text">delivered</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-price">$199.99</td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- dataTable ends -->

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 class="text-uppercase">Thumb View Data</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <div class="data-items pb-3">
                                <div class="data-fields px-2 mt-3">
                                    <div class="row">
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Name</label>
                                            <input type="text" class="form-control" id="data-name">
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-category"> Category </label>
                                            <select class="form-control" id="data-category">
                                                <option>Audio</option>
                                                <option>Computers</option>
                                                <option>Fitness</option>
                                                <option>Appliance</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-status">Order Status</label>
                                            <select class="form-control" id="data-status">
                                                <option>Pending</option>
                                                <option>Canceled</option>
                                                <option>Delivered</option>
                                                <option>On Hold</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-price">Price</label>
                                            <input type="text" class="form-control" id="data-price">
                                        </div>
                                        <div class="col-sm-12 data-field-col data-list-upload">
                                            <form action="#" class="dropzone dropzone-area" id="dataListUpload">
                                                <div class="dz-message">Upload Image</div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <button class="btn btn-primary">Add Data</button>
                                </div>
                                <div class="cancel-data-btn">
                                    <button class="btn btn-outline-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
