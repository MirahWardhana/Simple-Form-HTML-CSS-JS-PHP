<?php 
$conn=mysqli_connect("localhost","root","","db_tugas_ims");

if(!$conn){
    die("Connection Error");
}


if(isset($_POST['editData'])){
    $id=$_POST['id_pemesanan'];
    $query="select*from pemesanan where id_pemesanan='$id'";
    $result= mysqli_query($conn,$query);
}


if(isset($_POST['updateData'])){
    $id_pemesanan=$_POST['id_pemesanan'];
    $nama=$_POST['nama'];
    $tanggal=$_POST['tanggal'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $size=$_POST['size'];
    $amount=$_POST['amount'];
    $payment_total=$_POST['payment_total'];
    $payment_method=$_POST['payment_method'];
    $query= "UPDATE pemesanan SET nama='$nama',tanggal='$tanggal',email='$email',phone='$phone', size='$size', amount='$amount', payment_total='$payment_total', payment_method='$payment_method' WHERE id_pemesanan='$id_pemesanan'";
    $update=mysqli_query($conn, $query);
    

    if ($update){
        echo '<script alert(Data Successfully Updated); <script>';
        header("location:edit.php");
        $id=$id_pemesanan;
        $query="select*from pemesanan where id_pemesanan='$id'";
        $result= mysqli_query($conn,$query);

    }
    else{
        echo '<script alert(Failled to Update Data); <script>';
        header("location:edit.php");
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
    <link rel="stylesheet" href="form.css">

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
    </style>
    <script>

        function backToAdmin(){
            window.location.href="http://localhost:8080/Tugas%20IMS%20API/admin.php";
        }

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
                <h1>EDIT PEMESANAN MERCHANDAISE</h1>
                <hr>
            </div>
            <?php
                  while($row=mysqli_fetch_assoc($result))
                  {
            ?>
            <div class="row">
                <div class="col-md-4">
                    <label for="name">Order Id</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="id_pemesanan" class="form-control" id="name" value="<?php echo $row['id_pemesanan'];?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="name">Name</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="nama" class="form-control" id="name" value="<?php echo $row['nama'];?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="name">Order Date</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="tanggal" class="form-control" id="tanggal" value="<?php echo $row['tanggal'];?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="email">Email</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="email" class="form-control" id="email" value="<?php echo $row['email'];?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="phone">Phone</label>
                </div>
                <div class="col-md-8">
                    <input type="number" name="phone" class="form-control" id="phone" value="<?php echo $row['phone'];?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <label>Size</label>
                </div>
                <div class="col-md-8">
                <select name="size" class="form-control" value="<?php echo $row['size'];?>">
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXl</option>
                </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="name" >Amount</label>
                </div>
                <div class="col-md-8">
                    <input name="amount" type="number" min="1" max="100" class="form-control" id="amount" value="<?php echo $row['amount'];?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="name">Payment Total</label>
                </div>
                <div class="col-md-8">
                    <input name="payment_total" type="number" class="form-control" id="total" value="<?php echo $row['payment_total'];?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <label>Payment Method</label>
                </div>
                <div class="col-md-8">
                    <select name="payment_method" class="form-control" value="<?php echo $row['payment_method'];?>">
                        <option value="E-Wallet">E-Wallet</option>
                        <option value="Debit or Credit Cards">Debit or Credit Cards</option>
                    </select>
                </div>
                
            </div>
            <div class="row ">
                <div class="col-md-4"> 
                    <label for="formFile" class="form-label">Proof of payment</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control" type="file" id="formFile">
                </div>
            </div>
            <div class="submissionbutton">
                <button name="updateData" type="submit" class="btn btn-outline-primary " id="submit" >Submit</button>
                <button name="cancel" type="reset" class="btn btn-light" onclick="backToAdmin()" >Cancel</button>
            </div>
              
          </form>
            <?php
            }
            ?>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>