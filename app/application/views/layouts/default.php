<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="public/styles/main.css">
        <link rel="stylesheet" href="public/styles/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="public/scripts/DataTables/datatables.min.css"/>
    </head>
    <body>
        <nav class="navbar bg-primary justify-content-between">
            <a class="navbar-brand text-white">Navbar</a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <a class="btn btn-outline-info my-2 my-sm-0" href="/app/admin/login">Log In</a>
            </form>
        </nav>
        <?php echo $content; ?>
        <script src="public/scripts/jquery.js"></script>
        <script src="public/scripts/form.js"></script>
        <script src="public/scripts/popper.js"></script>
        <script src="public/scripts/bootstrap.js"></script>
        <script src="public/scripts/show_content.js"></script>
        <script src="public/scripts/task_datatable_home.js"></script>
        <script type="text/javascript" src="public/scripts/DataTables/datatables.min.js"></script>
    </body>
</html>