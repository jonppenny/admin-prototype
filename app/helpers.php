<?php
/**
 * This is the helpers file. Here you can specify any global helper functions
 * that can be referenced anywhere in your code. This also includes being
 * called in any template files.
 *
 * @since  0.1.0
 * @author Jon Penny <jon@completecontrolc.o.uk>
 */

if (!function_exists('setSelected')) {
    /**
     * Helper function to set the current option element in a select element to be selected if the $match is equal to
     * the $value.
     *
     * Check if the currently assigned value matched the value property of the option tag. If true, return a string.
     *
     * @param string $match    The string currently set
     * @param string $value    The value to match against
     * @param string $selected The string to return if true
     *
     * @return string
     */
    function setSelected($match, $value, $selected = 'selected=selected')
    {
        return ($match === $value) ? $selected : '';
    }
}

if (!function_exists('setActive')) {
    /**
     * Helper function to set the menu item to active if the $path parameter matched to the current URL.
     * Wildcard paths are allowed using the asterix character.
     *
     * @param string $path   The Path to match to
     * @param string $active (optional) The call to add to the item if the URL and path parameter match
     *
     * @return string The $active parameter string
     */
    function setActive($path, $active = 'active')
    {
        return Request::is($path) ? $active : '';
    }
}

if (!function_exists('displayVersion')) {
    /**
     * Echo the version of the app.
     */
    function displayVersion()
    {
        echo 'Version&nbsp;' . config('app.version');
    }
}

if (!function_exists('getFiles')) {
    /**
     * Get a list of all the blade templates that are in the
     * resources/views/sites directory. A template can then be assigned to a
     * page.
     *
     * @param string $directory The directory to retrieve a list of files from.
     *
     * @return array $result An array containing a list of all the files
     */
    function getFiles($directory)
    {
        $result = [];
        $files  = array_diff(scandir($directory), ['..', '.']);

        foreach ($files as $file) {
            $file     = explode('.', $file, 2);
            $result[] = $file[0];
        }

        return $result;
    }
}

if (!function_exists('displayMenu')) {
    /**
     * Display the menu based on the menu name and arguments.
     * TODO: build up the menu to be more flexible
     *
     * @param array $args
     */
    function displayMenu($args = [])
    {
        $pages = \App\Page::all();

        if ($pages) {
            print('<ul class="nav navbar-nav">');
            foreach ($pages as $page) {
                printf(
                    '<li class="%s"><a href="%s">%s</a></li>',
                    setActive($page->slug),
                    $page->slug,
                    $page->title
                );
            }
            print('<ul>');
        }
    }
}
