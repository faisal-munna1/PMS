
<div class="col-md-8 m-auto mt-md-5">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title w-100">
                Add Role Information
                <a href="index" class="btn btn-sm btn-primary float-end">Show Table</a>
            </div>
        </div>
        <form method="post" action="<?php echo $base_url?>/role/update">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" hidden class="form-control" id="id" value="<?php echo $data->id ?? "" ?>" name="id" aria-describedby="id">
                    <input type="text" class="form-control" id="name" value="<?php echo $data->name ?? "" ?>" name="name" aria-describedby="name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" value="<?php echo $data->description ?? "" ?>" id="description" name="description">
                </div>
            </div>
           <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="btn_submit">Update Role</button>
                 <a href="<?php echo $base_url; ?>/role/index" class="btn btn-secondary">  Cancel </a>
            </div>
        </form>
    </div>
</div>