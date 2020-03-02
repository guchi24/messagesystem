@extends('layouts.app')

@section('content')
    @if (count($messages) > 0)
        <ul class="list-group">
            @foreach ($messages as $message)
                @if ($message->read)
                    <li class="list-group-item mb-3 bg-light">
                        <strong>From: </strong> {{ $message->userFrom->name }}, {{ $message->userFrom->email }}
                        <br>
                        <strong>Subject: </strong> {{ $message->subject }}
                        <a href="{{ route('return', $message->id) }}" class="btn btn-sm btn-secondary float-right ml-3">Return to inbox</a>
                    </li>
                @else
                    <li class="list-group-item mb-3">
                        <strong>From: </strong> {{ $message->userFrom->name }}, {{ $message->userFrom->email }}
                        <br>
                        <strong>Subject: </strong> {{ $message->subject }}
                        <a href="{{ route('return', $message->id) }}" class="btn btn-sm btn-secondary float-right ml-3">Return to inbox</a>
                        <span class="btn btn-sm btn-success float-right">New</span>
                    </li>
                @endif
            @endforeach
        </ul>
    @else
        <h2>No messages in the trash.</h2>
    @endif

@endsection
