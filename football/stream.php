<?php
include '_dbconnect.php';
session_start();

if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] != true) {
    header("location: login.php");
    exit;
}








?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <?php
    if ($_COOKIE["mode"] == "light") {
        echo "<link rel='stylesheet' href='style.css'>";
    } else {
        echo "<link rel='stylesheet' href='darkstyle.css'>";
    }
    ?>
</head>

<body>

    <!-- inside middle div
    ================================================================================================================================= -->
    <div class='wrapper'>

        <div class="container-fluid py-5" id='middle_div'>



            <?php
            include "navbar.php";
            ?>


























            <br><br><br>
            <div class="section">
                <div class="text_box">
                    <h1>List Of All video</h1>
                    
                </div>
                <?php
                $sql = "select * from stream order by title ASC    ;";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table>       <tr>       <th>title</th>     </tr>";

                    while ($row = $result->fetch_assoc()) {
                        $title = $row["title"];
                        $link = $row["link"];
                        echo "<tr><td>" . "<a href='stream_view.php?link=$link&title=$title'> $title </a>"  .  "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                ?>


            </div>


           


            </div>
        </div>

    </div>
    </div>
    <!-- ============================================================================================================================= -->




























    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>