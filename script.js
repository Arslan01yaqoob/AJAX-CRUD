
$(document).ready(function () {
    readRecords();
});
function readRecords() {
    var readrecord = "readrecord";
    $.ajax({

        url: "opeartion.php",
        type: "post",
        data: { readrecord: readrecord },
        success: function (data, status) {
            $('#records_contant').html(data);
        }
    })
}
function addrecord() {

    var studentname = $('#name').val();
    var studentclass = $('#class').val();
    var studentemail = $('#email').val();
    var studentimage = $('#image').val();

    $.ajax({
        url: "index.php",
        type: 'post',
        data: {

            studentname: studentname,
            studentclass: studentclass,
            studentemail: studentemail,
            studentimage: studentimage
        },
        success: function (data, status) {

            readRecords();

        }
    })
}
// for deleting entry
function Deleteuser(deleteid) {
    var conf = confirm("Are you sure");
    if (conf == true) {
        $.ajax({
            url: "opeartion.php",
            type: "post",
            data: { deleteid: deleteid },
            success: function (data, status) {
                readRecords();
            }
        })
    }
}
// for getting data

function GetUserDetails(id) {
    $('#hidden_User_id').val(id);

    $.post("opeartion.php", {
        id: id
    }, function (data, status) {

        var user = JSON.parse(data);
        $('#update_name').val(user.name);
        $('#update_class').val(user.class);
        $('#update_email').val(user.email);
    }
    );
    $('#update_user_modal').modal("show");

}

function updateuserdetail() {
    var firstname = $('#update_name').val();
    var classno = $('#update_class').val();
    var email = $('#update_email').val();

    var hidden_user_id = $('#hidden_User_id').val();

    $.post("opeartion.php", {

        hidden_user_id: hidden_user_id,
        firstname: firstname,
        classno: classno,
        email: email,
    },

        function (data, status) {
            $('#update_user_modal').modal("hide");
            readRecords();

        }

    )


}