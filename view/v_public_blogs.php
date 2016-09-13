<?php
include 'model/m_events.php';
include 'model/pagination_class.php';


 function display_posts($title = '', $status = '', $keywords = '')
{


    $Posts = new Posts();
    $posts = $Posts->get_products('', 'publish', $keywords);

        if (empty($posts)) 
        {
            echo '<p>There are currently no Blogs!</p>';
        } 
        else
        {
        // If we have an array with items
        if (count($posts)) {
          // Create the pagination object
          $pagination = new pagination($posts, (isset($_GET['page']) ? $_GET['page'] : 1), 5);
          // Decide if the first and last links should show
          $pagination->setShowFirstAndLast(false);
          // Parse through the pagination class
          $blogPages = $pagination->getResults();
          // If we have items 
          if (count($blogPages) != 0) {
            // Create the page numbers
             $pageNumbers = $pagination->getLinks($_GET);
            // Loop through all the items in the array
            foreach ($blogPages as $blogArray) {
              // Show the information about the item
            {
                echo

              '<div class="product clearfix">
                <div class="product-image">
                  <a href="#"><img src="images/shop/dress/1.jpg" alt="$blogArray['title']RANGE ROVER EVOQUE ARM REST LEATHER VICTORIA BECKHAM"></a>
                  <div class="product-overlay">
                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                    <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                  </div>
                </div>
                <div class="product-desc center">
                  <div class="product-title"><h5><a href="#">RANGE ROVER EVOQUE ARM REST LEATHER VICTORIA BECKHAM</a></h5></div>
                  <div class="product-price"><ins>&pound; 154.32</ins></div>
                </div>
              </div>';
              }          
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