<section>

    <div class="relative flex items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0">
			<?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?=  $validation->listErrors() ?>
                </div>
            <?php endif;?>

            <form action="/words"  method='POST'>
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="characterType">Type</label>
                    <select  name="type" id="characterType" >
                        <option value="alphabet">Alphabet</option>
                        <option value="number">Number</option>
                        <option value="alphanumeric">AlphaNumeric</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Character Length</label>
                    <input type="text" name="length" class="form-control"  placeholder="Enter character length">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
                <!-- </div> -->

            <br>

            <div>
                <ul>
                <?php if (! empty($results) && is_array($results)): ?>

                    <?php foreach ($results as $result): ?>

                        <h3><?= esc($result['word']) ?></h3>

                    <?php endforeach ?>

                    <?php else: ?>

                        <h3>No Generated Words</h3>

                    <?php endif ?>
                </ul>
            </div>
        </div>


</section>
