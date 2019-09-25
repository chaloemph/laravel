<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Company;


class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company  {phone?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new companies';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    
    {


        $name = $this->ask("what is company name ?");

        if($this->confirm('Are you Ready to insert "'.$name.'" ?')){
            $company = Company::create([
                'name' => $name ,
                'phone' => $this->argument('phone') ?? 'N/A ' ,
            ]);

            return  $this->info('Added: ' . $company->name);
        }

       

        $this->warn('No new company Added: ');

    }
}
