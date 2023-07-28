<?php

namespace Database\Seeders;
use App\Models\Client;
use App\Models\Compte;
use App\Models\Transaction;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    { 
        Client::factory(10)->create();
        Compte::factory(10)->create();
        Transaction::factory(10)->create();
    }
}
