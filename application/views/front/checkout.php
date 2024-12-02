<div class="container">
    
    <div class="row">
        <div class="col-md-8">
        <h2 class="mt-3">Order Preview</h2>
            <div class="table-responsive-sm">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            <th>SubTotal</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php if($this->cart->total_items() > 0) { 
                    foreach($cartItems as $item) { ?>
                        <tr>
                            <td>
                                <?php $image = $item['image'];?>
                                <img class="" width="100"
                                    src="<?php echo base_url().'public/uploads/dishesh/thumb/'.$image; ?>">
                            </td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo 'Rp.'.$item['price']; ?></td>
                            <td><?php echo $item['qty']; ?></td>
                            <td><?php echo 'Rp.'.$item['subtotal']; ?></td>
                        </tr>
                        <?php } ?>
                        <?php } else { ?>
                        <tr>
                            <td colspan="5">
                                <p>No Items In Your Cart!!</p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <?php  if($this->cart->total_items() > 0) { ?>
                            <td class="text-left">Total: <b><?php echo 'Rp.'.$this->cart->total();?></b></td>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <form action="<?php echo base_url().'checkout/index';?>" method="POST"
                class="form-container  shadow-container" style="width:80%">
                <h3 class="mt-3">Shipping Details</h3><hr>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" type="text" style="height:70px;"
                        class="form-control
                    <?php echo (form_error('address') != "") ? 'is-invalid' : '';?>"><?php echo set_value('address', $user['address']);?></textarea>
                    <?php echo form_error('address'); ?>
                </div>
                <p class="lead mb-0">Metode Pembayaran</p>
                <form action="<?= base_url('checkout/process') ?>" method="post">
                    <div class="form-group">
                        <label for="payment_mode">Pilih Metode Pembayaran:</label>
                        <select name="payment_mode" id="paymentmode"  class="form-control payment-mode"
                                data-rowid="<?php echo $item['rowid']; ?>" 
                                onChange="updatePaymentMode(this, '<?php echo $item['rowid']; ?>')">
                            <option value="Cash" <?php echo ($item['payment_mode'] == 'Cash') ? 'selected' : ''; ?>>Cash</option>
                            <option value="Credit Card" <?php echo ($item['payment_mode'] == 'Credit Card') ? 'selected' : ''; ?>>Credit Card</option>
                            <option value="E-Wallet" <?php echo ($item['payment_mode'] == 'E-Wallet') ? 'selected' : ''; ?>>E-Wallet</option>
                        </select>

                    </div>
                    <div>
                        <a href="<?php echo base_url().'cart'; ?>" class="btn btn-warning"><i class="fas fa-angle-left"></i>
                        Back to cart</a>
                        <button type="submit" name="placeOrder" class="btn btn-success">Place Order <i class="fas fa-angle-right"></i></button>
                    </form>
                </div>
                </form>
                </from>
               
                

               
        </div>
    </div>
</div>

<script>
        function updatePaymentMode(el, rowId) {
    var paymentMode = el.value; // Ambil nilai dari dropdown
    $.ajax({
        url: "<?php echo base_url('cart/updatePaymentMode'); ?>",
        type: "POST",
        data: {rowid: rowId, payment_mode: paymentMode},
        success: function(response) {
            if (response == 'ok') {
                alert("Payment mode updated successfully!");
            } else {
                alert("Failed to update payment mode.");
            }
        },
        error: function() {
            alert("Error occurred while updating payment mode.");
        }
    });
}

    </script>