<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Data Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Daftar Mahasiswa</h2>
  <table>
    <tr>
      <th>NIM</th><th>Nama</th><th>TTL</th><th>Bio</th><th>Instagram</th><th>GitHub</th><th>LinkedIn</th><th>Porto</th><th>Aksi</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM students");
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['nim']}</td>
              <td>{$row['name']}</td>
              <td>{$row['ttl']}</td>
              <td>{$row['bio']}</td>
              <td><a href='{$row['ig']}'>IG</a></td>
              <td><a href='{$row['git']}'>GitHub</a></td>
              <td><a href='{$row['in']}'>LinkedIn</a></td>
              <td><a href='{$row['porto']}'>Porto</a></td>
              <td><a href='edit.php?nim={$row['nim']}'>Edit</a></td>
            </tr>";
    }
    ?>
  </table>
</body>
</html>
