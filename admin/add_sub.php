<?php
session_start();
include('../db.php');
// checking session is valid or not 
if (strlen($_SESSION['admin_logid'] == 0)) {
    header('location:logout.php');
} else {
    $_SESSION['msg'] ="";
    $admin_id = $_SESSION['admin_logid'];
    if(isset($_POST['submit'])){
        $cid = $_POST['cid'];
        $pid = $_POST['pid'];
        $pprice = $_POST['pprice'];
        $start_date = $_POST['start-date'];
        $end_date = $_POST['end-date'];
        
        // echo "$cid";
        // echo "$pid";
        // echo "$pprice";
        // echo "$start_date";
        // echo "$end_date";
        $sql3 = "SELECT sub_status FROM `client_sub_jms` WHERE client_id='$cid' AND admin_id='$admin_id'";
        $result3 = mysqli_query($con,$sql3);        
        if(mysqli_num_rows($result3)>0){
            $row = mysqli_fetch_array($result3);
            if($row['sub_status']=="Active"){
                $_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible show fade" >
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        Subsctiption Already Active! Please check the plan validity..!
                    </div>
                </div>';
                
            }elseif($row['sub_status']=="Not Active"){
                $_SESSION['msg'] = '<div class="alert alert-warning alert-dismissible show fade" >
                <div class="alert-body">
                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                    Subsctiption Already Added! Please check the start date..!
                </div>
            </div>';
            }else{
                $status = "";
                $today = new DateTime();
                $start = new DateTime($start_date);
                $days  = $start->diff($today)->format('%R%a');
                $end = new DateTime($end_date);
                $days1  = $end->diff($today)->format('%R%a');                
            
                if($days>0 || $days1<0){
                    $status = "Not Active";
                    $sql2 = "INSERT INTO `client_sub_jms`(`admin_id`, `client_id`, `sub_id`, `plan_id`, `start_date`, `end_date`, `sub_price`, `sub_status`) VALUES ('$admin_id','$cid','','$pid','$start_date','$end_date','$pprice','$status')";
                $result2 = mysqli_query($con,$sql2);
                if($result2){
                    $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible show fade" style="background-color:#0db10d;">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        Subsctiption Added Successfully!
                    </div>
                </div>';
                }else{
                    $_SESSION['msg'] = `<div class="alert alert-warning alert-dismissible show fade" >
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        Subscription doesn't add.
                    </div>
                </div>`;
                }
                }else{
                    $status = "Active";
                    $sql2 = "INSERT INTO `client_sub_jms`(`admin_id`, `client_id`, `sub_id`, `plan_id`, `start_date`, `end_date`, `sub_price`, `sub_status`) VALUES ('$admin_id','$cid','','$pid','$start_date','$end_date','$pprice','$status')";
                $result2 = mysqli_query($con,$sql2);
                if($result2){
                    $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible show fade" style="background-color:#0db10d;">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        Subsctiption Added Successfully!
                    </div>
                </div>';
                }else{
                    $_SESSION['msg'] = `<div class="alert alert-warning alert-dismissible show fade" >
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        Subscription doesn't add.
                    </div>
                </div>`;
                }
                }
            }
        }else{
            $status = "";
            $today = new DateTime();
            $start = new DateTime($start_date);
            $days  = $start->diff($today)->format('%a');
            $end = new DateTime($end_date);
            $days1  = $end->diff($today)->format('%a');
        
            if($days>0 || $days1<0){
                $status = "Not Active";
                $sql2 = "INSERT INTO `client_sub_jms`(`admin_id`, `client_id`, `sub_id`, `plan_id`, `start_date`, `end_date`, `sub_price`, `sub_status`) VALUES ('$admin_id','$cid','','$pid','$start_date','$end_date','$pprice','$status')";
            $result2 = mysqli_query($con,$sql2);
            if($result2){
                $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible show fade" style="background-color:#0db10d;">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                    Subsctiption Added Successfully!
                </div>
            </div>';
            }else{
                $_SESSION['msg'] = `<div class="alert alert-warning alert-dismissible show fade" style="background-color: #c8322d;">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                    Subscription doesn't add.
                </div>
            </div>`;
            }
            }else{
                $status = "Active";
                $sql2 = "INSERT INTO `client_sub_jms`(`admin_id`, `client_id`, `sub_id`, `plan_id`, `start_date`, `end_date`, `sub_price`, `sub_status`) VALUES ('$admin_id','$cid','','$pid','$start_date','$end_date','$pprice','$status')";
            $result2 = mysqli_query($con,$sql2);
            if($result2){
                $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible show fade" style="background-color:#0db10d;">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                    Subsctiption Added Successfully!
                </div>
            </div>';
            }else{
                $_SESSION['msg'] = `<div class="alert alert-warning alert-dismissible show fade" style="background-color: #c8322d;">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                    Subscription doesn't add.
                </div>
            </div>`;
            }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<!-- //Jewellary Management system powered by JMS -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Clients &mdash;
        <?php echo $_SESSION['admin_name']; ?>
    </title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS Libraries -->


    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/components.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="layout-4">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Call to top navbar -->
            <?php include 'partials/top-navbar.php'; ?>

            <!-- Call to main left sidebar menu -->
            <?php include 'partials/left-sidebar.php'; ?>

            <!-- Start app main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Clients</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item">Add Subscription</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">Add Subscription to client</h2>
                        <p class="section-lead">
                            To add a Subscription set the plan name.
                        </p>

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Add Subscription</h4>
                                    </div>

                                    <div class="card-body">
                                        <?php echo $_SESSION['msg']; ?>
                                        <form action="" method="post">
                                            <div class="row">

                                                <div class="form-group col-4">
                                                    <label>Client Name:</label>
                                                    <!-- <input type="text" class="form-control" name="cname"> -->
                                                    <select class="custom-select" id="cname"
                                                        name="cid">
                                                        <option>Select Client</option>
                                                        <?php
$sql = "SELECT * FROM `client_jms` WHERE admin_id='$admin_id'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
        ?>
                                                        <option value="<?php echo $row['client_id']; ?>">
                                                            <?php echo $row['client_name']; ?>
                                                        </option>
                                                        <?php
    }
}
                                                    ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-4">
                                                    <label>Client Mobile:</label>
                                                    <input type="tel" class="form-control" name="cmobile" id="cmobile">
                                                </div>

                                                <div class="form-group col-4">
                                                    <label>Contac Person:</label>
                                                    <input type="text" class="form-control" name="cperson" id="cperson">
                                                </div>

                                                <div class="form-group col-4">
                                                    <label>Plan Name:</label>
                                                    <!-- <input type="text" class="form-control" name="pname"> -->
                                                    <select class="custom-select" id="pname"
                                                        name="pid">
                                                        <option>Select Plan</option>
                                                        <?php
$sql1 = "SELECT * FROM `plan_jms` WHERE admin_id='$admin_id'";
$result1 = mysqli_query($con,$sql1);
if(mysqli_num_rows($result1)>0){
    while($row1 = mysqli_fetch_array($result1)){
        ?>
                                                        <option value="<?php echo $row1['plan_id']; ?>">
                                                            <?php echo $row1['plan_name']; ?>
                                                        </option>
                                                        <?php
    }
}
                                                    ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-4">
                                                    <label>Plan Duration:</label>
                                                    <input type="number" class="form-control" name="pdays" id="pdays">
                                                </div>

                                                <div class="form-group col-4">
                                                    <label>Plan Price:</label>
                                                    <input type="number" class="form-control" name="pprice" id="pprice">
                                                </div>

                                                <div class="form-group col-6">
                                                    <label>Start Date:</label>
                                                    <input type="date" class="form-control" name="start-date" id="start-date">
                                                </div>

                                                <div class="form-group col-6">
                                                    <label>End Date:</label>
                                                    <input type="date" class="form-control" name="end-date" id="end-date">
                                                </div>

                                            </div>

                                            <button class="btn btn-primary col-12" type="submit" name="submit">Save</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </section>
            </div>



            <!-- Call to footer part -->
            <?php include 'partials/footer.php'; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            console.log("READY");
            $('#cname').on('change',function() {
                console.log($('#cname').val());
                var cname = $('#cname').val();
                $.ajax({
                    url : 'getclient.php',
                    data : {client_id : cname},
                    type : 'POST',
                    dataType : 'JSON',
                    success : function (response){
                        var len = response.length;
                        console.log(response);
                        for(let i = 0; i < len; i++){
                            $('#cmobile').val(response[i].client_contact);
                            $('#cperson').val(response[i].contact_person);
                        }
                        // $('#cmobile').val('8596996540');
                    }
                })
            });
            $('#pname').on('change',function() {
                var pname = $('#pname').val();
                $.ajax({
                    url : 'getplan.php',
                    data : {plan_id:pname},
                    type : 'POST',
                    dataType : 'JSON',
                    success : function (response){
                        var len = response.length;
                        console.log(response);
                        for(let i = 0; i < len; i++){
                            $('#pdays').val(response[i].plan_duration);
                            $('#pprice').val(response[i].plan_price);
                        }
                        // $('#cmobile').val('8596996540');
                    }
                })
            });
            $('#start-date').on('change',function(){
                var stdate = new Date($('#start-date').val());
                var days = $('#pdays').val();
                var date = Number(days);
                // var month = Number(days)/30;

                // stdate.setMonth(stdate.getMonth()+month);
                stdate.setDate(stdate.getDate()+date);
                var endate = (stdate.getFullYear()+"-"+(stdate.getMonth()+1)+"-"+(stdate.getDate()));
                var endt = moment(new Date(endate)).format('YYYY-MM-DD');
                console.log(endt);
                $('#end-date').val(endt);
            });

        });
    </script>

    <!-- General JS Scripts -->
    <script src="assets/bundles/lib.vendor.bundle.js"></script>
    <script src="js/jms.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
</body>

<!-- Copyright © 2022 Jewellary Management Sysytem. All Right Reserved -->

</html>
<?php
}
?>