<?php

namespace Atamj\WpCustomPost;

class CustomPost
{
    public string $post_type;
    public string $menu_name;
    public array $supports;
    public array $args;

    /**
     * @param string $post_type     Post type key. Must not exceed 20 characters and may only contain lowercase alphanumeric characters, dashes, and underscores.
     * @param string $menu_name     Name of the post type shown in the menu. Usually plural. Default is value of $labels['name'].
     * @param array $supports       Core feature(s) the post type supports.
     * @param array $args           (Optional) Array of arguments for registering a post type.
     */
    public function __construct(string $post_type, string $menu_name = '', array $supports = ['title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats'], array $args = [])
    {
        $this->post_type = sanitize_key($post_type);
        $this->menu_name = $menu_name ?: ucfirst($this->post_type);
        $this->supports = $supports;
        $this->args = $args;
        $this->setArgs();
        add_action('init', [$this, 'register']);
    }


    /**
     * @return void
     */
    public function setArgs()
    {
        $this->args['label'] = $this->menu_name;
        $this->args['supports'] = $this->supports;
        $this->args['has_archive'] = array_key_exists('has_archive', $this->args) ? $this->args['has_archive'] : true;
        $this->args['public'] = array_key_exists('public', $this->args) ? $this->args['public'] : true;
        $this->args['exclude_from_search'] = array_key_exists('exclude_from_search', $this->args) ? $this->args['exclude_from_search'] : true;
        $this->args['rewrite'] = array_key_exists('rewrite', $this->args) ? $this->args['rewrite'] : array('slug' => str_replace(' ', '-', strtolower($this->menu_name)));
    }

    /**
     * @return void
     */
    public function register()
    {
        register_post_type($this->post_type, $this->args);
    }

}