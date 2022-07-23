<?php 

require_once('crud_class.php');
require_once(dirname(__FILE__)."/../traits/get_city_by_name.php");
require_once(dirname(__FILE__).'/../traits/get_homes_by_city.php');
require_once(dirname(__FILE__).'/../traits/get_homes_by_province.php');
require_once(dirname(__FILE__).'/../traits/home_info.php');
require_once(dirname(__FILE__).'/../traits/login_trait.php');

final class Final_crud extends Crud{
    ///only one string parameter
    use get_city_by_name;

    ///id of city, give al homes in this city
    use get_homes_by_city;

    ///all homes in province, work with provinces.province_code
    use get_homes_by_province;

    /// get home info
    use home_info;

    ////dd
    use login_trait;
}




?>
