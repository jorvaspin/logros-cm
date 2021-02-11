<?php
declare(strict_types=1);

namespace Civicamente\LogrosCm;

use Civicamente\LogrosCm\Model\AchievementProgress;

/**
 * Class AchievementChain
 *
 * @package Civicamente\LogrosCm
 */
abstract class AchievementChain implements CanAchieve
{
    /**
     * Expects an array of Achievements.
     * @return Achievement[]
     */
    abstract public function chain(): array;

    /**
     * For an Achiever, return the highest achievement on the chain that is unlocked.
     * @param $achiever
     * @return null|AchievementProgress
     */
    public function highestOnChain($achiever): ?AchievementProgress
    {
        $latestUnlocked = null;
        foreach ($this->chain() as $instance) {
            /** @var Achievement $instance */
            /** @var Achiever $achiever */
            if ($achiever->hasUnlocked($instance)) {
                $latestUnlocked = $achiever->achievementStatus($instance);
            } else {
                return $latestUnlocked;
            }
        }
        return $latestUnlocked;
    }

    /**
     * @param $achiever
     * @param $points
     */
    public function addProgressToAchiever($achiever, $curso_id, $points): void
    {
        foreach ($this->chain() as $instance) {
            /** @var Achievement $instance */
            $instance->addProgressToAchiever($achiever, $curso_id, $points);
        }
    }

    /**
     * @param $achiever
     * @param $points
     * @param $date_start
     * @param $date_end
     */
    public function addProgressToAchieverDate($achiever, $curso_id, $points, $date_start, $date_end): void
    {
        foreach ($this->chain() as $instance) {
            /** @var Achievement $instance */
            $instance->addProgressToAchieverDate($achiever, $curso_id, $points, $date_start, $date_end);
        }
    }

    /**
     * @param $achiever
     * @param int $points
     */
    public function setProgressToAchiever($achiever, $curso_id, $points): void
    {
        foreach ($this->chain() as $instance) {
            /** @var Achievement $instance */
            $instance->setProgressToAchiever($achiever, $curso_id, $points);
        }
    }
}
