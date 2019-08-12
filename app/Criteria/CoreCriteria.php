<?php

namespace App\Criteria;

use App\Plugins\ClientRequestAdapter;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CoreCriteria
 * @package App\Criteria
 */
abstract class CoreCriteria implements CriteriaInterface
{
    protected $clientRequestAdapter;

    public function __construct(ClientRequestAdapter $clientRequestAdapter)
    {
        $this->clientRequestAdapter = $clientRequestAdapter;
        $filters = $this->clientRequestAdapter->getFilter();
        $this->setFilter($filters);
        $sorts = $this->clientRequestAdapter->getSort();
        $this->setSort($sorts);
    }

    /**
     * The Eloquent builder.
     *
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $commonFilters = [];

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $customFilters = [];

    /**
     * Registered sorts to operate upon.
     *
     * @var array
     */
    protected $commonSorts = [];

    /**
     * Registered sorts to operate upon.
     *
     * @var array
     */
    protected $customSorts = [];

    public function clearAll()
    {
        $this->clearFilter();
        $this->clearSort();
    }

    public function clearFilter()
    {
        $this->commonFilters = [];
        $this->customFilters = [];
    }

    public function clearSort()
    {
        $this->commonSorts = [];
        $this->customSorts = [];
    }

    /**
     * @param array $filters
     */
    public function setFilter($filters)
    {
        foreach ($filters as $key => $value) {
            if (method_exists($this, $key . 'Filter')) {
                $this->customFilters[$key] = is_array($value) ? $value['value'] : $value;
            } else {
                $this->commonFilters[$key] = $value;
            }
        }
    }

    /**
     * @param array $sorts
     */
    public function setSort($sorts)
    {
        foreach ($sorts as $key => $value) {
            if (is_numeric($key)) {
                if (method_exists($this, $value . 'Sort')) {
                    $this->customSorts[$value] = 'asc';
                } else {
                    $this->commonSorts[$value] = 'asc';
                }
            } else {
                if (method_exists($this, $key . 'Sort')) {
                    $this->customSorts[$key] = $value;
                } else {
                    $this->commonSorts[$key] = $value;
                }
            }
        }
    }

    /**
     * apply
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     * @return \Illuminate\Database\Eloquent\Builder|mixed
     * @author ADMIN
     * @since  2019-08-11
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $this->builder = $model;

        $this->applyFilter();
        $this->applySort();

        return $this->builder;
    }

    /**
     * @return void
     */
    protected function applyFilter()
    {
        foreach ($this->commonFilters as $column => $value) {
            $this->builder = $this->builder->{$value['method']}($this->builder->getModel()->getTable() . '.' . $column, ...$value['parameters']);
        }

        foreach ($this->customFilters as $filterName => $value) {
            $this->builder = $this->{$filterName . 'Filter'}($value);
        }
    }

    /**
     * @return void
     */
    public function applySort()
    {
        foreach ($this->commonSorts as $column => $direction) {
            $this->builder = $this->builder->orderBy($column, $direction);
        }

        foreach ($this->customSorts as $sortName => $direction) {
            $this->builder = $this->{$sortName . 'Sort'}($direction);
        }
    }
}
