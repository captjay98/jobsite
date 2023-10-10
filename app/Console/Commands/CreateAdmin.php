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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $firstname = $this->ask('Enter First Name');
        $lastname = $this->ask('Enter Last Name');
        $email = $this->ask('Enter Email');
        $username = $this->ask('Enter Username');
        $password = $this->secret('Enter Paaword');
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
            // 'is_admin' => 1,
            'accounttype' => 'admin',
        ]);

        $this->info("Admin $firstname $lastname Created");
        //
    }
}
