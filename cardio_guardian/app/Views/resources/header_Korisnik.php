<!-- Header -->

<header class="w3-bar w3-padding-12  w3-mobile" style="background-color:rgb(216, 57, 43)">
    <!-- S leva nadesno -->
    <a href="<?= site_url() ?>" class="w3-bar-item w3-button letters"><i class="fa fa-home"></i> Home</a>

    <div class="w3-dropdown-hover w3-right">
        <a href="<?= site_url("$controller/profil/" . session()->get('userid')) ?>" class="w3-bar-item w3-button letters"><i class="fa fa-user"></i> <?= $korisnikModel->findUserUsername(session()->get('userid')) ?></a>
        <div id="UserDropdownMenu" class="w3-dropdown-content w3-bar-block w3-card-4">
            <a href="<?= site_url("$controller/logout") ?>" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> Izloguj se</a>
        </div>
    </div>

</header>

