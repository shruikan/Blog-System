<div class="col-md-4">
    <header>
       <h1>Navigation</h1> 
    </header>
    
    <ul id="sort-nav" class="list-group">

        <?php
        $query = "SELECT * FROM navigation ORDER BY position ASC";
        $result = mysqli_query($dbc, $query);

        while ($list = mysqli_fetch_assoc($result)) {
            ?>
            <li id="list_<?= $list['id']; ?>" class="list-group-item">
                <a id="label_<?= $list['id']; ?>" type="button" data-toggle="collapse" data-target="#form_<?= $list['id']; ?>">
                    <?= $list['label']; ?> <i class="fa fa-chevron-down"></i>
                </a>
                <div id="form_<?= $list['id']; ?>" class="collapse">
                    <form class="form-horizontal nav-form" role="form" action="?p=navigation&id=<?= $list['id']; ?>" method="post">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input class="form-control input-sm" type="text" name="id" id="id" value="<?= $list['id'] ?>"
                                       placeholder="ID" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="label">Label:</label>
                            <div class="col-sm-10">
                                <input class="form-control input-sm" type="text" name="label" id="label" value="<?= $list['label'] ?>"
                                       placeholder="Label" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="url">URL:</label>
                            <div class="col-sm-10">
                                <input class="form-control input-sm" type="text" name="url" id="url" value="<?= $list['url'] ?>"
                                       placeholder="URL" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="status">Status:</label>
                            <div class="col-sm-10">
                                <input class="form-control input-sm" type="text" name="status" id="status" value="<?= $list['status'] ?>"
                                       placeholder="Status" autocomplete="off">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default">Save</button>
                        <input type="hidden" name="post" value="1">

                        <input type="hidden" name="openedid" value="<?= $list['id']; ?>">

                    </form>
                </div>
            </li>

        <?php } ?>
    </ul>
</div>