/*
vidcha.js
version: 1.0

Tobias Düser
2019
https://tobiasdueser.de
*/


var vid = $('.vidchaVideo')[0];
var vidDuration = vid.duration;
console.log("imported");
var chapterCount = $(".vidchaNav").children().length; // get chapterCount from children divs


$('.vidchaVideo').on("timeupdate", function() {

    for (var i = 1; i <= chapterCount; i++) { // iterate through chapters

      var start = $(".vidchaNav>*:nth-child(" + i + ")").data("start"); // get start time frome data-attr
      var end;

      // get end time from start-time from next chapter (check if last chapter)
      if(i+1 > chapterCount) {
        end = vidDuration;
      } else {
        var nextChapter = i+1;
        end = $(".vidchaNav>*:nth-child(" + nextChapter + ")").data("start");
      }

      // set current Chapter active
      if (vid.currentTime >= start && vid.currentTime < end) {
        setActive(i);
      }

    }
})

// click action
$(".vidchaNav > *").click(function() {
    var clickedChapter = $(this).index() + 1;

    setActive(clickedChapter);
    skipTime($(this).data("start"));
});


function setActive(cha) {
    $(".vidchaNav>*").removeClass("active"); // reset all active classes
    $(".vidchaNav>*:nth-child(" + cha + ")").addClass("active"); // add class to active chapter
}

// skip to time in timeline
function skipTime(time) {
    vid.play();
    vid.pause();
    vid.currentTime = time;
    vid.play();
};
