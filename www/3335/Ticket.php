<?php
ob_start(); ?>
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
    $show = $_POST["show"];
    $theater = $_POST["theater"];
    $seat = $_POST["seat"];
    $customer_tss = mysqli_query($conn, "SELECT Customer_ID FROM TSS.Customer WHERE Username ='$uname'");
    #open array for storing the mysql result
    $titles = array();
    #using while to store the result, one row presents one record
    while($row =mysqli_fetch_array($customer_tss)){
        #to obtain customer_id
        $titles[]=$row[0];
    }#convert array into a string
    $titlestring = implode(",",$titles);
        if($show == 1) {
            $price = 150;
        }
        elseif ($show == 2) {
            $price = 120;
        }
        else {
            $price = 100;
        }
    
        $customer_id = (int)$titlestring;
        $query = mysqli_query($conn, "INSERT INTO TSS.Ticket VALUES(Null, '$price', '$theater', '$show', '$seat', '$customer_id')");
        
        ob_end_clean();
        echo
        "<script> alert('Buying Successful'); </script>";
        
        

      } else{  
      echo "<h1> Failed to buy. Please try again.</h1>";
      header( "refresh:1;url=login.php" );
            exit();}
            
      ?>Click  <a href ="login.php"> here</a> to return login page
</html>