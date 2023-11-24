@extends('layouts.app')

@section('title', 'Payment Manual Data')

@push('style')
    <link href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endpush

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close"
                                        data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            </div>
                        @endif
                        @if(session()->has('failed'))
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close"
                                        data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <strong>{{ session('failed') }}</strong>
                                </div>
                            </div>
                        @endif --}}
                        <div class="float-left">
                            <h4 class="card-title">{{ $pageTitle }} Data</h4>
                            {{-- @can('user-pdf')
                                <div class="input-group">
                                    <a href="{{ url('/exportPdfUsers') }}" class="btn btn-sm btn-warning">
                                        Export PDF &nbsp;
                                        <i class="fas fa-file-pdf fa-sm"></i>
                                    </a>
                                </div>
                            @endcan --}}
                        </div>
                        
                        <div class="float-right">
                            {{-- <a href="{{ route('roles.create') }}" class="btn btn-primary mb-1">
                                Add New &nbsp;<i class="fas fa-plus"></i>
                            </a>
                            @can('user-excel')
                                <div class="input-group">
                                    <a href="{{ url('/exportExcelUsers') }}" class="btn btn-sm btn-success mb-1">
                                        Export Excel
                                        <i class="fas fa-file-excel fa-sm"></i>
                                    </a>
                                </div>
                            @endcan --}}
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bank Account Name</th>
                                        <th>Bank Name</th>
                                        <th>Created At</th>
                                        <th class="text-center" width="1%">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payment as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $loop->iteration }}.
                                            </td>
                                            <td>
                                                {{ $item->bank_account_name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $item->bank_name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $item->created_at ?? '' }}
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a id="modal-user-show" class="btn btn-warning mr-1 approve-payment" href="{{ route('approvePayment',$item->id) }}" title="Show">
                                                        <i class="fa fa-check p-0 text-white"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.approve-payment').on('click', function(e) {
                e.preventDefault();
                var approveUrl = $(this).attr('href');
                swal({
                    title: 'Are you sure?',
                    text: 'You are about to approve this payment.',
                    icon: 'warning',
                    buttons: [
                        'No, cancel it!',
                        'Yes, I am sure!'
                    ],
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        window.location.href = approveUrl;
                        // swal({
                        //     title: 'Shortlisted!',
                        //     text: 'Candidates are successfully shortlisted!',
                        //     icon: 'success'
                        // }).then(function() {
                        //     form.submit(); // <--- submit form programmatically
                        // });
                    } else {
                        // swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });
            });
        });
    </script>

    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
@endpush