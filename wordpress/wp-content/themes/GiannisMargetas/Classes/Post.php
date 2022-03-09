<?php

class Post
{
    public function __construct()
    {
        add_filter('rwmb_meta_boxes', array($this, "RegisterFields"), 30);
        add_filter('rwmb_meta_boxes', array($this, "RegisterDate"), 31);
    }

    function RegisterDate()
    {
        $prefix = '';

        $meta_boxes[] = [
            'title' => esc_html__('Ημερομηνια', 'online-generator'),
            'id' => 'untitled',
            'pages' => 'post',
            'context' => 'normal',
            'fields' => [

                [
                    'type' => 'text',
                    'name' => esc_html__('Ημερομηνία', 'online-generator'),
                    'id' => $prefix . 'date',
                ],
            ],
        ];

        return $meta_boxes;
    }

    function RegisterFields()
    {
        $prefix = '';

        $meta_boxes[] = [
            'title' => esc_html__('Εναλλασσόμενες Εικόνες για αρχική σελίδα', 'online-generator'),
            'id' => 'untitled',
            'pages' => 'page',
            'context' => 'normal',
            'fields' => [

                [
                    'type' => 'file_advanced',
                    'name' => esc_html__('Εικόνες', 'online-generator'),
                    'id' => $prefix . 'carousel',
                ],
            ],
        ];

        return $meta_boxes;
    }
}


new Post();