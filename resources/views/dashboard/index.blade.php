@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <x-dashboard.alerts/>

            <div class="content-body">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                     aria-labelledby="account-pill-general" aria-expanded="true">
                                    <form action="{{ route('users.update', $user->id)  }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="name">{{ __('Full name') }}</label>
                                                        <input name="name" value="{{ old('name') ?? $user->name }}"
                                                               type="text"
                                                               class="form-control @error('name') is-invalid @enderror"
                                                               id="name"
                                                               placeholder="Name">
                                                        @error('name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="email">{{ __('Email') }}</label>
                                                        <input name="email" value="{{ old('email') ?? $user->email }}"
                                                               type="text"
                                                               class="form-control @error('email') is-invalid @enderror"
                                                               id="email"
                                                               placeholder="Email">
                                                        @error('email')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="divider">
                                            <div class="divider-text">
                                                <h4 class="title text-primary">{{ __('Change password') }}</h4>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="password">{{ __('New Password') }}</label>
                                                        <input name="password" type="password"
                                                               class="form-control @error('password') is-invalid @enderror"
                                                               id="password" autocomplete="false">
                                                        @error('password')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="password_confirmation">{{ __('Retype') }} {{ __('New Password') }}</label>
                                                        <input name="password_confirmation" type="password"
                                                               class="form-control @error('password_confirmation') is-invalid @enderror"
                                                               id="password_confirmation"
                                                               autocomplete="false">
                                                        @error('password_confirmation')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit"
                                                        class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 waves-effect waves-light">
                                                    {{ __('Save changes') }}
                                                </button>
                                                <button type="reset"class="btn btn-outline-warning waves-effect waves-light">
                                                    {{ __('Cancel') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
