<!-- Modal -->
<div class="modal fade" id="updateColorsModal" tabindex="-1" aria-labelledby="updateColorsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateColorsModalLabel"><?php echo $selectedUser->name ?>: Editar Cores</h5>
                <a href="/" class="btn-close"></a>
            </div>
            <div class="modal-body">
                <form id="updateUserForm" action="/form_colors.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $_GET['user_id'] ?>">
                    <?php foreach ($colors as $color): ?>
                        <div class="form-check">
                            <?php $checked = '' ?>
                            <?php foreach ($selectedUser->colors as $currentColor): ?>
                                <?php if ($color->id == $currentColor['id']): $checked = 'checked="checked"'; endif ?>
                            <?php endforeach ?>
                            <input class="form-check-input" type="checkbox" value="<?php echo $color->id ?>" id="checkColor<?php echo $color->id ?>" name="colors[]" <?php echo $checked ?>>
                            <label class="form-check-label" for="checkColor<?php echo $color->id ?>">
                                <?php echo $color->name ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" form="updateUserForm" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
<script>
    (function() {
        window.onload = function() {
            var updateColorsModal = new bootstrap.Modal(document.getElementById('updateColorsModal'))
            updateColorsModal.toggle()
            console.log('loaded')
        }
    })()
</script>
