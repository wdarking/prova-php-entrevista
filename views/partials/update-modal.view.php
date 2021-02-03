<!-- Modal -->
<div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUserModalLabel">Editar Usuário</h5>
                <a href="/" class="btn-close"></a>
            </div>
            <div class="modal-body">
                <form id="updateUserForm" action="/form_update.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $_GET['user_id'] ?>">
                    <div class="mb-3">
                        <label for="userName" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="userName" name="name" value="<?php echo $selectedUser->name ?>">
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="email" value="<?php echo $selectedUser->email ?>">
                    </div>
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
            var updateUserModal = new bootstrap.Modal(document.getElementById('updateUserModal'))
            updateUserModal.toggle()
            console.log('loaded')
        }
    })()
</script>
