<table class="table table-striped table-hover" id="tb_list">
	<thead>
		<tr>
			<th>Preview</th>
			<th>Link</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($images as $p): ?>
			<tr>
				<td>
				  	<a class="preview" target="_blank" href="<?php echo IMG; ?><?php echo $p['image']; ?>">
            		<img src="<?php echo IMG; ?><?php echo $p['image']; ?>" class="img-responsive" alt="Image" height="100" width="100">
          			</a>
				</td>
				<td>
					<input type="url" style="width:550px;"  readonly class="form-control" value="<?php echo IMG; ?><?php echo $p['image']; ?>">
				</td>
			</tr>
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