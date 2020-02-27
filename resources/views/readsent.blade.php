@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>From: </h4>{{ $message->userFrom->name }} : {{ $message->userFrom->email }}
            <br><br>
            <h4>To: </h4>{{ $message->userTo->name }} : {{ $message->userTo->email }}
            <br><br>
            <h4>Subject: </h4>{{ $message->subject }}
        </div>
        <div class="card-body">
            <h4>Message: </h4> 
            <hr>
            {{ $message->message }}
        </div>
        <br>
    </div>
    <br>
    <a href="{{ route('create', [$message->userFrom->id, $message->subject]) }}" class="btn btn-primary">Reply</a>
    <a href="{{ route('delete', $message->id) }}" class="btn btn-danger float-right">Delete</a>
@endsection