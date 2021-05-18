<?php

use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->username = "fahmifn";
        $user->name = "Fahmi Nuradi";
        $user->email = "admin@test.com";
        $user->password = \Hash::make("admin");
        $user->save();
        $this->command->info("User Admin berhasil dibuat");
    }
}
