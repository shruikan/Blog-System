</div>

<footer class="container footer navbar-fixed-bottom">
    <p>&copy; <?php echo $site_title ?>. It's all free.</p>
</footer>
<?php
if ($debug_status == 1) {
    require(ROOT . D_WIDGETS . DS . 'debug.php');
}
?>

</body>
</html>