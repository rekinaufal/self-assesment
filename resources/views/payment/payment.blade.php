@extends('layouts.app')

@section('title', 'Paymnet')

@push('style')
    <style>
        .rounded {
            border-radius: 1rem
        }

        .nav-pills .nav-link {
            color: #555
        }

        .nav-pills .nav-link.active {
            color: white
        }

        input[type="radio"] {
            margin-right: 5px
        }

        .bold {
            font-weight: bold
        }

    </style>
@endpush

@section('main')
    <div class="container-fluid py-5">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6">Payment Forms</h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <form method="POST" action="{{ route('uploadPayment') }}" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="float-left">
                                                Selected Payment Method
                                                <br>
                                                <input type="radio" name="payment_method" value="manual" id="manual" checked>
                                                Manual
                                                <i class="far fa-image mr-2"></i>
                                                <input type="radio" name="payment_method" value="debit" id="debit">
                                                Debit
                                                <i class="icon-credit-card mr-2"></i> 
                                            </div>
                                            <div class="float-right">
                                                <img class="mb-3 img-fluid" src="https://www.bca.co.id/-/media/Feature/Header/Header-Logo/logo-bca.svg?v=1" alt="Master Card" width="70">
                                                <img class="mb-3 img-fluid" src="https://www.mastercard.co.id/content/dam/public/mastercardcom/id/id/logos/mc-logo-52.svg" alt="Master Card">
                                                <img class="mb-3 img-fluid" src="	https://bankmandiri.co.id/image/layout_set_logo?img_id=31567&t=1698598990960" alt="Master Card" width="70">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 border-secondary border shadow-none mb-3">
                                        <div class="form-group"> 
                                            <label for="bank_account_number">
                                                <h6>Card Number</h6>
                                            </label> 
                                            <input type="text" name="bank_account_number" placeholder="Card Number" required class="form-control"> 
                                        </div>
                                        <div class="form-group"> 
                                            <label for="bank_account_name">
                                                <h6>Name On Card</h6>
                                            </label> 
                                            <input type="text" name="bank_account_name"  placeholder="Company Name" required class="form-control"> 
                                        </div>
                                        <div class="form-group"> 
                                            <label for="bank_name">
                                                <h6>Bank Name</h6>
                                                <small class="text-danger">*Example : Bank Mandiri</small>
                                            </label> 
                                            <input type="text" name="bank_name"  placeholder="Company Name" required class="form-control"> 
                                        </div>
                                    </div>
                                    Transfer ke bank tersebut dan upload bukti pembayarannya.
                                    <div class="rounded-2 p-3 mb-3" style="background-color: rgba(67,89,113,.05) !important">
                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                            <div class="card-information me-2">
                                                <img class="mb-3 img-fluid" src="https://www.mastercard.co.id/content/dam/public/mastercardcom/id/id/logos/mc-logo-52.svg" alt="Master Card">
                                                <div class="d-flex align-items-center mb-1 flex-wrap gap-2">
                                                    <div class="h4" style="color:#609966" id="norek">413 765 634</div>
                                                    <span class="badge bg-label-primary"> a/n Tatang</span>
                                                </div>
                                                {{-- <h6 class="mb-0 me-2">Tatang</h6> --}}
                                                {{-- <span class="card-number">∗∗∗∗ ∗∗∗∗ 9856</span> --}}
                                                <div class="h6">
                                                    10 menit untuk memverifikasi pembayaran
                                                    <br>
                                                    Menerima transfer dari Bank Mastercard saja
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column text-start text-sm-end">
                                                <div class="d-flex order-sm-0 order-1 mt-sm-0 mt-3">
                                                    <button class="btn btn-label-secondary">Mastercard</button>
                                                </div>
                                                <div class="d-flex order-sm-0 order-1 mt-sm-0 mt-3">
                                                    <button type="button" class="btn btn-block btn-outline-primary" value=" SALIN" onclick="copytoClip('#norek')">SALIN</button>
                                                </div>
                                                <small class="mt-sm-auto mt-2 order-sm-1 order-0">Card expires at 12/26</small>
                                            </div>
                                        </div>
                                    </div>
                                    Admin akan memproses dan mengirim anda notif.
                                    <div class="form-group"> 
                                        <input type="file" name="transaction_receipt">
                                    </div>
                                    <input type="hidden" name="upgraded_category" value="{{ $selectUpgradeCategori->id }}">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </div>
                            <div class="col-5">
                                <div class="form-group mt-3" style="background-color: #d9f6ff">
                                    <div class="row">
                                        <div class="col-12" style="padding:30px">
                                            <div class="row" style="display: flex; justify-content: bottom; align-items: center;">
                                                <div class="col-6">
                                                    <h5><b>ORDER SUMMARY</b></h5>
                                                </div>
                                                <div class="col-6">
                                                    <div class="float-right">
                                                        <img src="{{ asset('/assets/images/Elearning.png') }}" alt="icon e-learning" height="40px">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row" style="display: flex; justify-content: bottom; align-items: center;">
                                                        <div class="col-4">     
                                                            <img src="{{ asset('/assets/images/credit-card.png') }}" alt="icon" width="50px">
                                                        </div>
                                                        <div class="col-8 h5" style="margin-bottom: 0;">
                                                            {{ auth()->user()->user_profile->fullname ?? '' }}
                                                            <br>
                                                            {{ $selectUpgradeCategori->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <table width="100%">
                                                        <tr>
                                                            <td class="text-right">
                                                                {{  date('l, d M Y') }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row pt-2">
                                                <div class="col-12">
                                                    Benefits:
                                                    @foreach ($selectUpgradeCategori->benefits as $b)
                                                        <p class="mb-2 d-flex align-items-center">
                                                            <span class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2">
                                                                <i class="fas fa-check"></i>
                                                            </span>
                                                            <span>{{ $b }}</span>
                                                        </p>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                                <div class="col-7 text-right">
                                                    Total
                                                </div>
                                                <div class="col-5 text-right">
                                                    {{ 'Rp. ' . number_format($selectUpgradeCategori->price, 0, ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 offset-8">
                                                    {{-- @if ($EBC->status == 0)
                                                        <a href="{{ route('ebc.edit', $EBC->id) }}?type=payment" class="btn btn-block bg-blue text-white">Continue Payment Process</a>
                                                    @endif --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12" style="padding: 20px !important">
                                <div class="row">
                                    <div class="col-12">
                                        <table width="100%">
                                            <tr>
                                                <td width="30%">
                                                    <img src="https://www.mastercard.co.id/content/dam/public/mastercardcom/id/id/logos/mc-logo-52.svg" alt="icon"
                                                        height="60px">
                                                </td>
                                                <td style="vertical-align:bottom">
                                                    <h3 class="blueColor">Mastercard(Virtual Account)</h3>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="blueColor">Nomor Akun Rekening</h4>
                                    </div>
                                    <div class="col-9">
                                        <h1 style="color:#609966" id="norek">413 765 634</h1>
                                    </div>
                                    <div class="col-3">
                                        <button type="button" class="btn btn-block btn-outline-dark" value=" SALIN" onclick="copytoClip('#norek')">SALIN</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="blueColor">10 menit untuk memverifikasi pembayaran</h5>
                                    </div>
                                    <div class="col-12">
                                        <h5>Menerima transfer dari Bank Mastercard saja</h5>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mt-3">
                            <div class="row">
                                <div class="col-12" style="padding:30px">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5><b>ORDER SUMMARY</b></h5>
                                        </div>
                                        <div class="col-6">
                                            <div class="float-right">
                                                <img src="/assets/images/screening-indonesia/company/logo_ol0sdk.png" alt="icon" height="40px">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <table width="100%">
                                                <tr>
                                                    <td width="15%">
                                                        <img src="/assets/images/icon/4.png" alt="icon" width="70px">
                                                    </td>
                                                    <td>
                                                        <h6>{{ 'full_name' }}</h6>
                                                        <h6>{{ 'position' }}</h6>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-6">
                                            <table width="100%">
                                                <tr>
                                                    <td class="text-right">
                                                        {{  date('l, d M Y') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">
                                                        {{ 'NoInvoice' }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            Selected Service Component:
                                            <table width="100%">
                                                <tr>
                                                    <td colspan="2">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>TOTAL</td>
                                                    <td>
                                                        <div>{{ '30000' }}</div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-6">
                                            Documents:
                                            <table width="100%">
                                                @foreach($ComponentServiceForSummary as $it)
                                                    <tr>
                                                        <td width="10%">
                                                            <img src="/assets/images/icon/6.png" alt="icon" width="30px">
                                                        </td>
                                                        <td>{{ $it->name_component }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 offset-8">
                                            @if ($EBC->status == 0)
                                                <a href="{{ route('ebc.edit', $EBC->id) }}?type=payment" class="btn btn-block bg-blue text-white">Continue Payment Process</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush
