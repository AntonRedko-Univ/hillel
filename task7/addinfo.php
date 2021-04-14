<!doctype html>
<html>
    <body>

        <form name = "test" action = "addfiles/goods.php" method = "post">
            <label><p>name</p> </label>
            <input type = "text" name = "name">

            <label><p>price</p> </label>
            <input type = "text" name = "price">

            <button><font color ="black">Add</font></button>
        </form>

        <form name = "test" action = "addfiles/counterpartys.php" method = "post">
            <label><p>Name</p> </label>
            <input type = "text" name = "name">

            <label><p>user_id</p> </label>
            <input type = "text" name = "user_id">

            <button><font color ="black">Add</font></button>
        </form>

        <form name = "test" action = "addfiles/orders.php" method = "post">
            <label><p>user_id</p> </label>
            <input type = "text" name = "user_id">

            <label><p>order_id</p> </label>
            <input type = "text" name = "order_id">

            <label><p>price</p> </label>
            <input type = "text" name = "price">

            <button><font color ="black">Add</font></button>
        </form>

        <form name = "test" action = "addfiles/payments.php" method = "post">
            <label><p>order_id</p> </label>
            <input type = "text" name = "order_id">

            <label><p>status</p> </label>
            <input type = "text" name = "status">


            <button><font color ="black">Add</font></button>
        </form>
    </body>
</html>