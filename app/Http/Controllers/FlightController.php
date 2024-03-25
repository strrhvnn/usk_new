<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        $this->validate($request, [
            'no_flight' => 'required',
            'departure_city' => 'required',
            'arrival_city' => 'required',
            'arrival_date' => 'required',
            'departure_date' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required|integer',
            'seat' => 'required|integer',
        ]);

        Flight::create($request->all());
        alert()->success('Hore!','Operasi yang anda lakukan berhasil');
        return redirect()->route('Maskapai.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_flight' => 'required',
            'departure_city' => 'required',
            'arrival_city' => 'required',
            'arrival_date' => 'required',
            'departure_date' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required|integer',
            'seat' => 'required|integer',
        ]);

        $flights = Flight::find($id);

        $flights->update($request->all());
        alert()->success('Hore!','Operasi yang anda lakukan berhasil');
        return redirect()->route('Maskapai.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $flights = Flight::find($id);

        $flights->delete();
        alert()->success('Hore!','Operasi yang anda lakukan berhasil');
        return redirect()->back();
    }
}
