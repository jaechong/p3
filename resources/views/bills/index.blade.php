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
                                       value='{{ $noOfPeople or '1'}}'
                                />
                            </div>
                            <label class='col-sm-6 control-label'>How much was the tab?</label>
                            <div class='col-sm-3'>
                                <input type='number'
                                       class='form-control' name='amount'
                                       required
                                       step='0.01'
                                       min='1'
                                       value='{{ $amount or '1'}}'
                                />
                            </div>
                        </div>
                        <label class='col-sm-6 control-label'>How was the service?</label>
                        <div class='col-sm-3'>
                            <select class='form-control' name='service' >
                                <option value='0' {{ ($service == '0') ? 'selected' : '' }} >No Tip Required</option>
                                <option value='10' {{ ($service == '10') ? 'selected' : '' }} >Bad 10%</option>
                                <option value='15' {{ ($service == '15') ? 'selected' : '' }} >Average 15%</option>
                                <option value='18' {{ ($service == '18') ? 'selected' : '' }} >Good 18%</option>
                                <option value='20' {{ ($service == '20') ? 'selected' : '' }} >Great 20%</option>
                                <option value='25' {{ ($service == '25') ? 'selected' : '' }} >Super 25%</option>
                            </select>
                        </div>
                        <label class='col-sm-6 control-label'>Round up?</label>
                        <div class='col-sm-1'>
                            <input type='checkbox'
                                   class='form-control'
                                   name='roundUp'
                                   {{ ($roundUp) ? 'checked' : '' }}/><br/>
                        </div>
                        <div class='col-sm-12'>
                            <p class='warning'>* required fields</p>
                        </div>
                        <div class='col-sm-4'></div> <!-- dirty way to center the button until I figure it out better way -->
                        <div class='col-sm-4'>
                            <input type='submit' value='Calculate' class='btn btn-primary brn-lg submitButton'/><br/>
                        </div>
                    </div>
                </form>
                @if($results)
                    <div class='col-sm-12 result'>
                    @if ($noOfPeople > 1)
                        <p>Everyone owes <em>${{ $results }}</em> each.</p>
                    @else
                        <p>You owe $<?= $results ?>.</p>
                    @endif
                    </div>
                @else
                    <div class='col-sm-12 result'>
                        <p>Please enter the total amount and how many ways to split!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

