<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();
       

        $user = User::factory()->create([
            'name'=> 'Kann Dinn',
            'email'=> 'kandin@gmail.com',
          
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id,
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Listing::create([
            'user_id' => $user->id,
            'Title' => 'Laravel Senior Developer', 
            'Tags' => 'laravel, javascript',
            'Company' => 'Acme Corp',
            'Location' => 'Boston, MA',
            'Email' => 'email1@email.com',
            'Website' => 'https://www.acme.com',
            'Description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);
        Listing::create([
            'user_id' => $user->id,
            'Title' => 'Full-Stack Engineer',
            'Tags' => 'laravel, backend ,api',
            'Company' => 'Stark Industries',
            'Location' => 'New York, NY',
            'Email' => 'email2@email.com',
            'Website' => 'https://www.starkindustries.com',
            'Description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);
    }
}
