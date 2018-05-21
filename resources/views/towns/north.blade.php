@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Welcome to Ghana Weather Forcasting Service
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <p>This is the town selection section of the application.</p>
                        <audio preload>
                            <source src="{{ asset('audio/' . $language . '/2_1.wav') }}" type="audio/wav">
                        </audio>
                        <audio preload>
                            <source src="{{ asset('audio/' . $language . '/2_2.wav') }}" type="audio/wav">
                        </audio>
                        <audio preload>
                            <source src="{{ asset('audio/' . $language . '/2_3.wav') }}" type="audio/wav">
                        </audio>
                        <audio preload>
                            <source src="{{ asset('audio/' . $language . '/2_4.wav') }}" type="audio/wav">
                        </audio>
                    </div>

                    <hr>

                    <div class="d-flex flex-column align-items-center">
                        <div class="d-flex w-25 justify-content-around mb-4">
                            <a href="{{ url('time-period/1') }}" class="btn btn-dark">1</a>
                            <a href="{{ url('time-period/2') }}" class="btn btn-dark">2</a>
                            <a href="#" class="btn btn-dark">3</a>
                        </div>
                        <div class="d-flex w-25 justify-content-around mb-4">
                            <a href="#" class="btn btn-dark">4</a>
                            <a href="#" class="btn btn-dark">5</a>
                            <a href="#" class="btn btn-dark">6</a>
                        </div>
                        <div class="d-flex w-25 justify-content-around mb-4">
                            <a href="#" class="btn btn-dark">7</a>
                            <a href="#" class="btn btn-dark">8</a>
                            <a href="{{ url('/') }}" class="btn btn-dark">9</a>
                        </div>
                        <div class="d-flex w-25 justify-content-around mb-4">
                            <a href="#" class="btn btn-dark">0</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
