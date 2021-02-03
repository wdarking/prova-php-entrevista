<!-- Delete Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Excluir Usuário</h5>
                <a href="/" class="btn-close"></a>
            </div>
            <div class="modal-body">
                <p>Você tem certeza que quer excluir o usuário <strong><?php echo $selectedUser->name ?></strong>?</p>
                <form id="deleteUserForm" action="/form_delete.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $_GET['user_id'] ?>">
                </form>
            </div>
            <div class="modal-footer">
                <a href="/" class="btn btn-secondary">Fechar</a>
                <button type="submit" form="deleteUserForm" class="btn btn-danger">Sim, excluir usuário</button>
            </div>
        </div>
    </div>
</div>
<script>
    (function() {
        window.onload = function() {
            var deleteUserModal = new bootstrap.Modal(document.getElementById('deleteUserModal'))
            deleteUserModal.toggle()
            console.log('loaded')
        }
    })()
</script>
