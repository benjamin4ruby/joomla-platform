<?php
/**
 * @version		$Id: JDatabaseTest.php 20196 2011-01-09 02:40:25Z ian $
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

require_once JPATH_PLATFORM . '/joomla/database/database.php';
require_once __DIR__ . '/stubs/nosqldriver.php';

/**
 * Test class for JDatabase.
 * Generated by PHPUnit on 2009-10-08 at 22:00:38.
 */
class JDatabaseTest extends JoomlaDatabaseTestCase
{
	/**
	 * @var	   JDatabase
	 * @since  11.4
	 */
	protected $db;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->db = JDatabase::getInstance(
			array(
				'driver' => 'nosql',
				'database' => 'europa',
				'prefix' => '&',
			)
		);
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}

	/**
	 * Test for the JDatabase::__call method.
	 *
	 * @return  void
	 *
	 * @since   12.1
	 */
	public function test__call()
	{
		$this->assertThat(
			$this->db->q('foo'),
			$this->equalTo($this->db->quote('foo')),
			'Tests the q alias of quote.'
		);

		$this->assertThat(
			$this->db->qn('foo'),
			$this->equalTo($this->db->quoteName('foo')),
			'Tests the qn alias of quoteName.'
		);

		$this->assertThat(
			$this->db->foo(),
			$this->isNull(),
			'Tests for an unknown method.'
		);
	}

	/**
	 * @todo Implement test__construct().
	 */
	public function test__construct()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement testGetInstance().
	 */
	public function testGetInstance()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement test__destruct().
	 */
	public function test__destruct()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Tests the JDatabase::getConnection method.
	 *
	 * @return  void
	 *
	 * @since   11.4
	 */
	public function testGetConnection()
	{
		ReflectionHelper::setValue($this->db, 'connection', 'foo');

		$this->assertThat(
			$this->db->getConnection(),
			$this->equalTo('foo')
		);
	}

	/**
	 * @todo Implement testGetConnectors().
	 */
	public function testGetConnectors()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Tests the JDatabase::getCount method.
	 *
	 * @return  void
	 *
	 * @since   11.4
	 */
	public function testGetCount()
	{
		ReflectionHelper::setValue($this->db, 'count', 42);

		$this->assertThat(
			$this->db->getCount(),
			$this->equalTo(42)
		);
	}

	/**
	 * Tests the JDatabase::getDatabase method.
	 *
	 * @return  void
	 *
	 * @since   11.4
	 */
	public function testGetDatabase()
	{
		$this->assertThat(
			ReflectionHelper::invoke($this->db, 'getDatabase'),
			$this->equalTo('europa')
		);
	}

	/**
	 * Tests the JDatabase::getDateFormat method.
	 *
	 * @return  void
	 *
	 * @since   11.4
	 */
	public function testGetDateFormat()
	{
		$this->assertThat(
			$this->db->getDateFormat(),
			$this->equalTo('Y-m-d H:i:s')
		);
	}

	/**
	 * Tests the JDatabase::splitSql method.
	 *
	 * @return  void
	 *
	 * @since   12.1
	 */
	public function testSplitSql()
	{
		$this->assertThat(
			$this->db->splitSql('SELECT * FROM #__foo;SELECT * FROM #__bar;'),
			$this->equalTo(array(
				'SELECT * FROM #__foo;',
				'SELECT * FROM #__bar;'
			)),
			'splitSql method should split a string of multiple queries into an array.'
		);
	}

	/**
	 * Tests the JDatabase::getUTFSupport method.
	 *
	 * @return  void
	 *
	 * @since   12.1
	 */
	public function testGetUTFSupport()
	{
		$this->assertThat(
			$this->db->getUTFSupport(),
			$this->isType('boolean'),
			'getUTFSupport should return a boolean value indicating whether the driver has UTF support.'
		);
	}

	/**
	 * @todo Implement testGetErrorNum().
	 */
	public function testGetErrorNum()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement testGetErrorMsg().
	 */
	public function testGetErrorMsg()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * Tests the JDatabase::getLog method.
	 *
	 * @return  void
	 *
	 * @since   11.4
	 */
	public function testGetLog()
	{
		ReflectionHelper::setValue($this->db, 'log', 'foo');

		$this->assertThat(
			$this->db->getLog(),
			$this->equalTo('foo')
		);
	}

	/**
	 * Tests the JDatabase::getPrefix method.
	 *
	 * @return  void
	 *
	 * @since   11.4
	 */
	public function testGetPrefix()
	{
		$this->assertThat(
			$this->db->getPrefix(),
			$this->equalTo('&')
		);
	}

	/**
	 * Tests the JDatabase::getNullDate method.
	 *
	 * @return  void
	 *
	 * @since   11.4
	 */
	public function testGetNullDate()
	{
		$this->assertThat(
			$this->db->getNullDate(),
			$this->equalTo('1BC')
		);
	}

	/**
	 * Tests the JDatabase::getMinimum method.
	 *
	 * @return  void
	 *
	 * @since   12.1
	 */
	public function testGetMinimum()
	{
		$this->assertThat(
			$this->db->getMinimum(),
			$this->equalTo('12.1'),
			'getMinimum should return a string with the minimum supported database version number'
		);
	}

	/**
	 * Tests the JDatabase::isMinimumVersion method.
	 *
	 * @return  void
	 *
	 * @since   12.1
	 */
	public function testIsMinimumVersion()
	{
		$this->assertThat(
			$this->db->isMinimumVersion(),
			$this->isTrue(),
			'isMinimumVersion should return a boolean true if the database version is supported by the driver'
		);
	}

	/**
	 * Tests the JDatabase::setDebug method.
	 *
	 * @return  void
	 *
	 * @since   12.1
	 */
	public function testSetDebug()
	{
		$this->assertThat(
			$this->db->setDebug(true),
			$this->isType('boolean'),
			'setDebug should return a boolean value containing the previous debug state.'
		);
	}

	/**
	 * Tests the JDatabase::setQuery method.
	 *
	 * @return  void
	 *
	 * @since   12.1
	 */
	public function testSetQuery()
	{
		$this->assertThat(
			$this->db->setQuery('SELECT * FROM #__dbtest'),
			$this->isInstanceOf('JDatabase'),
			'setQuery method should return an instance of JDatabase.'
		);
	}

	/**
	 * Tests the JDatabase::replacePrefix method.
	 *
	 * @return  void
	 *
	 * @since   12.1
	 */
	public function testReplacePrefix()
	{
		$this->assertThat(
			$this->db->replacePrefix('SELECT * FROM #__dbtest'),
			$this->equalTo('SELECT * FROM &dbtest'),
			'replacePrefix method should return the query string with the #__ prefix replaced by the actual table prefix.'
		);
	}

	/**
	 * @todo Implement testStderr().
	 */
	public function testStderr()
	{
		// Remove the following lines when you implement this test.
		$this->markTestSkipped('Deprecated method');
	}

	/**
	 * Tests the JDatabase::quote method.
	 *
	 * @return  void
	 *
	 * @since   11.4
	 */
	public function testQuote()
	{
		$this->assertThat(
			$this->db->quote('test', false),
			$this->equalTo("'test'"),
			'Tests the without escaping.'
		);

		$this->assertThat(
			$this->db->quote('test'),
			$this->equalTo("'-test-'"),
			'Tests the with escaping (default).'
		);
	}

	/**
	 * Tests the JDatabase::quoteName method.
	 *
	 * @return  void
	 *
	 * @since   11.4
	 */
	public function testQuoteName()
	{
		$this->assertThat(
			$this->db->quoteName('test'),
			$this->equalTo('[test]'),
			'Tests the left-right quotes on a string.'
		);

		$this->assertThat(
			$this->db->quoteName('a.test'),
			$this->equalTo('[a].[test]'),
			'Tests the left-right quotes on a dotted string.'
		);

		$this->assertThat(
			$this->db->quoteName(array('a', 'test')),
			$this->equalTo(array('[a]', '[test]')),
			'Tests the left-right quotes on an array.'
		);

		$this->assertThat(
			$this->db->quoteName(array('a.b', 'test.quote')),
			$this->equalTo(array('[a].[b]', '[test].[quote]')),
			'Tests the left-right quotes on an array.'
		);

		$this->assertThat(
			$this->db->quoteName(array('a.b', 'test.quote'), array(null, 'alias')),
			$this->equalTo(array('[a].[b]', '[test].[quote] AS [alias]')),
			'Tests the left-right quotes on an array.'
		);

		$this->assertThat(
			$this->db->quoteName(array('a.b', 'test.quote'), array('alias1', 'alias2')),
			$this->equalTo(array('[a].[b] AS [alias1]', '[test].[quote] AS [alias2]')),
			'Tests the left-right quotes on an array.'
		);

		$this->assertThat(
			$this->db->quoteName((object) array('a', 'test')),
			$this->equalTo(array('[a]', '[test]')),
			'Tests the left-right quotes on an object.'
		);

		ReflectionHelper::setValue($this->db, 'nameQuote', '/');

		$this->assertThat(
			$this->db->quoteName('test'),
			$this->equalTo('/test/'),
			'Tests the uni-quotes on a string.'
		);
	}

	/**
	 * Tests the JDatabase::truncateTable method.
	 *
	 * @return  void
	 *
	 * @since   12.1
	 */
	public function testTruncateTable()
	{
		$this->assertNull(
			$this->db->truncateTable('#__dbtest'),
			'truncateTable should not return anything if successful.'
		);
	}
}
