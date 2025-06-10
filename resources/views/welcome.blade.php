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
                        <button type="button" class="btn btn-dark w-100 text-uppercase" onclick="send()">Оплатить</button>
                    @endif
                </form>
            </div>
        </div>
    </div>

    @if(!is_null($order))
    <script>

        function send() {
            let form = document.createElement('form');
            let id = {{ $order->id }};
            let amount = 9500 * 100;
            form.action = "https://kaspi.kz/online";
            form.method = 'POST';
            form.target = "_blank";
            form.innerHTML = `<input type="hidden" name="TranId" value="${id}">`;
            form.innerHTML += `<input type="hidden" name="OrderId" value="${id}">`;
            form.innerHTML += `<input type="hidden" name="Amount" value="${amount}">`;
            form.innerHTML += '<input type="hidden" name="Service" value="milali">';
            form.innerHTML += '<input type="hidden" name="returnUrl" value="https://milaliglam.kz/">';
            form.innerHTML += '<input type="hidden" name="Signature" value="">';
            document.body.append(form);
            form.submit();
        }

        document.getElementById("kaspi-btn").click();
    </script>
    @endif
@endsection
