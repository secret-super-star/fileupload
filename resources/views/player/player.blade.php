<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/jwplayer.js')}}"></script>
    <!-- <script src="{{asset('js/jwpsrv.js')}}"></script> -->
    <!-- <script src="{{asset('js/jwplayer.core.controls.js')}}"></script> -->
    <!-- <script src="{{asset('js/related.js')}}"></script> -->
    <script type="text/javascript">jwplayer.key = "js7c9zo6THb2G8S7h1PIP5nOJ4aYu7bbm8flCJSaCNQ=";</script>
  </head>
  <body style="margin:0">
    <div id='player_preview'></div>
  </body>
  <script type="text/javascript">
    // $('#player_preview').html('<iframe style="position:relative" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="https://yadi.sk/i/RWp4szTtA7sPNQ" width="100%" height="100%" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>');
    jwplayer('player_preview').setup({
              sources: [
                  {file: '{{asset("video.mp4")}}',},
              ],
              type: 'video/mp4',
              width: '100%',
              height : '100vh',
              tracks: [],
              repeat: true,
              autostart: false,
              advertising: {
              }
          });

  </script>
</html>
