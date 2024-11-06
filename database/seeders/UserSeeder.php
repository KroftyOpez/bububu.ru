<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::where('code', 'admin')->first();
        $role_manager = Role::where('code', 'manager')->first();
        $role_user = Role::where('code', 'user')->first();

        User::create([
            'surname' => 'Евсеев',
            'name' => 'Дмитрий',
            'patronymic' => 'Витальевич',
            'sex' => 1,
            'birthday' => '2005-11-04',
            'email' => 'dima112831@gmail.com',
            'password' => 'bububu',
            'nickname' => 'Heh_BuBU_',
            'avatar' => null,
            'phone' => '89641892530',
            'api_token' => '1',
            'role_id' => $role_admin->id,
        ]);

        User::create([
            'surname' => 'Пальто',
            'name' => 'Чувак',
            'patronymic' => 'poop',
            'sex' => 1,
            'birthday' => '2005-12-20',
            'email' => 'palto112831@gmail.com',
            'password' => 'bububu',
            'nickname' => 'Heh_BuBU_B',
            'avatar' => null,
            'phone' => '89641892531',
            'api_token' => '2',
            'role_id' => $role_manager->id,
        ]);

        User::create([
            'surname' => 'Хахашка',
            'name' => 'Монашка',
            'patronymic' => 'Кишлакшка',
            'sex' => 1,
            'birthday' => '2015-10-08',
            'email' => 'monashka112831@gmail.com',
            'password' => 'bububu',
            'nickname' => 'Heh_BuBU_U',
            'avatar' => null,
            'phone' => '89641892532',
            'api_token' => '3',
            'role_id' => $role_manager->id,
        ]);

    }
}
