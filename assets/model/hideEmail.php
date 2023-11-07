<?php

function hideEmailBeforeDomain($email)
{
    $domain = '@gmail.com'; // Specify the domain you want to keep
    $domainPosition = strpos($email, $domain); // Find the position of the domain

    if ($domainPosition === false) {
        return $email; // If the domain is not found, return the original email
    }

    $beforeDomain = substr($email, 0, 2); // Get the first two characters
    $hiddenMiddle = str_repeat('*', $domainPosition - 2); // Create a string of asterisks for the hidden part
    $lastTwoBeforeDomain = substr($email, $domainPosition - 2, 2); // Get the last two characters before the domain
    $afterDomain = substr($email, $domainPosition); // Get the domain and characters after it

    return $beforeDomain . $hiddenMiddle . $lastTwoBeforeDomain . $afterDomain;
}
