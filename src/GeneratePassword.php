<?php

namespace Naif\GeneratePassword;

use Laravel\Nova\Fields\Field;

class GeneratePassword extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'generate-password';

    public function length($length)
    {
        return $this->withMeta([
            'length' => $length
        ]);
    }
}
