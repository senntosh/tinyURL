<?php
include(__DIR__ . "/includes/session.php");
include(__DIR__ . "/includes/redirect.php");
?>
<!<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Tiny url</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-9">

            <div class="card text-center">
                <div class="card-header">
                    TinyURL Generator
                </div>
                <?php if (isset($pageNotFound)) { ?>
                    <div class="card-body">
                        <h2 class="card-title">404</h2>
                        <p class="card-text">Page not found</p>
                        <a href="/" class="btn btn-primary">Back to Home</a>
                    </div>
                <?php } else { ?>
                    <div class="card-body">
                        <h5 class="card-title">Enter a long "URL" to make it tiny.</h5>
                        <form id="tiny-url" method="POST" action="api.php">
                            <input type="hidden" name="_token" value="<?= $token ?>">
                            <div class="input-group mb-3">
                                <input type="text" name="url" class="form-control" placeholder="Enter your long url"
                                       aria-label="Long URL" aria-describedby="button-addon2">
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary">Generate URL</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        example: <?php echo $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . uniqid(); ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

</div>


</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<?php require __DIR__ . '/includes/js_dependencies.php' ?>
</html>