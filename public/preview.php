<?php

//Отчистка images/tmp
if(isset($_POST['clean']))
{
    $tmp = scandir(__DIR__.'/images/tmp');

    if(isset($tmp[2]))
    {
        unset($tmp[0]);
        unset($tmp[1]);

        $count = count($tmp);
        $count++;

        for($i = 2; $i <= $count; $i++)
        {
            unlink(__DIR__.'/images/tmp/'.$tmp[$i]);
        }
    }
}
if(isset($_POST['prev']))
{
    if(!empty($_FILES))
    {

        $file = $_FILES['file']['tmp_name'];
        $newfile = __DIR__.'/images/tmp/'.$_FILES['file']['name'];

        if (!copy($file, $newfile)) {
            echo "не удалось скопировать $file...\n";
        }
        $nameFile = $_FILES['file']['name'];

    }
}

?>
<div class="card mb-4 box-shadow" id="preview">
    <?php if(!empty($_FILES)):?>
        <div class="img">
            <img class="card-img-top" src="/public/images/<?php echo $nameFile; ?>" alt="Card image cap">
        </div>
    <?php endif; ?>
    <div class="card-body">
        <div class="d-flex flex-column justify-content-between align-items-center">
            <span class="badge badge-primary m-1"><?php echo htmlspecialchars($_POST['name']); ?></span>
            <span class="badge badge-secondary m-1"><?php echo htmlspecialchars($_POST['email']); ?></span>
        </div>
        <p class="card-text"><?php echo htmlspecialchars($_POST['text']); ?></p>
    </div>
    <div class="text-center bg-secondary text-white perf">
        Performed
        <i class="fa fa-spinner" aria-hidden="true"></i>
    </div>
</div>