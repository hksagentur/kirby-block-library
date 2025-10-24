<?php

use BlockLibrary\Cms\BlockLibrary;
use Kirby\Content\Field;

return [
    'toBlockLibrary' => function (Field $field): BlockLibrary {
        try {
            return BlockLibrary::factory(
                items: $field->toData('yaml'),
                params: [
                    'field' => $field,
                    'parent' => $field->parent(),
                ],
            );
        } catch (Exception) {
            $message = 'Invalid block library data for "' . $field->key() . '" field';

            if ($parent = $field->parent()) {
                $message .= ' on parent "' . $parent->id() . '"';
            }

            throw new InvalidArgumentException($message);
        }
    },
];
