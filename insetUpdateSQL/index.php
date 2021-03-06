<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TLU</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
          <li class="nav-link">
              <a href="login.php">Login</a>
            </li>

            <li class="nav-link">
               <a href="signup.php">Sign up</a>
            </li>
</li>
      </ul>
      
    </div>
  </div>
</nav>
    <h2 class="text-center mt-3">DANH B??? ??I???N THO???I ?????I H???C TH???Y L???I TLU</h2>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">M?? nh??n vi??n</th>
      <th scope="col">H??? v?? t??n</th>
      <th scope="col">Ch???c v???</th>
      <th scope="col">S??? m??y b??n</th>
      <th scope="col">S??? di ?????ng</th>
      <th scope="col">Email </th>
      <th scope="col">T??n ????n v???</th>

    </tr>
  </thead>
  <tbody>
    <!-- ????? d??? li???u t??? csdl ra b???ng -->
    <?php
        // B?????c 1: k???t n???i database server
        $conn = mysqli_connect('localhost', 'root', '', 'danhbatlu');
        if(!$conn) {
            die("K???t n???i th???t b???i, vui l??ng ki???m tra l???i th??ng tin");
        }
        // B?????c 2: th???c hi???n truy v???n
        $sql = "SELECT ma_nhanvien, hovaten, chucvu, sodt_coquan, sodt_didong, db_nhanvien.email, ten_donvi from db_nhanvien, db_donvi where db_nhanvien.ma_donvi = db_donvi.ma_donvi";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
    ?>
            <tr>
                <th scope="row"><?php echo $row['ma_nhanvien'] ?></th>
                <th><?php echo $row['hovaten'] ?></th>
                <th><?php echo $row['chucvu'] ?></th>
                <th><?php echo $row['sodt_coquan'] ?></th>
                <th><?php echo $row['sodt_didong'] ?></th>
                <th><?php echo $row['email'] ?></th>
                <th><?php echo $row['ten_donvi'] ?></th>
            </tr>
    <?php
            }
        }
        // B?????c 4: ????ng k???t n???i db server
        mysqli_close($conn);
    ?>
  </tbody>
</table>
    </div>
<?php
  include("template/footer.php");
?>