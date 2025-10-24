<?php

use BlockLibrary\Cms\Blocks\FromLibraryBlock;

Kirby::plugin(
    name: 'hksagentur/block-library',
    license: 'ISC',
    extends: [
        'blockModels' => [
            'from-library' => FromLibraryBlock::class,
        ],
        'blueprints' => require __DIR__ . '/config/blueprints.php',
        'translations' => require __DIR__ . '/config/translations.php',
        'snippets' => require __DIR__ . '/config/snippets.php',
        'fieldMethods' => require __DIR__ . '/config/methods/field.php',
    ],
);
