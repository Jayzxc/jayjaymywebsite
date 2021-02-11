<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>
        function showUser(str) {
            if (str == ""){
                document.getElementById("txtHint").innerHTML = "";
                return ;

            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200){
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getuser.php?q="+str,true);
                xmlhttp.send();
            }

        }
    </script>
    <title>Document</title>
</head>
<body>

<form>
<!--    <select name="users" onchange="showUser(this.value)">-->
<!--        <option value="">Select a person:</option>-->
<!--        <option value="1">Peter Griffin</option>-->
<!--        <option value="2">Lois Griffin</option>-->
<!--        <option value="3">Joseph Swanson</option>-->
<!--        <option value="4">Glenn Quagmire</option>-->
<!--    </select>-->
    <label for="input">id으로 찾기</label>
    <input id="input" name="users" onkeyup="showUser(this.value)">
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html>