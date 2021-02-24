
    

<?php

?>
<html>
    <head>
  <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://cdn.datatables.net/1.10.23/css/dataTables.jqueryui.min.css">
<link href="https://cdn.datatables.net/scroller/2.0.3/css/scroller.jqueryui.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    </head>
    <body>
        <H2>User List</H2>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">NAME</th>
      <th scope="col">ID</th>
      <th scope="col">EMAIL</th>
    </tr>
  </thead>
  <tbody>
  <?php
foreach($users as $item)
{
?>
    <tr>
      <td><?php echo $item->name; ?></td>
      <td><?php echo $item->id; ?></td>
      <td><?php echo $item->email; ?></td>
    </tr>
    <?php
}
?>
  </tbody>
</table>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        ajax:           "../data/2500.txt",
        deferRender:    true,
        scrollY:        200,
        scrollCollapse: true,
        scroller:       true
    } );
} );
</script>

</body>
</html>