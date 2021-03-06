<?php

function cmp($a, $b)
{
    if ($a->menu_order == $b->menu_order) {
        return 0;
    }
    return ($a->menu_order < $b->menu_order) ? -1 : 1;
}

function getMenuList(){
    $args = [
          'post_parent'=>0,
          'post_type'=>'page',
    ];
    $my_pages = get_posts($args);
    $list = [];
    usort($my_pages,'cmp');
    foreach ($my_pages as $page){
        $args = [
          'post_parent'=>$page->ID,
          'post_type'=>'page',
        ];
        $subPages = get_posts($args);
        $children=[];
        foreach($subPages as $subPage){
          array_push($children, [
            "name"=>$subPage->post_name,
            "url"=>$subPage->guid,
            "ID"=>$subPage->ID,
          ]);
          
        }
        $object = [
          "parent"=>[
            "url"=>$page->menu_order == 1 ? "/wordpress" : $page->guid,
            "name"=>$page->post_name,
            "menu_order"=>$page->menu_order,
            "ID"=>$page->ID,
          ],
          "children"=>$children,
        ];
        array_push($list, $object);
      
    }
    return $list;
  }

?>