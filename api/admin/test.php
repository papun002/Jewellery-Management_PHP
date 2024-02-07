<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
      <script>
         const date1 = new Date();
         const date2 = new Date('06/10/2022');        
         var daydiff = date2.getDate() - date1.getDate();
         console.log(daydiff + " days");
      </script>

      <?php
$start_date = '15-06-2022';
$end_date = '15-07-2022';

       $today = new DateTime();
       $start = new DateTime($start_date);
       $days  = $start->diff($today)->format('%a');
       $end = new DateTime($end_date);
       $days1  = $end->diff($today)->format('%a');
       echo "Start after ".$days." Days <br>";
       echo "End after ".$days1." Days <br>";

       if($days>0 || $days1<0){
            $status = "Not Active";
            echo $status;
       }else{
            $status = "Active";
            echo $status;
       }

      ?>
</body>
</html>