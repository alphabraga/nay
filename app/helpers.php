<?php


//$b = build_tree($a);

function buildTree(array &$elements, $parentId = null) {

    $branch = array();

    foreach ($elements as &$element) {

        if ($element['category_id'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[$element['id']] = $element;
            unset($element);
        }
    }
    return $branch;
}