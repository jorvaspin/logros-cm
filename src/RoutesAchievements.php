<?php
declare(strict_types=1);

namespace Civicamente\LogrosCm;

use Civicamente\LogrosCm\Model\AchievementProgress;
use Carbon\Carbon;

/**
 * Trait RoutesAchievements
 *
 * @package Civicamente\LogrosCm
 */
trait RoutesAchievements
{

    /**
     * Adds a specified amount of points to the achievement.
     *
     * @param CanAchieve $instance An instance of an achievement
     * @param mixed $points The amount of points to add to the achievement's progress
     *
     * @return void
     */
    public function addProgress(CanAchieve $instance, $curso_id = null, $points = 1): void
    {
        $instance->addProgressToAchiever($this, $curso_id, $points);
    }
    /**
     * Adds for date a specified amount of points to the achievement.
     *
     * @param CanAchieve $instance An instance of an achievement
     * @param mixed $points The amount of points to add to the achievement's progress
     *
     * @return void
     */
    public function addProgressDate(CanAchieve $instance, $curso_id = null, $points = 1, $date_start = null, $date_end = null): void
    {
        // validamos si viene o no una fecha establecida
        if(!is_null($date_start) && !is_null($date_end)){
          // fecha de hoy
          $today = Carbon::today();
          if($today >= $date_start && $today <= $date_end){
            $instance->addProgressToAchiever($this, $curso_id, $points);
          }
        }else{
            $instance->addProgressToAchiever($this, $curso_id, $points);
        }
    }

    /**
     * Removes a specified amount of points from the achievement.
     *
     * @param CanAchieve $instance An instance of an achievement
     * @param mixed $points The amount of points to remove from the achievement's progress
     *
     * @return void
     */
    public function removeProgress(CanAchieve $instance, $points = 1): void
    {
        $this->addProgress($instance, (-1 * $points));
    }

    /**
     * Sets the current progress as the specified amount of points.
     *
     * @param CanAchieve $instance An instance of an achievement
     * @param mixed $points The amount of points to remove from the achievement's progress
     *
     * @return void
     */
    public function setProgress(CanAchieve $instance, $points): void
    {
        $instance->setProgressToAchiever($this, $points);
    }

    /**
     * Resets the achievement's progress, setting the points to 0.
     *
     * @param Achievement $instance An instance of an achievement
     *
     * @return void
     */
    public function resetProgress(Achievement $instance): void
    {
        $this->setProgress($instance, 0);
    }


    /**
     * Unlocks an achievement
     *
     * @param Achievement $instance An instance of an achievement
     *
     * @return void
     */
    public function unlock(Achievement $instance): void
    {
        $this->setProgress($instance, $instance->points);
    }


    /**
     * Unlocks for date an achievement
     *
     * @param Achievement $instance An instance of an achievement
     *
     * @return void
     */
    public function unlockForDate(Achievement $instance, $curso_id = null,$date_start = null, $date_end = null): void
    {
      // fecha de hoy
      $today = Carbon::today();
      if($today >= $date_start && $today <= $date_end){
        $this->setProgress($instance, $instance->points);
      }

    }

    /**
     * Gets the highest achievement unlocked on a specific achievement chain.
     * @param AchievementChain $chain
     * @return null|AchievementProgress
     */
    public function highestOnAchievementChain(AchievementChain $chain): ?AchievementProgress
    {
        return $chain->highestOnChain($this);
    }
}
