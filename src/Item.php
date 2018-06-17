<?php

namespace Runroom\GildedRose;

class Item {

    private $name;
    private $sellIn;
    private $quality;

    const AGED_BRIE = 'Aged Brie';
    const BACKSTAGE = 'Backstage passes to a TAFKAL80ETC concert';

    function __construct(string $name, int $sellIn, int $quality) {
        $this->name = $name;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSellIn(): int
    {
        return $this->sellIn;
    }

    public function setSellIn(int $sellIn)
    {
        $this->sellIn = $sellIn;

        return $this;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    public function setQuality(int $quality)
    {
        $this->quality = $quality;

        return $this;
    }
    public function isSellIsNegative()
    {
        if ($this->getSellIn() < 0) {
            if ($this->getName() != self::AGED_BRIE) {
                if ($this->getName() != self::BACKSTAGE) {
                    $this->degradeQuality();
                } else {
                    $this->setQuality(0);
                }
            } else {
                $this->upgrateQuality();
            }
        }
    }

    public function changeQuality()
    {
        if ($this->getName() != self::AGED_BRIE and $this->getName() != self::BACKSTAGE) {
            $this->degradeQuality($this);
        } else {
            $this->upgrateQuality($this);

            if ($this->getName() == self::BACKSTAGE) {
                if ($this->getSellIn() < 11) {
                    $this->upgrateQuality($this);
                }
                if ($this->getSellIn() < 6) {
                    $this->upgrateQuality($this);
                }
            }
        }
    }

    public function degradeQuality()
    {
        if ($this->getQuality() > 0) {
            $this->setQuality($this->getQuality() - 1);
        }
    }

    public function upgrateQuality()
    {
        if ($this->getQuality() < 50) {
            $this->setQuality($this->getQuality() + 1);
        }
    }
}
