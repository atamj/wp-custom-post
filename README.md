# wp-custom-post
Class that allows you to create custom posts easily

## Parameters:
    
    /**
     * @param string $post_type     Post type key. Must not exceed 20 characters and may only contain lowercase alphanumeric characters, dashes, and underscores.
     * @param string $menu_name     Name of the post type shown in the menu. Usually plural. Default is value of $labels['name']. Also used for $args['label'].
     * @param array $supports       Core feature(s) the post type supports (['title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats']). Default all support. Used for $args['supports'].
     * @param array $args           (Optional) Array of arguments for registering a post type.Dafault $args = ['has_archive'=>true, 'public'=>true, 'exclude_from_search'=>true, 'rewrite'=>$menu_name]. See https://developer.wordpress.org/reference/functions/register_post_type
     */
     
Example for all support and best default args:
     
     new CustomPost('test', 'Tests');
     
Example for custom support and best default args:
 
    new CustomPost('test', 'Tests', ['title', 'editor', 'thumbnail', 'custom-fields'])
     
Example fo custom support and custom args:
    
    new CustomPost('test', 'Tests', ['title', 'editor', 'thumbnail', 'custom-fields'], ['exclude_from_search'=>false])
 
