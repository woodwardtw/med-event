<?php
/**
 * Template Name: Month Page
 * The template for displaying the month view on the front page.
 *
 *
 * @package TribeEventsCalendar
 */

get_header(); ?>

<?php $now = date_i18n( 'Y-m-01' ) ?>
<?php tribe_show_month( array( 'eventDate' => $now, 'tribe-events/month/content' ) )?>
<?php get_template_part('page' ); ?>
		<?php comments_template( '', true ); ?>

<?php get_footer(); ?>