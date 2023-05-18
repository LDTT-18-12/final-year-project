<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Update Order </h1>
        <br><br>

        <form action="" method = "POST" enctype = "multipart/form-data">
            <table class= "tbl-30">
                <tr>
                    <td> Food Name</td>
                       <td>
                        <input type="text" name= "food" value=""> 
                       </td>
                </tr>
                <tr>
                    <td> Price </td>
                       <td>
                        <input type="numer" name= "price" value=""> 
                       </td>
                </tr>
                <tr>
                    <td> Qty</td>
                    <td> <input type="number" name= "qty" value=""></td>
                </tr>
                <tr>
                    <td> Status</td>
                        <td>
                            <select name="status" id="">
                                <option value="ordered"> Ordered</option>
                                <option value="On Delivery">On Delivery</option>
                                <option value="Delivered"> Delivered</option>
                                <option value="Cancelled">Cancelled</option>

                            </select>
                        </td>
                </tr>
                <tr>     
                    <td> Customer Name:</td>
                    <td>
                        <input type="text" name="customer_name" value="">
                    </td>
                </tr>
                <tr>     
                    <td> Customer contact:</td>
                    <td>
                        <input type="text" name="customer_contact" value="">
                    </td>
                </tr>
                <tr>     
                    <td> Customer Email:</td>
                    <td>
                        <input type="text" name="customer_email" value="">
                    </td>
                </tr>
                <tr>     
                    <td> Customer Address:</td>
                    <td>
                        <textarea name="customer_address" value="" cols="30" row="5"> </textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value= "Update Order" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

    </div>
</div>

<?php include('partial/footer.php'); ?>