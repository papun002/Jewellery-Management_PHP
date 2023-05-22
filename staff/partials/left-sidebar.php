<!-- Start main left sidebar menu -->
<div class="main-sidebar sidebar-style-3" >
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="index.php"><?php echo $_SESSION['client_name']; ?></a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="staff_dashboard.php">LKJ</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Dashboard</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fa fa-fire"></i><span>Dashboard</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="staff_dashboard.php">Statistics</a></li>
                            <li><a class="nav-link" href="staff_dashboard_1.php">Analytics</a></li>
                        </ul>
                    </li>

                    <li class="menu-header">Customer</li>
                    <li><a class="nav-link" href="add_customer.php"><i class="fa fa-user"></i> <span>Add Customer</span></a></li>
                    <li><a class="nav-link" href="all_customer.php"><i class="fa fa-users"></i> <span>All Customer</span></a></li> 

                    <li class="menu-header">Old Product</li>
                    <li><a class="nav-link" href="add_old_customer.php"><i class="fa fa-user"></i> <span>Add Customer</span></a></li>
                    <li><a class="nav-link" href="all_old_customer.php"><i class="fa fa-users"></i> <span>All Customer</span></a></li> 

                    <li class="menu-header">Stock</li>
                    <li><a class="nav-link" href="category.php"><i class="fa fa-shopping-basket"></i> <span>Category</span></a></li>
                    <li><a class="nav-link" href="product.php"><i class="fa fa-product-hunt"></i> <span>Product</span></a></li>                    
                    <li><a class="nav-link" href="stock.php"><i class="fa fa-product-hunt"></i> <span>Stock</span></a></li>                    

                    <li class="menu-header">Orders & Lists</li>                    
                    <li><a class="nav-link" href="all_orders.php"><i class="fa fa-shopping-cart"></i> <span>Orders</span></a></li>
                    <li><a class="nav-link" href="whishlist.php"><i class="fa fa-heart"></i> <span>Wishlist</span></a></li>

                    <li class="menu-header">Histories</li>
                    <li>
                        <a class="nav-link" href="selling_history.php"><i class="fa fa-history"></i> <span>Selling Histories</span></a></li>
                        <!-- <li><a class="nav-link" href="invoice.php"><i class="fa fa-file-text"></i> <span>Invoices</span></a> -->
                    </li>

                    <li class="menu-header">Settings</li>
                    <li><a class="nav-link" href="#"><i class="fa fa-gear"></i> <span>Setting</span></a></li>
                    
                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="fa fa-comments"></i> Messages</a>
                    </div>
            </aside>
        </div>