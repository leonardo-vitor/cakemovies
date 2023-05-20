<?php if (!in_array("bs", $params)): ?>
    <div id="<?php echo $key; ?>Message"
         class="<?php echo !empty($params['class']) ? $params['class'] : 'message'; ?>"><?php echo $message; ?></div>
<?php else: ?>
    <?php $type = !empty($params['class']) ? $params['class'] : 'secondary'; ?>
    <div class="alert alert-<?= $type ?> alert-dismissible fade show" role="alert" id="<?php echo $key; ?>Message">
        <?php echo $message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>