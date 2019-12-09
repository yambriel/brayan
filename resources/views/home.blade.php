@extends('layouts.admin')

@section('body-class','profile-page sidebar-collapse')

@section('content')
<div class="row">
	<div class="col-xl-6 col-lg-12">
		<div class="card">
			<div class="card-header">
            <h4 class="card-title">Tickets</h4>
				<canvas id="doughnut-chart" width="800" height="450"></canvas>
			</div>
		</div>
	</div>
	<div class="col-xl-6 col-lg-12">
		<div class="card">
			<div class="card-header">
            <h4 class="card-title">Tickets Procesados por Mes</h4>
            	<canvas id="line-chart" width="800" height="450"></canvas>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function () {
    //copiar esto
    let sessionCellar = $('body').find('#doorCellar')
    sessionCellar = sessionCellar.val()
    if(!sessionCellar){
        Swal.fire({
            title: 'En Cual Puerta va a Trabajar?',
            input: 'select',
            inputOptions: {
              'Norte Banesco': 'Norte Banesco',
              'Oeste Principal': 'Oeste Principal',
              'Sur Libertador': 'Sur Libertador'
            },
            inputValue: 'Norte Banesco',
            showCancelButton: true
        }).then(function (e) {
            let datavar = e.value
            if (datavar != "") {
                $.ajax({
                  type: "GET",
                  url: "{{url('/')}}/home/setSession/"+datavar,
                  cache: false,
                });
            }
        });
    }
    /////////////////hasta aqui//////////////
    //load graphics
    $.CargarGraf = function () {
        var ctx = document.getElementById('doughnut-chart');
        var ctx1 = document.getElementById('line-chart');
        $.ajax({
            url: '{{url('/')}}/home/chartRequest',
            type: "GET",
            // async: false,
            dataType: 'json',
            error: function (error) {
                console.log(error);
                // $.messageError('Ocurri&oacute; un error');
            },
            success: function (data) {
                if (data['arrpost']['row'] < 0) {
                    // messageError('No Hay Informaci&oacute;n (Gr&aacute;fico Torta)');
                } else {
                    /** Chart CAKE */
                    // Chart Option
                    // var chartOptions = {
                    //     responsive: true,
                    //     maintainAspectRatio: false,
                    //     responsiveAnimationDuration: 500,
                    // };
                    // Chart Data
                    var chartData = {
                        labels: ["Ticket Activos","Ticket Procesados"],
                        datasets: [{
                            data: data['arrpost']['cant'],
                            backgroundColor: ["#3e95cd", "#3cba9f"],
                        }]
                    };
                    var config = {
                        type: 'doughnut',

                        // Chart Options
                        // options: chartOptions,

                        data: chartData
                    };
                    // Create the chart
                    var myPieChart = new Chart(ctx, config);
                }

                //Segundo Grafico
                if (data['arrchart2']['row2'] < 0) {
                    // messageError('No Hay Informaci&oacute;n (Gr&aacute;fico Torta)');
                } else {
                    /** Chart CAKE */
                    // Chart Option
                    // var chartOptions = {
                    //     responsive: true,
                    //     maintainAspectRatio: false,
                    //     responsiveAnimationDuration: 500,
                    // };
                    // Chart Data
                    var chartData = {
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        datasets: [{
                            data: data['arrchart2']['cant2'],
                            // data: [168,170,178,190,203,276,408,547,675,734,11,12],
                            label: "Tickets Procesados",
					        borderColor: "#3cba9f",
					        fill: false
                        }]
                    };
                    var config = {
                        type: 'line',

                        // Chart Options
                        // options: chartOptions,

                        data: chartData
                    };
                    // Create the chart
                    var mylineChart = new Chart(ctx1, config);
                }
            }
        })
    };
    $.CargarGraf();

});
</script>
@endsection
