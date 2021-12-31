<?php
    
  include('connect.php');
  session_start();

  if(isset($_POST['Prescribe']))
  {
  $aid= $_POST['Item'];
  $Date = date('y/m/d');

  $sql4 =" INSERT INTO `hbill`(`Amount`, `B_date`, `A_ID`) VALUES ('1000',' $Date',' $aid')";

  $result4= mysqli_query($conn,$sql4);

  if($result4)
  echo"Inserted Successfully";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block">
                                        <h2>Thanks for visiting Us</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                        
                                            <tbody><tr>
                                                <td>
                                                 <br>Invoice :<?php $No =1000; echo($No+$aid); ?>  <br> <p>Date :<?php echo$Date?></p></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <table class="table table-borderless width='100%' ">
                                                        <thead>
                                                            <tr>
                                                         
                                                            

                                                            <th scope="col">Date</th>
                                                            <th scope="col">Amount</th>
                                                           
                                                            </tr>
                                                        </thead>
                                                       
                                                        <tbody>
                                                            <tr>
                                                            
                                                            <td> <?php echo $Date; ?></td>
                                                            <td> 1000</td>
                            
                                                            </tr>
                                                            
                                                        </table>
                                                        
                                                        <tr class="total">
                                                            <td class="alignright" width="80%">Total</td>
                                                            <td class="alignright">1000</td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    
                                </tr>
                                <tr>
                             
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                
        </td>
        <td></td>
    </tr>
</tbody></table>
<a class="btn" href="index1.php">Back To Home</a>   
<style type="text/css">



.body-wrap {
    background-color: #f6f6f6;
    width: 100%;
}

.container {
    display: block !important;
    max-width: 600px !important;
    margin: 0 auto !important;
    /* makes it centered */
    clear: both !important;
}

.content {
  margin-top: 50px;
    display: flex;
    border-color: #2c3135;
    flex-wrap: nowrap;
    justify-content: space-between;
    background-color: ;
    height: 500px;
    width: 600px;
     background-repeat: no-repeat;
    background-size:cover;
    opacity: 0.8;
    border-radius: 9px;
   
  box-shadow: 0 7px 0 #BFBAAD, 0 0.5em 0 #A8A38C, 0 12px 12px #A8A38C;
}

/* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
.main {
    background: #fff;
    border: 1px solid #e9e9e9;
    border-radius: 3px;
}

.content-wrap {
    padding: 20px;
}

.content-block {
    padding: 0 0 20px;
}




h1, h2, h3 {
    font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    color: #000;
    margin: 40px 0 0;
    line-height: 1.2;
    font-weight: 400;
}

h1 {
    font-size: 32px;
    font-weight: 500;
}

h2 {
    font-size: 24px;
}

h3 {
    font-size: 18px;
}

h4 {
    font-size: 14px;
    font-weight: 600;
}

p, ul, ol {
    margin-bottom: 10px;
    font-weight: normal;
}
p li, ul li, ol li {
    margin-left: 5px;
    list-style-position: inside;
}

/* -------------------------------------
    LINKS & BUTTONS
------------------------------------- */
a {
    color: #1ab394;
    text-decoration: underline;
}

.btn-primary {
    text-decoration: none;
    color: #FFF;
    background-color: #1ab394;
    border: solid #1ab394;
    border-width: 5px 10px;
    line-height: 2;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
    display: inline-block;
    border-radius: 5px;
    text-transform: capitalize;
}

/* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */
.last {
    margin-bottom: 0;
}

.first {
    margin-top: 0;
}

.aligncenter {
    text-align: center;
}

.alignright {
    text-align: right;
}

.alignleft {
    text-align: left;
}

.clear {
    clear: both;
}

/* -------------------------------------
    ALERTS
    Change the class depending on warning email, good email or bad email
------------------------------------- */
.alert {
    font-size: 16px;
    color: #fff;
    font-weight: 500;
    padding: 20px;
    text-align: center;
    border-radius: 3px 3px 0 0;
}
.alert a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
}
.alert.alert-warning {
    background: #f8ac59;
}
.alert.alert-bad {
    background: #ed5565;
}
.alert.alert-good {
    background: #1ab394;
}

/* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
.invoice {
    margin: 40px auto;
    text-align: left;
    width: 80%;
}
.invoice td {
    padding: 5px 0;
    width: 600px; 
    font-family: "Nunito", sans-serif;
   color: #012970;
    margin-top: 60px;
    font-weight: 1000;
    color: 
    font-size: 20px;
    font-weight: 500;
}
.invoice .invoice-items {
    width: 100%;
}
.invoice .invoice-items td {
    border-top: #eee 1px solid;
}
.invoice .invoice-items .total td {
    border-top: 2px solid #333;
    border-bottom: 2px solid #333;
    font-weight: 700;
}

/* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
@media only screen and (max-width: 640px) {
    h1, h2, h3, h4 {
        font-weight: 600 !important;
        margin: 20px 0 5px !important;
    }

    h1 {
        font-size: 22px !important;
    }

    h2 {
        font-size: 18px !important;
    }

    h3 {
        font-size: 16px !important;
    }

    .container {
        width: 100% !important;
    }

    .content, .content-wrap {
        padding: 10px !important;
    }

    .invoice {
        width: 100% !important;
    }
    .but{
  width:150px;
  height:30px;
  margin-left:20px;
  border:2px solid white;
  border-radius:5px;
  background-color:black;
  color:white;
  padding:8px;
  margin-top:50px;
  margin-bottom:40px;
  text-decoration:none;
  font-size:1.0rem;
  
}

</style>
</body>
</html>