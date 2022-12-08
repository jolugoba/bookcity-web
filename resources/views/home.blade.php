@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
 
 
       
                    <table clasas="table table-striped table-hover">
                        <thead>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>AUTOR</th>
                            
                            <tbody>
    @foreach ($valoras as $valora)
    <tr>
        <td>
            {{$valora->id}}
        </td>
        <td>
    
            {{$valora->nombre}}
    
        </td>
        <td>
            {{$valora->autor}}
        </td>
    
    </tr>
    
        
    @endforeach
    
                            </tbody>
                        </thead>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
