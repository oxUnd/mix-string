<?php
namespace Shouding\Mix;

use Stringy\Stringy as S;

class Str {

	const TYPE_WORD = 0x0001;
	const TYPE_CHAR = 0x0010;
	const TYPE_BYTE = 0x0011;

	public static function length($string, $type = self::TYPE_WORD) {

		if (trim($string) === '') {
			return 0;
		}

		$len = 0;

		switch ($type) {
			case self::TYPE_WORD:

				preg_match_all('/[\pL\pN\pPd]+/u', $string, $matches);

				if ($matches && count($matches[0]) > 0) {
					$count = 0;

					foreach ($matches[0] as $word) {
						if (preg_match('/[a-zA-Z\']+/', $word, $m)) {
							$count += 1;
						} else {
							$count += S::create($word)->length();
						}
					}

					$len = $count;
				} else {

					throw new \Exception('invalid string ' . $string);
				}

				break;
			case self::TYPE_CHAR:
				$len = S::create($string)->length();

				break;
			default:
				$len = strlen($string);
				
				break;
		}

		return $len;
	}
}