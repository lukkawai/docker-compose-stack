<?php ob_start();?>
<html>
  <head><script type="text/javascript">
  (function(e,r,n,t,s){var a=[];e[s]=function(){a.push(arguments)};e[s].queue=a;  var o=[];var i=[];var c=true;var p=void 0;if(window.PerformanceObserver&&  window.PerformanceObserver.supportedEntryTypes&&(  PerformanceObserver.supportedEntryTypes.indexOf("longtask")>=0||  PerformanceObserver.supportedEntryTypes.indexOf("element")>=0)){  p=new PerformanceObserver(function(e){e.getEntries().forEach(function(e){  switch(e.entryType){case"element":i.push(e);break;case"longtask":o.push(e);break;  default:break}})});p.observe({entryTypes:["longtask","element"]})}e[s+"lt"]={  longTasks:o,timingElements:i,inPageLoad:c,observer:p};if(t){var u=r.createElement(n);  u.async=1;u.src=t;var f=r.getElementsByTagName(n)[0];f.parentNode.insertBefore(u,f)}})
  (window,document,"script","//cdn.sematext.com/experience.js","strum");
</script>
<script type="text/javascript">
  strum('config', { token: 'b3e68940-6777-408d-9905-96abb4c6168e', 'receiverUrl': 'https://rum-receiver.sematext.com/' });
</script>

</head>
<?php
$conn=mysqli_connect("172.17.0.1","root","test","TSS");
  if ($_SERVER["REQUEST_METHOD"]=="POST" )
      {
       
          $uname = $_POST["uname"];
          $pass =$_POST["psw"];
          $hashed_pass= hash('sha256',$pass);
          $sql_u_p="select * from TSS.Customer where Username ='$uname' and Password ='$hashed_pass'";
          $res = mysqli_query($conn,$sql_u_p);
          $row = mysqli_fetch_array($res);
          if(is_array($row)){?>  

    <body>
        <h1 align = "Center">
         PolyU Ticket Selling System
      </h1>
        <!-- Nevagtion Bar-->
      <table bgcolor="#272729" width="100%" align="justify" align="center" >
        <tr>
          <td	width="25%"></td>
            <td align="center" width="25%">
              <a href="index.php" style="text-decoration:none;">
                <font size = "5" style="color:rgba(255, 255, 255, 0.9);"> Logout </font>
              </a>
            </td>
            <td	width="25%"></td>
        </tr>
      </table>
    
    <h1 align="center">Welcome <?php echo $uname ?></h1>

    <h1 align="center">Information</h1>
    <table align="center" border="1">
      <tr>
          <td align="center"><b>Show_ID</b></td>
            <td align="center"><b>Show</b></td>
            <td align="center"><b>Price</b></td>
        <td align="center"><b>Start Time</b></td>
        <td align="center"><b>End Time</b></td>
        </tr>
        <tr>
          <td align="center" width="30">1</td>
            <td align="center" width="200">House of the Dragon</td>
            <td align="center" width="100">$150</td>
        <td align="center" width="150">9:30</td>
        <td align="center" width="150">12:30</td>

        </tr>
        <tr>
          <td align="center" width="30">2</td>
            <td align="center" width="200">The Watcher</td>
            <td align="center" width="100">$120</td>
            <td align="center" width="150">14:30</td>
          <td align="center" width="150">17:30</td>
        </tr>
        <tr>
          <td align="center" width="30">3</td>
            <td align="center" width="200">The Peripheral</td>
            <td align="center" width="100">$100</td>
            <td align="center" width="150">18:30</td>
        <td align="center" width="150">21:30</td>
        </tr>
    </table>
      <br><br>


    <form action="Ticket.php" method="post">

        <div align="center">
          <h1>Select a Show ID</h1>
        <select align="center" name="show" id="show">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
        
      <br><br>
        <div align="center">
          <h1>Choose a Theater</h1>
        <select align="center" name="theater" id="theater">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>

      <br><br>
      <div align="center">
        <h1 align="center">Choose a Seat</h1>
      <select align="center" name="seat" id="seat">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
      </select>
      <br><br><br>
      <input type='hidden' name='uname' value='<?php echo "$uname";?>'/> 
      <input type="submit" align="center" name="submit" id="submit" value="Buy">

      </div>
    </form>

      </body>
<?php

            exit();
            ob_end_clean(); 
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password. Please try again.</h1>"; 
         
            
            header( "refresh:1;url=login.php" );
        }     
      }  
    
      ?>
      
    </html>