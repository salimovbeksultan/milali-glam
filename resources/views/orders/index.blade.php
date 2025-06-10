@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4 fs-2">Заказы</h1>

        @if (session('success'))
            <div class="alert alert-success fs-6">{{ session('success') }}</div>
        @endif

        @forelse ($orders as $order)
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text fs-6 mb-2"><strong>Имя:</strong> {{ $order->name }}</p>
                    <p class="card-text fs-6 mb-2"><strong>Телефон:</strong> {{ $order->phone }}</p>
                    <p class="card-text fs-6 mb-3"><strong>Адрес:</strong> {{ $order->address }}</p>
                    <div class="d-flex flex-wrap">
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-info btn-sm w-100">Посмотреть</a>
                    </div>
                    <div class="d-flex flex-wrap pt-3">
                        <form class="w-100" action="{{ route('orders.destroy', $order) }}" method="POST"
                            onsubmit="return confirm('Удалить заказ?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm w-100">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info fs-6">No orders found.</div>
        @endforelse

        <div class="mt-4">
            <div class="d-md-flex justify-content-center overflow-auto">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
