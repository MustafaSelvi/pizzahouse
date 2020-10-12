@extends('layout.layout')

@section('content')
<div class="wrapper create-pizza">
<h1>Create a new Order</h1>
<form action="/pizzas" method="POST">
    @csrf
    <label for="name">Order Number</label>
    <input type="text" id="ordernumber" name="ordernumber">
    <label for="type">Order Status</label>
    <select name="orderStatus" id="orderStatus">
        <option value="awaiting_shipment">awaiting shipment</option>
        <option value="awaiting_payment">awaiting payment</option>
        <option value="on_hold">on hold</option>

    </select>

    <label for="price">Email:</label>
    <input type="text" id="customerEmail" name="customerEmail">

    <input type="submit" value="Order">
</form>
<p>{{ $response ?? '' }}</p>
</div>
@endsection