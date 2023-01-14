<?php

namespace Fantata\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\View;

class AudioPlayerComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('fantata::audio-player');
    }
}
