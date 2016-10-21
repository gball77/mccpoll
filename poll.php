<?php
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

<h3>Result:</h3>
<table>
<tr>
<td>Yes:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($yes/($no+$yes+$idk+$nov8),4)); ?>'
height='20'>
<?php echo(100*round($yes/($no+$yes+$idk+$nov8),4)); ?>%
</td>
</tr>
<tr>
<td>No:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($no/($no+$yes+$idk+$nov8),4)); ?>'
height='20'>
<?php echo(100*round($no/($no+$yes+$idk+$nov8),4)); ?>%
</td>
</tr>
<tr>
<td>I don't know:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($idk/($no+$yes+$idk+$nov8),4)); ?>'
height='20'>
<?php echo(100*round($idk/($no+$yes+$idk+$nov8),4)); ?>%
</td>
</tr>
<tr>
<td>I will be by November 8:</td>
<td>
<img src="poll.gif"
width='<?php echo(100*round($nov8/($no+$yes+$idk+$nov8),4)); ?>'
height='20'>
<?php echo(100*round($nov8/($no+$yes+$idk+$nov8),4)); ?>%
</td>
</tr>
</table>