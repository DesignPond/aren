<?php

namespace App\Providers;

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
        $page = new \App\Aren\Page\Entities\Page();
        $root = $page->where('parent_id',0)->orderBy('rang','asc')->get();

        view()->share('hierarchy', $root);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerUserService();
        $this->registerPageService();
        $this->registerBlocService();
        $this->registerNewsService();
        $this->registerComiteService();
        $this->registerPrestataireService();
    }

    /**
     * User
     */
    protected function registerUserService(){

        $this->app->singleton('App\Aren\User\Repo\UserInterface', function()
        {
            return new \App\Aren\User\Repo\UserEloquent(new \App\Aren\User\Entities\User);
        });
    }

    /**
     * Page
     */
    protected function registerPageService(){

        $this->app->singleton('App\Aren\Page\Repo\PageInterface', function()
        {
            return new \App\Aren\Page\Repo\PageEloquent(new \App\Aren\Page\Entities\Page);
        });
    }

    /**
     * Bloc
     */
    protected function registerBlocService(){

        $this->app->singleton('App\Aren\Bloc\Repo\BlocInterface', function()
        {
            return new \App\Aren\Bloc\Repo\BlocEloquent(new \App\Aren\Bloc\Entities\Bloc);
        });
    }

    /**
     * News
     */
    protected function registerNewsService(){

        $this->app->singleton('App\Aren\News\Repo\NewsInterface', function()
        {
            return new \App\Aren\News\Repo\NewsEloquent(new \App\Aren\News\Entities\News);
        });
    }

    /**
     * Comite
     */
    protected function registerComiteService(){

        $this->app->singleton('App\Aren\Comite\Repo\ComiteInterface', function()
        {
            return new \App\Aren\Comite\Repo\ComiteEloquent(new \App\Aren\Comite\Entities\Comite);
        });
    }

    /**
     * Prestataire
     */
    protected function registerPrestataireService(){

        $this->app->singleton('App\Aren\Prestataire\Repo\PrestataireInterface', function()
        {
            return new \App\Aren\Prestataire\Repo\PrestataireEloquent(new \App\Aren\Prestataire\Entities\Prestataire);
        });
    }
}
