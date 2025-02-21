<?= $this->extend('template/index') ?>
<?= $this->section('page-content') ?>

<h1>Machine Recap</h1>
<div class="date"></div>
<div class="insights">
    <!-- ACTIVE AREA -->
    <div class="sales">
        <h3 style="margin-bottom: 20px; text-align: center;">Item Details</h3>
        <div class="item-details" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px;">
            <div class="form-group">
                <label for="item-name" style="font-weight: bold;">Item Name:</label>
                <input type="text" id="item-name" name="item-name" value="<?= esc($item['itemName']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="equip-type" style="font-weight: bold;">Equip Type:</label>
                <input type="text" id="equip-type" name="equip-type" value="<?= esc($item['itemEquipType']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="cert-no" style="font-weight: bold;">Certificate No.:</label>
                <input type="text" id="cert-no" name="cert-no" value="<?= esc($item['itemCertNo']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="location" style="font-weight: bold;">Location:</label>
                <input type="text" id="location" name="location" value="<?= esc($item['itemLocation']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="rfid-no" style="font-weight: bold;">RFID No.:</label>
                <input type="text" id="rfid-no" name="rfid-no" value="<?= esc($item['itemUID']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="status" style="font-weight: bold;">Status:</label>
                <input type="text" id="status" name="status" value="<?= esc($item['itemStatus']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
        </div>
    </div>

    <!-- Product Details Section -->
    <div class="sales">
        <h3 style="margin-bottom: 20px; text-align: center;">Product Details</h3>
        <div class="product-details" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px;">
            <div class="form-group">
                <label for="manufacturer" style="font-weight: bold;">Manufacturer:</label>
                <input type="text" id="manufacturer" name="manufacturer" value="<?= esc($item['itemManufacturer']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="part-number" style="font-weight: bold;">Part Number:</label>
                <input type="text" id="part-number" name="part-number" value="<?= esc($item['itemPartNo']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="supplier" style="font-weight: bold;">Supplier:</label>
                <input type="text" id="supplier" name="supplier" value="<?= esc($item['itemSupplier']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group" style="grid-column: span 2;">
                <label for="description" style="font-weight: bold;">Description:</label>
                <textarea id="description" name="description" rows="4" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"><?= esc($item['itemDesc']) ?></textarea>
            </div>
            <div class="form-group" style="grid-column: 3; grid-row: span 2;">
                <label for="product-image" style="font-weight: bold;">Product Image:</label>
                <img src="<?= base_url(); ?>itemImage/<?= esc($item['itemImage']) ?>" alt="Product Image" style="width: 100%; height: auto; border-radius: 4px;">
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>