</div>
<footer>
    <div class="container">
        <p class="pull-left">&copy; <a href="./"><?= $site_title ?></a> 2014. It's all free..</p>
        <p class="pull-right socials">
            Follow Us: 
            <a href="https://www.facebook.com/pages/Shruikan/1472623803008038" class="btn btn-social btn-facebook">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="https://twitter.com/" class="btn btn-social btn-twitter">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="https://www.linkedin.com/" class="btn btn-social btn-linkedin">
                <i class="fa fa-linkedin"></i>
            </a>
        </p>
    </div>
</footer>

<?php
if ($debug_status == 1 && $user['level'] == 3) {
    require(D_WIDGETS . 'debug.php');
}
?>

</body>
</html>