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
    </style>
    <title>시사제이</title>

</head>
<body>
<!--  메인 이미지 파일 -->
<script src="https://kit.fontawesome.com/ca9ee9bd9d.js"
        crossorigin="anonymous">
</script>
<!--    회원가입 검증 자바스크립트-->
<script type="text/javascript" src="signup2.js"></script>
<!--    아이디  중복체크 함수-->
<script>
    function id_check() {
//            window.open('checkemail.php?userEmail=' + document.getElementById('email').value,'중복체크','width=500, height=300, scrollbars=no, resizable=yes');
        if(id_form_check()){
            //ok
        }else{
            return false;
        }
        var id = document.getElementById('id').value;

        var form = document.createElement("form");
        form.setAttribute("charset", "UTF-8");
        form.setAttribute("method", "Post"); // Get 또는 Post 입력
        form.setAttribute("action", "checkinfo.php");

        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", "userID");
        hiddenField.setAttribute("value", id);
        form.appendChild(hiddenField);

        //checkinfo.php에 요청을 보낼때 어떤요청인지 정해서 보냄.
        var requestType = document.createElement("input");
        var type = 'id_check';
        requestType.setAttribute("type","hidden");
        requestType.setAttribute("name","requestType");
        requestType.setAttribute("value", type);
        form.appendChild(requestType);

        var url ="checkinfo.php";
        var title = "시사제이";
        var status = "toolbar=no,directories=no,scrollbars=no,resizable=yes,status=no,menubar=no,width=650, height=600, top=0,left=20";
        window.open("checkinfo.php", title,status); //팝업 창으로 띄우기. 원치 않으면 주석.
        form.target = title;
        document.body.appendChild(form);
        form.submit();
    }
    <!--    닉네 중복체크 함수-->

    function nickname_check() {
        if(nickname_form_check()){
            //ok
        }else{
            return false;
        }
        var nickname = document.getElementById('nickname').value;

        var form = document.createElement("form");
        form.setAttribute("charset", "UTF-8");
        form.setAttribute("method", "Post"); // Get 또는 Post 입력
        form.setAttribute("action", "checkinfo.php");

        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", "userNickName");
        hiddenField.setAttribute("value", nickname);
        form.appendChild(hiddenField);

        //checkinfo.php에 요청을 보낼때 어떤요청인지 정해서 보냄.
        var requestType = document.createElement("input");
        var type = 'nickname_check';
        requestType.setAttribute("type","hidden");
        requestType.setAttribute("name","requestType");
        requestType.setAttribute("value", type);
        form.appendChild(requestType);

        var url ="checkinfo.php";
        var title = "시사제이";
        var status = "toolbar=no,directories=no,scrollbars=no,resizable=yes,status=no,menubar=no,width=650, height=600, top=0,left=20";
        window.open("checkinfo.php", title,status); //팝업 창으로 띄우기. 원치 않으면 주석.
        form.target = title;
        document.body.appendChild(form);
        form.submit();
    }
</script>
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
<div style="margin-top: 50px; width: 900px; margin-left: auto; margin-right: auto;">
    <p style="text-align: center; font-weight: bolder; font-size: 50px; margin-bottom: 15px;">회원가입</p>

    <form action="sign-up-request.php" onsubmit="return form_check1()" method="post">

        <table width="940" style="padding:5px 0 5px 0; margin: auto;">
            <tr height="2px"  bgcolor="#007bff"><td colspan="2"></td></tr>
            <tr>
                <th>아이디</th>
                <td>
                    <input type="text" name="userID" id="id" maxlength="20">
                    <input type="button" style="background: #007bff;color: white; margin-left: 10px; padding: 5px;"onclick="id_check()" value="중복체크">
                </td>
            </tr>
            <tr>
                <th>비밀번호</th>
                <td><input type="password" name="userPW" id="password" maxlength="20" onkeyup="password_check()"></td>
            </tr>
            <tr>
                <th>비밀번호 확인</th>
                <td><input type="password" id="password_re" maxlength="20" onkeyup="password_check()">&nbsp;&nbsp;<span id="password_check"></span></td>
            </tr>
            <tr>
                <th>*</th>
                <td><p>아이디,비밀번호는 영문과 숫자를 반드시 포함하고 한글을 사용할 수 없으며 6자이상 20자이하 이어야합니다.</p></td>
            </tr>
            <tr>
                <th>질문답변 힌트</th>
                <td><select name='pwhint' size='1' class='select'>
                        <option value=''>선택하세요</option>
                        <option value='30'>졸업한 초등학교 이름은?</option>
                        <option value='31'>제일 친한 친구의 핸드폰 번호는?</option>
                        <option value='32'>아버지 성함은?</option>
                        <option value='33'>어머니 성함은?</option>
                        <option value='34'>어릴 적 내 별명은?</option>
                        <option value='35'>가장 아끼는 물건은?</option>
                        <option value='36'>좋아하는 동물은?</option>
                        <option value='37'>좋아하는 색깔은?</option>
                        <option value='38'>좋아하는 음식은?</option>
                    </select>
            </tr>
            <tr>
                </td>
                <th>질문답변 답</th>
                <td><input type='text' name='userPWAnswer' id="password_answer" maxlength="20"></td>
            </tr>
            <tr>
                <th>*</th>
                <td><p>질문 답변내용은 아이디/비밀번호 찾기시 사용되므로 신중하게 입력해주시길 바랍니다.</p></td>
            </tr>
            <tr>
                <th>닉네임</th>
                <td>
                    <input type="text" name="userNickName" id="nickname" maxlength="20"/>
                    <input type="button" style="background: #007bff;color: white; margin-left: 10px; padding: 5px;" onclick="nickname_check()" value="중복체크"/>
                </td>
            </tr>
            <tr>
                <th>*</th>
                <td><p>닉네임은 사이트 이용시 다른 사용자에게 표시되는 이름입니다. 특수문자를 사용할 수 없습니다.</p></td>
            </tr>

            <tr>
                <th>이메일</th>
                <td>
                    <input type="email" name="userEmail" id="email" maxlength="40">
                </td>
            </tr>
            <tr>
                <th>추가 정보 수신</th>
                <td class="s">
                    <input type="radio" name="userReceive" value="yes" checked> 수신
                    <input type="radio" name="userReceive" value="no"> 수신거부
                </td>
            </tr>
            <tr>
                <th>이용약관</th>
                <td>
                    <div style="margin: 20px; overflow: scroll; width:700px; height:150px; border: 1px solid black;">
                        <p class="condtions" style="font-size: 15px; white-space: normal;">
                            시사제이 회원 이용약관
                            [제 1 장 총칙]

                            제 1 조 (목적)
                            이 약관은 시사제(이하 "회사"라 합니다)가 제공하는 인터넷 관련 제반 서비스(이하 "서비스"라 한다)를 이용함에 있어 회사와 이용자와의 권리, 의무 및 책임 사항, 기타 필요한 사항을 규정하는데 목적이 있습니다. 여기서 시세제이라 함은 조선일보, 시사제이에서 제공하는 모든뉴스, 컨텐츠를 말합니다.

                            제 2 조 (약관의 명시, 효력 및 개정)
                            ① 이 약관의 내용은 “회원”이 쉽게 알 수 있도록 서비스 화면에 게시합니다.
                            ② 회사는 필요하다고 인정되는 경우 본 약관을 변경할 수 있으며, 회사가 약관을 변경할 경우에는 적용일자 및 변경사유를 명시하여 제1항과 같은 방법으로 그 적용일자 30일 전일까지 공지합니다. 다만, 회원에게 불리한 약관의 변경인 경우에는 로그인시 동의화면, E-mail, SMS 등으로 회원에게 개별 통지합니다. 단, 회원의 연락처 미기재, 변경 후 미수정 등으로 인하여 개별 통지가 어려운 경우에 한하여 본 항의 공지를 함으로써 개별 통지 한 것으로 간주합니다.
                            ③ 회사가 제 2 항에 따라 변경 약관을 공지 또는 통지하면서, 회원에게 약관 변경 적용일까지 거부의사를 표시하지 아니할 경우, 약관의 변경에 동의한 것으로 간주한다는 내용을 공지 또는 통지하였음에도 회원이 명시적으로 약관 변경에 대한 거부의사를 표시하지 아니하면, 회원이 변경 약관에 동의한 것으로 간주합니다. 회원은 변경된 약관 사항에 동의하지 않으면 서비스 이용을 중단하고 이용 계약을 해지할 수 있습니다.


                            제 3 조 (약관 이외의 준칙)
                            ① 이 약관에 언급되지 않은 사항은 전기통신기본법, 전기통신사업법, 정보통신망이용촉진 및 정보보호 등에 관한 법률 및 기타 관련 법령 또는 상관례에 따릅니다.
                            ② 이 약관은 회사가 제공하는 개별서비스에 관한 이용안내와 함께 적용합니다.

                            [제 2 장 서비스 이용 계약]


                            제 4조 (이용계약의 성립)
                            ① "약관에 동의하십니까?" 라는 이용신청시의 물음에 회원이 "동의함" 버튼을 클릭하면 이 약관에 동의하는 것으로 간주됩니다.
                            ② 이용계약은 서비스 이용 신청자가 이용약관에 동의한 후 회원가입 신청을 하고 ‘회사’가 이러한 신청에 대하여 승낙함으로써 성립됩니다. 다만, 회사가 필요하다고 인정하는 경우 회원에게 별도의 서류를 제출하도록 할 수 있습니다.
                            ③ 제 2항에 따른 신청에 있어 ‘회사’는 전문 기관을 통해 회원의 ‘실명확인 및 본인 확인’을 요청할 수 있습니다.
                            ④ 회사는 회원에 대해 회사 정책에 따라 등급별로 구분하여 이용시간, 이용횟수, 서비스 메뉴 등을 세분하여 이용에 차등을 둘 수 있습니다.
                            ⑤ 회사는 회사 정책 및 서비스 메뉴에 따라 회원에게 별도 가입을 위한 추가 정보를 요구할 수 있습니다. 이 때, 추가 약관에 대한 동의를 반드시 받습니다.
                            ⑥ 회사는 회원에 대하여 ‘영화 및 비디오물의진흥에 관한법률’ 및 ‘청소년 보호법’ 등에 따른 등급 및 연령 준수를 위해 이용 제한이나 등급별 제한을 할 수 있습니다.

                            제 5 조 (이용신청의 승낙 및 유보, 거절)
                            ① 회사는 ‘이용 신청자’의 신청에 대하여 ‘서비스’ 이용을 승낙함을 원칙으로 합니다.
                            ② 회사는 다음에 해당하는 경우, 그 사유가 해소될 때까지 승낙을 유보할 수 있습니다.
                            가. 서비스 관련 설비에 여유가 없는 경우
                            나. 기술상 지장이 있는 경우
                            다. 기타 회사가 재정적, 기술적으로 필요하다고 인정되는 경우
                            라. 본인 확인이 되지 않은 경우
                            마. 가입 조건이 성립되지 않은 경우
                            ③ 회사는 다음에 해당하는 경우, 가입을 승낙하지 않을 수 있습니다.
                            가. 다른 사람의 명의 또는 가명을 사용하여 신청하였을 경우
                            나. 이용 신청시 필요 내용을 허위로 기재하여 신청한 경우
                            다. 사회의 안녕 질서 또는 미풍양속을 저해할 목적으로 신청한 경우
                            라. 선정적이고 음란한 내용의 아이디를 신청할 경우
                            마. 반사회적이고 관계법령에 저촉되는 아이디를 신청할 경우
                            바. 비어, 속어라고 판단되는 아이디를 신청할 경우
                            사. 만14세 미만의 아동이 부모 등의 법정대리인의 동의를 얻지 않은 경우
                            아. 기타 회사가 정한 이용신청 요건에 맞지 않을 경우

                            제 6 조 (회원정보의 변경)
                            ① 회원은 개인정보관리 화면을 통하여 언제든지 본인의 개인 정보를 열람하고 수정할 수 있습니다. 다만, 서비스 관리를 위해 필요한 실명, 아이디 등은 수정이 불가능합니다.
                            ② 회원은 이용 신청시 기재한 사항이 회원 정보가 변경되었을 경우 온라인으로 수정을 하거나 전자우편 기타 방법으로 회사에 변경 사항을 알려야 합니다.
                            ③ 제 2항을 변경 사항을 회사에 알리지 않아 발생한 불이익에 대하여 ‘회사’는 책임을 지지 않습니다.

                            제 7 조 (개인정보보호 의무)
                            회사는 ‘정보통신망법’등 관계 법령이 정하는 바에 따라 회원의 개인정보를 보호하기 위해 노력합니다. 개인정보의 보호 및 사용에 대해서는 관련법 및 회사의 개인정보취급 방침이 적용됩니다. 다만, 회사의 공식 사이트가 아닌 사이트에서는 회사의 개인정보취급방침이 적용되지 않습니다.

                            제 8 조 (회원 아이디(ID)와 비밀번호 관리에 대한 회원의 의무)
                            ① 아이디(ID)와 비밀번호에 대한 모든 관리 책임은 회원에게 있으며, 회원에게 부여된 아이디(ID)와 비밀번호의 관리소홀, 부정사용에 의해 발생하는 불이익은 전적으로 회원에게 그 책임이 있습니다.
                            ② 회원은 아이디 및 비밀번호가 도용되거나 제3자가 사용하고 있음을 인지한 경우에는 이를 즉시 회사에 통보하여 회사의 안내에 따라야 합니다.

                            제 9 조 (회원에 대한 통지)
                            ① 회사가 회원에 대한 통지를 하는 경우 이 약관에 별도 규정이 없는 한 이메일 등으로 통지 할 수 있습니다.
                            ② 회사는 회원 전체에 대한 통지의 경우 7일 이상 회사의 게시판에 게시함으로써 제1항의 통지에 갈음할 수 있습니다.

                            [제3장 계약 당사자의 의무]


                            제 10 조 (회사의 의무)
                            ① 회사는 회원이 안전하게 서비스를 이용할 수 있도록 개인정보보호를 위한 보안 시스템을 갖추어야 하며, 유지·점검 또는 복구 등의 조치를 성실히 이행하여야 합니다.
                            ③ 회사는 서비스의 제공과 관련하여 알게 된 회원의 개인정보를 본인의 승낙 없이 제3자에게 누설, 배포하지 않고 이를 보호하기 위하여 노력합니다. 회원의 개인정보보호에 관한 기타의 사항은 정보통신망법 및 회사가 별도로 정한 개인정보취급방침에 따릅니다.
                            ③ 회사는 회원이 수신 동의를 하지 않은 영리 목적의 광고성 전자우편, SMS 문자메시지 등을 발송하지 아니합니다.
                            ④ 회사가 제3자와의 서비스 제공계약 등을 체결하여 회원에게 서비스를 제공하는 경우 회사는 각 개별서비스에서 서비스의 제공을 위하여 제3자에게 제공되는 회원의 구체적인 회원정보를 명시하고 회원의 개별적이고 명시적인 동의를 받은 후 동의의 범위 내에서 해당 서비스의 제공 기간 동안에 한하여 회원의 개인정보를 제3자와 공유하는 등 관련 법령을 준수합니다.
                            ⑤ 회사는 회원으로부터 제기되는 불만이 정당하다고 인정할 경우에는 이를 즉시 처리함을 원칙으로 합니다. 다만, 즉시 처리가 곤란한 경우에는 회원에게 그 사유와 처리 일정을 통보합니다.

                            제 11 조 (회원의 의무)
                            ① '회원'은 관계법령, 이 약관의 규정, 이용안내 및 주의사항 등 '회사'가 공지 또는 통지하는 사항을 준수해야 하며, 기타 '회사'의 업무에 방해되는 행위를 할 수 없습니다.
                            ② '회원'은 '회사'의 사전 승낙 없이 서비스를 이용하여 어떠한 영리 행위도 할 수 없습니다.
                            ③ '회원'은 서비스를 이용하여 얻은 정보를 '회사'의 사전 승낙 없이 복사, 복제, 변경, 번역, 출판, 방송 및 기타의 방법으로 사용하거나 이를 타인에게 제공할 수 없습니다.
                            ④ '회원'은 사진을 포함한 이미지 사용시 피사체에 대한 초상권, 상표권, 특허권 및 기타 권리를 자신이 취득해야 하며 만일 이들 권리에 대한 분쟁이 발생할 경우 회원이 모든 책임을 부담해야 합니다.
                            ⑤ 회원은 서비스 이용 시 다음 각 호의 행위를 하지 않아야 합니다.
                            가. 다른 회원의 ID및 개인정보를 수집, 저장하여 부정하게 사용하는 행위
                            나. 서비스에서 얻은 정보를 회사의 사전 승낙 없이 회원의 이용 이외의 목적으로 복제 하거나 이를 변경, 출판 및 방송 등에 사용하거나 타인에게 제공하는 행위
                            다. 회사의 저작권, 타인의 저작권 등 기타 권리를 침해하는 행위
                            라. 공공질서 및 미풍양속에 위반되는 내용의 정보, 문장, 도형 등을 타인에게 유포하는 행위
                            마. 범죄와 결부된다고 객관적으로 판단되는 행위
                            바. 타인의 명예를 훼손하거나 모욕하는 행위
                            사. 해킹 또는 컴퓨터바이러스를 유포하는 행위
                            아. 광고 또는 광고성 정보를 전송하거나 기타 영업을 위한 행위
                            자. 서비스의 안정적인 운영에 지장을 주거나 줄 우려가 있는 일체의 행위
                            차. 기타 관계 법령에 위배되는 행위
                            ⑥ 회원은 관계법령, 이 약관에서 규정하는 사항, 서비스 이용 안내 및 주의 사항을 준수하여야 합니다.

                            [제 4 장 서비스 제공 및 이용]


                            제 12 조 (서비스의 범주)
                            ① 이 약관은 회사가 개발하거나 다른 회사와의 제휴 계약 등을 통해 제공하는 일체의 모든 서비스에 기본적으로 적용되며, 다른 항의 별도 조항이 요구되는 서비스에는 부속약관을 둘 수 있습니다.
                            ② 개인화 영역이 있는 커뮤니티 서비스는 회원 가입과 동시에 가입된 아이디를 주소로 한 커뮤니티 서비스가 자동 생성됩니다.

                            제 13 조 (정보의 제공)
                            회사는 회원이 서비스 이용 중 필요하다고 인정되는 다양한 정보에 대해서 전자메일이나 서신우편, SMS(MMS) 등의 방법으로 회원에게 제공할 수 있습니다.
                            단, 회원이 전자메일 수신을 원하지 않을 경우 가입신청 메뉴와 회원정보수정 메뉴에서 정보수신거부를 할 수 있습니다.

                            제 14 조 (광고주와의 거래)
                            본 사이트에는 회사 이외의 광고주의 판촉활동을 위한 서비스가 포함되어 있습니다. 회사는 본 사이트에 게재되어 있거나 본 서비스를 통한 광고주의 판촉활동에 회원이 참여하여 거래한 결과로서 발생하는 모든 손실과 손해에 대해 책임을 지지 않습니다.

                            제 15 조 (회원의 게시물)
                            회사는 회원이 본 서비스를 통하여 게시, 게재, 전자메일 또는 달리 전송한 내용물에 대해 일체 민,형사상의 책임을 지지 않으며, 다음의 경우에 해당될 경우 사전통지 없이 삭제할 수 있습니다.
                            ① 다른 회원이나 타인을 비방하거나, 프라이버시를 침해하거나, 중상모략으로 명예를 손상시키는 내용인 경우
                            ② 서비스의 안정적인 운영에 지장을 주거나 줄 우려가 있는 경우
                            ③ 범죄적 행위에 관련된다고 인정되는 내용일 경우
                            ④ 회사의 지적재산권, 타인의 지적재산권 등 기타 권리를 침해하는 내용인 경우
                            ⑤ 회사에서 규정한 게시기간을 초과한 경우
                            ⑥ 선정적인 음란물을 게재하거나 음란사이트를 링크한 경우
                            ⑦ 기타 관계법령에 위반된다고 판단되는 경우

                            제 16 조 (게시물에 대한 권리 및 책임)
                            ① 회사의 이름으로 게시된 모든 게시물에 대한 저작권은 회사에 귀속됩니다.
                            ② 회사소유의 게시물에 대한 보호는 회사에서 하며, 회사의 허가 없이 타인에 의해 게시물이 다른 사이트에서 사용 또는 인용되는 것은 금지 됩니다.
                            ③ 회원이 게시한 저작물의 저작권은 회원의 소유에 속합니다. 다만 회원은 회사에 무료로 이용할 수 있는 권리를 허락한 것으로 봅니다.
                            ④ 회원이 서비스 내에 게시하는 게시물은 검색 결과 내지 서비스 및 관련 프로모션 등에 노출될 수 있으며, 해당 노출을 위해 필요한 범위 내에서는 일부 수정, 복제, 편집되어 게시될 수 있습니다. 이 경우, 회사는 저작권법 규정을 준수하며, 회원은 언제든지 해당 게시물에 대해 삭제, 검색 결과 제외, 비공개 등의 조치를 취할 수 있습니다.

                            제 17 조 (서비스 이용)
                            ① 서비스는 회사의 업무상 또는 기술상의 장애, 기타 특별한 사유가 없는 한 연중무휴, 1일 24시간 이용할 수 있습니다.
                            ② 회사는 설비의 점검 등 회사가 필요한 경우 또는 설비의 장애, 서비스 이용의 폭주 등 불가항력으로 인하여 서비스 이용에 지장이 있는 경우, 예외적으로 서비스 이용의 전부 또는 일부에 대하여 제한할 수 있습니다. 이 경우 회사는 회원에게 사전 또는 즉시 공지하여야 하며, 회사가 사전에 공지할 수 없는 부득이한 사유가 있는 경우 사후에 공지할 수 있습니다.
                            ② 회사는 제공하는 서비스 중 일부에 대한 서비스 이용시간을 별도로 정할 수 있으며, 이 경우 그 이용시간을 사전에 회원에게 공지 또는 통지합니다.

                            제 18 조 (포인트)
                            회사는 서비스의 효율적 이용 및 운영을 위해 사전 공지 후 포인트의 일부 또는 전부를 조정할 수 있으며, 포인트는 회사가 정한 기간에 따라 주기적으로 소멸 할 수 있습니다.

                            제 19 조 (이용계약의 해지)
                            ① 회원은 언제든지 서비스초기화면의 고객센터 또는 내 정보 관리 메뉴 등을 통하여 이용계약 해지 신청을 할 수 있으며, 회사는 관련법 등이 정하는 바에 따라 이를 즉시 처리하여야 합니다.
                            ② 회원이 계약 해지할 경우, 관련법 및 개인정보취급방침에 따라 회사가 회원정보를 보유하는 경우를 제외하고는 해지 즉시 회원의 모든 데이터는 소멸됩니다.
                            ③ 회원이 계약을 해지하는 경우 회원이 작성한 게시물 중 블로그 등과 같이 본인 계정에 등록된 게시물 일체가 삭제 됩니다. 다만, 타인에 의해 스크랩 등이 되어 재게시 되거나, 공용 게시판에 등록된 게시물은 삭제가 되지 않으니 사전에 삭제 후 탈퇴하시기 바랍니다.
                            ④ 회원이 회사가 정한 기간 동안 서비스를 이용하기 위해 회사의 서비스에 로그인(log-in)한 기록이 없는 경우 회사는 회원의 회원 자격을 상실 시킬 수 있습니다.

                            제 20 조 (서비스 이용 제한)
                            ① 회사는 회원이 이 약관의 의무를 위반하거나 서비스의 정상적인 운영을 방해한 경우, 경고, 일시 정지, 영구이용정지, 강제 탈퇴 등으로 서비스 이용을 단계적으로 제한할 수 있습니다.
                            ② 회원이 연속하여 일정 기간 동안 서비스를 이용하기 위해 회사의 서비스에 로그인(log-in)한 기록이 없는 경우 회사는 회원 정보의 보호 및 운영의 효율성을 위해 이용을 제한할 수 있습니다.
                            ③ 회사는 회원이 다음에 해당하는 행위를 하였을 경우 사전통지 없이 이용계약을 해지하거나 또는 기간을 정하여 서비스 이용을 중지할 수 있습니다.
                            가. 타인의 서비스 ID 및 비밀번호를 도용한 경우
                            나. 서비스 운영을 고의로 방해한 경우
                            다. 공공질서 및 미풍양속에 저해되는 내용을 고의로 유포시킨 경우
                            라. 회원이 국익 또는 사회적 공익을 저해할 목적으로 서비스이용을 계획 또는 실행하는 경우
                            마. 타인의 명예를 손상시키거나 불이익을 주는 행위를 한 경우
                            바. 서비스의 안정적 운영을 방해할 목적으로 다량의 정보를 전송하거나 광고성 정보를 전송하는 경우
                            사. 정보통신설비의 오작동 이나 정보 등의 파괴를 유발시키는 컴퓨터 바이러스 프로그램 등을 유포하는 경우
                            아. 회사, 다른 회원 또는 타인의 지적재산권을 침해하는 경우
                            자. 정보통신윤리위원회 등 외부기관의 시정요구가 있거나 불법선거 운동과 관련하여 선거관리위원회의 유권해석을 받은 경우
                            차. 타인의 개인정보, 회원ID 및 비밀번호를 부정하게 사용하는 경우
                            카. 회사의 서비스 정보를 이용하여 얻은 정보를 회사의 사전 승낙 없이 복제 또는 유통 시키거나 상업적으로 이용하는 경우
                            타. 회원이 자신의 홈페이지와 게시판에 음란물을 게재하거나 음란사이트를 링크하는 경우
                            파. 본 약관을 포함하여 기타 회사가 정한 이용조건 및 관계법령을 위반한 경우

                            [제 5 장 기 타]


                            제 21 조 (양도금지)
                            '회원'이 서비스의 이용권한, 기타 이용계약상 지위를 타인에게 양도하거나 담보로 제공할 수 없습니다.

                            제 22 조 (청소년보호)
                            회사는 모든 연령대가 자유롭게 이용할 수 있는 공간으로써 유해 정보로부터 청소년을 보호하고 청소년의 안전한 인터넷 사용을 돕기 위해 정보통신망법에서 정한 청소년보호정책을 별도로 시행하고 있으며, 구체적인 내용은 서비스 초기 화면 등에서 확인할 수 있습니다.

                            제 23 조 (면책조항)
                            ① 회사는 천재지변 또는 이에 준하는 불가항력으로 인하여 서비스를 제공할 수 없는 경우에는 서비스 제공에 관한 책임이 면제됩니다.
                            ② 회사는 회원의 귀책사유로 인한 서비스 이용의 장애에 대하여는 책임을 지지 않습니다.
                            ③ 회사는 회원이 서비스와 관련하여 게재한 정보, 자료, 사실의 신뢰도, 정확성 등의 내용에 관하여 책임을 지지 않습니다.
                            ④ 회사는 회원 간 또는 회원과 제 3자 상호간에 서비스를 매개로 하여 거래 등을 한 경우에는 책임이 면제됩니다.
                            ⑤ 회사는 회원의 이 약관상에 정하여진 의무 위반으로 인하여 회원 및 제3자에게 발생한 손해에 대해서는 책임을 부담하지 아니합니다.

                            제 24 조 (분쟁의 해결 및 관할법원)
                            ① '회사'와 '회원'은 서비스와 관련하여 발생한 분쟁을 원만하게 해결하기 위하여 필요한 모든 노력을 해야 합니다.
                            ② 제1항의 규정에도 불구하고, 동 분쟁으로 인하여 소송이 제기될 경우에는 '회사'의 소재지를 관할하는 법원을 관할법원으로 합니다.
                            ③ '회사'와 이용자간에 제기된 전자거래 소송에는 대한민국법을 준거법으로 합니다.
                        </p>
                    </div>
                    <input type="checkbox" id="conditions" name="conditions"/> 이용약관에 동의합니다.
                </td>
            </tr>
            <tr>
                <th>개인정보 약관</th>
                <td>
                    <div style="margin: 20px; overflow: scroll; width:700px; height:150px; border: 1px solid black;">
                        <p>
                            본인은 사이에 개인정보를 제공함에 따라 [개인정보 보호법] 제15조 및 제17조에 따라
                            아래의 내용으로 개인정보를 수집, 이용 및 제공하는데 동의합니다.
                            □ 개인정보의 수집 및 이용에 관한 사항
                            - 수집하는 개인정보 항목 (회원가입양식 내용 일체) : 이메일 그 外 회원가입 기재 내용 일체
                            - 개인정보의 이용 목적 : 수집된 개인정보를 사업장 관련 행정 처리, 공지사항 밑 아이디/비밀번호 찾기등 최소한의 정보로
                            목적 외의 용도로는 사용하지 않습니다.
                            □ 개인정보의 보관 및 이용 기간
                            - 귀하의 개인정보를 다음과 같이 보관하며, 수집, 이용 및 제공목적이 달성된 경우
                            [개인정보 보호법] 제21조에 따라 처리합니다.
                        </p>
                    </div>
                    <input type="checkbox" id="infoConditions" name="infoConditions"/> 개인정보 이용약관에 동의합니다.
                </td>

            </tr>
            <tr height="2px"  bgcolor="#007bff"><td colspan="2"></td></tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="회원가입" style=" outline: 0; border: 0; color: white; background: #007bff; padding: 10px; margin: 10px; ">
                    <input type="reset" value="취소" onclick="quit_signup()" style="outline: 0; border: 0; color: white; background: #007bff; padding: 10px; margin: 10px;">
                </td>
            </tr>
        </table>
    </form>

</div>

</body>
</html>



<?php
include "bottomInfo.php";
?>
