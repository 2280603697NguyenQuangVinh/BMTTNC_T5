<?php include 'app/views/shares/header.php'; ?>

<div class="container py-4">
    <h1 class="mb-4">Thông tin thanh toán</h1>

    <form method="POST" action="/webbanhang2/Product/processCheckout" class="shadow-sm p-4 rounded bg-light">
        <div class="mb-3">
            <label for="name" class="form-label">Họ tên:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Nhập họ tên người nhận" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ:</label>
            <textarea id="address" name="address" class="form-control" rows="3" placeholder="Nhập địa chỉ giao hàng" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Xác nhận thanh toán</button>
        <a href="/webbanhang2/Product/cart" class="btn btn-secondary ms-2">Quay lại giỏ hàng</a>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>
