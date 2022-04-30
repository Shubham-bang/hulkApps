$(function() {
   
    $("body").on("focus", ".date-picker-no-past-dates", function() {
        var value = $(this).val();

        $(this).flatpickr({
            dateFormat: "Y-m-d",
            minDate: "today"
        });
    });

});

$(document).on('click', '.pending', function() {

        var status_id = $(this).val();
        swal({
            title: "Make Sure!!!",
            text: "Do you want to change Leave status ?",
            icon: "success",
            closeOnClickOutside: false,
            CancelButtonColor: '#d33',
          buttons: {
            cancel: "Cancel",
            catch: {
              text: "Approve",
              value: "catch",
              icon: "danger",
            },
            defeat: "Not Approve",
          },
        }).then((value) => {
              switch (value) {
             
                case "defeat":
                var data = {
                    status_id: status_id,
                };
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.post(window.location.origin + "/decline_leave_request", data, function(res) {
                    if (res.success) {
                        var suss_msg = res.data;
                        swal("Leave Request Decline Successfully", {
                            icon: "success",
                            confirmButtonColor: '#d33',
                            buttons: 'Okay',
                            dangerMode: true,
                        }).then(function(isConfirm) {
                            if (isConfirm) {
                                location.reload();
                            }
                        });
                    }
                });
                break;
             
                case "catch":
                var data = {
                    status_id: status_id,

                };
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.post(window.location.origin + "/accept_leave_request", data, function(res) {
                    if (res.success) {
                        var suss_msg = res.data;
                        swal("Leave Request Approved Successfully", {
                            icon: "success",
                            confirmButtonColor: '#d33',
                            buttons: 'Okay',
                            dangerMode: true,
                        }).then(function(isConfirm) {
                            if (isConfirm) {
                                location.reload();
                            }
                        });
                    }
                });
                  break;
             
                default:
                  swal("Leave Request is on Pending");
              }
            });
    });

$(document).on("click", ".approved", function() {
    var status_id = $(this).val();
      swal({
         title: "Are you sure?",
         icon: "success",
         buttons: true,
         dangerMode: true,
      })
      .then((willDelete) => {
         if (willDelete) {
            var data = {
                    status_id: status_id,

                };
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.post(window.location.origin + "/accept_leave_request", data, function(res) {
                    if (res.success) {
                        var suss_msg = res.data;
                        swal("Leave Approved Successfully", {
                            icon: "success",
                            confirmButtonColor: '#d33',
                            buttons: 'Okay',
                            dangerMode: true,
                        }).then(function(isConfirm) {
                            if (isConfirm) {
                                location.reload();
                            }
                        });
                    }
                });
             
         } 
      });

      });

 $("document").ready(function(){
    setTimeout(function(){
       $(".alert-danger").remove();
    }, 10000 ); // 5 secs

});

 $(document).ready(function() {
    $('#example').DataTable();
} );


// $(function() {
  
//     var start_date  = $('#start_date').val();
//     var end_date    = $('#end_date').val();
//     if (start_date == '') 
//     {
//       swal("Please Select Start-date first", {
//           icon: "warning",
//         });
//       $('#end_date').val('');
//     }
//     else{
//         if (end_date < start_date)
//         {
//             if (end_date != null)
//             {
                
//                 $('#end_date').val('');
//                 //$("#class_duartion").val('');
//                 swal("end time should be greater than start time", {
//                     icon: "warning",
//                   });
//             }
//         }  
//     } 
// });