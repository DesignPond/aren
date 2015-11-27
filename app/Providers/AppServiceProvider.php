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

        $this->registerPrestationService();
        $this->registerTableService();
        $this->registerOptionService();
        $this->registerTitreService();
        $this->registerRemarqueService();

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

    /**
     * Prestation
     */
    protected function registerPrestationService(){

        $this->app->singleton('App\Aren\Prestation\Repo\PrestationInterface', function()
        {
            return new \App\Aren\Prestation\Repo\PrestationEloquent(new \App\Aren\Prestation\Entities\Prestation);
        });
    }

    /**
     * Table
     */
    protected function registerTableService(){

        $this->app->singleton('App\Aren\Prestation\Repo\TableInterface', function()
        {
            return new \App\Aren\Prestation\Repo\TableEloquent(new \App\Aren\Prestation\Entities\Table);
        });
    }

    /**
     * Option
     */
    protected function registerOptionService(){

        $this->app->singleton('App\Aren\Prestation\Repo\OptionInterface', function()
        {
            return new \App\Aren\Prestation\Repo\OptionEloquent(new \App\Aren\Prestation\Entities\Option);
        });
    }

    /**
     * Titre
     */
    protected function registerTitreService(){

        $this->app->singleton('App\Aren\Prestation\Repo\TitreInterface', function()
        {
            return new \App\Aren\Prestation\Repo\TitreEloquent(new \App\Aren\Prestation\Entities\Titre);
        });
    }

    /**
     * Remarque
     */
    protected function registerRemarqueService(){

        $this->app->singleton('App\Aren\Prestation\Repo\RemarqueInterface', function()
        {
            return new \App\Aren\Prestation\Repo\RemarqueEloquent(new \App\Aren\Prestation\Entities\Remarque);
        });
    }

}
