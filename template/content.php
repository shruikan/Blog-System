<section class="container">
    <header>
        <h1><?php echo $page['header']; ?></h1>
    </header>

    <?php require(D_VIEWS . '/' . $path['call_parts'][0] . '.php'); //echo $page['body_formatted']; ?>
</section>