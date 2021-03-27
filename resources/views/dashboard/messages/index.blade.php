@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <x-dashboard.header :currentRoute="$currentRoute" :arrayOfRoutes="$arrayOfRoutes"/>

            <div class="content-area-wrapper mt-0">
                <div class="sidebar-left">
                    <div class="sidebar">
                        <div class="sidebar-content todo-sidebar d-flex">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                            <div class="todo-app-menu">
                                <div class="form-group text-center add-task">
                                    <button type="button" class="btn btn-primary btn-block my-1" data-toggle="modal"
                                            data-target="#addTaskModal">Add Task
                                    </button>
                                </div>
                                <div class="sidebar-menu-list">
                                    <div class="list-group list-group-filters font-medium-1">
                                        <a href="#" class="list-group-item list-group-item-action border-0 pt-0 active">
                                            <i class="font-medium-5 feather icon-mail mr-50"></i> All
                                        </a>
                                    </div>
                                    <hr>
                                    <h5 class="mt-2 mb-1 pt-25">Filters</h5>
                                    <div class="list-group list-group-filters font-medium-1">
                                        <a href="#" class="list-group-item list-group-item-action border-0"><i
                                                class="font-medium-5 feather icon-star mr-50"></i> Starred</a>
                                        <a href="#" class="list-group-item list-group-item-action border-0"><i
                                                class="font-medium-5 feather icon-info mr-50"></i> Important</a>
                                        <a href="#" class="list-group-item list-group-item-action border-0"><i
                                                class="font-medium-5 feather icon-check mr-50"></i> Completed</a>
                                        <a href="#" class="list-group-item list-group-item-action border-0"><i
                                                class="font-medium-5 feather icon-trash mr-50"></i> Trashed</a>
                                    </div>
                                    <hr>
                                    <h5 class="mt-2 mb-1 pt-25">Labels</h5>
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
                        <!-- Modal (New Task) -->
                        <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm"
                                 role="document">
                                <div class="modal-content">
                                    <section class="todo-form">
                                        <form id="form-add-todo" class="todo-input">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="todo-item-action ml-auto">
                                                    <a class='todo-item-info'><i class="feather icon-info"></i></a>
                                                    <a class='todo-item-favorite'><i class="feather icon-star"></i></a>
                                                    <div class="dropdown todo-item-label">
                                                        <i class="dropdown-toggle mr-0 mb-1 feather icon-tag"
                                                           id="todoLabel" data-toggle="dropdown">
                                                        </i>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                             aria-labelledby="todoLabel">
                                                            <div class="dropdown-item">
                                                                <div class="vs-checkbox-con">
                                                                    <input type="checkbox" data-color="primary"
                                                                           data-value="Frontend">
                                                                    <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check mr-0"></i>
                                                                    </span>
                                                                </span>
                                                                    <span>Frontend</span>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-item">
                                                                <div class="vs-checkbox-con">
                                                                    <input type="checkbox" data-color="warning"
                                                                           data-value="Backend">
                                                                    <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check mr-0"></i>
                                                                    </span>
                                                                </span>
                                                                    <span>Backend</span>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-item">
                                                                <div class="vs-checkbox-con">
                                                                    <input type="checkbox" data-color="success"
                                                                           data-value="Doc">
                                                                    <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check mr-0"></i>
                                                                    </span>
                                                                </span>
                                                                    <span>Doc</span>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-item">
                                                                <div class="vs-checkbox-con">
                                                                    <input type="checkbox" data-color="danger"
                                                                           data-value="Bug">
                                                                    <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check mr-0"></i>
                                                                    </span>
                                                                </span>
                                                                    <span>Bug</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <fieldset class="form-group">
                                                    <input type="text" class="new-todo-item-title form-control"
                                                           placeholder="Title">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <textarea class="new-todo-item-desc form-control" rows="3"
                                                              placeholder="Add description"></textarea>
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <textarea class="new-todo-item-comm form-control" rows="3"
                                                              placeholder="Add Comment"></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="modal-footer">
                                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                                    <button type="button" class="btn btn-primary add-todo-item"
                                                            data-dismiss="modal"><i
                                                            class="feather icon-check d-block d-lg-none"></i>
                                                        <span class="d-none d-lg-block">Add Task</span></button>
                                                </fieldset>
                                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                                    <button type="button" class="btn btn-outline-light"
                                                            data-dismiss="modal"><i
                                                            class="feather icon-x d-block d-lg-none"></i>
                                                        <span class="d-none d-lg-block">Cancel</span></button>
                                                </fieldset>
                                            </div>
                                        </form>
                                    </section>
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
                                                        data-toggle="modal" data-target="#editTaskModal">
                                                        <div
                                                            class="todo-title-wrapper d-flex justify-content-between mb-50">
                                                            <div class="todo-title-area d-flex align-items-center">
                                                                <div class="title-wrapper d-flex">
                                                                    <h6 class="todo-title mt-50 mx-50">{{ $user->name }}</h6>
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
                                                            <div class="float-right todo-item-action d-flex">
                                                                <a class='todo-item-info'><i
                                                                        class="feather icon-info"></i></a>
                                                                <a class='todo-item-favorite'><i
                                                                        class="feather icon-star"></i></a>
                                                                <a class='todo-item-delete'><i
                                                                        class="feather icon-trash"></i></a>
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
                            <!-- Modal -->
                            <div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog"
                                 aria-labelledby="editTodoTask" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md"
                                     role="document">
                                    <div class="modal-content" style="min-height: 70vh;">
                                        <section class="todo-form">
                                            <form id="form-edit-todo" class="todo-input">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editTodoTask">Edit Task</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="todo-item-action ml-auto">
                                                        <a class='edit-todo-item-info todo-item-info'><i
                                                                class="feather icon-info"></i></a>
                                                        <a class='edit-todo-item-favorite todo-item-favorite'><i
                                                                class="feather icon-star"></i></a>
                                                        <div class="dropdown todo-item-label">
                                                            <i class="dropdown-toggle mr-0 mb-1 feather icon-tag"
                                                               id="todoEditLabel" data-toggle="dropdown">
                                                            </i>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                 aria-labelledby="todoEditLabel">
                                                                @foreach($statuses as $status)
                                                                    <div class="dropdown-item">
                                                                        <div class="vs-checkbox-con">
                                                                            <input type="radio" name="status"
                                                                                   data-color="{{ $statusColor[$status] }}"
                                                                                   data-value="{{ $status }}">
                                                                            <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check mr-0"></i>
                                                                        </span>
                                                                    </span>
                                                                            <span>{{ $status }}</span>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <fieldset class="form-label-group">
                                                        <input type="text" class="edit-todo-item-title form-control"
                                                               placeholder="Title" id="name" readonly>
                                                        <label for="name">User name</label>
                                                    </fieldset>
                                                    <fieldset class="form-label-group">
                                                        <textarea class="edit-todo-item-desc form-control"
                                                                  rows="3" id="message"
                                                                  placeholder="Add description" readonly></textarea>
                                                        <label for="message">User message</label>
                                                    </fieldset>
                                                    <fieldset class="form-label-group">
                                                        <textarea class="edit-todo-item-comm form-control"
                                                                  rows="3" id="comment"
                                                                  placeholder="Add comment"></textarea>
                                                        <label for="comment">Add comment</label>
                                                    </fieldset>
                                                </div>
                                                <div class="modal-footer">
                                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                                        <button type="button" class="btn btn-primary update-todo-item"
                                                                data-dismiss="modal"><i
                                                                class="feather icon-edit d-block d-lg-none"></i>
                                                            <span class="d-none d-lg-block">Update</span></button>
                                                    </fieldset>
                                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                                        <button type="button" class="btn" data-dismiss="modal"><i
                                                                class="feather icon-x d-block d-lg-none"></i>
                                                            <span class="d-none d-lg-block">Cancel</span></button>
                                                    </fieldset>
                                                </div>
                                            </form>
                                        </section>
                                    </div>
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
