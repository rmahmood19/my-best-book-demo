@extends('welcome')
@section('content')
    <form method="POST" action="{{ route('order.submit') }}">
        @csrf
        <div class="input-title">
            <p>Enter the Child's Name<p>
            <div class="error-message">
                @error('name')
                {{$message}}
                @enderror
            </div>
            <input type="text" name="name" placeholder="eg. Reaz" class="input-box">
        </div>
        <div class="error-message">
            @error('gender')
            {{$message}}
            @enderror
        </div>
        <section class="radio-section">
            <div class="radio-list">
                <div class="radio-item">
                    <input name="gender" id="radio1" type="radio" value="male">
                    <label for="radio1">BOY</label>
                </div>
                <div class="radio-item">
                    <input name="gender" id="radio2" type="radio" value="female">
                    <label for="radio2">GIRL</label>
                </div>
            </div>
        </section>
        <div class="button-container">
            <button class="submit-button">Order</button>
        </div>
    </form>
@endsection
