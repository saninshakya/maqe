<?php

class Coupon{

	CONST MIN_LENGTH = 8;

	static public function randomString(){
		$uppercase    = ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M'];
		$lowercase    = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm'];
		$numbers      = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

		$characters   = [];
		$coupon = '';
		$prefix = 'MQ';

		$characters = array_merge($characters, $numbers, $uppercase, $lowercase);

		for ($i = 0; $i < self::MIN_LENGTH; $i++) {
			$coupon .= $characters[mt_rand(0, count($characters) - 1)];
		}
		return $prefix . $coupon;

	}

	static public function generateCoupons(){
		$coupons = [];
		for ($i = 0; $i < 250; $i++) {
			$temp = self::randomString();
			$coupons[] = $temp;
		}
		return $coupons;
	}
}
?>