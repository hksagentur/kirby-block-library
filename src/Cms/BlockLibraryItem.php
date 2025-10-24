<?php

namespace BlockLibrary\Cms;

use Kirby\Cms\Block;
use Kirby\Cms\Blocks;
use Kirby\Cms\StructureObject;
use Stringable;

class BlockLibraryItem extends StructureObject implements Stringable
{
    public const ITEMS_CLASS = BlockLibrary::class;

    protected ?Blocks $blocks = null;

    public function name(): string
    {
        return $this->content()->name()->value();
    }

    public function block(): ?Block
    {
        return $this->blocks()->first();
    }

    public function blocks(): Blocks
    {
        return $this->blocks ??= $this->content()->block()->toBlocks();
    }

    public function toString(): string
    {
        return $this->toHtml();
    }

    public function toHtml(): string
    {
        return (string) $this->block()?->toHtml();
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}
