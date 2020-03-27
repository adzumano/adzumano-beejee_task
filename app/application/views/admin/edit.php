<link rel="stylesheet" href="../../public/styles/bootstrap.css">
<link href="../../public/styles/admin.css" rel="stylesheet">
<link href="../../public/styles/font-awesome.css" rel="stylesheet">
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/app/admin/edit/<?php echo $data['id']; ?>" method="post" >
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['name'],ENT_QUOTES); ?>" name="name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['email'],ENT_QUOTES); ?>" name="email">
                            </div>
                            <div class="form-group">
                                <label>Text</label>
                                <textarea class="form-control" rows="3" name="text"><?php echo htmlspecialchars($data['name'],ENT_QUOTES); ?></textarea>
                            </div>
                            <label>Status</label>
                            <div class="form-group">
                                <select name="task_status" class="browser-default custom-select custom-select-lg dropdown-primary">
                                    <option value="1" <?php if($data['task_status']=='1')?> selected="selected">Resolved</option>
                                    <option value="0" <?php if($data['task_status']=='0')?> selected="selected">Unresolved</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>