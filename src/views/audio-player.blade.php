<div id='ep{{ $ep_id }}' class='audio-player-container rounded-xl text-lg'>

    <div class="flex">

        <div class="pl-4 pt-4 pb-4">

            <div class='thumbnail' style='background-image: url("{{ $img_url }}")'></div>

        </div>

        <div class="flex items-center justify-center px-8">

            <audio class='audio-widget' preload="metadata">

                <source src="{{ $audio_url }}" type="audio/mpeg">

            </audio>

            <button class="play-icon mx-auto"></button>

        </div>

        <div class="pr-4 w-full">

            <h6 class='font-bold mt-5 show-title text-xs uppercase'>{!! $show_title !!}</h6>
            <h1 class='font-bold mt-1 pod-title text-xl'>{!! $ep_title !!}</h1>

            <div class="flex">

                <div>

                    <span class="current-time time text-base">0:00</span>

                </div>

                <div class="w-full px-1">

                    <input type="range" class="seek-slider" max="100" value="0">

                </div>

                <div>

                    <span class="duration time text-base">0:00</span>

                </div>

            </div>

            <div class='w-full'>

                @if($ep_date)

                    <div class='float-left'>
                        <h6 class='text-xs uppercase'>Published on {{ date('j F, Y', strtotime($ep_date)) }}</h6>
                    </div>

                @endif

                <button class="mute-icon"></button>

                <input type="range" class="volume-slider" max="100" value="100">
                <br style='clear: both' />

            </div>

        </div>

    </div>

</div>
