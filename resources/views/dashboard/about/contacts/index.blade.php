@extends('layouts.dashboard')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <!-- BEGIN: Content-->
            <div class="content-header row">
            </div>
            <div class="content-body">
                <button type="button" class="btn btn-primary mr-1 mb-2" data-toggle="modal"
                        data-target="#edit-contacts">
                    <span>
                        <i class="feather icon-edit"></i>
                        Edit
                    </span>
                </button>

                <!-- page users view start -->
                <section class="page-users-view">
                    <div class="row">
                        <!-- information start -->
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title mb-2">{{ __('Information') }}</div>
                                </div>
                                <div class="card-body pb-0 pt-1">
                                    <table>
                                        <tr>
                                            <td class="font-weight-bold">{{ __('Phone') }}</td>
                                            <td>{{ $contact->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">{{ __('Email') }}</td>
                                            <td>{{ $contact->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">{{ __('Address') }}</td>
                                            <td>{{ $contact->address }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="p-2">
                                    <iframe style="width: 100%; min-height: 50vh; border: 0;"
                                            src="{{ $contact->google_map }}"
                                            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                        <!-- information start -->

                        <!-- Contacts Edit Modal -->
                        <div class="modal fade" id="edit-contacts" tabindex="-1" role="dialog"
                             aria-labelledby="edit-contacts" aria-hidden="true">
                            <div
                                class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Vertically
                                            Centered</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form pt-1">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="phone"
                                                                   class="form-control"
                                                                   placeholder="{{ __('Phone') }}"
                                                                   name="phone" value="{{ $contact->phone }}">
                                                            <label for="phone">{{ __('Phone') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-label-group">
                                                            <input type="email" id="email"
                                                                   class="form-control" name="email"
                                                                   placeholder="{{ __('Email') }}"
                                                                   value="{{ $contact->email }}">
                                                            <label for="email">{{ __('Email') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="address"
                                                                   class="form-control" name="address"
                                                                   placeholder="{{ __('Address') }}"
                                                                   value="{{ $contact->address }}">
                                                            <label for="address">{{ __('Address') }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-label-group">
                                                            <textarea class="form-control" id="google-map" rows="7"
                                                                      placeholder="Google Map"
                                                                      spellcheck="false">
                                                                {{ $contact->google_map }}
                                                            </textarea>
                                                            <label for="google-map">Google Map</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Save
                                                        </button>
                                                        <button type="reset"
                                                                class="btn btn-outline-warning mr-1 mb-1">
                                                            Reset
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- social links end -->
                        <div class="col-md-12 col-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title mb-2">{{ __('Social Links') }}</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            @foreach($contact->socialMedia as $socialMedia)
                                                <tr>
                                                    <td class="font-weight-bold">{{ $socialMedia->name }}</td>
                                                    <td>{{ $socialMedia->url }}</td>
                                                    <td class="product-action">
                                                        <a type="button"
                                                           class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light"
                                                           data-toggle="modal"
                                                           data-target="#edit-{{ $socialMedia->name }}">
                                                            <i class="feather icon-edit text-primary"></i>
                                                        </a>
                                                        <a type="button"
                                                           class="btn btn-outline-danger mr-1 mb-1 waves-effect waves-light"
                                                           data-toggle="modal"
                                                           data-target="#delete-{{ $socialMedia->name }}">
                                                            <i class="feather icon-trash-2 text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- social links end -->

                        <!-- Social Medias Edit Modal -->
                        @foreach($contact->socialMedia as $socialMedia)
                            <div class="modal fade" id="edit-{{ $socialMedia->name }}" tabindex="-1" role="dialog"
                                 aria-labelledby="edit-{{ $socialMedia->name }}" aria-hidden="true">
                                <div
                                    class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalCenterTitle">{{ __('Edit') .' '. __('Social Media') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form pt-1">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-label-group">
                                                                <input type="text" id="name"
                                                                       class="form-control"
                                                                       placeholder="{{ __('Name') }}"
                                                                       name="name" value="{{ $socialMedia->name }}">
                                                                <label for="name">{{ __('Name') }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-label-group">
                                                                <input type="text" id="url"
                                                                       class="form-control" name="url"
                                                                       placeholder="Url"
                                                                       value="{{ $socialMedia->url }}">
                                                                <label for="url">Url</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary mr-1 mb-1">
                                                                Save
                                                            </button>
                                                            <button type="reset"
                                                                    class="btn btn-outline-warning mr-1 mb-1">
                                                                Reset
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="delete-{{ $socialMedia->name }}" tabindex="-1" role="dialog"
                                 aria-labelledby="delete-{{ $socialMedia->name }}" aria-hidden="true">
                                <div
                                    class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalCenterTitle">{{ __('Delete') .' '. __('Social Media') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form pt-1">
                                                <div class="form-body">
                                                    <h5 class="modal-title mb-2">{{ __('Delete confirm message', ['element'=>$socialMedia->name]) }}</h5>
                                                    <div class="row">
                                                        <input type="hidden" name="name"
                                                               value="{{ $socialMedia->name }}">
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary mr-1 mb-1">
                                                                Yes
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </section>
                <!-- page users view end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
