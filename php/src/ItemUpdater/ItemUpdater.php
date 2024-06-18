<?php

declare(strict_types=1);

namespace GildedRose\ItemUpdater;

use GildedRose\Item;


abstract class ItemUpdater
{
	public function __construct(protected Item $item)
	{
	}
	
	abstract public function update(): void;
}
