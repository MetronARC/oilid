<?= $this->extend('template/index') ?>
<?= $this->section('page-content') ?>

<h1>Dashboard</h1>

<div class="date"></div>

<div class="insights">
    <!-- Form for input -->
    <div class="input-form">
        <h3 style="margin-bottom: 20px; text-align: center;">Input Machine Details</h3>
        <form id="searchForm" method="POST">
            <div class="form-row" style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                <div class="form-group" style="flex: 1; margin-right: 10px;">
                    <label for="uid" style="display: block; margin-bottom: 5px; font-weight: bold;">UID:</label>
                    <input type="text" id="uid" name="uid" placeholder="Enter UID" style="width: calc(100% - 20px); padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                <div class="form-group" style="flex: 1; margin-right: 0;">
                    <label for="item-name" style="display: block; margin-bottom: 5px; font-weight: bold;">Item Name:</label>
                    <input type="text" id="item-name" name="item-name" placeholder="Enter Item Name" style="width: calc(100% - 20px); padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
            </div>
            <div class="form-row" style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                <div class="form-group" style="flex: 1; margin-right: 10px;">
                    <label for="equip-type" style="display: block; margin-bottom: 5px; font-weight: bold;">Equip Type:</label>
                    <input type="text" id="equip-type" name="equip-type" placeholder="Enter Equip Type" style="width: calc(100% - 20px); padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                <div class="form-group" style="flex: 1; margin-right: 0;">
                    <label for="cert-no" style="display: block; margin-bottom: 5px; font-weight: bold;">Certificate No.:</label>
                    <input type="text" id="cert-no" name="cert-no" placeholder="Enter Certificate No." style="width: calc(100% - 20px); padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
            </div>
            <div class="form-row" style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                <div class="form-group" style="flex: 1; margin-right: 10px;">
                    <label for="location" style="display: block; margin-bottom: 5px; font-weight: bold;">Location:</label>
                    <input type="text" id="location" name="location" placeholder="Enter Location" style="width: calc(100% - 20px); padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                <div class="form-group" style="flex: 1; margin-right: 0;">
                    <label for="status" style="display: block; margin-bottom: 5px; font-weight: bold;">Status:</label>
                    <select id="status" name="status" style="width: calc(100% - 20px); padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                        <option value="">Select Status</option>
                        <option value="accept">Accept</option>
                        <option value="fail">Fail</option>
                        <option value="quarantine">Quarantine</option>
                    </select>
                </div>
            </div>
            <div class="form-buttons" style="display: flex; justify-content: flex-end; margin-top: 20px;">
                <button type="submit" style="margin-left: 10px; padding: 10px 15px; border: none; border-radius: 4px; background-color: #007bff; color: white; cursor: pointer; transition: background-color 0.3s;">Search</button>
                <button type="reset" style="margin-left: 10px; padding: 10px 15px; border: none; border-radius: 4px; background-color: #6c757d; color: white; cursor: pointer; transition: background-color 0.3s;">Reset</button>
            </div>
        </form>
    </div>
</div>

<div class="recent-orders">
    <h2>Recent Arc Activity</h2>
    <table>
        <thead>
            <tr>
                <th>Item Name</th>
                <th>UID</th>
                <th>Cert No.</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="resultsTableBody">
            <!-- Results will be populated here -->
        </tbody>
    </table>
</div>
<!-- END OF INSIGHTS -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Validate that at least one field is filled
            if (!$('#uid').val() && !$('#item-name').val() && !$('#equip-type').val() && !$('#cert-no').val() && !$('#location').val() && !$('#status').val()) {
                alert('Please fill at least one field to search.');
                return;
            }

            // Send AJAX request
            $.ajax({
                url: '<?= site_url('user/search') ?>',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
                    // Clear previous results
                    $('#resultsTableBody').empty();

                    // Populate the table with new results
                    if (data.length > 0) {
                        $.each(data, function(index, item) {
                            $('#resultsTableBody').append(
                                `<tr>
                                    <td>${item.itemName}</td>
                                    <td>${item.itemUID}</td>
                                    <td>${item.itemCertNo}</td>
                                    <td>${item.itemStatus}</td>
                                    <td><a href="<?= site_url('itemDetails') ?>/${item.ID}">View Details</a></td>
                                </tr>`
                            );
                        });
                    } else {
                        $('#resultsTableBody').append('<tr><td colspan="5" style="text-align: center;">No records found.</td></tr>');
                    }
                },
                error: function() {
                    alert('An error occurred while processing your request.');
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>
