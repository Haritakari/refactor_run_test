<?php

namespace Runroom\GildedRose;

class GildedRose {

    private $items;

    const AGED_BRIE = 'Aged Brie';
    const BACKSTAGE = 'Backstage passes to a TAFKAL80ETC concert';

    function __construct($items) {
        $this->items = $items;
    }

    function updateQuality() {
        foreach ($this->items as $item) {
            if ($item->getName() == 'Sulfuras, Hand of Ragnaros') {
                continue;
            }

            if ($item->getName() != self::AGED_BRIE and $item->getName() != self::BACKSTAGE) {
                $item->degradeQuality($item);
            } else {
                $item->upgrateQuality($item);

                if ($item->getName() == self::BACKSTAGE) {
                    if ($item->getSellIn() < 11) {
                        $item->upgrateQuality($item);
                    }
                    if ($item->getSellIn() < 6) {
                        $item->upgrateQuality($item);
                    }
                }
            }
            $item->setSellIn($item->getSellIn() - 1);

            if ($item->getSellIn() < 0) {
                if ($item->getName() != self::AGED_BRIE) {
                    if ($item->getName() != self::BACKSTAGE) {
                        $item->degradeQuality($item);
                    } else {
                        $item->setQuality(0);
                    }
                } else {
                    $item->upgrateQuality($item);
                }
            }
        }
    }
}
