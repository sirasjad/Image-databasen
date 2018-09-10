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
    <center><h1 class="mt-3">Tilgjengelige images</h1>
    <p><a href="?side=forside">Trykk her</a> for å gå tilbake til forsiden.</p></center>
  </main>

  <center><div class="col-md-8">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Varekode</th>
          <th>Beskrivelse</th>
          <th>Spesifikasjoner</th>
          <th>Sist oppdatert</th>
        </tr>
      </thead>
      <tbody><?php getImages(); ?></tbody>
    </table>
  </div></center><br>

  <footer class="footer">
    <div class="container">
      <center><span class="text-muted">Utviklet av Sirajuddin Asjad @ Elkjøp Drammen</span></center>
    </div>
  </footer>
</body>
</html>
