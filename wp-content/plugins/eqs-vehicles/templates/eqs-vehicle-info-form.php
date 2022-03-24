<style>
        .eqs_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .eqs_field{
            display: contents;
        }
</style>

<div class="eqs_box">
    <p class="meta-options eqs_field">
        <label for="eqs_vehicle_number">Vehicle number</label>
        <input id="eqs_vehicle_number" type="text" name="eqs_vehicle_number"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'eqs_vehicle_number', true ) ); ?>">
    </p>
    <p class="meta-options eqs_field">
        <label for="eqs_driver_name">Driver name</label>
        <input id="eqs_driver_name" type="text" name="eqs_driver_name"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'eqs_driver_name', true ) ); ?>">
    </p>
</div>