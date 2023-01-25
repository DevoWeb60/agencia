<?php

class Agencia_Social_Widgets extends WP_Widget
{
    public $fields = [];

    public function __construct()
    {
        parent::__construct(
            'agencia_social_widgets',
            __('Social Widgets', 'agencia'),
        );
        $this->fields = [
            'title' => __('Title', 'agencia'),
            'credits' => __('Credits', 'agencia'),
            'twitter' => 'Twitter',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
        ];
    }

    public function widget($args,  $instance): void
    {
        echo $args['before_widget'];
        if (isset($instance['title'])) {
            $title = apply_filters('widget_title', $instance['title']);
            echo $args['before_title'] . $title . $args['after_title'];
        }
        $template = locate_template('template-parts/widgets/social.php');
        if (!empty($template)) {
            include($template);
        }
        echo $args['after_widget'];
    }

    public function form($instance): void
    {
        foreach ($this->fields as $field => $label) :
            $value = $instance[$field] ?? '';
?>
            <p>
                <label for="<?= $this->get_field_id($field); ?>"><?= $label ?></label>
                <input type="text" name="<?= $this->get_field_name($field); ?>" id="<?= $this->get_field_id($field); ?>" value="<?= esc_attr($value); ?>" class="widefat">
            </p>
<?php
        endforeach;
    }

    public function update($newInstance,  $oldInstance)
    {
        $output = [];
        foreach ($this->fields as $field => $label) {
            if (!empty($newInstance[$field])) {
                $output[$field] = $newInstance[$field];
            }
        }
        return $output;
    }
}
