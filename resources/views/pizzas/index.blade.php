@extends('layout.layout')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
             @else
               <a href="{{ route('login') }}">Login</a>

               @if (Route::has('register'))
                 <a href="{{ route('register') }}">Register</a>
               @endif
            @endauth
                </div>
     @endif

        <div class="content">
         <div class="title m-b-md">
           Api Test
         </div>
         <p>Order Number: {{ $response['orderNumber'] }} </p>
         <p>Order Id: {{ $response['orderId'] }} </p>
    {{-- }}     <p>Order Id: {{ $response->body() }} </p>
{{--  @for($i = 0; $i < count($pizzas); $i++)
                <p> {{$pizzas[$i]['type']}}</p>
                @endfor --}}
            @foreach($pizzas as $pizza)
                 <div>
                    {{ $pizza->name}} - {{ $pizza->type}} - {{ $pizza->base}}
                </div>
                @endforeach
            </div>
        
        </div>
@endsection