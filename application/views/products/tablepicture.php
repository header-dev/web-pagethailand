<table id="tb_images" class="table table-striped table-hover" width="100%">
  <thead>
        <tr>
          <th>Picture</th>
          <th>Link Picture</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          <?php if(count($data)!=0): ?>
          <?php foreach ($data as $r) :?>
            <tr>
              <td width="15%">
                <img src="<?php echo IMG; ?>product/<?php echo $r['image']; ?>"  alt="" height="100" width="100">
              </td>
              <td>
                <input  type="url" style="width:600px;" class="form-control" name="" value="http://www.sf-engineer.com<?php echo IMG; ?>product/<?php echo $r['image']; ?>" readonly="true" placeholder="">
              </td>
              <td width="10%">
                <a href="#" onclick="removeImage(<?php echo $r['image_id']; ?>);return false;" class="btn btn-danger"><span class="fa fa-remove"></span> Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
</table>
<script src="<?php echo THEME; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo THEME; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $(function() {
    $("#tb_images").DataTable();
  });
</script>
