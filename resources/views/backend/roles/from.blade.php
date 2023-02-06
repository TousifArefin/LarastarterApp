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
                                        <h3 class="nk-block-title page-title">{{ isset($role) ? 'Edit' : 'Create' }} Roles
                                        </h3>
                                    </div><!-- .nk-block-head-content -->
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li class="nk-block-tools-opt"><a href="{{ route('app.roles.index') }}"
                                                            class="btn btn-danger"><em
                                                                class="icon ni ni-reply"></em><span>Back</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                </div><!-- .nk-block-between -->
                            </div>
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <form method="POST"
                                        action="{{ isset($role) ? route('app.roles.update', $role->id) : route('app.roles.store') }}">
                                        @csrf
                                        @isset($role)
                                            @method('PUT')
                                        @endisset
                                        <div class="card-body">
                                            <h4 class="card-title">Manage Role</h4>


                                            <div class="form-group">
                                                <label for="name">Role Name</label>
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ $role->name ?? old('name') }}" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="text-center">
                                                <h5>Mannage Permission for Roles</h5>
                                                @error('permissions')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="select-all">
                                                    <label for="select-all" class="custom-control-label">Select All</label>

                                                </div>
                                            </div>

                                            @forelse ($modules->chunk(2) as $key=>$chunks)
                                                <div class="form-row">
                                                    @foreach ($chunks as $key => $module)
                                                        <div class="col">
                                                            <h5>Module: {{ $module->name }}</h5>
                                                            @foreach ($module->permissions as $key => $permission)
                                                                <div class="mb-4 ml-4">
                                                                    <div class="custom-control custom-checkbox mb-2">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="permission-{{ $permission->id }}"
                                                                            name="permissions[]"
                                                                            value="{{ $permission->id }}"
                                                                            @isset($role)
                                                                                @foreach ($role->permissions as $rPermission)
                                                                                    {{ $permission->id = $rPermission->id ? 'checked' : '' }}
                                                                                @endforeach
                                                                            @endisset>
                                                                        <label for="permission-{{ $permission->id }}"
                                                                            class="custom-control-label">{{ $permission->name }}</label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @empty
                                                <div class="row">
                                                    <div class="col text-center">
                                                        <strong>No text found</strong>
                                                    </div>
                                                </div>
                                            @endforelse
                                            <button type="submit" class="btn btn-primary">
                                                create
                                            </button>
                                        </div>


                                    </form>
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
@push('js')
    <script>
        $('#select-all').click(function(event) {
            if (this.checked) {
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>
@endpush
