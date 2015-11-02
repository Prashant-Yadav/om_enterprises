<style type="text/css">
    .date {
        background-color: white;
    }
</style>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html">Om Enterprises</a>
    </div>

    <!-- Top Menu items -->
    <ul class="nav navbar-right top-nav">
        <li>
            <a href="#">
              <?php
                echo date("d/m/Y");
              ?>  
            </a>
        </li>
        <li>
            <a href="includes/logout.php">Logout</a>
        </li>
    </ul>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
            </li>
            <li>
                <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
            </li>
            <li>
                <a href="add_item.php"><i class="fa fa-fw fa-table"></i> Add New Item</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>