<?= $this->extend('template4/index') ?>
<?= $this->section('page-content') ?>

<!-- <p><strong>Name:</strong> <?= esc($machines[0]['Name']) ?></p>
<p><strong>Job Number:</strong> <?= esc($machines[0]['jobNumber']) ?></p> -->

<h1>Dashboard</h1>

<div class="date"></div>

<div class="insights">
    <div class="sales">
        <span class="material-symbols-outlined">engineering</span>
        <div class="middle">
            <div class="left">
                <h3>Project Name</h3>
                <h1><?= esc($machines[0]['jobName']) ?></h1>
            </div>
        </div>
    </div>
    <div class="sales">
        <span class="material-symbols-outlined">engineering</span>
        <div class="middle">
            <div class="left">
                <h3>Weld Metal</h3>
                <h1><?= esc($machines[0]['weldMetalName']) ?></h1> <!-- Dynamic uptime -->
            </div>
        </div>
    </div>
    <div class="sales">
        <span class="material-symbols-outlined">engineering</span>
        <div class="middle">
            <div class="left">
                <h3>Machine Up Time</h3>
                <h1 class="machine-up-time"></h1>
            </div>
        </div>
    </div>
</div>

<div class="insights" style="grid-template-columns: repeat(1, 1fr)">
<div class="sales">
        <h3 style="margin-bottom: 20px; text-align: center;">Project Details</h3>
        <div class="product-details" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px;">
            <div class="form-group">
                <label for="manufacturer" style="font-weight: bold;">Project Number:</label>
                <input type="text" id="manufacturer" name="manufacturer" value="<?= esc($machines[0]['jobNumber']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="part-number" style="font-weight: bold;">Project RFID Code:</label>
                <input type="text" id="part-number" name="part-number" value="<?= esc($machines[0]['jobRFID']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="supplier" style="font-weight: bold;">Project QR Code:</label>
                <input type="text" id="supplier" name="supplier" value="<?= esc($machines[0]['jobQR']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group" style="grid-column: span 2;">
                <label for="description" style="font-weight: bold;">Description:</label>
                <textarea id="description" name="description" rows="4" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"><?= esc($machines[0]['jobDescription']) ?></textarea>
            </div>
        </div>
    </div>
</div>

<div class="insights" style="grid-template-columns: repeat(1, 1fr)">
<div class="sales">
        <h3 style="margin-bottom: 20px; text-align: center;">Weld Metal Details</h3>
        <div class="product-details" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px;">
            <div class="form-group">
                <label for="manufacturer" style="font-weight: bold;">Weld Metal Number:</label>
                <input type="text" id="manufacturer" name="manufacturer" value="<?= esc($machines[0]['weldMetalNumber']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="part-number" style="font-weight: bold;">Weld Metal Cert Number:</label>
                <input type="text" id="part-number" name="part-number" value="<?= esc($machines[0]['weldMetalCertNumber']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="supplier" style="font-weight: bold;">Weld Metal RFID Code:</label>
                <input type="text" id="supplier" name="supplier" value="<?= esc($machines[0]['weldMetalRFID']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group">
                <label for="supplier" style="font-weight: bold;">Weld Metal QR Code:</label>
                <input type="text" id="supplier" name="supplier" value="<?= esc($machines[0]['weldMetalQR']) ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div class="form-group" style="grid-column: span 2;">
                <label for="description" style="font-weight: bold;">Description:</label>
                <textarea id="description" name="description" rows="4" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"><?= esc($machines[0]['weldMetalDescription']) ?></textarea>
            </div>
        </div>
    </div>
</div>

<script>
    // Pass PHP data to JavaScript as JSON
    let machinesData = <?= json_encode($machines, JSON_PRETTY_PRINT); ?>;

    // Log to the browser console for debugging
    console.log("Machines Data:", machinesData);
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function fetchArcTotal() {
        $.ajax({
            url: "<?= base_url('monitoring/getArcTotal/' . $machineID) ?>", // Call the new API
            type: "GET",
            dataType: "json",
            success: function(response) {
                console.log("Updated ArcTotal:", response.arcTotal);
                $(".machine-up-time").text(response.arcTotal); // Update the UI
            },
            error: function(xhr, status, error) {
                console.error("Error fetching ArcTotal:", error);
            }
        });
    }

    // Fetch ArcTotal every 1 second
    setInterval(fetchArcTotal, 1000);
</script>


<!-- END OF INSIGHTS -->

<?= $this->endSection() ?>