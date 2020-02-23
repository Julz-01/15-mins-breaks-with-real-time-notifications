
var clock = $('.clock').FlipClock({
  clockFace: 'MinuteCounter',
  countdown: false,
  autoStart: false,
  callbacks: {
    stop: function() {

    }
  }
});

    if ($('button.on'))
        {
          clock = $('.clock1').FlipClock({
                clockFace: 'MinuteCounter',
                countdown: false,
                autoStart: true,
                callbacks: {
                  stop: function() {

                  }
                }
            });
              
        } else {
  console.log('error');
        }
