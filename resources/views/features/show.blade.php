@extends('layouts.app')

@section('title')
  {{$feature->name}}
@stop

@section('content')
  <a href="{{route('features.update', ['slug'=> $slug, 'feature' => $feature->index])}}/edit" class="btn btn-default">Edit</a>
  <h2>Features</h2>
  <ol>
      <h3>
        <li>
          {{$feature->index}}
          {{$feature->name}}
        </li>
      </h3>

      <ul>
        <li>{{$feature->name}}</li>
        <li>{{$feature->description}}</li>
        <li>{{$feature->lat}}</li>
        <li>{{$feature->lng}}</li>
        <li>{{$feature->creator_id}}</li>
        <li>{{$feature->updater_id}}</li>
      </ul>
  </ol>
@stop
