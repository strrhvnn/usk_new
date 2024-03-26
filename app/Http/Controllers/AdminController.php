<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Flight;
use App\Models\Airline;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('Admin.dahsboard', compact('users'));
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
    public function show(Request $request)
    {

        if ($request->keyword) {
            $transactions = Transaction::where('no_booking', 'like', '%' . $request->keyword . '%')
                                        ->orWhere('customer_name', 'like', '%' . $request->keyword . '%')
                                        ->orWhere('passanger_name', 'like', '%' . $request->keyword . '%')
                                        ->orWhereHas('flight', function ($query) use ($request) {
                                            $query->where('no_flight', 'like', '%' . $request->keyword . '%')
                                                  ->orWhere('departure_city', 'like', '%' . $request->keyword . '%')
                                                  ->orWhere('departure_date', 'like', '%' . $request->keyword . '%')
                                                  ->orWhere('arrival_date', 'like', '%' . $request->keyword . '%')
                                                  ->orWhere('arrival_city', 'like', '%' . $request->keyword . '%');
                                        })
                                        ->get();
        } else {
            $transactions = Transaction::all();
        }
        return view('Admin.laporan', compact('transactions'));

        // if ($request->keyword) {
        //     $transactions = Transaction::search($request->keyword)->get();
        // } else {
        //     $transactions = Transaction::all();
        // }
        // return view('Admin.laporan', compact('transactions'));
    }

    public function confirmPayment(Request $request, $id)
    {
        // Mengambil data transaksi
        $transaction = Transaction::find($id);

        // Memeriksa apakah ada kursi tersedia
        $flight = $transaction->flight;
        if ($flight->seat <= 0) {
            // Jika tidak ada kursi tersedia, memberikan pesan kesalahan
            alert()->error('Maaf!', 'Tiket sudah habis.');
            return redirect()->back();
        }

        // Mengupdate status pembayaran
        $transaction->payment_status = 'Success';
        $transaction->save();

        // Mengurangi jumlah kursi yang tersedia dalam tabel penerbangan
        $flight->seat -= 1; // Mengurangi satu kursi
        $flight->save();

        // Memberi pemberitahuan bahwa pembayaran berhasil dikonfirmasi
        alert()->success('Hore!', 'Tiket berhasil dikonfirmasi');

        return redirect()->route('Admin.laporan');
    }

    public function canceledPayment($id){
        $transaction = Transaction::find($id);

        $transaction->payment_status = 'Canceled';
        $transaction->save();

        alert()->success('Tiket berhasil di cancel');

        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $airlines = Airline::all();
        $users = User::find($id);
        return view('Admin.edit_role', compact(['users', 'airlines']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'role' => 'required',
            'name' => 'required',
            'airline_id' => 'nullable',
        ]);

        $users = User::find($id);

        $users->update($request->all());
        alert()->success('Hore!', 'Operasi yang anda lakukan berhasil');
        return redirect()->route('Admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $users = User::find($id);

        $users->delete();
        alert()->success('Hore!', 'Operasi yang anda lakukan berhasil');
        return redirect()->back();
    }
}
