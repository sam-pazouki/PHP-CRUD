<?php
// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once 'classes/product.php';

$objProduct = new Product();

// GET
if(isset($_GET['delete_id'])){
  $id = $_GET['delete_id'];
  try{
    if($id != null){
      if($objProduct->delete($id)){
        $objProduct->redirect('add.php?deleted');
      }
    }else{
      var_dump($id);
    }
  }catch(PDOException $e){
    echo $e->getMessage();
 
      }
    }


?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Head metas, css, and title -->
        <?php require_once 'layout/head.php'; ?>
    </head>
    <body>
        <!-- Header banner -->
        <?php require_once 'layout/header.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar menu -->
                <?php require_once 'layout/sidebar.php'; ?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <h1 style="margin-top: 10px">DataTable</h1>
                    <?php
                      if(isset($_GET['updated'])){
                        echo '<div class="alert alert-info alert-dismissable fade show" role="alert">
                        <strong>Product!<trong> Updated with success.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"> &times; </span>
                          </button>
                        </div>';
                      }else if(isset($_GET['deleted'])){
                        echo '<div class="alert alert-info alert-dismissable fade show" role="alert">
                        <strong>User!<trong> Deleted with success.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"> &times; </span>
                          </button>
                        </div>';
                      }else if(isset($_GET['inserted'])){
                        echo '<div class="alert alert-info alert-dismissable fade show" role="alert">
                        <strong>User!<trong> Inserted with success.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"> &times; </span>
                          </button>
                        </div>';
                      }else if(isset($_GET['error'])){
                        echo '<div class="alert alert-info alert-dismissable fade show" role="alert">
                        <strong>DB Error!<trong> Something went wrong with your action. Try again!
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"> &times; </span>
                          </button>
                        </div>';
                      }
                    ?>
                      <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Date</th>
                                <th></th>
                              </tr>
                            </thead>
                            
                            <tbody>
                                
      
                                      <a class="confirmation" href="index.php?delete_id=<?php print($rowProduct['id']); ?>">
                                      <span data-feather="trash"></span>
                                      </a>
                                    </td>
                                 </tr>


                          
                            </tbody>
                        </table>

                      </div>
</main>
            </div>
        </div>
        <!-- Footer scripts, and functions -->
        <?php require_once 'layout/footer.php'; ?>

        <!-- Custom scripts -->
        <script>
            // JQuery confirmation
            $('.confirmation').on('click', function () {
                return confirm('Are you sure you want to delete this item?');
            });
        </script>
    </body>