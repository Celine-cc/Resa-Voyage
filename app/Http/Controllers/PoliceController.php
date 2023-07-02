<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;

class PoliceController extends Controller
{
    private $valid_countries= array('france', 'France', 'Espagne', 'espagne', 'Italie', 'italie', 'Belgique', 'belgique');

    public function index()
    {
        
        $reservations = Reservation::all()->sortBy('nom');
        return view('trips.index')->with(['reservations'=>$reservations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('trips.create')->with([
            'command'=>'create',
            'pays'=>$this->valid_countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(([
            'nom'=>'required|string|max:60',
            'age'=>'required|integer|min:0',
            'pays'=>'in:France,Espagne,france,espagne',
        ]));


        $nom = $request->input('nom');
        $age = $request->input('age');
        $pays = $request->input('pays');



        Reservation::create([
            'nom'=> $nom, 
            'age'=> $age, 
            'pays'=> $pays 
        ]);

        return view('trips.confirm')->with([
            'nom'=> $nom,
            'age'=> $age, 
            'pays'=> $pays 
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $resa = Reservation::findOrFail($id);
        return view('trips.create')->with([
            'reservation'=>$resa,
            'command'=>'show'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservations =Reservation::findOrFail($id);
        return view ('trips.create')->with([
            'command'=>'update',
            'reservation'=>$reservations
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(([
            'nom'=>'required|string|max:60',
            'age'=>'required|integer|min:0',
            'pays'=>'in:France,Espagne,france,espagne',
        ]));


        $reservations = Reservation::findOrFail($id);
        $reservations->nom=$request->nom;
        $reservations->age=$request->age;
        $reservations->pays=$request->pays;  

        $reservations->save();
        return redirect(route ('PoliceWeb.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resa = Reservation::FindOrFail($id);
        $resa->delete();
        
        return redirect(route('PoliceWeb.index'));
    }
}
