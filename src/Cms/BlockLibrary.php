<?php

namespace BlockLibrary\Cms;

use Kirby\Cms\Structure;
use Kirby\Toolkit\Str;

/**
 *  * @extends \Kirby\Cms\Items<\BlockLibrary\Cms\BlockLibraryItem>
 */
class BlockLibrary extends Structure
{
    public const ITEM_CLASS = BlockLibraryItem::class;

    public static function factory(array|null $items = null, array $params = []): static
    {
        if (is_array($items)) {
            $items = array_map(function (array $item): array {
                $item['id'] ??= Str::uuid();
                return $item;
            }, $items);
        }

        return parent::factory($items, $params);
    }

    public function hasType(string $type): bool
    {
        return $this->filterByType($type)->count() > 0;
    }

    public function findByType(string $type): ?BlockLibraryItem
    {
        return $this->filterByType($type)->first();
    }

    public function filterByType(string $type): static
    {
        return $this->filterBy(fn (BlockLibraryItem $item) => $item->block()->type() === $type);
    }
}
