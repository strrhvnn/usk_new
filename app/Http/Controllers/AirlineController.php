<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airlines = Airline::all();
        return view('Admin.list_airline', compact('airlines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.add_airline');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
        ['name'=>'required']);

        Airline::create($request->all());
        alert()->success('Hore!','Operasi yang anda lakukan berhasil');
        return redirect()->route('Admin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Airline $airline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Airline $airline, $id)
    {
        $airlines = Airline::find($id);
        return view('Admin.edt_airline', compact('airlines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Airline $airline)
    {
        $this->validate($request,
        ['name'=>'required']);

        $airline->update($request->all());
        alert()->success('Hore!','Operasi yang anda lakukan berhasil');
        return redirect()->route('Admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Airline $airline, $id)
    {
        $airlines = Airline::find($id);

        $airlines->delete();
        alert()->success('Hore!','Operasi yang anda lakukan berhasil');
        return redirect()->route('Admin.dashboard');
    }
}
