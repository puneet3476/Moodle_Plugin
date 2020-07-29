/*
	
	video player js file
*/



const myvideo =  document.getElementById('myvideo');
const btnPlay =  document.getElementById('btnPlay');
const btnPause =  document.getElementById('btnPause');
const btnStop =  document.getElementById('btnStop');
const timeout =  document.getElementById('timeout');
const vidNum =  document.getElementById('vidNum');
let timer = null;

btnPlay.addEventListener('click', vidAction);
btnPause.addEventListener('click', vidAction);
btnStop.addEventListener('click', vidAction);
btnNext.addEventListener('click', vidAction);
myvideo.addEventListener('ended', vidEnded);

//Declare videos
const vids = ["video1.mp4"];
let vidPlaying =0;

function vidAction(event){
	switch(event.target.id){
		case "btnPlay": 
		playVideo();
		timer = setInterval(update,100);
		break;
		case "btnPause": 
		myvideo.pause();
		break;
		case "btnStop": 
		myvideo.pause();
		myvideo.currentTime=0;
		break;
	}
}
 function playVideo(){
	myvideo.play();
	 timer=setInterval(update, 100);
 }
function update(){
	timeout.innerHTML = "My Time : " + myTime(myvideo.currentTime) + "/" + myTime(myvideo.duration);
}
function myTime(time){
	var hr = ~~(time/3600);
	var min = ~~((time % 3600)/60);
	var sec = time % 60;
	var sec_min = "";
	if(hr > 0) {
		sec_min += "" + hrs + " : " + (min<10 ? "0" : ""); 
	}
	sec_min += ""+ min + " : " + (sec<10 ? "0" : ""); 
	sec_min += "" + Math.round(sec);
	return sec_min;
} 
function vidEnded(){
	clearInterval(timer);
	timeout.innerHTML = "Timer: 0";
	nextVideo();
	playVideo();
}