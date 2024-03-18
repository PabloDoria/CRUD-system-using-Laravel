<?php

namespace App\Http\Controllers;

use App\Models\Superheroe;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class SuperheroeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['superheroes']=Superheroe::paginate(5);
        return view('superheroe.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('superheroe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Alias'=>'required|string|max:100',
            'Descripcion'=>'required|string|max:100',
            'Foto'=>'required|max:1000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida.'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosSuperheroe = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosSuperheroe['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        Superheroe::insert($datosSuperheroe);

        return redirect('superheroe')->with('mensaje','Superheroe agregado con exito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Superheroe $superheroe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $superheroe=Superheroe::findOrFail($id);
        return view('superheroe.edit', compact('superheroe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Alias'=>'required|string|max:100',
            'Descripcion'=>'required|string|max:1000',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La foto es requerida.'];
        } 

        $this->validate($request, $campos, $mensaje);

        //
        $datosSuperheroe = request()->except('_token', '_method');
        
        if($request->hasFile('Foto')){
            $superheroe=Superheroe::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto);
            $datosSuperheroe['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        Superheroe::where('id','=',$id)->update($datosSuperheroe);
        $superheroe=Superheroe::findOrFail($id);
        //return view('superheroe.edit', compact('superheroe'));

        return redirect('superheroe')->with('mensaje','Superheroe modificado.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $superheroe=Superheroe::findOrFail($id);

        if(Storage::delete(['public/.$superheroe->Foto'])){
            Superheroe::destroy($id);
        }

        return redirect('superheroe')->with('mensaje','Superheroe eliminado.');
    }
}
