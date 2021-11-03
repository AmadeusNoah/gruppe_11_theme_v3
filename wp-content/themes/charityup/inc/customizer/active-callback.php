<?php

// Theme Options.
function charityup_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'charityup_enable_pagination' )->value() );
}
function charityup_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'charityup_enable_breadcrumb' )->value() );
}
function charityup_is_custom_button_enabled( $control ) {
	return ( $control->manager->get_setting( 'charityup_enable_custom_button' )->value() );
}

// Banner section.
function charityup_is_banner_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'charityup_enable_banner_section' )->value() );
}
function charityup_is_banner_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'charityup_banner_content' )->value();
	return ( charityup_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function charityup_is_banner_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'charityup_banner_content' )->value();
	return ( charityup_is_banner_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Cause section.
function charityup_is_cause_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'charityup_enable_cause_section' )->value() );
}

// About section.
function charityup_is_about_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'charityup_enable_about_section' )->value() );
}
function charityup_is_about_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'charityup_about_content_type' )->value();
	return ( charityup_is_about_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function charityup_is_about_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'charityup_about_content_type' )->value();
	return ( charityup_is_about_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Counter section.
function charityup_is_counter_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'charityup_enable_counter_section' )->value() );
}

// Team section.
function charityup_is_team_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'charityup_enable_team_section' )->value() );
}
function charityup_is_team_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'charityup_team_content_type' )->value();
	return ( charityup_is_team_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function charityup_is_team_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'charityup_team_content_type' )->value();
	return ( charityup_is_team_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Event section.
function charityup_is_event_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'charityup_enable_event_section' )->value() );
}
function charityup_is_event_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'charityup_event_content_type' )->value();
	return ( charityup_is_event_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function charityup_is_event_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'charityup_event_content_type' )->value();
	return ( charityup_is_event_section_enabled( $control ) && ( 'page' === $content_type ) );
}
function charityup_is_event_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'charityup_event_content_type' )->value();
	return ( charityup_is_event_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Blog section.
function charityup_is_blog_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'charityup_enable_blog_section' )->value() );
}
