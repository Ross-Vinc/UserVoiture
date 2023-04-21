<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Http\Requests\StoreVoitureRequest;
use App\Http\Requests\UpdateVoitureRequest;

class VoitureController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Voiture::class, 'voiture');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $voitures = Voiture::paginate(10);
        $links = $voitures->links();
        return view('voitures.index', compact('voitures', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('voitures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVoitureRequest $request)
    {
        $voiture = $request->user()->voitures()->create($request->validated());
        return redirect()->route('voitures.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voiture $voiture)
    {
        return view('voitures.show', compact('voiture'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voiture $voiture)
    {
        return view('voitures.edit', compact('voiture'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoitureRequest $request, Voiture $voiture)
    {
        $voiture->update($request->validated());
        return redirect()->route('voitures.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voiture $voiture)
    {
        $voiture->delete();
        return redirect()->route('voitures.index');
    }
}
