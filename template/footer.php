</div>
<hr />
<footer>
	<div class="container">
		<p class="pull-left">&copy; <?php echo $site_title ?> 2014. It's all free..</p>
		<p class="pull-right socials">
			Follow Us: 
			<a href="#" class="btn btn-social btn-facebook">
				<i class="fa fa-facebook"></i>
			</a>
			<a href="#" class="btn btn-social btn-twitter">
				<i class="fa fa-twitter"></i>
			</a>
			<a href="#" class="btn btn-social btn-linkedin">
				<i class="fa fa-linkedin"></i>
			</a>
		</p>
	</div>
</footer>

<?php
if ($debug_status == 1) {
    require(D_WIDGETS . '/debug.php');
}
?>

</body>
</html>