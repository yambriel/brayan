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
use Illuminate\Http\Response;

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
        ->select('tickets.id',DB::raw('concat(customers.name," ",customers.last_name) as namecli'),DB::raw('concat(carnet) as carnetit'),'cellars.name as namesotado','tickets.post_id as number',DB::raw('concat(cars.model," ",cars.color," ",cars.placa) as namecar'),DB::raw('concat(DATE_FORMAT(tickets.entry_time, "%d/%m/%Y %H:%i")," ", tickets.systemTimeEntry) as dateentry'),DB::raw('concat(tickets.input_port) as imput'),'posts.status as estatus')
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
                    ->WhereNull('exit_time')
                    ->whereNotNull('input_port')
                    ->WhereNull('output_port')
                    ->get();
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
            $Ticket->input_port = $request->input_port;
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
        $ticket=Ticket::where('id',$id)->select('id','user_id','cellar_id','post_id','car_id','id_customer','input_port',DB::raw('DATE_FORMAT(tickets.entry_time, "%d/%m/%Y %H:%i") as entry_time'),'systemTimeEntry')->first();
        return view('ticket.edit')
        ->with('ticket',$ticket)
        ->with('fieldDisabled',$fieldDisabled);
    }

    public function editexit($id)
    {
        $fieldDisabled=1;
        $ticket=Ticket::where('id',$id)->select('id','user_id','cellar_id','post_id','car_id','id_customer','output_port',DB::raw('DATE_FORMAT(tickets.entry_time, "%d/%m/%Y %H:%i") as entry_time'),'systemTimeEntry')->first();
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
            // Variables para update
            $cellar_id=$request->cellar_id;
            $number=$request->post_id;
            //
            $Ticket = Ticket::find($id);
            $Ticket->exit_time = $dateformatExit;
            $Ticket->systemTimeExit = $request->systemTimeExit;
            $Ticket->output_port = $request->output_port;
            $Ticket->save();

            //Actualizar el estatus del puesto
            Post::where('cellar_id',$cellar_id)->where('number',$number)
                        ->update(['status' => 0]);

            return redirect()->route('ticket.index')->with('success','la puerta y fecha de Salida Agregada Satisfactoriamente');
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
            $Ticket->input_port = $request->input_port;
            $Ticket->save();
            return redirect()->route('ticket.index')->with('success','Registro actualizado satisfactoriamente');
        }

    }

    public function getChart()
    {
        //Activos
        $post1 = Ticket::WhereNull('exit_time')->get()->toarray();
        //Inactivos
        $post2 = Ticket::whereNotNull('entry_time')->whereNotNull('exit_time')->get()->toarray();
        $total_reg = (count($post1)+count($post2));
        $arrpost1['cant'][0] = (count($post1) > 0 ? count($post1) : 0);
        $arrpost1['cant'][1] = (count($post2) > 0 ? count($post2) : 0);
        $arrpost1['row'] = $total_reg;


        $post3 = DB::select('SELECT count(*) cant, months FROM (SELECT MONTH(exit_time) months, id FROM tickets where entry_time is not null AND exit_time is not null and year(exit_time)=year(curdate()) group by month(exit_time), id order by exit_time) AS CANT group by months');
        $total_reg2 = (count($post3));

        foreach ($post3 as $value) {
            $arrpost2[$value->months]=$value->cant;
        }

        $arrchart2['cant2'][0] = (isset($arrpost2['1']) ? $arrpost2['1'] : 0);
        $arrchart2['cant2'][1] = (isset($arrpost2['2']) ? $arrpost2['2'] : 0);
        $arrchart2['cant2'][2] = (isset($arrpost2['3']) ? $arrpost2['3'] : 0);
        $arrchart2['cant2'][3] = (isset($arrpost2['4']) ? $arrpost2['4'] : 0);
        $arrchart2['cant2'][4] = (isset($arrpost2['5']) ? $arrpost2['5'] : 0);
        $arrchart2['cant2'][5] = (isset($arrpost2['6']) ? $arrpost2['6'] : 0);
        $arrchart2['cant2'][6] = (isset($arrpost2['7']) ? $arrpost2['7'] : 0);
        $arrchart2['cant2'][7] = (isset($arrpost2['8']) ? $arrpost2['8'] : 0);
        $arrchart2['cant2'][8] = (isset($arrpost2['9']) ? $arrpost2['9'] : 0);
        $arrchart2['cant2'][9] = (isset($arrpost2['10']) ? $arrpost2['10'] : 0);
        $arrchart2['cant2'][10] = (isset($arrpost2['11']) ? $arrpost2['11'] : 0);
        $arrchart2['cant2'][11] = (isset($arrpost2['12']) ? $arrpost2['12'] : 0);
        $arrchart2['row2'] = $total_reg2;

        return response()->json(['arrpost'=>$arrpost1,'arrchart2'=>$arrchart2]);
        // ,'post'=>$post,'comment'=>$comment
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
