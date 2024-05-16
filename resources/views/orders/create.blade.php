@extends('layout.app')

@section('title', 'Create Order')
@section('previous-page-url', url('/filter-credits'))
@section('next-page-url', url('/comment'))

@section('content')
    <div class="container mt-5">
        <h1>Create Order</h1>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customer_name">Customer Name:</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="form-group">
                <label for="total_amount">Total Amount:</label>
                <input type="number" class="form-control" id="total_amount" name="total_amount" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Order</button>
        </form>
    </div>
@endsection
