@extends('layouts.app')

@section('title', 'Show '.$pageTitle)

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h4 class="m-0">Show {{ $pageTitle }}</h4>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm float-right font-weight-bolder">
                                <i class="fa fa-arrow-left"></i>Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="float-left">
                        </div>
                        <div class="float-right">
                        </div>
                        <table class="table table-hover w-100">
                            <tr>
                                <td width="20%">Name</td>
                                <td>{{ $role->name }}</td>
                            </tr>
                            <tr>
                            <tr>
                                <td>Role</td>
                                <td>
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                            <div class="badge badge-success mr-1 mb-1">{{ $v->name }}</div>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush