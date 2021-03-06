<header>
    <h1>Contact Us</h1>
</header>

<div class="well">
    <p class="lead">
        You have any question? You know what to do and how to do it, so get to it.
    </p>
</div>

<div class="contact-form">
    <form role="form" method="post" class="form-horizontal col-md-8" id="mail-form">
        <?php if (!$user['username']): ?>
            <div class="form-group">
                <label for="name" class="col-md-2">Name</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-md-2">Email</label>
                <div class="col-md-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="subject" class="col-md-2">Subject</label>
            <div class="col-md-10">
                <input type="subject" class="form-control" id="subject" name="subject" placeholder="Subject">
            </div>
        </div>

        <div class="form-group">
            <label for="message" class="col-md-2">Message</label>
            <div class="col-md-10">
                <textarea class="form-control" id="message" name="message" placeholder="Message"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-right">
                <input type="submit" name="mail" class="btn btn-lg btn-primary" value="Submit your message!">
            </div>
        </div>
    </form>	
</div>