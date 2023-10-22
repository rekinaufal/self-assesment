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
                                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm float-right font-weight-bolder">
                                        <i class="fa fa-arrow-left"></i>Back
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover w-100">
                                    <tr>
                                        <td width="20%">Name</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Username</td>
                                        <td>{{ $user->username }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Email</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Role</td>
                                        <td>{{ $user->roles[0]->name }}</td>
                                    </tr>
                                </table>
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