@extends('layouts.app')

@section('title', 'Profile')

@push('style')
    <style>
        /* .card {
            width: 90%;
            background-color: #ffffff;
            border: none;
            cursor: pointer;
            transition: all 0.5s;
        } */

        .image img {
            transition: all 0.5s
        }

        .card:hover .image img {
            transform: scale(1.5)
        }

        .image-profil {
            height: 140px;
            width: 140px;
            border-radius: 50%
        }

        .name {
            font-size: 22px;
            font-weight: bold
        }

        /* .idd {
            font-size: 14px;
            font-weight: 600
        } */

        /* .idd1 {
            font-size: 12px
        } */

        /* .number {
            font-size: 22px;
            font-weight: bold
        } */

        /* .follow {
            font-size: 12px;
            font-weight: 500;
            color: #444444
        } */

        /* .btn1 {
            height: 40px;
            width: 150px;
            border: none;
            background-color: #000;
            color: #aeaeae;
            font-size: 15px
        } */

        .text span {
            font-size: 13px;
            color: #545454;
            font-weight: 500
        }

        .icons i {
            font-size: 19px
        }

        hr .new1 {
            border: 1px solid
        }

        /* .join {
            font-size: 14px;
            color: #a0a0a0;
            font-weight: bold
        } */

        /* .date {
            background-color: #ccc
        } */

        .progress-file {
            display: inline-block;
            box-sizing: border-box;
            width: 100%;
            height: 2em;
            /* margin-left: 1em; */
            border: 1px solid #8897e3;
            line-height: 2;
            vertical-align: middle;
            color: #5f76e8;
        }
        .progress-bar-file {
            display: inline-block;
            width: 0;
            height: 100%;
            text-align: center;
            line-height: inherit;
            color: #5f76e8;
            background-color: #ced4eb;
        }
        [data-progress] {
            display: inline-block;
            width: 100%;
            height: 2em;
            font: inherit;
            cursor: pointer;
        }

        tr.spaceUnder>td {
            padding-bottom: 1em;
        }
    </style>
@endpush

@section('main')
    <div class="container-fluid">
        <div class="container mt-4 mb-4 p-3">
            <div class="row">
                <div class="col-5">
                    <div class="card p-4">
                        <div class="image"> 
                            <div class="d-flex flex-column justify-content-center align-items-center mb-4">
                                {{-- image --}}
                                <button class="image-profil btn-secondary"> 
                                    <img src="{{ asset($profile->getAvatarPath()) }}" class="rounded-circle" height="100" width="100" />
                                </button> 
                                {{-- name --}}
                                <span class="name mt-3">Eleanor Pena</span> 
                                {{-- kategori user --}}
                                <button type="button" class="btn btn-outline-{{ $user->user_category->color ?? 'dark' }}" style="border-radius: 15px">{{ $user->user_category->name ?? '' }}</button>
                            </div>

                            <div class="float-left">
                                <div class="row" style="display: flex; justify-content: space-between; align-items: center;">
                                    <div class="col-4">                            
                                        <button type="button" class="btn btn-outline-danger" style="border-radius: 15px"><i class="fas fa-check"></i></button>
                                    </div>
                                    <div class="col-8" style="font-size:10px ">
                                        12 File
                                        <br>
                                        File Perhitungan
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <div class="row" style="display: flex; justify-content: space-between; align-items: center;">
                                    <div class="col-4">                            
                                        <button type="button" class="btn btn-outline-danger" style="border-radius: 15px"><i class="icon-star"></i></button>
                                    </div>
                                    <div class="col-8" style="font-size:10px ">
                                        2 Kategori
                                        <br>
                                        Kategori Regulasi
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="rounded mt-4 text-dark"> 
                                <span>Details</span> 
                            </div>
                            <hr>
                            <table class="text-dark h6">
                                <tr class="spaceUnder">
                                    <td>Email</td>
                                    <td width="10">:</td>
                                    <td>{{ $profile->user->email ?? '' }}</td>
                                </tr>
                                <tr class="spaceUnder">
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>{{ $profile->is_active = 1 ? 'Active' : 'Non Active' }}</td>
                                </tr>
                                <tr class="spaceUnder">
                                    <td>Role</td>
                                    <td>:</td>
                                    <td>{{ $userRole ?? '' }}</td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button class="btn btn-primary btn-md center-block" Style="width: 100px;" data-toggle="modal" data-target="#edit-profile">Edit</button>
                                    
                                    <button class="btn btn-danger btn-md center-block" Style="width: 100px;">Blokir</button>
                                </div>
                            </div>
                            <!--  Modal content for edit profile -->
                            <div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Edit profile</h4>
                                            <button type="button" class="close" data-dismiss="modal"aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- <h2 class="text-center mb-4 mt-0 mt-md-4 px-2">Upgrade akun anda dan dapatkan kelebihannya</h2> --}}
                                            <form method="POST" action="{{ route('profile.update', $profile->id) }}" role="form" enctype="multipart/form-data">
                                                @method('PUT') 
                                                @csrf
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group"> 
                                                            <label for="fullname">
                                                                <h6>Fullname</h6>
                                                            </label> 
                                                            <input type="text" name="fullname" value="{{ $profile->fullname ?? '' }}" placeholder="Fullname" required class="form-control "> 
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label for="fullname">
                                                                <h6>Company Name</h6>
                                                            </label> 
                                                            <input type="text" name="company_name" value="{{ $profile->company_name ?? '' }}" placeholder="Company Name" required class="form-control "> 
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label for="fullname">
                                                                <h6>Company Address</h6>
                                                            </label> 
                                                            <input type="text" name="company_address" value="{{ $profile->company_address ?? '' }}" placeholder="Company Address" required class="form-control "> 
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group"> 
                                                            <label for="fullname">
                                                                <h6>Phone Number</h6>
                                                            </label> 
                                                            <input type="text" name="phone_number" value="{{ $profile->phone_number ?? '' }}" placeholder="Phone Number" required class="form-control "> 
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label for="fullname">
                                                                <h6>Job Title</h6>
                                                            </label> 
                                                            <input type="text" name="job_title"value="{{ $profile->job_title ?? '' }}" placeholder="Job Title" required class="form-control "> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group dropzoneArea" style="height: max-content">
                                                            <label for="Avatar">Avatar</label>
                                                            <x-input.dropzone name="avatar" id="input-thumbnail" customDropzoneId="custom-dropzone"
                                                                dropzonePreviewId="dropzone-preview" namePreviewId="name-preview"
                                                                sizePreviewId="size-preview" filePreviewId="file-preview"
                                                                defaultImage="assets/images/news/illustration1.jpg" defaultName="lorem ipsum"
                                                                defaultSize="0 Mb" />
                                                            @error('title')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group"> 
                                                    <label for="cardNumber">
                                                        <h6>Card number</h6>
                                                    </label>
                                                    <div class="input-group"> 
                                                        <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required="">
                                                        <div class="input-group-append"> 
                                                            <span class="input-group-text text-muted"> 
                                                                <i class="fab fa-cc-visa mx-1"></i>
                                                                <i class="fab fa-cc-mastercard mx-1"></i> 
                                                                <i class="fab fa-cc-amex mx-1"></i> 
                                                            </span> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <div class="form-group"> 
                                                            <label>
                                                                <span class="hidden-xs">
                                                                    <h6>Expiration Date</h6>
                                                                </span>
                                                            </label>
                                                            <div class="input-group"> 
                                                                <input type="number" placeholder="MM" name="" class="form-control" required=""> 
                                                                <input type="number" placeholder="YY" name="" class="form-control" required=""> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-4"> 
                                                            <label data-toggle="tooltip" title="" data-original-title="Three digit CV code on the back of your card">
                                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                            </label> 
                                                            <input type="text" required="" class="form-control"> 
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="card-footer bg-transparent"> 
                                                    <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm">Save changes</button>
                                                 </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @can('payment-view')
                        <div class="card">
                            <div class="card-header bg-transparent" style="display: flex; justify-content: space-between; align-items: center;">
                                <div class="float-left">
                                    {{ $user->user_category->color }}
                                    <button type="button" class="btn btn-outline-{{ $user->user_category->color ?? 'dark' }}" style="border-radius: 15px">{{ $user->user_category->name ?? '' }}</button>
                                </div>
                                <div class="float-right">
                                    <span class="text-primary font-weight-bold">Rp.200.000</span><span>/Kapasitas</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="mb-3">
                                    <tr>
                                        <td width="30">
                                            <input type="radio" style="transform: scale(1.2);" checked>
                                        </td>
                                        <td>
                                            <div>100 capasity Files</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio" style="transform: scale(1.2);" checked>
                                        </td>
                                        <td>
                                            <div>Basic Support</div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="float-left">Kapasitas File</div>
                                <div class="float-right">100 File</div>
                                <br>
                                <div data-progress="html" data-value="70">
                                    <span class="progress-file">
                                        <span id="html" class="progress-bar-file"></span>
                                    </span>
                                </div>
                                <p>
                                    <small>Terpakai : 12 File</small>
                                </p>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a class="btn btn-block btn-primary" href="#" data-toggle="modal" data-target="#upgrade-plan">UPGRADE PLAN</a>
                                <!--  Modal content for upgrade plan -->
                                <div class="modal fade" id="upgrade-plan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Upgrade Plan</h4>
                                                <button type="button" class="close" data-dismiss="modal"aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h2 class="text-center mb-4 mt-0 mt-md-4 px-2">Upgrade akun anda dan dapatkan kelebihannya</h2>
                                                <div class="row">
                                                    @foreach ($userCategory as $item)
                                                        <div class="col-4 mt-4">
                                                            <div class="card border-{{ $item->color ?? '' }} border shadow-none">
                                                                <div class="card-body position-relative">
                                                                    {{-- <div class="position-absolute end-0 me-4 top-0 mt-4">
                                                                        <span class="badge bg-label-primary">Popular</span>
                                                                    </div> --}}
                                                                    <div class="my-3 pt-2 text-center">
                                                                        <img src="{{ asset('assets/images/users/crown.png') }}" alt="Pro Image" height="80">
                                                                    </div>
                                                                    <h3 class="card-title text-center text-capitalize mb-1">{{ $item->name ?? '' }}</h3>
                                                                    <p class="text-center">For small to medium businesses</p>
                                                                    <div class="text-center">
                                                                        <div class="d-flex justify-content-center">
                                                                            <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary">Rp.</sup>
                                                                            <h1 class="price-toggle price-yearly display-6 text-primary mb-0">{{ 'Rp. ' . number_format($item->price, 0, ',', '.') }}</h1>
                                                                            <h1 class="price-toggle price-monthly display-4 text-primary mb-0 d-none">1</h1>
                                                                            <sub class="h6 text-muted pricing-duration mt-auto mb-2 fw-normal">/{{ $item->limit_file ?? '' }} files</sub>
                                                                        </div>
                                                                        {{-- <small class="position-absolute start-0 end-0 m-auto price-yearly price-yearly-toggle text-muted">$ 499 / year</small> --}}
                                                                    </div>
                                                
                                                                    <ul class="list-group my-4 list-unstyled">
                                                                        <li class="mb-2 d-flex align-items-center">
                                                                            <span class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                                                <i class="fas fa-check"></i>
                                                                            </span>
                                                                            <span>Up to {{ $item->limit_file ?? '' }} files</span>
                                                                        </li>
                                                                        @foreach ($item->benefits as $b)
                                                                            <li class="mb-2 d-flex align-items-center">
                                                                                <span class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                                                    <i class="fas fa-check"></i>
                                                                                </span>
                                                                                <span>{{ $b ?? '' }}</span>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                    @if ($user->user_category_id != $item->id)
                                                                            <a href="/payment-display/{{ $item->id ?? '' }}" class="btn btn-primary d-grid w-100" data-bs-dismiss="modal">Upgrade</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
                <div class="col-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="pt-4 pl-2 pr-2 pb-2">
                                <!-- Header form tabs -->
                                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                    <li class="nav-item">
                                        <a data-toggle="pill" href="#overview" class="nav-link active">
                                            <i class="icon-user mr-2"></i> Overview
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="pill" href="#security" class="nav-link">
                                            <i class="icon-lock mr-2"></i> Security
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="pill" href="#payment" class="nav-link">
                                            <i class="icon-tag mr-2"></i> Billing & Plan
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="pill" href="#notification" class="nav-link">
                                            <i class="icon-bell mr-2"></i> Notification
                                        </a>
                                    </li>
                                </ul>
                            </div> <!-- End -->
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- overview -->
                                <div id="overview" class="tab-pane fade show active pt-3">

                                </div> 
                                <!-- security -->
                                <div id="security" class="tab-pane fade pt-3">
                                    <form method="POST" action="{{ route('changePassword', $profile->id) }}" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="currentPassword">Current Password</label>
                                                <div class="input-group" id="show_hide_current_password">
                                                    <input class="form-control" type="password" name="current_password" placeholder="Current Password">
                                                    <span class="input-group-text cursor-pointer">
                                                        <a href="#">
                                                            <i class="fa fa-eye-slash"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="newPassword">New Password</label>
                                                <div class="input-group" id="show_hide_new_password">
                                                    <input class="form-control" type="password" name="new_password" placeholder="New Password">
                                                    <span class="input-group-text cursor-pointer">
                                                        <a href="">
                                                            <i class="fa fa-eye-slash"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                                <div class="input-group" id="show_hide_confirm_password">
                                                    <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password">
                                                    <span class="input-group-text cursor-pointer">
                                                        <a href="">
                                                            <i class="fa fa-eye-slash"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <p class="fw-medium mt-2">Password Requirements:</p>
                                                <ul class="ps-3 mb-0">
                                                    <li class="mb-1">
                                                        Minimum 8 characters long - the more, the better
                                                    </li>
                                                    {{-- <li class="mb-1">At least one lowercase character</li>
                                                    <li>At least one number, symbol, or whitespace character</li> --}}
                                                </ul>
                                            </div>
                                            <div class="col-12 mt-1">
                                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                            </div>
                                        </div>
                                        <input type="hidden">
                                    </form>
                                </div>
                                {{-- payment --}}
                                <div id="payment" class="tab-pane fade pt-3">
                                    Transfer ke bank tersebut dan upload bukti pembayarannya.
                                    <div class="rounded-2 p-3 mb-3" style="background-color: rgba(67,89,113,.05) !important">
                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                            <div class="card-information me-2">
                                                <img class="mb-3 img-fluid" src="https://www.mastercard.co.id/content/dam/public/mastercardcom/id/id/logos/mc-logo-52.svg" alt="Master Card">
                                                <div class="d-flex align-items-center mb-1 flex-wrap gap-2">
                                                    <h6 class="mb-0 me-2">Tatang</h6>
                                                    <span class="badge bg-label-primary">Primary</span>
                                                </div>
                                                <span class="card-number">∗∗∗∗ ∗∗∗∗ 9856</span>
                                            </div>
                                            <div class="d-flex flex-column text-start text-sm-end">
                                                <div class="d-flex order-sm-0 order-1 mt-sm-0 mt-3">
                                                {{-- <button class="btn btn-label-primary me-2" data-bs-toggle="modal" data-bs-target="#editCCModal">Edit</button> --}}
                                                <button class="btn btn-label-secondary">Mastercard</button>
                                                </div>
                                                <small class="mt-sm-auto mt-2 order-sm-1 order-0">Card expires at 12/26</small>
                                            </div>
                                        </div>
                                    </div>
                                    1 x 24 jam admin akan memproses dan mengirim anda notif.
                                    <form method="POST" action="" role="form" enctype="multipart/form-data">
                                        <div class="form-group"> 
                                            <input type="file" name="image" class="">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </form>
                                </div>
                                <!-- notification -->
                                <div id="notification" class="tab-pane fade pt-3">
                                    
                                </div> 
                                <!-- End -->
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <p> 
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit beatae 
                                voluptates cumque ea quaerat aperiam laboriosam labore tempore architecto molestias 
                                voluptate assumenda voluptatem ducimus consectetur ullam sapiente, totam blanditiis 
                                quibusdam!
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit beatae 
                                voluptates cumque ea quaerat aperiam laboriosam labore tempore architecto molestias 
                                voluptate assumenda voluptatem ducimus consectetur ullam sapiente, totam blanditiis 
                                quibusdam!
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit beatae 
                                voluptates cumque ea quaerat aperiam laboriosam labore tempore architecto molestias 
                                voluptate assumenda voluptatem ducimus consectetur ullam sapiente, totam blanditiis 
                                quibusdam!
                            </p>
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
            $("#show_hide_current_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_current_password input').attr("type") == "text"){
                    $('#show_hide_current_password input').attr('type', 'password');
                    $('#show_hide_current_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_current_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_current_password input').attr("type") == "password"){
                    $('#show_hide_current_password input').attr('type', 'text');
                    $('#show_hide_current_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_current_password i').addClass( "fa-eye" );
                }
            });
        });
        $(document).ready(function() {
            $("#show_hide_new_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_new_password input').attr("type") == "text"){
                    $('#show_hide_new_password input').attr('type', 'password');
                    $('#show_hide_new_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_new_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_new_password input').attr("type") == "password"){
                    $('#show_hide_new_password input').attr('type', 'text');
                    $('#show_hide_new_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_new_password i').addClass( "fa-eye" );
                }
            });
        });
        $(document).ready(function() {
            $("#show_hide_confirm_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_confirm_password input').attr("type") == "text"){
                    $('#show_hide_confirm_password input').attr('type', 'password');
                    $('#show_hide_confirm_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_confirm_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_confirm_password input').attr("type") == "password"){
                    $('#show_hide_confirm_password input').attr('type', 'text');
                    $('#show_hide_confirm_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_confirm_password i').addClass( "fa-eye" );
                }
            });
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        // Récup. éléments concernés
        var oBtns = $("[data-progress]");
        //Action au click
        oBtns.on("click", function () {
        var $this = $(this);
        var progress = $this.data("progress");
        var size = $this.data("value");
        $("#" + progress)
            .stop()
            .css({
            width: 0
            })
            .animate({
            width: size + "%"
            }, {
            duration: 2000,
            step: function (valeur, fx) {
                var elem = $(fx.elem);
                elem.text(parseInt(valeur,10) + "%")
            }
            });
        });
        // Déclenche l'animation
        oBtns.trigger("click");
    </script>
@endpush
