


<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $ptype = $_POST['prod_type'];
    $address = $_POST['address'];

    //Database coonection
    session_start();
    $conn = mysqli_connect('localhost','root','','e_waste');
    if($conn->connect_error)
    {
        die('connection Failed :'.$conn->connect_error);
    }
    else
    {
        $stmt = $conn->prepare("insert into pickup values (?,?,?,?,?,?)");
        $stmt->bind_param('ssssss',$fname,$lname,$email,$contact,$ptype,$address);
        $stmt->execute();
        echo "Registration Successfull..";
        header('Location: msg.html');
        
        $stmt->close();
        $conn->close(); 
    }


?>