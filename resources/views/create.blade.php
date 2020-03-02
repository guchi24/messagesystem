@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('send') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="to">To</label>
                <select class="form-control" name="to" id="to">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"><strong>{{ $user->name }}: </strong> {{ $user->email }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter subject" value="{{ $subject ?? old('subject') }}">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea type="text" rows="10" class="form-control" name="message" id="message" placeholder="Enter message" value="{{ old('message') }}"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection