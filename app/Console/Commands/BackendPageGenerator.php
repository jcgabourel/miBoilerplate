<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BackendPageGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Backend:Crud  {name}  {--D|delete }  {--f|F}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        
        if($this->option('delete'))
            {echo "eliminando"; return ;}
        
        //$this->controller($name);
        $this->model($name);
        
        File::append(base_path('routes/backend/rutas.php'), 'Route::get(\'' . Str::plural(strtolower($name)) ."', [ crudController::class, 'index' ])
        ->name('".strtolower($name)."Index')
            ->breadcrumbs(function (Trail \$trail) {
                \$trail->push(__('".Str::plural($name)."'), route('admin.".strtolower($name)."Index'));
            });
               "  );




    }
}
