<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */
class MemberSeeder extends Seeder {
	private $table = 'member';
	public function run()
	{
		$this->db->truncate($this->table);
		$data = [
			'id' => 1,
			'name' => 'John Doe',
		];
		$this->db->insert($this->table, $data);
		
		$data = [
			'id' => 2,
			'name' => 'Fox Freezy',
		];
		$this->db->insert($this->table, $data);
	}
}