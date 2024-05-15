<?php
include ('../conn/conn.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

*::before, *::after{
    padding: 0;
    margin: 0;
}

:root{
    --whitetype: #ff7480;
    --blacktype: #9f6ea3;
    --lightblack: #515C6F;
    --white: #ffffff;
    --darkwhite: #cecaca;
    --pinkshadow: #ffcbdd;
    --lightbshadow: rgba(0, 0, 0, 0.364);
}

body{
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(1800deg, black, white);
}

.player {
    width: 70%;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background: linear-gradient(45deg, rgb(218, 15, 18), rgb(203, 203, 216));
}

.wrapper{
    width: 450px;
    padding: 25px 30px;
    overflow: hidden;
    position: relative;
    border-radius: 15px;
    background: var(--white);
    box-shadow: 0px 6px 15px var(--lightbshadow);
}

.wrapper i{
    cursor: pointer;
}

.main {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 5px;
}

.main #logo {
    font-size: 20px;
    color: #1d1c1c;
}

.main #logo i {
    margin-right: 10px;
}

.top-bar, .progress-area .song-timer, .controls, .music-list .header, .music-list ul li {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.top-bar i{
  font-size: 30px;
  color: var(--lightblack);
}

.top-bar span{
    font-size: 18px;
    margin-left: -3px;
    color: var(--lightblack);
}

.img-area{
    width: 60%;
    height: 235px;
    margin: auto;
    overflow: hidden;
    margin-top: 15px;
    border-radius: 50%;
    -moz-box-shadow: 0px 6px 12px var(--lightbshadow);
    -webkit-box-shadow: 0px 6px 12px var(--lightbshadow);
    box-shadow: 0px 6px 12px var(--lightbshadow);
}

.img-area img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.song-details{
    text-align: center;
    margin: 15px 0;
}

.song-details>p{
    color: rgba(0, 0, 0, 0.858);
}

.song-details .name{
    font-size: 21px;
}

.song-details .artist{
    font-size: 18px;
    opacity: 0.9;
    line-height: 35px;
}

.progress-area{
    height: 6px;
    width: 100%;
    border-radius: 50px;
    background: #f0f0f0;
    cursor: pointer;
}

.progress-area .progress-bar{
    height: inherit;
    width: 0%;
    position: relative;
    border-radius: inherit;
    background: linear-gradient(90deg, var(--whitetype) 0%, var(--blacktype) 100%);
}

.progress-bar::before{
    content: "";
    position: absolute;
    height: 12px;
    width: 12px;
    border-radius: 50%;
    top: 50%;
    right: -5px;
    z-index: 2;
    opacity: 0;
    pointer-events: none;
    transform: translateY(-50%);
    background: inherit;
    transition: opacity 0.2s ease;
}

.progress-area:hover .progress-bar::before{
    opacity: 1;
    pointer-events: auto;
}

.progress-area .song-timer{
    margin-top: 2px;

}
.song-timer span{
    font-size: 13px;
    color: var(--lightblack);
}

.volume{
    margin: 30px 0 15px 0;
    /* position: absolute; */
    display: flex;
    justify-content: center; 
    align-items: center;
    color: rgb(87, 86, 86)
}

.volume p {
    font-size: 15px;
}

.volume i {
    cursor: pointer;
    padding: 8px 12px;
    background: #ffffff;
}

.volume i:hover {
    background: rgba(109, 109, 109, 0.1);
}

.volume #volume_show {
    padding: 8px 12px;
    margin: 0 5px 0 0;
    background: rgba(122, 121, 121, 0.1);
}

.volume input {
    -webkit-appearance: none;
    width: 60%;
    outline: none;
    border: none;
    height: 3px;
    margin: 0 5px;
    background: rgb(196, 118, 147);
} 

input[type="range"]::-webkit-progress-value {
    -webkit-appearance: none;
    background-color: #31369f;
}

input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    height: 20px;
    width: 20px;
    background: #f7f7f7;
    border: 3px solid rgb(156, 153, 153);
    border-radius: 50%;
    cursor: pointer;
}

.controls{
    margin: 10px 0 5px 0;
}

.controls i{
    font-size: 28px;
    user-select: none;
    background: linear-gradient(var(--whitetype) 0%, var(--blacktype) 100%);  
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.controls i:nth-child(2), .controls i:nth-child(4){
    font-size: 43px;
}

.controls #prev{
    margin-right: -13px;
}

.controls #next{
    margin-left: -13px;
}

.controls .play-pause{
    height: 54px;
    width: 54px;
    display: flex;
    cursor: pointer;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: linear-gradient(var(--white) 0%, var(--darkwhite) 100%);
    box-shadow: 0px 0px 5px var(--whitetype);
}

.play-pause::before{
    position: absolute;
    content: "";
    height: 43px;
    width: 43px;
    border-radius: inherit;
    background: linear-gradient(var(--whitetype) 0%, var(--blacktype) 100%);
}

.play-pause i{
    height: 43px;
    width: 43px;
    line-height: 43px;
    text-align: center;
    background: inherit;
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    position: absolute;
}

.music-list{
    position: absolute;
    background: var(--white);
    width: 100%;
    left: 0;
    bottom: -55%;
    opacity: 0;
    pointer-events: none;
    /* z-index: 5; */
    padding: 15px 30px;
    border-radius: 15px;
    box-shadow: 0px -5px 10px rgba(0,0,0,0.1);
    transition: all 0.15s ease-out;
}

.music-list.show{
    bottom: 0;
    opacity: 1;
    pointer-events: auto;
}

.header .row{
    display: flex;
    align-items: center;
    font-size: 19px;
    color: var(--lightblack);
}

.header .row i{
    cursor: default;
}

.header .row span{
    margin-left: 5px;
}

.header #close{
    font-size: 22px;
    color: var(--lightblack);
}

.music-list ul{
    margin: 10px 0;
    max-height: 260px;
    overflow: auto;
}

.music-list ul::-webkit-scrollbar{
    width: 0px;
}

.music-list ul li{
    list-style: none;
    display: flex;
    cursor: pointer;
    padding-bottom: 10px;
    margin-bottom: 5px;
    color: var(--lightblack);
    border-bottom: 1px solid #E5E5E5;
}

.music-list ul li:last-child{
    border-bottom: 0px;
}

.music-list ul li .row span{
    font-size: 17px;
}

.music-list ul li .row p{
    opacity: 0.9;
}

ul li .audio-duration{
    font-size: 16px;
}

.rotate {
    animation: rotation 7s infinite linear;
}
@keyframes rotation {
    from {
      transform: rotate(0deg);
    }
    to {
      transform: rotate(359deg);
    }
}

.loader {
    padding-top: 15px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.loader .stroke{
    background: #f1f1f1;
    height: 120%;
    width: 8px;
    border-radius: 50px;
    margin: 0 5px;
    animation: animate 1s linear infinite;
}

@keyframes animate {
    30% {
        height: 20%;
        background: #79397d;
    }

    50% {
        height: 50%;
        background: #93438b;
    }
  
    100% {
        background: #87267a;
        height: 100%;
    }
}

.stroke:nth-child(1){
    animation-delay: 0s;
}

.stroke:nth-child(2){
    animation-delay: 0.6s;
}

.stroke:nth-child(3){
    animation-delay: 0.2s;
}

.stroke:nth-child(4){
    animation-delay: 0.4s;
}

.stroke:nth-child(5){
    animation-delay: 0.8s;
}

.stroke:nth-child(6){
    animation-delay: 0.4s;
}

.stroke:nth-child(7){
    animation-delay: 0.2s;
}

.stroke:nth-child(8){
    animation-delay: 0.6s;
}

.stroke:nth-child(9){
    animation-delay: 0s;
}

</style>
  </head>

<body>
    <div class="player">
    <div class="wrapper">
        <div class="main">
            <p id="logo"><i class="fa fa-music"></i>Music</p>
        </div>

        <div class="top-bar">
            <i class="material-icons">expand_more</i>
            <span>Now Playing</span>
            <i class="material-icons">more_horiz</i>
        </div>

        <div class="img-area">
            <img src="images/music-1.jpg" alt="">
        </div>

        <div class="song-details">
            <p class="name"></p>
            <p class="artist"></p>
        </div>

        <div class="progress-area">
            <div class="progress-bar">
                <audio id="main-audio" src=""></audio>
                <span></span>
            </div>
            <div class="song-timer">
                <span class="current-time">0:00</span>
                <span class="max-duration">0:00</span>
            </div>
        </div>

        <div class="volume">
            <p id="volume_show">92</p>
            <i class="fa fa-volume-up" aria-hidden="true" onclick="mute_sound()" id="volume_icon"></i>
            <input type="range" min="0" max="100" value="92" onchange="volume_change()" id="volume">  
        </div>

        <div class="controls">
            <i id="repeat-plist" class="material-icons" title="Playlist looped">repeat</i>
            <i id="prev" class="material-icons">skip_previous</i>
            <div class="play-pause">
                <i class="material-icons play">play_arrow</i>
            </div>
            <i id="next" class="material-icons">skip_next</i>
            <i id="more-music" class="material-icons">queue_music</i>
        </div>

        <div id="wave">
            <span class="stroke"></span>
            <span class="stroke"></span>
            <span class="stroke"></span>
            <span class="stroke"></span>
            <span class="stroke"></span>
            <span class="stroke"></span>
            <span class="stroke"></span>
            <span class="stroke"></span>
            <span class="stroke"></span>
        </div>

        <div class="music-list">
            <div class="header">
                <div class="row">
                    <i class= "list material-icons">queue_music</i>
                    <span>Music list</span>
                </div>
                <i id="close" class="material-icons">close</i>
            </div>
            <ul>
                <!-- here li list are coming from js -->

                <!-- <li>
                    <div class="row">
                        <span>Despacito</span>
                        <p>Justin</p>
                    </div>
                    <span class="audio-duration">2:34</span>
                </li> -->
            </ul>
        </div>
    </div>
</div>

    <script src="music-list.js"></script>
    <script src="script.js"></script>
</body>
</html>
