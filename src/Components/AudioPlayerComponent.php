<?php

namespace Fantata\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\View;

class AudioPlayerComponent extends Component
{

    /**
     * The episode audio file
     *
     * @var string
     */
    public $audio_url;

    /**
     * The episode image
     *
     * @var string
     */
    public $img_url;

    /**
     * The episode id
     *
     * @var string
     */
    public $ep_id;

    /**
     * The episode title
     *
     * @var string
     */
    public $ep_title;

    /**
     * The episode date
     *
     * @var string
     */
    public $ep_date;

    /**
     * The show title
     *
     * @var string
     */
    public $show_title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $audioUrl,
        $imgUrl = null,
        $epId = null,
        $epTitle = null,
        $epDate = null,
        $showTitle = null)
    {

        $this->audio_url = $audioUrl;
        $this->img_url = $imgUrl;
        $this->ep_id = $epId;
        $this->ep_title = $epTitle;
        $this->show_title = $showTitle;
        $this->ep_date = $epDate;

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
