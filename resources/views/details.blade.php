@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Detials Of Car') }}</div>

                <div class="card-body">
                    
                     <table class="table table-hover">
                        <thead>
                            <th>mark</th>

                            
                            <th>Plate Number</th>
                            <th>owner</th>

                            <th>Worker Name</th>
                            <th>Phone Number</th>                            
                            <th>Car Registered Day</th>                            
                            <th>Car fixed Day</th>                            
                        </thead>
                        <tbody>
                            @isset($transaction)
                
                                    <tr>
                                        <td>{{$transaction->vehicule->mark}}</td>
                                        <td>{{$transaction->vehicule->plate_number}}</td>
                                        <td>{{$transaction->vehicule->owner}}</td>
                                        <td>{{$transaction->worker->name}}</td>
                                        <td>{{$transaction->worker->phone_number}}</td>
                                        <td>{{$transaction->vehicule->created_at}}</td>
                                        <td>{{$transaction->updated_at}}</td>

                                    </tr>
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
