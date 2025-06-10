@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Order</h1>

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        @include('orders.form')

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
