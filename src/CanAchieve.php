<?php
declare(strict_types=1);

namespace Civicamente\LogrosCm;

/**
 * Interface CanAchieve
 *
 * @package Civicamente\LogrosCm
 */
interface CanAchieve
{
    // Adds an specified amount of points of progress
    public function addProgressToAchiever($achiever, $points);

    // Adds an specified amount for date of points of progress
    public function addProgressToAchieverDate($achiever, $points, $date_start, $date_end);

    // Sets the specified amount of points to this achiever
    public function setProgressToAchiever($achiever, $points);
}
