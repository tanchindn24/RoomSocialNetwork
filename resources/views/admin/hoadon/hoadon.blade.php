<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <style>
    .table {
        border: 1px solid;
        border-collapse: collapse;
    }
    </style>
    <script>
    window.onload = function () {
        window.print();
    }   
    </script>
</head>
<body>
    <table style="font-style:italic">
        <tr>
            <td><b>Nhà Trọ: {{ $inbanhoadon->chutro->name }}</b></td>
        </tr>
        <tr>
            <td><b>Địa Chỉ: {{ $inbanhoadon->hopdong->phongtro->diachi }}</b></td>
        </tr>
        <tr>
            <td><b>Số điện thoại: {{ $inbanhoadon->chutro->phone }}</b></td>
        </tr>
    </table>
    <table align="center">
        <td style="font-size:20px"><b>HÓA ĐƠN THANH TOÁN TIỀN PHÒNG</b></td>
    </table>
    <table style="font-size:15px" align="center">
        <th>
            <table align="left">
                <tr>
                    <th><b>Phòng</b></th>
                    <td><b>{{ $inbanhoadon->hopdong->phongtro->tenphong }}</b></td>
                </tr>
                <tr>
                    <th><b>Tháng</b></th>
                    <td><b>{{ date('m', strtotime($inbanhoadon->ngaytao)) }}</b></td>
                </tr>
            </table>
        </th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>
            <table align="right">
                <tr>
                    <th><b>Tổng tiền thanh toán</b></th>
                </tr>
                <tr>
                    <th><b>{{ number_format(($inbanhoadon->hopdong->phongtro->gia)+($inbanhoadon->tien_dien)+($inbanhoadon->tien_nuoc)+($inbanhoadon->tien_dich_vu_khac)) }} vnđ</b></th>
                </tr>
            </table>
        </th>
    </table>
    <table align="center" class="table" style="width: 50%;" style="font-size:18px">
        <tr class="table">
            <th class="table">STT</th>
            <th class="table">Loại tiền</th>
            <th class="table">Số mới</th>
            <th class="table">Số cũ</th>
            <th class="table">Đã dùng</th>
            <th class="table">Thành tiền</th>
        </tr>
        <tr class="table">
            <td class="table">1</td>
            <td class="table">Điện</td>
            <td class="table">...</td>
            <td class="table">...</td>
            <td class="table">...</td>
            <td class="table" align="right">{{ number_format($inbanhoadon->tien_dien) }}</td>
        </tr>
        <tr class="table">
            <td class="table">2</td>
            <td class="table">Nước</td>
            <td class="table"></td>
            <td class="table"></td>
            <td class="table"></td>
            <td class="table" align="right">{{ number_format($inbanhoadon->tien_nuoc) }}</td>
        </tr>
        <tr class="table">
            <td class="table">3</td>
            <td class="table">Khác</td>
            <td class="table" align="right" colspan="4">{{ number_format($inbanhoadon->tien_dich_vu_khac) }}</td>
        </tr>
        <tr class="table">
            <td class="table">4</td>
            <td class="table">Phòng</td>
            <td class="table" align="right" colspan="4">{{ number_format($inbanhoadon->hopdong->phongtro->gia) }}</td>
        </tr>
        <tr class="table">
            <td class="table">5</td>
            <td class="table">Tiền cọc</td>
            <td class="table" align="right" colspan="4">0</td>
        </tr>
        <tr class="table">
            <td class="table">6</td>
            <td class="table">Nợ cũ</td>
            <td class="table" align="right" colspan="4">0</td>
        </tr>
        <tr class="table">
            <td class="table">7</td>
            <td class="table">Tổng cộng</td>
            <td class="table" align="right" colspan="4">{{ number_format(($inbanhoadon->hopdong->phongtro->gia)+($inbanhoadon->tien_dien)+($inbanhoadon->tien_nuoc)+($inbanhoadon->tien_dich_vu_khac)) }}</td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <th><b>xin vui lòng thanh toán tiền từ ngày 1 đến ngày 5 hàng tháng</b></th>
        </tr>
        <tr>
            <td><b>chuyển khoản hoặc liên hệ trực tiếp chủ nhà để thanh toán</b></td>
        </tr>
        <tr>
            <td><b>STK:</b></td>
        </tr>
    </table>
</body>
</html>