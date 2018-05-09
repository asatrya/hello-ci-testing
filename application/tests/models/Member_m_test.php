<?php

class Member_m_test extends TestCase
{
	public function setUp()
	{
		$this->resetInstance();
		$this->CI->load->model('Member_m');
		$this->obj = $this->CI->Member_m;
	}

	public static function setUpBeforeClass()
	{
		parent::setUpBeforeClass();

		$CI =& get_instance();
		$CI->load->library('Seeder');
		$CI->seeder->call('MemberSeeder');
	}

	public function test_get_member_list()
	{
		$expected = [
			1 => 'John Doe',
			2 => 'Fox Freezy',
		];
		$list = $this->obj->get_member();
		foreach ($list as $member) {
			$this->assertEquals($expected[$member->id], $member->name);
		}
	}

	public function test_get_member_name()
	{
		$actual = $this->obj->get_member(1);
		$expected = 'John Doe';
		$this->assertEquals($expected, $actual[0]->name);
	}
}