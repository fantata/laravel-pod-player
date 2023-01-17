## Laravel Pod Player

Laravel component HTML5 audio player, built with podcasts in mind.

Adapted from [this CSS Tricks tutorial](https://css-tricks.com/lets-create-a-custom-audio-player/)

### Installation

`composer require fantata/laravel-pod-player`

`php artisan vendor:publish --tag=public --force`

Add the JS and CSS to your template:

`<link rel="stylesheet" href="<?php echo asset('vendor/fantata/css/audioPlayer.css')?>" type="text/css">`

`<script src="<?php echo asset('vendor/fantata/js/audioPlayer.js')?>"></script>`

And finally, call the component, e.g.

`
<x-laravel-audio-player

    audioUrl="/audio.mp3"

    imgUrl="cover.jpg"

    epId="1"

    epTitle="Greatest Cheeses of All Time"

    epDate="20th Jan 2023"

    showTitle="The Amazing Things Podcast"

/>
`