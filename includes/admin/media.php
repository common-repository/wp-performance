<?php namespace WPP;

defined('ABSPATH') or exit; ?>

<div class="wpp-page-wrapper">

    <div class="wpp-content-section">
    
    <table>

        <tr>
            <td colspan="2"><h3><?php _e( 'Images', 'wpp' ); ?></h3></td>
        </tr>

        <tr>
            <td><strong><?php _e( 'Lazy load', 'wpp' ); ?></strong></td>
            <td>
                <label class="wpp-info">
                    <input type="checkbox" value="1" name="images_lazy" data-wpp-checkbox="images_exclude|disable_lazy_load_mobile" form="wpp-settings" <?php wpp_checked( 'images_lazy' ); ?> />
                    <?php _e( 'Lazy load images', 'wpp' ); ?>
                </label>

                <br /><br />
                <em><span class="dashicons dashicons-info"></span> <?php _e( 'Reduces the number of HTTP requests and improves loading time', 'wpp' ); ?></em>

            </td>
        </tr>

        <tr data-wpp-show-checked="disable_lazy_load_mobile">
            <td></td>
            <td>
                <label class="wpp-info">
                    <input type="checkbox" value="1" name="disable_lazy_mobile" form="wpp-settings" <?php wpp_checked( 'disable_lazy_mobile' ); ?> />
                    <?php _e( 'Disable lazy load on mobile devices', 'wpp' ); ?>
                </label>
            </td>
        </tr> 

        <tr>
            <td><strong><?php _e( 'Responsive images', 'wpp' ); ?></strong></td>
            <td>
                <label class="wpp-info">
                    <input type="checkbox" value="1" data-wpp-checkbox="images_exclude|images_options" name="images_resp" form="wpp-settings" <?php wpp_checked( 'images_resp' ); ?> />
                    <?php _e( 'Force images to use srcset attribute', 'wpp' ); ?>
                </label>
                <br /><br />
                <em><span class="dashicons dashicons-info"></span> <?php _e( 'Loads the best optimized image depending on users screen size and image sizes settings', 'wpp' ); ?></em>
            </td>
        </tr> 

        <tr data-wpp-show-checked="images_exclude">
            <td><strong><?php _e( 'Exclude', 'wpp' ); ?></strong></td>
            <td>

                <?php _e( 'Exclude image by name', 'wpp' ); ?>

                <br /><br />

                <?php $images_exclude = Option::get( 'images_exclude', [] ); ?>

                <div id="wpp-exclude-images-exclude">

                    <?php foreach( $images_exclude as $image ): ?>
                        <div class="wpp-dynamic-input-container">
                            <input name="images_exclude[]" value="<?php echo $image; ?>" class="wpp-dynamic-input" form="wpp-settings" type="text" required> &nbsp; 
                            <a href="#" data-name="images_exclude[]" class="button wpp-remove-input"><?php _e( 'Remove', 'wpp' ); ?></a>
                        </div>
                    <?php endforeach; ?>

                </div>

                <a href="#" class="button" data-add-input="images_exclude[]"  data-container="#wpp-exclude-images-exclude"><?php _e( 'Add Image', 'wpp' ); ?></a>

            </td>
        </tr> 

        <tr data-wpp-show-checked="images_exclude">
            <td></td>
            <td>
                
                <?php _e( 'Exclude images located in specific html containers like sliders and galleries', 'wpp' ); ?>

                <br /><br />

                <?php $images_containers = Option::get( 'images_containers_ids', [] ); ?>

                <div id="wpp-exclude-images-container">

                    <?php foreach( $images_containers as $container ): ?>
                        <div class="wpp-dynamic-input-container">
                            <input name="images_containers_ids[]" value="<?php echo $container; ?>" class="wpp-dynamic-input" form="wpp-settings" type="text" required> &nbsp; 
                            <a href="#" data-name="images_containers_ids[]" class="button wpp-remove-input"><?php _e( 'Remove', 'wpp' ); ?></a>
                        </div>
                    <?php endforeach; ?>

                    <?php if ( ! empty( $images_containers ) ) : ?>

                        <div data-info-name="images_containers_ids[]">
                            <em><span class="dashicons dashicons-info"></span> <?php _e( 'Enter container id or class name', 'wpp' ) ?></em> 
                            <em><span class="dashicons dashicons-info"></span> <?php _e( 'Example', 'wpp' ) ?>: #my-container-id</em> 
                            <br />
                        </div>

                    <?php endif; ?>

                </div>

                <a href="#" class="button" data-add-input="images_containers_ids[]" data-info="<?php _e( 'Enter container id or class name', 'wpp' ) ?>|<?php _e( 'Example', 'wpp' ) ?>: #my-container-id"  data-container="#wpp-exclude-images-container"><?php _e( 'Add Container', 'wpp' ); ?></a>
            </td>
        </tr>

        <tr data-wpp-show-checked="images_exclude">
            <td></td>
            <td>

                <?php _e( 'Exclude URL(s) from image optimization', 'wpp' ); ?>

                <br /><br />

                <?php $excluded_urls = Option::get( 'image_url_exclude', [] ); ?>

                <div id="wpp-exclude-url-image-container">

                    <?php if ( ! empty( $pages = Option::get( 'image_post_exclude', [] ) ) ): ?>

                        <?php foreach( $pages as $id ): $link = get_permalink( $id ); ?>
                            <div class="wpp-dynamic-input-container">

                                <input class="wpp-dynamic-input" value="<?php echo $link; ?>" type="text" readonly /> &nbsp; 
                                <a 
                                    href="#" 
                                    class="button wpp-remove-manually-excluded" 
                                    data-id="<?php echo $id; ?>" 
                                    data-type="image" 
                                    data-description="<?php printf( __( 'Remove %s from excluded URL(s)?', 'wpp' ), $link ); ?>">
                                        <?php _e( 'Remove', 'wpp' ); ?>
                                </a>
                            </div>
                        <?php endforeach; ?>

                    <?php endif; ?>

                    <?php foreach( $excluded_urls as $url ): ?>
                        <div data-dynamic-container="image_url_exclude[]" class="wpp-dynamic-input-container">

                            <input 
                                name="image_url_exclude[]" 
                                value="<?php echo $url; ?>" 
                                placeholder="<?php echo site_url(); ?>" 
                                class="wpp-dynamic-input" 
                                form="wpp-settings" 
                                type="text" 
                                required
                            /> &nbsp; 

                            <a href="#" data-name="image_url_exclude[]" class="button wpp-remove-input"><?php _e('Remove', 'wpp'); ?></a>

                        </div>
                    <?php endforeach; ?>

                </div>

                <?php if( ! empty( $excluded_urls ) ) : ?>
                    <div data-info-name="image_url_exclude[]">
                        <em><span class="dashicons dashicons-info"></span> <?php _e( 'Use {numbers} to match only numbers', 'wpp' ); ?></em>
                        <em><span class="dashicons dashicons-info"></span> <?php _e( 'Use {letters} to match only letters', 'wpp' ); ?></em>
                        <em><span class="dashicons dashicons-info"></span> <?php _e( 'Use {any} to match any string', 'wpp' ); ?></em>
                        <em><span class="dashicons dashicons-info"></span> <?php _e( 'Use {all} to match all', 'wpp' ); ?></em>
                        <br />
                    </div>
                <?php endif; ?>

                <a href="#" 
                    class="button" 
                    data-add-input="image_url_exclude[]" 
                    data-placeholder="<?php echo site_url(); ?>" 
                    data-info="<?php _e( 'Use {numbers} to match only numbers', 'wpp' ); ?>|<?php _e( 'Use {letters} to match only letters', 'wpp' ); ?>|<?php _e( 'Use {any} to match any string', 'wpp' ); ?>|<?php _e( 'Use {all} to match all', 'wpp' ); ?>" 
                    data-container="#wpp-exclude-url-image-container">
                    
                    <?php _e( 'Add URL', 'wpp' ); ?>

                </a>

            </td>
        </tr>

        <tr>
            <td colspan="2"><h3><?php _e( 'Videos', 'wpp' ); ?></h3></td>
        </tr>

        <tr>
            <td><strong><?php _e( 'Lazy load', 'wpp' ); ?></strong></td>
            <td>
                <label class="wpp-info">

                    <input 
                        type="checkbox" 
                        value="1" 
                        name="videos_lazy" 
                        data-wpp-checkbox="videos_exclude|youtube_preview_image" 
                        form="wpp-settings" 
                        <?php wpp_checked( 'videos_lazy' ); ?> />

                    <?php _e( 'Lazy load videos', 'wpp' ); ?>

                </label>

                <br /><br />
                <em><span class="dashicons dashicons-info"></span> <?php _e( 'Reduces the number of HTTP requests and improves loading time', 'wpp' ); ?></em>

            </td>
        </tr>

        <tr data-wpp-show-checked="videos_exclude">
            <td></td>
            <td>

                <?php _e( 'Exclude URL(s)', 'wpp' ); ?>

                <br /><br />

                <?php $excluded_urls = Option::get( 'video_url_exclude', [] ); ?>

                <div id="wpp-exclude-url-video-container">

                    <?php if ( ! empty( $pages = Option::get( 'video_post_exclude', [] ) ) ): ?>

                        <?php foreach( $pages as $id ): $link = get_permalink( $id ); ?>
                            <div class="wpp-dynamic-input-container">

                                <input class="wpp-dynamic-input" value="<?php echo $link; ?>" type="text" readonly /> &nbsp; 
                                <a 
                                    href="#" 
                                    class="button wpp-remove-manually-excluded" 
                                    data-id="<?php echo $id; ?>" 
                                    data-type="video" 
                                    data-description="<?php printf( __( 'Remove %s from excluded URL(s)?', 'wpp' ), $link ); ?>">
                                        <?php _e( 'Remove', 'wpp' ); ?>
                                </a>
                            </div>
                        <?php endforeach; ?>

                    <?php endif; ?>

                    <?php foreach( $excluded_urls as $url ): ?>
                        <div data-dynamic-container="video_url_exclude[]" class="wpp-dynamic-input-container">

                            <input 
                                name="video_url_exclude[]" 
                                value="<?php echo $url; ?>" 
                                placeholder="<?php echo site_url(); ?>" 
                                class="wpp-dynamic-input" 
                                form="wpp-settings" 
                                type="text" 
                                required
                            /> &nbsp; 

                            <a href="#" data-name="video_url_exclude[]" class="button wpp-remove-input"><?php _e('Remove', 'wpp'); ?></a>

                        </div>
                    <?php endforeach; ?>

                </div>

                <?php if( ! empty( $excluded_urls ) ) : ?>
                    <div data-info-name="video_url_exclude[]">
                        <em><span class="dashicons dashicons-info"></span> <?php _e( 'Use {numbers} to match only numbers', 'wpp' ); ?></em>
                        <em><span class="dashicons dashicons-info"></span> <?php _e( 'Use {letters} to match only letters', 'wpp' ); ?></em>
                        <em><span class="dashicons dashicons-info"></span> <?php _e( 'Use {any} to match any string', 'wpp' ); ?></em>
                        <em><span class="dashicons dashicons-info"></span> <?php _e( 'Use {all} to match all', 'wpp' ); ?></em>
                        <br />
                    </div>
                <?php endif; ?>

                <a href="#" 
                    class="button" 
                    data-add-input="video_url_exclude[]" 
                    data-placeholder="<?php echo site_url(); ?>" 
                    data-info="<?php _e( 'Use {numbers} to match only numbers', 'wpp' ); ?>|<?php _e( 'Use {letters} to match only letters', 'wpp' ); ?>|<?php _e( 'Use {any} to match any string', 'wpp' ); ?>|<?php _e( 'Use {all} to match all', 'wpp' ); ?>" 
                    data-container="#wpp-exclude-url-video-container">
                    
                    <?php _e( 'Add URL', 'wpp' ); ?>

                </a>

            </td>
        </tr>

    </table>
            
    <br />
    <input type="submit" class="button-primary" value="<?php _e( 'Save changes', 'wpp' ); ?>" name="wpp-save-settings" form="wpp-settings" />
    
    <br /><br />

    </div>

    <div class="wpp-side-section">

        <?php do_action( 'wpp-media-side-section-top'); ?>

        <h3>
            <?php _e( 'Emoji', 'wpp' ); ?>
        </h3>

        <hr />   
          
        <label class="wpp-info">
            <input type="checkbox" value="1" name="disable_emoji" form="wpp-settings" <?php wpp_checked( 'disable_emoji' ); ?> />
            <?php _e( 'Disable Emoji', 'wpp' ); ?>
        </label>

        <br /><br />
        <em><span class="dashicons dashicons-info"></span> <?php _e( "Use default emoji of visitor's browser instead of loading emoji from WordPress.org", 'wpp' ); ?></em> 
        <br />

        
        <h3>
            <?php _e( 'Embeds', 'wpp' ); ?>
        </h3>

        <hr />   
          
        <label class="wpp-info">
            <input type="checkbox" value="1" name="disable_embeds" form="wpp-settings" <?php wpp_checked( 'disable_embeds' ); ?> />
            <?php _e( 'Disable embeds', 'wpp' ); ?>
        </label>

        <br /><br />
        <em><span class="dashicons dashicons-info"></span> <?php _e( 'Prevents embedding content from your site', 'wpp' ); ?></em> 
        <br />

        <div data-wpp-show-checked="images_options">
            
            <h3>
                <?php _e('Image sizes', 'wpp'); ?>
            </h3>

            <hr />       
            
            <table id="wpp-image-sizes-table">
                <thead>
                    <th><?php _e( 'Name', 'wpp' ); ?></th>
                    <th><?php _e( 'Width', 'wpp' ); ?></th>
                    <th><?php _e( 'Height', 'wpp' ); ?></th>
                    <th><?php _e( 'Crop', 'wpp' ); ?></th>
                    <th><?php _e( 'Actions', 'wpp' ); ?></th>
                </thead>
                <tbody>
                <?php foreach ( Image::getAllDefinedSizes() as $name => $data ): ?>
                    <tr>
                        <td>
                            <span class="wpp-visible-mobile">
                                <?php _e( 'Name', 'wpp' ) ?>
                            </span>
                            <?php echo $name; ?>
                        </td>
                        <td>
                            <span class="wpp-visible-mobile">
                                <?php _e( 'Width', 'wpp' ) ?>
                            </span>
                            <?php echo $data[0]; ?> px
                        </td>
                        <td>
                            <span class="wpp-visible-mobile">
                                <?php _e( 'Height', 'wpp' ) ?>
                            </span>
                            <?php if ( $data[1] ) : ?><?php echo $data[ 1 ]; ?> px <?php endif; ?>
                        </td>
                        <td>
                            <span class="wpp-visible-mobile">
                                <?php _e( 'Crop', 'wpp' ) ?>
                            </span>
                            <?php if ( isset( $data[2] ) && $data[2] == 1 ) _e( 'Yes', 'wpp' ); ?>
                        </td>
                        <td>
                            <a href="#" 
                                data-size-name="<?php echo $name; ?>" 
                                data-description="<?php printf( __( 'Remove image size %s', 'wpp' ), $name ); ?>" 
                                class="button wpp-remove-user-image-size">
                                <span class="wpp-visible-mobile"><?php _e( 'Remove size', 'wpp' ) ?></span>
                                <span class="wpp-hidden-mobile">x</span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <br />
            <a href="#" id="wpp-add-image-size" class="button"><?php _e( 'Add size', 'wpp' ); ?></a> 
            <a href="#" id="wpp-restore-image-sizes" data-description="<?php _e('Restore default image sizes', 'wpp'); ?>" class="button"><?php _e( 'Restore image sizes', 'wpp' ); ?></a>

            <div id="wpp-image-errors"></div>

            <hr />

            <em><span class="dashicons dashicons-info"></span> <?php _e( 'Regenerate thumbnails every time you make some changes to image sizes', 'wpp' ); ?></em> 
            <br />
            <a href="#" id="wpp-regenerate-thumbnails" data-title="<?php _e( 'Regenerate thumbnails', 'wpp' ); ?>" class="button"><?php _e( 'Regenerate thumbnails', 'wpp' ); ?></a>  

            <br />

        </div>
        
        
    </div>

</div>