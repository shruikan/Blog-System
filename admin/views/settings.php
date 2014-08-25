<div class="col-md-12">
    <header>
        <h1>Site Settings</h1>
    </header>
    
    <?php

    $query = "SELECT * FROM settings ORDER BY id ASC";
    $result = mysqli_query($dbc, $query);

    while ($opened = mysqli_fetch_assoc($result)) {
        ?>

        <div class="col-md-7">

            <form action="?p=settings&id=<?= $opened['id']; ?>" method="post" class="form-inline">

                <div class="form-group">
                    <label for="id" class="sr-only">ID:</label>
                    <input class="form-control" type="text" name="id" id="id" value="<?= $opened['id'] ?>"
                           placeholder="ID" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="label" class="sr-only">Label:</label>
                    <input class="form-control" type="text" name="label" id="label" value="<?= $opened['label'] ?>"
                           placeholder="Label" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="value" class="sr-only">Value:</label>
                    <input class="form-control" type="text" name="value" id="value" value="<?= $opened['value'] ?>"
                           placeholder="Value" autocomplete="off">
                </div>

                <button type="submit" class="btn btn-default">Save</button>
                <input type="hidden" name="post" value="1">

                <input type="hidden" name="openedid" value="<?= $opened['id']; ?>">

            </form>
        </div>
<?php } ?>
</div>