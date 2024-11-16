
@extends('layouts.layout')

@section('title', 'Редактирование категории')

@section('content')
    <h2>Редактирование категории</h2>
    @include('categories.form', ['action'=> route('categories.update', $category->id), 'method' => 'put'])

@endsection

