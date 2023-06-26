<?php 
$conn=mysqli_connect("localhost","root","","db_tugas_ims");

if(!$conn){
    die("Connection Error");
}

if(isset($_POST ['submitData'])){
    $nama=$_POST ['nama'];
    $email=$_POST ['email'];
    $phone=$_POST ['phone'];
    $size=$_POST ['size'];
    $amount=$_POST ['amount'];
    $payment_total=$_POST ['payment_total'];
    $payment_method=$_POST ['payment_method'];
    if($nama!="mirah" && $email!="mirah"){
        $query= "INSERT INTO pemesanan (nama,tanggal,email,phone,size,amount,payment_total,payment_method) VALUES ('$nama', now(),'$email','$phone', '$size','$amount','$payment_total', '$payment_method')";
        $queryrun=mysqli_query($conn, $query);
        if ($queryrun){
            echo '<script alert(Data Successfully Submitted); <script>';
            header("location:form.php");
        }
        else{
            echo '<script alert(Failled to Submit Data); <script>';
            header("location:form.php");
        }
    }else{
        $link = "<script>window.open('http://localhost:8080/Tugas%20IMS%20API/admin.php')</script>";
        echo $link;
    }

}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        body{
    display: flex;
    background-color: rgb(180, 174, 254);
    padding: 2rem;
    justify-content: center;
    align-items: center;
}
.box{
    position: relative;
    padding: 50px;
    background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 700px;
	max-width: 100%;
	min-height: 500px;
    display: flex;
    justify-content: center;
    align-items: center;
}

  h1{
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 2em;
  }

.formregis{
    line-height: 2.5em;
}

.submissionbutton{ 
    display: flex;
    justify-content: center;
    align-items: center;
}

.submissionbutton .btn{
    width:45%; 
}

@media only screen and (max-width:1000px) {
    .wrap{
        display: flex;
        flex-wrap: wrap;
    }
    
}
    </style>
    <script>
        function totalbayar(value){
            var x;
            x=value*100000;
            document.getElementById('total').value=x;
        }

    </script>


    <title>Tugas Integrasi Manajemen Sistem</title>
  </head>
  <body>
    <div class="box">

        <form name="formOrder" class="formregis" method="post" action="" autocomplete="off">
            <div>
                <h1>FORM PEMESANAN MERCHANDAISE</h1>
                <hr>
            </div>
            <div class="row">
                <div class="col md-12">
                    <label for="name">Name</label>
                    <input type="text" name="nama" class="form-control" placeholder="Enter your full name" id="name">
                </div>
            </div>
            <div class="row wrap">
                <div class="col md-6">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter your email" id="email">
                </div>
                <div class="col md-6">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" class="form-control" placeholder="Enter your phone number" id="phone">
                </div>
            </div>
            <div class="form-group">
                <label>Size</label>
                <select name="size" class="form-control">
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXl</option>
                </select>
            </div>
            <div class="row wrap">
                <div class="col md-6">
                    <label for="name" >Amount</label>
                    <input name="amount" type="number" min="1" max="100" onkeyup="totalbayar(this.value);" class="form-control" placeholder="Enter your the amount of order" id="amount">
                </div>
                <div class="col md-6">
                    <label for="name">Payment Total</label>
                    <input name="payment_total" type="number" class="form-control" placeholder="Payment Total" id="total">
                </div>
            </div>
            <div class="form-group">
                <label>Payment Method</label>
                <select name="payment_method" class="form-control">
                    <option value="E-Wallet">E-Wallet</option>
                    <option value="Debit or Credit Cards">Debit or Credit Cards</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Proof of payment</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="submissionbutton">
                <button name="submitData" type="submit" class="btn btn-outline-primary " id="submit" >Submit</button>
                <button name="cancel" type="reset" class="btn btn-light">Cancel</button>
            </div>
              
          </form>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>