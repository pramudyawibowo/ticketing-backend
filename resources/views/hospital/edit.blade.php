@extends('layouts.app')
@section('title', 'Edit Setting')
@section('page-title')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">
            Edit System Settings
        </h1>
    </div>
@endsection
@section('content')
    <div class="card card-docs flex-row-fluid mb-2">
        <div class="card-body fs-6 text-gray-700">
            <form action="{{ route('settings.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body p-9">
                    <div class="row mb-5">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-bold mt-2 mb-3">System Name</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " value="{{ old('name') ?? $data->name }}" placeholder="System Name" />
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-bold mt-2 mb-3">Register Balance</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <div class="input-group mb-5">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="register_balance" class="form-control @error('register_balance') is-invalid @enderror " value="{{ old('register_balance') ?? $data->register_balance }}" min="0" />
                            </div>
                            @error('register_balance')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-bold mt-2 mb-3">
                                Minimal Penarikan
                            </div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <div class="input-group mb-5">
                                <span class="input-group-text">Rp</span>
                                <input type="number" id="minimum_withdraw" name="minimum_withdraw" class="form-control @error('minimum_withdraw') is-invalid @enderror " value="{{ old('minimum_withdraw') ?? $data->minimum_withdraw }}" />
                            </div>
                            @error('minimum_withdraw')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-bold mt-2 mb-3">Logo Default</div>
                        </div>
                        <div class="col-lg-8">
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('assets/images/blank.png') }})">
                                <div class="image-input-wrapper w-300px h-125px bgi-position-center" style="background-size: 85%; background-image: url({{ asset('storage/' . $data->logo_default) }})"></div>
                                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change logo default">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="logo_default" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="logo_default_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel logo default">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove logo default">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                            </div>
                            <div class="form-text">Allowed file types: png, jpg, jpeg. (Max. 2MB)</div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-bold mt-2 mb-3">Logo Square</div>
                        </div>
                        <div class="col-lg-8">
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('assets/images/blank.png') }})">
                                <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 85%; background-image: url({{ asset('storage/' . $data->logo_square) }})"></div>
                                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change logo square">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="logo_square" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="logo_square_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel logo square">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Remove logo square">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                            </div>
                            <div class="form-text">Allowed file types: png, jpg, jpeg. (Max. 2MB)</div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-bold mt-2 mb-3">Favicon (Optional, if empty will taken from square logo)</div>
                        </div>
                        <div class="col-lg-8">
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('assets/images/blank.png') }})">
                                <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 85%; background-image: url({{ asset('storage/' . $data->favicon) }})"></div>
                                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change favicon">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="favicon" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="favicon_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel favicon">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove favicon">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                            </div>
                            <div class="form-text">Allowed file types: png, jpg, jpeg. (Max. 2MB)</div>
                        </div>
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('settings.index') }}" role="button" class="btn btn-light btn-active-light-primary me-2">Batalkan</a>
                    <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
