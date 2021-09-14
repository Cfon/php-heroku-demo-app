<?php
include __DIR__ . '/../src/db_config.php';

// PDO
try {
  $conn_str = 'mysql:host='.HOST.';dbname='.DB_NAME;
  $pdo = new PDO($conn_str, USERNAME, PASSWORD);

  $result = $pdo->query('SELECT * FROM `CUSTOMERS`');
  $pdo = null;
} catch (PDOException $e) {
  print "Error!: {$e->getMessage()} <br/>";
  die();
}

// var_dump($result);
// exit;
/*
// mysqli
$link = mysqli_connect(HOST, USERNAME, PASSWORD);

if (!$link) {
	printf('Невозможно подключиться к базе данных: %s', mysqli_connect_error());
	exit;
}

$db = mysqli_select_db($link, DB_NAME);

if (!$db) {
	printf('Невозможно выбрать базу данных: %s', mysqli_error($link));
	mysqli_close($link);
	exit;
}

$result = mysqli_query($link, 'SELECT * FROM `users`');

if (!$result) {
	printf('Невозможно выполнить запрос к базе данных: %s', mysqli_error($link));
	mysqli_close($link);
	exit;
}

// var_dump($result);
mysqli_close($link); */

if (isset($_POST['submit'])) {
  // var_dump($_POST);
  if (isset($_FILES['upload_file'])) {
    $upload_file = $_FILES['upload_file'];
    $path = __DIR__ . '/uploads';
    move_uploaded_file($upload_file['tmp_name'], "$path/{$upload_file['name']}");
    /*
       /app/public/uploads
       /app/public/uploads/README.md
       /tmp/phpTFfeIj
    */
    // echo $path;
    // echo "$path/{$upload_file['name']}";
    // echo "{$upload_file['tmp_name']}";
    // unlink($upload_file['tmp_name']);
  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital@0;1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/styles.css">
  <title>Heroku demo application</title>
</head>
<body>
  <section class="section">
    <div class="container">
      <div class="">
        <form action="index.php" method="POST" enctype="multipart/form-data">
          <!-- <input type="file" name="upload_file"> -->
          <div class="file has-name">
            <label class="file-label">
              <input class="file-input" type="file" name="upload_file">
              <span class="file-cta">
                <span class="file-icon"><i class="fas fa-upload"></i></span>
                <span class="file-label">Choose a file…</span>
              </span>
              <span class="file-name">[File name]</span>
            </label>
          </div>
          <button class="button is-primary mt-3" type="submit" name="submit">Отправить</button>
        </form>

        <table class="table is-striped is-fullwidth mt-3">
          <thead>
            <tr class="has-background-grey-darker">
              <th>CUST_NUM</th>
              <th>COMPANY</th>
              <th>CUST_REP</th>
              <th>CREDIT_LIMIT</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($result as $row): ?>
            <tr class="">
              <td><?= $row['CUST_NUM'] ?></th>
              <td><?= $row['COMPANY'] ?></td>
              <td><?= $row['CUST_REP'] ?></td>
              <td><?= $row['CREDIT_LIMIT'] ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Optional JavaScript; choose one of the two! -->
  <script>
    const fileInput = document.querySelector('input[type=file]');
    const fileName = document.querySelector('.file-name');
    fileName.style.display = 'none';
    fileInput.onchange = () => {
      if (fileInput.files.length > 0) {
        fileName.textContent = fileInput.files[0].name;
        fileName.style.display = 'block';
      }
    }
  </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<?php die() ?>

<?php while ($row = mysqli_fetch_object($result)): ?>
  <tr>
    <td><?= $row->id ?></th>
    <td><?= $row->name ?></td>
    <td><?= $row->age ?></td>
  </tr>
 <?php endwhile ?>
