@extends('layouts.dashboard')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <x-dashboard.alerts/>

            <!-- BEGIN: Content-->
            <div class="content-header row">
            </div>
            <div class="content-body {{ !isset($contact) ? 'fullheight-content' : '' }}">
                @if(isset($contact))
                    <button type="button" class="btn btn-primary mr-1 mb-2" data-toggle="modal"
                            data-target="#edit-company-contacts">
                        <span><i class="feather icon-edit"></i> {{ __('Edit') }}</span>
                    </button>

                    <x-dashboard.about.contacts.edit-modal :contact="$contact"/>
                @else
                    <button type="button" class="btn btn-success mr-1 mb-2" data-toggle="modal"
                            data-target="#add-company-contacts">
                        <span><i class="feather icon-plus"></i> {{ __('Add') }} {{ __('company contacts') }}</span>
                    </button>

                    <x-dashboard.about.contacts.add-modal/>
                @endif

                <section class="page-users-view">
                    <div class="row">
                        @if(isset($contact))
                            <div class="col-md-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title mb-2">{{ __('Information') }}</div>
                                    </div>
                                    <div class="card-body pb-0 pt-1">
                                        <table class="table table-hover table-bordered">
                                            <tr>
                                                <td class="font-weight-bold">{{ __('Phone') }}</td>
                                                @foreach($contact->phone as $phone)
                                                    <td>{{ $phone }}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">{{ __('Email') }}</td>
                                                @foreach($contact->email as $email)
                                                    <td>{{ $email }}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">{{ __('Address') }}</td>
                                                <td colspan="2">{{ $contact->address }}</td>
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

                            <!-- social links -->
                            <div class="col-md-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ __('Social Media Links') }}</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            @php $socialMedia = count($contact->socialMedia) ? $contact->socialMedia : null; @endphp

                                            <x-dashboard.about.contacts.social-media-form :contact="$contact"
                                                                           :socialMedia="$socialMedia"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @push('company-contacts-list-manipulation')
        <script>
            function addListItem(obj) {
                var listItemPhone = `<div class="list-item-container mt-0 mb-2">
                  <div class="form-label-group list-item mb-0">
                    <input name="contacts[phone][]" value="" id="phone" class="form-control" placeholder="Phone" type="text">
                    <i class="feather icon-plus-circle text-primary pl-1 add-list-item" onclick="addListItem(this)"></i>
                    <i class="feather icon-trash-2 text-danger pl-1 remove-list-item" onclick="removeListItem(this)"></i>
                    <label for="phone">Phone</label>
                  </div>
                </div>`;

                var listItemEmail = `<div class="list-item-container mt-0 mb-2">
                  <div class="form-label-group list-item mb-0">
                    <input name="contacts[email][]" value="" id="email" class="form-control" placeholder="Email" type="email">
                    <i class="feather icon-plus-circle text-primary pl-1 add-list-item" onclick="addListItem(this)"></i>
                    <i class="feather icon-trash-2 text-danger pl-1 remove-list-item" onclick="removeListItem(this)"></i>
                    <label for="email">Email</label>
                  </div>
                </div>`;

                var listItemType = $(obj).siblings('input').attr('id');
                var listItem = (listItemType === 'phone') ? listItemPhone : listItemEmail;
                $(obj).parents('.' + listItemType + '-list-container').append(listItem);
            }

            function removeListItem(obj) {
                $(obj).parents('.list-item-container').remove();
            }
        </script>
    @endpush
@endsection
