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
    <h1 class="mt-3"><center>Image-databasen</center></h1>
    <p class="lead">På denne siden finner du en oversikt over alle images som kan brukes ved klargjøring og oppsett av laptoper. Alle images er semi-klargjort med nyeste Windows oppdateringer, programmer, drivere osv.</p>

    <?php if(isset($_POST['fortsett'])) checkImage(); ?>

    <form action='' method='POST'>
      <div class="input-group mb-3">
        <input class="form-control form-control-lg" type="text" name="varekode" placeholder="Skriv inn varekode">

        <div class="input-group-append">
          <button type="submit" name="fortsett" class="btn btn-outline-success">Fortsett</button>
        </div>
      </div>
    </form>

    <p>Eller <a href="?side=images">trykk her</a> for å se en liste over alle tilgjengelige images.</p><br>
  </main>

  <footer class="footer">
    <div class="container">
      <center><span class="text-muted">Utviklet av Sirajuddin Asjad @ Elkjøp Drammen</span></center>
    </div>
  </footer>
</body>
</html>
