@extends('layouts.layout')

@section('title', 'Регистрация')

@section('content')

    <section>
        <h2>Регистрация</h2>
        <form action="{{route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="register-surname">Фамилия *</label>
            <input id="register-surname" type="text" name="surname" placeholder="Введите фамилию" required>
            @error('surname')
            <p class="warning">{{$message}}</p>
            @enderror
        </div>

            <div>
                <label for="register-name">Имя *</label>
                <input id="register-name" type="text" name="name" placeholder="Введите имя" required>
                @error('name')
                <p class="warning">{{$message}}</p>
                @enderror
            </div>

            <div>
                <label for="register-patronymic">Отчество</label>
                <input id="register-patronymic" type="text" name="patronymic" placeholder="Введите отчество">
                @error('patronymic')
                <p class="warning">{{$message}}</p>
                @enderror
            </div>

            <div>
                <label>Пол *</label>
                <input type="radio" name="sex" value="1" checked> Мужской
                <input type="radio" name="sex" value="0" > Женский
                @error('sex')
                <p class="warning">{{$message}}</p>
                @enderror
            </div>

            <div>
                <label for="register-birthday">День рождения *</label>
                <input id="register-birthday" type="date" name="birthday" required>
                @error('birthday')
                <p class="warning">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="register-email">Почта *</label>
                <input id="register-email" type="email" name="email" placeholder="Введите почту" required>
                @error('email')
                <p class="warning">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="register-password">Пароль *</label>
                <input id="register-password" type="password" name="password" placeholder="Введите пароль" required>
                @error('password')
                <p class="warning">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="register-password-confirmation">Повтор пароля *</label>
                <input id="register-password-confirmation" type="password" name="password_confirmation" placeholder="Подтвердите пароль" required>
            </div>
            <div>
                <label for="register-nickname">Никнейм *</label>
                <input id="register-nickname" type="text" name="nickname" placeholder="Введите никнейм" required>
                @error('nickname')
                <p class="warning">{{$message}}</p>
                @enderror
            </div>
           <div>
               <label for="register-avatar">Аватар</label>
               <input id="register-avatar" type="file" name="avatar" accept="image/jpeg,image/png,image/svg+xml">
               @error('avatar')
               <p class="warning">{{$message}}</p>
               @enderror
           </div>
            <div>
                <label for="register-phone">Телефон</label>
                <input id="register-phone" type="tel" name="phone" placeholder="+7(___)___-__-__" >
                @error('phone')
                <p class="warning">{{$message}}</p>
                @enderror
            </div>
            <div>
                <button type="submit">Зарегестрироваться</button>
            </div>
        </form>
    </section>

@endsection
