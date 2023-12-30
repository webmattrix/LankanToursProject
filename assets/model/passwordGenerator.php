<?php
function generatePassword($length)
{
    $capitalLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowercaseLetters = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';

    $allChars = $capitalLetters . $lowercaseLetters . $numbers;

    $password = '';

    // Ensure at least one character from each category
    $password .= $capitalLetters[rand(0, strlen($capitalLetters) - 1)];
    $password .= $lowercaseLetters[rand(0, strlen($lowercaseLetters) - 1)];
    $password .= $numbers[rand(0, strlen($numbers) - 1)];

    // Fill the rest of the password
    for ($i = 4; $i < $length; $i++) {
        $password .= $allChars[rand(0, strlen($allChars) - 1)];
    }

    // Shuffle the characters in the password
    $password = str_shuffle($password);

    return $password;
}
