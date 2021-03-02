<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $u = new User;
        $u->email = 'Pedro@gmail.com';
        $u->password = bcrypt('1234');
        $u->nombre = 'Pedro';
        $u->apellido = 'Gomez';
        $u->direccion = 'Calle Falsa 5';
        $u->ciudad = 'Lucena';
        $u->telefono = '123123123';
        $u->email_verified_at = '2021-03-02 10:50:36';
        $u->save();
        $u->roles()->attach(Role::where('name', 'user')->first());
        $u->save();

        $u = new User;
        $u->email = 'Admin@gmail.com';
        $u->password = bcrypt('1234');
        $u->nombre = 'Admin';
        $u->apellido = 'Admin';
        $u->direccion = 'Calle Falsa 5';
        $u->ciudad = 'Lucena';
        $u->telefono = '123123123';
        $u->email_verified_at = '2021-03-02 10:50:36';
        $u->save();
        $u->roles()->attach(Role::where('name', 'admin')->first());
        $u->save();
    }
}
