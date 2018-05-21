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
                        <p>This is the welcome section of the application. It instructs users on how to use the application.</p>
                        <p>It further gives the option to select general regions in Ghana.</p>
                        <audio preload>
                            <source src="{{ asset('audio/' . $language . '/1.wav') }}" type="audio/wav">
                        </audio>
                        <audio preload>
                            <source src="{{ asset('audio/' . $language . '/2.wav') }}" type="audio/wav">
                        </audio>
                        <audio preload>
                            <source src="{{ asset('audio/' . $language . '/3.wav') }}" type="audio/wav">
                        </audio>
                    </div>

                    <hr>

                    <div class="d-flex flex-column align-items-center">
                        <div class="d-flex w-25 justify-content-around mb-4">
                            <a href="{{ url('towns/1') }}" class="btn btn-dark">1</a>
                            <a href="{{ url('towns/2') }}" class="btn btn-dark">2</a>
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
                            <a href="#" class="btn btn-dark">9</a>
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
