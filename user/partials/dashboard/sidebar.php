<!-- Sidebar -->
<div class="border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
        <a href="index.php">
            <img src="./assets/images/logo.png" width="150px" alt="" class="my-2 mr-1" />
        </a>
    </div>
    <div class="list-group list-group-flush">
        <a href="dashboard.php?page=index" class="list-group-item list-group-item-action {{ (request()->is('dashboard')) ? 'active' : '' }} ">
            Dashboard
        </a>
        <a href="dashboard.php?page=transactions" class="list-group-item list-group-item-action {{ (request()->is('dashboard/transactions*')) ? 'active' : '' }} ">
            Transactions
        </a>
        <a href="dashboard.php?page=account" class="list-group-item list-group-item-action {{ (request()->is('dashboard/account*')) ? 'active' : '' }} ">
            My Account
        </a>
        <div class="dropdown-divider"></div>
        <a href="index.php?page=logout" class="btn btn-danger nav-link px-4 mx-2 text-white">
            Sign Out
        </a>
    </div>
</div>
