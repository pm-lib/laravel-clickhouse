<?php

declare(strict_types=1);

namespace LinLancer\LaravelClickHouse\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\DatabaseManager;
use LinLancer\LaravelClickHouse\Database\Connection;
use LinLancer\LaravelClickHouse\Database\Eloquent\Model;

class ClickHouseServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        /** @var DatabaseManager $db */
        $db = $this->app->get('db');

        $db->extend('clickhouse', function ($config, $name) {
            $config['name'] = $name;

            return new Connection($config);
        });

        Model::setConnectionResolver($db);
    }
}
