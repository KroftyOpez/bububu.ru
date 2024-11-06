<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // Показать форму регистрации
    public function showRegistrationForm(){
        return view('auth.register');
    }
    // Показать форму входа
    public function showLoginForm(){
        return view('auth.login');
    }

    // Регистрация
    public function register(RegisterRequest $request){
        // Извлекаем запись роли 'Пользовтель'
        $role_user = Role::where('code', 'user')->first();

        //Путь к файлу аватар
        $path = null;

        //Сохранение аватара пользователя
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
        }
        // Создание пользователя
        $user = User::create([
            ...$request->validated(), 'avatar' => $path, 'role_id' => $role_user->id
        ]);

        //Аутентификация
        Auth::login($user);

        //Ответ
        return redirect()->route('home');
    }


    //Аутентификация
    public function login(Request $request){
        // Вызов исключения если такого пользователя нет в БД
        if (Auth::attempt($request->only('email', 'password'))) {
           $request->session()->regenerate();
           return redirect()->route('home');
        }else{
            return back()->withErrors(['error' => 'Неправильный логин или пароль!']);
        }
    }

    //Выход
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('home');
    }
}
