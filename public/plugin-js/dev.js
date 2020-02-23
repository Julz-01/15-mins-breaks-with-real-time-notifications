$(document).ready(function(){

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var ckbox = $('.chkbox');
  $(ckbox).on('click',function () {
    if (ckbox.is(':checked')) {
      // alert('You have Checked it');
      $('#timepickerinput').val('');
      $('#timepickerinput').prop('disabled', true);


    } else {
      // alert('You Un-Checked it');
      $('#datepickerinput').prop('disabled', false);
      $('#timepickerinput').prop('disabled', false);
    }
  });


  $('.reqacc').on('click',function(){
    var id = $(this).data('ids');
    $.confirm({
      title: '',
      content: 'Are you sure you want to accept?',
      type: 'green',
      typeAnimated: true,
      buttons: {
        tryAgain: {
          text: 'Accept',
          btnClass: 'btn-green',
          action: function(){
            $.ajax({
              url:'/admin/leave/accept/'+id,
              type: 'PUT',
              success: function(res){
                console.log(res);
                $.alert({
                  title: '',
                  content: res.msg,
                });
                setInterval(function(){ location.reload(); }, 1500);
              }
            });
          }
        },
        close: function () {
        }
      }
    });
  });
  $('.reqdec').on('click',function(){
    var id = $(this).data('ids');
    $.confirm({
      title: '',
      content: '' +
      '<form action="" class="formName">' +
      '<div class="form-group">' +
      '<label>Decline Request</label>' +
      '<input type="text" placeholder="Put your reason here" class="name form-control" required />' +
      '</div>' +
      '</form>',
      buttons: {
        formSubmit: {
          text: 'Submit',
          btnClass: 'btn-red',
          action: function () {
            var name = this.$content.find('.name').val();
            if(!name){
              $.alert('provide a valid reason');
              return false;
            }
            $.ajax({
              url:'/admin/leave/decline/'+id,
              type: 'PUT',
              data: {note: name},
              success: function(res){
                console.log(res);
                $.alert({
                  title: '',
                  content: res.msg,
                });
                setInterval(function(){ location.reload(); }, 1500);
              }
            });
          }
        },
        cancel: function () {
          //close
        },
      }
    });
  });

  $('.delete_form').click(function(e){
  e.preventDefault();
    var id = $(this).data('ids');

    Swal.fire({
  title: 'Delete User?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#d33',
  cancelButtonColor: '#7e7e7e',
  confirmButtonText: 'Delete'
}).then((result) => {
  if (result.value) {
    $.ajax({

  url: 'destroy/'+id,
  type: 'GET',
  success:function() {
    console.log('success');
Swal.fire({
  position: 'center',
  type: 'success',
  title: 'deleted',
  showConfirmButton: false,
  timer: 1500
})
    setTimeout(function(){
           location.reload();
      }, 1000);
  },

  error:function(){

    }

});

  }
  })

});

  $('.update_form').click(function(){

var id = $(this).data('ids');
var name = $('.up_name'+ id).val();
var number = $('.number'+id).val();
var email = $('.up_email'+id).val();
var linkserve_skype = $('.skype'+id).val();
var tin = $('.tin'+id).val();
var sss = $('.sss'+id).val();
var philhealth = $('.philhealth'+id).val();
var hdmf = $('.hdmf'+id).val();
var birthdate= $('.b_day'+id).val();
var employment_date= $('.employment'+id).val();
var civil_status = $('.civil_status'+id).val();
var nationality = $('.nationality'+id).val();
var birthplace = $('.birth_place'+id).val();
var religion = $('.religion'+id).val();

$.ajax({

  url: '/update/'+ id,
  type: 'PUT',
  data: {
      'id' : id,
      up_name: name,
      number: number,
      skype: linkserve_skype,
      tin: tin,
      sss: sss,
      philhealth: philhealth,
      hdmf: hdmf,
      b_day: birthdate,
      employment: employment_date,
      civil_status: civil_status,
      nationality: nationality,
      birth_place: birthplace,
      religion: religion
      },

    success:function() {
    console.log('success');
Swal.fire({
  position: 'top',
  type: 'success',
  title: 'saved',
  showConfirmButton: false,
  timer: 1500
})
    setTimeout(function(){
           location.reload();
      }, 1000);
  },

  error:function(){

  }

});

});


$('.delete_admin').click(function(e){
  e.preventDefault();
    var id = $(this).data('ids');

    Swal.fire({
  title: 'Delete User?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#d33',
  cancelButtonColor: '#7e7e7e',
  confirmButtonText: 'Delete'
}).then((result) => {
  if (result.value) {
    $.ajax({

  url: 'admin_destroy/'+id,
  type: 'GET',
  success:function() {
    console.log('success');
Swal.fire({
  position: 'center',
  type: 'success',
  title: 'deleted',
  showConfirmButton: false,
  timer: 1500
})
    setTimeout(function(){
           location.reload();
      }, 1000);
  },

  error:function(){

    }

});

  }
  })

});
  $('#submit').click(function(){
$('.excel').tblToExcel();
});

$("#button-excel").click(function(){
  $(".table2excel").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "LinkServeSystem", //do not include extension
    fileext: ".xlxs", // file extension
    exclude_img: true,
 exclude_links: true,
 exclude_inputs: true
  });
});


});
