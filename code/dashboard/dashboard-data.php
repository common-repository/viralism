<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $wpdb;
$content_campaign7  = 0;
$video_campaign7    = 0;
$countContent       = 0;
$countVideo         = 0;
$content_file       = '';       
$video_file         = '';
$no_of_days         = 7;
$current_date_time  = current_time( 'mysql' );
$start_date         = date('Y-m-d', strtotime('-6 days', strtotime($current_date_time)));
$current_date       = $current_date_time; //date('Y-m-d H:i:s');
$last_30_days       = date('Y-m-d',strtotime('-30days', strtotime($current_date_time)))." 00:00:00";
//All Content Campaign
$content_campaign   = count($wpdb->get_results("SELECT id FROM ".$wpdb->prefix."vio_content WHERE post_id!='0' AND published_date <='".$current_date."' AND video_url='' AND campaign_type!='4' AND campaign_type!='5'"));
//All Video Campaign
$video_campaign     = count($wpdb->get_results("SELECT id FROM ".$wpdb->prefix."vio_content WHERE post_id!='0' AND published_date <='".$current_date."' AND video_url!='' AND campaign_type!='4' AND campaign_type!='5'"));
//Last 30 Days Content Campaign
$content_campaign30   = count($wpdb->get_results("SELECT id FROM ".$wpdb->prefix."vio_content WHERE post_id!='0' AND published_date >='".$last_30_days."' AND published_date <='".$current_date."' AND video_url='' AND campaign_type!='4' AND campaign_type!='5'"));
//Last 30 Days Video Campaign
$video_campaign30     = count($wpdb->get_results("SELECT id FROM ".$wpdb->prefix."vio_content WHERE post_id!='0' AND published_date >='".$last_30_days."' AND published_date <='".$current_date."' AND video_url!='' AND campaign_type!='4' AND campaign_type!='5'"));
//Last 5 Campaign
$recent_five_post = $wpdb->get_results("SELECT vioc.title,vioc.post_id,vioc.campaign_type,vioc.video_url FROM ".$wpdb->prefix."vio_content vioc LEFT JOIN ".$wpdb->prefix."posts viop ON vioc.post_id=viop.ID  WHERE vioc.post_id!='0' AND vioc.published_date <='".$current_date."' AND viop.post_status='publish' ORDER BY vioc.post_id DESC LIMIT 0,5");

for ($i=0; $i < $no_of_days ; $i++) {
  $date_new         = date('Y-m-d', strtotime($start_date.'+'.$i.' days'));
  $countContent     = count($wpdb->get_results("SELECT id FROM ".$wpdb->prefix."vio_content WHERE post_id!='0' AND published_date like '%".$date_new."%' AND video_url='' AND campaign_type!='4' AND campaign_type!='5'"));
  $countVideo       = count($wpdb->get_results("SELECT id FROM ".$wpdb->prefix."vio_content WHERE post_id!='0' AND published_date like '%".$date_new."%' AND video_url!='' AND campaign_type!='4' AND campaign_type!='5'"));
  $content_campaign7    += $countContent;
  $video_campaign7      += $countVideo;
  $date_array = explode("-", $date_new);
  $year   = $date_array[0];
  $month  = $date_array[1]-1;
  $date   = $date_array[2];
  $final_date= $year.', '.$month.', '.$date;
  if($i==0){
    $content_file   .=' [new Date('.$final_date.'), '.$countContent.']';
    $video_file     .=' [new Date('.$final_date.'), '.$countVideo.']';
  }else{
    $content_file .=', [new Date('.$final_date.'), '.$countContent.']';
    $video_file .=', [new Date('.$final_date.'), '.$countVideo.']';
  }
}
?>