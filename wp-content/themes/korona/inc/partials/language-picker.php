<div class="language-picker js-language-picker" data-trigger-class="btn btn--subtle js-tab-focus">
    <form action="" class="x-nua"><label for="language-picker-select">Select your language</label>
        <select name="language-picker-select" id="language-picker-select">
            <?php
            $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc');
            foreach($languages as $key => $value){
                $active = null;
                if($value['active'] == 1){
                    $active = 'selected=""';
                }
                echo '<option lang="'.$key.'" value="'.$value['native_name'].'" data-url="'.$value['url'].'" '.$active.'>'.$value['native_name'].'</option>';
            }
            ?>
        </select>
    </form>
</div>