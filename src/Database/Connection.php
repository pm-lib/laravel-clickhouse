<?php

declare(strict_types=1);

namespace Nolka\LaravelClickHouse\Database;

use Nolka\LaravelClickHouse\Database\Query\Builder;
use Tinderbox\ClickhouseBuilder\Query\Grammar;

class Connection extends \Tinderbox\ClickhouseBuilder\Integrations\Laravel\Connection
{
    public function query()
    {
        return new Builder($this, new Grammar());
    }
}
