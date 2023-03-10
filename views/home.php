<section style="height: 100%;">
    <div class="container-fluid h-100 d-flex justify-content-center align-items-center">
        <div>
            <h3 class="mb-5"><?php echo $title; ?></h3>
            <div class="card">
                <form class="card-body">
                    <div class="mb-3">
                        <label for="username"><?php echo $label_username; ?></label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password"><?php echo $label_password; ?></label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button class="w-100 btn btn-primary mb-3" onclick="onSubmit()" type="button"><?php echo $label_sign_in; ?></button>
                    <small>
                        <a href="<?php echo  $link_about_us; ?>" target="_blank"><?php echo  $label_about_us; ?></a>
                        <a href="<?php echo  $link_about_us; ?>" target="_self"><?php echo  $label_about_us; ?></a>
                    </small>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function onSubmit() {
        var data = $('form').serializeArray();
        console.log(data);
    }
</script>