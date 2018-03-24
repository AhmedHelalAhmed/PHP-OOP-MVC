<?php @header("Content-Type: text/html; charset=UTF-8"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Variables</title>

		<!-- load js libs -->
		<script src=""></script>
		
		<!-- load css -->
		<link href="" rel="stylesheet" />

		<!-- some page-specific js -->
		<script>
		</script>

		<!-- some page-specific styling -->
		<style>
		</style>
	</head>
	<body>
		<h1>Variables</h1>
		<p>Variables in PHP</p>
		
		
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Variable</th>
					<th>Value</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data['variables'] as $var => $val){ ?>
					<tr>
						<th><?php echo $var; ?></th>
						<td><?php echo $val; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</body>
</html>