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

<div>
    <label for="muscleIdInput">Muscle ID:</label>
    <input type="text" id="muscleIdInput" />
    <button id="addToWorkoutBtn">Add to Workout</button>
</div>

<h2>Workout List</h2>
<ul id="muscleList"></ul>

<button id="addWorkoutBtn">Add Workout</button>

<form method="post" action="Home.php">
    <div class="user-values">
        <button type="submit" class="btn" name="logout">Logout</button>
    </div>
</form>

<script>
$(document).ready(function() {
  var muscleList = [];

  function updateMuscleList() {
    var listHtml = '';

    for (var i = 0; i < muscleList.length; i++) {
      var muscleId = muscleList[i];

      listHtml += '<li>' + muscleId + '</li>';
    }

    $('#muscleList').html(listHtml);
  }

  $('#muscleForm').submit(function(event) {
    event.preventDefault();

    var areaId = $(this).find('button[name="areaId"]:focus').val();
    $('#muscleTable tbody').empty();

    $.ajax({
      url: '/dbConnection/MuscleConnection.php',
      type: 'POST',
      data: { areaId: areaId },
      dataType: 'json',
      success: function(response) {
        var message = '';

        for (var i = 0; i < response.length; i++) {
          var muscle = response[i];

          var tr_str = "<tr>" +
            "<td align='center'>" + muscle.muscleId + "</td>" +
            "<td align='center'>" + muscle.name + "</td>" +
            "<td align='center'>" + muscle.workout1 + "</td>" +
            "<td align='center'>" + muscle.workout2 + "</td>" +
            '<td align="center"><a href="' + muscle.videoLink + '" target="_blank">Video</a></td>' +
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

  $('#addToWorkoutBtn').click(function() {
    var muscleId = $('#muscleIdInput').val().trim();

    if (muscleId !== '') {
      var isValidMuscleId = false;

      $('#muscleTable tbody tr').each(function() {
        var tableMuscleId = $(this).find('td:eq(0)').text();

        if (tableMuscleId === muscleId) {
          isValidMuscleId = true;
          return false; // Break the loop
        }
      });

      if (isValidMuscleId) {
        if (muscleList.includes(muscleId)) {
          alert('Muscle ID already added to the workout list.');
        } else {
          if (muscleList.length >= 5) {
            muscleList.shift();
          }

          muscleList.push(muscleId);

          updateMuscleList();
          $('#muscleIdInput').val('');
        }
      } else {
        alert('Invalid Muscle ID. Please enter a valid Muscle ID.');
      }
    } else {
      alert('Please enter a valid Muscle ID.');
    }
  });

  $('#addWorkoutBtn').click(function() {
    // Add your code for the "Add Workout" button functionality here
    // This code will execute when the button is clicked
  });
});
</script>

<?php
include_once "Footer.php";
?>
