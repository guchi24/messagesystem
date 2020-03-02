@extends('layouts.app')

@section('content')
    @if (count($messages) > 0)
        <ul class="list-group">
            @foreach ($messages as $message)
                <a href="{{ route('read-sent-item', $message->id) }}" class="text-dark">
                    <li class="list-group-item mb-3">
                        <strong>To: </strong> {{ $message->userTo->name }}, {{ $message->userTo->email }}
                        <br>
                        <strong>Subject: </strong> {{ $message->subject }}
                        <a href="{{ route('delete', $message->id) }}" class="btn btn-sm btn-danger float-right ml-3">Delete</a>
                        @if ($message->read)
                            <span class="btn btn-sm btn-secondary float-right ml-3">Read</span>
                        @endif
                    </li>
                </a>
            @endforeach
        </ul>
    @else
        <h2>No messages you have sent yet.</h2>
    @endif
@endsection
