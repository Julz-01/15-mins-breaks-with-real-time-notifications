
$('#result').ready(function(){
  $.ajax({
        type: "GET",
        url: 'http://linkserve.local/home',

        success: function(data) {
            console.log(data);
            setInterval(function(){ location.reload(); }, 15000);
        },
        error: function(data) {
            console.log(data);
        }
    });
  });
