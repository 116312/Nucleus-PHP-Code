$(document).ready(function () {
    $('.count-to').countTo();
    // autosize($('textarea.auto-growth'));

    $('#all-user-datatable').DataTable({
        "bPaginate": true,
        "processing": true,
        "bServerSide": true,
        dom: 'Blfrtip',
        aoColumnDefs: [
            // { "sClass":"retailer_table","aTargets": [ 1 ] },
            // { "sClass":"cheque_num_table","aTargets": [ 2 ] },
            // { "sClass":"cheque_amt_table","aTargets": [ 5 ] }
        ],
        "lengthMenu": [[100, 200, 500], [100, 200, 500]],
        "ajax":{
            "url": APP_URL+"/admin/users-server-side",
            "dataType": "json",
            "type": "POST",
            "data":{ _token: token}
        },
        "columns": [
            { "data": null },
            { "data": "name" },
            { "data": "phone_no" },
            { "data": "email" },
            { "data": "city" },
            { "data": "exam_preparing" },
            { "data": "course" },
            { "data": "created_at" },
        ],
        "fnRowCallback": function (nRow, aData, iDisplayIndex) {
            $("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
            return nRow;
        }


    });

    $('#un-subscribed-user-table').DataTable({
        "bPaginate": true,
        "processing": true,
        "bServerSide": true,
        dom: 'Blfrtip',
        aoColumnDefs: [
            // { "sClass":"retailer_table","aTargets": [ 1 ] },
            // { "sClass":"cheque_num_table","aTargets": [ 2 ] },
            // { "sClass":"cheque_amt_table","aTargets": [ 5 ] }
        ],
        "lengthMenu": [[100, 200, 500], [100, 200, 500]],
        "ajax":{
            "url": APP_URL+"/admin/un-subscribed-users-server-side",
            "dataType": "json",
            "type": "POST",
            "data":{ _token: token}
        },
        "columns": [
            { "data": null },
            { "data": "name" },
            { "data": "phone_no" },
            { "data": "email" },
            { "data": "city" },
            { "data": "exam_preparing" },
            { "data": "course" },
            { "data": "created_at" },
            { "data": 'action'},
        ],
        "fnRowCallback": function (nRow, aData, iDisplayIndex) {
            $("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
            return nRow;
        }


    });

    $('#subscribed-user-table').DataTable({
        "bPaginate": true,
        "processing": true,
        "bServerSide": true,
        dom: 'Blfrtip',
        aoColumnDefs: [
            {  bSortable: false,
                aTargets: [ 0,8 ]
            },
        ],
        aaSorting: [[4, 'asc']],
        "lengthMenu": [[100, 200, 500], [100, 200, 500]],
        "ajax":{
            "url": APP_URL+"/admin/subscribed-users-server-side",
            "dataType": "json",
            "type": "POST",
            "data":{ _token: token}
        },
        "columns": [
            { "data": null },
            { "data": "name" },
            { "data": "phone_no" },
            { "data": "email" },
            { "data": "plan_name" },
            { "data": "plan_price" },
            { "data": "plan_duration" },
            { "data": "end_time" },
            { "data": 'action'},
        ],
        "fnRowCallback": function (nRow, aData, iDisplayIndex) {
            $("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
            return nRow;
        }


    });


    $(document).on('click' ,'.un_subscribed_user',function () {
        var user_id = $(this).attr('data-user-id');

        swal({
                title: "Are you sure?",
                text: "You want to Un-subscribe this user",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, change it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: true,
                showLoaderOnConfirm: true,
            },
            function(){
                console.log(token)
                console.log(user_id)
                $.ajax({
                    type: "GET",
                    url: APP_URL + '/admin/un-subscribed-user-manual/'+ user_id ,
                    // data:{id:user_id},
                    dataType: 'json',
                    success: function (data){
                        if(data.status == true) {
                            window.location.href = APP_URL + '/admin/subscribed-users';
                        }
                        else{
                            swal("Cancelled",data.message , "error");
                        }
                    }
                });

            });

    })




    $('.subscribe-user').click(function () {
        var user_id = $(this).attr('data-user-id');
        var user_name = $(this).attr('data-user-name');
        var user_email = $(this).attr('data-user-email');
        var user_mobile = $(this).attr('data-user-mobile');
        $('#user_id').val(user_id);
        $('#user_name').val(user_name);
        $('#user_email').val(user_email);
        $('#user_mobile').val(user_mobile);
        $('#subscrib_user_modal').modal('show');
    })

    //Datetimepicker plugin
    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        clearButton: true,
        weekStart: 1
    });

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
    });

    $('.timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    });

    $('.js-basic-example').DataTable({
        responsive: true
    });
    if(status == 100){
        $.notify({
                message: message,

            },
            {
                allow_dismiss: true,
                type:type,
                newest_on_top: true,
                timer: 1000,
                placement:{
                    from: 'top',
                    align: 'right'
                },
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                }
            });
    };

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg != value;
    }, "Value must not equal arg.");

    $('#form_validation').validate({
        rules: {
            'checkbox': {
                required: true
            },
            'gender': {
                required: true
            }

        },
        rules: {
            category_name: { valueNotEquals: "default" },
            category_id: { valueNotEquals: "default" },
        },
        messages: {
            category_name: { valueNotEquals: "Please select an item!" },
            category_id: { valueNotEquals: "Please select an item!" },
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });

    $(document).on('change','#category_change',function () {
        var cat = $('#category_change option:selected').val()
        $('#sub_category').empty();
        $('#sub_category').selectpicker('refresh');
        if(cat == 'default'){
            var tempoption = "<option value='default'>Please select </option>";
            $('#sub_category').append(tempoption);
            $('#sub_category').selectpicker('refresh');
        }
        else{
            $.ajax({
                type: "GET",
                url: APP_URL + '/admin/video/get-subcategory/' + cat,
                dataType: 'json',
                data: cat,
                success: function (response) {
                    var tempoption = "<option value='default'>Please select </option>";
                    var selector = $('#sub_category');
                    $('#sub_category').append(tempoption);
                    $.each(response,function (index,value) {
                        var option = "<option value='"+value.id+"'>"+value.sub_category_name+"</option>";
                        selector.append(option);
                    });
                    $('#sub_category').selectpicker('refresh');
                }
            });
        }
    });

    // $(document).on('change','.change_to_required',function () {
    //     var value = $(this).val();
    //     if(value == ''){
    //         console.log('empty');
    //         $(this).prop('required',true);
    //     }
    //     else{
    //         console.log('not-empty');
    //         $(this).prop('required',false);
    //     }
    // })

});