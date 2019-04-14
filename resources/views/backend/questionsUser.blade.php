@extends('backend.master')
@section('content')
        <!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
        <div class="page-title">
            <span class="title" style="text-align: center;">Preguntas</span>
            @include('messages.flash_message')

        </div>
        <div id="app">

            <show-user-sentences :user="{{ auth()->user() }}"></show-user-sentences>

        </div>

    </div>
</div>
<!-- End Main Content -->
@endsection