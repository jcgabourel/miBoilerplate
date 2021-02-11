<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

 

class BackEndpointGeneratorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'BackEndpoint:generate {name : Class (singular) for example User}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create BackEndpoint';

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
        
        $this->controller($name);
        $this->model($name);
        
        File::append(base_path('routes/backend/rutas.php'), 'Route::get(\'' . Str::plural(strtolower($name)) ."', [ {$name}Controller::class, 'index' ])
        ->name('".strtolower($name)."Index')
            ->breadcrumbs(function (Trail \$trail) {
                \$trail->push(__('".Str::plural($name)."'), route('admin.".strtolower($name)."Index'));
            });
               "  );
    }

    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }
    
    protected function model($name)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Model')
        );

        file_put_contents(app_path("Models/{$name}.php"), $modelTemplate);
    }


    protected function controller($name)
    {
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name)
            ],
            $this->getStub('Backend/Controller')
        );

        file_put_contents(app_path("/Http/Controllers/Backend/{$name}Controller.php"), $controllerTemplate);
    }

}
