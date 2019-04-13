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
            <example></example>
            <!-- <star-rating :rating="4.67" :round-start-rating="false"></star-rating> -->

        </div>

    </div>
</div>
<!-- End Main Content -->
@endsection