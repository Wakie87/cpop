<?php

if (! function_exists('html')) {
    /**
     * Get html builder instance.
     *
     * @return \Collective\Html\HtmlBuilder
     */
    function html()
    {
        return app('html');
    }
}

if (! function_exists('form')) {
    /**
     * Get html builder instance.
     *
     * @return \Collective\Html\FormBuilder
     */
    function form()
    {
        return app('form');
    }
}