<form action="{{ $action }}" method="post" enctype="application/x-www-form-urlencoded">
    @csrf
    @if($method !== 'post')
        @method($method)
    @endif

    <div>
        @error('name')
        <p class="warning">{{$message}}</p>
        @enderror
        <label for="category_name">Наименование категории</label>
        <input id="category_name" type="text" name="name" value="{{ $category->name ?? old('name') }}">
    </div>
    <div>
        <button class="btn" title="Сохранить">Сохранить</button>
    </div>

</form>
