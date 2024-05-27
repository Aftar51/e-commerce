<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::select('id', 'user_id', 'name', 'email', 'phone', 'status', 'address', 'courier', 'payment', 'payment_url')->latest()->get();

        return view('pages.admin.transition.index', compact(
            'transaction'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // get data transaction id
        $transaction = Transaction::findOrFail($id);

        try {
            $transaction->update([
                'status' => $request->status,
            ]);

            return redirect()->route('admin.my-transition.index')->with('success', 'Berhasil');
        } catch (Exception $e) {
            return redirect()->route('admin.transition.index')->with('error', 'Gagal');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
