@extends('layouts.backend.app')


@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">All Roles</h3>
                                    </div><!-- .nk-block-head-content -->
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li class="nk-block-tools-opt"><a href="{{ route('app.roles.create') }}"
                                                            class="btn btn-primary"><em
                                                                class="icon ni ni-plus"></em><span>Create
                                                                Roles</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                </div><!-- .nk-block-between -->
                            </div>
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <table class="datatable-init nowrap table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Permission</th>
                                                <th>Update At</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $key => $role)
                                                <tr class="text-center">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $role->name }}</td>
                                                    <td>
                                                        @if ($role->permissions->count() > 0)
                                                            <span
                                                                class="badge badge-info">{{ $role->permissions->count() }}</span>
                                                        @else
                                                            <span class="badge badge-danger">No permission found :(</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $role->updated_at->diffForHumans() }}</td>
                                                    <td>
                                                        <a href="{{ route('app.roles.edit', $role->id) }}"
                                                            class="btn btn-primary">Edit</a>
                                                        <a href="{{ route('app.roles.destroy', $role->id) }}"
                                                            class="btn btn-danger">Delete</a>

                                                    </td>

                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->
                        <!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->

                </div>
            </div>
        </div>
    </div>
@endsection
