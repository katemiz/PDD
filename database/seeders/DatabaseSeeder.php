<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Company;
use App\Models\Project;
use App\Models\User;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $admin = User::create([
            "name" => 'Kılıç Ali',
            "lastname" =>'Temiz',
            "email" => 'katemiz@gmail.com',
            "password" => 'kapkara'
        ]);

        $user1 = User::create([
            "name" => 'Kılıç Ali',
            "lastname" =>'Temiz',
            "email" => 'katemiz@masttech.com',
            "password" => 'kapkara'
        ]);

        $user2 = User::create([
            "name" => 'Ümit',
            "lastname" =>'Kutluay',
            "email" => 'umit.kutluay@tubitak.gov.tr',
            "password" => 'Sage2023tubitak'
        ]);

        $role = Role::create(['name' => 'admin']);
        $reqeng = Role::create(['name' => 'requirement_engineer']);

        $admin->assignRole('admin');
        $user1->assignRole('requirement_engineer');
        $user2->assignRole('requirement_engineer');

        Company::create([
            'user_id' => 1,
            'updated_uid' =>1,
            'name' => 'TÜBİTAK SAGE',
            'fullname' => 'TÜBİTAK Savunma Sanayii Araştırma ve Geliştirme Enstitüsü'
        ]);

        Project::create([
            'updated_uid' => 1,
            'user_id' => 1,
            'company_id' => 1,
            'code' => 'PVR',
            'title' => 'Pressure Regulating Valve'
        ]);





    }
}