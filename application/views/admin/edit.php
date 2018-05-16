<form action="/admin/edit/<?php echo $vars['data']['id']; ?>" class="form-signin" method="post" enctype="multipart/form-data" id="create_form">
    <h1 class="h3 mb-3 font-weight-normal">Edit Task</h1>
    <textarea class="form-control" name="text" id="text" rows="3"><?php echo htmlspecialchars($vars['data']['text'], ENT_QUOTES); ?></textarea>
    <div id="len"><span id="text-max-length">400</span> characters left</div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Status</label>
        <select class="form-control" id="exampleFormControlSelect1" name="status" style="height:50px;">
            <?php if($vars['data']['status'] == 'Performed'): ?>
                <option value="<?php echo htmlspecialchars($vars['data']['status'], ENT_QUOTES); ?>"><?php echo htmlspecialchars($vars['data']['status'], ENT_QUOTES); ?></option>
                <option value="Done">Done</option>
            <?php elseif ($vars['data']['status'] == 'Done'): ?>
                <option value="<?php echo htmlspecialchars($vars['data']['status'], ENT_QUOTES); ?>"><?php echo htmlspecialchars($vars['data']['status'], ENT_QUOTES); ?></option>
                <option value="Performed">Performed</option>
            <?php endif; ?>
        </select>
    </div>
    <button class="btn btn-lg btn-primary btn-block" name="edit" type="submit">Change</button>
</form>