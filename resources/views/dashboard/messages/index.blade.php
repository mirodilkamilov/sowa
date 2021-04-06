@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <x-custom-alerts/>

            <div class="content-area-wrapper mt-0">
                <div class="sidebar-left">
                    <div class="sidebar">
                        <div class="sidebar-content todo-sidebar d-flex">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                            <div class="todo-app-menu">
                                <div class="sidebar-menu-list">
                                    <div class="list-group list-group-filters font-medium-1 mt-2">
                                        <a href="#" class="list-group-item list-group-item-action border-0 pt-0 active">
                                            <i class="font-medium-5 feather icon-mail mr-50"></i> All
                                        </a>
                                    </div>
                                    <hr>
                                    <h5 class="mt-2 mb-1 pt-25">{{ __('Statuses') }}</h5>
                                    <div class="list-group list-group-labels font-medium-1">
                                        @php
                                            $statusColor = [
                                                 'not reviewed' => 'info',
                                                 'need action' => 'warning',
                                                 'reviewed' => 'success',
                                                 'spam' => 'secondary',
                                            ];

                                            $statuses = array_keys($statusColor);
                                        @endphp
                                        @foreach($statuses as $status)
                                            <a href="#"
                                               class="list-group-item list-group-item-action border-0 d-flex align-items-center">
                                                <span class="bullet bullet-{{ $statusColor[$status] }} mr-1"></span>
                                                {{ Str::title($status) }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-right">
                    <div class="content-wrapper">
                        <div class="content-header row">
                        </div>
                        <div class="content-body">
                            <div class="app-content-overlay"></div>
                            <div class="todo-app-area">
                                <div class="todo-app-list-wrapper">
                                    <div class="todo-app-list">
                                        <div class="app-fixed-search">
                                            <div class="sidebar-toggle d-block d-lg-none"><i
                                                    class="feather icon-menu"></i></div>
                                            <fieldset class="form-group position-relative has-icon-left m-0">
                                                <input type="text" class="form-control" id="todo-search"
                                                       placeholder="Search..">
                                                <div class="form-control-position">
                                                    <i class="feather icon-search"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="todo-task-list list-group">
                                            <ul class="todo-task-list-wrapper media-list">
                                                @foreach($users as $user)
                                                    <li class="todo-item @if ($user->status == 'spam') completed @endif"
                                                        data-toggle="modal" data-target="#editTaskModal"
                                                        value="{{ $user->id }}">
                                                        <div
                                                            class="todo-title-wrapper d-flex justify-content-between mb-50">
                                                            <div class="todo-title-area d-flex align-items-center">
                                                                <div class="title-wrapper d-flex">
                                                                    <h6 class="todo-title mt-50 mx-50 user-name">{{ $user->name }}</h6>
                                                                </div>
                                                                <div class="chip-wrapper">
                                                                    <div class="chip mb-0">
                                                                        <div class="chip-body">
                                                                        <span class="chip-text"
                                                                              data-value="{{ $user->status }}">
                                                                            <span
                                                                                class="bullet bullet-{{ $statusColor[$user->status] }} bullet-xs"></span>
                                                                            {{ $user->status }}
                                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="float-right todo-item-action d-flex"
                                                                 style="width: 0;">
                                                                <button type="button" value="{{ $user->id }}"
                                                                        class="todo-item-delete confirm-btn"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModalCenter"
                                                                        style="cursor: pointer; font-size: 1.2rem; line-height: 1.5; color: #7367F0; background-color: transparent; border: 0 solid transparent;">
                                                                    <i class="feather icon-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <p class="todo-desc mb-0">{{ $user->message }}</p>
                                                        @if(isset($user->comment))
                                                            <div class="wrapper pt-1 text-right truncate divider">
                                                                <i class="feather icon-corner-down-right mr-1 text-success"></i>
                                                                <p class="todo-comm truncate text-black display-inline">{{ $user->comment }}</p>
                                                            </div>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="no-results">
                                                <h5>No Items Found</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog"
                                 aria-labelledby="editTodoTask" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md"
                                     role="document" style="max-width: 550px;">
                                    <div class="modal-content" style="min-height: 70vh;">
                                        <section class="todo-form">
                                            <form class="todo-input user-message-form"
                                                  action="{{ route('contacts.update', old('user_contact_id') ?? 1) }}"
                                                  method="post"
                                                  id="form-edit-todo">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editTodoTask">Edit Task</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 class="text-primary text-center">Statuses</h5>
                                                    <div class="todo-item-action">
                                                        @foreach($statuses as $status)
                                                            <div class="row pl-2">
                                                                <div class="dropdown todo-item-label">
                                                                    <div
                                                                        class="dropdown-item p-0 @unless($loop->first) ml-2 @endunless">
                                                                        <div class="vs-checkbox-con">
                                                                            <input type="radio" name="status"
                                                                                   data-color="{{ $statusColor[$status] }}"
                                                                                   data-value="{{ $status }}"
                                                                                   value="{{ $status }}"
                                                                                   class="user-status"
                                                                                   @if(old('status') == $status) checked @endif>
                                                                            <span class="vs-checkbox">
                                                                                <span class="vs-checkbox--check">
                                                                                    <i class="vs-icon feather icon-check mr-0"></i>
                                                                                </span>
                                                                            </span>
                                                                            <span>{{ $status }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    @error("status")
                                                    <p class="text-danger mb-1">{{ $message }}</p>
                                                    @enderror

                                                    <fieldset class="form-label-group">
                                                        <input type="text" class="edit-todo-item-title form-control"
                                                               name="name" value="{{ old('name') }}"
                                                               placeholder="Title" id="name" readonly>
                                                        <label for="name">User name</label>
                                                    </fieldset>
                                                    <fieldset class="form-label-group">
                                                        <textarea class="edit-todo-item-desc form-control"
                                                                  rows="4" id="message" name="message"
                                                                  placeholder="Add description"
                                                                  readonly>{{ old('message') }}</textarea>
                                                        <label for="message">User message</label>
                                                    </fieldset>
                                                    <fieldset class="form-label-group">
                                                        <textarea class="edit-todo-item-comm form-control"
                                                                  rows="3" id="comment" name="comment"
                                                                  placeholder="Add comment">{{ old('comment') }}</textarea>
                                                        <label for="comment">Add comment</label>
                                                        @error("comment")
                                                        <p class="text-danger pt-1 mb-0">{{ $message }}</p>
                                                        @enderror
                                                        <input type="hidden" name="user_contact_id" id="user_contact_id"
                                                               value="{{ old('user_contact_id') }}">
                                                    </fieldset>
                                                </div>
                                                <div class="modal-footer">
                                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="feather icon-edit d-block d-lg-none"></i>
                                                            <span class="d-none d-lg-block">Update</span>
                                                        </button>
                                                    </fieldset>
                                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                                        <button type="button" class="btn" data-dismiss="modal">
                                                            <i class="feather icon-x d-block d-lg-none"></i>
                                                            <span class="d-none d-lg-block">Cancel</span>
                                                        </button>
                                                    </fieldset>
                                                </div>
                                            </form>
                                        </section>
                                    </div>
                                </div>
                            </div>


                            <!-- Confirm Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div
                                    class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center">{{ __('Are you sure you want to delete?') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p id="user-name"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="" method="post" id="delete-form">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger mr-1 waves-effect waves-light"
                                                        type="submit">
                                                    Yes, delete it!
                                                </button>
                                                <button type="button" class="btn btn-outline-primary"
                                                        data-dismiss="modal"
                                                        aria-label="Close">
                                                    Cancel
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Confirm Modal -->

                            <script>
                                $(".confirm-btn").click(function () {
                                    var userId = $(this).val();
                                    var currentUrl = window.location.href;
                                    currentUrl = currentUrl.replace(/\/$/, '');
                                    var actionUrl = currentUrl + '/' + userId;

                                    var userName = $(this).closest('.todo-item-action').siblings('.todo-title-area').find('.user-name').text();

                                    $("#delete-form").attr("action", actionUrl);
                                    var modalMessage = userName + '\'s message is going to be deleted.';
                                    $("#user-name").text(modalMessage);
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('edit-user-message')
        <script>
            @if($errors->any())
            $('#editTaskModal').modal('show');
            @endif

            $('.todo-item').click(function () {
                var userId = $(this).val();
                var actionUrl = window.location.href + '/' + userId;
                $(".user-message-form").attr("action", actionUrl);
                $('#user_contact_id').attr('value', userId);
            });
        </script>
    @endpush
    <!-- END: Content-->
@endsection
