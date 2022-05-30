
<section>

	<div class="relative flex items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0">
			<?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>

            <form action="/login"  method='POST'>
				<?= csrf_field() ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter firstname">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter lastname">
                </div>

                <button type="submit" class="btn btn-primary">Start</button>
            </form>
            <!-- </div> -->
    </div>

</section>
