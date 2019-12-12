<?php

namespace App\Http\Controllers;

use App\Cellar;
use App\Post;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CellarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cellars=Cellar::where('status',1)->get();
        return view('cellar.index',compact('cellars'));

    }

    public function getReportPost()
    {
        $ids = Input::get('ids');
        if($ids!=""){
            $codsot = Input::get('codsot');
            //fecha y hora de 12 a 24 h
            $cellars=Cellar::join('posts', 'cellars.id', '=', 'posts.cellar_id')
            ->leftJoin('tickets', function ($join) {
            $join->on('tickets.post_id', '=', 'posts.number')->on('tickets.cellar_id', '=', 'posts.cellar_id');
            })
            ->where('cellars.id',$codsot)
            ->select('posts.id','cellars.name as namesotado',DB::raw('concat("Puesto"," ",posts.number) as namepost'),'posts.status as estatus',DB::raw('MAX(tickets.id) as ticketnum'))
            ->groupBy('posts.id')
            ->orderBy('cellars.id','ASC')
            ->orderBy('posts.number','ASC')->get();
            return response()->json($cellars);
        } else {
            return view('report.post');
        }
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
        $cellar = Cellar::where('status',1)->orderBy('name','ASC')->get()->toarray();
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
