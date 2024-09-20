<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CastIntroduction extends Component
{
    public $casts;

    public function __construct($casts)
    {
        $this->casts = $casts;
    }

    public function render()
    {
        return view('components.cast-introduction-component');
    }
}
