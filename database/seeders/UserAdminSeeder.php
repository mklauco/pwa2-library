<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('users')->insert([
            ['name'=>'Martin Klaučo',
            'first_name'=>'Martin',
            'last_name'=>'Klaučo',
            'email'=>'martin.klauco@stuba.sk',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token'=>Str::random(10),
            ],
            
            ['name'=>'Luboš Čirka',
            'first_name'=>'Luboš',
            'last_name'=>'Čirka',
            'email'=>'lubos.cirka@stuba.sk',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token'=>Str::random(10),
            ],
            
            ['name'=>'Rastislav Fáber',
            'first_name'=>'Rastislav',
            'last_name'=>'Fáber',
            'email'=>'xfaber@stuba.sk',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token'=>Str::random(10),
            ],
            
            ['name'=>'Lívia Homolová',
            'first_name'=>'Lívia',
            'last_name'=>'Homolová',
            'email'=>'xhomolova@stuba.sk',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token'=>Str::random(10),
            ],
            
            ['name'=>'Denisa Chowaniecová',
            'first_name'=>'Denisa',
            'last_name'=>'Chowaniecová',
            'email'=>'xchowaniecova@stuba.sk',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token'=>Str::random(10),
            ],
            
            ['name'=>'Michal Krištof',
            'first_name'=>'Michal',
            'last_name'=>'Krištof',
            'email'=>'xgelinger@stuba.sk',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token'=>Str::random(10),
            ],
            
            ['name'=>'Trieu Nguyen Hai',
            'first_name'=>'Trieu',
            'last_name'=>'Nguyen Hai',
            'email'=>'xnguyenhai@stuba.sk',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token'=>Str::random(10),
            ],
            
            ['name'=>'Erika Pavlovičová',
            'first_name'=>'Erika',
            'last_name'=>'Pavlovičová',
            'email'=>'xpavlovicovae@stuba.sk',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token'=>Str::random(10),
            ],
            
            ['name'=>'Jakub Puk',
            'first_name'=>'Jakub',
            'last_name'=>'Puk',
            'email'=>'xpukj@stuba.sk',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token'=>Str::random(10),
            ],
            
            ['name'=>'Michaela Vogl',
            'first_name'=>'Michaela',
            'last_name'=>'Vogl',
            'email'=>'xlehotova@stuba.sk',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token'=>Str::random(10),
            ],
            
            ['name'=>'Marek Wadinger',
            'first_name'=>'Marek',
            'last_name'=>'Wadinger',
            'email'=>'xwadinger@stuba.sk',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token'=>Str::random(10),
            ],
            
            ['name'=>'Alexandra Žabková',
            'first_name'=>'Alexandra',
            'last_name'=>'Žabková',
            'email'=>'xzabkova@stuba.sk',
            'email_verified_at'=>now(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token'=>Str::random(10),
            ],
        ]);
    }
}
