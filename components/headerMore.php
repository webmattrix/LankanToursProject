<?php

if (isset($_COOKIE["lt_theme"])) {
    $theme = $_COOKIE["lt_theme"];
    if ($_COOKIE["lt_theme"] == 'dark') {
        $color_theme = 'dark';
    } else {
        $color_theme = 'light';
    }
} else {
    $theme = false;
    $color_theme = 'light';
}

?>

<div class="d-flex gap-4 justify-content-center">
    <!-- <div style="width: 40px; height: 40px; background-color: #2E2E2E; box-shadow: 1px 1px 6px 5px rgba(255, 199, 0, 0.25); border-radius: 100%;" class="overflow-hidden c-pointer">
        <img src="./assets/img/flag.svg" class="w-100 h-100" style="object-fit: cover;">
    </div> -->
    <!-- <div style="width: 40px; height: 40px; background-color: #2E2E2E; box-shadow: 1px 1px 6px 5px rgba(255, 199, 0, 0.25); border-radius: 100%;" class="overflow-hidden d-flex justify-content-center align-items-center c-pointer" onclick="changeTheme('<?php echo ($theme); ?>');">
        <iconify-icon icon="tabler:moon-filled" class="fs-4" style="color: #7B7B7B;"></iconify-icon>
    </div> -->

    <div class="toggle-theme-container <?php echo ($color_theme); ?>" style="cursor: pointer;" onclick="changeTheme('<?php echo ($theme); ?>');" id="theme_changer">
        <div class="switch"></div>
        <span class="toggle-light">Light</span>
        <span class="toggle-dark">Dark</span>
    </div>

</div>
<div class="mt-3 d-flex align-items-center gap-2 header-more-panel" onclick="goProfile();">
    <iconify-icon icon="iconamoon:profile-circle-fill"></iconify-icon>
    <span class="x">Profile</span>
</div>
<div class="mt-1 d-flex align-items-center gap-2 header-more-panel" onclick="goWatchlist();">
    <iconify-icon icon="mdi:heart"></iconify-icon>
    <span class="x">Watchlist</span>
</div>
<div class="mt-1 d-flex align-items-center gap-2 header-more-panel" onclick="goMyTours();">
    <iconify-icon icon="mdi:flight"></iconify-icon>
    <span class="x">My Tours</span>
</div>