<?php  
$bannerGroup = get_field('banner_group'); 
$bannerOptions = get_field('banner_options'); 
$bannerType = $bannerGroup['banner_type']; $bannerImage = $bannerGroup['banner_image']; $bannerVidFile = $bannerGroup['banner_video_file']; $bannerVidEmbed = $bannerGroup['banner_video_embed']; $embedType = $bannerVidEmbed['embed_type']; $youtubeEmbed = $bannerVidEmbed['youtube_embed']; $vimeoEmbed = $bannerVidEmbed['vimeo_embed']; 
$captionGroup = get_field('caption_group');$captionIsH1 = $captionGroup['is_heading_h1'];$captionBigtxt = $captionGroup['caption']; $captionLink = $captionGroup['caption_link']; 
$isCaption = $bannerOptions['iscaption'];$sliderBtnToggle = $bannerOptions['slider_btn_toggle'];$parallax = $bannerOptions['parallax']; $bannerToFold = $bannerOptions['banner_to_fold'];$captionContent = $captionGroup['caption_content'];$parallaxSpeed = $bannerOptions['parallax_speed']; 
?> 
<div id="banner" data-height="<?php if($bannerToFold != -1 ): echo $bannerToFold; else: echo 'False';endif;?>" data-parallax="<?php echo $parallax ? 'True':'False';?>" data-parallax-value="<?php echo $parallax ? 'on':'off'; ?>" data-parallax-speed="<?php echo $parallaxSpeed; ?>"> 
    <div class="banner-inner"> 
        <?php switch ($bannerType) { 
            case 'Image': echo $bannerImage ? '<img class="banner-img img-responsive '.($parallax ? 'parallax-file-item':'').'" src="'. $bannerImage['url'] .'" title="'.$bannerImage['title'].'" alt="'.$bannerImage['title'].'" >' : ''; break; 
            case 'Video File': echo $bannerVidFile ? '<div class="banner-video"><video class="'.($parallax ? 'parallax-file-item parallax-video':'').'" autoplay muted loop playsinline><source src="'. $bannerVidFile['url'] .'" type="video/mp4" /></video></div>' : '';break; 
            case 'Video Embed': 
                switch ($embedType) { 
                    case 'YouTube': 
                        echo $youtubeEmbed ? '<div class="youtube-banner-video"><iframe class="'.($parallax ? 'parallax-embed-item youtube-parallax-video':'').'" src="https://www.youtube.com/embed/'. $youtubeEmbed .'?rel=0;&controls=0&autoplay=1&mute=1&loop=1&playlist='. $youtubeEmbed .'" frameborder="0" allowfullscreen include></iframe></div>' : ''; 
                    break; 
                    case 'Vimeo': 
                        echo $vimeoEmbed ? '<div class="vimeo-banner-video"><iframe class="'.($parallax ? 'parallax-embed-item vimeo-parallax-video':'').'" src="https://player.vimeo.com/video/'. $vimeoEmbed .'?background=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>' : ''; 
                    break; 
                };break; 
            case 'Image Slider': ?> 
        <?php if(have_rows('banner_group')): while(have_rows('banner_group')): the_row(); 
                    if(have_rows('slider')): ?> 
        <div id="carousel-slider" class="carousel fade" data-ride="carousel"> 
            <div class="carousel-inner"> 
                <?php $i=0; while(have_rows('slider')): the_row(); $i++; $image = get_sub_field('image');?> 
                <?php echo $image ? '<div class="'. ($i==1 ? 'item active' : 'item') .'"><div class="slider-img-container"><img class="slider-img" src="'. $image['url'] .'" alt="'. $image['alt'] .'" title="'. $image['title'] .'"></div></div>' : ''; ?> 
                <?php endwhile; ?> 
            </div> 
            <?php if($sliderBtnToggle):?> 
            <a class="left carousel-control" href="#carousel-slider" role="button" data-slide="prev" title="Left" alt="Left"><span class="fas fa-chevron-left"></span></a> 
            <a class="right carousel-control" href="#carousel-slider" role="button" data-slide="next" title="right" alt="right"><span class="fas fa-chevron-right"></span></a> 
            <?php endif;?> 
        </div> 
        <?php endif; endwhile; endif; break; 
        }; 
        if($isCaption): 
        echo $isCaption ? '<div class="caption carousel-caption">':'';?> 
        <?php echo $captionBigtxt ? ($captionIsH1 ? '<h1 class="captionHeading">'.$captionBigtxt.'</h1>':'<span class="captionHeading">'.$captionBigtxt.'</span>') : '';?> 
        <?php echo $captionContent ? $captionContent : '';?> 
        <?php echo $captionLink ? '<a href="'. $captionLink['url'] . '" class="btn" title="'. $captionLink['title'] . ($captionLink['target'] ? '" target="_blank">' : '">') . $captionLink['title']. '</a>': ''; ?> 
        <?php echo $isCaption ? '</div>':''; 
        endif;?> 
    </div> 
</div>