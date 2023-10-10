<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class ShowAdmins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:showAdmins';

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
        $admins = User::where('accounttype', 'admin')->get()->toArray();
        $headers = [
            'id',
            'FirstName', 'LastName',
            'Email', 'UserName'];

        $this->table($headers, $admins);
        //
    }


}
