@extends('layouts.app')

@section('content')
    @if (count($messages) > 0)
        <ul class="list-group">
            @foreach ($messages as $message)
                @if ($message->read)
                    <a href="{{ route('read', $message->id) }}" class="text-muted">
                        <li class="list-group-item mb-3 bg-light">
                            From {{ $message->userFrom->name }}, {{ $message->userFrom->email }}
                            <br>
                            Subject {{ $message->subject }}
                            <a href="{{ route('delete', $message->id) }}" class="btn btn-sm btn-danger float-right ml-3">Delete</a>
                            <a href="{{ route('create', [$message->userFrom->id, $message->subject]) }}" class="btn btn-sm btn-primary float-right ml-3">Reply</a>
                        </li>
                    </a>
                @else
                    <a href="{{ route('read', $message->id) }}" class="text-dark">
                        <li class="list-group-item mb-3">
                            <strong>From {{ $message->userFrom->name }}, {{ $message->userFrom->email }} </strong>
                            <br>
                            <strong>Subject {{ $message->subject }} </strong> 
                            <a href="{{ route('delete', $message->id) }}" class="btn btn-sm btn-danger float-right ml-3">Delete</a>
                            <a href="{{ route('create', [$message->userFrom->id, $message->subject]) }}" class="btn btn-sm btn-primary float-right ml-3">Reply</a>
                            <span class="btn btn-sm btn-success float-right">New</span>
                        </li>
                    </a>
                @endif
            @endforeach
        </ul>
    @else
        <h2>No messages in inbox.</h2>
    @endif
@endsection
