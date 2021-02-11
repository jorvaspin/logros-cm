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
    public function addProgressToAchiever($achiever, $curso_id, $points);

    // Adds an specified amount for date of points of progress
    public function addProgressToAchieverDate($achiever, $curso_id, $points, $date_start, $date_end);

    // Sets the specified amount of points to this achiever
    public function setProgressToAchiever($achiever, $curso_id, $points);
}
