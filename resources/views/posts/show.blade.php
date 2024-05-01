@extends('layouts.app')

@section('title', 'Show')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        Post info
    </div>
    <div class="card-body">
        <h5 class="card-title">Title: {{$post->title}}</h5>
        <p class="card-text">Description: {{$post->description}}</p> 
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        Post creator info
    </div>
    <div class="card-body">
        <h5 class="card-title">Name: {{$post->user->name ? $post->user->name : 'not found'}}</h5>
        <p class="card-text">Email: {{$post->user->email ? $post->user->email : 'not found'}}</p> 
        <p class="card-text">Created At: {{$post->user->created_at ? $post->user->created_at->toDayDateTimeString() : 'not found'}}</p> 
    </div>
</div>
@endsection