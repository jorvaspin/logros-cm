<?php
declare(strict_types=1);

namespace Assada\Achievements\Console;

use Illuminate\Console\GeneratorCommand;

/**
 * Creates an achievement chain class stub.
 *
 * @category Command
 * @package  Assada\Achievements\Command
 * @author   Gabriel Simonetti <simonettigo@gmail.com>
 * @license  MIT License
 * @link     https://github.com/assada/laravel-achievements
 */
class AchievementChainMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:achievement_chain';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new achievement chain class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'AchievementChain';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/achievement_chain_class.stub';
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
