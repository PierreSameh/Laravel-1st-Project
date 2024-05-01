<!-- Extends Header, Style and Script sheets -->
@extends('layouts.app')

@section('title', 'Create')

@section('content')
<!-- Display Validation Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Create Post Form -->
<form method="POST" action="{{route('posts.store')}}">
    @csrf
<div class="mb-3">
  <label for="title-form" class="form-label">Title</label>
  <input type="text" name="title" class="form-control" id="title-form" value="{{old('title')}}">
</div>
<div class="mb-3">
  <label for="descrition-form" class="form-label">Description</label>
  <textarea name="description" class="form-control" id="description-form" rows="3">{{old('description')}}</textarea>
</div>
<div class="mb-3">
  <label for="form-control" class="form-label">Post Creator</label>
  <select name="post_creator" class="form-control">
    @foreach($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
  </select>
</div>
<button class="btn btn-success">Submit</button>
</form>
@endsection
