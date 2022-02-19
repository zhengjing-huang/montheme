<?php



function getSectionIcon($name){
    //return $list[$name];
    $list=[
        "films"=> "https://img.icons8.com/external-justicon-lineal-justicon/50/000000/external-film-photography-justicon-lineal-justicon.png",
        "webtoon"=> "https://img.icons8.com/ios-glyphs/50/000000/open-book--v1.png",
        "series"=> "https://img.icons8.com/ios-glyphs/50/000000/retro-tv.png",
    ];
    //var_dump($list);
    return $list[$name];
}


function getPostsFromCateName($post_name){
    $args = [
        'post_type' => 'post',
        'post_status'=>'publish',
        'category_name'=>$post_name,
    ];
    $posts = (new WP_Query( $args ))->posts;
    return $posts;
}

?>