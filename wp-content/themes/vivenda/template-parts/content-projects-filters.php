
<section id="projects" class="projects">
            <div class="inner">
                <div class="projects-title">
                    <h2>Nuestros Proyectos</h2>
                    <h4>Lotificaciones, residenciales y condominios</h4>
                </div>
                <div class="projects-filter">
                    <div class="projects-filter-item">
                        <select name="category" id="category">
                            <option value="">Categoria</option>
                            <option value="Lotes">Lotes</option>
                            <option value="Residenciales">Residenciales</option>
                            <option value="Condominios">Condominios</option>
                        </select>
                    </div>
                    
                    <div class="projects-filter-item">
                        <select name="province" id="province">
                            <option value="">Zona</option>
                            <option value="Guanacaste">Guanacaste</option>
                            <option value="San Jose">San Jose</option>
                            <option value="Alajuela">Alajuela</option>
                            <option value="Heredia">Heredia</option>
                            <option value="Cartago">Cartago</option>
                            <option value="Puntarenas">Puntarenas</option>
                            <option value="Limon">Limón</option>
                        </select>
                    </div>
                    <div class="projects-filter-item">
                        <select name="price" id="price">
                            <option value="">Precio</option>
                            <option value="">De $100.000 a $200.000</option>
                            <option value="">De $200.000 a $300.000</option>
                            <option value="">De $300.000 a $400.000</option>
                            <option value="">De $400.000 a $500.000</option>
                            
                        </select>
                    </div>
                     <div class="projects-filter-item">
                     <button class="btn btn-rojo btn-filter">Buscar</button>
                        
                    </div>
                </div>
            </div>
                    
            <div class="projects-bg">
                <div class="inner">
                
                    <?php
                          $args = array(
                            'post_type' => 'projects',
                            
                          );
                          $projects = new WP_Query( $args );
                          if( $projects->have_posts() ) {
                            while( $projects->have_posts() ) {
                              $projects->the_post();
                              $terms = get_the_terms( $post->ID, 'category_project' );
                              if ( $terms && ! is_wp_error( $terms ) ) { 
                             
                                foreach ( $terms as $term ) {
                                    $categories[] = $term->name;
                                }
                            }

                              ?>
                                 
                                 <article class="project mix <?php echo implode(' ', $categories);  ?> <?php echo rwmb_meta( 'rw_price'); ?> <?php echo rwmb_meta( 'rw_province'); ?>">
                                    <div class="project-icon">
                                        <?php $images = rwmb_meta( 'rw_project_logo', 'type=image&size=large' ); 
                                         if ( $images ) {?>
                                         
                                         
                                            
                                                 <?php foreach ( $images as $image ){?>
                                                     
                                                     <img src="<?php echo $image['url'] ?>" alt="<?php the_title(); ?>" />
                                                  
                                                  <?php } ?>

                                           

                                         <?php         
                                              }else{
                                                    the_title( '<h1 class="page-projectDetails-title">', '</h1>' ); 
                                              }
                                          ?>
                                    </div>
                                    <div class="project-description">
                                        <h3 class="project-title"><?php the_title(); ?></h3>

                                        <p><i class="icon icon-map-marker"></i> <?php echo rwmb_meta( 'rw_zone'); ?>, <?php echo rwmb_meta( 'rw_province'); ?></p>
                                        <?php if(rwmb_meta( 'rw_contact')) { ?>
                                         <p><i class="icon icon-mail"></i> info@vivendacr.com</p>
                                        <?php } ?>
                                        <?php if(rwmb_meta( 'rw_cuota')) { ?>
                                         <p><i class="icon icon-calendar"></i> Cuota desde $<?php echo rwmb_meta( 'rw_cuota'); ?></p>
                                        <?php } ?>
                                        <p><i class="icon icon-dollar"></i> Desde $<?php echo rwmb_meta( 'rw_price'); ?></p>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="project-link">Ver proyecto</a>
                                   
                                   
                                </article>
                                
                                
                              <?php
                            }
                          }
                        ?>
                        
                    
                </div>
                
            </div>
            
        </section>