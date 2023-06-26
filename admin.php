<?php
$conn=mysqli_connect("localhost","root","","db_tugas_ims");

if(!$conn){
    die("Connection Error");
}

$query="select*from pemesanan";
$result= mysqli_query($conn,$query);

$sale="SELECT SUM(payment_total) AS res, COUNT(id_pemesanan) AS res2 FROM pemesanan ";
$totalsale= mysqli_query($conn,$sale);

if(isset($_POST['deleteData'])){
  $id=$_POST['id_pemesanan'];
  $query="DELETE FROM pemesanan WHERE id_pemesanan='$id'";
  mysqli_query($conn, $query);
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
        padding: 20px;
        background-color: white;
        border-radius: 10px;
      }
      .hiasan{
        flex-direction: column;
        position: relative;
        line-height: 10px;

      }
      .backbutton{
        display: flex;
        justify-content: end;
        margin-right: 0%;
      }
      p{
        font-weight: bold;
        font-size: 15px;
      }

    </style>

    <script>
      function backToForm(){
        window.location.href="http://localhost:8080/Tugas%20IMS%20API/form.php";
      }
      
    </script>

    <title>Tugas Integrasi Manajemen Sistem</title>
  </head>
  <body>
    <div class="box">
      <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Order ID</th>
              <th scope="col">Name</th>
              <th scope="col">Order Date</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Size</th>
              <th scope="col">Amount</th>
              <th scope="col">Total Payment</th>
              <th scope="col">Payment Method</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
                  while($row=mysqli_fetch_assoc($result))
                  {
              ?>

                      <td><?php echo $row['id_pemesanan']; ?></td>
                      <td><?php echo $row['nama']; ?></td>
                      <td><?php echo $row['tanggal']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['phone']; ?></td>
                      <td><?php echo $row['size']; ?></td>
                      <td><?php echo $row['amount']; ?></td>
                      <td><?php echo $row['payment_total']; ?></td>
                      <td><?php echo $row['payment_method']; ?></td>

                      <form action="" method="post">
                      <input type="hidden" name="id_pemesanan" value="<?php echo $row['id_pemesanan']; ?>">
                      <td><button type="submit" name="deleteData" class="btn btn btn-danger" id="delete">delete</button></td>
                      </form>
                      <form action="edit.php" method="post">
                      <input type="hidden" name="id_pemesanan" value="<?php echo $row['id_pemesanan']; ?>">
                      <td><button type="submit" name="editData" class="btn btn btn-primary" id="edit">edit</button></td>
                      </form>
          </tr>
              <?php
                  }
              ?>
              
            </tr>
          </tbody>
        </table>
        <div class="hiasan">
          <div>
            <?php while($row=mysqli_fetch_assoc($totalsale)){
        ?>
        <p>total sales: <?php echo $row['res']; ?> </p>
        <p>total orders: <?php echo $row['res2']; }?> </p></div>
        </div>
        <div class="backbutton">
            <button type="button" class="btn btn btn-light " id="submit" onclick="backToForm()">Back to form</button>
        </div>



        <!-- <?php while($row=mysqli_fetch_assoc($totalsale)){
        ?>
        <p>total sales: <?php echo $row['res']; ?> </p>
        <p>total orders: <?php echo $row['res2']; }?> </p>
                
        <div class="backbutton">
          <button type="button" class="btn btn btn-light " id="submit" onclick="backToForm()">Back to form</button>
        </div> -->
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>