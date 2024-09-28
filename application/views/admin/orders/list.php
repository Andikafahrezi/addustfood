<div class="container">
    <div class="container shadow-container">
        <?php if($this->session->flashdata('success') != ""):?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success');?>
        </div>
        <?php endif ?>
        <?php if($this->session->flashdata('error') != ""):?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error');?>
        </div>
        <?php endif ?>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <h2>All Orders</h2>
            </div>
            <input class="form-control mb-3" id="myInput" type="text" placeholder="Search .." style="width:50%;">
        </div>

        <div class="table-responsive-sm">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Order-Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if(!empty($orders)) {?>
                    <?php foreach($orders as $order) { ?>
                    <tr>
                        <td><?php echo $order['username']; ?></td>
                        <td><?php echo $order['d_name']; ?></td>
                        <td><?php echo $order['quantity']; ?></td>
                        <td><?php echo "Rp.".$order['price']; ?></td>
                        <td><?php echo $order['address']; ?></td>


                        <?php $status=$order['status'];
						if($status=="" or $status=="NULL") { ?>
                        <td> <button type="button" class="btn btn-secondary" style="font-weight:bold;"><i class="fas fa-bars"></i> Dikirim</button></td>
                        <?php } if($status=="in process") { ?>
                        <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"
                                    aria-hidden="true"></span> On the way!</button></td>
                        <?php } if($status=="closed") { ?>
                        <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle"aria-hidden="true"></span> Diterima</button>
                        </td> <?php } ?> <?php if($status=="rejected") { ?>
                        <td> <button type="button" class="btn btn-danger"><i class="far fa-times-circle"></i> Dibatalkan</button>
                        </td>
                        <?php } ?>
                        <td><?php echo $order['date']; ?></td>
                        <td>
                            <a href="<?php echo base_url().'admin/orders/processOrder/'.$order['o_id'];?>"
                                class="btn btn-info mb-1">                               <i class="fas fa-arrow-alt-circle-right"></i> Process</a>
                            <a href="<?php echo base_url().'admin/orders/deleteOrder/'.$order['o_id']?>"
                                class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php } else {?>
                    <tr>
                        <td colspan="8">Records not found</td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
function deleteOrder(id) {
    if (confirm("Are you sure you want to delete orders?")) {
        window.location.href = '<?php echo base_url().'admin/orders/deleteOrder/';?>' + id;
    }
}

$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>