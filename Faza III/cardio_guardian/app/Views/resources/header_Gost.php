
<header class="w3-bar w3-padding-12 w3-mobile" style="background-color:rgb(216, 57, 43)">
    <!-- S leva nadesno -->
    <a href="<?= site_url() ?>" class="w3-bar-item w3-button letters"><i class="fa fa-heartbeat"></i> Home</a>

    <div class="w3-dropdown-hover w3-right">
        <a href="#" class="w3-bar-item w3-button letters"><i class="fa fa-user"></i> Gost</a>
        <div id="UserDropdownMenu" class="w3-dropdown-content w3-bar-block w3-card-4">
            <a href="<?= site_url("login") ?>" class="w3-bar-item w3-button"><i class="fa fa-drivers-license"></i> Uloguj se</a>
            <a href="<?= site_url("register") ?>" class="w3-bar-item w3-button"><i class="fa fa-user-plus"></i> Registruj se</a>
        </div>
    </div>
</header>

