<?php

set_include_path(realpath(dirname(__FILE__) . '/../'));

require_once 'Tweetgater/Twitter.php';

/**
 * Does all interaction with the twitter API for the NCSU twitter page
 * 
 * @author jfaustin
 *
 */
class Tweetgater_Display
{
    public static function timeline($page = 1)
    {
        $ncsu = new Tweetgater_Twitter();
        
        $error = '';
        
        try {
            $timeline = $ncsu->getTimeline($page);
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
        
        $ret = '';
        
        if ($error == '') {
            foreach ($timeline as $t) {
                $ret .= '<div class="tweet">'
                     . '    <div class="avatar">'
                     . '        <img src="' . $t['user-profile_image_url'] . '" alt="' . $t['user-name'] . '" width="48" height="48" />'
                     . '    </div>'
                     . '    <div class="text">'
                     . '        <a class="username" href="http://twitter.com/' . $t['user-screen_name'] . '">' . $t['user-screen_name'] . '</a> ' . $t['text']
                     . '    </div>'
                     . '    <div class="origination"> ' . $t['elapsed_time'] . ' from ' . $t['source']
                     . (($t['in_reply_to_screen_name'] != '') ? ' <a class="user" href="http://www.twitter.com/' . $t['in_reply_to_screen_name'] . '/status/' . $t['in_reply_to_status_id'] . '">in reply to ' . $t['in_reply_to_screen_name'] . '</a>' : '')
                     . '    </div>'
                     . '    <div style="clear:both;"></div>'
                     . '</div>'
                     ;
            }
            
            $ret .= '<br /><br />';
                 //. '<a class="twitterButton" href="index.php?page=' . ($page + 1) . '">More...</a>'
                 //;
        } else {
            $ret = $error;
        }
        
        return $ret;
    }	
    
    public static function accounts()
    {

        $ncsu = new Tweetgater_Twitter();
        
        $error = '';
        try {
            $friends = $ncsu->getFriends();
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
        
        $ret = '';
        
        if ($error == '') {
            $ret = '<h2 class="tweetHeader">' . count($friends) . ' Organizations are Tweeting</h2>';
            
            $i = 0; 
            foreach ($friends as $f) {
                $ret .= '<div class="tweet friend ' . (($i % 2 == 0) ? 'row1' : 'row2') . '">'
                     . '    <div class="avatar"><img src="' . $f['profile_image_url'] . '" alt="' . $f['name'] . '" width="48" height="48" /></div>'
                     . '    <div class="text">'
                     . '        <span class="name">' . $f['name'] . '</span><br />'
                     . (($f['description'] != '') ? $f['description'] . '<br />' : '')
                     . '        <a class="follow" href="http://twitter.com/' . $f['screen_name'] . '">Follow @' . $f['screen_name'] . '</a>'
                     . '    </div>'
                     . '    <div style="clear:both;"></div>'
                     . '</div>'
                     ;
                     
                $i++;
            }         
        } else {
            $ret = $error;
        }
        
        return $ret;
    }
    
    public static function feed()
    {
        $ncsu = new Tweetgater_Twitter();
        
        $down = false;
        try {
            $timeline = $ncsu->getTimeline();
        } catch (Exception $e) {
            $down = true;
        }
        
        $config = $ncsu->getConfigFile();
        
        $fa = array();
        
        $fa['title'] = $config->feed->title;
        $fa['link']  = $config->site->url. '/feed.php';
        $fa['charset'] = 'UTF-8';
        $fa['author']  = $config->feed->title;
        
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
    }
}