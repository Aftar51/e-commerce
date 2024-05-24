<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionItems;
use App\Http\Controllers\Controller;

class MyTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get data my transition
        $myTransaction = Transaction::where('user_id', auth()->user()->id)->get();

        return view('pages.admin.my-transition.index', compact(
            'myTransaction'
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
    public function show($slug)
    {
        $transactionItem = TransactionItems::where('transaction_id', 'name', $slug)->get();
        return view('pages.admin.my-transition.show', compact(
            'transactionItem'
        ));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
