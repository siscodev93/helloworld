<?php 

namespace EntraSolutions\Helloworld;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;
use \Illuminate\Contracts\Http\Kernel as Kernel;

class HelloworldServiceProvider extends ServiceProvider {

    protected $kernel;

    /**
     * @param EntraSolutions\Helloworld\Kernel $kernel 
     * @return void 
     * @throws BindingResolutionException 
     */
    public function boot( Kernel $kernel){

        $this->publishes([
            __DIR__ . '/config/helloworld.php' => config_path('helloworld.php')
        ]);

        $middleware = '\EntraSolutions\Helloworld\HelloInterceptor';
        
        $kernel->pushMiddleware($middleware);
    }

}