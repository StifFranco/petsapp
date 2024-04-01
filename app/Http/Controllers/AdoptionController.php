<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pet;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adops = Adoption::paginate(10);
        return view('adoptions.index')->with('adops', $adops);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $adps = Adoption::all();
       $idp = array();
       foreach  ($adps as $adp){
            $idp[] = $adp->pet_id;
       }

       $pets = Pet::whereNotIn('id', $idp)->get();
       return view('adoptions.create')->with('pets',$pets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $adp = new Adoption;
        $adp->user_id = $request->user_id;
        $adp->pet_id  = $request->pet_id;

        if ($adp->save()) {
            return redirect('myadoptions')->with('message', 'The Adoption was successfully!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Adoption $adoption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adoption $adoption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adoption $adoption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adoption $adoption)
    {
        //
    }

    public function myadoptions()
    {
        $adps = Adoption::where('user_id', Auth::user()->id)->get();
        return view('adoptions.myadoptions')->with('adps', $adps);
    }

    public function add(Request $request)
    {
        $pet = Pet::find($request->id);
        return view('adoptions.add')->with('pet', $pet);
    }
}
    