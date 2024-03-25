<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Airline;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create($id)
    {
        $flights = Flight::find($id);
        $no_booking = $this->no_book($flights->no_flight, $flights->airline->name, auth()->user()->id);
        return view('User.buy', compact('flights', 'no_booking'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'no_booking' => 'required',
            'user_id' => 'required',
            'customer_name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
            'passanger_name' => 'required',
            'flight_id' => 'required',
            'airline_id' => 'required',
            'total_price' => 'required|integer',
            'payment_status' => 'required',
        ]);

        $flight = Flight::find($request->flight_id);
        $airline = Airline::find($request->airline_id);

        $no_booking = $this->no_book($flight->no_flight, $airline->name, $request->user_id);

        Transaction::create($request->all());

        $request->merge(['no_booking' => $no_booking]);
        alert()->success('Hore!', 'Operasi yang anda lakukan berhasil');
        return redirect()->route('User.dashboard');
    }

    private function no_book($no_flight, $airline, $user_id)
    {

        $booking_number = 'BOOK_' . $no_flight . '_' . $airline . '_' . $user_id;

        return $booking_number;
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $transactions = Transaction::all();
        return view('User.list_tiket', compact('transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
