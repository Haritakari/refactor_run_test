<?php

namespace Runroom\GildedRose;

class Item {

    private $name;
    private $sellIn;
    private $quality;

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

    public function degradeQuality()
    {
        if ($this->getQuality() > 0) {
            $this->setQuality($this->getQuality() - 1);
        }
    }

    public function upgrateQuality($item)
    {
        if ($this->getQuality() < 50) {
            $this->setQuality($item->getQuality() + 1);
        }
    }
}
