<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blendin</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-secondary">
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">BlendIn</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Signup</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About us</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 bg-light mt-2 rounded pb-3">
        <h1 class="text-primary p-2"> BlendIn Search</h1>
    <hr>
    <div class="form-inline">
        <label for="search" class="font-weight-bold lead text-dark"> Search Record </label>&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="text" id="search text" class="form-control form control lg rounded-0 border-primary" placeholder="Search here">
        </div>
        <hr>
        <?php 
        include 'config.php';
        $stmt=$conn->prepare("SELECT * FROM live_search");
        $stmt->execute ();
        $result=$stmt->get_result();
        ?>

        <table class="table table-hover table-light table-striped" id="table-data">
            <thead>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Hobby<th>
            </thead>
            <tbody>
                <?php
                while ($row=$result->fetch_assoc()){?>
                    <tr>
                      <td><?= $row['id']; ?></td>
                      <td><?= $row['First_name ']; ?></td>
                      <td><?= $row['Last_name']; ?></td>
                      <td><?= $row['Email']; ?></td>
                      <td><?= $row['Gender']; ?></td>
                      <td><?= $row['Hobby']; ?></td>

                    </tr>
               <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</body>
</html>