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
        return view('admin.property.index', [
            'properties' => Property::orderBy('nome')->get(),
            'categories' => Category::orderBy('nome')->get(),
            'modalities' => Modality::orderBy('nome')->get(),
            'locations' => Location::orderBy('nome')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property.create', [
            'categories' => Category::orderBy('nome')->get(),
            'modalities' => Modality::orderBy('nome')->get(),
            'locations' => Location::orderBy('nome')->get(),
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
            $notification = array(
                'message' => 'A propriedade foi criada com sucesso!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Erro ao tentar criar a propriedade!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('property.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view('admin.property.show', [
            'property' => $property,
            'categories' => Category::all(),
            'modalities' => Modality::all(),
            'locations' => Location::all(),
            'cities' => City::all(),
            'states' => State::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $idState = $property->id_estado;
        $state = State::where('id', $idState)->first();
        return view('admin.property.edit', [
            'property' => $property,
            'categories' => Category::all(),
            'modalities' => Modality::all(),
            'locations' => Location::all(),
            'cities' => City::where('uf', $state->uf)->get(),
            'states' => State::all()
        ]);
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
        if ($property->update($request->all())) {
            $notification = array(
                'message' => 'A propriedade foi atualizada com sucesso!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Erro ao tentar atualizar a propriedade!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('property.index')->with($notification);
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
        if ($property->delete()) {
            $notification = array(
                'message' => 'A propriedade foi deletada com sucesso!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Erro ao tentar deletar a propriedade!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('property.index')->with($notification);
    }

    public function trash()
    {
        return view('admin.property.trash', [
            'properties' => Property::onlyTrashed()->orderBy('nome')->get(),
            'categories' => Category::orderBy('nome')->get(),
            'modalities' => Modality::orderBy('nome')->get(),
            'locations' => Location::orderBy('nome')->get()
        ]);
    }

    public function restore(Request $request)
    {
        $property = Property::withTrashed()->where('id', $request->id)->restore();
        if ($property) {
            $notification = array(
                'message' => 'A propriedade foi restaurada com sucesso!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Erro ao tentar restaurar a propriedade!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('property.index')->with($notification);
    }

    public function delete(Request $request)
    {
        $property = Property::withTrashed()->where('id', $request->id)->forceDelete();
        if ($property) {
            $notification = array(
                'message' => 'A propriedade foi deletada permanentemente com sucesso!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Erro ao tentar deletar a propriedade!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('property.trash')->with($notification);
    }
}
