<?php
/**
 * Created by PhpStorm.
 * User: Youi
 * Date: 2015-08-22
 * Time: 23:08
 */

$the_lover_text = file_get_contents('./The Lover.txt');
$chapters       = explode('####', preg_replace('/第.+?章/', '####$0', $the_lover_text));

unset($chapters[0]);
foreach ($chapters as $index => $chapter_str) {
    $lines = explode("\n", $chapter_str);
    foreach ($lines as &$line) {
        $line = trim($line);
        $line && $line = "<p>$line</p>\n";
    }
    $lines[0] = str_replace('p', 'h3', $lines[0]);

    file_put_contents("./chapters/chapter_$index.htm", implode($lines));
}