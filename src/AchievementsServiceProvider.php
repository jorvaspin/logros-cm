<?php
declare(strict_types=1);

namespace Civicamente\LogrosCm;

use Civicamente\LogrosCm\Console\AchievementChainMakeCommand;
use Civicamente\LogrosCm\Console\AchievementMakeCommand;
use Civicamente\LogrosCm\Console\LoadAchievementsCommand;
use Illuminate\Support\ServiceProvider;

/**
 * Class AchievementsServiceProvider
 *
 * @package Civicamente\LogrosCm
 */
class AchievementsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        if ($this->app->runningInConsole()) {
            $this->commands(
                [
                    AchievementMakeCommand::class,
                    AchievementChainMakeCommand::class,
                    LoadAchievementsCommand::class
                ]
            );
        }
        $this->app[Achievement::class] = static function ($app) {
            return $app['gstt.achievements.achievement'];
        };
        $this->publishes(
            [
                __DIR__ . '/config/achievements.php' => config_path('achievements.php'),
            ],
            'config'
        );
        $this->publishes(
            [
                __DIR__ . '/Migrations/0000_00_00_000000_create_achievements_tables.php' => database_path('migrations')
            ],
            'migrations'
        );
        $this->mergeConfigFrom(__DIR__ . '/config/achievements.php', 'achievements');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
