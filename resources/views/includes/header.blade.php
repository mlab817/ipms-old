@php
    $user = auth()->user();
@endphp

<div class="position-relative">
    <header class="Header flex-wrap flex-md-nowrap">
        <div class="Header-item">
            <a href="{{ route('dashboard') }}">
                <!-- PIPS logo -->
                <svg class="octicon color-text-primary" height="28" width="28" version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048" fill="currentColor">
                    <rect width="2048" height="2048" style="fill: #56d364" />
                    <path id="PIPS " fill="#000000" aria-label="PIPS"  d="M473.24 814.45L347.27 814.45L339.65 836.13L353.71 836.13Q375.39 836.13 388.87 843.16Q400.59 850.19 400.59 866.01Q400.59 878.9 396.48 888.27L318.55 1109.76L372.46 1109.76Q419.34 1109.76 439.84 1073.43Q446.88 1058.78 457.42 1028.31L512.5 874.8Q520.12 853.7 520.12 843.74Q520.12 820.3 491.41 815.62Q485.55 814.45 473.24 814.45ZM100 1258L247.66 843.16Q252.93 828.51 259.38 818.55Q271.68 799.8 291.02 793.35Q302.73 789.25 316.8 789.25L646.68 789.25Q673.63 789.25 681.25 803.31Q684.18 809.17 684.18 815.62L684.18 817.96Q684.18 829.68 674.22 854.88L589.26 1092.18Q585.16 1103.31 578.13 1113.27Q558.79 1140.81 521.88 1140.81L308.59 1140.81L267.58 1258L100 1258ZM896.29 853.12L755.08 1258L654.3 1258Q634.38 1258 627.34 1255.66Q607.42 1249.8 607.42 1229.88L607.42 1228.12Q607.42 1215.81 615.63 1194.72L711.13 920.5L791.99 920.5L800.2 897.65L786.13 897.65Q753.91 897.65 742.19 885.34Q735.74 877.73 735.74 866.01Q735.74 851.95 744.53 825.58L756.84 789.25L865.23 789.25Q895.12 789.25 901.56 805.07Q904.49 810.34 904.49 817.96Q904.49 830.85 896.29 853.12ZM1203.91 814.45L1077.93 814.45L1070.31 836.13L1084.38 836.13Q1106.05 836.13 1119.53 843.16Q1131.25 850.19 1131.25 866.01Q1131.25 878.9 1127.15 888.27L1049.22 1109.76L1103.13 1109.76Q1150 1109.76 1170.51 1073.43Q1177.54 1058.78 1188.09 1028.31L1243.16 874.8Q1250.78 853.7 1250.78 843.74Q1250.78 820.3 1222.07 815.62Q1216.21 814.45 1203.91 814.45ZM830.66 1258L978.32 843.16Q983.59 828.51 990.04 818.55Q1002.34 799.8 1021.68 793.35Q1033.4 789.25 1047.46 789.25L1377.34 789.25Q1404.3 789.25 1411.91 803.31Q1414.84 809.17 1414.84 815.62L1414.84 817.96Q1414.84 829.68 1404.88 854.88L1319.92 1092.18Q1315.82 1103.31 1308.79 1113.27Q1289.45 1140.81 1252.54 1140.81L1039.26 1140.81L998.24 1258L830.66 1258ZM1643.36 953.9L1643.95 953.9Q1642.19 959.76 1639.84 966.2Q1633.4 984.95 1640.43 994.91Q1647.46 1004.88 1675.59 1004.29L1810.35 1004.29Q1858.98 1004.29 1869.53 1021.87Q1872.46 1026.55 1872.46 1031.83L1872.46 1033Q1872.46 1038.86 1866.02 1056.44L1811.52 1212.3Q1808.01 1221.09 1801.56 1230.46Q1782.23 1258 1744.73 1258L1437.7 1258Q1404.88 1257.41 1394.92 1252.73Q1390.23 1250.97 1384.96 1245.7Q1378.52 1238.08 1378.52 1228.7L1378.52 1224.6Q1378.52 1214.64 1386.72 1190.62L1400.78 1150.77L1554.3 1150.77Q1542.58 1185.34 1541.41 1190.62Q1539.65 1197.65 1539.65 1202.34Q1539.65 1216.98 1551.37 1224.02Q1561.91 1231.05 1579.49 1231.05L1586.52 1231.05Q1628.71 1231.05 1638.67 1209.95Q1642.19 1202.34 1688.48 1067.57Q1693.16 1052.34 1685.55 1044.13Q1678.52 1035.93 1648.63 1035.93L1520.31 1035.93Q1469.92 1035.93 1458.79 1020.7Q1455.27 1015.42 1455.27 1008.39Q1455.27 1000.77 1461.72 982.61L1513.87 836.13Q1517.97 826.16 1523.24 818.55Q1535.55 799.8 1556.05 792.77Q1568.36 789.25 1579.49 789.25L1867.77 789.25Q1912.3 789.25 1917.58 791.01Q1931.05 793.35 1937.5 798.63Q1947.46 806.24 1947.46 820.89Q1947.46 833.2 1939.26 855.46L1925.2 897.06L1774.61 897.06L1782.81 874.21Q1790.43 853.12 1790.43 843.16Q1790.43 819.72 1761.72 815.03Q1755.86 813.86 1743.55 813.86L1617.58 813.86L1609.96 835.54L1624.02 835.54Q1645.7 835.54 1659.18 842.57Q1670.9 849.6 1670.9 865.42Q1670.9 878.31 1666.8 887.69L1643.36 953.9Z" />
                </svg>
            </a>
        </div>

        <div class="Header-item Header-item--full">
            <livewire:project-autocomplete />
        </div>

        <div class="Header-item mr-0 mr-md-3 flex-order-1 flex-md-order-none">
            <a href="/notifications" class="Header-link position-relative tooltipped tooltipped-sw" aria-label="You have unread notifications">
                <span class="mail-status unread"></span>
                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-bell">
                    <path d="M8 16a2 2 0 001.985-1.75c.017-.137-.097-.25-.235-.25h-3.5c-.138 0-.252.113-.235.25A2 2 0 008 16z"></path><path fill-rule="evenodd" d="M8 1.5A3.5 3.5 0 004.5 5v2.947c0 .346-.102.683-.294.97l-1.703 2.556a.018.018 0 00-.003.01l.001.006c0 .002.002.004.004.006a.017.017 0 00.006.004l.007.001h10.964l.007-.001a.016.016 0 00.006-.004.016.016 0 00.004-.006l.001-.007a.017.017 0 00-.003-.01l-1.703-2.554a1.75 1.75 0 01-.294-.97V5A3.5 3.5 0 008 1.5zM3 5a5 5 0 0110 0v2.947c0 .05.015.098.042.139l1.703 2.555A1.518 1.518 0 0113.482 13H2.518a1.518 1.518 0 01-1.263-2.36l1.703-2.554A.25.25 0 003 7.947V5z"></path>
                </svg>
            </a>
        </div>

        <div class="Header-item position-relative d-none d-md-flex">
            <details class="details-overlay details-reset">
                <summary class="Header-link" aria-haspopup="menu" role="button">
                    <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" data-view-component="true" height="16" width="16" class="octicon octicon-plus">
                        <path fill-rule="evenodd" d="M7.75 2a.75.75 0 01.75.75V7h4.25a.75.75 0 110 1.5H8.5v4.25a.75.75 0 11-1.5 0V8.5H2.75a.75.75 0 010-1.5H7V2.75A.75.75 0 017.75 2z"></path>
                    </svg> <span class="dropdown-caret"></span>
                </summary>
                <div class="dropdown-menu dropdown-menu-sw" role="menu">

                    <a role="menuitem" class="dropdown-item" href="{{ route('projects.create') }}">
                        New PAP
                    </a>

                    <a role="menuitem" class="dropdown-item" href="{{ route('projects.new_clone') }}">
                        Clone PAP
                    </a>

                    <div class="dropdown-divider"></div>

                    <a role="menuitem" class="dropdown-item" href="{{ route('pending_transfers.index') }}">
                        Pending Transfers
                    </a>

                </div>
            </details>

        </div>

        <div class="Header-item mr-0 mr-md-3 flex-order-1 flex-md-order-none" id="user-links">

            <details class="details-overlay details-reset">
                <summary class="Header-link name" aria-label="View profile and more" data-ga-click="Header, show menu, icon:avatar" aria-haspopup="menu" role="button">
                    <img class="avatar avatar-user" src="{{ $user->user_avatar() }}" width="20" height="20" alt="@mlab817">
                    <span class="dropdown-caret"></span>
                </summary>
                <details-menu class="dropdown-menu dropdown-menu-sw" role="menu">
                    <div class="Truncate">
                        <a role="menuitem" class="color-text-primary no-underline px-3 pt-2 pb-2 mb-n2 mt-n1 d-block">Signed in as
                            <strong class="Truncate-text">
                                {{ auth()->user()->username }}
                            </strong>
                        </a>
                    </div>
                    <div role="none" class="dropdown-divider"></div>
                    <a role="menuitem" class="dropdown-item" href="{{ route('projects.index') }}">
                        Your PAPs
                    </a>
                    <a role="menuitem" class="dropdown-item" href="/mlab817/starred" data-ga-click="Header, go to starred gists, text:starred gists">Starred gists</a>
                    <a role="menuitem" class="dropdown-item" href="https://docs.github.com" data-ga-click="Header, go to help, text:help">Help</a>
                    <div role="none" class="dropdown-divider"></div>
                    <a role="menuitem" class="dropdown-item" href="https://github.com/mlab817">Your profile</a>
                    <div role="none" class="dropdown-divider"></div>
                    <form class="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item dropdown-signout" role="menuitem">
                            Sign out
                        </button>
                    </form>
                </details-menu>
            </details>
        </div>
    </header>
</div>
