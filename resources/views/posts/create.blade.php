@extends('layouts.app')

@section('title', 'Create Posts')

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <form method="POST" action="{{ route('posts.store') }}">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @csrf
            <div class="form-group">
                <label for="post-title">Title</label>
                <input type="text" class="form-control" name="title" id="post-title" placeholder="Title post" value="{{old('title')}}">
            </div>
            
            <div class="form-group">
                <label for="post-description">Description</label>
                <textarea class="form-control" name="description" id="post-description" rows="3" placeholder="Description">{{old('description')}}</textarea>
            </div>

            <div class="form-group">
                <label for="post-price">Price $</label>
                <input type="text" class="form-control" name="price" id="post-price" placeholder="Price Ex: 98.99" value="{{old('price')}}">
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
</div>

@endsection