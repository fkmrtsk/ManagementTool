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
                貯金管理
            </div>
            <form role="form" action="/money/savings/confirm" method="POST">
                <input type="hidden" id="savings" name="savings" value="{{ $request['savings'] }}">
                <input type="hidden" id="saving_date" name="saving_date" value="{{ $request['saving_date'] }}">
                {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                        <label for="savings">Savings</label>
                        <span>{{ $request['savings'] }}</span>
                    </div>
                    <!-- Date dd/mm/yyyy -->
                    <div class="form-group">
                        <label for="saving_date">Saving Date</label>
                        <span>{{ $request['saving_date'] }}</span>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop