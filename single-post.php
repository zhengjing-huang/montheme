<?php 
get_header(); 
global $post;
?>

    
    
    <div class="row" style="margin-top:50px; display:none;">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1><?php the_title() ?></h1>
                <p>
                    <img src="<?php the_post_thumbnail_url() ?>" alt="" style="width:100%; height:auto;">
                </p>
                <?php the_content() ?>


                <?php
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                ?>

        <?php endwhile;
        endif; ?>
    </div>

    <?php 
        $info = get_bloginfo( 'template_directory' ).'/images/film_profil.png';
    ?>

    
    <div style="width:100%;position:absolute;left:0;background-color:rgba(247,247,247);display:flex;flex-direction:column;height:470px">
        <div style="overflow:hidden;height:250px;">
            <img src="<?= $info ?>" alt="" style="width:100%; filter: blur(1.15rem);z-index:0;">
        </div>
        
        <div class="container">
            <div style="margin-top:-100px;position:absolute;display:flex;gap:20px;">
            
                <div class="hover-fade" style="display:flex;position:relative;">
                    
                    <div    class="col-xs-6 col-sm-3 hover-fade myCard" 
                            style="width: 100%;border-radius:5px;overflow: hidden; display:flex;">
                        <a href="<?= $post->guid ?>" title="" style="width:200px">
                            <?= get_the_post_thumbnail($post->ID) ?>
                        </a>
                        <?php
                        if (strlen(get_the_post_thumbnail($post->ID)) > 0):
                        ?>
                            <div class="play" style="">
                                                    
                                <a href="<?= $post->guid ?>" title="" style="background-color:transparent;">
                                    <img    src="https://img.icons8.com/fluency/48/000000/play-button-circled.png"
                                            style="width:45px;z-index:999;"
                                    />
                                </a>
                                                    
                            </div>
                        <?php endif; ?>
                        
                    </div>
                    
                </div>
                <div style="flex-direction:column;color:white; margin-top:15px;">
                    <h4><?= $post->post_title ?></h4>
                    <div>
                        <span style="color:rgba(240,80,33)">6.0</span>
                        <span style="color:rgba(259,159,55); margin-left:15px;">★</span>
                        <span style="color:rgba(259,159,55)">★</span>
                        <span style="color:rgba(259,159,55)">★</span>
                        <span style="">★</span>
                        <span style="">★</span>
                    </div>
                    
                    <div style="display:flex;gap:10px">
                        <div style="display:flex;margin-top:35px;color:black;flex-direction:column;">
                            <span> Année:</span>
                            <span>Acteurs:</span>
                            <span>Résumé:</span>
                        </div>
                        <div style="display:flex;margin-top:35px;color:black;flex-direction:column;">
                            <span> 2022 | Lieu: Corée | Catégorie: Action </span>
                            <span>张蓝心 邱意浓 曾江 淳于珊珊 石修 郑罗茜 </span>
                            <span>任达华、吴镇宇、张蓝心等主演院线新片《爷们》今天在云南西双版纳正式开机！吴镇宇同时担任本片艺术总监，邱意浓、曾</span>
                        </div>
                    </div>
                    
                    <div style="margin-top:30px;display:flex; justify-content:space-between;">
                        <button style="background-color:rgba(0,139,249);border:none;padding:8px 20px;border-radius:5px;">
                            <span style="color:white">
                                Play
                            </span> 
                        </button>
                        <button style="background-color:rgba(255,171,47);border:none;padding:8px 20px;border-radius:5px;">
                            <span style="color:white">
                                Partager
                            </span> 
                        </button>
                    </div>
                    
                </div>
                                    
            </div>
        </div>
        <!-- section bas -->
        <!-- <div style="display:flex;flex-direction:">
            <h4>Présentation</h4>
            <p>
                唐门凭秘宝洞天仪洞察天机,提前预知恶人名录,并在其作恶之前诛杀,护卫天下太平。可唐门掌门唐无烟之名，竟也出现于洞天仪之上，唐无烟被迫逃走，遇到善良小贼楚晨和小米辣师徒，在其帮助下，重返唐门，打破预言，重掌自己的命运。
            </p>
        </div> -->
    </div>
    

<?php get_footer(); ?>
