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
            <form role="form" action="/money/savings/register" method="POST">
                {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                        <label for="savings">Savings</label>
                        <input type="text" class="form-control" id="savings" name="savings" placeholder="Savings">
                        @if ($errors->first('savings'))
                            <p class="validation swal2-icon swal2-error">※{{$errors->first('savings')}}</p>
                        @endif
                    </div>
                    <!-- Date dd/mm/yyyy -->
                    <div class="form-group">
                        <label for="saving_date">Saving Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="saving_date" name="saving_date" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                        </div>
                        @if ($errors->first('saving_date'))
                            <p class="validation swal2-icon swal2-error">※{{$errors->first('saving_date')}}</p>
                        @endif
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
@section('js')
<script>
$(function () {
    $('#datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })
    //Money Euro
    $('[data-mask]').inputmask()
})
</script>
@stop