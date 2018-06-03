<?php

namespace App\Http\Controllers;

use App\Property;
use App\Category;
use App\Modality;
use App\Location;
use App\City;
use App\State;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('property.index', ['properties' => Property::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('property.create', [
            'categories' => Category::all(),
            'modalities' => Modality::all(),
            'locations' => Location::all(),
            'cities' => City::all(),
            'states' => State::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $property = new Property($request->all());
        if ($property->save()) {
            return redirect()->route('property.index')->with('message', 'Propriedade criada com sucesso!');
        } else {
            return redirect()->route('property.index')->with('message', 'Erro na criação da propriedade!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('property.edit', array('property' => $property));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $property->update($request->all());
        return redirect()->route('property.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('property.index');
    }
}
