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
                        <div class="float-left">
                            <h4 class="card-title">{{ $pageTitle }} Data</h4>
                        </div>
                        <div class="float-right">
                            @can('permenperin-category-create')
                                <a onclick="setValue(``,`` , '{{ route('permenperincategory.store') }}', 'Add Permenperin', 'POST', '')"
                                    type="button" style="color: white" data-toggle="modal" data-target="#info-header-modal"
                                    class="btn btn-primary mb-3">Add New &nbsp;<i class="fas fa-plus"></i>
                                </a>
                            @endcan
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Badge</th>
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
                                                <span class="badge badge-{{ $item->color }}">{{ $item->color_name }}</span>
                                            </td>
                                            <td>
                                                {{ $item->created_at }}
                                            </td>
                                            <td class="d-flex">
                                                @can('permenperin-category-edit')
                                                    <button class="btn btn-success btn-action mr-1"
                                                        onclick="setValue(`{{ $item->id }}`,`{{ $item->name }}` , `{{ route('permenperincategory.update', $item->id) }}` , 'Edit Permenperin' , 'PUT', `{{ $item->color }}`)"
                                                        data-toggle="modal" data-target="#info-header-modal">
                                                        <i class="fa fa-pencil-alt p-0"></i>
                                                    </button>
                                                @endcan
                                                @can('permenperin-category-delete')
                                                    <form action="{{ route('permenperincategory.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-action" title="Delete">
                                                            <i class="fa fa-trash-alt p-0"></i>
                                                        </button>
                                                    </form>
                                                @endcan

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
                            <div class="input-group d-flex flex-column">
                                <label for="textInputName">Category permenperin</label>
                                <input type="text" name="name" class="form-control w-100" id="textInputName">
                            </div>
                            <div class="input-group d-flex flex-column w-100 mt-4">
                                <label for="colors">Checklist the badge color</label>
                                <div class="color-group row">
                                    @foreach ($options['colors'] as $key => $color)
                                        <div class="colors col-4 d-flex align-items-center mt-2">
                                            <input type="radio" name="color" class="form-control"
                                                id="color-{{ $key }}" value="{{ $key }}"
                                                style="width: 15px; height: auto;" {{ $key == 0 ? "checked" : "" }}>
                                            <label for="color-{{ $key }}" style="width: 20px; height: 20px;"
                                                class="ml-2"><span class="badge badge-{{ $key }}">{{ $color }}</span></label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
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

        function setValue(id, name, action, title, method, color) {
            var inputId = document.getElementById('textInputId');
            var inputName = document.getElementById('textInputName');
            var form = document.getElementById('formAddOrEdit');
            var modal = document.getElementById('exampleModalLabel');
            if(color != '') {
                $("input[checked]").removeAttr("checked");
                $("input[value='" + color + "']").prop("checked", true);
            } else {
                $("input[value='primary']").prop("checked", true);
            }
            inputId.value = id;
            inputName.value = name;
            form.action = action;
            modal.textContent = title;
            form.method = 'POST';
            var getInput = document.getElementById('inputMethod');
            if (getInput) {
                getInput.remove();
            }
            if (method != "POST") {
                var hiddenInput = document.createElement('input');
                hiddenInput.id = 'inputMethod'
                hiddenInput.type = 'hidden';
                hiddenInput.name = '_method';
                hiddenInput.value = 'PUT';
                form.appendChild(hiddenInput);
            }
        }
    </script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
@endpush
