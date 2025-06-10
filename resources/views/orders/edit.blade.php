@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Order</h1>

    <form method="POST" action="{{ route('orders.update', $order) }}">
        @csrf
        @method('PUT')

        @include('orders.form')

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
