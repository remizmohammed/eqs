<style>
/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 33.3%;
  padding: 10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
<?php
    $vechicleTypes = get_terms(
        [
            'taxonomy' => 'vehicle_types',
            'hide_empty' => true,
        ]
    );
?>
<div class="vehicle-filter content-filter-wrap">
    <div class="row">
        <div class="column">
            <label for="vehicle-title">Vehicle Title</label><br>
            <input type="text" id="vehicle-title" class="filter-input" name="vehicle-title" value="">
        </div>
        <div class="column">
            <label for="vehicle-type">Select Type</label><br>
            <select name="vehicle-type" id="vehicle-type" style="width: 100%;" class="filter-input filter-dropdown">
                <option value="">--Vehicle Type--</option>
                <?php foreach( $vechicleTypes as $vechicleType ): ?>
                    <option value="<?php echo $vechicleType->slug?>"><?php echo $vechicleType->name?></option>
                <?php endforeach;?>
                
            </select>
        </div>
        <div class="column">

        </div>
    </div>
    <div class="row">
        <div class="column">
            <label for="vehicle-number">Vehicle Number</label><br>
            <input type="text" class="filter-input" id="vehicle-number" name="vehicle-number" value="">
        </div>
        <div class="column">
            <label for="driver-name">Driver Name</label><br>
            <input type="text" class="filter-input" id="driver-name" name="driver-name" value="">
        </div>
        <div class="column">
            <br>
            <button id="filter-vehicles" class="btn-filter-vehicles">Filter Vehicles</button>
        </div>
    </div>
</div>