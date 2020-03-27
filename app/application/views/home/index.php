<script src="public/scripts/jquery.js"></script>
<div class="container-fluid">
    <div class="row" style="padding-top:50px;">
        <div class="col-md-12">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="form-control">
                <button type="submit" class="btn btn-primary btn-block" onclick="showContent()" id="btnSubmit" style="margin-bottom:10px;width:10%;">Add Task</button>
                <form action="/app/admin/add" method="post" class="needs-validation" novalidate id="showContent" style="width:50%;display:none;">
                    <div class="form-group">
                        <label for="validationCustom01" style="padding-top:10px;">Name</label>    
                        <input class="form-control" type="text" name="name" id="validationCustom01" required>
                    </div>
                    <div class="form-group">
                        <label for="validationServerUsername" style="padding-top:10px;">Email</label>
                        <input class="form-control" type="text" name="email" id="validationServerUsername" aria-describedby="inputGroupPrepend3" required>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom03" style="padding-top:10px;">Text</label>
                        <textarea class="form-control" rows="3" name="text" id="validationCustom03" required></textarea>
                    </div>
                    <label>Status</label>
                    <div class="form-group">
                        <select name="task_status" class="browser-default custom-select custom-select-lg dropdown-primary">
                            <option value="Unresolved">Unresolved</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" id="btnSubmit" style="margin-bottom:10px;width:20%;">Add</button>
                    </div>
                </form>
                <?php if (empty($list)): ?>
                    <p>Список постов пуст</p>
                <?php else: ?>
                <table class="display nowrap cell-border hover" id="table-id">
                    <thead class="thead bg-primary text-white">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Text</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $task): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($task['id'], ENT_QUOTES); ?></td>
                            <td><?php echo htmlspecialchars($task['name'], ENT_QUOTES); ?></td>
                            <td><?php echo htmlspecialchars($task['email'], ENT_QUOTES); ?></td>
                            <td><?php echo htmlspecialchars($task['text'], ENT_QUOTES); ?></td>
                            <?php if($task['task_status'] == '0'):?>
                            <td><?php echo htmlspecialchars($task['task_status'] = 'Unresolved', ENT_QUOTES); ?></td>
                            <?php endif;?>
                            <?php if($task['task_status'] == '1'):?>
                            <td><?php echo htmlspecialchars($task['task_status'] = 'Resolved', ENT_QUOTES); ?></td>
                            <?php endif;?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

