@extends('layouts.app')

@section('content')


    <div class="row mt-5">
        <div class="col-12">
            <div class="card   ">
                <div class="card-header bg-dark h5 text-white">{{__('register users')}}</div>
                <div class="card-body">
                    <canvas id="canvas" height="280" width="600"></canvas>

                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    <script>

        var url = "{{route('user.chartData')}}";
        var totals = new Array();
        var labels = new Array();
        $(document).ready(function(){
            $.get({url:url,headers:{Authorization:"Bearer {{$token}}"}}, function(response){
                labels=response[0]
                totals=response[1]
                var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:labels,
                        datasets: [{
                            label: 'daily Register',
                            data: totals,
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true,
                                    callback: function(value) {if (value % 1 === 0) {return value;}}

                                }
                            }]
                        }
                    }
                });
            });
        });
    </script>

@endsection

