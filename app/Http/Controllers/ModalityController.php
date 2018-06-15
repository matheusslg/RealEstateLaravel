<?php

namespace App\Http\Controllers;

use App\Modality;
use Illuminate\Http\Request;

class ModalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.modality.index', ['modalities' => Modality::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modality.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modality = new Modality($request->all());
        if ($modality->save()) {
            return redirect()->route('modality.index')->with('message', 'Modalidade criada com sucesso!');
        } else {
            return redirect()->route('modality.index')->with('message', 'Erro na criação da modalidade!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function show(Modality $modality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function edit(Modality $modality)
    {
        return view('admin.modality.edit', array('modality' => $modality));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modality $modality)
    {
        $modality->update($request->all());
        return redirect()->route('modality.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modality $modality)
    {
        $modality->delete();
        return redirect()->route('modality.index');
    }
}
