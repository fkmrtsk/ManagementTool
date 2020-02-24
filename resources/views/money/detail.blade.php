@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                金銭管理
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover datatable">
                            <tr>
                                <th></th>
                                @foreach ($arrDispMonth as $dispMonth)
                                <th>{{ $dispMonth }}</th>
                                @endforeach
                            </tr>
                            @foreach ($arrMoneyDetail as $moneyDetail)
                            <tr>
                                <td>{{ $moneyDetail['category_name'] }}</td>
                                @foreach ($moneyDetail['data'] as $detail)
                                <td>{{ $detail }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop