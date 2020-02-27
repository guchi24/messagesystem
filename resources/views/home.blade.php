@extends('layouts.app')

@section('content')
    @if (count($messages) > 0)
        <ul class="list-group">
            @foreach ($messages as $message)
                <a href="{{ route('read', $message->id) }}">
                    <li class="list-group-item mb-3">
                        <strong>From: </strong> {{ $message->userFrom->name }}, {{ $message->userFrom->email }}
                        <br>
                        <strong>Subject: </strong> {{ $message->subject }}
                        <a href="{{ route('delete', $message->id) }}" class="btn btn-sm btn-danger float-right ml-3">Delete</a>
                        @if ($message->read)
                            <span class="btn btn-sm btn-success float-right">Read</span>
                        @endif
                    </li>
                </a>
            @endforeach
        </ul>
    @else
        <h2>No messages in inbox.</h2>
    @endif
@endsection
