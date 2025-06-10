@extends('layouts.app')

@section('content')
    @php
        $order = session('order');
    @endphp
    <div class="container-fluid" style="background-color: #fffaf4">
        <div class="row">
            <div class="col px-0">
                <img src="{{ asset('welcome.webp') }}" class="img-fluid" alt="banner" />
            </div>
        </div>
        @if ($order)
            <div class="row pb-4">
                <div class="col">
                    <h4>Заказ создан</h4>
                </div>
            </div>
        @endif

        <div class="row pb-4">
            <div class="col">
                <form method="POST" action="{{ route('orders.store') }}">
                    @csrf

                    @include('orders.form')

                    @if (is_null($order))
                        <button type="submit" class="btn btn-dark w-100 text-uppercase">Отправить</button>
                    @else
                        <button id="kaspi-btn" type="button" class="btn btn-dark w-100 text-uppercase">Оплатить</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
	@if (!is_null($order))
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("kaspi-btn").addEventListener("click", function (e) {
            e.preventDefault();

            window.open('https://prodlenka1-4.kz/createPayment?orderId={{$order->id}}&phone={{$order->phone}}', '_blank').focus();
        });
    });
</script>
@endif


@endsection



