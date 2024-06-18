<?php

declare(strict_types=1);

namespace GildedRose\ItemUpdater;

class ItemUpdaterAgedBrie extends ItemUpdater
{
    public function update(): void
    {
        $this->item->quality++;
        if ($this->item->sellIn <= 0) {
            $this->item->quality++;
        }

        $this->item->sellIn--;

        // limits
        $this->item->quality = \max(0, \min(50, $this->item->quality));
    }
}
