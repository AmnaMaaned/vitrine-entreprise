<!DOCTYPE html>
<html>
<head></head>
<body>
welcome
<table border='1'>
  <tr>
    <th>ID</th>
    <th>Title</th>
  </tr>
  <?php

foreach($v1 as $value){?>
<tr>
<td>
<?=$value['id'] ;?>

</td>
<td>
<?=$value['title'] ;?>

  </td>
</tr>
  
  
<?php
}
              
?>
  
</table>

</body>

</html>