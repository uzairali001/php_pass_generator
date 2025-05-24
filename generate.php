<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405); //Method Not Allowed
}

// $rest_json = file_get_contents("php://input");
// $_POST = json_decode($rest_json, true);

$postData = (object)[
  "plainText" => $_POST["plain-text"],
  "cost" => $_POST["cost"] ?? 12,
  "algo" => $_POST["algo"] ?? "bcrypt",
];

if (!$postData->plainText) {
  http_response_code(400); //Bad Request
  return;
}



echo json_encode([
  "hash" => getHash($postData),
]);



/**
 * Returns a hash of the plaintext password, using the given algorithm.
 *
 * @param object $postData
 *   Plain text password to be hashed, cost of the hash, and algorithm to use.
 *   Algorithm can be 'bcrypt', 'md5', 'sha1', 'sha256', or 'sha512'.
 *
 * @return string
 *   Hashed password.
 *
 * @throws Exception
 *   If the algorithm is invalid.
 */
function getHash($postData)
{
  if ($postData->algo === "bcrypt") {
    $options = [
      'cost' => $postData->cost ?? 12,
    ];
    return password_hash($postData->plainText, PASSWORD_BCRYPT, $options);
  } else if ($postData->algo === "md5") {
    return md5($postData->plainText);
  } else if (in_array($postData->algo, ["sha1", "sha256", "sha512", "sha3-256", "sha3-512"])) {
    return hash($postData->algo, $postData->plainText);
  }


  throw new Exception("Invalid algorithm");
}
