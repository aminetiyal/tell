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

        $this->callSilent('vendor:publish', ['--tag' => 'tell:assets']);
        $this->info('✔ TELL Assets Published');

        $this->callSilent('vendor:publish', ['--tag' => 'tell:config']);
        $this->info('✔ TELL Configuration Published');

        $this->callSilent('storage:link');
        $this->info('✔ The symbolic link has been created');

        $this->info('✔ TELL was installed successfully.');

        $this->line('');

        $this->comment('↓ Please follow the instructions on the link bellow to install laravel/sanctum properly ↓');
        $this->comment('https://laravel.com/docs/sanctum#installation');
    }
}
