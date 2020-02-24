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
            <form role="form" action="/money/confirm" method="POST">
                <input type="hidden" id="category" name="category" value="{{ $request['category'] }}">
                <input type="hidden" id="pay_bill" name="pay_bill" value="{{ $request['pay_bill'] }}">
                <input type="hidden" id="pay_date" name="pay_date" value="{{ $request['pay_date'] }}">
                {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <span>{{ $request['category'] }}</span>
                    </div>
                    <div class="form-group">
                        <label for="pay_bill">Pay Bill</label>
                        <span>{{ $request['pay_bill'] }}</span>
                    </div>
                    <!-- Date dd/mm/yyyy -->
                    <div class="form-group">
                        <label for="pay_date">Pay Date</label>
                        <span>{{ $request['pay_date'] }}</span>
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