<?php
/* Copyright © 2010 by Andrew Moore */
/* Licensing information appears at the end of this file. */

error_reporting(E_ALL);
require_once 'PHPUnit/Framework.php';
require_once dirname(__FILE__) . '/../../library/classes/NumberToText.class.php';

class NumberToTextTest extends PHPUnit_Framework_TestCase
{

  /**
   * @dataProvider cases
   */
  public function testConvert( $numeral, $text )
  {
    $ntt = new NumberToText( $numeral );
    $this->assertEquals( $text, $ntt->convert(), "'$numeral' converts to '$text'" );
  }

  public static function cases() {

    return array( array( 0,     'zero'),
                  array( 1,     'one'),
                  array( 14000, 'fourteen thousand'),
                  array( 9,     'nine'),
                  array( 99,    'ninety-nine'),
                  array( 100,   'one hundred'),
                  array( 1000,  'one thousand'),
                  array( 1111,  'one thousand one hundred eleven'),
                  );
  }
}

/*
This file is free software: you can redistribute it and/or modify it under the
terms of the GNU General Public License as publish by the Free Software
Foundation.

This file is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU Gneral Public License for more details.

You should have received a copy of the GNU General Public Licence along with
this file.  If not see <https://www.gnu.org/licenses/>.
*/
?>
