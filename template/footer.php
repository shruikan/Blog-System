</div>
<footer>
    <div class="container">
        <hr />
        <p class="text-center">&copy; <?php echo $site_title ?> 2014. It's all free..</p>
    </div>
</footer>

<?php
if ($debug_status == 1) {
    require(D_WIDGETS . '/debug.php');
}
require(D_CONFIG . DS . 'js.php');
?>

</body>
</html>