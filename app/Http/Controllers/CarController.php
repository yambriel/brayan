<?php

namespace App\Http\Controllers;

use App\Car;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars=Car::where('cars.status',1)->join('customers', 'cars.idcustomers', '=', 'customers.id')->select('cars.id',DB::raw('concat(name," ",last_name) as name'),DB::raw('concat(carnet) as carnet'),'model','color','placa')->get();
        return view('car.index',compact('cars'));
    }
     // SELECT cu.*, group_concat(ca.placa) FROM estacion.customers cu inner join estacion.cars ca on cu.id=ca.idcustomers group by id;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd(Input::all());
        Car::create($request->all());
        return redirect()->route('car.index')->with('success','Registro creado satisfactoriamente');
        //die();
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
     * retorna data del carro
     * @return [type] [description]
     */
    public function getCar()
    {
        $ids = Input::get('ids');
        $car = Car::where('idcustomers', $ids)->where('status',1)->get()->toarray();
        $this->encode($car);
        return response()->json($car);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $car=Car::find($id);
        return view('car.edit',compact('car'));
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
       
        Car::find($id)->update($request->all());
        return redirect()->route('car.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::where('id',$id)->update(['status' => 0]);
        return redirect()->route('car.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
