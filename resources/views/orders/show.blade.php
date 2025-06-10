@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="mb-4 fs-2">Детали заказа</h1>

            <div class="mb-3 fs-5"><strong>Имя:</strong> {{ $order->name }}</div>
            <div class="mb-3 fs-5"><strong>Телефон:</strong> {{ $order->phone }}</div>
            <div class="mb-4 fs-5"><strong>Адрес:</strong> {{ $order->address }}</div>

            <a href="{{ route('orders.index') }}" class="btn btn-secondary w-100 w-md-auto fs-6">Назад</a>
        </div>
    </div>
</div>
@endsection
