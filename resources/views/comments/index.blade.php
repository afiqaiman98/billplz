@extends('layout.app')

@section('title', 'afterCommit')

@section('previous-page-url', url('/orders'))
@section('next-page-url', url('/snail'))

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Comments</h1>
    <ul class="list-group">
        @foreach($comments as $comment)
            <li class="list-group-item">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>User:</strong> {{ $comment->user_name }}
                        <br>
                        <strong>Comment:</strong> {{ $comment->content }}
                        <br>
                        <strong>Likes:</strong> {{ $likes[$comment->id]->like_count ?? 0 }}
                    </div>
                    @auth
                        <form action="{{ route('likes.store', $comment->id) }}" method="POST" class="ml-3">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Like</button>
                        </form>
                    @endauth
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
