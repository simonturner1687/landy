<?php
include 'model/m_events.php';
include 'model/pagination_class.php';


 function display_products($title = '',  $keywords = '')
{


    $Posts = new Posts();
    $posts = $Posts->get_products('', '');

        if (empty($posts)) 
        {
            echo '<p>There are currently no Blogs!</p>';
        } 
        else
        {
        // If we have an array with items
        if (count($posts)) {
          // Create the pagination object
          $pagination = new pagination($posts, (isset($_GET['page']) ? $_GET['page'] : 1), 36);
          // Decide if the first and last links should show
          $pagination->setShowFirstAndLast(false);
          // Parse through the pagination class
          $productPages = $pagination->getResults();
          // If we have items 
          if (count($productPages) != 0) {
            // Create the page numbers
             $pageNumbers = $pagination->getLinks($_GET);
            // Loop through all the items in the array
            foreach ($productPages as $productArray) {
              // Show the information about the item
            
                echo

              '<div class="product clearfix">
                <div class="product-image">
                  <a href="#"><img src="'.$productArray['image_1'].'" alt="'.$productArray['title'].'"></a>
                  <div class="product-overlay">
                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                    <a href="#modal'.$productArray['ebay_id'].'" data-toggle="modal" data-target="#modal'.$productArray['ebay_id'].'" class="item-quick-view"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                  </div>
                </div>
                <div class="product-desc center">
                  <div class="product-title"><h5><a href="#">'.$productArray['title'].'</a></h5></div>
                  <div class="product-price"><ins>&pound; '.number_format($productArray['current_price'],2).'</ins></div>
                </div>
              </div>

            <div id="modal'.$productArray['ebay_id'].'" class="modal single-product clearfix">
            <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header ajax-modal-title">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2>'.$productArray['title'].'</h2>
                    </div>

                    <div class="modal-body product modal-padding clearfix">

                        <div class="col_half nobottommargin">
                            <div class="product-image1">
                                <div class="fslider" data-pagi="false" flexsSlideshow="true">
                                    <div class="flexslider" >
                                        <div class="slider-wrap">';

                                      $no = 1;
                                      while ($no <= 12) {
                                      if (!empty($productArray['image_'.$no])) {
                                        echo '<div class="slide"><a href="'.$productArray['image_'.$no].'" title="'.$productArray['title'].'"><img src="'.$productArray['image_'.$no].'" alt="'.$productArray['title'].'"></a></div>';
                                        $no++;
                                      }
                                      $no++;
                                    }

                                      echo 
                                      '</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col_half nobottommargin col_last product-desc" style="margin-top: 25px;">
                            <div class="product-price"> <ins>&pound; 154.32</ins></div>
                            <div class="product-rating">
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star-half-full"></i>
                                <i class="icon-star-empty"></i>
                            </div>
                            <div class="clear"></div>
                            <div class="line"></div>

                            <!-- Product Single - Quantity & Cart Button
                            ============================================= -->
                            <form class="cart nobottommargin clearfix" method="post" enctype="multipart/form-data">
                                <div class="quantity clearfix">
                                    <input type="button" value="-" class="minus">
                                    <input type="text" step="1" min="1"  name="quantity" value="1" title="Qty" class="qty" size="4" />
                                    <input type="button" value="+" class="plus">
                                </div>
                                <button type="submit" class="add-to-cart button nomargin">Add to cart</button>
                            </form><!-- Product Single - Quantity & Cart Button End -->

                            <div class="clear"></div>
                            <div class="line"></div>
                            <p>Libero velit id eaque ex quae laboriosam nulla optio doloribus! Perspiciatis, libero, neque, perferendis at nisi optio dolor!</p>
                            <ul class="iconlist">
                                <li><i class="icon-caret-right"></i> Dynamic Color Options</li>
                                <li><i class="icon-caret-right"></i> Lots of Size Options</li>
                                <li><i class="icon-caret-right"></i> 30-Day Return Policy</li>
                            </ul>
                        </div>

                    </div>
                    </div>
                  </div>
                </div>';
              
            }
          }
        }
      }           
// print out the page numbers beneath the results
            echo '</div>';
            echo'<div class="center">';
            echo '<ul class="pagination">'; 
            echo $pageNumbers;
            echo '</ul>';
            echo '</div>';

}

 function get_blog_tags()
{
  $Tags = new Posts();
  $tags = $Tags->get_blog_tags();

  foreach ($tags as $tag) {
  echo '<a href="blog.php?tag='.$tag["keyword"].'">'.$tag["keyword"].'</a>';
  
  }
}   


?>