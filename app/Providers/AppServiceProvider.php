<?php

namespace SRP\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->share('id_categoria', '1');
        view()->share('categoria_atual', 'Profissional');

        \Form::macro('error', function($field, $errors) {
            if($errors->has($field)){
                return view('errors.error_field', compact('field'));
            }
            return null;
        });

        \Html::macro('openFormGroup', function($field = null, $errors = null){
            $haserror = (($field != null ) and ( $errors != null ) and ($errors->has($field)))? " has-error" : "";
            return "<div class=\"form-group" . $haserror . "\">";
        });

        \Html::macro('closeFormGroup', function(){
            return "</div>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);

            $this->app->singleton(FakerGenerator::class, function () {
                return FakerFactory::create('pt_BR');
            });
        }
    }
}
