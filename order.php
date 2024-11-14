<?php include 'includes/header.php'; ?>
<div class="container">
    <h2>Pemesanan Layanan</h2>
    <form id="orderForm" action="process_order.php" method="POST">
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="service">Layanan:</label>
            <select name="service" required>
                <option value="Web Development">Web Development</option>
                <option value="Mobile App Development">Mobile App Development</option>
                <option value="UI/UX Design">UI/UX Design</option>
            </select>
        </div>
        <div class="form-group">
            <label for="details">Detail Proyek:</label>
            <textarea name="details" rows="5" required></textarea>
        </div>
        <button type="submit">Ajukan Pesanan</button>
    </form>
</div>
<?php include 'includes/footer.php'; ?>
