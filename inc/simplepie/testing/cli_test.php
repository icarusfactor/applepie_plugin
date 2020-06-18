#!/usr/bin/php
<?php
include_once('../autoloader.php');

// Parse it
$feed = new SimplePie();
if (isset($argv[1]) && $argv[1] !== '')
{
	$feed->set_feed_url($argv[1]);    
     // Trigger force-feed
            $feed->force_feed(true);
            $feed->enable_cache(true);
            $feed->set_cache_location( './cache');
            $feed->set_cache_duration(10800);
	    $success = $feed->init();
            $feed->handle_content_type();
             
}

$items = $feed->get_items();
$i = 0;
$max_items=10;
if(  $success ) {
               foreach($feed->get_items()as $item){
                $i ++;
                
            if($i >= $max_items) {
                break;
            }
            
            if(!empty($item->get_title())) {
                if($item->get_permalink())
                echo $item->get_permalink();
                echo $item->get_title();
                echo $item->get_date('j M Y, g:i a');
                echo $item->get_description();
                }
                $contentrss[$i] = $item->get_content();
                
               }   //endforeach; 
 //              }  //endif;    
            

// {
//foreach ($items as $item)
//{
//	echo $item->get_title() . "\n";
//}

var_dump($feed->get_item_quantity());
} else echo "failed";;


?>
