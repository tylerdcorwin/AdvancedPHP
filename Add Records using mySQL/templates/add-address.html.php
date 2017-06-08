<!-- put your HTML here -->
<form action="#" method="post">
    Full Name: <input type="text" name="fullname" value="<?php echo $fullname; ?>" />
    <br />
    Email: <input type="text" name="email" value="<?php echo $email; ?>" />
    <br />
    Address Line 1: <input type="text" name="addressline1" value="<?php echo $addressline1; ?>" />
    <br />
    City: <input type="text" name="city" value="<?php echo $city; ?>" />
    <br />
    State: <select name="state">
            <?php foreach ($states as $key => $value): ?> 
              <option value="<?php echo $key; ?>" <?php if ( $state == $key ): ?> selected="selected" <?php endif; ?>><?php echo $value; ?></option>
            <?php endforeach; ?>
          </select>
    <br />
    Zip: <input type="text" name="zip" value="<?php echo $zip; ?>" />
    <br />
    Birthday: <input type="date" name="birthday" value="<?php echo $birthday; ?>" />
    <br />
    <input type="submit" value="Submit" class="btn btn-danger" />
    
    <?php
// put your code here



?>
<!-- put your HTML here -->

</form>