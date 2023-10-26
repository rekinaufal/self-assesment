@extends('layouts.app')

@section('title', 'Permenperin Categories')

@push('style')
    <link href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endpush

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            </div>
                        @endif
                        @if (session()->has('failed'))
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <strong>{{ session('failed') }}</strong>
                                </div>
                            </div>
                        @endif
                        <div class="float-left">
                            <h4 class="card-title">{{ $pageTitle }} Data</h4>
                        </div>
                        <div class="float-right">
                            <a onclick="setValue(``,`` , '{{ route('permenperincategory.store') }}', 'Add Permenperin')"
                                type="button" style="color: white" data-toggle="modal" data-target="#info-header-modal"
                                class="btn btn-primary mb-3">Add New &nbsp;<i class="fas fa-plus"></i></a>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th class="text-center" width="1%">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permenperin as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $loop->iteration }}.
                                            </td>
                                            <td>
                                                {{ $item->name }}
                                            </td>
                                            <td>
                                                {{ $item->created_at }}
                                            </td>
                                            <td class="d-flex">
                                                <button class="btn btn-success btn-action mr-1"
                                                    onclick="setValue(`{{ $item->id }}`,`{{ $item->name }}` , `{{ route('permenperincategory.update', $item->id) }}` , 'Edit Permenperin' , 'PUT')"
                                                    data-toggle="modal" data-target="#info-header-modal">
                                                    <i class="fa fa-pencil-alt p-0"></i>
                                                </button>

                                                <form action="{{ route('permenperincategory.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-action" title="Delete">
                                                        <i class="fa fa-trash-alt p-0"></i>
                                                    </button>
                                                </form>
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
    <div id="info-header-modal" class="modal fade show" tabindex="-1" role="dialog"
        aria-labelledby="info-header-modalLabel" style="display: none; padding-right: 17px;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-info">
                    <h4 class="modal-title" id="exampleModalLabel">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="formAddOrEdit" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" id="textInputId" name="id">
                            <label for="exampleInputEmail1">Category permenperin</label>
                            <input type="text" name="name" class="form-control" id="textInputName">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save changes</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection

@push('scripts')
    <script>
        // trigger submit for delete data
        function confirmDelete($id) {
            var id = $id;
            $('#myForm-' + id).submit();
        }

        function setValue(id, name, action, title, method) {
            var inputId = document.getElementById('textInputId');
            var inputName = document.getElementById('textInputName');
            var form = document.getElementById('formAddOrEdit');
            var modal = document.getElementById('exampleModalLabel');
            inputId.value = id;
            inputName.value = name;
            form.action = action;
            modal.textContent = title;
            form.method = 'POST';
            var getInput = document.getElementById('inputMethod');
            if (getInput) {
                getInput.remove();
            }
            if (method) {
                var hiddenInput = document.createElement('input');
                hiddenInput.id = 'inputMethod'
                hiddenInput.type = 'hidden';
                hiddenInput.name = '_method';
                hiddenInput.value = 'PUT';
                form.appendChild(hiddenInput);
            }
        }
    </script>
    {{-- <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script> --}}
    {{-- <script src="{{ asset('dist/js/feather.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script> --}}
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    {{-- <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script> --}}
    {{-- <script src="{{ asset('dist/js/custom.min.js') }}"></script> --}}
    <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
@endpush
