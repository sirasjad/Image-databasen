<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="style/bootstrap.min.css" rel="stylesheet">
  <link href="style/style.css" rel="stylesheet">
  <title>Image-databasen</title>
</head>

<body>
  <main role="main" class="container">
    <img src="img/logo.png" class="logo">
    <center><h1 class="mt-3">Admin kontrollpanel</h1>
    <p><a href="?side=forside">Trykk her</a> for å gå tilbake til forsiden.</p></center>

    <?php
      if(isset($_POST['leggtil'])) addImage();
      if(isset($_GET['slett'])) deleteImage();
    ?>

    <form action='' method='POST'>
      <h5>Legg til ny image:</h5>
      <p><input class="form-control form-control-lg" type="text" name="varekode" placeholder="Varekode"></p>
      <p><input class="form-control form-control-lg" type="text" name="beskrivelse" placeholder="Varebeskrivelse"></p>

      <div class="input-group">
        <input class="form-control form-control-lg" type="text" name="cpu" placeholder="CPU">
        <input class="form-control form-control-lg" type="text" name="minne" placeholder="Minne">
        <input class="form-control form-control-lg" type="text" name="lagring" placeholder="Lagring">
    </div><br>

      <center><button type="submit" name="leggtil" class="btn btn-outline-success btn-lg">Legg til image</button></center>
    </form>
  </main><br>

  <center><div class="col-md-7">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Varekode</th>
          <th>Beskrivelse</th>
          <th>Spesifikasjoner</th>
          <th>Handling</th>
        </tr>
      </thead>
      <tbody><?php getAdminImages(); ?></tbody>
    </table>
  </div></center><br>

  <footer class="footer">
    <div class="container">
      <center><span class="text-muted">Utviklet av Sirajuddin Asjad @ Elkjøp Drammen</span></center>
    </div>
  </footer>
</body>
</html>
