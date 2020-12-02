<?php
/**
 * @date 2020/11/26
 * @time 19:24
 *
 */
namespace Xiaomlove\LaravelHabit;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class LaravelHabitServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__) . '/config/config.php', 'laravel-habit');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                dirname(__DIR__) . '/config/config.php' => config_path('laravel-habit.php'),
            ], 'config');
        }

        $this->setSchemaDefaultStringLength();

    }

    /**
     *
     * @see https://laravel-news.com/laravel-5-4-key-too-long-error
     * @date 2020/11/26
     * @time 20:22
     */
    private function setSchemaDefaultStringLength()
    {
        $config = config('laravel-habit');
        if (version_compare($config['mysql_version'], '5.7.7', '<')) {
            Schema::defaultStringLength(191);
        }
    }
}
