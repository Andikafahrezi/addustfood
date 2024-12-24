<script>
function updateCartItem(obj, rowid) {
    $.get("<?php echo base_url().'cart/updateCartItemQty/'; ?>", {
            rowid: rowid,
            qty: obj.value
        },
        function(resp) {
            if (resp == 'ok') {
                location.reload();
            } else {
                alert('Cart update failde, please try again.');
            }
        });
}
</script>
<div class="container">
    <h2>Shopping Cart</h2>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th width="10%">

                    </th>
                    <th width="10%">Menu</th>
                    <th width="10%">Harga</th>
                    <th width="10%">Quantity</th>
                    <th width="10%">SubTotal</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php if($this->cart->total_items() > 0) { 
                    foreach($cartItems as $item) { ?>
                <tr>
                    <td>
                        <?php $image = $item['image'];?>
                        <img class="" width="70"
                            src="<?php echo base_url().'public/uploads/dishesh/thumb/'.$image;  ?>">
                    </td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo 'Rp.'. $item['price']; ?></td>
                    <td><input type="number" class="form-control text-center" value="<?php echo $item['qty']; ?>"
                            onChange="updateCartItem(this, '<?php echo $item['rowid'] ?>')">
                    </td>
                    <td><?php echo 'Rp.'.$item['subtotal']; ?></td>
                    <td>
                        <a href="<?php echo base_url().'cart/removeItem/'.$item['rowid'] ; ?>"
                            onclick="return confirm('Apakah Kamu Yakin?')"
                            class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php } ?>
                <?php } else { ?>
                <tr>
                    <td colspan="6"><p>No Items In Your Cart!!</p></td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <td>Jenis Pembayaran</td>
                    <td><select name="payment_mode" id="paymentmode"  class="form-control payment-mode"
                                data-rowid="<?php echo $item['rowid']; ?>" 
                                onChange="updatePaymentMode(this, '<?php echo $item['rowid']; ?>')">
                            <option value="Cash" <?php echo ($item['payment_mode'] == 'Cash') ? 'selected' : ''; ?>>Cash</option>
                            <option value="Credit Card" <?php echo ($item['payment_mode'] == 'Credit Card') ? 'selected' : ''; ?>>Credit Card</option>
                            <option value="E-Wallet" <?php echo ($item['payment_mode'] == 'E-Wallet') ? 'selected' : ''; ?>>E-Wallet</option>
                        </select></td>
                </tr>
                <tr>
                    <td><a href="<?php echo base_url().'jeniscemilan' ?>" class="btn btn-sm btn-warning"><i class="fas fa-angle-left"></i> Lanjutkan Belanja</a></td>
                    <td colspan="3"></td>
                    <?php  if($this->cart->total_items() > 0) { ?>
                    <td class="text-left">Grand Total: <b><?php echo 'Rp.'.$this->cart->total();?></b></td>
                    <td><a href="<?php echo base_url().'checkout';?>" class="btn btn-sm btn-success btn-block">Beli <i class="fas fa-angle-right"></i></a></td>
                    <?php } ?>
                </tr>
            </tfoot>
        </table>
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
                alert("Payment berhasil di update!");
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

