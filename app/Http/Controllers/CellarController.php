<?php

namespace App\Http\Controllers;

use App\Cellar;
use App\Post;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;

class CellarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cellars=Cellar::where('status',1)->orderBy('id','ASC')->paginate(6);
        return view('cellar.index',compact('cellars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('cellar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $validator = Validator::make($request->all(), [
            
            'name'               => 'required|min:1|max:15',
            'cantidadPuestos'    => 'numeric|min:99',
            ]);
        
        if ($validator->fails()) {
            return redirect('cellar/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $Cellar = new Cellar;
        $Cellar->name = $request->name;
        $Cellar->cantidadPuestos = $request->cantidadPuestos;
        $Cellar->save();
        $idCellarRecienGuardada = $Cellar->id;
        for ($i = 1; $i <= intval($request->cantidadPuestos); $i++) {
            $Post = new Post;
            $Post->cellar_id = $idCellarRecienGuardada;
            $Post->number = $i;
            $Post->save();
        }
        return redirect()->route('cellar.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    private function encode(&$array)
    { //ENVIAR POR AJAX
        foreach($array as $key => $value){
              if(!is_array($value))
                $array[$key] = utf8_encode($value);
              else
                $this->encode($array[$key]);
        }
    }
    /**
     * retorna data del sotano
     * @return [type] [description]
     */
    public function getCellar()
    {
        $cellar = Cellar::where('status',1)->get()->toarray();
        $this->encode($cellar);
        return response()->json($cellar);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cellar=Cellar::find($id);
        return view('cellar.edit',compact('cellar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $validator = Validator::make($request->all(), [
            
            'name'               => 'required|min:1|max:15',
            'cantidadPuestos'    => 'numeric|min:99',
            ]);
        
        if ($validator->fails()) {
            return redirect('cellar/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        Cellar::find($id)->update($request->all());
        //borramos los puestos y los creamos nuevamente por si la cantidad cambia
        Post::where('cellar_id',$id)->delete();
        for ($i = 1; $i <= intval($request->cantidadPuestos); $i++) {
            $Post = new Post;
            $Post->cellar_id = $id;
            $Post->number = $i;
            $Post->save();
        }
        return redirect()->route('cellar.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cellar::where('id',$id)->update(['status' => 0]);
        return redirect()->route('cellar.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
