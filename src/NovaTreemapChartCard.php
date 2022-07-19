<?php

namespace Flatroy\NovaTreemapChartCard;

use Laravel\Nova\Card;

class NovaTreemapChartCard extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/2';

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'nova-treemap-chart-card';
    }

    /**
     * Indicates that the card title
     *
     * @return $this
     */
    public function title($title)
    {
        return $this->withMeta(['title' => $title]);
    }

    /**
     * Indicates that the card data
     *
     * @return $this
     */
    public function series($series)
    {
        return $this->withMeta(['series' => $series]);
    }
}
