<div class="container table-responsive m-t-20">
    <h2 class="py-3 text-center">View User's Order</h2>
    <table id="myTable" class="table table-bordered table-hover table-striped dataTable">
        <tbody>
            <tr>
                <td><strong>Ordered By:</strong></td>
                <td><?php echo $order['username'] ?></td>
            </tr>
            <tr>
                <td><strong>Food Item:</strong></td>
                <td><?php echo $order['d_name'] ?></td>
            </tr>
            <tr>
                <td><strong>Quantity:</strong></td>
                <td><?php echo $order['quantity'] ?></td>
            </tr>
            <tr>
                <td><strong>Harga:</strong></td>
                <td><?php echo "Rp.".$order['price'] ?></td>
            </tr>
            <tr>
                <td><strong>Alamat:</strong></td>
                <td><?php echo $order['address'] ?></td>
            </tr>
            <tr>
                <td><strong>Order Date:</strong></td>
                <td><?php echo $order['date'] ?></td>
            </tr>
            <form method="post" action="<?php echo base_url().'admin/orders/updateOrder/'.$order['o_id']; ?>">
                <tr>
                    <td><strong>Select Order Status:</strong></td>
                    <td>
                        <select class="form-control" name="status"
                            class="<?php echo (form_error('status') != "") ? 'is-invalid' : '';?>">
                            <option>Select Status</option>
                            <option value="in process">Dalam Proses</option>
                            <option value="closed">Closed/Delivered</option>
                            <option value="rejected">Rejected</option>
                        </select>
                        <?php echo form_error('status');?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button class="btn btn-primary btn-block" type="submit">Submit</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>