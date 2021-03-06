<?php

require __DIR__ . '/../vendor/autoload.php';

try {
    $cache = new Instagram\Storage\CacheManager(__DIR__ . '/../cache/');

    $api = new Instagram\Api($cache);
    $api->login('username', 'password');
    $api->setUserName('pgrimaud');

    // only the first page
    /** @var \Instagram\Hydrator\Component\Feed $feed */
    $feed = $api->getFeed();

    echo '============================' . "\n";
    echo 'User Informations : ' . "\n";
    echo '============================' . "\n\n";

    echo 'ID               : ' . $feed->getId() . "\n";
    echo 'Full Name        : ' . $feed->getFullName() . "\n";
    echo 'UserName         : ' . $feed->getUserName() . "\n";
    echo 'Following        : ' . $feed->getFollowing() . "\n";
    echo 'Followers        : ' . $feed->getFollowers() . "\n";
    echo 'Biography        : ' . $feed->getBiography() . "\n";
    echo 'External Url     : ' . $feed->getExternalUrl() . "\n";
    echo 'Profile Picture  : ' . $feed->getProfilePicture() . "\n";
    echo 'Verified Account : ' . ($feed->isVerified() ? 'Yes' : 'No') . "\n";
    echo 'Private Account  : ' . ($feed->isPrivate() ? 'Yes' : 'No') . "\n";
    echo 'Media Count      : ' . $feed->getMediaCount() . "\n\n";

} catch (Exception $exception) {
    print_r($exception->getMessage());
} catch (\GuzzleHttp6\Exception\GuzzleException $e) {
    print_r($exception->getMessage());
}
