
@extends('layouts.layout')

@section('title', 'Категория товаров')

@section('content')
    <h2>Категории товаров</h2>
    <a class="btn" href="{{ route('categories.create') }}">Добавить категорию</a>
    <div class="grid">
        @foreach($categories as $category)
            <div>
                {{ $category->name }}
            </div>
            <div>
               <a  href="{{ route('categories.show', $category->id) }}" title="Посмотреть">
                   <img class="w25" src="{{ asset('assets/images/show.png') }}" alt="Посмотреть"/>
               </a>
            </div>
            <div>
                <a  href="{{ route('categories.edit', $category->id) }}" title="Редактировать">
                    <img class="w25" src="{{ asset('assets/images/edit.png') }}" alt="Редактировать"/>
                </a>
            </div>
            <div>
              <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="delete" type="submit" title="Удалить">
                      <img class="w25" src="{{ asset('assets/images/delete.png') }}" alt="Удалить" />
                  </button>
              </form>
            </div>
        @endforeach
    </div>
@endsection
