<?php

namespace Runroom\GildedRose;

class GildedRose {

    private $items;

    function __construct($items) {
        $this->items = $items;
    }

    function updateQuality() {
        foreach ($this->items as $item) {
            if ($item->getName() == 'Sulfuras, Hand of Ragnaros') {
                continue;
            }
            $item->changeQuality($item);
            $item->setSellIn($item->getSellIn() - 1);
            $item->isSellIsNegative();
        }
    }
}
