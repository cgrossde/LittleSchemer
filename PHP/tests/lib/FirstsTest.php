<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Christoph Gross <gross@blubyte.de>
 *
 *  All rights reserved
 *
 *  This script is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class FirstsTest extends PHPUnit_Framework_TestCase {

	public function testFirstsDefined() {
		$firstsExists = function_exists('firsts');

		$this->assertTrue($firstsExists);
	}

	/**
     * @depends testFirstsDefined
     */
	public function testNullList() {
		$list = array();
		$this->assertEquals(array(), firsts($list));
	}

	/**
	 * @expectedException InvalidArgumentException
	 * @depends testFirstsDefined
	 */
	public function testAtomList() {
		$list = array(
			'atom1',
			'atom2',
			'atom3',
			'atom1',
			'atom7'
		);

		firsts($list);
	}

	/**
	 * @expectedException InvalidArgumentException
	 * @depends testFirstsDefined
	 */
	public function testMixedList() {
		$list = array(
			'atom1',
			'atom2',
			'atom3',
			array('atom2', 'atom4'),
			'atom1',
			array('listInList'),
			'atom7'
		);

		firsts($list);
	}

	/**
	 * @expectedException InvalidArgumentException
	 * @depends testFirstsDefined
	 */
	public function testAtomAsArgument() {
		$list = 'atom';

		firsts($list);
	}

	/**
     * @depends testFirstsDefined
     */
	public function testListOfLists() {
		$list = array(
			array('apple', 'peach', 'pumpkin'),
			array('plum', 'pear', 'cherry'),
			array('grape', 'raisin', 'pea'),
			array('bean', 'carrot', 'eggplant')
		);
		$expected = array(
			'apple', 'plum', 'grape', 'bean'
		);

		$actual = firsts($list);

		$this->assertEquals($expected, $actual);
	}
}
?>