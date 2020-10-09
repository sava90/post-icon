<div class="wrap">
    <h1 class="wp-heading-inline">Post icon</h1>
    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" novalidate="novalidate">
        <input type="hidden" name="action" value="update">
        <?php wp_nonce_field(); ?>

        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row">
                    <label for="<?php echo PostIcon::$postIconTypePostField ?>">Select type post</label>
                </th>
                <td>
                    <?php $typesPost = PostIconAdmin::getAllTypePost(); ?>
                    <select name="<?php echo PostIcon::$postIconTypePostField ?>" id="<?php echo PostIcon::$postIconTypePostField ?>">
                        <?php if(!empty($typesPost)): ?>
                            <?php foreach ($typesPost as $key=>$typePost): ?>
                                <option value="<?php echo $key; ?>" <?php if(get_option(PostIcon::$postIconTypePostField, '') == $key):?>selected<?php endif; ?>><?php echo $typePost; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="<?php echo PostIcon::$postIconField ?>">Select icon</label>
                </th>
                <td>
                    <input name="<?php echo PostIcon::$postIconField ?>" type="text" id="<?php echo PostIcon::$postIconField ?>" class="regular-text" value="<?php echo get_option(PostIcon::$postIconField, ''); ?>">
                    <span class="toggle-list dashicons dashicons-list-view"></span>
                    <div class="post-icon-dashicons-wrap">
                        <?php $dashicons = PostIconAdmin::getAllDashicon(); ?>
                        <?php if(!empty($dashicons)): ?>
                            <?php foreach ($dashicons as $dashicon): ?>
                                <div data-icon-name="<?php echo $dashicon ?>" class="dashicons dashicons-<?php echo $dashicon ?>"></div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="<?php echo PostIcon::$postIconPositionField ?>">Select position</label>
                </th>
                <td>
                    <?php $position = PostIconAdmin::getAllPosition(); ?>
                    <select name="<?php echo PostIcon::$postIconPositionField ?>" id="<?php echo PostIcon::$postIconPositionField ?>">
                        <?php if(!empty($position)): ?>
                            <?php foreach ($position as $key=>$value): ?>
                                <option value="<?php echo $key; ?>" <?php if(get_option(PostIcon::$postIconPositionField, '') == $key):?>selected<?php endif; ?>><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить изменения">
        </p>
    </form>
</div>