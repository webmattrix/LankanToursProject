<div class="col-12 position-fixed top-0" style="z-index: 9;">
    <div class="row">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250" class="p-0 curve-line">
            <path class="path" fill="#00cba9" fill-opacity="1" d="M0,192L48,192C96,192,192,192,288,176C384,160,480,128,576,138.7C672,149,768,203,864,213.3C960,224,1056,192,1152,176C1248,160,1344,160,1392,160L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
        </svg>

        <div class="header-menu">
            <div class="site-name">
                <span class="text-white">Lankan Tours</span>
            </div>
            <div class="d-block d-xl-none me-3 text-white fs-3 p-1">
                <iconify-icon icon="majesticons:menu" class="c-pointer text-white fs-2" onclick="viewMobileMenu();"></iconify-icon>
            </div>
            <div class="list">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Tours</a></li>
                    <li><a href="">History</a></li>
                    <li><a href="">Gallery</a></li>
                    <li><a href="">Contact</a></li>
                    <li class="border px-3 border-2" style="border-radius: 100vh;"><a href="">Join</a></li>
                    <li><i class="bi bi-three-dots-vertical text-white c-pointer"></i></li>
                </ul>
            </div>
        </div>

    </div>
</div>

<div class="header-menu-panel d-none d-xl-none" id="mobileHomeMenu">
    <div class="d-flex bg-white p-2 justify-content-center align-items-center position-absolute top-0 start-0 m-2 c-pointer" style="width: 30px; height: 30px; border-radius: 100%;" onclick="viewMobileMenu();">
        <iconify-icon icon="uil:arrow-left" class="fs-5 top-0 m-2" style="color: #20E133;"></iconify-icon>
    </div>
    <div class="d-flex flex-column align-items-center">
        <h1 class="mt-3 text-white fw-bold">Lankan Tours</h1>

        <div class="mt-5 text-white quicksand-SemiBold fs-5 d-flex flex-column gap-3 mobile-home-menu">
            <div class="">Home</div>
            <div class="">Tours</div>
            <div class="">History</div>
            <div class="">Gallery</div>
            <div class="">Contact</div>
        </div>

        <div class="signIn-signUP-box">
            <div class="c-pointer">Sign Up</div>
            <div class="c-pointer">Sign In</div>
        </div>
    </div>
</div>