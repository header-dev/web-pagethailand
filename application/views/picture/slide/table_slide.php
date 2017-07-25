<table id="slidepicture" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Picture</th>
                <th>Create Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $val): ?>
                <tr>
                <td width="15%">
                  <a class="preview" href="<?php echo IMG; ?>slide/<?php echo $val['image']; ?>">
                    <img src="<?php echo IMG; ?>slide/<?php echo $val['image']; ?>" class="img-responsive" alt="Image" height="200" width="200">
                  </a>
                </td>
                <td width="20%">
                  <?php echo $val['created_at']; ?>
                </td>
                <td width="15%">
                  <button class="btn btn-danger" onclick="removeSlide(<?php echo $val['image_id']; ?>);" ><i class="fa fa-trash"></i> Delete</button>
                </td>
                </tr>
              <?php endforeach; ?>
          </tbody>
</table>
<script type="text/javascript">
  $(function() {
    $("#slidepicture").DataTable();
  });
</script>