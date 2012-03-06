<?php 

require_once 'inc/Ncsutwitter.php';

$ncsutwitter = new Ncsutwitter();

$down = false;
try {
    $timeline = $ncsutwitter->getTimeline();
} catch (Exception $e) {
    $down = true;
}

$fa = array();

$fa['title'] = 'Meredith College Tweets';
$fa['link']  = 'http://twitter.com/statuses/user_timeline/25552351.rss';
$fa['charset'] = 'UTF-8';
$fa['author']  = 'My Organization';

$entries = array();

if (!$down) {
    foreach ($timeline as $t) {
    
        $temp = array();
    
        $temp['title'] = 'Tweet by @' . $t['user-screen_name'];
        $temp['link'] = 'http://www.twitter.com/' . $t['user-screen_name'] . '/status/' . $t['id'];
        $temp['description'] = $t['text'] . '<br /><br />Follow @<a href="http://www.twitter.com/' . $t['user-screen_name'] . '">' . $t['user-screen_name'] . '</a>';
        $temp['lastUpdate'] = strtotime($t['created_at']);

        $entries[] = $temp;
    }
}

$fa['entries'] = $entries;

// importing a rss feed from an array
$rssFeed = Zend_Feed::importArray($fa, 'rss');


// send http headers and dump the feed
$rssFeed->send();