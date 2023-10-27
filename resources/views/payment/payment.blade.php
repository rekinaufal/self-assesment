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
    <div class="container-fluid">
        <div class="container py-5">
            <!-- For demo purpose -->
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-6">Payment Forms</h1>
                </div>
            </div> <!-- End -->
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <div class="shadow-sm pt-4 pl-2 pr-2 pb-2">
                                <!-- Credit card form tabs -->
                                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                    <li class="nav-item">
                                        <a data-toggle="pill" href="#credit-card" class="nav-link active ">
                                            <i class="fas fa-credit-card mr-2"></i> Credit Card
                                        </a>
                                    </li>
                                    <li class="nav-item" style="cursor: not-allowed;">
                                        <a data-toggle="pill" href="#paypal" class="nav-link disabled">
                                            <i class="fab fa-paypal mr-2"></i> Paypal
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="pill" href="#net-banking" class="nav-link">
                                            <i class="fas fa-mobile-alt mr-2"></i> Net Banking
                                        </a>
                                    </li>
                                </ul>
                            </div> <!-- End -->
                            <!-- Credit card form content -->
                            <div class="tab-content">
                                <!-- credit card info-->
                                <div id="credit-card" class="tab-pane fade show active pt-3">
                                    <form role="form" onsubmit="event.preventDefault()">
                                        <div class="form-group"> <label for="username">
                                                <h6>Card Owner</h6>
                                            </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                        <div class="form-group"> <label for="cardNumber">
                                                <h6>Card number</h6>
                                            </label>
                                            <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                                <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group"> <label><span class="hidden-xs">
                                                            <h6>Expiration Date</h6>
                                                        </span></label>
                                                    <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                        <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                    </label> <input type="text" required class="form-control"> </div>
                                            </div>
                                        </div>
                                        <div class="card-footer"> <button type="button" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                                    </form>
                                </div>
                            </div> <!-- End -->
                            <!-- Paypal info -->
                            <div id="paypal" class="tab-pane fade pt-3">
                                <h6 class="pb-2">Select your paypal account type</h6>
                                <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div>
                                <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                                <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                            </div> <!-- End -->
                            <!-- bank transfer info -->
                            <div id="net-banking" class="tab-pane fade pt-3">
                                <div class="row">
                                    <div class="col-12" style="padding: 20px !important">
                                        <div style="background-color:#EEEEEE;padding:30px">
                                            <div class="row">
                                                <div class="col-12">
                                                    <table width="100%">
                                                        <tr>
                                                            <td width="30%">
                                                                <img src="/assets/images/icon/Mandiri_logo.png" alt="icon"
                                                                    height="60px">
                                                            </td>
                                                            <td style="vertical-align:bottom">
                                                                <h3 class="blueColor">Mandiri(Virtual Account)</h3>
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
                                                    <h1 style="color:#609966" id="norek">000 000 000 ***</h1>
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
                                                    <h5>Menerima transfer dari Bank Mandiri saja</h5>
                                                </div>
                                            </div>
                                            {{-- <form action="{{ route ('ebc.updatePayment') }}" method="post" role="form" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id_header" value="{{ Request::segment(2) }}">
                                                <div class="form-group mt-3">
                                                    <label>Upload proof of transfer</label>
                                                    @if ($Payment->payment != null) 
                                                        <a href="{{ $Payment->payment }}" target="_blank" class="form-control">Preview File</a>
                                                    @endif
                                                    <input type="hidden" class="form-control" name="gambarold" value="{{ $Payment->payment }}">
                                                    <input type="file" class="form-control" name="payment" required>
                                                    <br>
                                                    @if ($EBC->status == 0)
                                                        <button type="submit" class="btn bg-blue text-white">Submit</button>
                                                    @endif
                                                </div>
                                            </form> --}}
                                        </div>
                                    </div>
                            </div> <!-- End -->
                            <!-- End -->
                        </div>
                    </div>
                </div>
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
