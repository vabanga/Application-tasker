<form action="/main/createTask" class="form-signin" method="post" enctype="multipart/form-data" id="create_form">
    <h1 class="h3 mb-3 font-weight-normal">Create Task</h1>
    <input type="text" id="name" class="form-control" name="name" placeholder="Name" required autofocus>
    <div id="len"><span id="name-max-length">35</span> characters left</div>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email" data-validation="email" data-validation-error-msg-container="#error-email">
    <div id="len"><span id="email-max-length">35</span> characters left</div>
    <span id="error-email"></span>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="file" accept="image/jpeg,image/gif,image/png" name="file" data-validation-allowing="jpg, png, gif">
        <label class="custom-file-label" for="customFile">Choose file (jpg,png,gif)</label>
    </div>
    <textarea class="form-control" name="text" id="text" rows="3"></textarea>
    <div id="len"><span id="text-max-length">400</span> characters left</div>
    <button class="btn btn-lg btn-primary btn-block" name="create" type="submit">Create</button>
    <button class="btn btn-lg btn-success btn-block" name="prev" id="prev">Preview</button>
</form>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mdl">

                </div>
            </div>
        </div>
    </div>
</div>