@extends('layout.app')

@section('title', 'Password Generator')

@section('previous-page-url', url('/'))
@section('next-page-url', url('/pizza'))

@section('content')
<div class="container">
    <h1 class="mt-5">Password Generator</h1>
    @if(session('error'))
        <div class="alert alert-danger mt-3" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @if(isset($password))
        <div class="alert alert-success mt-3" role="alert">
            Your generated password: <strong>{{ $password }}</strong>
        </div>
    @endif
    <form action="{{ route('generate.password') }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="length" class="form-label">Password Length:</label>
            <input type="number" id="length" name="length" value="12" min="4" max="50" class="form-control">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" id="lowercase" name="lowercase" class="form-check-input" checked>
            <label for="lowercase" class="form-check-label">Include lowercase letters</label>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" id="uppercase" name="uppercase" class="form-check-input" checked>
            <label for="uppercase" class="form-check-label">Include uppercase letters</label>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" id="numbers" name="numbers" class="form-check-input" checked>
            <label for="numbers" class="form-check-label">Include numbers</label>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" id="symbols" name="symbols" class="form-check-input">
            <label for="symbols" class="form-check-label">Include symbols (!#$%&()*+@^)</label>
        </div>

        <button type="submit" class="btn btn-primary">Generate Password</button>
    </form>
</div>
@endsection
