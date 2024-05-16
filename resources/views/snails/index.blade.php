@extends('layout.app')

@section('title', 'Filtering Credits')

@section('previous-page-url', url('/comment'))

{{-- Override next-page-url to remove the Next button --}}
@section('next-page-url', '')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Snail Climb Calculator</h1>

    @if(isset($calculated) && $calculated)
    <div class="alert alert-success" role="alert">
        The snail will need {{ $days }} days to climb out of the well.
    </div>
    <a href="/snail" class="btn btn-primary">Back</a>
    @else
    <form action="/calculate" method="POST">
        @csrf
        <div class="form-group">
            <label for="well_depth">Well Depth:</label>
            <input type="number" class="form-control" name="well_depth" id="well_depth" required>
        </div>
        <div class="form-group">
            <label for="unit">Unit:</label>
            <select class="form-control" name="unit" id="unit">
                <option value="meters">Meters</option>
                <option value="inches">Inches</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Calculate</button>
    </form>
    @endif
</div>
@endsection
