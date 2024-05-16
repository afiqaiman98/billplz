<!-- resources/views/filtered-credits.blade.php -->
@extends('layout.app')

@section('previous-page-url', url('/pizza'))
@section('next-page-url', url('/orders'))

@section('title', 'Filtered Credits')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Filtered Credits') }}</div>

                <div class="card-body">
                    @if($displayOption === 'list')
                        @if($credits->isEmpty())
                            <p>No credits found for the selected date.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($credits as $credit)
                                            <tr>
                                                <td>{{ $credit->user_id }}</td>
                                                <td>{{ $credit->balance }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @elseif($displayOption === 'total')
                        <div class="mt-3">
                            <p>Total Credits: {{ $totalCredits }}</p>
                        </div>
                    @endif

                    <div class="mt-3">
                        <a href="/filter-credits" class="btn btn-primary">{{ __('Filter Credits Again') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
