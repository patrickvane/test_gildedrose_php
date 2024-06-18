<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\ItemUpdater\ItemUpdater;
use GildedRose\ItemUpdater\ItemUpdaterAgedBrie;
use GildedRose\ItemUpdater\ItemUpdaterBackstagePass;
use GildedRose\ItemUpdater\ItemUpdaterStandard;
use GildedRose\ItemUpdater\ItemUpdaterSulfuras;


final class GildedRose
{
	/** @var ItemUpdater[] */
	private array $itemUpdaters;
	
	
	/** @param Item[] $items */
	public function __construct(private array $items)
	{
		$this->itemUpdaters = \array_map([self::class, 'getItemUpdater'], $this->items);
	}
	
	public function updateQuality(): void
	{
		foreach($this->itemUpdaters as $itemUpdater)
		{
			$itemUpdater->update();
		}
	}
	
	
	private static function getItemUpdater(Item $item): ItemUpdater
	{
		switch($item->name)
		{
			case 'Aged Brie':
				return new ItemUpdaterAgedBrie($item);
			case 'Sulfuras, Hand of Ragnaros':
				return new ItemUpdaterSulfuras($item);
		}
		if(\str_starts_with($item->name, 'Backstage pass'))
		{
			return new ItemUpdaterBackstagePass($item);
		}
		return new ItemUpdaterStandard($item);
	}
}
