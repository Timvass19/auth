<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();



       $admin = User::create([
        'name'=>'admin',
        'email' =>'admin@gmail.com',
        'password'=>Hash::make('password')
    ]);

       $auteur = User::create([
        'name'=>'auteur',
        'email' =>'auteur@gmail.com',
        'password'=>Hash::make('password')
    ]);


        $utilisateur = User::create([
        'name'=>'utilisateur',
        'email' =>'utilisateur@gmail.com',
        'password'=>Hash::make('password')
    ]);


    $adminRole = Role::where('name','admin')->First();
    $auteurRole = Role::where('name','auteur')->First();
    $utilisateurRole = Role::where('name','utilisateur')->First();


    $admin->roles() -> attach($adminRole);
    $auteur->roles() -> attach($auteurRole);
    $utilisateur->roles() -> attach($utilisateurRole);

}

}
