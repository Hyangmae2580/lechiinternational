<?php

// 레치인터내셔널 이메일
$to = "hyangmae2580@naver.com";

// 고객이 입력한 내용
$inquiry_type = htmlspecialchars($_POST["inquiry_type"] ?? "");
$product = htmlspecialchars($_POST["product"] ?? "");
$message = htmlspecialchars($_POST["message"] ?? "");
$name = htmlspecialchars($_POST["name"] ?? "");
$company = htmlspecialchars($_POST["company"] ?? "");
$phone = htmlspecialchars($_POST["phone"] ?? "");
$email = htmlspecialchars($_POST["email"] ?? "");
$business_number = htmlspecialchars($_POST["business_number"] ?? "");

// 제목
$subject = "[홈페이지 문의] " . $product;

// 이메일 내용
$body = "
========================================
레치인터내셔널 홈페이지 문의
========================================

문의 유형 : $inquiry_type

제품명 : $product

문의내용 :
$message


----------------------------------------
문의자 정보
----------------------------------------

성명 : $name

회사명 : $company

연락처 : $phone

이메일 : $email

사업자등록번호 : $business_number


========================================
LECHI INTERNATIONAL
========================================
";

// 이메일 헤더
$headers = "From: LECHI INTERNATIONAL <hyangmae2580@naver.com>\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// 이메일 발송
$result = mail(
    $to,
    "=?UTF-8?B?" . base64_encode($subject) . "?=",
    $body,
    $headers
);


// 결과
if ($result) {

    echo "
    <!DOCTYPE html>
    <html lang='ko'>
    <head>
        <meta charset='UTF-8'>
        <title>문의 접수 완료</title>

        <style>

            body {
                margin: 0;
                background: #f4f7fa;
                font-family: Arial, 'Malgun Gothic', sans-serif;
            }

            .complete {
                max-width: 650px;
                margin: 150px auto;
                padding: 60px 40px;

                background: white;

                text-align: center;

                border-radius: 10px;

                box-shadow:
                    0 10px 40px rgba(0,0,0,0.08);
            }

            h1 {
                color: #123b68;
                margin-bottom: 20px;
            }

            p {
                color: #666;
                line-height: 1.8;
            }

            a {
                display: inline-block;

                margin-top: 25px;

                padding: 14px 30px;

                background: #123b68;

                color: white;

                text-decoration: none;

                border-radius: 5px;
            }

        </style>
    </head>

    <body>

        <div class='complete'>

            <h1>문의가 접수되었습니다.</h1>

            <p>
                레치인터내셔널에 문의해 주셔서 감사합니다.<br>
                담당자가 확인 후 연락드리겠습니다.
            </p>

            <a href='index.html'>
                홈페이지로 돌아가기
            </a>

        </div>

    </body>
    </html>
    ";

} else {

    echo "
    <script>
        alert('문의 전송에 실패했습니다.\\n전화 또는 이메일로 문의해 주세요.');
        history.back();
    </script>
    ";

}

?>