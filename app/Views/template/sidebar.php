<aside>
    <div class="top">
        <div class="logo">
            <img src="<?= base_url(); ?>img/oilid.png" alt="Ronstan Logo">
        </div>
        <div class="close" id="close-btn">
            <span class="material-symbols-outlined">close</span>
        </div>
    </div>

    <div class="sidebar">
        <a href="<?= base_url('user'); ?>" class="<?= ($sidebarData == "dashboard") ? 'active' : 'inactive' ?>">
            <span class="lni lni-grid-alt"></span>
            <h3>Dashboard</h3>
        </a>
        <a href="<?= base_url('itemDetailsRFID'); ?>" class="<?= ($sidebarData == "itemDetails") ? 'active' : 'inactive' ?>">
            <span class="lni lni-files"></span>
            <h3>Item Details</h3>
        </a>
        <a href="<?= base_url('logout') ?>">
            
            <h3></h3>
        </a>
    </div>
</aside>