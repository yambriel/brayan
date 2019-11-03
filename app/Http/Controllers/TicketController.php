<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Customer;
use App\Car;
use App\Cellar;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets=Ticket::join('customers', 'tickets.id_customer', '=', 'customers.id')
        ->join('cellars', 'tickets.cellar_id', '=', 'cellars.id')
        ->join('cars', 'tickets.car_id', '=', 'cars.id')
        ->join('posts', function ($join) {
            $join->on('tickets.post_id', '=', 'posts.number')->on('tickets.cellar_id', '=', 'posts.cellar_id');
        })
        ->WhereNull('tickets.exit_time')
        ->select('tickets.id',DB::raw('concat(customers.name," ",customers.last_name) as namecli'),DB::raw('concat(carnet) as carnetit'),'cellars.name as namesotado','tickets.post_id as number',DB::raw('concat(cars.model," ",cars.color," ",cars.placa) as namecar'),DB::raw('concat(DATE_FORMAT(tickets.entry_time, "%d/%m/%Y %H:%i")," ", tickets.systemTimeEntry) as dateentry'),'posts.status as estatus')
        ->orderBy('tickets.id','ASC')->paginate(6);
        return view('ticket.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket=Ticket::where('id_customer',$request->id_customer)
                    ->where('car_id',$request->car_id)
                    ->whereNotNull('entry_time')
                    ->WhereNull('exit_time');
        if(count($ticket) == 0){
            $date1=date_create($request->entry_time);
            $dateformat=date_format($date1, 'Y-m-d h:m');
            // Variables para update
            $cellar_id=$request->cellar_id;
            $number=$request->post_id;
            //
            $Ticket = new Ticket;
            $Ticket->user_id = $request->user_id;
            $Ticket->cellar_id = $request->cellar_id;
            $Ticket->post_id = $request->post_id;
            $Ticket->car_id = $request->car_id;
            $Ticket->id_customer = $request->id_customer;
            $Ticket->entry_time = $dateformat;
            $Ticket->systemTimeEntry = $request->systemTimeEntry;
            $Ticket->save();

            //Actualizar el estatus del puesto
            Post::where('cellar_id',$cellar_id)->where('number',$number)
                        ->update(['status' => 1]);

            // Ticket::create($request->all());
            return redirect()->route('ticket.index')->with('success','Registro creado satisfactoriamente');
            //die();
        } else {
            return redirect('ticket/create')
                        ->withErrors('El Cliente Posse un Ticket Activo con el mismo carro.')
                        ->withInput();
        }
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fieldDisabled=0;
        $ticket=Ticket::where('id',$id)->select('id','user_id','cellar_id','post_id','car_id','id_customer',DB::raw('DATE_FORMAT(tickets.entry_time, "%d/%m/%Y %H:%i") as entry_time'),'systemTimeEntry')->first();
        return view('ticket.edit')
        ->with('ticket',$ticket)
        ->with('fieldDisabled',$fieldDisabled);
    }

    public function editexit($id)
    {
        $fieldDisabled=1;
        $ticket=Ticket::where('id',$id)->select('id','user_id','cellar_id','post_id','car_id','id_customer',DB::raw('DATE_FORMAT(tickets.entry_time, "%d/%m/%Y %H:%i") as entry_time'),'systemTimeEntry')->first();
        return view('ticket.edit')
        ->with('ticket',$ticket)
        ->with('fieldDisabled',$fieldDisabled);
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
        if ($request->fieldDisabled != 0) {

            $date1=date_create($request->entry_time);
            $dateformatExit=date_format($date1, 'Y-m-d h:m');
            $Ticket = Ticket::find($id);
            $Ticket->exit_time = $dateformatExit;
            $Ticket->systemTimeExit = $request->systemTimeExit;
            $Ticket->save();
            return redirect()->route('ticket.index')->with('success','Fecha de Salida Agregada Satisfactoriamente');
        } else {
            $date1=date_create($request->entry_time);
            $dateformatExit=date_format($date1, 'Y-m-d h:m');
            $Ticket = Ticket::find($id);
            $Ticket->user_id = $request->user_id;
            $Ticket->cellar_id = $request->cellar_id;
            $Ticket->post_id = $request->post_id;
            $Ticket->car_id = $request->car_id;
            $Ticket->id_customer = $request->id_customer;
            $Ticket->entry_time = $dateformatExit;
            $Ticket->systemTimeEntry = $request->systemTimeEntry;
            $Ticket->save();
            return redirect()->route('ticket.index')->with('success','Registro actualizado satisfactoriamente');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::find($id)->delete();
        return redirect()->route('ticket.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
