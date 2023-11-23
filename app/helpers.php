<?php

# redirect to specific page
function redirectTo(string $url, array $data = []) {
	setIntoSESSION($data);
	
	header('Location: ' . $url);
	exit;
}

# load page
function renderPage(string $page, array $data = []) {
	setIntoSESSION($data);

	require_once __DIR__ . '/views' . $page;
}

# get variable in SESSION and delete it
function getOnceSession(string $name, $default = null) {
	$value = $default;

	if(isset($_SESSION[$name])) {
		$value = $_SESSION[$name];
		unset($_SESSION[$name]);
	}

	return $value;
}

# set variable into SESSION
function setIntoSESSION(array $data): void {
	foreach($data as $key => $value) {
		$_SESSION[$key] = $value;
	}
}

# delete variable in SESSION
function purgeSESSION(string $key) {
	if(isset($_SESSION[$key])) {
		unset($_SESSION[$key]);
	}
}

# convert day to Vietnamese day
function retrieveDay(int $day) {
	$res = '';

	switch($day) {
		case 0: 
			$res = 'Chủ nhật';
			break;
		case 1: 
			$res = 'Thứ hai';
			break;
		case 2: 
			$res = 'Thứ ba';
			break;
		case 3: 
			$res = 'Thứ tư';
			break;
		case 4: 
			$res = 'Thứ năm';
			break;
		case 5: 
			$res = 'Thứ sáu';
			break;
		case 6: 
			$res = 'Thứ bảy';
			break;
	}
	return $res;
}

# format money string
function formatMoney(int $money) {
	$strMoney = (string)$money;
	$moneyUnits = [];

	for($i = strlen($strMoney) - 1; $i >= 0; $i -= 3) {
		$moneyUnit = '';
		for($j = max(0, $i - 2); $j <= $i; ++$j) {
			$moneyUnit .= $strMoney[$j];
		}
		array_unshift($moneyUnits, $moneyUnit);
	}

	$result = join('.', $moneyUnits);
	return $result;
}
