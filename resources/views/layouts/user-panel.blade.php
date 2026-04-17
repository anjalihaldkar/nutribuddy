@extends('layouts.main')

@push('styles')
    <style>
        @include('partials.user-panel-sidebar-styles')
    </style>
@endpush

@section('content')
    <div class="overlay" id="overlay" onclick="closeSidebar()"></div>

    <div class="ud-layout">
        <aside class="ud-sidebar" id="sidebar">
            @include('partials.user-panel-sidebar')
        </aside>

        <main class="ud-main">
            @yield('panel-content')
        </main>
    </div>
@endsection
