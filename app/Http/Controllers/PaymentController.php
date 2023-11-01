<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\UserCategory;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private static $uploadsFolder = "payment";
    public static $pageTitle = 'Payment';

    public function index()
    {
        $pageTitle = self::$pageTitle;

        $payment = Payment::where('status', 'pending')->get();
        if (!$payment) {
            return redirect()->route('dashboard')
            ->with('failed', 'Payment Data Is Empty');
        }
        return view('payment.index', compact('pageTitle', 'payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function payment($upgrade_id)
    {
        $selectUpgradeCategori = UserCategory::find($upgrade_id);
        // dd($selectUpgradeCategori);
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->route('dashboard')
            ->with('failed', 'Users Id '. $user_id . ' Not Found');
        }
        $pageTitle = self::$pageTitle;

        return view('payment.payment', compact('pageTitle', 'user', 'selectUpgradeCategori'));
    }

    public function uploadPayment(Request $req)
    {
        if ($req->transaction_receipt != null) {
            // save image
            $filename = 'payment-image-transaction-' . date("YmdHis") . '.' . $req->transaction_receipt->extension();
            $transactionReceipt = $req->transaction_receipt->storeAs(self::$uploadsFolder, $filename, 'modules');
        }

        $created = Payment::create([
            "user_id" => auth()->user()->id,
            "upgraded_category" => $req->upgraded_category,
            "payment_method" => $req->payment_method,
            "bank_account_number" => $req->bank_account_number,
            "bank_account_name" => $req->bank_account_name,
            "bank_name" => $req->bank_name,
            "transaction_receipt" => $transactionReceipt,
        ]);
        if ($created) {
            return redirect()->back()->with('success', 'Pembayaran berhasil dibuat');
        } else {
            return redirect()->back()->with('failed', 'Pembayaran gagal dibuat');
        }
    }

    public function approvePayment($id) 
    {
        if ($id == null) {
            return redirect()->back()
                ->with('failed', 'Approve Payment successfully');
        }

        $payment = Payment::find($id);
        if (!$payment) {
            return redirect()->route('dashboard')
            ->with('failed', 'Payment Data Is Empty');
        }

        $user = User::find($payment->user_id);
        if ($user->user_category_id == $payment->upgraded_category) {
            return redirect()->back()->with('failed', 'Tidak bisa di upgrade, karena user yang dituju sudah sesuai');
        }

        $isEditedPayment = Payment::where('id', $id)->update([
            'status' => 'approved'
        ]);
        dd($isEditedPayment);

        if ($isEditedPayment) {
            return redirect()->back()->with('success', 'Approve Payment successfully');
        } else {
            return redirect()->back()->with('failed', 'Approve Payment Failed');
        }

        $isEditedUserCategory = User::where('id', $user->id)->update([
            'user_category_id' => $payment->upgraded_category
        ]);

        if ($isEditedUserCategory) {
            return redirect()->back()->with('success', 'Update User Category successfully');
        } else {
            return redirect()->back()->with('failed', 'Update User Category Failed');
        }
    }
}
