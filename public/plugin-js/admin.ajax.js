
$('#refresh').ready(function(){
  $.ajax({
        type: "GET",
        url: 'http://linkserve.local/admin/home',

        success: function(data) {
            console.log(data);
            setInterval(function(){ location.reload(); }, 10000);
        },
        error: function(data) {
            console.log(data);
        }
    });
  });
