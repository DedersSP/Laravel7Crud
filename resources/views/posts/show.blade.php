@extends('layouts.app')

@section('title', 'Show Posts')

@section('content')

<div class="card">
    <div class="card-body">
      <h3>{{$post->title}}</h3>
      <h5> <i> Descrição do Curso:</i> <br>{{$post->description}}</h5>
      <p><b>Investimento: <br> {{$post->price}}</b></p>
    </div>
</div>

@endsection