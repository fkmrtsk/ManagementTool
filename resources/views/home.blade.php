@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card card-primary">
      <div class="card-header">Money Management</div>
      <div class="card-body">
        <div class="row">
          <div class="table-responsive">
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var savings = '{{ $total[0]["savings"] }}';
var goals1 = 1500000;
var goals2 = 1000000;
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["part1", "part2"],
    datasets: [{
      label: 'savings',
      data: [savings, savings],
      backgroundColor: "rgba(153,255,51,1)",
    }, {
      label: 'goals',
      data: [goals1, goals2],
      backgroundColor: "rgba(255,153,0,1)"
    }]
  }
});
</script>
@stop