<?php

namespace Database\Seeders;

use App\Models\Automobil;
use App\Models\AutomobilType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Automobil::truncate();
        AutomobilType::truncate();

        
        
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        
        $type1 = AutomobilType::factory()->create();
        $type2 = AutomobilType::factory()->create();

        
        Automobil::factory(3)->create([
            'user_id'=>$user1->id,
            'automobilType_id'=>$type1->id
        ]);
        
        Automobil::factory(3)->create([
            'user_id'=>$user2->id,
            'automobilType_id'=>$type2->id
        ]);
    }
}
