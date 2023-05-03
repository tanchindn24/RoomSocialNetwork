<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TẠM TRÚ TẠM VẮNG</title>
    <script>
        window.onload = function () {
            window.print();
        }
    </script>
</head>
<body>
    <center>
        <p><strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong></p>
        <p><strong>Độc lập - Tự do - Hạnh phúc</strong></p>
        </br>
        </br>
        <p><strong>ĐƠN XIN XÁC NHẬN TẠM TRÚ/TẠM VẮNG</strong></p>
    </center>
    <center>
        <table>
            <tr>
                <td><strong>Kính gửi:</strong> Công an phường/xã/thị trấn</td>
                <td>......................................................</td>
            </tr>
            <tr>
                <td>Tôi tên là:</td>
                <td>{{ $tamtru->khachthue->name }}</td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td>{{ date('d-m-Y', strtotime($tamtru->khachthue->ngaysinh)) }}</td>
            </tr>
            <tr>
                <td>Số CMND: {{ $tamtru->khachthue->cmnd }}</td>
                <td>Cấp tại: {{ $tamtru->khachthue->noicapcmnd }} </br>Cấp ngày: {{ date('d-m-Y', strtotime($tamtru->khachthue->ngaycapcmnd)) }}</td>
            </tr>
            <tr>
                <td>Địa chỉ thường trú:</td>
                <td>{{ $tamtru->sonha }}, {{ $tamtru->maxaphuong->name }}, {{ $tamtru->maquanhuyen->name }},</br>{{ $tamtru->matinhthanhpho->name }}</td>
            </tr>
            <tr>
                <td>Chổ ở hiện nay:</td>
                <td>......................................................</td>
            </tr>
        </table>
        <table style="width: 93%; border: 1px">
            <tr>
                <td>Nay tôi làm đơn này kính xin ban Công an phường/xã/thị trấn	....................... xác nhận cho tôi đã tạm trú/tạm vắng tại địa chỉ này</td>
            </tr>
            <tr>
                <td>Lý do:...................................................................................................................................</td>
            </tr>
            <tr>
                <td>..........................................................................................................................................</td>
            </tr>
            <tr>
                <td>Xin cảm ơn!</td>
            </tr>
        </br>
            <tr>
                <td><strong>Xác nhận của Công an phường/xã/thị trấn</strong>..................................................................................</td>
            </tr>
            <tr>
                <td style="padding-left: 50%">.... Ngày....tháng....năm</td>
            </tr>
            <tr>
                <td style="padding-left: 54%"><strong>Người làm đơn</strong></td>
            </tr>
        </table>
    </center>
</body>
</html>