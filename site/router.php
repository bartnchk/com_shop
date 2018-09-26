<?php

    defined('_JEXEC') or die();

    function ShopBuildRoute(&$query) {

        $segments = array();

        $view = $query['view'];
        $alias = $query['alias'];

        unset( $query['view'] );
        unset( $query['alias'] );

        if ($view == 'category') {
            $segments[] = $alias;
        }

        if ($view == 'product') {
            $segments[] = $query['category_alias'];
            $segments[] = $alias;

            unset( $query['category_alias'] );
        }

        return $segments;

    }

    function ShopParseRoute($segments) {

        $vars = array();
        $count = count($segments);

        if ($count == 1) {
            $vars['view'] = 'category';
            $vars['alias'] = str_replace(':','-', $segments[0]);
        }

        if ($count == 2) {
            $vars['view'] = 'product';
            $vars['alias'] = str_replace(':','-', $segments[1]);
            $vars['category_alias'] = str_replace(':','-', $segments[0]);
        }

        return $vars;
    }