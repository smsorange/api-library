<div>
    <div class="invoice_wrapper">
        <div class="payment_details">
            <h4>Payment Details</h4>

            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Deadline</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Deposit</td>
                        <td><?php echo $payment_info->deposit_deadline; ?></td>
                        <td><?php echo $payment_info->deposit_amount; ?> <?php echo $payment_info->currency; ?></td>
                    </tr>
                    <tr>
                        <td>Payment registered</td>
                        <td></td>
                        <td><?php echo $payment_info->payment_received_amount; ?> <?php echo $payment_info->currency; ?></td>
                    </tr>
                    <tr>
                        <td>To be paid</td>
                        <td><?php echo $payment_info->full_amount_deadline; ?></td>
                        <td><?php echo $payment_info->full_left_amount; ?> <?php echo $payment_info->currency; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="prices_details">
                <h4>Prices Details</h4>

                <div class="table-responsive">
                    <table class="table table-condensed table-striped-alt guests_price_table">
                        <?php foreach ($prices_info['guests'] as $guest_number => $guest_price): ?>
                        <tr>
                            <th colspan="3">Guest <?php echo $guest_number; ?></th>
                        </tr>
                        <tr>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                        <?php foreach ($guest_price as $price_code => $price): ?>
                        <?php if ($price_code !== 'TOT'): ?>
                        <tr>
                            <td><?php echo $price->Code; ?></td>
                            <td><?php echo $price->Description; ?></td>
                            <td><?php echo $price->Amount; ?> <?php echo $payment_info->currency; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <tr>
                            <th colspan="2">Total price per Guest <?php echo $guest_number; ?></th>
                            <th><?php echo $guest_price->TOT->Amount; ?> <?php echo $payment_info->currency; ?></th>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <th colspan="2">Total price for cabins</th>
                            <th><?php echo $prices_info->guests_total->CAB->Amount; ?> <?php echo $payment_info->currency; ?></th>
                        </tr>
                        <tr>
                            <th colspan="2">Service charge</th>
                            <th><?php echo $guest_number*$service_charge; ?> <?php echo $payment_info->currency; ?></th>
                        </tr>
                        <tr>
                            <th colspan="2">Total gross price</th>
                            <th><?php echo $prices_info->agent->GRS->Amount + $guest_number*$service_charge; ?> <?php echo $payment_info->currency; ?></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>