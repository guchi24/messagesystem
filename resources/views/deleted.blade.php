@extends('layouts.app')

@section('content')
    @if (count($messages) > 0)
        <ul class="list-group">
            @foreach ($messages as $message)
                    <li class="list-group-item mb-3">
                        <strong>From: </strong> {{ $message->userFrom->name }}, {{ $message->userFrom->email }}
                        <br>
                        <strong>Subject: </strong> {{ $message->subject }}
                        <a href="{{ route('return', $message->id) }}" class="btn btn-sm btn-secondary float-right ml-3">Return to inbox</a>
                        @if ($message->read)
                            <span class="btn btn-sm btn-success float-right">Read</span>
                        @endif
                    </li>
            @endforeach
        </ul>
    @else
        <h2>No messages in the trash.</h2>
    @endif

@endsection
