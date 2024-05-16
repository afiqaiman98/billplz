@extends('layout.app')

@section('previous-page-url', url('/generate-password'))
@section('next-page-url', url('/filter-credits'))

@section('title', 'Order Confirmation')

@section('content')
<div class="container mt-5">
    <h2>Order Summary</h2>
    <p>Total: RM {{ $total }}</p>
    <a href="{{ url('/pizza') }}" class="btn btn-secondary">Reorder Pizza</a>
</div>
@endsection
