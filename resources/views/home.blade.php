@extends('layouts.app') <!--directivas, se posicionan en views, no necesita punto y coma-->

<!-- se conecta con app.blade.php en la directiva yield('') -->
@section('titulo')

    Página principal

@endsection

@section('contenido')

    <x-listar-post :posts="$posts"/>

@endsection