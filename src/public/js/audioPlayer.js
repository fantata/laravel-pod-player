let playIconContainers = document.getElementsByClassName('play-icon');
let audioPlayerContainers = document.getElementsByClassName(
    "audio-player-container"
);
let seekSliders = document.getElementsByClassName("seek-slider");
let volumeSliders = document.getElementsByClassName("volume-slider");
let muteIconContainers = document.getElementsByClassName("mute-icon");

let playState = 'play';
let muteState = 'unmute';

playIconContainers = Array.from(playIconContainers);
playIconContainers.map( (cur, i, arr) => {

    cur.style.backgroundImage = "url(/vendor/fantata/img/play.png)";

    cur.addEventListener("click", () => {

        if (playState === "play") {

            audios[i].play();
            cur.style.backgroundImage = "url(/vendor/fantata/img/pause.png)";
            requestAnimationFrame(whilePlaying);
            playState = "pause";

        } else {

            audios[i].pause();
            cur.style.backgroundImage = "url(/vendor/fantata/img/play.png)";
            cancelAnimationFrame(raf);
            playState = "play";

        }

    });

});

muteIconContainers = Array.from(muteIconContainers);
muteIconContainers.map((cur, i, arr) => {

    cur.style.backgroundImage = "url(/vendor/fantata/img/unmute.png)";

    cur.addEventListener("click", () => {

        if (muteState === "unmute") {

            cur.style.backgroundImage = "url(/vendor/fantata/img/mute.png)";
            audios[i].muted = true;
            muteState = "mute";

        } else {

            cur.style.backgroundImage = "url(/vendor/fantata/img/unmute.png)";
            audios[i].muted = false;
            muteState = "unmute";

        }

    });

});

const showRangeProgress = (rangeInput, i) => {

    console.log(rangeInput)

    if(rangeInput === seekSliders[i]) audioPlayerContainers[i].style.setProperty('--seek-before-width', rangeInput.value / rangeInput.max * 100 + '%');
    else audioPlayerContainers[i].style.setProperty('--volume-before-width', rangeInput.value / rangeInput.max * 100 + '%');

}

seekSliders = Array.from(seekSliders);
seekSliders.map((cur, i, arr) => {

    cur.addEventListener("input", (e) => {
        showRangeProgress(e.target, i);
    });

});

volumeSliders = Array.from(volumeSliders);
volumeSliders.map((cur) => {

    cur.addEventListener("input", (e) => {
        showRangeProgress(e.target);
    });

});


let audios = document.getElementsByClassName("audio-widget");
let durationContainers = document.getElementsByClassName("duration");
let currentTimeContainers = document.getElementsByClassName("current-time");
let outputContainers = document.getElementsByClassName("volume-output");

let raf = null;

const calculateTime = (secs) => {
    const minutes = Math.floor(secs / 60);
    const seconds = Math.floor(secs % 60);
    const returnedSeconds = seconds < 10 ? `0${seconds}` : `${seconds}`;
    return `${minutes}:${returnedSeconds}`;
}

durationContainers = Array.from(durationContainers);
let displayDuration;
durationContainers.map((cur, i, arr) => {
    displayDuration = () => {
        cur.textContent = calculateTime(audios[i].duration);
    };
});

seekSliders = Array.from(seekSliders);
let setSliderMax;
seekSliders.map((cur, i, arr) => {
    setSliderMax = () => {
        cur.max = Math.floor(audios[i].duration);
    };
});

audioPlayerContainers = Array.from(audioPlayerContainers);
let displayBufferedAmount, bufferedAmount;
audioPlayerContainers.map((cur, i, arr) => {

    displayBufferedAmount = () => {

        bufferedAmount = Math.floor(
            audios[i].buffered.end(audios[i].buffered.length - 1)
        );

        cur.style.setProperty(
            "--buffered-width",
            `${(bufferedAmount / seekSliders[i].max) * 100}%`
        );

    };

});

let whilePlaying;
seekSliders.map((cur, i, arr) => {
    whilePlaying = () => {
        cur.value = Math.floor(audios[i].currentTime);
        currentTimeContainers[i].textContent = calculateTime(cur.value);
        audioPlayerContainers[i].style.setProperty(
            "--seek-before-width",
            `${(cur.value / cur.max) * 100}%`
        );
        raf = requestAnimationFrame(whilePlaying);
    };

    cur.addEventListener("input", () => {

        currentTimeContainers[i].textContent = calculateTime(cur.value);

        if (!audios[i].paused) {
            cancelAnimationFrame(raf);
        }
    });

    cur.addEventListener("change", () => {

        audios[i].currentTime = cur.value;

        if (!audios[i].paused) {
            requestAnimationFrame(whilePlaying);
        }
    });

});

audios = Array.from(audios);
audios.map(cur => {
    if (cur.readyState > 0) {
        displayDuration();
        setSliderMax();
        displayBufferedAmount();
    } else {
        cur.addEventListener("loadedmetadata", () => {
            displayDuration();
            setSliderMax();
            displayBufferedAmount();
        });
    }
    cur.addEventListener("progress", displayBufferedAmount);
});

volumeSliders = Array.from(volumeSliders);
volumeSliders.map((cur, i, arr) => {
    cur.addEventListener("input", (e) => {

        const value = e.target.value;

        outputContainers[i].textContent = value;
        audios[i].volume = value / 100;

   });
});