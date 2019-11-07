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

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports=ticket::join('customers', 'tickets.id_customer', '=', 'customers.id')
        ->join('cellars', 'tickets.cellar_id', '=', 'cellars.id')
        ->join('cars', 'tickets.car_id', '=', 'cars.id')
        ->join('posts', function ($join) {
            $join->on('tickets.post_id', '=', 'posts.number')->on('tickets.cellar_id', '=', 'posts.cellar_id');
        })
        ->select('tickets.id',DB::raw('concat(customers.name," ",customers.last_name) as namecli'),DB::raw('concat(carnet) as carnetit'),'cellars.name as namesotado','tickets.post_id as number',DB::raw('concat(cars.model," ",cars.color," ",cars.placa) as namecar'),DB::raw('concat(DATE_FORMAT(tickets.entry_time, "%d/%m/%Y %H:%i")," ", tickets.systemTimeEntry) as dateentry'),DB::raw('concat(DATE_FORMAT(tickets.exit_time, "%d/%m/%Y %H:%i")," ", tickets.systemTimeEntry) as exitentry'),'posts.status as estatus')
        ->orderBy('tickets.id','ASC')->paginate(6);
        return view('report.index',compact('reports'));
    }

    /**,DB::raw('concat(carnet) as carnetit'),'cellars.name as namesotado'
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    }

    public function editexit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
