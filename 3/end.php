<?php
       if(isset($_SESSION['name']))
       {
              echo "
                     <HTML><HEAD>
                     <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
                     </HEAD></HTML>
                     ";
              session_destroy();
       }

    include "index.html";
?>
