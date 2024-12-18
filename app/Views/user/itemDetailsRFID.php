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
                <input type="text" id="item-name" name="item-name" value="" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="equip-type" style="font-weight: bold;">Equip Type:</label>
                <input type="text" id="equip-type" name="equip-type" value="" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="cert-no" style="font-weight: bold;">Certificate No.:</label>
                <input type="text" id="cert-no" name="cert-no" value="" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="location" style="font-weight: bold;">Location:</label>
                <input type="text" id="location" name="location" value="" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="rfid-no" style="font-weight: bold;">RFID No.:</label>
                <input type="text" id="rfid-no" name="rfid-no" value="" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="status" style="font-weight: bold;">Status:</label>
                <input type="text" id="status" name="status" value="" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
        </div>
    </div>

    <!-- Product Details Section -->
    <div class="sales">
        <h3 style="margin-bottom: 20px; text-align: center;">Product Details</h3>
        <div class="product-details" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px;">
            <div class="form-group">
                <label for="manufacturer" style="font-weight: bold;">Manufacturer:</label>
                <input type="text" id="manufacturer" name="manufacturer" value="" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="part-number" style="font-weight: bold;">Part Number:</label>
                <input type="text" id="part-number" name="part-number" value="" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="supplier" style="font-weight: bold;">Supplier:</label>
                <input type="text" id="supplier" name="supplier" value="" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group" style="grid-column: span 2;">
                <label for="description" style="font-weight: bold;">Description:</label>
                <textarea id="description" name="description" rows="4" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
            </div>
            <div class="form-group" style="grid-column: 3; grid-row: span 2;">
                <label for="product-image" style="font-weight: bold;">Product Image:</label>
                <img id="product-image" src="" alt="Product Image" style="width: 100%; height: auto; border-radius: 4px;">
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    let checkInterval;

    // Function to start checking the tmpRFID table
    function startCheckingTmpRFID() {
        checkInterval = setInterval(function() {
            $.ajax({
                url: '<?= site_url('itemDetails/checkTmpRFID') ?>',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data && !data.error) {
                        // If data is found, update the fields with the new item details
                        $('#item-name').val(data.itemName || '');
                        $('#equip-type').val(data.itemEquipType || '');
                        $('#cert-no').val(data.itemCertNo || '');
                        $('#location').val(data.itemLocation || '');
                        $('#rfid-no').val(data.itemUID || '');
                        $('#status').val(data.itemStatus || '');
                        $('#manufacturer').val(data.itemManufacturer || '');
                        $('#part-number').val(data.itemPartNo || '');
                        $('#supplier').val(data.itemSupplier || '');
                        $('#description').val(data.itemDesc || '');

                        // Set the product image source
                        $('#product-image').attr('src', '<?= base_url(); ?>itemImage/' + (data.itemImage || ''));
                    } else {
                        // Reset all fields to blank if no data is found
                        $('#item-name').val('');
                        $('#equip-type').val('');
                        $('#cert-no').val('');
                        $('#location').val('');
                        $('#rfid-no').val('');
                        $('#status').val('');
                        $('#manufacturer').val('');
                        $('#part-number').val('');
                        $('#supplier').val('');
                        $('#description').val('');
                        $('#product-image').attr('src', ''); // Reset the image source
                        console.error(data.error || 'No data returned');
                    }
                },
                error: function() {
                    // Reset all fields to blank on AJAX error
                    $('#item-name').val('');
                    $('#equip-type').val('');
                    $('#cert-no').val('');
                    $('#location').val('');
                    $('#rfid-no').val('');
                    $('#status').val('');
                    $('#manufacturer').val('');
                    $('#part-number').val('');
                    $('#supplier').val('');
                    $('#description').val('');
                    $('#product-image').attr('src', ''); // Reset the image source
                    console.error('Error checking tmpRFID');
                }
            });

        }, 1000); // Check every 1 second
    }

    // Start checking when the page loads
    $(document).ready(function() {
        startCheckingTmpRFID();
    });

    // Stop checking when the page is revisited with an itemID
    window.onbeforeunload = function() {
        clearInterval(checkInterval);
    };
</script>

<?= $this->endSection() ?>