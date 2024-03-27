<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Transaction;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $flights = Flight::all();
        return view('User.dashboard', compact('flights'));
    }

    public function cancelPayment($id){

        $transaction = Transaction::find($id);

        $transaction->payment_status = 'Canceled';
        $transaction->save();

        alert()->success('Tiket berhasil di cancel');

        return redirect()->back();
    }

    public function delete(string $id)
    {
        $transaction = Transaction::find($id);

        $transaction->delete();
        alert()->success('Hore!', 'Operasi yang anda lakukan berhasil');
        return redirect()->back();
    }
}
