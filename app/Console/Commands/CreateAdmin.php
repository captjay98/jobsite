<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a brand spanking new admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $firstname = $this->ask('Enter First Name');
        $lastname = $this->ask('Enter Last Name');
        $email = $this->ask('Enter Email');
        $username = $this->ask('Enter Username');
        $password = $this->secret('Enter Password');
        $repassword = $this->secret('Re-Enter Password');

        if ($password !== $repassword) {
            $this->error('Password mismatch');
            // return "Password mismatch";

        }

        User::create([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'username' => $username,
            'password' => bcrypt($password),
            'account_type' => 'admin',
            'is_superuser' => true,
            'is_admin' => true,
            'is_active' => true,
        ]);

        $this->info("Admin $firstname $lastname Created");
        //
    }
}
