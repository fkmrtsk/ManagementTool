@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
      <!-- card -->
      <div class="card card-primary">
        <!-- card-header -->
        <div class="card-header border-0">
          <h3 class="card-title">
            <i class="far fa-chart-pie"></i>
            Money Management
          </h3>
          <!-- tools card -->
          <div class="card-tools">
            <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-primary btn-sm" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <!-- /.tools -->
        </div>
        <!-- /.card-header -->
        <!-- card-body -->
        <div class="card-body">
          <div class="row">
            <div class="table-responsive">
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.left col -->
    <!-- right col -->
    <section class="col-lg-5 connectedSortable">
      <!-- Calendar -->
      <div class="card">
        <!-- card-header -->
        <div class="card-header border-0 bg-gradient-success">

          <h3 class="card-title">
            <i class="far fa-calendar-alt"></i>
            Calendar
          </h3>
          <!-- tools card -->
          <div class="card-tools">
            <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <!-- /.tools -->
        </div>
        <!-- /.card-header -->
        <!-- card-body -->
        <div class="card-body pt-0">
          <!--The calendar -->
          <div id="calendar" style="width: 100%"></div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.Calendar -->
    </section>
    <!-- /.right col -->
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
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
$(function () {
  $('#calendar').datetimepicker({
    format: 'L',
    inline: true
  })
})
</script>
@stop