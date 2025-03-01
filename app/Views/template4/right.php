<div class="right">
    <div class="top">
        <button id="menu-btn">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <div class="theme-toggler">
            <span class="lni lni-sun"></span>
            <span class="fa-regular fa-moon"></span>
        </div>
        <div class="profile">
            <div class="info">
                <p>Hey, <b>Metronarc</b></p>
                <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photos" style="width: 2.8rem; height: 2.8rem;">
                <a href="Machine/Machine.php"><img src="<?= base_url(); ?>img/Logo.png" alt="AdminLogo"></a>
            </div>
        </div>
    </div>
    <div class="recent-updates">
        <h2 style="margin-bottom: 0.5em"></h2>
        <div class="updates">
            <div class="update">
                <div class="profile-photo">
                    <img src="<?= base_url(); ?>img/<?=
                        $machines[0]['State'] === 'OFF' ? 'machineInactive.png' : ($machines[0]['State'] === 'IDLE' ? 'machineIDLE.png' : ($machines[0]['State'] === 'INSPECT' ? 'machineInspect.png' : 'machineActive.png')); ?>"
                        alt="Machine State">

                </div>
                <div class="message">
                <h2 class="machine-status" style="font-size: 1.2rem;">Machine Status: <?= esc($machines[0]['State']) ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="recent-updates">
        <h2 style="margin-bottom: 0.5em"></h2>
        <div class="updates">
            <div class="update" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                <!-- Welder Name -->
                <h2 style="font-size: 1.2rem; font-weight: bold; margin-bottom: 10px;">
                    Welder Name: <?= esc($machines[0]['Name']) ?>
                </h2>

                <!-- Welder Photo -->
                <div class="welder-photo">
                    <img src="<?= base_url(); ?>img/<?= esc($machines[0]['welder_image']) ?>"
                        alt="Welder Photo"
                        style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<script>
    function fetchMachineState(machineID) {
        $.ajax({
            url: '<?= base_url('monitoring/getMachineStateDetails/') ?>' + machineID,
            method: 'GET',
            success: function(data) {
                if (data && data.length > 0) { // Ensure data is not empty
                    let machine = data[0]; // Since we expect only one row

                    let imageName;
                    switch (machine.State) {
                        case 'ON':
                            imageName = 'machineActive.png';
                            break;
                        case 'IDLE':
                            imageName = 'machineIDLE.png';
                            break;
                        case 'INSPECT':
                            imageName = 'machineInspect.png';
                            break;
                        default:
                            imageName = 'machineInactive.png';
                    }

                    // Update the image dynamically
                    $('.profile-photo img').attr('src', '<?= base_url(); ?>img/' + imageName);

                    $('.machine-status').text('Machine Status: ' + machine.State);
                }
            }
        });
    }

    // Call fetchMachineState every second
    setInterval(function() {
        fetchMachineState('<?= esc($machineID) ?>');
    }, 1000);
</script>