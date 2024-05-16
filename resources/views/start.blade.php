@extends('layout.app')

@section('title', 'Welcome')

@section('content')
    <div class="text-center">
        <h1 class="display-3">Welcome</h1> <!-- Making welcome bigger -->
        <p class="lead">Thank is the answer for the assigment. I simulate all of the question in Laravel Web Application</p> <!-- Adding a description -->
        <a href="@yield('next-page-url', '/generate-password')" class="btn btn-primary mt-4">Proceed</a>
    </div>
@endsection

@section('header')
<!-- Custom header without buttons for the start page -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-center">
    <a class="navbar-brand mx-auto" href="/">Billplz Assignment</a>
</nav>
@endsection
