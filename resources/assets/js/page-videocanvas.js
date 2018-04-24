/**
 * Created by nigel.britton on 21/07/2017.
 */

var ScreenManager = {
  height: 1080,
  width: 1920,
  currentVideoIndex: 0,
  videos: []
};

if (document.getElementById('myCanvasPlaceHolder') && document.getElementById('myVideoPlaceHolder')) {
  ScreenManager.videos.push('/clips/1-98.m4v');
  ScreenManager.videos.push('/clips/2A-100.m4v');
  ScreenManager.videos.push('/clips/3A-102.m4v');
  ScreenManager.videos.push('/clips/4-104.m4v');
  ScreenManager.videos.push('/clips/5-106.m4v');
  ScreenManager.videos.push('/clips/6-108.m4v');
  ScreenManager.videos.push('/clips/7-110.m4v');
  ScreenManager.videos.push('/clips/8-112.m4v');
  ScreenManager.videos.push('/clips/9-114.m4v');
  ScreenManager.videos.push('/clips/10-116.m4v');
  ScreenManager.videos.push('/clips/11-118.m4v');
  ScreenManager.videos.push('/clips/12-120.m4v');
  ScreenManager.videos.push('/clips/13-122.m4v');
  ScreenManager.videos.push('/clips/14-124.m4v');
  ScreenManager.videos.push('/clips/15-126.m4v');

  ScreenManager.watermark     = new Image();
  ScreenManager.watermark.src = '/images/watermark.png';

// http://html5doctor.com/video-canvas-magic/
  ScreenManager.video          = document.createElement('video');
  ScreenManager.video.height   = ScreenManager.height;
  ScreenManager.video.width    = ScreenManager.width;
  ScreenManager.video.style    = 'display: block; margin: auto; height: 0; width: 100%; visibility:hidden;';
  ScreenManager.video.loop     = false;
  ScreenManager.video.autoplay = true;
  ScreenManager.video.isReady  = false;
  document.getElementById('myVideoPlaceHolder').appendChild(ScreenManager.video);

  ScreenManager.canvas         = document.createElement('canvas');
  ScreenManager.canvasContent  = ScreenManager.canvas.getContext('2d');
  ScreenManager.canvas.id      = 'cheeese';
  ScreenManager.canvas.height  = ScreenManager.height;
  ScreenManager.canvas.width   = ScreenManager.width;
  ScreenManager.canvas.style   = 'display: block; margin: auto; height: auto; width: 100%;';
  ScreenManager.canvas.onclick = function () {
    console.log('ScreenManager.canvas.onclick');
    if (ScreenManager.video.isReady === false) { return false; }
    ScreenManager.video.isReady = false;
    ScreenManager.switchSlideContent();
  };
  document.getElementById('myCanvasPlaceHolder').appendChild(ScreenManager.canvas);

  ScreenManager.canvasHidden        = document.createElement('canvas');
  ScreenManager.canvasHiddenContent = ScreenManager.canvasHidden.getContext('2d');
  ScreenManager.canvasHidden.height = ScreenManager.height;
  ScreenManager.canvasHidden.width  = ScreenManager.width;

  // content has loaded, display buttons and set up events
  ScreenManager.video.addEventListener('canplay', function () {
    console.log('canplay!');
  }, false);

  // display video duration when available
  ScreenManager.video.addEventListener('loadedmetadata', function () {
    var vLength = ScreenManager.video.duration.toFixed(1);
    console.log('Video Duration: ' + vLength);
  }, false);

  ScreenManager.video.addEventListener('play', function () {
    var cw = ScreenManager.width;
    var ch = ScreenManager.height;

    ScreenManager.canvas.width        = cw;
    ScreenManager.canvas.height       = ch;
    ScreenManager.canvasHidden.width  = cw;
    ScreenManager.canvasHidden.height = ch;
    ScreenManager.draw(ScreenManager.video, ScreenManager.canvasContent, ScreenManager.canvasHiddenContent, cw, ch);
  }, false);

  ScreenManager.video.addEventListener('progress', ScreenManager.updateProgress);

  ScreenManager.video.addEventListener('ended', function () {
    console.log('fin');
  }, false);

  ScreenManager.video.addEventListener('canplaythrough', function () {
    console.log('canplaythrough');
    ScreenManager.video.isReady = true;
  }, false);

  ScreenManager.video.addEventListener('seeked', function () { ScreenManager.video.play(); }, true);

  ScreenManager.video.addEventListener('error', function (error) {
    console.log(ScreenManager.video.error);
  }, true);

  document.addEventListener('DOMContentLoaded', function () {
    ScreenManager.loadSlideContent();
  }, false);
}

ScreenManager.draw = function (v, c, bc, w, h) {
  if (v.paused || v.ended) return false;
  // First, draw it into the backing canvas
  c.drawImage(v, 0, 0, w, h);
  c.drawImage(ScreenManager.watermark, 0, 0);
  // Start over!
  setTimeout(function () { ScreenManager.draw(v, c, bc, w, h); }, 0);
};

ScreenManager.updateProgress = function (oEvent) {
  if (oEvent.lengthComputable) {
    var percentComplete = oEvent.loaded / oEvent.total;
    console.log(percentComplete);
    // ...
  } else {
    // Unable to compute progress information since the total size is unknown
  }
};

ScreenManager.switchSlideContent = function () {
  ScreenManager.currentVideoIndex++;
  if (ScreenManager.currentVideoIndex >= ScreenManager.videos.length) {
    ScreenManager.currentVideoIndex = 0;
  }
  ScreenManager.loadSlideContent();
};

ScreenManager.loadSlideContent = function () {
  var req = new XMLHttpRequest();
  req.open('GET', ScreenManager.videos[ScreenManager.currentVideoIndex], true);
  req.responseType = 'blob';
  req.onload       = function () {
    // Onload is triggered even on 404
    // so we need to check the status code
    if (this.status === 200) {
      var videoBlob = this.response;
      var vid       = URL.createObjectURL(videoBlob); // IE10+
      // Video is now downloaded
      // and we can set it as source on the video element
      ScreenManager.video.src = vid;
    }
  };
  req.onerror      = function () {
    // Error
  };
  req.send();
};

window.ScreenManager = ScreenManager;
