<?php 
   require_once('./../../dals/user.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once './../commons/header.php' ?>

<body>
    <?php require_once './../commons/nav.php'?>
    <br>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <th>
                <td>id</td>
                <td>username</td>
                <td>fullname</td>
                <td>email</td>
                <td>phone</td>
                <td>address</td>
                <td>level</td>
                <td>status</td>
                <td>Thao tác</td>
                </th>


            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <?php require_once './../commons/footer.php'?>
</body>

</html>