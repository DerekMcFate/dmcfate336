<?php
//SELECT DISTINCT(deviceType) FROM tc_device ORDER BY deviceType
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 5: Device Search</title>
    </head>
    <body>
        
        <h1>Technology Center: CheckoutSystem</h1>
        
        <form>
            Device: <input type="text" name="deviceName" placeholder="Device Name" />
            Type:
            <select name="deviceType">
                <?=getDeviceTypes()?>
            </select>
        </form>
        
    </body>
</html>