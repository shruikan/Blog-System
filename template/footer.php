</section>
<footer id="footer">
    <div class="container">
        <p>&copy; <?php echo $site_title ?>. It's all free.</p>
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