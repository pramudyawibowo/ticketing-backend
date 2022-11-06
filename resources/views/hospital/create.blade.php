@extends('layouts.app')
@section('title', 'Input Data RS')
@section('page-title')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">
            Input Data Rumah Sakit
        </h1>
    </div>
@endsection
@section('content')
    <div class="card card-docs flex-row-fluid mb-2">
        <div class="card-body fs-6 text-gray-700">
            <form action="{{ route('hospital.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body p-9">
                    <div class="row mb-5">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-bold mt-2 mb-3">Nama Rumah Sakit</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " value="{{ old('name') }}" placeholder="Nama Rumah Sakit" />
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-bold mt-2 mb-3">Alamat</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <textarea name="address" id="address" cols="30" class="form-control @error('address') is-invalid @enderror" aria-expanded="true">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-bold mt-2 mb-3">Nomor telepon</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <input type="text" name="phonenumber" class="form-control @error('phonenumber') is-invalid @enderror " value="{{ old('phonenumber') }}" placeholder="Nomor telepon" />
                            @error('phonenumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl">
                            <div class="fs-6 fw-bold mt-2 mb-3">Jam Buka</div>
                        </div>
                        <div class="col-xl fv-row">
                            <input name="open_time" id="open_time" class="form-control @error('open_time') is-invalid @enderror " value="{{ old('open_time') }}" placeholder="Jam Buka" />
                            @error('open_time')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xl">
                            <div class="fs-6 fw-bold mt-2 mb-3 text-xl-end">Jam Tutup</div>
                        </div>
                        <div class="col-xl fv-row">
                            <input name="close_time" id="close_time" class="form-control @error('close_time') is-invalid @enderror" value="{{ old('close_time') }}" placeholder="Jam Tutup" />
                            @error('close_time')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-bold mt-2 mb-3">Kapasitas Harian</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <input type="number" name="capacity" class="form-control @error('capacity') is-invalid @enderror " value="{{ old('capacity') }}" min="1" placeholder="Kapasitas Harian" />
                            @error('capacity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-bold mt-2 mb-3">Rumah Sakit Aktif?</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" name="active" id="active" value="{{ old('active') ? 1 : 0 }}" {{ old('active') ? 'checked' : '' }}/>
                                <label class="form-check-label" for="active" id="labelActive">
                                    {{ old('active') ? 'Ya' : 'Tidak' }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-bold mt-2 mb-3">Logo Rumah Sakit</div>
                        </div>
                        <div class="col-lg-8">
                            <div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url('{{ asset('assets/media/logo-default.png') }}')">
                                <div class="image-input-wrapper w-200px h-200px"></div>
                                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Change logo">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="photo" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="photo_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Cancel logo">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Remove logo">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                            </div>
                            <div class="form-text">Allowed file types: png, jpg, jpeg. (Max. 1MB)</div>
                        </div>
                    </div>
                
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Batalkan</button>
                    <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $("#open_time").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
        });
        $("#close_time").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
        });
        $("#active").on('change', function() {
            if (this.checked) {
                $('#labelActive').html('Ya');
                $(this).val(1);
            } else {
                $('#labelActive').html('Tidak');
                $(this).val(0);
            }
            
        })
    </script>
@endpush
