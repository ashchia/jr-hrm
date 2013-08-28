<?php
$imagePath = theme_path("images/login");
$version = '3.1';
$copyrightYear = date('Y');
?>

<style type="text/css">
    #divFooter {
        text-align: center;
    }
    
    #spanCopyright, #spanSocialMedia {
        padding: 20px 10px 10px 10px;
    }
    
    #spanSocialMedia a img {
		border: none;
    }

</style>
<div id="divFooter" >
    <span id="spanCopyright">
        <a href="http://www.justrecruit.com.sg" target="_blank">Just Recruit</a> 
        &copy; Just Recruit <?php echo date('Y'); ?> All rights reserved.
    </span>
    <span id="spanSocialMedia">
        <a href="#" target="_blank">
            <img src="<?php echo "{$imagePath}/linkedin.png"; ?>" /></a>&nbsp;
        <a href="http://www.facebook.com/Juzrecruit" target="_blank">
            <img src="<?php echo "{$imagePath}/facebook.png"; ?>" /></a>&nbsp;
        <a href="#" target="_blank">
            <img src="<?php echo "{$imagePath}/twiter.png"; ?>" /></a>&nbsp;
        <a href="#" target="_blank">
            <img src="<?php echo "{$imagePath}/youtube.png"; ?>" /></a>&nbsp;
    </span>
    <br class="clear" />
</div>
