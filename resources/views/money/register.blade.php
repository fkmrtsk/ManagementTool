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
            <form role="form" action="/money/register" method="POST">
                {{csrf_field()}}
                <div class="card-body">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Category" value="クレジット">
                        @if ($errors->first('category'))
                            <p class="validation swal2-icon swal2-error">※{{$errors->first('category')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="pay_bill">Pay Bill</label>
                        <input type="text" class="form-control" id="pay_bill" name="pay_bill" placeholder="Pay Bill">
                        @if ($errors->first('pay_bill'))
                            <p class="validation swal2-icon swal2-error">※{{$errors->first('pay_bill')}}</p>
                        @endif
                    </div>
                    <!-- Date dd/mm/yyyy -->
                    <div class="form-group">
                        <label for="pay_date">Pay Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="pay_date" name="pay_date" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                        </div>
                        @if ($errors->first('pay_date'))
                            <p class="validation swal2-icon swal2-error">※{{$errors->first('pay_date')}}</p>
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