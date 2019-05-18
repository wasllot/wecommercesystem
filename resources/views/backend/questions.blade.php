@extends('backend.master')
@section('content')



    <section class="content-header">

      <h1>
        Preguntas
        <small>Aquí puedes ver las preguntas</small>
      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Preguntas</li>

      </ol>
            @include('messages.flash_message')


    </section> 

    <div id="app">
      <!-- Main content -->
        <section class="content">

            <example></example>

        </section>

    </div>  
@endsection