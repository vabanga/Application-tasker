<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/tasks">Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h2>Tasks</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $k => $v): ?>
                    <tr>
                        <th scope="row"><?php echo $v['username']; ?></th>
                        <td><?php echo $v['email']; ?></td>
                        <td><?php echo $v['status']; ?></td>
                        <td><a href="/admin/edit/<?php echo $v['id']; ?>" class="btn btn-primary">Edit</a></a></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<footer class="text-muted">
    <div class="container d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <?php echo $pagination; ?>
        </nav>
    </div>
</footer>