<?php

namespace Naif\GeneratePassword;

use Laravel\Nova\Fields\Password;

class GeneratePassword extends Password
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
