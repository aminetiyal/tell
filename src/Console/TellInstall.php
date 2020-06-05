<?php

namespace Aminetiyal\Tell\Console;

use Illuminate\Console\Command;

class TellInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tell:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install TELL';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // $this->comment('Publishing TELL Assets...');
        // $this->callSilent('vendor:publish', ['--tag' => 'tell-assets']);

        // $this->comment('Publishing TELL Configuration...');
        // $this->callSilent('vendor:publish', ['--tag' => 'tell-config']);

        \App\User::create([
            'name' => 'Amine TIYAL',
            'email' => 'aminetiyal@gmail.com',
            'password' => bcrypt('password')
        ]);


        \Aminetiyal\Tell\Models\TellTag::insert([
            ['name' => 'Laravel', 'slug' => 'laravel'],
            ['name' => 'VueJs', 'slug' => 'vuejs'],
            ['name' => 'TailwindCSS', 'slug' => 'tailwindcSS']
        ]);

        $this->info('TELL was installed successfully.');
    }
}
