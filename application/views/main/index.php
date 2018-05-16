<header>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <strong>Application-tasker</strong>
            </a>
            <a href="/main/createTask" class="navbar-brand d-flex align-items-center btn btn-secondary my-2">Create Task</a>
        </div>
    </div>
</header>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container sort" id="sort">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                    <a class="nav-link <?php if(strstr($_SERVER['REQUEST_URI'], 'all')){ echo 'active' ;}?>" href="<?php if($_SERVER['REQUEST_URI'] == '/'){ echo 'main/index/1/' ;}?>all">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(strstr($_SERVER['REQUEST_URI'], 'username')){ echo 'active' ;}?>" href="<?php if($_SERVER['REQUEST_URI'] == '/'){ echo 'main/index/1/' ;}?>username">User Name</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(strstr($_SERVER['REQUEST_URI'], 'email')){ echo 'active' ;}?>" href="<?php if($_SERVER['REQUEST_URI'] == '/'){ echo 'main/index/1/' ;}?>email">Email</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(strstr($_SERVER['REQUEST_URI'], 'status')){ echo 'active' ;}?>" href="<?php if($_SERVER['REQUEST_URI'] == '/'){ echo 'main/index/1/' ;}?>status">Status</a>
                </li>
            </ul>
        </div>
    </section>

    <div class="album bg-light">
        <div class="container">

            <div class="row">
                <?php foreach ($list as $k => $v): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <?php if(!empty($v['img'])):?>
                            <div class="img">
                                <img class="card-img-top" src="/public/images/<?php echo $v['img']; ?>" alt="Card image cap">
                            </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <div class="d-flex flex-column justify-content-between align-items-center">
                                    <span class="badge badge-primary m-1"><?php echo $v['username']; ?></span>
                                    <span class="badge badge-secondary m-1"><?php echo $v['email']; ?></span>
                                </div>
                                <p class="card-text"><?php echo $v['text']; ?></p>
                            </div>
                            <?php if($v['status'] == 'Done'): ?>
                            <div class="text-center bg-success text-white done">
                                Done
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </div>
                            <?php elseif ($v['status'] == 'Performed'): ?>
                            <div class="text-center bg-secondary text-white perf">
                                Performed
                                <i class="fa fa-spinner" aria-hidden="true"></i>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</main>

<footer class="text-muted">
    <div class="container d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <?php echo $pagination; ?>
        </nav>
    </div>
</footer>