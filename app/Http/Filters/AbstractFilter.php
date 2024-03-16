<?php

namespace App\Http\Filters;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
    private $queryParams = [];

    public function __construct(array $queryParams)
    {
        $this->queryParams = $queryParams;
    }

    abstract protected function getCallbaks(): array;

    public function apply(Builder $builder)
    {
        $this->before($builder);

        foreach ($this->getCallbaks() as $name => $callbak) {
            if (isset($this->queryParams[$name])) {
                call_user_func($callbak, $builder, $this->queryParams[$name]);
            }
        }
    }

    protected function before()
    {
    }
    protected function getQueryParam($key, $default = null)
    {
        return $this->queryParams[$key] ?? $default;
    }

    protected function removeQueryParam(string ...$keys)
    {
        foreach ($keys as $key) {
            unset($this->queryParams[$key]);
        }

        return $this;
    }
}
