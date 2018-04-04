@extends('layouts.master')

@push('head')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
    <link href='/css/billsplit.css' type='text/css' rel='stylesheet'>
@endpush

@section('content')
    <div class='container'>
        <div class='row'>
            <h1>Bill Splitter</h1>
            <div class='panel panel-default'>
                <form method='GET' action='/calculate'>
                    <div class='panel-body form-horizontal payment-form'>
                        <div class='form-group required'>
                            <label class='col-sm-6 control-label'>Split how many ways?</label>
                            <div class='col-sm-3'>
                                <input type='number'
                                       class='form-control' name='noOfPeople'
                                       required
                                       min='1'
                                       />
                            </div>
                            <label class='col-sm-6 control-label'>How much was the tab?</label>
                            <div class='col-sm-3'>
                                <input type='number'
                                       class='form-control' name='amount'
                                       required
                                       step='0.01'
                                       min='1'/>
                            </div>
                        </div>
                        <label class='col-sm-6 control-label'>How was the service?</label>
                        <div class='col-sm-3'>
                            <select class='form-control' name='service'>
                                <option value='0' >No Tip Required</option>
                                <option value='10' >Bad 10%</option>
                                <option value='15' >Average 15%</option>
                                <option value='18' >Good 18%</option>
                                <option value='20' >Great 20%</option>
                                <option value='25' >Super 25%</option>
                            </select>
                        </div>
                        <label class='col-sm-6 control-label'>Round up?</label>
                        <div class='col-sm-1'>
                            <input type='checkbox'
                                   class='form-control'
                                   name='roundUp' /><br/>
                        </div>
                        <div class='col-sm-12'>
                            <p class='warning'>* required fields</p>
                        </div>
                        <div class='col-sm-4'></div> <!-- dirty way to center the button until I figure it out better way -->
                        <div class='col-sm-4'>
                            <input type='submit' value='Calculate' class='btn btn-primary brn-lg submitButton'/><br/>
                        </div>
                        <div class='col-sm-12 result'>
                            <p>Please enter the total amount and how many ways to split!</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

