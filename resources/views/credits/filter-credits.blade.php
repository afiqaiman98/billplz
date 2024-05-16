<!-- resources/views/filter-credits.blade.php -->
@extends('layout.app')

@section('title', 'Filtering Credits')

@section('previous-page-url', url('/pizza'))
@section('next-page-url', url('/orders'))

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Filter Credits') }}</div>

                <div class="card-body">
                    <form method="POST" action="/filter-credits">
                        @csrf

                        <div class="form-group">
                            <label for="date">{{ __('Enter Date') }}</label>
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" required autofocus>
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="displayOption">{{ __('Display Option') }}</label>
                            <select id="displayOption" class="form-control" name="displayOption">
                                <option value="list">List of Credits</option>
                                <option value="total">Total Credits</option>
                            </select>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Filter') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
