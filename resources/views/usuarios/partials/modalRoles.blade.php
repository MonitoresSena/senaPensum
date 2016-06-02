<div id="modal-roles" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Registrar Rol</h4>
      </div>
      <div class="modal-body">
        <input id="role_name" name="new_role" class="form-control" type="text" placeholder="Ingrese el nombre del rol">
      </div>
      <div class="modal-footer">
        <button id="save-role" type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
  jQuery(function(){
    jQuery("#save-role").click(function(){
      guardarRole();
      return false;
    });
  });
</script>