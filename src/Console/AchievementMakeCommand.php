<?php
declare(strict_types=1);

namespace Civicamente\LogrosCm\Console;

use Illuminate\Console\GeneratorCommand;

/**
 * Creates an achievement class stub.
 *
 * @category Command
 * @package  Civicamente\LogrosCm\Command
 * @author   Gabriel Simonetti <simonettigo@gmail.com>
 * @license  MIT License
 * @link     https://github.com/assada/laravel-achievements
 */
class AchievementMakeCommand extends GeneratorCommand
{

    // protected $signature = 'make:achievement';
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:achievement';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Create a new achievement class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Achievement';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/achievement_class.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace The root namespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Achievements';
    }
}
