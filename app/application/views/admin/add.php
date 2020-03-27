<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/app/admin/add" method="post" class="needs-validation" novalidate>
                            <div class="form-group">
                                <label for="validationCustom01">Name</label>    
                                <input class="form-control" type="text" name="name" id="validationCustom01" required>
                            </div>
                            <div class="form-group">
                                <label for="validationServerUsername">Email</label>
                                <input class="form-control" type="text" name="email" id="validationServerUsername" aria-describedby="inputGroupPrepend3" required>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom03">Text</label>
                                <textarea class="form-control" rows="3" name="text" id="validationCustom03" required></textarea>
                            </div>
                            <label>Status</label>
                            <div class="form-group">
                                <select name="task_status" class="browser-default custom-select custom-select-lg dropdown-primary">
                                    <option value="Unresolved">Unresolved</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
