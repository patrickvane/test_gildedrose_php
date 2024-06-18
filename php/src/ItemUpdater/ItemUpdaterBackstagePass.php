<?php

declare(strict_types=1);

namespace GildedRose\ItemUpdater;


class ItemUpdaterBackstagePass extends ItemUpdater
{
	public function update(): void
	{
		if($this->item->sellIn <= 0)
		{
			$this->item->quality = 0;
		}
		else
		{
			$this->item->quality++;
			if($this->item->sellIn <= 10)
			{
				$this->item->quality++;
			}
			if($this->item->sellIn <= 5)
			{
				$this->item->quality++;
			}
		}
		
		$this->item->sellIn--;
		
		
		// limits
		$this->item->quality = \max(0, \min(50, $this->item->quality));
	}
}
