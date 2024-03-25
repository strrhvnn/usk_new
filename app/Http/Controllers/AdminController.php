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
        return view('Admin.dahsboard',compact('users'));
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
        if($request->keyword){
            $transactions = Transaction::search($request->keyword)->get();
        }else{
            $transactions = Transaction::all();
        }
        return view('Admin.laporan',compact('transactions'));
    }

    public function confirmPayment(Request $request, $id){

        $transactions = Transaction::find($id);
        $transactions->payment_status = 'Success';
        $transactions->save();
        alert()->success('Hore!','Tiket berhasil di konfirmasi');
        return redirect()->route('Admin.laporan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $airlines = Airline::all();
        $users = User::find($id);
        return view('Admin.edit_role', compact(['users','airlines']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'role'=> 'required',
            'name'=> 'required',
            'airline_id'=> 'nullable',
        ]);

        $users = User::find($id);

        $users->update($request->all());
        alert()->success('Hore!','Airline Berhasil ditambahkan');
        return redirect()->route('Admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $users = User::find($id);

        $users->delete();
        alert()->success('Hore!','Operasi yang anda lakukan berhasil');
        return redirect()->back();
    }
}
