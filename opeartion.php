 <?php
$serverAddress = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ajaxcrud';
$con = new mysqli($serverAddress, $username, $password, $dbname);

if (isset($_POST['readrecord'])) {
    $data = '<table class="table table-bordered table-primary table-striped">
           <tr>
              <th>#</th>
              <th>Image</th>
              <th>Name</th>
              <th>Class</th>
              <th>Email</th>
              <th>Edit</th>
              <th>DELETE</th>
           </tr>';
    $displaysql = " SELECT * FROM `student`";
    $result = mysqli_query($con, $displaysql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data .= '
                    <tr>
                    <th scope="row">' . $row['id'] . '</th>
                      <td><img class="product-img" src="images/' . $row['image'] . '" alt=""></td>    
                      <td>' . $row['name'] . '</td>
                      <td>' . $row['class'] . '</td>
                      <td>' . $row['email'] . '</td>
                      <td> 
                             <button onclick="GetUserDetails(' . $row['id'] . ')" class="btn btn-primary">
                                Edit Details
                           </button>
                      </td>
                      <td> 
                      <button onclick="Deleteuser( ' . $row['id'] . ' )" class="btn btn-danger">
                           Delete
                      </button>
                </td>
                    
                      </tr>';

        }
        $data .= '</table>';
        echo $data;
    }

}
// for running delete query

if (isset($_POST['deleteid'])) {

    $userid = $_POST['deleteid'];
    $deletsql = "DELETE FROM `student` WHERE id='$userid' ";
    mysqli_query($con, $deletsql);
}

// getting user perivious details and showing in blanks
if (isset($_POST['id']) && $_POST['id'] != "") {
    $user_id = $_POST['id'];
    $pquery = "SELECT * FROM student WHERE id = '$user_id'";

    if (!$result = mysqli_query($con, $pquery)) {
        exit(mysqli_error($con));
    }
    $response = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $response = $row;
        }

    } else {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }

    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
// for updating all data

if (isset($_POST['hidden_user_id'])) {

    $hidden_user_id = $_POST['hidden_user_id'];
    $name = $_POST['firstname'];
    $class = $_POST['classno'];
    $email = $_POST['email'];

    $update_query = "    UPDATE `student` SET `name`='$name',`class`='$class',`email`='$email' WHERE id='$hidden_user_id' ";
    mysqli_query($con, $update_query);

}




?>