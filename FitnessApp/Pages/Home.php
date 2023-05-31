
<?php
include_once "Header.php";
include_once($_SERVER['DOCUMENT_ROOT']."/dbConnection/UserConnection.php");
include_once($_SERVER['DOCUMENT_ROOT']."/dbConnection/MuscleConnection.php");
include_once($_SERVER['DOCUMENT_ROOT']."/Utility.php");

//if (!logged()) {
//    header('location: /Pages/LoginPage.php');
//}

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<form id="muscleForm" method="post">
    <button name="areaId" value="1">Core</button>
    <button name="areaId" value="2">Pectorals</button>
    <button name="areaId" value="3">Shoulders</button>
    <button name="areaId" value="4">Back</button>
    <button name="areaId" value="5">Legs</button>
    <button name="areaId" value="6">Arms</button>
</form>


<script>
$(document).ready(function() {
  $('#muscleForm').submit(function(event) {
    event.preventDefault();

    // Get the selected areaId
      var areaId = $(this).find('button[name="areaId"]:focus').val();
    $('#muscleTable tbody').empty()

    // Make an AJAX request to retrieve the muscle information
    $.ajax({
      url: '/dbConnection/MuscleConnection.php',
      type: 'POST',
      data: { areaId: areaId },
      dataType: 'json',
      success: function(response) {
        // Display the muscle information in an alert
        var message = '';

          for (var i = 0; i < response.length; i++) {
          var muscle = response[i];


          var tr_str = "<tr>" +
          "<td align='center'>" + muscle.muscleId + "</td>" +
          "<td align='center'>" + muscle.name + "</td>" +
          "<td align='center'>" + muscle.workout1+ "</td>" +
              "<td align='center'>" + muscle.workout2 + "</td>" +
              '<td align="center"><a href='+ muscle.videoLink +' target="_blank">Video</a></td>' +
                  "</tr>";
              $("#muscleTable tbody").append(tr_str);
          }
      },
      error: function(xhr, status, error) {
        console.log(error);
        alert('An error occurred while retrieving muscle information.');
      }
    });
  });
});
</script>

<div class="container">
    <table id="muscleTable" border="1">
        <thead>
            <tr>
                <th width="5%">MuscleId</th>
                <th width="20%">Name</th>
                <th width="20%">Workout1</th>
                <th width="20%">Workout2</th>
                <th width="20%">VideoLink</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<form method="post" action="Home.php">
    <div class="user-values">
        <button type="submit" class="btn" name="logout">Logout</button>
    </div>
</form>
<?php
include_once "Footer.php"
?>