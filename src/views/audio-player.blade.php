<div id='ep{{ $ep_id }}' class='audio-player-container rounded-xl text-lg border'>

    <div class="flex">

        <div class="pl-4 pt-4 pb-4 hidden sm:block">

            <div class='thumbnail' style='background-image: url("{{ $img_url }}")'></div>

        </div>

        <div class="flex items-center justify-center px-6 md:px-8">

            <audio class='audio-widget' preload="metadata">

                <source src="{{ $audio_url }}" type="audio/mpeg">

            </audio>

            <button class="play-icon mx-auto"></button>

        </div>

        <div class="pr-4 w-full">

            <h6 class='font-bold mt-5 show-title text-xs uppercase'>{!! $show_title !!}</h6>
            <h1 class='font-bold mt-1 pod-title text-xl'>{!! $ep_title !!}</h1>

            @if($ep_date)

                <h6 class='text-xs uppercase p-0 m-0'>Published on {{ date('j F, Y', strtotime($ep_date)) }}</h6>

            @endif

            <div class="flex mr-2">

                <div>

                    <span class="current-time time text-base">0:00</span>

                </div>

                <div class="w-full px-1">

                    <input type="range" class="seek-slider" max="100" value="0">

                </div>

                <div class="text-left">

                    <span class="duration time text-base">0:00</span>

                </div>

            </div>

            <div class='w-full' style='margin-top: -10px;'>

                <button class="mute-icon"></button>

                <input type="range" class="volume-slider" max="100" value="100">
                <br style='clear: both' />

            </div>

        </div>

    </div>

</div>
