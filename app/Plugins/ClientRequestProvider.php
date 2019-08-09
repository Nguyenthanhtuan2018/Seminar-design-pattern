<?php

namespace App\Plugins;

use App\Criteria\CoreCriteria;
use Illuminate\Support\ServiceProvider;
use Prettus\Repository\Contracts\CriteriaInterface;

class ClientRequestProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * register
     *
     * @return void
     * @author ADMIN
     * @since  2019-08-11
     */
    public function register()
    {
        $this->app->resolving(CriteriaInterface::class, function ($criteria, $app) {
            dd($criteria);
            $clientRequest = app(ClientRequestAdapter::class);
            /** @var CoreCriteria $criteria */
            $criteria->setFilter($clientRequest->getFilter());
            $criteria->setSort($clientRequest->getSort());
        });
//        $this->app->bind(PaginationTransformer::class, VueTablesPaginationTransformer::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
