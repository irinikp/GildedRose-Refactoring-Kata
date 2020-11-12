<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        static::assertSame('foo', $items[0]->name);
    }

    public function testQualityDoesntDropBelowZero(): void
    {
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        static::assertSame(0, $items[0]->quality);
    }

    public function testQualityDecreasesByOne(): void
    {
        $items = [new Item('foo', 5, 4)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        static::assertSame(3, $items[0]->quality);
    }

    public function testOnceTheSellByDateHasPassedQualityDegradesTwiceAsFast()
    {
        $items = [new Item('foo', 0, 4)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        static::assertSame(2, $items[0]->quality);
    }

    public function testAgedBrieIncreasesInQualityByOneTheOlderItGets()
    {
        $items = [
            new Item('Aged Brie', 5, 4)
        ];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        static::assertSame(5, $items[0]->quality);
    }

    public function testAgedBrieIncreasesInQualityByTwoWhenSellByDateHasPassed()
    {
        $items = [
            new Item('Aged Brie', 0, 4)
        ];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        static::assertSame(6, $items[0]->quality);
    }

    /**
     * @dataProvider itemDataProvider
     */
    public function testTheQualityOfAnItemIsNeverMoreThan50($item)
    {
        $items = [$item];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        static::assertLessThanOrEqual(50, $items[0]->quality);
    }

    public function testStaticQualityOfSulfurasItem()
    {
        $items = [new Item('Sulfuras, Hand of Ragnaros', 1, 80)];
        static::assertSame(80, $items[0]->quality);
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        static::assertSame(80, $items[0]->quality);
    }

    public function itemDataProvider(): array
    {
        return [
            [new Item('foo', 1, 50)],
            [new Item('Aged Brie', 1, 50)],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 1, 50)],
        ];
    }

    public function testConjuredItemDegradesInQualityTwiceAsFast()
    {
        $items = [new Item('Conjured', 5, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        static::assertSame(8, $items[0]->quality);
    }

    public function testConjuredItemDegradesInQualityFourTimesAsFastWhenSellByDateHasPassed()
    {
        $items = [new Item('Conjured', 0, 10)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        static::assertSame(4, $items[0]->quality);
    }

}
