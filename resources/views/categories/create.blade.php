
@extends('layouts.layout')

@section('title', 'Добавление категории')

@section('content')
    <h2>Добавление категории</h2>
    @include('categories.form', ['action'=> route('categories.store'), 'method' => 'post'])

@endsection
