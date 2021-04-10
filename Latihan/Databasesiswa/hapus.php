<?php 
	require 'function.php';

	if (hapus($_GET) > 0) { ?>
			<script type="text/javascript">
			alert('Data Berhasil Dihapus');
			document.location.href = 'index.php';
		</script>

		<?php		}
		else {
			echo mysqli_error($conn);
		}
 ?>