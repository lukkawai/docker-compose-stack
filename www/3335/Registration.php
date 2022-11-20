<html>
  <head>
  <script type="text/javascript">
  (function(e,r,n,t,s){var a=[];e[s]=function(){a.push(arguments)};e[s].queue=a;  var o=[];var i=[];var c=true;var p=void 0;if(window.PerformanceObserver&&  window.PerformanceObserver.supportedEntryTypes&&(  PerformanceObserver.supportedEntryTypes.indexOf("longtask")>=0||  PerformanceObserver.supportedEntryTypes.indexOf("element")>=0)){  p=new PerformanceObserver(function(e){e.getEntries().forEach(function(e){  switch(e.entryType){case"element":i.push(e);break;case"longtask":o.push(e);break;  default:break}})});p.observe({entryTypes:["longtask","element"]})}e[s+"lt"]={  longTasks:o,timingElements:i,inPageLoad:c,observer:p};if(t){var u=r.createElement(n);  u.async=1;u.src=t;var f=r.getElementsByTagName(n)[0];f.parentNode.insertBefore(u,f)}})
  (window,document,"script","//cdn.sematext.com/experience.js","strum");
</script>

<script type="text/javascript">
  strum('config', { token: 'b3e68940-6777-408d-9905-96abb4c6168e', 'receiverUrl': 'https://rum-receiver.sematext.com/' });
</script>
</head>
<?php
$conn=mysqli_connect("172.17.0.1","root","test","TSS");
  if ($_SERVER["REQUEST_METHOD"]=="POST" ){

        $uname = $_POST["uname"];
        $psw = hash('sha256',$_POST["psw"]);
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $ccn = hash('sha256',$_POST["ccn"]);
        #$duplicate_u = mysqli_query($conn, "SELECT * FROM TSS.Customer WHERE Username = '$uname'");
        $dup_u=$conn->prepare("SELECT Username FROM TSS.Customer WHERE Username = ?");
        $dup_e=$conn->prepare("SELECT Email FROM TSS.Customer WHERE Email=?");
        $dup_u->bind_param('s',$uname);
        $dup_u->execute();
        $dup_u->store_result();
        $dup_e->bind_param('s',$email);
        $dup_e->execute();
        $dup_e->store_result();
        $row_u= $dup_u->fetch();
        $row_e= $dup_e->fetch();
        #$duplicate_e = mysqli_query($conn, "SELECT * FROM TSS.Customer WHERE Username = '$email'");
        if($row_u > 0 || $row_e> 0){
          echo
            "<script> alert('Username or Email Have Been Used'); 
            window.location.href='login.php';</script>";
            

        }

        else{
          $query = "INSERT INTO TSS.Customer VALUES( NULL ,'$uname', '$psw', '$firstname', '$lastname', '$email', '$ccn')";
          mysqli_query($conn, $query);
          echo
            "<script> alert('Registration Successful, please login.'); 
            window.location.href='login.php';</script>";
        }

      }else{  
      header( "refresh:1;url=login.php" );
            exit();
          }
            
      ?>
</html>