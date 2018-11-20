<?php
/**
 * load_form.php
 *
 * @package   OpenEMR
 * @link      https://www.open-emr.org
 * @author    Brady Miller <brady.g.miller@gmail.com>
 * @copyright Copyright (c) 2018 Brady Miller <brady.g.miller@gmail.com>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

$special_timeout = 3600;
require_once("../../globals.php");
if (substr($_GET["formname"], 0, 3) === 'LBF') {
  // Use the List Based Forms engine for all LBFxxxxx forms.
    include_once("$incdir/forms/LBF/new.php");
} else {
    if ((!empty($_GET['pid'])) && ($_GET['pid'] > 0)) {
        $pid = $_GET['pid'];
        $encounter = $_GET['encounter'];
    }

  // ensure the path variable has no illegal characters
    check_file_dir_name($_GET["formname"]);

    include_once("$incdir/forms/" . $_GET["formname"] . "/new.php");
}
