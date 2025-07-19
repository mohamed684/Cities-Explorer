<form action="edit.php?<?php echo http_build_query(['id' => $city->id]) ?>" method="post">
     <label for="city">City:</label>
     <input type="text" name="city" value="<?= e($city->city) ?>">
     <label for="city_ascii">City (ascii):</label>
     <input type="text" name="city_ascii" value="<?= e($city->cityAscii) ?>">
     <label for="country">Country:</label>
     <input type="text" name="country" value="<?= e($city->country) ?>">
     <label for="iso2">ISO-2:</label>
     <input type="text" name="iso2" value="<?= e($city->iso2) ?>">
     <label for="iso3">ISO-3:</label>
     <input type="text" name="iso3" value="<?= e($city->iso3) ?>">
     <label for="population">Population</label>
     <input type="text" name="population" value="<?= e($city->population) ?>">
     <div>
         <input type="submit" value="Update">
     </div>
</form>