<?php 
echo '<pre>';
// $n = 123;
// echo $str = "Hello World $n";	// Hello World 123
// echo '<br>';
// echo $str = 'Hello World ' . $n;	// Hello World $n


// echo addslashes("rohan's book");

// $str = 'apple, banana, orange, mango';	// string to array

// $arr = explode(', ', $str);

// print_r($arr);

// echo implode('_', $arr);	// array to string
// echo '<br>';
// echo join('_', $arr);	// array to string

// $str = htmlentities('<b>Hello World</b>');

// echo $str;
// die;

// echo html_entity_decode($str);

// echo lcfirst('HELLO');

// echo md5('hdfjsahdkj hakdhak dh a');

 // $str = '
 // Hello 





 // World

 // Test
// ';

// echo nl2br($str);

// $n = 123345.345345;

// echo number_format($n, 2, '.', ', ');

// $string = 'The lazy fox jumped over the fence';

// if (str_contains($string, 'lazy')) {
    // echo "The string 'lazy' was found in the string\n";
// }

// echo str_replace('a', 'x', 'abc');

// $search = array('h', 'w', ' ');
// $replace = array('a', 'b', '_');
// echo str_replace($search, $replace, 'hello world');

// echo str_repeat("-=", 10);

// $str = 'abcdef';
// echo $shuffled = str_shuffle($str);

// echo rand(100,500);

$str = "Hello Friend";
$arr1 = str_split($str, 3);
$arr1 = explode(' ', $str);
print_r($arr1);

// $text = '<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>';
// echo strip_tags($text);

// $str = 'abcdef';
// echo strlen($str); // 6


// $mystring = 'abc';
// $findme   = 'b';
// $pos = strpos($mystring, $findme);

// echo $pos;


// echo strrev("Hello world!"); // outputs "!dlrow olleH"

// $str = "Mary Had A Little Lamb and She LOVED It So";
// $str = strtolower($str);
// echo $str; // Prints mary had a little lamb and she loved it so

// $str = "Mary Had A Little Lamb and She LOVED It So";
// $str = strtoupper($str);
// echo $str; // Prints MARY HAD A LITTLE LAMB AND SHE LOVED IT SO

// $text   = "\t\tThese are a few words :) ...  ";
// $binary = "\x09Example string\x0A";
// $hello  = "Hello World";
// var_dump($text, $binary, $hello);

// $trimmed = trim($text);
// var_dump($trimmed);

$foo = 'hello world!';
echo $foo = ucwords($foo);  