<?php
declare(strict_types=1);

namespace Assada\Tests\Achievements;

use Civicamente\LogrosCm\Achievement;

/**
 * Class FirstPost
 *
 * @package Assada\Tests\Achievements
 */
class FirstPost extends Achievement
{
    public $name = 'First Post';
    public $description = 'You made your first post!';
}
