<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
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

        // Генерирация токена
        $user->api_token = Hash::make(Str::random(60));
        $user->save();

        //Ответ
        return response()->json([
            'user' => $user,
            'token' => $user->api_token
        ])->setStatusCode(201);
    }


    //Аутентификация
    public function login(Request $request){
        // Вызов исключения если такого пользователя нет в БД
        if (!Auth::attempt($request->only('email', 'password'))) {
            throw new ApiException('Unauthorized', 401);
        }
        //Полуяение информации о текущем пользователе
        $user = Auth::user();
        $user->api_token = Hash::make(Str::random(60));
        $user->save();
        // Ответ
        return response()->json([
            'user' => $user,
            'token' => $user->api_token,
        ])->setStatusCode(200);
    }

    //Выход
    public function logout(Request $request){
        $user = Auth::user();
        $user->api_token = null;
        $user->save();
        return response()->json([])->setStatusCode(200);
    }
}
