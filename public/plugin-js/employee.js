$(document).ready(function(){
    var base_url = "";
    var base_url = "http://linkserve.local/";
    //var base_url = "http://localhost:8080/hrs/public/index.php/";

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('.edit_emp').on('click',function(){
        var id = $(this).data('ids');
        console.log(id);
        $.ajax({
            type: "GET",
            url: base_url+'/admin/display/'+id,
            success: function(response) {
                console.log(response);
                $('.name').attr('value', response.name);
                $('.mobile').attr('value', response.mobile);
                $('.email').attr('value', response.email);

                // Department Dropdown
                if(response.department=='Administration'){
                    var html = '';
                    html+= '<select class="form-control dept_change" name="department" id="department_change">';
                    html+= '<option value="Administration" selected>Administration</option>';
                    html+= '<option value="Business Development">Business Development</option>';
                    html+= '<option value="Technology">Technology</option>';
                    html+= '</select>';
                }
                else if(response.department=='Business Development'){
                    var html = '';
                    html+= '<select class="form-control dept_change" name="department" id="department_change">';
                    html+= '<option value="Administration">Administration</option>';
                    html+= '<option value="Business Development" selected>Business Development</option>';
                    html+= '<option value="Technology">Technology</option>';
                    html+= '</select>';

                    if(response.role=='Marketing'){
                        var html2 = '';
                        html2+= '<select class="form-control" name="role">';
                        html2+= '<option value="Marketing" selected>Marketing</option>';
                        html2+= '<option value="General Education">General Education</option>';
                        html2+= '<option value="Maritime">Maritime</option>';
                        html2+= '</select>';
                    }

                    else if(response.role=='General Education'){
                        var html2 = '';
                        html2+= '<select class="form-control" name="role">';
                        html2+= '<option value="Marketing">Marketing</option>';
                        html2+= '<option value="General Education" selected>General Education</option>';
                        html2+= '<option value="Maritime">Maritime</option>';
                        html2+= '</select>';
                    }

                    else {
                        var html2 = '';
                        html2+= '<select class="form-control" name="role">';
                        html2+= '<option value="Marketing">Marketing</option>';
                        html2+= '<option value="General Education">General Education</option>';
                        html2+= '<option value="Maritime" selected>Maritime</option>';
                        html2+= '</select>';
                    }
                }
                else if(response.department=='Technology'){
                    var html = '';
                    html+= '<select class="form-control dept_change" name="department" id="department_change">';
                    html+= '<option value="Administration">Administration</option>';
                    html+= '<option value="Business Development">Business Development</option>';
                    html+= '<option value="Technology" selected>Technology</option>';
                    html+= '</select>';

                    if(response.role=='VR Department'){
                        var html2 = '';
                        html2+= '<select class="form-control" name="role">';
                        html2+= '<option value="VR Department" selected>VR Department</option>';
                        html2+= '<option value="IT Department">IT Department</option>';
                        html2+= '</select>';
                    }

                    else {
                        var html2 = '';
                        html2+= '<select class="form-control" name="role">';
                        html2+= '<option value="VR Department">VR Department</option>';
                        html2+= '<option value="IT Department" selected>IT Department</option>';
                        html2+= '</select>';
                    }
                }
                $('#department').empty().append(html);
                $('#role').empty().append(html2);

                $('#department_change').on('change',function(){

                    var selected = $(this).children("option:selected").val();

                    if(selected == 'Business Development'){
                      $('.label-sub').show();
                      var html3 = '';
                      html3 += '<select class="form-control" name="role" required>';
                      html3 += '<option value="">Select Sub Department</option>';
                      html3 += '<option value="Marketing">Marketing</option>';
                      html3 += '<option value="General Education">General Education</option>';
                      html3 += '<option value="Maritime">Maritime</option>';
                      html3 += '</select>';
                    }else if(selected == 'Technology'){
                      $('.label-sub').show();
                      var html3 = '';
                      html3 += '<select class="form-control" name="role" required>';
                      html3 += '<option value="">Select Sub Department</option>';
                      html3 += '<option value="VR Development">VR Development</option>';
                      html3 += '<option value="IT Development">IT Development</option>';
                      html3 += '</select>';
                    }
                    $('#role').empty().append(html3);
                });

                // Employee Credentials Display

                if(response.employeetype=='Employee'){
                    var html4 = '';
                    html4 += '<select class="form-control" name="type" id="emp_type" required>';
                    html4 += '<option value="Employee" selected>Employee</option>';
                    html4 += '<option value="Intern">Intern</option>';
                    html4 += '</select>';

                    var html7 = '';
                    html7 += '<div class="col-sm-6"><div class="form-group"><label class="control-label">Salary</label>';
                    html7 += '<input type="text" class="form-control" name="salary" value="'+response.salary+'"/>';
                }

                else{
                    var html4 = '';
                    html4 += '<select class="form-control" name="type" id="emp_type" required>';
                    html4 += '<option value="Employee">Employee</option>';
                    html4 += '<option value="Intern" selected>Intern</option>';
                    html4 += '</select>';

                    var html7 = '';
                }

                $('#type').empty().append(html4);
                $('#salary').empty().append(html7);

                if(response.employeetype=='Employee'){
                    var html5 = '';
                    html5+= '<div class="col-sm-6"><div class="form-group"><label class="control-label">TIN Number</label><input type="text" class="form-control tin" name="tin"/></div></div>';
                    html5+= '<div class="col-sm-6"><div class="form-group"><label class="control-label">SSS Number</label><input type="text" class="form-control sss" name="sss"/></div></div>';
                    html5+= '<div class="col-sm-6"><div class="form-group"><label class="control-label">Philhealth</label><input type="text" class="form-control philhealth" name="philhealth"/></div></div>';
                    html5+= '<div class="col-sm-6"><div class="form-group"><label class="control-label">Pag-Ibig</label><input type="text" class="form-control pagibig" name="pagibig"/></div></div>';

                    var deduction = '';
                    deduction+= '<div class="col-sm-6"><div class="form-group"><label class="control-label">SSS</label><input type="number" step="0.01" class="form-control sssdeduc" name="sssdeduc"/></div></div>';
                    deduction+= '<div class="col-sm-6"><div class="form-group"><label class="control-label">Philhealth</label><input type="number" step="0.01" class="form-control philhealthdeduc" name="philhealthdeduc"/></div></div>';
                    deduction+= '<div class="col-sm-6"><div class="form-group"><label class="control-label">Pag-Ibig</label><input type="number" step="0.01" class="form-control pagibigdeduc" name="pagibigdeduc"/></div></div>';
                }

                $('#deductions').empty().append(deduction);

                $('.sssdeduc').attr('value', response.sssdeduction);
                $('.philhealthdeduc').attr('value', response.philhealthdeduction);
                $('.pagibigdeduc').attr('value', response.pagibigdeduction);


                $('#credentials').empty().append(html5);

                $('.tin').attr('value', response.tin);
                $('.sss').attr('value', response.sss);
                $('.philhealth').attr('value', response.philhealth);
                $('.pagibig').attr('value', response.pagibig);

                $('#emp_type').on('change',function(){

                    var selected = $(this).children("option:selected").val();

                    if(selected == 'Employee'){
                        var html6 = '';
                        html6+= '<div class="col-sm-6"><div class="form-group"><label class="control-label">TIN Number</label><input type="text" class="form-control tin" name="tin"/></div></div>';
                        html6+= '<div class="col-sm-6"><div class="form-group"><label class="control-label">SSS Number</label><input type="text" class="form-control sss" name="sss"/></div></div>';
                        html6+= '<div class="col-sm-6"><div class="form-group"><label class="control-label">Philhealth</label><input type="text" class="form-control philhealth" name="philhealth"/></div></div>';
                        html6+= '<div class="col-sm-6"><div class="form-group"><label class="control-label">Pag-Ibig</label><input type="text" class="form-control pagibig" name="pagibig"/></div></div>';

                        var deduc = '';
                        deduc+= '<div class="col-sm-6"><div class="form-group"><label class="control-label">SSS</label><input type="number" class="form-control sssdeduc" name="sssdeduc"/></div></div>';
                        deduc+= '<div class="col-sm-6"><div class="form-group"><label class="control-label">Philhealth</label><input type="number" class="form-control philhealthdeduc" name="philhealthdeduc"/></div></div>';
                        deduc+= '<div class="col-sm-6"><div class="form-group"><label class="control-label">Pag-Ibig</label><input type="text" class="form-control pagibigdeduc" name="pagibigdeduc"/></div></div>';
                    }

                    $('#deductions').empty().append(deduc);

                    $('.sssdeduc').attr('value', response.sssdeduction);
                    $('.philhealthdeduc').attr('value', response.philhealthdeduction);
                    $('.pagibigdeduc').attr('value', response.pagibigdeduction);

                    $('#credentials').empty().append(html6);

                    $('.tin').attr('value', response.tin);
                    $('.sss').attr('value', response.sss);
                    $('.philhealth').attr('value', response.philhealth);
                    $('.pagibig').attr('value', response.pagibig);
                });
            },
        });

        $(".edit-form").attr("action",base_url+"/admin/update/"+id);
    });

    $('.return').on('click',function(){
        var id = $(this).data('ids');

        console.log(id);
        $.ajax({
            type: "GET",
            url: base_url+'/admin/display/item/'+id,
            success: function(response) {
                $('#hardware').attr('value', response.name);
                $('#hid').attr('value', response.id);
            }
        });

    });
});
