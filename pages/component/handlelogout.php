<?php
  session_start();
  echo"wait";
  session_destroy();
  header("Location: /forumwebsite/pages/index.php");
  ?>