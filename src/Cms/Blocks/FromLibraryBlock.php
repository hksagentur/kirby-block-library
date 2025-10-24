<?php

namespace BlockLibrary\Cms\Blocks;

use BlockLibrary\Cms\BlockLibrary;
use BlockLibrary\Cms\BlockLibraryItem;
use Kirby\Cms\Block;

class FromLibraryBlock extends Block
{
    protected ?BlockLibrary $library = null;
    protected ?BlockLibraryItem $libraryItem = null;

    public function library(): BlockLibrary
    {
        return $this->library ??= $this->kirby()->site()->blocks()->toBlockLibrary();
    }

    public function libraryItem(): ?BlockLibraryItem
    {
        return $this->libraryItem ??= $this->library()->find($this->content()->block()->value());
    }

    public function controller(): array
    {
        return parent::controller() + [
            'library' => $this->library(),
            'item' => $this->libraryItem(),
        ];
    }
}
