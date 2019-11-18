<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Car;
use Validator;
use App\Http\Controllers\Controller;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SELECT cu.*, group_concat(ca.placa) FROM estacion.customers cu inner join estacion.cars ca on cu.id=ca.idcustomers group by id;
        $customers=Customer::where('status',1)->get();
        return view('customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $modelcar =  $request->model;
            $colorcar =  $request->color;
            $placacar =  $request->placa;
            $Customer = new Customer;
            $Customer->name = $request->name;
            $Customer->last_name = $request->last_name;
            $Customer->email = $request->email;
            $Customer->carnet = $request->carnet;
            $Customer->phone = $request->phone;
            $Customer->extension = $request->extension;
            $Customer->save();
            $idCustomerRecienGuardada = $Customer->id;
            $Car = new Car;
            $Car->model =$modelcar;
            $Car->color = $colorcar;
            $Car->placa = $placacar;
            $Car->idcustomers = $idCustomerRecienGuardada;
            $Car->save();

        // Customer::create($request->all());
        // Car::create($request->all());
        return redirect()->route('customer.index')->with('success','Registro creado satisfactoriamente');
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
     * retorna data del cliente
     * @return [type] [description]
     */
    public function getCustomer()
    {
        $customer = Customer::where('status',1)->get()->toarray();
        $this->encode($customer);
        return response()->json($customer);
    }

    public function getCarnet()
    {
        $id = Input::get('id');
        $customer = Customer::where('status',1)->where('carnet',$id)->get()->toarray();
        $this->encode($customer);
        return response()->json($customer);
    }

    public function getPlaca()
    {
        $id = Input::get('id');
        $car = Car::where('status',1)->where('placa',$id)->get()->toarray();
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


        $customer=Customer::find($id);
        return view('customer.edit',compact('customer'));
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

        Customer::find($id)->update($request->all());
        return redirect()->route('customer.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('id',$id)->update(['status' => 0]);
        return redirect()->route('customer.index')->with('success','Registro eliminado satisfactoriamente');
    }




}
