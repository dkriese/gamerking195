<?php
    $i = 1;
    //Get Terms
    $terms = get_terms("hs_faq_taxomomy");
    $count = count($terms);
    if ($count > 0) { 
	
	echo '<section class="hs-faq-container">';
        foreach ($terms as $term) {
            
            echo '<div>';
            echo '<input id="ac-' . $i . '" name="accordion-1" type="radio" />';
            echo '<label for="ac-' . $i . '">' . $term->name . '</label>';
            // QUERY ARGS
            $query = new WP_Query(array(
                        'post_type' => $post_type,
                        'posts_per_page' => $posts_per_page,
                        'orderby' => $orderby,
                        'order' => $order,
                        'no_found_rows' => 1,
                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'hs_faq_taxomomy',
                                                'field' => 'slug',
                                                'terms' => $term
                                            )
                                        )
                        )
            );

            while ($query->have_posts()) : $query->the_post();
            
            $title = get_the_title();
            
            echo '<article class="ac-small">';
            echo  '<div class="hs-faq-qustion">' . $title . '</div>';
                the_content();   
            echo '</article>'; 
            ?>
    
            <?php
                endwhile;
                echo '</div>';
                
            $i++;
        }
        echo '</section>';
    }
	
    //If Admin Has Not Created or Selected Any Category in Backend
    else { 
            $query = new WP_Query(array(
                'post_type' => $post_type,
                'posts_per_page' => $posts_per_page,
                'orderby' => $orderby,
                'order' => $order,
                'no_found_rows' => 1
                )
            );
            echo '<section class="hs-faq-container">';
                // Loop
                while ($query->have_posts()) : $query->the_post();

                    $i = get_the_ID();

                    echo '<div>';
                    $title = get_the_title();
                    echo '<input id="ac-' . $i . '" name="accordion-1" type="radio" />';
                    echo '<label for="ac-' . $i . '"><i class="hs-question-icon"></i>' . $title . '</label>';
                    echo '<article class="ac-small">';
                        the_content();   
                    echo '</article>'; 

                    echo '</div>';

                    endwhile;
                    echo '</section>';
    }
    wp_reset_query();
?>