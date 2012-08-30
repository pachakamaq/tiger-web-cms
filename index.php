<?php 
if (!(file_exists("site_config.xml"))) {
    header('Location: admin/');
}
echo "site under construction";

?>