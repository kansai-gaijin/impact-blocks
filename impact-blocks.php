<?php
  /*
  Plugin Name: Impact Theme Blocks
  */

  function gutenberg_examples_01_register_block() {

    // automatically load dependencies and version
    $asset_file = include( plugin_dir_path( __FILE__ ) . 'build/block.asset.php');

    wp_register_script(
      'gutenberg-examples-03-esnext',
      plugins_url( 'build/block.js', __FILE__ ),
      $asset_file['dependencies'],
      $asset_file['version']
  );

    wp_register_style(
      'gutenberg-examples-02-editor',
      plugins_url( 'editor.css', __FILE__ ),
      array( 'wp-edit-blocks' ),
      filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' )
  );

  wp_register_style(
      'gutenberg-examples-02',
      plugins_url( 'style.css', __FILE__ ),
      array( ),
      filemtime( plugin_dir_path( __FILE__ ) . 'style.css' )
  );
  
    register_block_type( 'gutenberg-examples/example-01-basic-esnext', array(
      'style' => 'gutenberg-examples-02',
      'editor_style' => 'gutenberg-examples-02-editor',
        'editor_script' => 'gutenberg-examples-03-esnext',
    ) );

    

  }
  add_action( 'init', 'gutenberg_examples_01_register_block' );