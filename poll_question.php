<?php
?>

<script type="text/javascript" >
  var counter = 1;
var limit = 4;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "Entry " + (counter + 1) + " <br><input type='text' name='myInputs[]'>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("poll").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","poll_vote.php?vote="+int,true);
  xmlhttp.send();
}
</script>
<div id="poll">
<p><?php echo $_POST["question"]; ?></p>

<form action="poll_vote.php" method="post">
<?php
$myInputs = isset($_POST['myInputs']) ? $_POST['myInputs'] : '';
$i = 0;

foreach ($myInputs as $eachInput) {
     echo $eachInput." <input type=\"radio\" name=\"vote\" value=\"$i\"onclick=\"getVote(this.value)\">" ."<br>";
     $i++;
}
?>
</form>
</div>