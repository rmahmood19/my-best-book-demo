@extends('welcome')
@section('content')
    <div class="book-container">
        <div class="book">
            <p class="book-title">An awesome book for <br>{{$name}}</p>
        </div>
    </div>
    <p class="book-description">Or choose another from our {{ $gender }} collection </p>
@endsection
