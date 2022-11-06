@extends('layouts.app')
@section('title', 'Rumah Sakit')
@section('page-title')
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">
            Rumah Sakit
        </h1>
    </div>
@endsection
@section('content')
    <div class="card card-docs flex-row-fluid mb-2">
        <div class="card-header d-flex justify-content-between">
            <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <input type="search" name="search" class="form-control form-control-solid w-250px ps-15" id="search" placeholder="Cari.." />
            </div>
            <div class="d-flex flex-stack">
                <a type="button" class="btn btn-primary ms-2" href="{{ route('hospital.create') }}">
                    + <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                            <g fill="currentColor">
                                <path
                                    d="M8.5 5.034v1.1l.953-.55l.5.867L9 7l.953.55l-.5.866l-.953-.55v1.1h-1v-1.1l-.953.55l-.5-.866L7 7l-.953-.55l.5-.866l.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z" />
                                <path
                                    d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z" />
                            </g>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
        <div class="card-body fs-6 text-gray-700">
            <table id="hospital-table" class="table table-striped table-row-bordered align-middle gs-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Nama</th>
                        <th>Logo</th>
                        <th>Jam Buka</th>
                        <th>Status</th>
                        <th>Kapasitas</th>
                        <th>No. Telepon</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var datatable = $('#hospital-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            stateSave: false,
            fixedColumns: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    data: 'name',
                    name: 'name',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'photo',
                    name: 'photo',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'time',
                    name: 'time',
                    orderable: true,
                    searchable: false,
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'capacity',
                    name: 'capacity',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'phonenumber',
                    name: 'phonenumber',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    width: '5%'
                },
            ],
            columnDefs: [{
                width: 150,
                targets: 1
            }],
        })

        $('#search').on('keyup', function() {
            datatable.search(this.value).draw();
        });

        function changeStatus(id) {
            if ($(id).is(":checked")) {
                var checked = 1;
            } else {
                var checked = 0;
            }

            var slug = $(slug).data('slug');
            var url = "{{ route('hospital.changeStatus', ':slug') }}";
            url = url.replace(':slug', slug);
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toastr-top-right",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'active': checked,
                },
                success: function(response) {
                    if (response.status == 200) {
                        toastr.success(response.message);
                    } else {
                        toastr.warning(response.message);
                    }
                    datatable.ajax.reload();
                },
                error: function(xhr) {
                    var json = JSON.parse(xhr.responseText);
                    toastr.error(json.error);
                }
            })
        }

        $(document).on("change", "#active", function(e) {
            e.preventDefault();
            var slug = $(this).data("slug");
            var url = "{{ route('hospital.changeStatus', ':slug') }}";
            url = url.replace(':slug', slug);
            var checked = this.checked ? 1 : 0;
            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'active': checked,
                },
                success: function(response) {
                    toastr.success(response.message);
                    datatable.ajax.reload();
                },
                error: function(xhr) {
                    var json = JSON.parse(xhr.responseText);
                    toastr.error(json.message);
                }
            });
        });

        $(document).on("click", "#delete-confirm", function(e) {
            e.preventDefault();
            var slug = $(this).data("slug");
            console.log(slug);
            Swal.fire({
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-light'
                },
                title: 'Apakah anda yakin?',
                text: "Apakah anda yakin ingin menghapus data ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.preventDefault();
                    var slug = $(this).data("slug");
                    var route = "{{ route('hospital.destroy', ':slug') }}";
                    route = route.replace(':slug', slug);
                    $.ajax({
                        url: route,
                        type: 'DELETE',
                        data: {
                            _token: $("meta[name='csrf-token']").attr("content"),
                            slug: slug
                        },
                        success: function(response) {
                            Swal.fire({
                                customClass: {
                                    confirmButton: 'btn btn-success',
                                },
                                title: 'Success',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            })
                            datatable.ajax.reload();
                        },
                        error: function(xhr) {
                            var json = JSON.parse(xhr.responseText);
                            Swal.fire({
                                customClass: {
                                    confirmButton: 'btn btn-success',
                                },
                                title: 'Error',
                                text: json.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            })
                        }
                    });
                }
            })
        });
    </script>
@endpush
