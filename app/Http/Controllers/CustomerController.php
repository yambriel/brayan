<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

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
        $customers=Customer::orderBy('id','ASC')->paginate(6);
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
        // dd($request);
        // Customer::create($request->all());
        return redirect()->route('customer.index')->with('success','Registro creado satisfactoriamente');
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
     * retorna data del cliente
     * @return [type] [description]
     */
    public function getCustomer()
    {
        $customer = Customer::get()->toarray();
        $this->encode($customer);
        return response()->json($customer);
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
        //$this->validate($request,[ 'model'=>'required', 'resumen'=>'required', 'npagina'=>'required', 'edicion'=>'required', 'autor'=>'required', 'npagina'=>'required', 'precio'=>'required']);

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
        Customer::find($id)->delete();
        return redirect()->route('customer.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
