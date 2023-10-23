@extends('layouts.layout')

@section('content')
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="content">
            <div class="title">
                Pizza List
            </div>

            @foreach ($pizzas as $pizza)
                <div>{{$loop->index + 1}} {{ $pizza["type"] }} - {{ $pizza["base"] }}
                    @if ($loop->first)
                        <span> -first in the loop</span>
                    @endif
                    @if ($loop->last)
                        <span> -last in the loop</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection