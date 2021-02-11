<?php
session_start();
//|| !isset($_SESSION['userName']) || !isset($_SESSION['userNickName'])
if (isset($_SESSION['userID'])) {
    $userLogin = true;
} else {
    $userLogin = false;
}
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <link rel= "stylesheet"  href="/style.css">-->
    <!--    구글폰트-->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100&display=swap" rel="stylesheet">
    <!--  메인 이미지 파일 -->
    <script src="https://kit.fontawesome.com/ca9ee9bd9d.js"
            crossorigin="anonymous">
    </script>
    <style>
        /*기본 메뉴 css*/
        body {
            margin: 0;
            font-family: 'Noto Sans KR', sans-serif;
            font-weight: 500;
            min-width: 1100px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        nav ul {
            display: flex;
            list-style: none;
            padding-left: 0;
        }
        nav ul li {
            font-size: 22px;
            padding: 10px 12px;
            margin-left: 70px;
            margin-right: 70px;
            white-space: nowrap;
        }
        nav ul li a {
            color: white;
            font-weight: bolder;
        }
        *        { margin:0; padding: 0; }
        .board:hover .menu-sub {
            visibility: inherit;
            pointer-events: auto;
            display: block;
        }
        .menu-sub {
            background: white;
            position: absolute;
            border: 2px solid #1b5ac2;
            transform: translate(-38px,10px);
            font-size: 10px;
            text-align: center;
            font-weight: bold;
            padding-left: 0;
            list-style: none;
            white-space: nowrap;
            display: none;
            visibility: hidden;
        }
        .menu-sub li {
            margin: 0;
            padding-left: 30px;
            padding-right: 30px;
        }
        .menu-sub li a{
            color: black;
            font-weight: bolder;
        }
        /*게시판 css*/
        .table-item {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            font-size: 25px;
        }
        td {
            border-bottom: 1px solid gray;
            font-size: 20px;
            font-weight: bolder;
        }
        tr:nth-child(2n) {
            background: #E5F3FB;
        }
        th {
            text-align: center;
        }
        td:nth-child(1){ width: 100px;text-align: center;}
        td:nth-child(2){ width: 600px;}
        td:nth-child(3){ width: 170px;text-align: center;}
        td:nth-child(4){ width: 100px;text-align: center;}
        td:nth-child(5){ width: 70px;text-align: center;}
        td:nth-child(6){ width: 60px;text-align: center;}

        table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            min-width: auto;
            margin-top: 20px;
            width: 1100px;
            /*table-layout: fixed;*/
        }
        .board-button {

            text-transform: uppercase;
            outline: 0;
            background: #1b5ac2;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .board-button:hover,.board-button:active,.board-button:focus {
            background: darkblue;
        }
        .table-title {

        }
        .table-title p {
            cursor: pointer;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 600px;
            height: 33px;
        }
    </style>
    <title>시사제이</title>
</head>
<body>
<div class="home_up" style="padding-left: 70px; width: 1030px; margin-left: auto; margin-right: auto; display: flex; align-items: center;">
    <div class="home_logo" style="font-size: 50px; margin-top: 50px; margin-left: 50px">
        <i class="far fa-newspaper"  style="color: #007bff"></i>
        <a style="font-weight: bolder;" href="../index.php">시사제이</a>
    </div>
    <div style="margin-left: 60px; margin-top:45px; height: 40px; width: 500px; border: 1px solid #1b5ac2; background: #ffffff;">
        <input  style="font-size: 16px; width: 425px; padding: 10px; border: 0px; outline: none; float: left; color: #007bff" type="text" placeholder="뉴스 & 게시판 통합 검색">
        <button style="width: 50px; height: 100%; border: 0px; background: #1b5ac2; outline: none; float: right; color: #ffffff; ">검색</button>
    </div>
</div>

<div style="background-color: #1b5ac2; width: 100%;">
    <nav style="width: 1100px; display: flex;
    justify-content: space-between;margin-left: auto; margin-right: auto;
    align-items: center;margin-top: 20px; padding-left: 0px;">
        <ul>
            <li class="board"><a href="">게시판</a>
                <ul class="menu-sub">
                    <li><a href="board.php?board=1">시사</a></li>
                    <li><a href="board.php?board=2">IT/과학</a></li>
                    <li><a href="board.php?board=3">자유</a></li>
                </ul>
            </li>
            <li><a href="/jaypublic/news.php?type=1">정치</a></li>
            <li><a href="/jaypublic/news.php?type=2">경제</a></li>
            <li><a href="/jaypublic/news.php?type=3">IT/과학</a></li>
            <li><a href="/jaypublic/news.php?type=4">사회</a></li>
        </ul>
    </nav>
</div>
<div style="width: 1100px; margin-left: auto; margin-right: auto; margin-top: 30px;">
    <?php
    //게시판 분류
    switch ($_GET['board']) {
        case 1:
            $boardType = 'currentBoard';
            ?><p style="margin-left: 25px; color: black;font-weight: bolder;font-size: 45px;">시사게시판</p>

            <?php
            break;
        case 2:
            $boardType = 'scienceBoard';
            ?><p style="margin-left: 25px; color: black;font-weight: bolder;font-size: 45px;">IT/과학게시판</p>

            <?php
            break;
        case 3:
            $boardType = 'freeBoard';
            ?><p style="margin-left: 25px; color: black;font-weight: bolder;font-size: 45px;">자유게시판</p>
            <?php
            break;
        default:
            ?><script>alert("잘못된 접근 입니다.");location.replace("../index.php")</script>
        <?php
    }
    ?>
    <div style="margin-top: 10px; border: 1px solid #007bff; width: 100%;"></div>
    <div style="margin-top: 20px; margin-bottom: 0px;width: 100%;">
        <button onclick="location.replace('/jaypublic/board.php?board='+<?php echo $_REQUEST['board']; ?>)" class="board-button">전체글</button>
        <button onclick="location.replace('/jaypublic/board.php?type=popular&board='+<?php echo $_REQUEST['board']; ?>)" class="board-button">추천글</button>
<!--        <button class="board-button">공지</button>-->
        <button class="board-button" type="button" style="float: right;" onclick="goWrite()">글쓰기<i style="margin-left: 15px;" class="fas fa-pen"></i></button>
        <script type="text/javascript">
            function goWrite() {
                //이동할 주소 변수
                var loc = "write.php?board=" + <?php echo $_GET['board'];?>;
                window.location.href=loc;
            }
        </script>
    </div>
    <table style="">
        <tr class="table-item"><th>번호</th><th>제목</th><th>작성자</th><th>날짜</th><th>조회</th><th>추천</th></tr>
        <?php
        $host = 'localhost:3306';
        $user = 'root';
        $password = 'void>_<void';
        $database = 'teamnova';
        $mysqli = new mysqli($host,$user,$password,$database);
        $sql = "select * from $boardType";
        if(isset($_REQUEST['type']) && $_REQUEST['type'] == "popular"){
            $sql = "select * from $boardType where good > 1";
        }
        $result = $mysqli->query($sql);
        $totalArticle = $result->num_rows; //전체 글의 수
        $viewAriticle = 25; //한 페이지에서 보여줄 글의 수
        $page = 1; // 기본적으로 page 값을 받지 않았을때는 첫페이지로 이동함.
        $block = 10; // 한 화면에 보여줄 페이지 계수. ex ( 1 2 3 ... 8 9 10).
        if(isset($_REQUEST['page'])){
            // 페이지 값 받을때
            $page = intval($_REQUEST['page']);
        } else {
            //$page = 1;
        }
        $start = ($page-1)*$viewAriticle; // 글을 불러오는 시작점. sql에 사용된다.

        $sql = "select * from $boardType order by number desc limit $start, $viewAriticle";

        if(isset($_REQUEST['type']) && $_REQUEST['type'] == "popular"){
            $sql = "select * from $boardType where good > 1 order by number desc limit $start, $viewAriticle";
        }
        // $sql 번호순(시간순)으로 최신글을 $start(시작지점)으로 부터 $viewArticle(보여줄 글수 20개)를 가져옴.
        $result = $mysqli->query($sql);
        while($row = $result->fetch_array()){
            $number = $row['number'];
            $id = $row['userID'];
            $nickName = $row['userNickName'];
            $title= $row['title'];
            $content = $row['content'];
            $hit = $row['hit'];
            $good = $row['good'];
            $date = $row['date'];
            $date = trim($date);
            $dates = explode(" ", $date);
            $date = $dates[0];
        ?>
            <tr><td><?php echo $number;?></td><td onclick="location.href='read.php?number=<?php echo $number;?>&board=<?php echo $_GET['board'];?>'"><div class="table-title"><p><?php echo $title;?></p></div></td><td><?php echo $nickName;?></td><td><?php echo $date;?></td><td><?php echo $hit;?></td><td><?php echo $good;?></td></tr>
        <?php
        }
        ?>
    </table>

    <!--            페이징 처리.-->
    <div style=" width: fit-content; margin: auto; margin-top: 100px;">
        <?php
        //페이징 처리.
        $totalPage = ceil($totalArticle / $viewAriticle); // 전체 페이지수. ceil은 숫자 올림계산을 하는 함수.
        //페이지 숫자 예외처리
        if($page <= 0 ){
            $page = 1;
        }
        if ($page > $totalPage){
            $page = $totalPage;
        }
        if($page % $block){
            //페이지수가 block의 배수가 아닐때
            $startPage = $page - $page%$block + 1;
        } else {
            //페이지수가 block의 배수일때,
            $startPage = $page -$block + 1;
        }
        // % 는 일정 숫자를 반복되게끔 만들수 있다. 예를 들어 % 10 계산 1 2 3.. 17 18 19 20 에대해서
        // 1 2 3..8 9 0 1 2 3 .. 8 9 0 으로 반복되게 할 수잇다.
        // 이는 블록에서 숫자처리할때 사용된다.
        $endPage = $startPage + $block;
        $boardTypePage = $_REQUEST['board'];

        //블록이동
        //이전 블록
        
        //다음
        //처음페이지 이동
        if($page != 1){
            echo "<a style='margin: 0px 10px 0px 10px; font-weight: bolder; font-size: 25px; color: black' href='board.php?page=1&board=$boardTypePage'>처음</a>";
        } else {
            //현재 페이지가 첫페이지일 경우에는 링크를 걸지 않고 색상으로 첫페이지를 표시함.
            echo "<a style='margin: 0px 10px 0px 10px; font-weight: bolder; font-size: 25px; color: #007bff; ' >처음</a>";
        }

        //이전 블록 이동
        $prevBlock = $startPage -1;
        if($prevBlock < 1){
            $prevBlock = 1;
        }
        if($startPage != 1){
            echo "<a style='margin: 0px 10px 0px 10px; color: black; font-size: 25px' href='board.php?page=$prevBlock&board=$boardTypePage'>◀︎</a>";
        }
        //첫블록은 이동할 이전 블록이 없으므로 표시하지 않음.

        //한블록 10개 페이지들 출력.
        for($i = $startPage; $i<$endPage; $i++){
            if($i > $totalPage) {
                break;
            }
            if($i == $page) {
                // margin 위 오른쪽 아래 왼쪽.
                echo "<a style='margin: 0px 10px 0px 10px; color: #007bff; font-weight: bolder; font-size: 25px;'>$i</a>";
            } else {
                echo "<a style='margin: 0px 10px 0px 10px; color: black; font-weight: bolder; font-size: 25px;' href='board.php?page=$i&board=$boardTypePage'>$i</a>";
            }
        }
        //다음 블록 이동.
        $nextBlock = $endPage;
//        if($nextBlock > $totalPage){
//            $nextBlock = $totalPage;
//        }
        if($nextBlock < $totalPage){
            echo "<a style='margin: 0px 10px 0px 10px; color: black; font-size: 25px' href='board.php?page=$nextBlock&board=$boardTypePage'>▶︎︎</a>";
        }
        //마지막 블록은 이동할 다음 블록이 없으므로 표시하지 않음.

        //끝 페이지 이동.
        if($page != $totalPage){
            echo "<a style='margin: 0px 10px 0px 10px; font-weight: bolder; font-size: 25px; color: black' href='board.php?page=$totalPage&board=$boardTypePage'>끝</a>";
        } else {
            //현재 페이지가 첫페이지일 경우에는 링크를 걸지 않고 색상으로 마지막 페이지를 표시함.
            echo "<a style='margin: 0px 10px 0px 10px; font-weight: bolder; font-size: 25px; color: #007bff; ' >끝</a>";
        }

        ?>
    </div>

</div>
</body>
</html>


<?php
include "bottomInfo.php";
?>
