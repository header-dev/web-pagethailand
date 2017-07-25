<table class="table table-striped table-hover" id="tb_list">
	<thead>
		<tr>
			<th>Preview</th>
			<th>Link</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data as $p): ?>
      <?php if(!empty($p['image'])): ?>
		<tr>
			<td>
				<?php if($p['image_type']==1): ?>
				  <a class="preview" target="_blank" href="<?php echo IMG; ?>product/<?php echo $p['image']; ?>">
            <img src="<?php echo IMG; ?>product/<?php echo $p['image']; ?>" class="img-responsive" alt="Image" height="100" width="100">
          </a>
        <?php elseif($p['image_type']==3): ?>
          <a class="preview" target="_blank" href="<?php echo IMG; ?>service/<?php echo $p['image']; ?>">
            <img src="<?php echo IMG; ?>service/<?php echo $p['image']; ?>" class="img-responsive" alt="Image" height="100" width="100">
          </a>
        <?php elseif($p['image_type']==4): ?>
          <a class="preview" target="_blank" href="<?php echo IMG; ?>slide/<?php echo $p['image']; ?>">
          <img src="<?php echo IMG; ?>slide/<?php echo $p['image']; ?>" class="img-responsive" alt="Image" height="100" width="100">
          </a>
        <?php elseif($p['image_type']==5): ?>
          <a class="preview" target="_blank" href="<?php echo IMG; ?>other/<?php echo $p['image']; ?>">
          <img src="<?php echo IMG; ?>other/<?php echo $p['image']; ?>" class="img-responsive" alt="Image" height="100" width="100">
          </a>
        <?php endif; ?>
			</td>
			<td width="80%" >
				  <?php if($p['image_type']==1): ?>
				  <input type="url" style="width:550px;" readonly class="form-control" value="http://www.sf-engineer.com<?php echo IMG; ?>product/<?php echo $p['image']; ?>">
          <?php elseif($p['image_type']==3): ?>
          <input type="url" style="width:550px;"  readonly class="form-control" value="http://www.sf-engineer.com<?php echo IMG; ?>service/<?php echo $p['image']; ?>">
          <?php elseif($p['image_type']==4): ?>
          <input type="url" style="width:550px;"  readonly class="form-control" value="http://www.sf-engineer.com<?php echo IMG; ?>slide/<?php echo $p['image']; ?>">
          <?php elseif($p['image_type']==5): ?>
          <input type="url" style="width:550px;"  readonly class="form-control" value="http://www.sf-engineer.com<?php echo IMG; ?>other/<?php echo $p['image']; ?>">
          <?php endif; ?>
			</td>
		</tr>
    <?php endif; ?>
	<?php endforeach; ?>
	</tbody>
</table>
<script src="<?php echo THEME; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo THEME; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(function() {
  $("#tb_list").DataTable();
});
</script>