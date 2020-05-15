@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<a href="{{route('posts.create')}}" class="btn btn-primary mb-3">Novo Post</a>

@if (session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<table class="table table-striped mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->price}}</td>
            <td class="table-buttons">
                <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning">
                    <i class="fa fa-pencil"></i>
                </a>
                
                <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection