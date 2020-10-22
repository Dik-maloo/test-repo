<?php
/**
 * Plugin Name: Thông tin liên hệ
 * Description: This plugin displays a table of products and their prices group by categories
 * Plugin URI: http://easytech.vn/et-woo-product-price-plugin-for-wordpress/
 * Author: chú bé đần
 * Version: 1.0
 * Author URI: http://easytech.vn
 *
 *
 * Et-woo-product-price is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * Et-woo-product-price is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

if( apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) {
	register_activation_hook(__FILE__, 'create_table_lienhe');

	function create_table_lienhe() {
		global $wpdb;
		$table_name = $wpdb->prefix."lienhe";
		if ($wpdb->get_var('SHOW TABLES LIKE '.$table_name) != $table_name) {
			$sql = 'CREATE TABLE '.$table_name.'(
			id INTEGER NOT NULL AUTO_INCREMENT,
			tendoanhnghiep VARCHAR(50),
			diachi NVARCHAR(255),
			email VARCHAR(50),
			sodienthoai NVARCHAR(50),
			PRIMARY KEY  (id))';
			require_once(ABSPATH.'wp-admin/includes/upgrade.php');
			dbDelta($sql);
			add_option("create_table_lienhe_version", "1.0");
		}
	}
	add_action('admin_menu', 'thongtinlienhe');
	function thongtinlienhe(){
	      add_menu_page( 'Thông tin liên hệ', 'thongtinlienhe', 'manage_options','main-plugin-tdc', 'cpanel_control'); 
	}
	function cpanel_control(){ 
	   include 'template/TiepNhanThongTin.php';
	}
	add_shortcode( 'lienheshortcode', 'cpanel_control' );

}
?>