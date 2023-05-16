<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>JFORUM</title>
</head>

<body>
    <?php
    include 'component/dbconnect.php';
    ?>
    <?php
    include 'component/Navbar.php';
    ?>
    


    <div class="container">
        <?php 
        $noresults = true;
        $query = $_GET['search'];
        echo $query;
        $sql = "SELECT * FROM `thread` WHERE title='node'"; 
        $result = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $desc = $row['desc']; 
            $thread_id= $row['thread_id'];
            $url = "discussion.php?threadid=". $thread_id;
            $noresults = false;

            // Display the search result
            echo '<div class="result">
                        <h3><a href="'. $url. '" class="text-dark">'. $title. '</a> </h3>
                        <p>'. $desc .'</p>
                  </div>'; 
            }
        if ($noresults){
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Results Found</p>
                        <p class="lead"> Suggestions: <ul>
                                <li>Make sure that all words are spelled correctly.</li>
                                <li>Try different keywords.</li>
                                <li>Try more general keywords. </li></ul>
                        </p>
                    </div>
                 </div>';
        }        
    ?>
    </div>

     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
<!-- INSERT INTO `categories` (`idno`, `name`, `description`, `date`) VALUES (NULL, 'c++', 'c++ is object oriented\r\n', current_timestamp()); -->
<!-- SELECT * FROM `categories` -->