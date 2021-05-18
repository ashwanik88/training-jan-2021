<?php 
echo '<pre>';	// for string output

// $arr = array();

// $arr[0] = 'apple';
// $arr[1] = 'banana';
// $arr[2] = 'mango';
// $arr['fruits'][] = 'orange';
// $arr['fruits'][] = 'xya';
// $arr[45] = array('abc','xyz', array('test'));

// print_r($arr);	// for array output

//retierve

// foreach($arr as $key => $val){
	// print_r($key);
	// echo '<br>';
	// print_r($val);
	// echo '<br>';
// }

// array_push($arr, 'pineapple');

// print_r($arr);

// $input_array = array("FirSt" => 1, "SecOnd" => 4);
// print_r(array_change_key_case($input_array, CASE_LOWER));

// $input_array = array('a', 'b', 'c', 'd', 'e');
// print_r($input_array);
// print_r(array_chunk($input_array, 2));
// print_r(array_chunk($input_array, 2, true));

// $a = array('green', 'red', 'yellow');
// print_r($a);
// $b = array('avocado', 'apple', 'banana');
// print_r($b);
// $c = array_combine($a, $b);
// print_r($c);

// $array = array(1, "hello", 1, "world", "hello");
// print_r(array_count_values($array));


// $array1 = array("a" => "green", "red", "blue", "red");
// print_r($array1);
// $array2 = array("b" => "green", "yellow", "red");
// print_r($array2);
// $result = array_diff($array1, $array2);
// print_r($result);

// function odd($var)
// {
    // // returns whether the input integer is odd
    // //return $var & 1;
	// if($var % 2 == 0){
		// return false;
	// }else{
		// return true;
	// }
// }

// function even($var)
// {
    // // returns whether the input integer is even
    // return !($var & 1);
// }

// $array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
// $array2 = [6, 7, 8, 9, 10, 11, 12];

// echo "Odd :\n";
// print_r(array_filter($array1, "odd"));
// echo "Even:\n";
// print_r(array_filter($array2, "even"));

// $input = array("oranges", "apples", "pears");
// $flipped = array_flip($input);

// print_r($input);
// print_r($flipped);

// $search_array = array('first' => 1, 'second' => 4);
// print_r($search_array);
// if (array_key_exists('sfsd', $search_array)) {
    // echo "The 'first' element is in the array";
// }else{
	// echo 'Key does not exists';	
// }


// $array = array(0 => 100, "color" => "red");
// print_r(array_keys($array));

// function cube($n)
// {
    // return ($n * $n);
// }

// $a = [1, 2, 3, 4, 5];
// $b = array_map('cube', $a);
// print_r($b);


// $array1 = array("color" => "red", 2, 4);
// $array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
// $result = array_merge($array1, $array2);
// print_r($result);

// $arr = array('abc', 'xyz');
// array_push($arr, 'lmn');
// array_unshift($arr, 'opr');
// array_shift($arr);
// array_pop($arr);
// print_r($arr);

// $input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
// $rand_keys = array_rand($input, 4);
// echo $input[$rand_keys[0]] . "\n";
// echo $input[$rand_keys[1]] . "\n";
// print_r($rand_keys);

// $base = array("orange", "banana", "apple", "raspberry", 'pineapple');
// $replacements = array(0 => "pineapple", 4 => "cherry");
// $replacements2 = array(0 => "grape");

// $basket = array_replace($base, $replacements, $replacements2);
// print_r($basket);

// $input  = array("php", 4.0, array("green", "red"));
// $reversed = array_reverse($input);
// $preserved = array_reverse($input, true);

// print_r($input);
// print_r($reversed);
// print_r($preserved);

// $array = array(0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red');

// echo $key = array_search('green', $array); // $key = 2;
// echo "\n";
// echo $key = array_search('red', $array);   // $key = 1;

// $input = array("a", "b", "c", "d", "e");
// $output = array_slice($input, 2, 2); 
// print_r($output);

// $a = array(2, 4, 6, 8);
// echo "sum(a) = " . array_sum($a) . "\n";

// $input = array("a" => "green", "red", "b" => "green", "blue", "red");
// $result = array_unique($input);
// print_r($result);

// $array = array("size" => "XL", "color" => "gold");
// print_r(array_values($array));
// print_r(array_keys($array));

// $fruits = array("lemon", "orange", "banana", "apple");
// sort($fruits);

// print_r($fruits);

// echo count($fruits);
// echo '<br>';
// echo sizeof($fruits);

// $os = array("Mac", "NT", "Irix", "Linux");

// var_dump(in_array("Irix", $os));

$os = array("Mac", "NT", "Irix", "Linux");

foreach($os as $val){
	echo $val . '<br>';
}