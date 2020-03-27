<script src="../public/scripts/jquery.js"></script>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (empty($list)): ?>
                            <p>The list of posts is empty</p>
                        <?php else: ?>
                            <table class="table" id="table-id">
                                <thead class="bg-dark">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Text</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
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
                                        <td><a href="/app/admin/edit/<?php echo $task['id']; ?>" class="btn btn-warning">Edit</a></td>
                                        <td><a href="/app/admin/delete/<?php echo $task['id']; ?>" class="btn btn-danger">Delete</a></td>
                                    </tr>   
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>