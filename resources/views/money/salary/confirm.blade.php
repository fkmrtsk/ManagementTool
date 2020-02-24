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
                給料管理
            </div>
            <form role="form" action="/money/salary/confirm" method="POST">
                <input type="hidden" id="salary" name="salary" value="{{ $request['salary'] }}">
                <input type="hidden" id="salary_date" name="salary_date" value="{{ $request['salary_date'] }}">
                {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <span>{{ $request['salary'] }}</span>
                    </div>
                    <!-- Date dd/mm/yyyy -->
                    <div class="form-group">
                        <label for="salary_date">Salary Date</label>
                        <span>{{ $request['salary_date'] }}</span>
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