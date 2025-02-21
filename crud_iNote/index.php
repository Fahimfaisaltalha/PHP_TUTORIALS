<?php
//Connect to the database

$insert = false;
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes"; // Your database name

// Create a Connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['delete'])) {
  $sno = $_GET['delete'];

  $sql = "DELETE FROM `notes` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['snoEdit'])) {
    // Update the record
    $sno = $_POST["snoEdit"];
    $title = $_POST["titleEdit"];
    $description = $_POST["descriptionEdit"];
    $sql = "UPDATE `notes` SET `title` = '$title',`description`='$description' WHERE `notes`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
  } else {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $insert = true;
    } else {
      echo "The Record was not inserted Successfully: " . mysqli_error($conn);
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>iNotes - Note taking make easy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">

</head>

<body>
  <!-- Edit modal -->
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
  Edit Modal
</button> -->

  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editModal">Edit this Note</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/PHP_TUTORIALS/crud_iNote/index.php" method="post">
          <div class="modal-body">

            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="my-3">
              <label for="title" class="form-label">Note Title</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            </div>
            <label for="floatingTextarea2">Note Description</label>
            <div class="form-floating">
              <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" style="height: 100px"></textarea>
            </div>


          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Talha's Note</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <?php
  if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your note has been insert successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
  }

  ?>
  <div class="container">
    <h2>Add Note</h2>
    <form action="/PHP_TUTORIALS/crud_iNote/index.php" method="post">
      <div class="my-3">
        <label for="title" class="form-label">Note Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
      </div>
      <label for="floatingTextarea2">Note Description</label>
      <div class="form-floating">
        <textarea class="form-control" id="description" name="description" style="height: 100px"></textarea>
      </div>
      <button type="submit" class="btn btn-primary my-3">Add Note</button>
    </form>
  </div>
  <div class="container" my-4>

    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $sql = "SELECT * FROM `notes`";
        $result = mysqli_query($conn, $sql);
        $sno = 0;
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $sno++;
            echo "<tr>
                <th scope='row'>" . $sno . "</th>
                <td>" . htmlspecialchars($row['title']) . "</td>
                <td>" . htmlspecialchars($row['description']) . "</td>
                <td>
                    <button class='edit btn btn-sm btn-primary' id='" . $row['sno'] . "'>Edit</button>
                    <button class='delete btn btn-sm btn-danger' id='d" . $row['sno'] . "'>Delete</button>
                </td>
              </tr>";
          }
        } else {
          echo "<tr><td colspan='4'>No notes found.</td></tr>";
        }


        ?>


      </tbody>
      <

        </table>
  </div>
  <hr>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
  <script>
    let table = new DataTable('#myTable');
  </script>
  <script>
    // Select all edit buttons
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("Edit button clicked");

        tr = e.target.closest("tr"); // Get the closest row
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;

        console.log(title, description);
        snoEdit.value = e.target.id;
        console.log(e.target.id)

        document.getElementById("titleEdit").value = title;
        document.getElementById("descriptionEdit").value = description;

        // Open the modal
        let myModal = new bootstrap.Modal(document.getElementById('editModal'));
        myModal.show();
      });
    });

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("Delete button clicked");

        let sno = e.target.id.replace('d', ''); // Fix ID extraction
        if (confirm("Are you sure you want to delete this note?")) {
          console.log("Yes, deleting");
          window.location = `/PHP_TUTORIALS/crud_iNote/index.php?delete=${sno}`;
        } else {
          console.log("No deletion");
        }
      });
    });
  </script>

</body>

</html>