<?php

declare(strict_types=1);

namespace GildedRose\ItemUpdater;


class ItemUpdaterConjured extends ItemUpdater
{
	public function update(): void
	{
		$this->item->quality -= 2;
		if($this->item->sellIn <= 0)
		{
			$this->item->quality -= 2;
		}
		
		$this->item->sellIn--;
		
		
		// limits
		$this->item->quality = \max(0, \min(50, $this->item->quality));
	}
}
