<form action="" method="POST">
    <h5 style="margin: 40px 0px">THÔNG TIN THANH TOÁN ĐƠN HÀNG</h5>
    <div class="col-70">
        <div class="info-pay">
            <div class="pay-one">
                <h5>Hình thức thanh toán </h5>
                <select name="dh_pttt" id="">
                    <option value="0">chọn hình thức thanh toán</option>
                    <option value="one">Thanh toán trực tiếp</option>
                    <option value="two">Thanh toán chuyển khoản</option>
                </select>
            </div>

            <div class="pay-two">
                <h5>Thông tin người đặt</h5>
                <div class="small-pay-two">
                    <div style="display: flex">
                        <div>
                            <label for="">Tên khách hàng:</label>
                            <input type="text" name="ten_kh" placeholder="Ho ten" pattern=".{8,}" title="8 ký tự trở lên!" required>
                            <label for="">Số điện thoại:</label>
                            <input type="text" name="dien_thoai" placeholder="So dt">
                        </div>
                        <div>
                            <label for="">Email:</label>
                            <input type="email" name="email" placeholder="email" pattern=".{8,}" title="8 ký tự trở lên!" required>
                            <label for="">Địa chỉ</label>
                            <input type="text" name="dia_chi" placeholder="dia chi:" pattern=".{8,}" title="8 ký tự trở lên!" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pay-two">
                <h5>Thông tin người nhận</h5>
                <div class="small-pay-two">
                    <div>
                        <label for="">Tên khách hàng:</label>
                        <input type="text" name="ten_kh" placeholder="Ho ten" pattern=".{8,}" title="8 ký tự trở lên!" required>
                        <label for="">Số điện thoại:</label>
                        <input type="text" name="dien_thoai" placeholder="So dt" pattern=".{8,}" title="8 ký tự trở lên!" required>
                    </div>
                </div>
                <input type="checkbox" checked>Tôi đồng ý, với các điều khoản dịch vụ trên.
            </div>
        </div>

        <table class="table" style="text-align: center">
            <h5 style="margin: 20px 55px">Sản phẩm cần thành toán</h5>
            <tr>
                <th>Chọn</th>
                <th>STT</th>
                <th>Tên sách</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Hình</th>
                <th>Ngày đặt hàng</th>
                <th>Thành tiền</th>
            </tr>

        </table>
    </div>
    <div class="col-30">
        <div class="">
            <h5 style="margin: 20px 0">Tổng của đơn hàng</h5>
            <div>
                <div>
                    <span>Thanh toán 💵:</span>
                    <span style="float: right;"><strong>Tất cả sản phẩm</strong></span>
                </div>
                <div style="margin: 10px 0px;">
                    <span>Tổng sl sản phẩm 🔢:</span>
                    <span style="float: right;"><strong>
                        </strong>
                    </span>
                </div>
                <div>
                    <span>Tổng tạm tính 💵:</span>
                    <span style="float: right;"><strong>đ</strong></span>
                </div>
                <div style="margin: 10px 0;">
                    <span>Thành tiền 💵:</span>
                    <span style="float: right;"><strong>đ</strong></span>
                </div>
                <td><button type="submit" class="success">Đồng ý thanh toán</button></td>
                <div style="margin:40px 0px; margin-left: 240px">
                    <a href="?act=viewdonhang"><button type="button" class="btn btn-outline-primary">Quay
                            lại</button></a>
                </div>
            </div>
        </div>
    </div>
</form>