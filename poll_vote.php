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
</script>

<?php
require_once __DIR__ . '/php-graph-sdk-5.0.0/src/Facebook/autoload.php';
$vote = $_REQUEST['vote'];

//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];
$idk = $array[2];
$nov8 = $array[3];

if ($vote == 0) {
  $yes = $yes + 1;
}
if ($vote == 1) {
  $no = $no + 1;
}
if ($vote == 2) {
  $idk = $idk + 1;
}
if ($vote == 3) {
  $nov8 = $nov8 + 1;
}

//insert votes to txt file
$insertvote = $yes."||".$no."||".$idk."||".$nov8;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<p>Results:</p>
<table>
	<?php
	$myInputs = isset($_POST['myInputs']) ? $_POST['myInputs'] : '';
	print_r( array_values($myInputs));
foreach ($myInputs as $eachInput) {
	echo "<tr>";
	echo "<td>".$eachInput. ":</td>";
	echo "<td>";
	echo "<img src=\"poll.gif\"width=". 100*round($yes/($no+$yes+$idk+$nov8),2) ."'height='20'>";
    echo (100*round($yes/($no+$yes+$idk+$nov8),2))."%";
	echo "</td>";
	echo "</tr>";

}
?>
</table>
