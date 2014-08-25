</div>

<footer>
    <p>&copy; <?= $site_title ?>. It's all free.</p>
</footer>
<?php
if ($debug_status == 1) {
    require(D_WIDGETS . '/debug.php');
}
?>

</body>
</html>