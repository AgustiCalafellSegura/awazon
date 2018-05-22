<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 10/5/18
 * Time: 17:02.
 */

namespace App\Manager;

use App\Entity\Rating;

class FrequencyCounterManager
{
    /**
     * @var array
     */
    private $counter;

    /**
     * @var array
     */
    private $percentile;

    public function __construct()
    {
        $this->counter = array(0, 0, 0, 0, 0);
        $this->percentile = array();
    }

    /**
     * @param Rating[] $ratings
     *
     * @return array
     */
    public function getStarsFrequencyCounter($ratings)
    {
        /** @var Rating $rate */
        foreach ($ratings as $rate) {
            if (1 == $rate->getRate()) {
                ++$this->counter[0];
            } elseif (2 == $rate->getRate()) {
                ++$this->counter[1];
            } elseif (3 == $rate->getRate()) {
                ++$this->counter[2];
            } elseif (4 == $rate->getRate()) {
                ++$this->counter[3];
            } elseif (5 == $rate->getRate()) {
                ++$this->counter[4];
            }
        }

        return $this->counter;
    }

    /**
     * @param Rating[] $ratings
     *
     * @return array
     */
    public function getStarsFrequencyPercentile($ratings)
    {
        $counter = $this->getStarsFrequencyCounter($ratings);
        $totalRatings = count($ratings);

        $this->percentile[0] = (($counter[0] * 100) / $totalRatings);
        $this->percentile[1] = (($counter[1] * 100) / $totalRatings);
        $this->percentile[2] = (($counter[2] * 100) / $totalRatings);
        $this->percentile[3] = (($counter[3] * 100) / $totalRatings);
        $this->percentile[4] = (($counter[4] * 100) / $totalRatings);

        return $this->percentile;
    }
}
