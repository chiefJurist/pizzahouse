@extends('layouts.layout')

@section('content')
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="content">
            <div class="title">
                Pizza List - {{$id}}
            </div>
        </div>
    </div>
@endsection