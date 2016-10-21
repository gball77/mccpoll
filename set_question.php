<!DOCTYPE>
<head>
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

function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","index.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<html>
<body>
<form action="send_post.php" method="post">
	Title: <input type="text" name="title"> <br/>
	Question: <input type="text" name="question"> <br/>
	<div id="dynamicInput">
          Entry 1<br><input type="text" name="myInputs[]">
     </div>
     <input type="button" value="Add another text input" onClick="addInput('dynamicInput');">
	<input type="submit">
	
</form>
</html>