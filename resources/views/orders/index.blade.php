@extends('layout.app')

@section('title', 'afterCommit')

@section('previous-page-url', url('/filter-credits'))
@section('next-page-url', url('/comment'))

@section('content')
    <div class="container mt-5">
        <h1>Orders</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Create New Order</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    <th>Invoices</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>
                            <ul>
                                @foreach ($order->invoices as $invoice)
                                    <li>{{ $invoice->invoice_number }} - ${{ $invoice->amount }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
